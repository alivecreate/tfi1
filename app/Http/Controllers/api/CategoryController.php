<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getPetaKacheri($id){
        return response()->json(category::where('parent_id',$id)->get(), 200);
    }
    public function getDepartment($id){
        return response()->json(category::where('parent_id',$id)->get(), 200);
    }

    public function getSubcategoriesNoProducts($id){

        $getSubCategories = DB::table('categories')
        ->leftJoin('products','products.category_id', '=', 'categories.id' )         
        ->where('categories.parent_id', $id)
        ->where('products.category_id', null)
        ->select('categories.*')
        ->get();
    
        return $getSubCategories;


    // $getSubCategories = DB::table('categories')
    
    // ->join('products', 'products.category_id', '=', 'categories.id')
    // ->join('media', 'media.media_id', '=', 'products.id')
    
    // ->where('categories.parent_id', $id)->get();

    // return $getSubCategories;
        
    }
    
    public function checkIsProductAvailable($id){

    $getSubCategories = DB::table('categories')
    
    
    ->join('products', 'products.category_id', '=', 'categories.id')
    ->join('products.category_id', '!=', 'categories.id' )
    ->join('media', 'media.media_id', '=', 'products.id')
    
    ->where('categories.parent_id', $id)
    ->get();

    return $getSubCategories;

    //   return  DB::table('products')->whereNotIn('categories', $id);

    }


    public function getSubCategories($id){
        

    $getSubCategories = DB::table('products')
    
    ->join('categories', 'categories.id', '!=', 'products.category_id')
    ->where('categories.parent_id', $id)
    ->whereNotIn('products.category_id', [$id])
    ->orderBy('products.id')->get();


    // dd($getSubCategories);


    // $getSubCategories = DB::table('categories')
    // ->join('products', 'products.category_id', '=', 'categories.id')
    // // ->whereNotIn(['products.category_id' => $id])
    // ->whereNotIn('products.category_id', [$id])

    // ->orderBy('categories.id')->get();

    // dd($getSubCategories);

        return response()->json(category::where('parent_id',$id)->get(), 200);

    }
    

    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
