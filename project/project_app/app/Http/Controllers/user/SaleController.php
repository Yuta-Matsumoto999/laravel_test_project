<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CartRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Product;
use App\Models\Cart;
use App\Models\TagCategory;
use App\Models\User;
use App\Models\Contact;
use App\Models\AdminComment;
use Carbon\Carbon;
use Auth;

class SaleController extends Controller
{
    private $product;
    private $cart;
    private $tagCategory;
    private $user;
    private $contact;
    private $comment;

    public function __construct(Product $product, Cart $cart, TagCategory $tagCategory, User $user, Contact $contact, AdminComment $comment)
    {
        $this->middleware('auth:user');
        $this->product = $product;
        $this->cart = $cart;
        $this->tagCategory = $tagCategory;
        $this->user = $user;
        $this->contact = $contact;
        $this->comment = $comment;
    }

    public function index(Request $request)
    {
        $searches = $request->all();
        $products = $this->product->getBySearches($searches);
        $tagCategories = $this->tagCategory->all();
        return view('user.index', compact('products', 'tagCategories', 'searches'));
    }

    public function showContact()
    {
        $user = $this->user->find(Auth::id());
        return view('user.contact', compact('user'));
    }

    public function storeContact(ContactRequest $request)
    {
        $input = $request->except('name', 'email');
        $this->contact->user_id = Auth::id();
        $this->contact->fill($input)->save();
        return redirect()->route('sale.index');
    }

    public function showProduct($productId)
    {
        $product = $this->product->find($productId);
        return view('user.product', compact('product'));
    }

    public function storeCart(CartRequest $request, $productId)
    {
        $inputs = $request->all();
        $this->cart->user_id = Auth::id();
        $this->cart->product_id = $productId;
        $this->cart->fill($inputs)->save();
        return redirect()->route('sale.show.cart');
    }

    public function showCart()
    {
        $carts = $this->cart->where('user_id', Auth::id())->whereNull('buyTime')->get();
        $sumQuentity = $carts->count('quentity');
        $sumPrice = $carts->sum('sumPrice');
        return view('user.cart', compact('carts', 'sumQuentity', 'sumPrice'));
    }

    public function showCartProduct($cartId)
    {
        $cart = $this->cart->find($cartId);
        return view('user.cartProduct', compact('cart'));
    }

    public function updateCart(CartRequest $request, $cartId)
    {
        $inputs = $request->all();
        $this->cart->find($cartId)->fill($inputs)->save();
        return redirect()->route('sale.show.cart');
    }

    public function showCartPurchase(Request $request)
    {
        $user = $this->user->find(Auth::id());
        $carts = $this->cart->where('user_id', Auth::id())->whereNull('buyTime')->get();
        $sumPrice = $carts->sum('sumPrice');
        $taxPrice = $sumPrice * 0.1;
        $totalPrice = $sumPrice + $taxPrice;
        return view('user.purchase', compact('user', 'carts', 'sumPrice' ,'taxPrice', 'totalPrice'));
    }


    public function storeCartPurchase(PurchaseRequest $request)
    {
        $input = $request->all();
        $this->cart->where('user_id', Auth::id())->whereNull('buyTime')->update(['buyTime' => Carbon::now()]);
        $this->user->find(Auth::id())->fill($input)->save();
        return view('user.completePurchase');
    }

    public function destroyByCart($cartId)
    {
        $this->cart->where('user_id', Auth::id())->delete();
        return redirect()->route('sale.show.cart');
    }

    public function showMycontact()
    {
        $contacts = $this->contact->where('user_id', Auth::id())->get();
        return view('user.mycontact', compact('contacts'));
    }

    public function contact($contactId)
    {
        $contact = $this->contact->find($contactId);
        $comments = $this->comment->where('contact_id', $contactId)->get();
        return view('user.showContact', compact('contact', 'comments'));
    }

    public function destroyContact($contactId)
    {
        $this->contact->find($contactId)->delete();
        return redirect()->route('sale.show.myquestion');
    }

    public function showBuys()
    {
        $buys = $this->cart->where('user_id', Auth::id())
                           ->whereNotNull('buyTime')
                           ->orderBy('buyTime', 'desc')
                           ->paginate(10);
        return view('user.buys', compact('buys'));
    }

    public function showUser()
    {
        $user = $this->user->find(Auth::id());
        return view('user.editUser', compact('user'));
    }

    public function updateUser(UserRequest $request)
    {
        $input = $request->all();
        $this->user->find(Auth::id())->fill($input)->save();
        return redirect()->route('sale.index');
    }

}

