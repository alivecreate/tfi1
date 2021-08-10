<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    // public function __construct(){
    //     $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

    // }

    // public function index()
    // {
    //     // $data = ['parent_categories' =>  $this->parent_categories];
    //     // return view('adm.pages.product.index', $data);
    // }

    public function __construct(){
        $this->products = Product::orderBy('id','DESC')->get();
        $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

    }

    public function index()
    {
        $data = [
            'products' =>  $this->products,
            'parent_categories' =>  $this->parent_categories
        ];
        return view('adm.pages.product.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = ['parent_categories' =>  $this->parent_categories];
        return view('adm.pages.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());

        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'full_description' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',

        ]);

        $image_name = uploadImageThumb($request);
        $product = new Product;
        $product->name = $request->name;   
        $product->short_description = $request->short_description;             
        $product->full_description = $request->full_description;      
        $product->image  = $image_name ; 
        $product->image_alt = $request->image_alt;      
        $product->meta_title  = $request->meta_title;
        $product->meta_keyword  = $request->meta_keyword;
        $product->meta_description  = $request->meta_description;
        $product->category_id  = $request->category_id;
        $save = $product->save();

        // dd($task->id);

        if($save){
            // $taskStatus = new TaskStatus;
            // $taskStatus->status_id  = 1 ; 
            // $taskStatus->task_assign_id = $task->id;
            // $taskStatus->save();
            return back()->with('success', 'New Product Added...');
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
            'product' =>  Product::find($id), 'parent_categories' => $this->parent_categories
        ];

        return view('adm.pages.product.edit', $data);
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
            'name' => 'required',
            'short_description' => 'required',
            'full_description' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',

        ]);

        if($request->file('image')){
            $image_name = uploadImageThumb($request);
        }else{
            $image_name = $request->old_image;
        }
        
        $product =  Product::find($id);
        $product->name = $request->name;   
        $product->short_description = $request->short_description;             
        $product->full_description = $request->full_description;      
        $product->image  = $image_name ; 
        $product->image_alt = $request->image_alt;       
        $product->image_title  = $request->image_title;
        $product->meta_keyword  = $request->meta_keyword;
        $product->meta_description  = $request->meta_description;
        $product->category_id  = $request->category_id;
        $save = $product->save();

        if($save){
            return back()->with('success', 'Product Updated...');
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
    public function destroy(Product $product)
    {
        $product = $product->delete();
        if($product){
            return back()->with('success', 'Product Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }


}
