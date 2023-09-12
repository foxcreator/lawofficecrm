<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

if (!\Illuminate\Support\Facades\Auth::user()) {
    Route::get('/login');
}

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
//dd(User::ROLE_ADMIN);
    Route::middleware(['checkRole:' . User::ROLE_ADMIN])->group(function () {
        Route::get('/employee-all', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])
            ->name('admin.employee.index');
        Route::get('/employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])
            ->name('admin.employee.create');
        Route::get('/employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])
            ->name('admin.employee.store');

    });
});
