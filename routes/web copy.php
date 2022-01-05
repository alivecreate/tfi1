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
use App\Http\Controllers\admin\BlockControlController;
use App\Http\Controllers\admin\CustomCodeController;
use App\Http\Controllers\admin\CriteriaController;

use App\Http\Controllers\admin\PhotoController;

use App\Http\Controllers\admin\testController;







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


Route::get('/testing-page', [testController::class, 'index']);
Route::get('/testing-page/create', [testController::class, 'create']);



Route::get('', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about'])->name('admin');

Route::get('products', [HomeController::class, 'product'])->name('products');
Route::get('sitemap.html', [HomeController::class, 'sitemap'])->name('sitemap');


Route::get('blog/{slug}', [HomeController::class, 'blog_details']);

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



// Route::get('/product/{category}/{slug}', [HomeController::class, 'category_list']);




//Admin

// Route::group(function(){

//     Route::resource('/admin',DashboardController::class);
// });

Route::post('/admin/register/save', [AdminAuthController::class, 'save'])->name('admin.register.save');
Route::post('/admin/auth/check', [AdminAuthController::class, 'check'])->name('admin.auth.check');

Route::get('/admin/auth/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminAuthController::class, 'register']);

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

Route::group(['middleware'=> ['AuthCheck']], function(){
    
    

    // Route::post('/admin/slider/update-status',[SliderController::class, 'update_list_no'])->name('slider.update-status');
    
    Route::resource('/admin/slider',SliderController::class);

    
    Route::get('/admin/block-control/top-inflatables',[BlockControlController::class, 'topInflatableCreate'])->name('admin.topInflatable.create');
    Route::post('/admin/block-control/top-inflatables',[BlockControlController::class, 'topInflatableStore'])->name('admin.topInflatable.store');
    Route::delete('/admin/block-control/delete',[BlockControlController::class, 'deleteBlockControl'])->name('admin.blockControl.delete');
    
    Route::get('/admin/block-control/page-links',[BlockControlController::class, 'pageLinkCreate'])->name('admin.pageLink.create');
    Route::post('/admin/block-control/page-links',[BlockControlController::class, 'pageLinkStore'])->name('admin.pageLink.store');

    Route::post('/admin/block-control/page-links/update',[BlockControlController::class, 'pageLinkUpdate'])->name('admin.pageLink.update');
    
    //common links form categories, products, Testimonials, Blog, etc

    Route::get('/admin/block-control/common-links/{pageType}',[BlockControlController::class, 'commonLinkCreate'])->name('admin.commonLink.create');
    Route::post('/admin/block-control/common-links',[BlockControlController::class, 'commonLinkStore'])->name('admin.commonLink.store');
    Route::post('/admin/block-control/common-links/update',[BlockControlController::class, 'commonLinkUpdate'])->name('admin.commonLink.update');
    

    // Route::delete('/admin/block-control/delete',[BlockControlController::class, 'deleteBlockControl'])->name('admin.blockControl.delete');
    
    
    
    Route::get('/admin/custom-code/js',[CustomCodeController::class, 'customJs'])->name('admin.customJs.create');
    
    
    // Route::get('/admin/top-inflatable', [HomeEditorController::class, 'topInflatableCreate'])->name('top.inflatable');
    // Route::post('/admin/top-inflatable/store', [HomeEditorController::class, 'topInflatableStore'])->name('top.inflatable.store');
    
    Route::delete('/admin/top-inflatable/delete/{id}', [HomeEditorController::class, 'topInflatableDelete'])->name('admin.top.inflatable.delete');
    
    Route::get('/admin/page-editor/about', [PageController::class, 'aboutPageEditor'])->name('admin.about-page.editor');
    Route::get('/admin/page-editor/product', [PageController::class, 'productPageEditor'])->name('admin.product-page.editor');
    Route::get('/admin/page-editor/testimonial', [PageController::class, 'testimonialPageEditor'])->name('admin.testimonial-page.editor');
    Route::get('/admin/page-editor/video', [PageController::class, 'videoPageEditor'])->name('admin.video-page.editor');
    Route::get('/admin/page-editor/blog', [PageController::class, 'blogPageEditor'])->name('admin.blog-page.editor');
    Route::get('/admin/page-editor/contact', [PageController::class, 'contactPageEditor'])->name('admin.contact-page.editor');
    
    Route::post('/admin/page-editor/store', [PageController::class, 'pageEditorStore'])->name('admin.page-editor.store');
    
    
    Route::get('/admin/home-editor', [HomeEditorController::class, 'homeEditorIndex'])->name('admin.home.editor');
    
    Route::post('/admin/about-store', [HomeEditorController::class, 'homeEditorAboutStore'])->name('admin.about.store');
    
    Route::post('/admin/url-list1/store', [HomeEditorController::class, 'urlListStore1'])->name('admin.url-list1.store');
    Route::delete('/admin/url-list1/delete/{id}', [HomeEditorController::class, 'urlListDelete1'])->name('admin.url-list1.delete');
    
    Route::get('/admin/url-group', [UrlGroupController::class, 'UrlGroupIndex'])->name('admin.url.group');
    Route::get('/admin/settings/social-media', [SettingController::class, 'socialMediaIndex'])->name('admin.setting.social-media');
    Route::post('/admin/settings/social-media', [SettingController::class, 'socialMediaStore'])->name('admin.setting.social-media.store');
    
    Route::get('/admin/settings/seo-manage', [SettingController::class, 'seoManageIndex'])->name('admin.setting.seo-manage');
    Route::post('/admin/settings/seo-manage', [SettingController::class, 'seoManageStore'])->name('admin.setting.seo-manage.store');
    Route::post('/admin/settings/seo-manage-image', [SettingController::class, 'seoManageImageStore'])->name('admin.setting.seo-manage-images.store');
    
    
    
    // Route::resource('/admin/employee',EmployeeController::class);
    // Route::get('/admin/category/petaKacheriStore',[CategoryController::class, 'petaKacheriStore'])->name('admin.petaKacheriStore');
    Route::post('/admin/category/subCategoryStore', [CategoryController::class, 'subCategoryStore'])->name('admin.category.list.subCategoryStore');
    Route::post('/admin/category/subCategory2Store', [CategoryController::class, 'subCategory2Store'])->name('admin.category.list.subCategory2Store');
    
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category.list.delete');
    
    Route::get('/admin/criteria/meta', [CriteriaController::class, 'criteriaMetaIndex'])->name('admin.criteria.meta.index');

    Route::post('/admin/criteria/meta', [CriteriaController::class, 'criteriaMetaStore'])->name('admin.criteria.meta.store');
    
    Route::get('/admin/criteria/meta/edit/{id}',[CriteriaController::class, 'criteriaMetaEdit'])->name('admin.criteria.meta.edit');
    
    Route::post('/admin/criteria/meta/update', [CriteriaController::class, 'criteriaMetaUpdate'])->name('admin.criteria.meta.update');
    Route::delete('/admin/criteria/meta/{id}',[CriteriaController::class, 'criteriaMetaDelete'])->name('admin.criteria.meta.delete');
    
   
    

Route::resources([
    '/admin/employee' => EmployeeController::class,
    '/admin/client' => ClientController::class,
    '/admin/task' => TaskController::class,
    '/admin/task-assign' => TaskAssignController::class,
    '/admin/product' => ProductController::class,
    '/admin/testimonials' => TestimonialController::class,
    '/admin/blog' => BlogController::class,
    '/admin/video' => VideoController::class,
    '/admin/custom-code' => CustomCodeController::class,
    '/admin/criteria' => CriteriaController::class,
]);


// '/' => HomeController::class,

    Route::get('/admin',[DashboardController::class, 'index']);
    
    Route::get('/admin/product/image', [ProductController::class, 'productImage'])->name('admin.product.productImage');
    
    Route::get('/admin/product/image2', [ProductController::class, 'productImage2'])->name('admin.product.productImage2');
    
    
    Route::get('/admin/category',[CategoryController::class, 'index'])->name('admin.category.list');
    
    Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/admin/category/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/store',[CategoryController::class, 'store'])->name('admin.category.list.store');
    Route::post('/admin/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.list.update');
    
    Route::post('/admin/task-comment/store',[TaskAssignController::class, 'task_comment_store'])->name('taskComment.store');
    Route::post('/admin/task-comment/delete/{id}',[TaskAssignController::class, 'task_comment_delete'])->name('taskComment.delete');
    
    Route::post('/admin/task-status/update',[TaskAssignController::class, 'task_update_status'])->name('admin.task.update.status');
    
    Route::get('/admin/trashed/{table}',[TrashedController::class, 'index'])->name('admin.trashed');
    Route::delete('/admin/trashed/{table}/{id}',[TrashedController::class, 'destroy'])->name('admin.trashed.destroy');
    Route::get('/admin/trashed/restore/{table}/{id}',[TrashedController::class, 'restore'])->name('admin.trashed.restore');
    
    Route::get('/admin/dashboard2',[DashboardController::class, 'dashboard2'])->name('dashboard2');
    Route::get('/admin/test',[DashboardController::class, 'test'])->name('admin.test');
    
    Route::get('/admin', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/photo', [PhotoController::class, 'Index'])->name('photo.manage');
    
});

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/migrate', function() {
    $exitCode = Artisan::call('migrate');
    return 'Migrate Command Fired';
});


Route::get('/all-clear', function() {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    return 'Route, Config, Cache, View cache cleared';
});

// Route::resources([
//     '/admin' => DashboardController::class,
//     '/admin/slider2' => SliderController::class,
// ]);

Route::get('/{slug}', [HomeController::class, 'product_internal']);

Route::get('product/{slug}', [HomeController::class, 'product_internal']);
Route::get('/product/{category}', [HomeController::class, 'category_product']);
Route::get('/{category}/{slug}', [HomeController::class, 'category_product']);
Route::get('/{category}/{subCategory}/{slug}', [HomeController::class, 'category_subcategory_product']);
Route::get('/{category}/{subCategory}/{subCategory2}/{slug}', [HomeController::class, 'category_subcategory_subcategory2_product']);

Route::get('/search', [HomeController::class, 'search_criteria']);





// Route::get('about2', HomeController::class, name = >'about2');

// Route::resources([
//     '/about' => HomeController::class@about,
// ]);


// Route::get('/', 'admin\LocationController@destory')
    // ->name('/');

// Route::get('/', 'PhotoController::class@index');

        // Route::get('/home', 'home\HomeController@index')->name('home');	