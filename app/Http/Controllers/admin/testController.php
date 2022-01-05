<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){

        return view('test.index');
    }

    public function create(Request $request){
        // dd($request->input());
        // echo $request->name;


        $data = [
                'product' => $request->input(),
                'specification' => ['screen' => '5.6', 'os' => 'android']
            ];

        return view('test.create', $data);
    }

}
