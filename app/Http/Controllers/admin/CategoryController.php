<?php

namespace App\Http\Controllers\admin;

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

    public function __construct(){
        $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

        // function customRedirect($routeName, $id, $type){
        //     return redirect(route($routeName, $id, $type))->with('success', 'Category Updated...');
        // }
    }
    

    public function index()
    {
        
        $data = ['parent_categories' =>  $this->parent_categories];
        return view('adm.pages.category.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['parent_categories' =>  $this->parent_categories];
        return view('adm.pages.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // if($request->parent_id == null){
        //     $parent_id = 0;
        // }else{
        //     $parent_id = 0;
        // }

        $image_name = uploadImageThumb($request);
        $status = ($request->status == null ? 0 : 1);
        $category = new Category;
        $category->name = $request->name;
        $category->description  = $request->description ;
        
        $category->image  = $image_name ; 
        $category->image_alt = $request->image_alt;      
        $category->image_title = $request->image_title;      
        $category->slug  = $request->slug;
        $category->meta_title  = $request->meta_title;
        $category->meta_keyword  = $request->meta_keyword;
        $category->meta_description  = $request->meta_description;

        $category->status  = $status;

        // if($request->parent_id == null){
        //     $parent_id = 0;
        // }else{
        //     $parent_id = $request->parent_id;
        // }

        $category->parent_id  = $request->parent_id;

        $save = $category->save();

        if($save){
            return back()->with('success', 'New Category Added...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    public function subCategoryStore(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'subcategory_name' => 'required|max:255',
            'subcategory_description' => 'required|max:255',
            'category_parent_id1' => 'required',
            
        ]);

        $category = new Category;
        $category->name = $request->subcategory_name;
        $category->description  = $request->subcategory_description ;
        $category->parent_id  = $request->category_parent_id1;
        $status = ($request->status == null ? 0 : 1);
        $category->status  = $status;
        
        $category->image  = $image_name ; 
        $category->image_alt = $request->image_alt;      
        $category->slug  = $request->slug;
        $category->meta_title  = $request->meta_title;
        $category->meta_keyword  = $request->meta_keyword;
        $category->meta_description  = $request->meta_description;
        $category->status  = 1;


        $save = $category->save();

        if($save){
            return back()->with('success', 'New Sub Category Added...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }

    }


    public function subCategory2Store(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'subcategory2_name' => 'required|max:255',
            'subcategory2_description' => 'required|max:255',
            'category_parent_id' => 'required',
            'subcategory_parent_id' => 'required',
            
        ]);

        $category = new Category;
        $category->name = $request->subcategory2_name;
        $category->description  = $request->subcategory2_description ;
        $category->parent_id  = $request->subcategory_parent_id;
        $status = ($request->status == null ? 0 : 1);

        $category->status  = $status;

        $save = $category->save();

        if($save){
            return back()->with('success', 'New Sub Category2 Added...');
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
    public function edit(Request $request, $id)
    {
        // return $id;
        editPageErrorHelper('category', $id);
        
        $cat = category::where(['parent_id'=>0])->whereNotIn('id',[$id])
        ->orderBy('id','DESC')->get();
        // dd($cat);

        $data = ['type'=> $request->type, 
                'categories' =>  category::where(['parent_id'=>0])->whereNotIn('id',[$id])
                                ->orderBy('id','DESC')->get(),
                
                 'data'=> Category::where('id', $id)->first()];
                //  dd($data);

        // dd(Category::where('id', $id)->first());
        return view('adm.pages.category.edit',$data);
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
        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            
        ]);
  
        if($request->file('image')){
            $image_name = uploadImageThumb($request);
        }else{
            $image_name = $request->old_image;
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description  = $request->description ;
        
        $category->image  = $image_name ; 
        $category->image_alt = $request->image_alt;      
        $category->image_title = $request->image_title;      
        $category->slug  = $request->slug;
        $category->meta_title  = $request->meta_title;
        $category->meta_keyword  = $request->meta_keyword;
        $category->meta_description  = $request->meta_description;

        $category->parent_id  = $request->parent_id;
        $category->status  = 1;
        $save = $category->save();

            if($save){
                return back()->with('success', 'Category Updated...');
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
    public function destroy(Category $category)
    {
        $category = $category->delete();
        if($category){
            return back()->with('success', 'category Deleted... 000 ');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $delete = $category->delete();
        
        if($delete){
            DB::table('categories')
            ->where('parent_id',$id)
            ->update(['parent_id'=>0]);
            return back()->with('success', 'Category Deleted... 111');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }

    }

    
}
