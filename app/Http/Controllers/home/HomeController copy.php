<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slider;
use App\Models\admin\TopInflatables;
use App\Models\admin\UrlList;
use App\Models\admin\Pages;
use App\Models\admin\Video;
use App\Models\admin\Blog;
use App\Models\admin\Testimonials;
use App\Models\admin\Client;
use App\Models\admin\Product;
use App\Models\admin\Media;
use App\Models\admin\Category;
use App\Models\admin\CriteriaMeta;
use App\Models\admin\Criteria;

use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

            
        $this->footerTestimonial = testimonials::where(['status' => 1])->orderBy('item_no')->first();
        $this->footerVideo = Video::where(['status' => 1])->orderBy('item_no')->first();
        $this->footerBlog = Blog::where(['status' => 1])->orderBy('id','DESC')->first();

        $this->footerCategories = Category::where(['parent_id'=>0, 'status' => 1])->orderBy('id','DESC')->limit(8)->get();
        $this->footerProducts= Product::where(['status' => 1])->orderBy('id','DESC')->limit(8)->get();
        $this->footerBlogs = Blog::where(['status' => 1])->orderBy('id','DESC')->limit(8)->get();

        $this->footerTestimonials = testimonials::orderBy('item_no')->limit(8)->get();
        $this->parent_categories = Category::where(['parent_id'=>0])->orderBy('id','DESC')->get();
        $this->topCategories = Category::where(['parent_id'=>0])->orderBy('id','DESC')->limit(10)->get();
        $this->topCategories1 = Category::where(['parent_id'=>0])->orderBy('id','DESC')->skip(0)->take(5)->get();
        $this->topCategories2 = Category::where(['parent_id'=>0])->orderBy('id','DESC')->skip(5)->take(10)->get();
        

        // $criteriaMetas = CriteriaMeta::where(['status'=>1])->orderBy('item_no')->take(10)->get();


        $this->criteriaMetas = DB::table('criteria_metas')
                ->join('criterias', 'criterias.id', '=', 'criteria_metas.criteria_id')
                ->whereNotNull('criteria_metas.categories')
                ->where(['criteria_metas.status'=>1, 'criterias.status'=>1])

                ->select('criteria_metas.id as id', 'criteria_metas.categories as categories',
                'criterias.title as name', 'criterias.slug as slug', 'criteria_metas.criteria_id as criteria_id', 
                 'criteria_metas.status as status')
                ->orderBy('criteria_metas.item_no')->take(10)->get();
                
        // $criteriaArrayData = [];
        // $level = [];

        // foreach($criteriaMetas as $key => $criteriaMetaCats){
        //     $criteriaMetaCatsArrs = explode(',', $criteriaMetaCats->categories);

        //     foreach($criteriaMetaCatsArrs as $criteriaMetaCatsArr){
        //         $ActiveCat = Category::where(['id'=>$criteriaMetaCatsArr, 'status' => 1 ])->first();
        //         // dd($ActiveCat['status']);
        //         if($ActiveCat['status'] == 1){
        //             $criteriaArrayData[] = $ActiveCat->id;
        //         }
        //     }
        //     $level[] = ['id' => $key, 'data' => $criteriaArrayData];;
        // }

        // dd($criteriaMetas);
        
        // $criteriaArrayData[] = 
        // dd($criteriaMetaCats11);

                // $this->criteriaMetas;
        // $this->criteriaMetas = DB::table('criteria_metas')
        // ->join('categories', 'categories.id', '=', 'criteria_metas.item_id')
        // ->where(['categories.status' => 1, 'criteria_metas.status' => 1])
        
        // ->orderBy('criteria_metas.item_no')->take(10)->get();


    // $this->criteriaMetas = DB::table('criteria_metas')
    // ->join('categories', 'categories.id', '=', 'criteria_metas.item_id')
    // ->where(['categories.status' => 1, 'criteria_metas.status' => 1])
    // ->whereIn('categories.id', ['criteria_metas.categories'])
    
    // ->orderBy('criteria_metas.item_no')->limit(8)->get();
    
        
        // $this->topInflatables = DB::table('top_inflatables')
        // ->join('products', 'products.id', '=', 'top_inflatables.item_id')
        // ->orderBy('top_inflatables.item_no')
        // ->select('top_inflatables.id as id', 'products.name as name',  'top_inflatables.item_no as item_no', 
        // 'products.image as image', 'top_inflatables.status as status', 'products.slug as slug' )

        // ->get();

        // $this->topInflatables = DB::table('top_inflatables')
        // ->join('categories', 'categories.id', '=', 'top_inflatables.item_id')
        // ->orderBy('top_inflatables.item_no')
        // ->select('top_inflatables.id as id', 'categories.name as name',  'top_inflatables.item_no as item_no', 
        // 'categories.image as image', 'top_inflatables.status as status' , 'categories.slug as slug')
        // ->where('top_inflatables.status', 1)
        // ->get();

        $AllActiveMainCategories = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->get();
        // $topInflatableArray = [];


        foreach($AllActiveMainCategories as $AllActiveMainCategory){
            $subCatWithImages = DB::table('categories')->where('parent_id', $AllActiveMainCategory->id)->first();
            


        //     if(isset($subCatWithImages)){
        //     foreach($subCatWithImages as $subCatWithImage){
        //         // $subCatWithImage = DB::table('media')
        //         // ->orderBy('media.id')
        //         // ->where('media_id', $subCatWithImage->id)
        //         // ->get();
        //         // if(isset($subCatWithImage)){


        //         $subCatWithImages = DB::table('categories')
        //         ->join('media', 'media.media_id', '=', 'categories.id')
        //         ->where(['categories.status'=>1])
        //         ->where('media_id', $subCatWithImage->id)
        //         ->select('categories.*')
        //         ->orderBy('categories.item_no')->first();

        //         if(isset($subCatWithImages)){
        //             $topInflatableArray[] = $AllActiveMainCategory;
        //         }

        //         // echo "<pre>";
        //         //     count($subCatWithImages);
        //         //     print_r($subCatWithImages);
        //         // echo "</pre>";
        //         // $topInflatableArray[] = $AllActiveMainCategory;
        //         }

        // }
    }
    
        // dd($topInflatableArray);
        // die();

        $this->topInflatables1 = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(0)->take(3)->get();
        $this->topInflatables2 = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(3)->take(3)->get();
        $this->topInflatables3 = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(6)->take(3)->get();
        $this->topInflatables4 = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(9)->take(3)->get();
        
        $this->topInflatableAll = $AllActiveMainCategories;

        // $this->criteriaMetas = DB::table('categories')
        // ->join('categories', 'categories.id', '=', 'categories.item_id')
        // ->where(['status' => 1, 'parent_id' => 0])
        // ->orderBy('categories.item_no')->take(10)->get();


        // dd($this->topInflatableAll);
        // dd(array_chunk($this->topInflatableAll, 2, true));

        // foreach(array_chunk($this->topInflatableAll, 2) as $topInflatableAll1){
        //     print_r($topInflatableAll1);
        // }
        

        // dd($this->topInflatableAll);
        
    

        $isYoutubeSlider = Slider::orderBy('slider_no')->where('status', 1)->first();

        if(isset($isYoutubeSlider->youtube_embed)){
            $this->sliders = Slider::orderBy('slider_no')->where('status', 1)->first();
        }else{
            $this->sliders = Slider::orderBy('slider_no')->where('status', 1)->limit(5)->get();
        }

    }

    public function index()
    {
        $data = [
            'criteriaMetas' => $this->criteriaMetas,
            'sliders' =>   $this->sliders,
            'slider' =>   Slider::orderBy('slider_no')->first(),

            'topInflatables1' =>  $this->topInflatables1,
            'topInflatables2' =>  $this->topInflatables2,
            'topInflatables3' =>  $this->topInflatables3,
            'topInflatables4' =>  $this->topInflatables4,

            'topInflatableAll' =>  $this->topInflatableAll,

            'homeUrls1' =>  UrlList::where('type', 'home_url1')->where('status',1)->get(),
            'homeAbout' =>  Pages::where('type', 'home_page')->first(),
            'clients' =>  Client::where('status', 1)->limit(20)->orderBy('item_no')->get(),
            'pageData' =>  Pages::where('type', 'home_page')->first(),
            'topCategories' => $this->topCategories,
            // 'topInflatables' => TopInflatables::where('status', 1)->orderBy('item_no')->skip(0)->take(5)->get(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

            
            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
            
        ];
        return view('sardar.index', $data);
    }
    public function product(Request $request)
    {
        $searach_criteria = $request->inflatable;
        // dd($searach_criteria);
        
        $criteriaData = Criteria::where('slug', $searach_criteria)->first();

        if($searach_criteria){
            $searchData = CriteriaMeta::where('criteria_id', $criteriaData->id)->first();
        }else{
            $searchData = null;
        }

        $data = [
            
            'criteriaData' => $criteriaData,
            'criteriaMetaData' => $searchData,
            'criteriaMetas' => $this->criteriaMetas,
            'searchData' => $searchData,
            'pageData' =>  Pages::where('type', 'product_page')->first(),

            'topInflatables1' =>  $this->topInflatables1,
            'topInflatables2' =>  $this->topInflatables2,
            'topInflatables3' =>  $this->topInflatables3,
            'topInflatables4' =>  $this->topInflatables4,

            'topInflatableAll' =>  $this->topInflatableAll,

            'products1' => Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(0)->take(3)->get(),
            'products2' => Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(3)->take(3)->get(),
            'products3' => Category::where(['status' => 1, 'parent_id' => 0])->orderBy('item_no')->skip(6)->take(3)->get(),

            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'topCategories' => $this->topCategories,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        if($searach_criteria){
            return view('sardar.search', $data);
        }else{

            return view('sardar.product', $data);
        }
        
    }
    
    public function category_list()
    {

        $data = [
            'current_page' =>  'category_list_page',
            'pageData' =>  Pages::where('type', 'product_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];

        return view('sardar.product-internal', $data);
    }
    
    public function product_internal($slug)
    {

        $current_cat = Category::where(['slug' => $slug, 'status' => 1])->first();
        // dd($current_cat);
        if(!isset($current_cat)){
            return redirect(url('products'));
        }
        if($current_cat->status == 0){
            return redirect(url('products'));
        }

        $criteriaData = Criteria::where('slug', $slug)->first();
        $current_sub_cat = Category::where(['parent_id' => $current_cat->id, 'status' => 1])->limit(20)->get();
        
        // $current_sub_cat = DB::table('products')
        // // ->Join('products', 'products.category_id', '=', $current_cat->id)
        // ->leftjoin('categories', 'categories.parent_id', '=', $current_cat->id)
        
        // // ->orderBy('categories.id', 'desc')
        // ->where('products.category_id', $current_cat->id)
        // // ->select('products.*', 'categories.*')
        // ->get();

        $taskComments = DB::table('categories')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->where(['categories.parent_id' => $current_cat->id])
        ->select('categories.*', 'products.name as product_name')
        ->get();

        
        // dd($taskComments);
            $isCheckProductCategory = Product::where(['category_id' => $current_cat->id, 'status' => 1])->get();

        if($isCheckProductCategory){

            $list1 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(0)->take(3)->get();
            $list2 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(3)->take(3)->get();
            $list3 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(6)->take(3)->get();
            $list4 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(9)->take(3)->get();
            $list5 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(12)->take(3)->get();
          
        }else{
            
            $list1 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(0)->take(3)->get();
            $list2 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(3)->take(3)->get();
            $list3 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(6)->take(3)->get();
            $list4 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(9)->take(3)->get();
            $list5 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(12)->take(3)->get();
        }

        // $list1 = Category::where(['status'=> 1, 'parent_id' => $current_cat->id])->orderBy('id', 'DESC')->skip(0)->take(5)->get();
        // $list2 = Category::where(['status'=> 1, 'parent_id' => $current_cat->id])->orderBy('id', 'DESC')->skip(5)->take(10)->get();
        // $list3 = Category::where(['status'=> 1, 'parent_id' => $current_cat->id])->orderBy('id', 'DESC')->skip(10)->take(15)->get();
        
// dd($current_sub_cat);
        $data = [
            'pageData' =>  ['type' => 'category_page', 'featured_image' => $current_cat->image,  'image_alt' => $current_cat->name,
                            'image_title' => $current_cat->name, 'featured_image' => $current_cat->image,
                            'meta_description' => $current_cat->meta_description, 'meta_keyword' => $current_cat->meta_keyword,
                            'meta_title' => $current_cat->meta_title, 'meta_keyword' => $current_cat->meta_keyword,
                            'search_index' => $current_cat->search_index, 'search_follow' => $current_cat->search_follow,
                            'canonical_url' => $current_cat->canonical_url
                        ],

            // 'pageData' =>  $current_cat,
            'criteriaData' => $criteriaData,
            'criteriaMetas' => $this->criteriaMetas,
            'current_cat' =>  $current_cat,
            'current_sub_categories' =>  $current_sub_cat,

            'list1' => $list1,
            'list2' => $list2,
            'list3' => $list3,
            'list4' => $list4,
            'list5' => $list5,
            'type' => 'category',
            'mainCategory' => $current_cat->slug,

            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'footerTestimonial' =>  $this->footerTestimonial,

            'topCategories1' => $this->topCategories1,
            'topCategories2' => $this->topCategories2,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.product-internal', $data);
    }

    public function product_details($slug)
    {
        $product = Product::where(['slug' => $slug])->first();

        if(isset($product->category_id)){
            $category_id = getParentCategory($product->category_id)['category']->id;
            
            $subCategories = Category::where(['parent_id'=> $product->category_id, 'status' => 1])->limit(10)->get();
        }else{
            $noCategory = Category::first();
            $subCategories = Category::limit(10)->orderBy('id', 'DESC')->where(['parent_id'=> $product->category_id, 'status' => 1])->get();        
        }
    
        $criteriaData = Criteria::where('slug', $searach_criteria)->first();
        

        $product->id;

        $taskComments = DB::table('category')
        ->join('products', 'products.category_id', '=', 'category.id')
        ->where('category', 'category.slug', '=', $slug)
        ->select('task_assign.id as task_assign_id', 'task_assign.description as task_assign_description',
                'admins.name as admin_name', 'task_assign.description as task_assign_description',
                'task_comments.comment as comment', 'task_comments.seen as comment_seen',
                'task_comments.seen_time as comment_seen_time', 'task_comments.type as comment_type',
                'task_comments.created_at as comment_created_at',
                'status.name as status_name', 'admins.image as admin_image'

            )
        ->where(['task_comments.seen' => 0])

       
        ->orderBy('task_comments.id', 'DESC')

        ->get();

        $list1 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(0)->take(3)->get();
        $list2 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(3)->take(3)->get();
        $list3 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(6)->take(3)->get();
        $list4 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(9)->take(3)->get();
        $list5 = Category::where(['status' => 1, 'parent_id' => $current_cat->id])->orderBy('item_no')->skip(12)->take(3)->get();
   

        $category = Category::where('id', $product->category_id)->first();
        // dd('cat-'.$list1);

        $data = [
            'criteriaData' => $criteriaData,
            'criteriaMetas' => $this->criteriaMetas,
            'pageData' =>  ['type' => 'category_page', 'featured_image' => $category->image],
            'topCategories' => $this->topCategories,
            
            'list1' => $list1,
            'list2' => $list2,
            'list3' => $list3,
            'list4' => $list4,
            'list5' => $list5,
            'type' => 'product',
            'mainCategory' => $category->slug,
            'current_sub_categories' => $subCategories,
            'subCategories' => $subCategories,
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        
        return view('sardar.product-detail', $data);

    }

    public function category_product($category, $slug)
    {
        $current_cat = Category::where(['slug' => $slug, 'status' => 1])->first();
        if(!isset($current_cat)){
            // dd($current_cat);
            return redirect(url('products'));
        }
        if($current_cat->status == 0){
            // dd($current_cat);
            return redirect(url('products'));
        }
        $mainCategory = Category::find($current_cat->parent_id);
        $subCategory = Category::where(['parent_id' => $mainCategory->id, 'status' => 1])->get();

        // dd($subCategory);

        $isCheckCategory = Category::where(['slug' => $slug, 'status' => 1])->first();
        // $isCheckProduct = Product::where('category_id', $subCategory->id)->first();
        
            


        // if($isCheckProduct == null){
        //     return redirect(url(''));
        // }

        // $criteriaData = Criteria::where('slug', $searach_criteria)->first();
        
        // $main_category_data = getParentCategory($isCheckProduct->id)['category'];

        // dd(Criteria::whereIn('id', [$isCheckProduct->id])->get());

        $current_sub_cat = DB::table('categories')
        ->where('categories.id', $current_cat->id)
        ->first();


        // dd($current_sub_cat);
        
        $current_sub_categories = DB::table('categories')
        ->where('parent_id', $mainCategory->id)
        ->get();
        
        

        $subCategories = Category::where(['parent_id' => $isCheckCategory->id, 'status' => 1])->get();

        $data = [
            'pageData' =>  $isCheckCategory,
            'topCategories' => $this->topCategories,
            'subCategory' => $subCategory,
            'productDetail' =>  $isCheckCategory,
            'productImages' =>  Media::where('media_id', $current_cat->id)->get(),
            
            'type' => 'maincategory_product',
            'mainCategory' => $mainCategory,
            'current_cat' =>  $current_cat,


            'topCategories1' => $this->topCategories1,
            'topCategories2' => $this->topCategories2,

            'current_sub_categories' => $current_sub_categories,
            'subCategories' => $current_sub_cat,
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.product-detail', $data);
        

        // $current_sub_cat = DB::table('categories')
        // ->join('products', 'products.category_id', '=', 'categories.id')
        // ->orderBy('products.id', 'desc')
        // ->where('categories.slug', $slug)
        // ->get();

        // // dd($current_sub_cat->count() > 0);

        // $criteriaData = Criteria::where('slug', $slug)->first();
        // if($isCheckProduct){
        //     $mainCategorySlug = getParentCategory($isCheckProduct->category_id)['category']->slug;
        //     if($isCheckProduct->status == 0){
        //         return redirect(url('').'/'.$mainCategorySlug);
        //     }

        //     $mainCategory = Category::find($isCheckProduct->category_id);

        //     // dd($mainCategory);
        // if($current_sub_cat->count() > 0){

        //     $current_sub_cat = $current_sub_cat;
        // }else{

        //     $current_sub_cat = DB::table('categories')->where('parent_id',$mainCategory->id)->get();
        //     // dd($current_sub_cat);

        // }
            
        // $subCategories = Category::where(['parent_id' => $isCheckCategory->id, 'status' => 1])->get();
        //     $current_cat = $mainCategory;

        // $data = [
        //     'criteriaData' => $criteriaData,
        //     'criteriaMetas' => $this->criteriaMetas,
        //     'pageData' =>  $isCheckProduct,
        //     'topCategories' => $this->topCategories,
            
        //     'productDetail' =>  $isCheckProduct,
        //     'productImages' =>  Media::where('image_type', 'product')->where('media_id', $isCheckProduct->id)->get(),
            
        //     'type' => 'maincategory_product',
        //     'mainCategory' => $mainCategory,
        //     'current_cat' =>  $current_cat,
        //     'mainCategory' => $isCheckProduct,


        //     'topCategories1' => $this->topCategories1,
        //     'topCategories2' => $this->topCategories2,

        //     'current_sub_categories' => $current_sub_cat,
        //     'subCategories' => $current_sub_cat,
        //     'footerTestimonial' =>  $this->footerTestimonial,
        //     'footerVideo' =>   $this->footerVideo,
        //     'footerBlog' =>   $this->footerBlog,

        //     'footerCategories' =>   $this->footerCategories,
        //     'footerProducts' =>   $this->footerProducts,
        //     'footerBlogs' =>   $this->footerBlogs,
        //     'footerTestimonials' =>   $this->footerTestimonials,
        // ];
        // return view('sardar.product-detail', $data);

        // }else{
        //     $isCheckCategory = Category::where('slug', $slug)->first();
            
        //     $criteriaData = Criteria::where('slug', $slug)->first();
        //     if(!isset($isCheckCategory)){
        //         return redirect(url(''));
        //     }
        //     $isCheckProductCategory = Product::where(['category_id' => $isCheckCategory->id, 'status' => 1])->get();

        //     if($isCheckProductCategory){

        //         $list1 = Product::where(['status' => 1, 'category_id' => $isCheckCategory->id])->orderBy('item_id', 'DESC')->skip(0)->take(3)->get();
        //         $list2 = Category::where(['status' => 1, 'parent_id' => $isCheckCategory->id])->orderBy('item_id', 'DESC')->skip(3)->take(3)->get();
        //         $list3 = Category::where(['status' => 1, 'parent_id' => $isCheckCategory->id])->orderBy('item_id', 'DESC')->skip(6)->take(3)->get();
              
        //     }else{
        //         $list1 = Category::where(['status' => 1, 'parent_id' => $isCheckCategory->id])->orderBy('item_id', 'DESC')->skip(0)->take(3)->get();
        //         $list2 = Category::where(['status' => 1, 'parent_id' => $isCheckCategory->id])->orderBy('item_id', 'DESC')->skip(3)->take(3)->get();
        //         $list3 = Category::where(['status' => 1, 'parent_id' => $isCheckCategory->id])->orderBy('item_id', 'DESC')->skip(6)->take(3)->get();
        //     }
            
        //     $current_cat = Category::where('slug', $slug)->first();

        //     $mainCategory = getParentCategory($isCheckCategory->id)['category'];

        //     // dd($mainCategory);

        //     $subCategories = Category::where(['parent_id'=> $current_cat->id, 'status' => 1])->get();
        //     // dd('cat-'.$list1);

        //     $mainCategory = getParentCategory($isCheckCategory->id)['category']->slug;
        //     // dd($mainCategory);

        //     $data = [
        //         'criteriaData' => $criteriaData,
        //         'criteriaMetas' => $this->criteriaMetas,
        //         'pageData' =>  $current_cat,
        //         'topCategories' => $this->topCategories,
                
        //         'list1' => $list1,
        //         'list2' => $list2,
        //         'list3' => $list3,
        //         'type' => 'category',
        //         'mainCategory' => $mainCategory,
        //         'current_cat' =>  $current_cat,
        //         'current_sub_categories' =>  $subCategories,

        //         'topCategories' => $this->topCategories,

        //         'topCategories1' => $this->topCategories1,
        //         'topCategories2' => $this->topCategories2,

        //         'current_sub_categories' => $subCategories,
        //         'subCategories' => $subCategories,
        //         'footerTestimonial' =>  $this->footerTestimonial,
        //         'footerVideo' =>   $this->footerVideo,
        //         'footerBlog' =>   $this->footerBlog,
    
        //         'footerCategories' =>   $this->footerCategories,
        //         'footerProducts' =>   $this->footerProducts,
        //         'footerBlogs' =>   $this->footerBlogs,
        //         'footerTestimonials' =>   $this->footerTestimonials,
        //     ];
        //     return view('sardar.product-internal', $data);
        // }
        
        // return view('sardar.product-detail', $data);
    }

    public function category_subcategory_product($category, $subCategory, $slug)
    {

        $isProductDetails = Category::where('slug', $slug)->first();
        
        $criteriaData = Criteria::where('slug', $slug)->first();

        $current_sub_cat = Category::where(['parent_id' => $isProductDetails->id])->get();

        // $current_sub_cat = DB::table('categories')
        // ->join('products', 'products.category_id', '=', 'categories.id')
        // ->orderBy('products.id', 'desc')
        // ->where('categories.slug', $slug)
        // ->get();

            // dd($current_sub_cat);


        if($isProductDetails){
            // dd($mainCategory);
            
        $data = [
            'criteriaData' => $criteriaData,
            'criteriaMetas' => $this->criteriaMetas,
            'pageData' =>  $isCheckProduct,
            'productDetail' =>  $isCheckProduct,
            'productImages' =>  Media::where('image_type', 'product')->where('media_id', $isCheckProduct->id)->get(),
            
            'topCategories' => $this->topCategories,
            
                'type' => 'category',
                'mainCategory' => $mainCategory,
                'current_cat' =>  $current_cat,

            'type' => 'maincategory_subcategory_product',
            'mainCategory' => $mainCategory,

            'topCategories1' => $this->topCategories1,
            'topCategories2' => $this->topCategories2,

            'current_sub_categories' => $current_sub_cat,
            'subCategories' => $current_sub_cat,
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.product-detail', $data);

        }
        else{

            return redirect(url('products'));
        }
    }
    
    public function blog_details($slug)
    {
        $blog = Blog::where(['slug' => $slug, 'status' => 1])->first();
        if(!isset($blog)){
            return redirect(url('blog'));
        }

        $data = [
            'pageData' =>  Blog::where('slug', $slug)->first(),
            'blogDetail' =>  Blog::where('slug', $slug)->first(),
            'latestBlogs' =>  Blog::where('status',1)->limit(6)->get(),
            'topCategories' => $this->topCategories,

            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];

        return view('sardar.blog-detail', $data);

    }
    

    public function about()
    {
        $data = [
            'pageData' =>  Pages::where('type', 'about_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'topCategories' => $this->topCategories,

            'topInflatables1' =>  $this->topInflatables1,
            'topInflatables2' =>  $this->topInflatables2,
            'topInflatables3' =>  $this->topInflatables3,
            'topInflatables4' =>  $this->topInflatables4,

            'topInflatableAll' =>  $this->topInflatableAll,
            
            'products1' => Category::where(['status' => 1, 'parent_id' => 0])->orderBy('id', 'DESC')->skip(0)->take(5)->get(),
            'products2' => Category::where(['status' => 1, 'parent_id' => 0])->orderBy('id', 'DESC')->skip(5)->take(10)->get(),
            'products3' => Category::where(['status' => 1, 'parent_id' => 0])->orderBy('id', 'DESC')->skip(10)->take(15)->get(),

            
            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.about', $data);
    }
    public function testimonials()
    {
        $data = [
            'testimonials' =>  Testimonials::where(['status' => 1])->orderBy('item_no')->limit(50)->get(),
            'pageData' =>  Pages::where('type', 'testimonial_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'topCategories' => $this->topCategories,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.testimonials', $data);
    }
    public function videos()
    {
        $data = [
            'videos' =>  Video::where(['status' => 1])->orderBy('item_no')->get(),
            'pageData' =>  Pages::where('type', 'video_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'topCategories' => $this->topCategories,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.videos', $data);
    }

    public function blog()
    {
        $data = [
            'blogs' =>  Blog::where('status', 1)->orderBy('item_no')->get(),
            'pageData' =>  Pages::where('type', 'blog_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'topCategories' => $this->topCategories,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.blog', $data);
    }

    public function contact()
    {
        $data = [
            'current_page' =>  'contact',
            'pageData' =>  Pages::where('type', 'contact_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'topCategories' => $this->topCategories,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];

        return view('sardar.contact-us', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
