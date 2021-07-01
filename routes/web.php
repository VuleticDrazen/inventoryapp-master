<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentItemController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SerialNumberController;
use App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/departments',DepartmentController::class)->middleware('auth');
Route::resource('/equipment', EquipmentController::class)->middleware('auth');
Route::resource('/documents', DocumentController::class)->middleware('auth');
Route::resource('/tickets', TicketController::class)->middleware('auth');
Route::resource('/positions', PositionController::class)->middleware('auth');

Route::get('/officers/{role}',[App\Http\Controllers\UserController::class, 'officers'])->middleware('auth');
Route::get('/get-users',[App\Http\Controllers\UserController::class, 'getUsers'])->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/positions-by-department/{department}', [DepartmentController::class, 'positions'])->middleware('auth');
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'roles'])->middleware('auth');
Route::get('/departmentsFill', [App\Http\Controllers\DepartmentController::class, 'departments'])->middleware('auth');
Route::get('/statuses', [App\Http\Controllers\TicketStatusController::class, 'index'])->middleware('auth');
Route::get('/serial-numbers-by-equipment/{equipment}', [EquipmentController::class, 'serial_numbers'])->middleware('auth');
Route::get('/exportDocuments', 'App\Http\Controllers\DocumentController@export')->middleware('auth');
Route::get('/export-all-documents', 'App\Http\Controllers\DocumentController@exportAll')->middleware('auth');
Route::get('/exportUsers/{request}', 'App\Http\Controllers\UserController@export')->middleware('auth');
Route::get('/exportEquipment', 'App\Http\Controllers\EquipmentController@export')->middleware('auth');
Route::get('/exportEquipmentByCategory','App\Http\Controllers\EquipmentController@exportByCategory')->middleware('auth');
Route::get('/exportTickets', 'App\Http\Controllers\TicketController@export')->middleware('auth');
Route::get('/exportInProgressTickets', 'App\Http\Controllers\TicketController@exportInProgress')->middleware('auth');
Route::get('/searchUsers', [App\Http\Controllers\UserController::class, 'getUsers']);
Route::get('/get-categories', [App\Http\Controllers\EquipmentCategoryController::class, 'categories'])->middleware('auth');
Route::get('/get-equipment', [App\Http\Controllers\EquipmentController::class, 'getEquipment'])->middleware('auth');

Route::post('/equipment/{equipment}/serial-numbers', [SerialNumberController::class, 'store'])->name('serial_numbers.store')->middleware('auth');
Route::post('/document-items/{document}', [DocumentItemController::class, 'store'])->middleware('auth');
Route::put('/document-item/return/{document_item}', [DocumentItemController::class, 'update'])->middleware('auth');

Auth::routes();


