<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @prototype string name
 * @prototype string email
 * @prototype string password
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function labels(){
        return [
            'id' => 'ID', 
            'name' => 'Name', 
            'email' => 'Email', 
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
            'remember_token' => 'Remember Token',
            'email_verified_at' => 'Email Veriried At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function categories(){
        return $this->hasMany(Category::class, 'created_by', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'owner', 'email');
    }

}
