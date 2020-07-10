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
        'sumPrice',
        'buyTime',
        'shippingTime'
    ];

    protected $dates = [
        'buyTime'
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

    public function adminBuySearches($searches)
    {
        return $this->when(isset($searches['buyTime']), function ($query) use ($searches) {
            $query->where('buyTime', 'LIKE', '%' . $searches['buyTime'] . '%');
        })->when(isset($searches['shippingTime']), function ($query) use ($searches) {
            $query->where('shippingTime', 'LIKE','%' . $searches['shippingTime'] . '%');
        })->when(isset($searches['buy']), function ($query) use ($searches) {
            $query->where('shippingTime', null);
        })
        ->whereNotNull('buyTime')
        ->orderBy('buyTime', 'desc')
        ->paginate(10);
    }

}
