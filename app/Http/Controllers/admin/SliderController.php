<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.pages.slider.index');
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
        $request->validate([
            // 'title' => 'required|max:255',
            // 'url' => 'url|max:255',
        ]);

        $slider_no = Slider::orderBy('created_at', 'desc')->first();
        // if($slider_no == null){
        //     $slider_no = 1;
        // }else{
        //     $slider_no = $slider_no + 1;
        // }

        // dd($slider_no);

        $image_name = uploadImageThumb($request);
        $slider = new Slider;
        $slider->slider_no = $slider_no;
        $slider->title = $request->title;
        $slider->image = $request->image_name;
        $slider->description = $request->description;
        $slider->url = $request->url;
        // $slider->admin_id = session('LoggedUser')->id;
               
        $save = $slider->save();

        if($save){
            return back()->with('success', 'Slider Added...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
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
