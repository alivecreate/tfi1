<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'videos' =>  Video::orderBy('id', 'DESC')->get()
        ];
        return view('adm.pages.Video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['videos' =>  Video::all()];
        return view('adm.pages.Video.create',$data);
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
        ]);

        $list_no = Video::orderBy('created_at', 'desc')->first();

        if($list_no){
            $list_no =  $list_no->id + 1;
        }else{
            $list_no = 1;
        }
        if($request->status == null){
            $status = 0;
        }else{
            $status = 1;
        }
        $image_name = uploadImageThumb($request);
        $video = new Video;
        $video->title = $request->title;
        $video->short_description = $request->short_description;
        $video->video_date = $request->video_date;
        $video->youtube_embed = $request->youtube_embed;

        $video->status = $status;
        $save = $video->save();

        if($save){
            return back()->with('success', 'Video Added...');
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
        $data = [
            'video' =>  Video::find($id)
        ];
        return view('adm.pages.Video.edit', $data);
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

        ]);

        $list_no = Video::orderBy('created_at', 'desc')->first();

        if($list_no){
            $list_no =  $list_no->id + 1;
        }else{
            $list_no = 1;
        }
        if($request->status == null){
            $status = 0;
        }else{
            $status = 1;
        }

        
        $video =  Video::find($id);
        $video->title = $request->title;
        // $video->list_no = $request->list_no;
        $video->short_description = $request->short_description;
        $video->video_date = $request->video_date;
        $video->youtube_embed = $request->youtube_embed;

        $video->status = $status;
        $save = $video->save();

        if($save){
            return back()->with('success', 'Video Updated...');
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
    public function destroy(Video $video)
    {
        $video = $video->delete();
        if($video){
            return back()->with('success', 'Video Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
}
