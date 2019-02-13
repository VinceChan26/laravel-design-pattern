<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Validator;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $list = $this->userRepository->list(7);
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

        $data = $this->userRepository->getData($request->only(['id']));

        return view('users', [
            'data' => $data,
        ]);
    }
}
