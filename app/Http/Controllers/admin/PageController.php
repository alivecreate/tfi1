<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Pages;

class PageController extends Controller
{
    public function productPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'product_page')->first(),
        ];
        return view('adm.pages.home-editor.product-page', $data);
    }

    public function aboutPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'about_page')->first(),
        ];
        return view('adm.pages.home-editor.about-page', $data);
    }

    public function testimonialPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'testimonial_page')->first(),
        ];
        return view('adm.pages.home-editor.testimonial-page', $data);
    }
    
    public function videoPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'video_page')->first(),
        ];
        return view('adm.pages.home-editor.video-page', $data);
    }

    public function blogPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'blog_page')->first(),
        ];
        return view('adm.pages.home-editor.blog-page', $data);
    }
    public function contactPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'contact_page')->first(),
        ];
        return view('adm.pages.home-editor.contact-page', $data);
    }

    public function pageEditorStore(Request $request){


        $ifExist = Pages::where('type', $request->type)->first();
        if($ifExist){

            $pageEditor = Pages::find($ifExist->id);
            $pageEditor->type = $request->type;
            $pageEditor->description = $request->description;
            $pageEditor->url = $request->url;
            $pageEditor->meta_title  = $request->meta_title;
            $pageEditor->meta_keyword  = $request->meta_keyword;
            $pageEditor->meta_description  = $request->meta_description;
            $pageEditor->status = 1;
            $save = $pageEditor->save();
            if($save){
                return back()->with('success', $request->type.' Details Updated...');
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }
        else{
            $pageEditor = new Pages;
            $pageEditor->type = $request->type;
            $pageEditor->description = $request->description;
            $pageEditor->url = $request->url;
            $pageEditor->meta_title  = $request->meta_title;
            $pageEditor->meta_keyword  = $request->meta_keyword;
            $pageEditor->meta_description  = $request->meta_description;
            $pageEditor->status = 1;
            $save = $pageEditor->save();
            if($save){
                return back()->with('success', $request->type.' Details Added...');
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }
    }

    
}
