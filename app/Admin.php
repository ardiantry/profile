<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = "admin";

    protected $table = "admins";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','password_md5','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays. 
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];
    
        public $timestamps =false;
}