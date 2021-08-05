<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function __construct(){
        $this->parent_categories = category::where(['parent_id'=>0])->orderBy('id','DESC')->get();

    }

    public function index()
    {
        // $data = ['parent_categories' =>  $this->parent_categories];
        // return view('adm.pages.product.index', $data);
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
        dd($request->input());

        $request->validate([
            'task_id' => 'required',
            'note_no' => 'required',
            'type' => 'required',
            'description' => 'required',
            'admin_id' => 'required',
            'date_inward' => 'required',
            'date_check' => 'required',
            'file_live_status' => 'required',
            'computer_file_status' => 'required',
            'cupboard_file_status' => 'required',

        ]);

        $task = new TaskAssign;
        $task->task_id = $request->task_id;   
        $task->note_no = $request->note_no;             
        $task->type = $request->type;      
        $task->description = $request->description;  
        $task->admin_id  = $request->employee_id ; 
        $task->date_inward = $request->date_inward;      
        $task->date_check  = $request->date_check;
        $task->file_live_status  = $request->file_live_status;
        $task->computer_file_status  = $request->computer_file_status;
        $task->cupboard_file_status  = $request->cupboard_file_status;
        $save = $task->save();
        // dd($task->id);

        if($save){

            $taskStatus = new TaskStatus;
            $taskStatus->status_id  = 1 ; 
            $taskStatus->task_assign_id = $task->id;
            $taskStatus->save();

            return back()->with('success', 'Task Assigned...');
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
