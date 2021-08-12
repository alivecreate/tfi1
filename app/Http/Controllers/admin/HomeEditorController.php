<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TopInflatables;
use DB;

class HomeEditorController extends Controller
{
    
    public function topInflatableCreate()
    {
        $data = [
            'topInflatables' =>  TopInflatables::orderBy('id', 'DESC')->where('status',1)->get()
        ];
        return view('adm.pages.home-editor.top-inflatable', $data);
    }

    public function topInflatableStore(Request $request)
    {


        $request->validate([
            'title' => 'required|max:255',
            'url' => 'url|max:255',
        ]);

        $slider_no = TopInflatables::orderBy('created_at', 'desc')->first();
        if($slider_no){
            $slider_no = $slider_no->id + 1;
        }else{
            $slider_no = 1;
        }

        $image_name = uploadImageThumb($request);
        $topInflatable = new TopInflatables;
        $topInflatable->slider_no = $slider_no;
        $topInflatable->image = $image_name;
        $topInflatable->title = $request->title;
        $topInflatable->url = $request->url;
        $topInflatable->status = $request->status;
               
        $save = $topInflatable->save();

        if($save){
            return back()->with('success', 'Top Inflatable Added...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    public function topInflatableDelete($id)
    {
        // $topInflatable = $topInflatable->delete();
        $topInflatable = DB::table('top_inflatables')->where('id',$id)->delete();

        if($topInflatable){
            return back()->with('success', 'Top Inflatable Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

}
