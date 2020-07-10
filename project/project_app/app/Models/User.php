<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthdauy', 'gender', 'address_num', 'address'
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

    public function adminUserSearches($searches)
    {
        return $this->when(isset($searches['content']), function ($query) use ($searches) {
            $query->where('name', 'LIKE', '%' . $searches['content'] . '%');
        })
        ->when(isset($searches['content']), function ($query) use ($searches) {
            $query->where('birthday', 'LIKE','%' . $searches['content'] . '%');
        })->when(isset($searches['content']), function ($query) use ($searches) {
            $query->where('email', 'LIKE','%' . $searches['content'] . '%');
        })
        ->orderBy('updated_at', 'desc')
        ->paginate(10);
    }
}
