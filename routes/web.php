<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductCategoryController;



    Route::get('/',[HomepageController::class,'index'])->name('home');
    Route::get('products', [HomepageController::class, 'products']);
    Route::get('/categories', function() { 
        return "halaman categories product"; 

    });

//     Route::get('/', function(){
//     $title ="Homepage - WighoShop";
//     return view ('web.homepage', ["title" =>$title]);
//    });
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

   Route::resource('dashboard/categories',ProductCategoryController::class);


   Route::view('dashboard', 'dashboard')
   ->middleware(['auth', 'verified'])
   ->name('dashboard');

Route::middleware(['auth'])->group(function () {
   Route::redirect('settings', 'settings/profile');

   Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
   Volt::route('settings/password', 'settings.password')->name('settings.password');
   Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
