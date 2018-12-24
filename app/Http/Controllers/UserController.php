<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Validator;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $list = $this->userService->getList(7);
        return view('users', [
            'data' => $list,
        ]);
    }


    public function detail(Request $request, $id)
    {
        $request['id'] = $id;
        $validate = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
        ]);
        if ($validate->fails()) {
            abort(404);
        }

        $data = $this->userService->getData($request->only(['id']));

        return view('users', [
            'data' => $data,
        ]);
    }
}
