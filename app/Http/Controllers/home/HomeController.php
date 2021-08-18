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
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->footerTestimonial = testimonials::orderBy('item_no')->first();
        $this->footerVideo = Video::orderBy('item_no')->first();
        $this->footerBlog = Blog::orderBy('id','DESC')->first();

        $this->footerCategories = Category::where(['parent_id'=>0, 'status' => 1])->orderBy('id','DESC')->limit(8)->get();
        $this->footerProducts= Product::where(['status' => 1])->orderBy('id','DESC')->limit(8)->get();
        $this->footerBlogs = Blog::where(['status' => 1])->orderBy('id','DESC')->limit(8)->get();

        $this->footerTestimonials = testimonials::orderBy('item_no')->limit(8)->get();
        

        $this->parent_categories = Category::where(['parent_id'=>0])->orderBy('id','DESC')->get();
        $this->topCategories = Category::where(['parent_id'=>0])->orderBy('id','DESC')->limit(8)->get();

        $this->topInflatables = DB::table('top_inflatables')
        ->join('products', 'products.id', '=', 'top_inflatables.item_id')
        ->orderBy('top_inflatables.item_no')
        ->select('top_inflatables.id as id', 'products.name as name',  'top_inflatables.item_no as item_no', 
        'products.image as image', 'top_inflatables.status as status', 'products.slug as slug' )

        ->get();

        $isYoutubeSlider = Slider::orderBy('slider_no')->first();

        if(isset($isYoutubeSlider->youtube_embed)){
            $this->sliders = Slider::orderBy('slider_no')->first();
        }else{
            $this->sliders = Slider::orderBy('slider_no')->limit(3)->get();
        }
        
    }

    public function index()
    {
        $data = [
            'sliders' =>   $this->sliders,
            'slider' =>   Slider::orderBy('slider_no')->first(),
            'topInflatables' =>  $this->topInflatables,
            'homeUrls1' =>  UrlList::where('type', 'home_url1')->where('status',1)->get(),
            'homeAbout' =>  Pages::where('type', 'home_page')->first(),
            'clients' =>  Client::where('status', 1)->get(),
            'pageData' =>  Pages::where('type', 'home_page')->first(),
            'topCategories' => Category::where('status', 1)->limit(12)->get(),
            // 'topInflatables' => Product::where('status', 1)->where('category_id', '!=', null)->orderBy('id', 'DESC')->skip(0)->take(5)->get(),
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
    public function product()
    {
        $data = [

            'pageData' =>  Pages::where('type', 'product_page')->first(),

            // 'mainCat1' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(0)->take(5)->get(),

            // $taskComments = DB::table('products')
            // ->join('category', 'category.id', '=', 'products.category_id')
            // ->select('category.id as category_id')

            // ->orderBy('products.id', 'DESC')
            // ->get(),

            'products1' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(0)->take(5)->get(),
            'products2' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(5)->take(10)->get(),
            'products3' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(10)->take(15)->get(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,


            // $art->products->skip(0)->take(10)->get();
        ];

        return view('sardar.product', $data);
    }

    public function category_list()
    {
        // dd('cat list');

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
        $current_cat = Category::where('slug', $slug)->first();

        // dd($current_cat);    

        $current_sub_cat = Category::where('parent_id', $current_cat->id)->limit(20)->get();

        $data = [
            'pageData' =>  Pages::where('type', 'product_page')->first(),

            'current_cat' =>  $current_cat,
            'current_sub_categories' =>  $current_sub_cat,

            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,
            'footerTestimonial' =>  $this->footerTestimonial,

            'topCategories' => $this->topCategories,

            'footerCategories' =>   $this->footerCategories,
            'footerProducts' =>   $this->footerProducts,
            'footerBlogs' =>   $this->footerBlogs,
            'footerTestimonials' =>   $this->footerTestimonials,
        ];
        return view('sardar.product-internal', $data);
    }

    public function product_details($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if(isset($product->category_id)){
            $category_id = getParentCategory($product->category_id)['category']->id;
            // dd($category_id);
            $subCategories = Category::where('parent_id', $category_id)->limit(10)->get();
        }else{
            $noCategory = Category::first();
            $subCategories = Category::limit(10)->orderBy('id', 'DESC')->where('parent_id', $noCategory)->get();        
        }
    
        $data = [
            'pageData' =>  Product::where('slug', $slug)->first(),
            'productDetail' =>  Product::where('slug', $slug)->first(),
            'productImages' =>  Media::where('image_type', 'product')->where('media_id', $product->id)->get(),
            'topCategories' => Category::where('status', 1)->limit(10)->get(),
            
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

    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)->first();


        $data = [
            'pageData' =>  Blog::where('slug', $slug)->first(),
            'blogDetail' =>  Blog::where('slug', $slug)->first(),
            'latestBlogs' =>  Blog::where('status',1)->limit(6)->get(),

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
            'testimonials' =>  Testimonials::where('status', 1)->limit(50)->get(),
            'pageData' =>  Pages::where('type', 'testimonial_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

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
            'videos' =>  Video::where('status', 1)->get(),
            'pageData' =>  Pages::where('type', 'video_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

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
            'blogs' =>  Blog::where('status', 1)->get(),
            'pageData' =>  Pages::where('type', 'blog_page')->first(),
            'footerTestimonial' =>  $this->footerTestimonial,
            'footerVideo' =>   $this->footerVideo,
            'footerBlog' =>   $this->footerBlog,

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
