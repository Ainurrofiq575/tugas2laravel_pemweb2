<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    public function index()
    {
        $Categories = Categories::all();
        $title = "Homepage - WighoShop";
        return view('web.homepage', [
            'Categories' => $Categories,
            'title' => $title
        ]);
    }

    public function products()
    {
        $title = "Products - WighoShop";
        return view('web.products', ['title' => $title]);
    }

    public function showProduct($slug)
    {
        $title = "Product - WighoShop";
        return view('web.single_product', [
            'title' => $title,
            'slug' => $slug
        ]);
    }

    public function categories()
    {
        $title = "Categories - WighoShop";
        return view('web.categories', ['title' => $title]);
    }

    public function showCategory($slug)
    {
        $title = "Category - WighoShop";
        return view('web.single_category', [
            'title' => $title,
            'slug' => $slug
        ]);
    }

    public function cart()
    {
        $title = "Cart - WighoShop";
        return view('web.cart', ['title' => $title]);
    }

    public function checkout()
    {
        $title = "Checkout - WighoShop";
        return view('web.checkout', ['title' => $title]);
    }
}