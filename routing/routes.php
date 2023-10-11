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
Route::get('/logout')->add('LogoutController', 'logout');
Route::get('/portfolio')->add('PortfolioController', 'portfolio');
