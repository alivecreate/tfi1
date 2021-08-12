<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\UrlList;


class UrlListController extends Controller
{
    public function urlListStore1(Request $request){
        $urlList = new UrlList;
        $urlList->type = $request->type;
        $urlList->title = $request->title;
        $urlList->url = $request->url;
        $urlList->target = $request->target;
        $urlList->status = $request->status;
        $save = $urlList->save();

        if($save){
            return back()->with('success', 'Top Inflatable Added...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    
}
