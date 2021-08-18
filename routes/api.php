<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\api\MediaApiController;

use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\ItemPriorityController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::get('media/get-media',[MediaApiController::class, 'index']);
Route::get('media/get-product-images/{mediaId}',[MediaApiController::class, 'getProductImages']);

Route::post('media/media-store',[MediaApiController::class, 'mediaStore']);


Route::post('media/update-product-image',[MediaApiController::class, 'updateProductImage']);

Route::get('media/media-delete/{id}',[MediaApiController::class, 'mediaDelete']);

// Route::get('get/getPetaKacheri/{id}','api\CategoryApiController@getPetaKacheri');

Route::resource('photos.comments', PhotoController::class);

Route::get('get/getPetaKacheri/{id}',[CategoryController::class, 'getPetaKacheri']);
Route::get('get/getDepartment/{id}',[CategoryController::class, 'getDepartment']);

// Route::post('admin/slider/update-list',[MediaApiController::class, 'updateProductImage']);

// Item No Update wia drag nd drop

Route::post('/admin/slider/update-status',[SliderController::class, 'update_list_no'])->name('slider.update-status');
Route::post('/admin/item/update-item-priority',[ItemPriorityController::class, 'updateItemNo'])->name('item.update-priority');


// Route::post('/admin/category/departmentStore', [CategoryController::class, 'departmentStore'])->name('admin.category.departmentStore');



