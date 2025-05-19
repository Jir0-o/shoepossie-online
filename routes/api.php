<?php

use App\Http\Controllers\Purchase\PurchaseInvoiceController;
use App\Http\Controllers\StoreController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::post('/store-purchase-product-data', [PurchaseInvoiceController::class, 'storePurchaseProductData'])->name('store-purchase-product-data');

Route::post('sync_data', [StoreController::class, 'upload_sync_data']);
Route::get('sync_data', [StoreController::class, 'test']);