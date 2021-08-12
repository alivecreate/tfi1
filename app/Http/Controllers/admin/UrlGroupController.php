<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\UrlGroup;

class UrlGroupController extends Controller
{
    public function UrlGroupIndex(){
        
        $data = [
            'urlGroups' =>  UrlGroup::orderBy('id', 'DESC')->get()
        ];
        return view('adm.pages.url-manage.url-group', $data);
    }

}
