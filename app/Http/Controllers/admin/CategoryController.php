<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

        function customRedirect($routeName, $id, $type){
            return redirect(route($routeName, $id, $type))->with('success', 'Category Updated...');
        }
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

        $request->validate([
            'category' => 'required|max:255',
        ]);

        $status = ($request->status == null ? 0 : 1);
        $category = new Category;
        $category->name = $request->category;
        $category->description  = $request->category_description ;

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
        dd($request->input());

        if($request->type == 'category'){
            $request->validate([
                'category_name' => 'required|max:255',
                'category_description' => 'required|max:255',
            ]);
            if($request->category_parent_id1 == null){
                $category_parent_id1 = 0;
            }else{
                $category_parent_id1 = $request->category_parent_id1;
            }

            $category = Category::find($id);
            $category->name = $request->category_name;
            $category->description  = $request->category_description ;
            $category->parent_id  = 0;
            $save = $category->save();

            if($save){
                return back()->with('success', 'Category Updated...');
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }

        if($request->type == 'subcategory'){
            $request->validate([
                'subcategory_name' => 'required|max:255',
                'subcategory_description' => 'required|max:255',
                
            ]);
            
            // if($request->category_parent_id1 == null){
            //     $category_parent_id1 = 0;
            // }else{
            //     $category_parent_id1 = $request->category_parent_id1;
            // }
            
            if($subcategory_parent_id = $request->subcategory_parent_id == null){
                $subcategory_parent_id = $request->category_parent_id;
                if($parent_category_id = $subcategory_parent_id == null ? 0 :$subcategory_parent_id){
                    $parent_category_id = 0;
                    $category_type = 'category';
                }else{
                    $parent_category_id = $subcategory_parent_id;
                    $category_type = 'subcategory';
                }
            }else{
                $subcategory_parent_id = $request->subcategory_parent_id;
            }

            $category = Category::find($id);
            $category->name = $request->subcategory_name;
            $category->description  = $request->subcategory_description ;
            $category->parent_id  = $category_parent_id1;
            $save = $category->save();

            if($save){
                return back()->with('success', 'New Sub Category Added...');
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }


        if($request->type == 'subcategory2'){


            // dd($request->input());

            // die();
            $request->validate([
                'subcategory2_name' => 'required|max:255',
                'subcategory2_description' => 'required|max:255',
            ]);
            
            // $subcategory_parent_id = $request->subcategory_parent_id == null ? $request->category_parent_id : $request->subcategory_parent_id;
            // $parent_category_id = $subcategory_parent_id == null ? 0 :$subcategory_parent_id;
            
            if($subcategory_parent_id = $request->subcategory_parent_id == null){
                $subcategory_parent_id = $request->category_parent_id;
                if($parent_category_id = $subcategory_parent_id == null ? 0 :$subcategory_parent_id){
                    $parent_category_id = 0;
                    $category_type = 'category';
                }else{
                    $parent_category_id = $subcategory_parent_id;
                    $category_type = 'subcategory';
                }
            }else{
                $subcategory_parent_id = $request->subcategory_parent_id;
            }

            $category = Category::find($id);
            $category->name = $request->subcategory2_name;
            $category->description  = $request->subcategory2_description ;
            $category->parent_id  = $parent_category_id;
            $save = $category->save();

            if($save){
                if($request->subcategory_parent_id == null)
                   {
                    // customRedirect('admin.category.edit', $subcategory_parent_id, 'subcategory2');

                    return redirect(route('admin.category.edit', $id))->with('success', 'Category Updated...');

                   }else{
                    return back()->with('success', 'New Sub Category2 Added...');
                   }
                    
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category->delete();
    }
}
