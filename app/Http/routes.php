<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',function(){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'my first post','body'=>'post body']);
    return $user->posts()->save($post);
});
Route::get('/read',function(){
    $user = User::findOrFail(1);
    // dd($user->posts);
    foreach($user->posts as $post) {
        echo $post->title."<br>";
    }
});
Route::get('/update',function(){
    $user = User::findOrFail(1);
    return $user->posts()->where('id',2)->update(['title'=>'temp update 33','body'=>'temp body 33']);
});
Route::get('/delete',function(){
    $user = User::findOrFail(1);
   return  $user->posts()->whereId(4)->delete();
});
