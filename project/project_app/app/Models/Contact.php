<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\AdminComment;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(AdminComment::class, 'contact_id');
    }
}
