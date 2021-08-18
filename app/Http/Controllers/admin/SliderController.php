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
        $data = [
            'sliders' =>  Slider::orderBy('slider_no')->where('status',1)->get()
        ];
        return view('adm.pages.slider.index', $data);
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
            'title' => 'required',
            'image' => 'required',
        ]);

        $slider_no = Slider::orderBy('slider_no', 'desc')->first();

        if($slider_no){
            $slider_no =  $slider_no->slider_no + 1;
        }else{
            $slider_no = 1;
        }

        $image_name = uploadImageThumb($request);
        $slider = new Slider;
        $slider->slider_no = $slider_no;
        $slider->title = $request->title;
        $slider->image = $image_name;
        $slider->description = $request->description;
        $slider->url = $request->url;
        $slider->youtube_embed = $request->youtube_embed;
        
        $slider->status = 1;
        // $slider->admin_id = session('LoggedUser')->id;
        
        $save = $slider->save();


        if($save){
            $slider_list = Slider::find($slider->id);
            $slider_list->slider_no = $slider_no;
            // dd($slider->id);
            $slider_list->save();

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
    public function destroy(Slider $slider)
    {
        
        $slider = $slider->delete();
        if($slider){
            return back()->with('success', 'Slider Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    public function update_list_no($id){
        // dd($id);
        // Slider::find
                 
  	    $i=1;
  		foreach ($data as $key => $value) {
                $slider = Slider::find($value);
                $slider->slider_no = $i;
                $slider->save();
  			    //  $sql = "Update sliders SET slider_no=".$i." WHERE id=".$value;
  			    //  //echo $sql.'<br>';

    			// 	$query = $this->db->query($sql);

			$i++;
		}

    }
}
