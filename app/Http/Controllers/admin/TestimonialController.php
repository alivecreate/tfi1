<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Testimonials;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [
            'testimonials' =>  Testimonials::orderBy('item_no')->get()
        ];
        return view('adm.pages.testimonial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['testimonials' =>  Testimonials::all()];
        return view('adm.pages.testimonial.create',$data);
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

            'image' => 'required|image|mimes:jpg,png,jpeg|max:'.getMaxUploadSide(),
        ]);

         
        $item_no = Testimonials::orderBy('item_no', 'desc')->first();

        if($item_no){
            $item_no =  $item_no->item_no + 1;
        }else{
            $item_no = 1;
        }
        

        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }

        $image_name = uploadImageThumb($request);
        $testimonial = new Testimonials;
        $testimonial->client_name = $request->client_name;
        $testimonial->item_no = $item_no;
        $testimonial->title = $request->title;
        $testimonial->short_description = $request->short_description;
        $testimonial->full_description= $request->full_description;
        $testimonial->image = $image_name;

        $testimonial->image_alt = $request->image_alt;      
        $testimonial->image_title = $request->image_title;  
        
        $testimonial->youtube_embed = $request->youtube_embed;
        $testimonial->slug = $request->slug;
        
        $testimonial->status = $status;
        $save = $testimonial->save();

        if($save){
            return back()->with('success', 'Testimonials Added...');
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
        $testimonial = Testimonials::find($id);
        $data = [
            'testimonial' =>  $testimonial
        ];

        if($testimonial){
            return view('adm.pages.testimonial.edit', $data);
        }else{
            return redirect(route('testimonials.index'))->with('fail', 'Testimonials Not Available...');
        }
        
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
        $request->validate([

            'image' => 'image|mimes:jpg,png,jpeg|max:'.getMaxUploadSide(),
        ]);

        $item_no = Testimonials::orderBy('item_no', 'desc')->first();
        if($item_no){
            $item_no =  $item_no->item_no + 1;
        }else{
            $item_no = 1;
        }

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        if($request->file('image')){
            $image_name = uploadImageThumb($request);
        }else{
            $image_name = $request->old_image;
        }
        
        $testimonial =  Testimonials::find($id);
        $testimonial->client_name = $request->client_name;
        $testimonial->title = $request->title;
        $testimonial->short_description = $request->short_description;
        $testimonial->full_description= $request->full_description;
        $testimonial->image = $image_name;
        $testimonial->image_alt = $request->image_alt;      
        $testimonial->image_title = $request->image_title;  

        $testimonial->youtube_embed = $request->youtube_embed;
        $testimonial->slug = $request->slug;
        
        $testimonial->status = $status;
        $save = $testimonial->save();

        if($save){
            return back()->with('success', 'Testimonials Updated...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonials $testimonial)
    {
        $testimonial = $testimonial->delete();
        
        deleteTableUrlData($testimonial->id, 'category_link');

        if($testimonial){
            return back()->with('success', 'Testimonial Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
}
