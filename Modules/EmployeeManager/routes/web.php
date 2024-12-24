<?php

use Illuminate\Support\Facades\Route;
use Modules\EmployeeManager\Http\Controllers\EmployeeManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" SSSSmiddleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth', 'permission:employee-edit|employee-create|employee-delete|employee-list']], function () {
    // Define your resource route for employees
    Route::resource('employee', EmployeeManagerController::class)
        ->names('employee')
        ->except(['destroy']);  // Excluding the destroy method from the resource route

    // Define a custom destroy route, as it's excluded from the resource route
    Route::get('employee/destroy/{id}', [EmployeeManagerController::class, 'destroy'])
        ->name('employee.destroy');
});
