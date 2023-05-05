<?php

use Src\Route;

Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

Route::add('GET', '/main', [Controller\Site::class, 'mainPage'])
   ->middleware('auth');

Route::add(['GET'], '/admin-panel', [Controller\Site::class, 'adminPanel'])
   ->middleware('auth', 'role:admin');
Route::add(['GET', 'POST'], '/createUser', [Controller\CreateUser::class, 'createUser'])
   ->middleware('auth', 'role:admin');
Route::add(['GET', 'POST'], '/updateUser', [Controller\Site::class, 'updateUser'])
   ->middleware('auth', 'role:admin');
Route::add(['GET', 'POST'], '/deleteUser', [Controller\Site::class, 'deleteUser'])
   ->middleware('auth', 'role:admin');

Route::add('GET', '/employees', [Controller\Employees::class, 'showEmployees'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/createEmployee', [Controller\Employees::class, 'createEmployee'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/updateEmployee', [Controller\Employees::class, 'updateEmployee'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/deleteEmployee', [Controller\Employees::class, 'deleteEmployee'])
   ->middleware('auth');
Route::add('GET', '/employeesAge', [Controller\Employees::class, 'employeesAge'])
   ->middleware('auth');

Route::add('GET', '/addresses', [Controller\Addresses::class, 'showAddresses'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/createAddress', [Controller\Addresses::class, 'createAddress'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/updateAddress', [Controller\Addresses::class, 'updateAddress'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/deleteAddress', [Controller\Addresses::class, 'deleteAddress'])
   ->middleware('auth');


