<?php 

/*
 * For setting routes
 * 
*/


Route::get('/')->add('HomepageController', 'homepage');
Route::get('/register')->add('RegisterController', 'register');
Route::post('/register')->add('RegisterController', 'store');
Route::get('/login')->add('LoginController', 'show');
Route::post('/login')->add('LoginController', 'authenticate');
Route::get('/passwordforgotten')->add('PasswordforgottenController', 'show');
Route::post('/passwordforgotten')->add('PasswordforgottenController', 'verify');
if (isset($_GET['c'])) {
    Route::get('/passwordresetrequest/?c=' . $_GET['c'])->add('PasswordResetRequestController', 'show');
    Route::post('/passwordresetrequest/?c=' . $_GET['c'])->add('PasswordResetRequestController', 'verify');
}
Route::get('/passwordreset')->add('PasswordResetController', 'show');
