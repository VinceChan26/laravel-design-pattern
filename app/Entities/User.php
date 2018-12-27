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

    protected $appends = ['name_mail'];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeShow($query)
    {
        return $query->select('id', 'name', 'email');
    }

    public function getNameMailAttribute($query)
    {
        return $this->name . '&' . $this->email;
    }
}