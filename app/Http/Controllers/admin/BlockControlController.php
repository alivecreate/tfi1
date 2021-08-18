<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TopInflatables;
use App\Models\admin\Product;
use App\Models\admin\UrlList;
use App\Models\admin\Client;
use DB;

class BlockControlController extends Controller
{

    public function __construct(){
        $this->topInflatables = TopInflatables::orderBy('id','DESC')->get();

        $this->topInflatables = DB::table('top_inflatables')
        ->join('products', 'products.id', '=', 'top_inflatables.item_id')
        ->orderBy('top_inflatables.item_no')
        ->select('top_inflatables.id as id', 'products.name as name',  'top_inflatables.item_no as item_no', 
        'products.image as product_image', 'top_inflatables.status as status' )

        ->get();

    }
    
    public function topInflatableCreate()
    {
        $data = [
            'topInflatables' =>  $this->topInflatables,
            'products' =>  Product::orderBy('id', 'DESC')->where('status',1)->get()
        ];
        return view('adm.pages.block-control.top-inflatable', $data);
    }

    public function topInflatableStore(Request $request)
    {
        // dd($request->input());
        
        $request->validate([
            'product_id' => 'required|unique:top_inflatables,item_id',
        ]);

        $item_no = TopInflatables::orderBy('item_no')->first();
        
        if($item_no){
            $item_no = $item_no->id + 1;
        }else{
            $item_no = 1;
        }
        if($request->status==1){
            $status = 1;
        }else{
            $status = 0;
        }

        $topInflatable = new TopInflatables;
        $topInflatable->item_no = $item_no;
        $topInflatable->item_id = $request->product_id;
        $topInflatable->status = $status;
               
        $save = $topInflatable->save();

        if($save){
            return back()->with('success', 'Top Inflatable Added...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    
    

}
