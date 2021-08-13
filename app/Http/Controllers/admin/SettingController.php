<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\SocialMedia;

class SettingController extends Controller
{
    
    public function socialMediaIndex()
    {
        $data = [
            'socialMedia' =>  SocialMedia::first()
        ];

        return view('adm.pages.setting.social-media', $data);
    }


    
    public function store(Request $request)
    {
        
        $this->validate($request,[
        ]);
        
        $post = new SocialMedia;
        $last_id = $post::orderBy('id','desc')->first();

        if ($post->count() != 0) {
            $post = SocialMedia::find($last_id->id);
        }
        
        $telegram = "https://t.me/joinchat";
        $mystring = $request->telegram_group;
        if(strpos($mystring, $telegram) !== false){
            $telegram = str_replace($telegram,"https://telegram.me/joinchat",$request->telegram_group);
        }else{
            $telegram = $request->telegram_group;
        }

        
        $post->facebook = $request->facebook;
        $post->instagram = $request->instagram;
        $post->twitter = $request->twitter;
        $post->youtube = $request->youtube;
        $post->linkedin = $request->linkedin;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->whatsapp = $request->whatsapp;
        $post->whatsapp_group = $request->whatsapp_group;
        
        $post->facebook_embed = $request->facebook_embed;
        $post->youtube_embed = $request->youtube_embed;
        $post->map_embed = $request->map_embed;

        $save = $post->save();
        if($save){
            return back()->with('success', 'Social Media Updated...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
}

}
