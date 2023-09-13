<?php 

/*
 * For setting routes
 * 
*/

Route::get('/register')->add('RegisterController', 'register');
Route::post('/register')->add('RegisterController', 'store');