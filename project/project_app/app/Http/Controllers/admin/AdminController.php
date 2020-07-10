<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Http\Requests\AdminCommentRequest;
use App\Models\Product;
use App\Models\Cart;
use App\Models\TagCategory;
use App\Models\User;
use App\Models\Contact;
use App\Models\AdminComment;
use Carbon\Carbon;

class AdminController extends Controller
{
    private $product;
    private $cart;
    private $tagCategory;
    private $user;
    private $contact;
    private $comment;

    public function __construct(Product $product, Cart $cart, TagCategory $tagCategory, User $user, Contact $contact, AdminComment $comment)
    {
        $this->middleware('auth:admin');
        $this->product = $product;
        $this->cart = $cart;
        $this->tagCategory = $tagCategory;
        $this->user = $user;
        $this->contact = $contact;
        $this->comment = $comment;
    }

    public function index()
    {

        return view('admin.index');
    }

    public function showUsers(Request $request)
    {
        $searches = $request->all();
        $users = $this->adminUserSearches($searches);
        return view('admin.users', compact('users'));
    }

    public function confirmUser($userId)
    {
        $user = $this->user->find($userId);
        $buys = $this->cart->where('user_id', $userId)
                           ->whereNotNull('buyTime')
                           ->orderBy('buyTime', 'desc')
                           ->paginate(10);
        return view('admin.userConfirm', compact('user', 'buys'));
    }

    public function updateUser(Request $request, $userId)
    {
        $input = $request->all();
        $this->user->find($userId)->fill($input)->save();
        return redirect()->to('admin.users');
    }

    public function showProducts(Request $request)
    {
        $searches = $request->all();
        $products = $this->product->getBySearches($searches);
        $tagCategories = $this->tagCategory->all();
        return view('admin.products', compact('products', 'tagCategories', 'searches'));
    }

    public function createProduct()
    {
        return view('admin.productCreate', compact('tagCategories'));
    }

    public function storeProduct(AdminProductRequest $request)
    {
        $input = $request->except('photo');
        $path = $request->file('photo')->store('images', 'public');
        Product::insert([
            'tag_category_id' => $input['tag_category_id'],
            'name' => $input['name'],
            'price' => $input['price'],
            'content' => $input['content'],
            'model' => $input['model'],
            'photo' => $path,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('admin.products');
    }

    public function editProduct($productId)
    {
        $product = $this->product->find($productId);
        return view('admin.productEdit', compact('product'));
    }

    public function updateProduct(AdminProductRequest $request, $productId)
    {
        $input = $request->all();
        $this->product->find($productId)->fill($input)->save();
        return redirect()->route('admin.products');
    }

    public function destroyProduct($productId)
    {
        $this->product->find($productId)->delete();
        return redirect()->route('admin.products');
    }

    public function showContacts()
    {
        $contacts = $this->contact->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contacts', compact('contacts'));
    }

    public function editComment($contactId)
    {
        $contact = $this->contact->find($contactId);
        return view('admin.contactEdit', compact('contact'));
    }

    public function storeComment(AdminCommentRequest $request, $contactId)
    {
        $input = $request->all();
        $this->comment->contact_id =$contactId;
        $this->comment->fill($input)->save();
        return redirect()->route('admin.contacts');
    }

    public function destroyContact($contactId)
    {
        $this->contact->find($contactId)->delete();
        return redirect()->route('admin.contacts');
    }

    public function showBuys(Request $request)
    {
        $searches = $request->all();
        $buys = $this->cart->adminBuySearches($searches);
        return view('admin.buys', compact('buys'));
    }

    public function editBuys($cartId)
    {
        $buy = $this->cart->find($cartId);
        return view('admin.buysEdit', compact('buy'));
    }

    public function storeShipping(Request $request, $cartId)
    {
        $input = $request->all();
        $this->cart->find($cartId)->fill($input)->save();
        return redirect()->route('admin.buys');
    }

}



