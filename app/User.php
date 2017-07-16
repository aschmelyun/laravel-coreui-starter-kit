<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function register_rules()
    {
        return [
            'email' => 'email|required|unique:users',
            'name'  => 'required|regex:/^[\pL\s\-]+$/u',
            'password' => 'required|min:5|max:32|confirmed'
        ];
    }

    public static function signin_rules()
    {
        return [
            'email' => 'email|required',
            'password' => 'required'
        ];
    }
}
