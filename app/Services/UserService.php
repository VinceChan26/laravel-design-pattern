<?php

namespace App\Services;

use Faker\Factory as Faker;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService
{
    protected $fake;

    /**
     * UserService constructor.
     */
    public function __construct(Faker $fake)
    {
        $this->fake = $fake::create();
    }

    /**
     * @param $limit
     *
     * @return array
     */
    public function getList($limit)
    {

        $fakerArray = [];
        for ($num = 0; $num < $limit; $num++) {
            $name = $this->fakeName();
            $mail = $this->fakeMail();

            $fakerArray[] = (object) [
                'id' => $this->fakeNumber(1, mt_rand()),
                'name' => $name,
                'email' => $mail,
                'name_mail' => $name . ' & ' . $mail,
            ];
        }
        return $fakerArray;
    }

    /**
     * @param $id
     *
     * @return object
     */
    public function getData($id)
    {
        $name = $this->fakeName();
        $mail = $this->fakeMail();

        $array[] = (object) [
            'id' => $id['id'],
            'name' => $name,
            'email' => $mail,
            'name_mail' => $name . ' & ' . $mail,
        ];
        return $array;
    }

    /**
     * @param $min
     * @param $max
     *
     * @return int
     */
    private function fakeNumber($min, $max)
    {
        return $this->fake->numberBetween($min, $max);
    }

    /**
     * @return string
     */
    private function fakeName()
    {
        return $this->fake->name;
    }

    /**
     * @return string
     */
    private function fakeMail()
    {
        return $this->fake->email;
    }
}