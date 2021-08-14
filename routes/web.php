<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\TrashedController;
use App\Http\Controllers\admin\TaskController;
use App\Http\Controllers\admin\TaskAssignController;
use App\Http\Controllers\admin\TaskStatus;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\HomeEditorController;
use App\Http\Controllers\admin\UrlListController;
use App\Http\Controllers\admin\UrlGroupController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\PageController;





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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resources([
//     '/' => HomeController::class,    
// ]);



Route::get('', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('products', [HomeController::class, 'product']);
Route::get('products/{slug}', [HomeController::class, 'product_internal']);

Route::get('product-detail/{slug}', [HomeController::class, 'product_details']);

Route::get('testimonials', [HomeController::class, 'testimonials']);
Route::get('videos', [HomeController::class, 'videos']);
Route::get('blog', [HomeController::class, 'blog']);
Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');

Route::get('about2', [HomeController::class, 'about2']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('manufacturing', [HomeController::class, 'manufacturing']);
Route::get('infrastructure', [HomeController::class, 'infrastructure']);
Route::get('corporate-video', [HomeController::class, 'corporate_video']);
Route::get('brochure', [HomeController::class, 'brochure']);
Route::get('team', [HomeController::class, 'team']);
Route::get('research-development', [HomeController::class, 'research_development']);


//Admin

// Route::group(function(){

//     Route::resource('/admin',DashboardController::class);
// });

Route::resource('/admin/slider',SliderController::class);
// Route::resource('/admin/top-inflatables',SliderController2::class);

Route::get('/admin/top-inflatable', [HomeEditorController::class, 'topInflatableCreate'])->name('top.inflatable');
Route::post('/admin/top-inflatable/store', [HomeEditorController::class, 'topInflatableStore'])->name('top.inflatable.store');
Route::delete('/admin/top-inflatable/delete/{id}', [HomeEditorController::class, 'topInflatableDelete'])->name('top.inflatable.delete');

Route::get('/admin/page-editor/about', [PageController::class, 'aboutPageEditor'])->name('about-page.editor');
Route::get('/admin/page-editor/product', [PageController::class, 'productPageEditor'])->name('product-page.editor');
Route::get('/admin/page-editor/testimonial', [PageController::class, 'testimonialPageEditor'])->name('testimonial-page.editor');
Route::get('/admin/page-editor/video', [PageController::class, 'videoPageEditor'])->name('video-page.editor');
Route::get('/admin/page-editor/blog', [PageController::class, 'blogPageEditor'])->name('blog-page.editor');
Route::get('/admin/page-editor/contact', [PageController::class, 'contactPageEditor'])->name('contact-page.editor');

Route::post('/admin/page-editor/store', [PageController::class, 'pageEditorStore'])->name('page-editor.store');


Route::get('/admin/home-editor', [HomeEditorController::class, 'homeEditorIndex'])->name('home.editor');

Route::post('/admin/about-store', [HomeEditorController::class, 'homeEditorAboutStore'])->name('about.store');

Route::post('/admin/url-list1/store', [HomeEditorController::class, 'urlListStore1'])->name('url-list1.store');
Route::delete('/admin/url-list1/delete/{id}', [HomeEditorController::class, 'urlListDelete1'])->name('url-list1.delete');

Route::get('/admin/url-group', [UrlGroupController::class, 'UrlGroupIndex'])->name('url.group');
Route::get('/admin/settings/social-media', [SettingController::class, 'socialMediaIndex'])->name('setting.social-media');
Route::post('/admin/settings/social-media', [SettingController::class, 'socialMediaStore'])->name('setting.social-media.store');


// Route::resource('/admin/employee',EmployeeController::class);

Route::post('/admin/register/save', [AdminAuthController::class, 'save'])->name('register.save');
Route::post('/admin/auth/check', [AdminAuthController::class, 'check'])->name('auth.check');

Route::get('/admin/auth/logout', [AdminAuthController::class, 'logout'])->name('auth.logout');

// Route::get('/admin/category/petaKacheriStore',[CategoryController::class, 'petaKacheriStore'])->name('admin.petaKacheriStore');
Route::post('/admin/category/subCategoryStore', [CategoryController::class, 'subCategoryStore'])->name('admin.category.subCategoryStore');
Route::post('/admin/category/subCategory2Store', [CategoryController::class, 'subCategory2Store'])->name('admin.category.subCategory2Store');

Route::get('/admin/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category.delete');


Route::group(['middleware'=> ['AuthCheck']], function(){
    
    


Route::resources([
    '/admin/employee' => EmployeeController::class,
    '/admin/client' => ClientController::class,
    '/admin/task' => TaskController::class,
    '/admin/task-assign' => TaskAssignController::class,
    '/admin/product' => ProductController::class,
    '/admin/testimonials' => TestimonialController::class,
    '/admin/blog' => BlogController::class,
    '/admin/video' => VideoController::class,
        
]);


// '/' => HomeController::class,

    Route::get('/admin',[DashboardController::class, 'index']);
    
    Route::get('/admin/category',[CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/admin/category/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/store',[CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('/admin/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
    
    Route::post('/admin/task-comment/store',[TaskAssignController::class, 'task_comment_store'])->name('admin.taskComment.store');
    Route::post('/admin/task-comment/delete/{id}',[TaskAssignController::class, 'task_comment_delete'])->name('admin.taskComment.delete');
    
    Route::post('/admin/task-status/update',[TaskAssignController::class, 'task_update_status'])->name('admin.task.update.status');
    
    Route::get('/admin/trashed/{table}',[TrashedController::class, 'index'])->name('admin.trashed');
    Route::delete('/admin/trashed/{table}/{id}',[TrashedController::class, 'destroy'])->name('admin.trashed.destroy');
    Route::get('/admin/trashed/restore/{table}/{id}',[TrashedController::class, 'restore'])->name('admin.trashed.restore');
    
    Route::get('/admin/dashboard2',[DashboardController::class, 'dashboard2'])->name('admin.dashboard2');
    Route::get('/admin/test',[DashboardController::class, 'test'])->name('admin.test');
    Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('/admin/register', [AdminAuthController::class, 'register']);
    
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
});

// Route::resources([
//     '/admin' => DashboardController::class,
//     '/admin/slider2' => SliderController::class,
// ]);




// Route::get('about2', HomeController::class, name = >'about2');

// Route::resources([
//     '/about' => HomeController::class@about,
// ]);


// Route::get('/', 'admin\LocationController@destory')
    // ->name('/');

// Route::get('/', 'PhotoController::class@index');

        // Route::get('/home', 'home\HomeController@index')->name('home');	