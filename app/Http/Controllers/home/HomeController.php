<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sardar.index');
    }
    public function product()
    {
        return view('sardar.product');
    }
    
    public function product_internal()
    {
        return view('sardar.product-internal');
    }

    public function product_details()
    {
        return view('sardar.product-detail');
    }
    
    public function about()
    {
        return view('sardar.about');
    }
    public function testimonials()
    {
        return view('sardar.testimonials');
    }
    public function videos()
    {
        return view('sardar.videos');
    }

    public function blog()
    {
        return view('sardar.blog');
    }

    public function contact()
    {
        return view('sardar.contact-us');
    }


    // CCPL
    public function manufacturing()
    {
        return view('sardar.manufacturing');
    }


    public function infrastructure ()
    {
        return view('sardar.infrastructure ');
    }


    public function corporate_video()
    {
        return view('sardar.corporate_video');
    }

    public function brochure()
    {
        return view('sardar.brochure');
    }
    public function team()
    {
        return view('sardar.team');
    }
    public function research_development()
    {
        return view('sardar.research_development');
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
