<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

//user routes
Route::controller(UserController::class)->group(

    function (){
        //registre routes
         Route::get('/registre','registre')->name('user.registre');
         Route::post('/registre','signup')->name('user.signup');
         //login routes
         Route::get('/login','login')->name('user.login');
         Route::post('/login','signin')->name('user.signin');

         //logout
         Route::post('/logout','logout')->name('user.logout');
         // Edit User
         Route::get('/user/{user}/edit','edit')->name('user.edit');
         //update user
         Route::put('/user/edit/{user}','update')->name('user.update');
         //delete account
         Route::delete('/delete/{user}','destroy')->name('user.destroy');
});

Route::controller(CommentController::class)->group(
    function (){
         Route::post('/comment/{vote}','store')->name('comment.store');

        //  destroy comment
         Route::delete('/comment/{vote}/','destroy')->name('comment.delete');

});




Route::controller(AdminController::class)->group(
    function (){
    Route::get('/admin/dashboard','index')->name('admin.dashaboard')->middleware('admin');

    Route::get('/admin/categories','category')->name('admin.category')->middleware('admin');

    Route::post('/admin/category','store')->name('admin.store')->middleware('admin');

    Route::delete('/admin/category/{category}','destroy')->name('admin.destroy')->middleware('admin');

    Route::get('/admin/users','users')->name('admin.user')->middleware('admin');
});

//POST LIKE

Route::post('/like/{vote}',[LikeController::class,'like'])->name('vote.like');


Route::get('/',[VoteController::class,'index'])->name('vote.index');

Route::get('/closed',[VoteController::class,'closed'])->name('vote.closed');

Route::get('/inprogress',[VoteController::class,'inprogress'])->name('vote.inprogress');

Route::post('/index',[VoteController::class,'store'])->name('vote.store');
Route::delete('/index/{vote}',[VoteController::class,'destroy'])->name('vote.destroy');
Route::get('/show/{vote}',[VoteController::class,'show'])->name('vote.show');


//edit status
Route::put('/status/{vote}',[VoteController::class,'status'])->name('vote.status');
