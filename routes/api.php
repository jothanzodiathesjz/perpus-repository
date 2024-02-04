<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\SkbpController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/payment/store', [PaymentController::class, 'PaymentStore']);
Route::post('/payment/getnotification', [PaymentController::class, 'notification']);

Route::post('/book/store',[DashboardController::class, 'BookStore']);
Route::post('/book/update/{id}',[DashboardController::class, 'updateBook']);
Route::get('/book/get',[DashboardController::class, 'getDataBuku']);
Route::get('/admin/book/get',[DashboardController::class, 'getDataBukuAdmin']);
Route::get('/book/category',[DashboardController::class, 'getBooksCategory']);

Route::delete('/book/{id}',[DashboardController::class, 'deleteBook']);

Route::post('/cart/store',[DashboardController::class, 'cartStore']);
Route::get('/cart/{id}',[DashboardController::class, 'getDataKeranjangById']);
Route::delete('/cart/{id}',[DashboardController::class, 'deleteItemCart']);



Route::get('/validation-code',[DashboardController::class, 'CreateValidationCode']);
Route::post('/books/pinjam',[DashboardController::class, 'CreatePeminjaman']);
Route::get('/daftarpinjam/{id}',[DashboardController::class, 'getDataPinjamByUser']);
Route::post('/admin/register',[AuthController::class, 'registerAdmin']);

Route::post('/skbp1/store',[SkbpController::class, 'createSkbp1']);
Route::get('/skbp1/get',[SkbpController::class, 'getSbkp1']);
Route::get('/skbp1/get/{id}',[SkbpController::class, 'skbp1detail']);
Route::post('/skbp1/setfileshow/{id}',[SkbpController::class, 'setFileShow']);
Route::delete('/pustaka/delete/{id}',[SkbpController::class, 'deletePustaka']);


Route::get('/skbp1/setfileshow',[SkbpController::class, 'setFileShow']);
Route::get('/skbp1/getvolume',[SkbpController::class, 'getVolumeWithJurusan']);
Route::get('/skbp1/getList',[SkbpController::class, 'getlistSkbp1']);
Route::get('/skbp1/search',[SkbpController::class, 'skbp1Search']);
Route::post('/skbp1/bebaspinjam/update/{id}',[SkbpController::class, 'updatePinjamBuku']);

Route::get('/skbp1/data-bebas-pinjam',[SkbpController::class, 'dataBebasPinjam']);

Route::get('/skbp2/print-content/{id}',[SkbpController::class, 'skbp2PrintData']);


Route::get('/users/profile-data/{id}',[DashboardController::class, 'getProfileDetails']);
Route::get('/users/profile-picture/{id}',[DashboardController::class, 'getProfilePicture']);
Route::put('/users/profile-data/{id}',[DashboardController::class, 'changesProfileDetails']);
Route::put('/users/profile-password/{id}',[DashboardController::class, 'updatePassword']);
Route::post('/users/profile-picture/{id}',[DashboardController::class, 'updateProfilePicture']);

Route::get('/users/profile',[DashboardController::class, 'userSearch']);

Route::post('/users/sumbangan',[DashboardController::class, 'createSumbangan']);
Route::delete('/users/sumbangan',[DashboardController::class, 'deleteSumbangan']);

Route::get('/users/sumbangan/get',[DashboardController::class, 'getDataSumbangan']);

Route::get('/users/all',[DashboardController::class, 'getDataUser']);

Route::delete('/users/delete/{id}',[DashboardController::class, 'deleteUsers']);

Route::get('/users/staff',[DashboardController::class, 'dataStaff']);

Route::post('/users/staff', [AuthController::class, 'createDataStaff']);

