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
    
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'sliders' =>  Slider::orderBy('created_at', 'desc')->first(),
            'topInflatables' =>  TopInflatables::where('status',1)->orderBy('created_at', 'desc')->get(),
            'homeUrls1' =>  UrlList::where('type', 'home_url1')->where('status',1)->get(),
            'homeAbout' =>  Pages::where('type', 'home_about')->first(),
            'clients' =>  Client::where('status', 1)->get(),
            'pageData' =>  Pages::where('type', 'home_page')->first(),
        ];
        return view('sardar.index', $data);
    }
    public function product()
    {
        $data = [
            'pageData' =>  Pages::where('type', 'product_page')->first(),
            'products1' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(0)->take(5)->get(),
            'products2' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(5)->take(10)->get(),
            'products3' => Product::where('status', 1)->orderBy('id', 'DESC')->skip(10)->take(15)->get()
            // $art->products->skip(0)->take(10)->get();
        ];

        return view('sardar.product', $data);
    }
    
    public function product_internal()
    {
        $data = [
            'pageData' =>  Pages::where('type', 'product_page')->first(),
        ];
        return view('sardar.product-internal', $data);
    }

    public function product_details()
    {
        $data = [
            'pageData' =>  Pages::where('type', 'product_page')->first(),
        ];
        return view('sardar.product-detail', $data);
    }
    
    public function about()
    {
        $data = [
            'pageData' =>  Pages::where('type', 'about_page')->first(),
        ];
        return view('sardar.about', $data);
    }
    public function testimonials()
    {
        $data = [
            'testimonials' =>  Testimonials::where('status', 1)->limit(2)->get(),
            'pageData' =>  Pages::where('type', 'testimonial_page')->first(),
        ];
        return view('sardar.testimonials', $data);
    }
    public function videos()
    {
        $data = [
            'videos' =>  Video::where('status', 1)->get(),
            'pageData' =>  Pages::where('type', 'video_page')->first(),
        ];
        return view('sardar.videos', $data);
    }

    public function blog()
    {
        $data = [
            'blogs' =>  Blog::where('status', 1)->get(),
            'pageData' =>  Pages::where('type', 'blog_page')->first(),
        ];
        return view('sardar.blog', $data);
    }

    public function contact()
    {
        $data = [
            'current_page' =>  'contact',
            'pageData' =>  Pages::where('type', 'contact_page')->first(),
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
