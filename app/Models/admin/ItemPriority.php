<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ItemPriority extends Model
{
    use HasFactory;

    // function updateSlider($data = array()){ 

    function updateItemPriorityModel($data = array(), $table){
        // dd($data);
        switch ($table) {
            case 'testimonial':
                $table = 'testimonials';
                break;
                case 'video':
                    $table = 'videos';
                    break;
                case 'top_inflitable':
                    $table = 'top_inflatables';
                    break;
                
            default:               
                $table = 'no-table';
                break;
        }
        $i=1;
        foreach ($data as $key => $value) {
              DB::table($table)
              ->where('id',$value)
              ->update(['item_no'=>$i]);
          $i++;
      }
    }
}
