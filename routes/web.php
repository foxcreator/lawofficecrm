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

    Route::middleware(['checkRole:' . User::ROLE_ADMIN])->group(function () {
        Route::get('/employee-all', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])
            ->name('admin.employee.index');
        Route::get('/employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])
            ->name('admin.employee.create');
        Route::post('/employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])
            ->name('admin.employee.store');
        Route::get('/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])
            ->name('admin.employee.edit');
        Route::post('/employee/update/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])
            ->name('admin.employee.update');
        Route::post('/admin/employee/toggle-working/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'toggleWorking'])
            ->name('admin.employee.toggle-working');


        Route::get('/employee/{id}', [\App\Http\Controllers\Admin\EmployeeController::class, 'employeeCard'])
            ->name('employee');
    });
});
//* TODO make functionality for reset password with Email  */
