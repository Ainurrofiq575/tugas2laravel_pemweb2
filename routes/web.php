<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view ("Ini Adalah Halaman Utama Website E-commerce(WIGHOSHOP)");
//     return view ("web.homepage");
// });

// Route::get('/pages/about', function () {
//     return "Ini Adalah Halaman about/tentang Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/collections/all', function () {
//     return "Ini Adalah Halaman Product All Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/collections', function () {
//     return "Ini Adalah Halaman Collections/koleksi Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/pages/contact-us', function () {
//     return "Ini Adalah Halaman Contact-us Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/blogs/news', function () {
//     return "Ini Adalah Halaman News/Berita Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/pages/marketplace-wighoshop', function () {
//     return "Ini Adalah Halaman MarketPlace Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/search', function () {
//     return "Ini Adalah Halaman Pencarian Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/policies/shipping-policy', function () {
//     return "Ini Adalah Halaman Terms of Service (Kebijakan Pengiriman) Website E-commerce(WIGHOSHOP)";
// });

// Route::get('policies/refund-policy', function () {
//     return "Ini Adalah Halaman Terms of Service (Kebijakan Pengembalian Uang) Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/policies/privacy-policy', function () {
//     return "Ini Adalah Halaman Terms of Service (Kebijakan Privasi) Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/policies/contact-information', function () {
//     return "Ini Adalah Halaman Terms of Service (Informasi Kontak) Website E-commerce(WIGHOSHOP)";
// });

// Route::get('/', function () {
//     return "<h2 style='color: blue;'>Ini Adalah Halaman Utama Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/pages/about', function () {
//     return "<h2 style='color: green;'>Ini Adalah Halaman about/tentang Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/collections/all', function () {
//     return "<h2 style='color: red;'>Ini Adalah Halaman Product All Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/collections', function () {
//     return "<h2 style='color: purple;'>Ini Adalah Halaman Collections/koleksi Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/pages/contact-us', function () {
//     return "<h2 style='color: orange;'>Ini Adalah Halaman Contact-us Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/blogs/news', function () {
//     return "<h2 style='color: brown;'>Ini Adalah Halaman News/Berita Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/pages/marketplace-wighoshop', function () {
//     return "<h2 style='color: teal;'>Ini Adalah Halaman MarketPlace Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/search', function () {
//     return "<h2 style='color: navy;'>Ini Adalah Halaman Pencarian Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/policies/shipping-policy', function () {
//     return "<h2 style='color: darkred;'>Ini Adalah Halaman Terms of Service (Kebijakan Pengiriman) Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('policies/refund-policy', function () {
//     return "<h2 style='color: darkblue;'>Ini Adalah Halaman Terms of Service (Kebijakan Pengembalian Uang) Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/policies/privacy-policy', function () {
//     return "<h2 style='color: darkgreen;'>Ini Adalah Halaman Terms of Service (Kebijakan Privasi) Website E-commerce(WIGHOSHOP)</h2>";
// });

// Route::get('/policies/contact-information', function () {
//     return "<h2 style='color: darkorange;'>Ini Adalah Halaman Terms of Service (Informasi Kontak) Website E-commerce(WIGHOSHOP)</h2>";
// });

Route::get('/', function(){
    $title ="Homepage - WighoShop";
    // return "halaman home page";
    return view ('web.homepage', ["title" =>$title]);
   });
   Route::get('products', function(){
    $title = "Products - WighoShop";
    return view ('web.products', ["title"=>$title]);
   });
   Route::get('product/{slug}', function($slug){
    return view('web.single_product');
   });
   Route::get('categories', function(){
    return view('web.categories');
   });
   Route::get('category/{slug}', function($slug){
    return view('web.single_category');
   });
   Route::get('cart', function(){
    $title ="Cart - WighoShop";
    return view('web.cart', ["title"=>$title]);
   });
   Route::get('checkout', function(){
    return view('web.checkout');
   });
require __DIR__.'/auth.php';
