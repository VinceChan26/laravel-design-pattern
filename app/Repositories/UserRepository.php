<?php

namespace App\Repositories;

use App\Entities\User;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function list($limit)
    {
        return $this->user->inRandomOrder()
            ->limit($limit)
            ->show()
            ->get();
    }

    public function getData($id)
    {
        return $this->user->show()->find($id);
    }
}