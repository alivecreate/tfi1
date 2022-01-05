<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Criteria;
use App\Models\admin\CriteriaMeta;
use App\Models\admin\Category;
use App\Models\admin\Product;

use DB;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [
            'criterias' =>  Criteria::orderBy('item_no')->get()
        ];
        return view('adm.pages.criteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $item_no = Criteria::orderBy('item_no', 'desc')->first();

        if($item_no){
            $item_no =  $item_no->item_no + 1;
        }else{
            $item_no = 1;
        }
        
        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }
        
        $criteria = new Criteria;
        $criteria->item_no = $item_no;
        $criteria->title = $request->title;
        $criteria->slug = $request->slug;
        
        $criteria->status = $status;
        
        $save = $criteria->save();
        if($save){
            $criteria_list = Criteria::find($criteria->id);
            $criteria_list->item_no = $item_no;
            $criteria_list->save();

            return back()->with('success', 'Criteria Added...');
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
        $criteria = Criteria::find($id);
        if(!isset($criteria)){
            return redirect(route('criteria.index'));
        }
        
        $data = [
            'criteria' =>  Criteria::find($id),
            'criterias' =>  Criteria::all()
        ];

                
        return view('adm.pages.criteria.edit',$data);

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

        ]);

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }
        
        $criteria =  Criteria::find($id);
        $criteria->title = $request->title;
        $criteria->slug = $request->slug;

        $criteria->status = $status;
        $save = $criteria->save();

        if($save){
            return back()->with('success', 'Criteria Updated...');
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
    
    public function destroy($id)
    {
        $criteria = DB::table('criterias')->where('id', $id)->delete();
        if($criteria){
            return back()->with('success', 'Criteria Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    public function criteriaMetaDelete($id)
    {
        $criteria = DB::table('criteria_metas')->where('id', $id)->delete();
        if($criteria){
            return back()->with('success', 'Criteria Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    
    public function criteriaMetaIndex()
    {
        $criterias = Criteria::orderBy('title')->get();
        $data = [
            'criterias' =>  Criteria::orderBy('title')->get(),
            'criteriaMetas' =>  CriteriaMeta::all(),
            'categories' =>  Category::orderBy('name')->get(),
            'products' =>  Product::orderBy('name')->get(),
        ];
        return view('adm.pages.criteria.criteria-meta-index', $data);
    }
    public function criteriaMetaStore(Request $request)
    {   
// dd($request->input());
        
        $request->validate([
            'criteria' => 'required',
        ]);

        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }


        $criteriaMeta = CriteriaMeta::where('criteria_id',$request->criteria)->first();

        if(!$criteriaMeta){
            $criteriaMeta = new CriteriaMeta; 
        }
        $criteriaMeta->criteria_id = $request->criteria;
        
        if($request->categories){
            $criteriaMeta->categories = implode(",",$request->categories);
        }
        if($request->products){
            $criteriaMeta->products = implode(",",$request->products);
        }

        $criteriaMeta->status = $status;
        $save = $criteriaMeta->save();
        if($save){
            return back()->with('success', 'CriteriaMeta Saved...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    public function criteriaMetaEdit($id)
    {
        $criteriaMeta = CriteriaMeta::find($id);
        if(!isset($criteriaMeta)){
            return redirect(route('admin.criteria.meta.index'));
        }

        $data = [
            'criteria' =>  Criteria::find($criteriaMeta->criteria_id),
            'criteriaMeta' =>  CriteriaMeta::find($id),

            'criteriaMetas' =>  CriteriaMeta::all(),
            'criterias' =>  Criteria::orderBy('title')->get(),
            'categories' =>  Category::orderBy('name')->get(),
            'products' =>  Product::orderBy('name')->get(),
        ];

                
        return view('adm.pages.criteria.criteria-meta-edit',$data);

    }

    public function criteriaMetaUpdate(Request $request)
    {   
        // dd($request->input());

        $criteriaMeta = CriteriaMeta::find($request->id);

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }


        if($request->categories){
            $criteriaMeta->categories = implode(",",$request->categories);
        }else{
            $criteriaMeta->categories = null;
        }
        if($request->products){
            $criteriaMeta->products = implode(",",$request->products);
        }else{
            $criteriaMeta->products = null;
        }
        $criteriaMeta->status = $status;
        // dd($status);
        $save = $criteriaMeta->save();
        if($save){
            return back()->with('success', 'CriteriaMeta Saved...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
    
    
}
