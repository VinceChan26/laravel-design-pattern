<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getList($limit)
    {
        return $this->userRepository->list($limit);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getData($id)
    {
        return $this->userRepository->getData($id);
    }
}