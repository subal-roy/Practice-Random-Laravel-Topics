<?php

use App\Events\MessageNotification;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/success', [ProductController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [ProductController::class, 'cancel'])->name('checkout.cancel');
Route::get('/email', [EmailController::class, 'sendEmail']);

Route::get('/newsletter', [NewsletterController::class, 'index']);
Route::post('/subscribe', [NewsletterController::class, 'subscribe']);


Route::get('/event', function() {
    event(new MessageNotification());
    return 'done';
});
Route::get('/listen', function() {
    return view('broadcast.listen');
});