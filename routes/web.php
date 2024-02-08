<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home', ['name' => 'hamid']);
})->name('home');
Route::get('/posts/create', function () {
    return view(('create'));
})->name('posts.create');
Route::post('/posts/store', function (Request $request) {


    $request->validate([
        'title' => 'required',
        'description' => ['required', 'min:10']
    ]);
    return redirect()->route('posts.create')
        ->with('success', 'the title: ' . $request->input('title') .
            ', desc: ' . $request->input('description'));
})->name('posts.store');
