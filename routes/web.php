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
Route::name('posts.')->prefix('posts')->group(function(){
    Route::get('/create', function () {
        return view(('posts.create'));
    })->name('create');
    Route::post('/store', function (Request $request) {
    
    
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);
        return redirect()->route('posts.create')
            ->with('success', 'the title: ' . $request->input('title') .
                ', desc: ' . $request->input('description'));
    })->name('store');

});
