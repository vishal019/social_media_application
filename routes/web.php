<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\craetePost;
use App\Http\Controllers\followController;
use App\Http\Controllers\userProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\termandcondition;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/term_and_condition',[termandcondition::class,'termandcondition']);

Route::get('/dashboard', [dashboardController::class,'diplay_dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/post_created',[craetePost::class,'create_Post']);
    Route::get('/followed',[followController::class,'follow'])->name('follow');
    Route::delete('/unfollow',[followController::class,'destroy'])->name('unfollow');
    Route::get('/user_profile/{id}',[userProfileController::class,'display_user_profile']);
    // Route::get('/message/{id}',[ChatController:: class,'display_chat']);
    Route::post('/addcomment',[CommentController::class,'addcomment']);



    Route::post('/posts/{postId}/likes', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/posts/{postId}/likes', [LikeController::class, 'destroy']);

    // Comment routes
    Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{commentId}', [CommentController::class, 'destroy']);


    Route::get('/messenger/{id}', [MessageController::class, 'index'])->name('messenger.index');
    Route::get('/messenger/messages/{receiverId}', [MessageController::class, 'fetchMessages']);
    Route::post('/messenger/messages', [MessageController::class, 'sendMessage']);


    Route::get('/mobilemessager', [MessageController::class, 'messager'])->name('mobilemessager');

    Route::get('/profile_search',[searchController::class,'search_profile'])->name('search');
     Route::get('/comment/{id}',[CommentController::class,'display_comment']);
   



   
});

require __DIR__.'/auth.php';
