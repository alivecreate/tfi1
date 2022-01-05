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

use App\Http\Controllers\admin\PhotoManageController;







$adminRewrite = 'powerup';


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

//     Route::resource($adminRewrite,DashboardController::class);
// });

    
Route::prefix('powerup')->group(function () {

Route::post('/register/save', [AdminAuthController::class, 'save'])->name('admin.register.save');
Route::post('/auth/check', [AdminAuthController::class, 'check'])->name('admin.auth.check');

Route::get('/auth/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');

Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/register', [AdminAuthController::class, 'register']);

Route::group(['middleware'=> ['AuthCheck']], function(){
    
    

    // Route::post('/slider/update-status',[SliderController::class, 'update_list_no'])->name('slider.update-status');
    
    Route::resource('/slider',SliderController::class);

    
    Route::get('/block-control/top-inflatables',[BlockControlController::class, 'topInflatableCreate'])->name('admin.topInflatable.create');
    Route::post('/block-control/top-inflatables',[BlockControlController::class, 'topInflatableStore'])->name('admin.topInflatable.store');
    Route::delete('/block-control/delete',[BlockControlController::class, 'deleteBlockControl'])->name('admin.blockControl.delete');
    
    Route::get('/block-control/page-links',[BlockControlController::class, 'pageLinkCreate'])->name('admin.pageLink.create');
    Route::post('/block-control/page-links',[BlockControlController::class, 'pageLinkStore'])->name('admin.pageLink.store');

    Route::post('/block-control/page-links/update',[BlockControlController::class, 'pageLinkUpdate'])->name('admin.pageLink.update');
    
    //common links form categories, products, Testimonials, Blog, etc

    Route::get('/block-control/common-links/{pageType}',[BlockControlController::class, 'commonLinkCreate'])->name('admin.commonLink.create');
    Route::post('/block-control/common-links',[BlockControlController::class, 'commonLinkStore'])->name('admin.commonLink.store');
    Route::post('/block-control/common-links/update',[BlockControlController::class, 'commonLinkUpdate'])->name('admin.commonLink.update');
    

    // Route::delete('/block-control/delete',[BlockControlController::class, 'deleteBlockControl'])->name('admin.blockControl.delete');
    
    
    
    Route::get('/custom-code/js',[CustomCodeController::class, 'customJs'])->name('admin.customJs.create');
    
    
    // Route::get('/top-inflatable', [HomeEditorController::class, 'topInflatableCreate'])->name('top.inflatable');
    // Route::post('/top-inflatable/store', [HomeEditorController::class, 'topInflatableStore'])->name('top.inflatable.store');
    
    Route::delete('/top-inflatable/delete/{id}', [HomeEditorController::class, 'topInflatableDelete'])->name('admin.top.inflatable.delete');
    
    Route::get('/page-editor/about', [PageController::class, 'aboutPageEditor'])->name('admin.about-page.editor');
    Route::get('/page-editor/product', [PageController::class, 'productPageEditor'])->name('admin.product-page.editor');
    Route::get('/page-editor/testimonial', [PageController::class, 'testimonialPageEditor'])->name('admin.testimonial-page.editor');
    Route::get('/page-editor/video', [PageController::class, 'videoPageEditor'])->name('admin.video-page.editor');
    Route::get('/page-editor/blog', [PageController::class, 'blogPageEditor'])->name('admin.blog-page.editor');
    Route::get('/page-editor/contact', [PageController::class, 'contactPageEditor'])->name('admin.contact-page.editor');
    
    Route::post('/page-editor/store', [PageController::class, 'pageEditorStore'])->name('admin.page-editor.store');
    
    
    Route::get('/home-editor', [HomeEditorController::class, 'homeEditorIndex'])->name('admin.home.editor');
    
    Route::post('/about-store', [HomeEditorController::class, 'homeEditorAboutStore'])->name('admin.about.store');
    
    Route::post('/url-list1/store', [HomeEditorController::class, 'urlListStore1'])->name('admin.url-list1.store');
    Route::delete('/url-list1/delete/{id}', [HomeEditorController::class, 'urlListDelete1'])->name('admin.url-list1.delete');
    
    Route::get('/url-group', [UrlGroupController::class, 'UrlGroupIndex'])->name('admin.url.group');
    Route::get('/settings/social-media', [SettingController::class, 'socialMediaIndex'])->name('admin.setting.social-media');
    Route::post('/settings/social-media', [SettingController::class, 'socialMediaStore'])->name('admin.setting.social-media.store');
    
    Route::get('/settings/seo-manage', [SettingController::class, 'seoManageIndex'])->name('admin.setting.seo-manage');
    Route::post('/settings/seo-manage', [SettingController::class, 'seoManageStore'])->name('admin.setting.seo-manage.store');
    Route::post('/settings/seo-manage-image', [SettingController::class, 'seoManageImageStore'])->name('admin.setting.seo-manage-images.store');
    
    
    
    // Route::resource('/employee',EmployeeController::class);
    // Route::get('/category/petaKacheriStore',[CategoryController::class, 'petaKacheriStore'])->name('admin.petaKacheriStore');
    Route::post('/category/subCategoryStore', [CategoryController::class, 'subCategoryStore'])->name('admin.category.list.subCategoryStore');
    Route::post('/category/subCategory2Store', [CategoryController::class, 'subCategory2Store'])->name('admin.category.list.subCategory2Store');
    
    Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.category.list.delete');
    
    Route::get('/criteria/meta', [CriteriaController::class, 'criteriaMetaIndex'])->name('admin.criteria.meta.index');

    Route::post('/criteria/meta', [CriteriaController::class, 'criteriaMetaStore'])->name('admin.criteria.meta.store');
    
    Route::get('/criteria/meta/edit/{id}',[CriteriaController::class, 'criteriaMetaEdit'])->name('admin.criteria.meta.edit');
    
    Route::post('/criteria/meta/update', [CriteriaController::class, 'criteriaMetaUpdate'])->name('admin.criteria.meta.update');
    Route::delete('/criteria/meta/{id}',[CriteriaController::class, 'criteriaMetaDelete'])->name('admin.criteria.meta.delete');
    
   
    
   
    Route::resources([
        '/employee' => EmployeeController::class,
        '/client' => ClientController::class,
        '/task' => TaskController::class,
        '/task-assign' => TaskAssignController::class,
        '/product' => ProductController::class,
        '/testimonials' => TestimonialController::class,
        '/blog' => BlogController::class,
        '/video' => VideoController::class,
        '/custom-code' => CustomCodeController::class,
        '/criteria' => CriteriaController::class,
    ]);

// '/' => HomeController::class,

    Route::get('/',[DashboardController::class, 'index'])->name('admin.index');
    
    Route::get('/product/image', [ProductController::class, 'productImage'])->name('admin.product.productImage');
    
    Route::get('/product/image2', [ProductController::class, 'productImage2'])->name('admin.product.productImage2');
    
    Route::get('/category',[CategoryController::class, 'index'])->name('admin.category.list');
    
    Route::get('/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/store',[CategoryController::class, 'store'])->name('admin.category.list.store');
    Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.list.update');
    
    
    Route::get('/trashed/{table}',[TrashedController::class, 'index'])->name('admin.trashed');
    Route::delete('/trashed/{table}/{id}',[TrashedController::class, 'destroy'])->name('admin.trashed.destroy');
    Route::get('/trashed/restore/{table}/{id}',[TrashedController::class, 'restore'])->name('admin.trashed.restore');
    
    Route::get('/dashboard2',[DashboardController::class, 'dashboard2'])->name('dashboard2');
    Route::get('/test',[DashboardController::class, 'test'])->name('admin.test');
    

    Route::get('/photo', [PhotoManageController::class, 'index'])->name('admin.photo.manage');
    
});
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
Route::get('list-route', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});


// Route::resources([
//     '' => DashboardController::class,
//     '/slider2' => SliderController::class,
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


        // Route::get('/home', 'home\HomeController@index')->name('home');	