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


if (!\Illuminate\Support\Facades\Auth::user()) {
    Route::get('/login');
}
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard')->middleware('can:dashboard');
    Route::get('/search', [\App\Http\Controllers\Services\SearchController::class, 'search'])
        ->name('search');
    Route::get('/employee-all', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])
        ->name('admin.employee.index')->middleware('can:employee-all');
    Route::get('/employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])
        ->name('admin.employee.create')->middleware('can:employee-create');
    Route::post('/employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])
        ->name('admin.employee.store')->middleware('can:employee-create');
    Route::get('/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])
        ->name('admin.employee.edit')->middleware('can:employee-update');
    Route::post('/employee/update/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])
        ->name('admin.employee.update')->middleware('can:employee-update');
    Route::post('/admin/employee/toggle-working/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'toggleWorking'])
        ->name('admin.employee.toggle-working')->middleware('can:employee-toogle-working');

    Route::get('/employee/{id}', [\App\Http\Controllers\Admin\EmployeeController::class, 'employeeCard'])
        ->name('employee')->middleware('can:employee-card');

    Route::post('/category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])
        ->name('category.store')->middleware('can:category-add');
    Route::post('/article/store', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])
        ->name('article.store')->middleware('can:category-add');

    Route::get('/visitors/all/{status}', [\App\Http\Controllers\Services\VisitorsController::class, 'index'])
        ->name('visitors.index')->middleware('can:visitors-all');
    Route::get('/visitors/create', [\App\Http\Controllers\Services\VisitorsController::class, 'create'])
        ->name('visitors.create')->middleware('can:visitors-create');
    Route::post('/visitors/store', [\App\Http\Controllers\Services\VisitorsController::class, 'store'])
        ->name('visitors.store')->middleware('can:visitors-create');
    Route::get('/visitor/{id}', [\App\Http\Controllers\Services\VisitorsController::class, 'visitorCard'])
        ->name('visitor')->middleware('can:visitors-card');
    Route::get('/visitors/edit/{id}', [\App\Http\Controllers\Services\VisitorsController::class, 'edit'])
        ->name('visitors.edit')->middleware('can:visitors-update');
    Route::post('/visitors/update/{id}', [\App\Http\Controllers\Services\VisitorsController::class, 'update'])
        ->name('visitors.update')->middleware('can:visitors-update');

    //Create and view Consultations
    Route::resource('consultations', \App\Http\Controllers\Services\ConsultationsController::class)->middleware('can:consultation');
    Route::resource('cases', \App\Http\Controllers\Services\CasesController::class)->middleware('can:cases');
    Route::get('/cases/index/{caseStatus}', [\App\Http\Controllers\Services\CasesController::class, 'indexStatus'])->name('cases.index.status')->middleware('can:cases-change-status');


    Route::post('/generate-contract/', [\App\Http\Controllers\HomeController::class, 'contractAction'])->name('generate.contract');
    Route::get('download-contract/{id}', [\App\Http\Controllers\HomeController::class, 'downloadContractAction'])->name('download.contract');
    Route::get('/about-system', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
    Route::get('/policy', [\App\Http\Controllers\HomeController::class, 'policy'])->name('policy');


});
//* TODO make functionality for reset password with Email  */
