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


if(isset($_SESSION['userId']) === true) {

    Route::get('/profile/' . $_SESSION['userId'])->add('ProfileController', 'index');
    Route::get('/profile/' . $_SESSION['userId'] . '/edit')->add('ProfileController', 'edit');
    Route::post('/profile/' . $_SESSION['userId'] . '/update')->add('ProfileController', 'update');
    Route::get('/profile/' . $_SESSION['userId'] . '/change-password')->add('ProfileController', 'editPassword');
    Route::post('/profile/' . $_SESSION['userId'] . '/change-password')->add('ProfileController', 'updatePassword');
    Route::get('/edit-schools') -> add('EditSchoolsController', 'show');
    Route::post('/edit-schools') -> add('EditSchoolsController', 'editOrDelete');
    Route::get('/add-schools') -> add('AddSchoolsController', 'show');
    Route::post('/add-schools') -> add('AddSchoolsController', 'addSchoolOrSubject');
}


