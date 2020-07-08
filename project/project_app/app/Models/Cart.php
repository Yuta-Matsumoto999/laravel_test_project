<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Product;
use Auth;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'quentity',
        'price',
        'sumPrice'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function checkoutCart()
    {
        $this->where('user_id', Auth::id())->delete();
    }

}
