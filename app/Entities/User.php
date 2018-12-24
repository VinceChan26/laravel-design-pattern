<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeShow($query)
    {
        return $query->select('id', 'name', 'email');
    }
}