<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\ItemPriority;
use DB;

class ItemPriorityController extends Controller
{
    
    public function updateItemNo(Request $request){
        // return($request->all());

        $positions = $request->position;
        // $positions = $request->table;
        
        $data = array();
        $ItemPriority = new ItemPriority;
        $ItemPriority->updateItemPriorityModel($positions, $request->table);
  	    
    }
}
