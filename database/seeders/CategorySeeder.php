<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::table('categories')->insert([
           
        ['name'=> 'કલેકટર કચેરી', 'description'=> 'કલેકટર કચેરી', 'parent_id'=> 0],
        ['name'=> 'વુડા કચેરી','description'=> 'વુડા કચેરી', 'parent_id'=> 0],
        ['name'=> 'વી.એમ.સી. કચેરી','description'=> 'વી.એમ.સી. કચેરી', 'parent_id'=> 0],
        ['name'=> 'કુબેરભુવન કચેરી','description'=> 'કુબેરભુવન કચેરી', 'parent_id'=> 0],
        ['name'=> 'નર્મદાભુવન કચેરી','description'=> 'નર્મદાભુવન કચેરી', 'parent_id'=> 0],
        ['name'=> 'ફાયર કચેરી','description'=> 'ફાયર કચેરી', 'parent_id'=> 0],
        ['name'=> 'સીટી સર્વે કચેરી','description'=> 'સીટી સર્વે કચેરી', 'parent_id'=> 0],
        ['name'=> 'મામલતદાર કચેરી','description'=> 'મામલતદાર કચેરી', 'parent_id'=> 0],
        ['name'=> 'આર.ટી.આઇ.','description'=> 'આર.ટી.આઇ.', 'parent_id'=> 0],
        ['name'=> 'વી.એમ.સી. વોર્ડ ઓફિસ','description'=> 'વી.એમ.સી. વોર્ડ ઓફિસ', 'parent_id'=> 0],
        ['name'=> 'MGVCL કચેરી','description'=> 'MGVCL કચેરી', 'parent_id'=> 0],
        ['name'=> 'ગેસ ડિપાર્ટમેન્ટ કચેરી','description'=> 'ગેસ ડિપાર્ટમેન્ટ કચેરી', 'parent_id'=> 0],
        ['name'=> 'પોસ્ટ ઓફિસ', 'description'=> 'પોસ્ટ ઓફિસ', 'parent_id'=> 0],
        ['name'=> 'બેન્ક વર્ક', 'description'=> 'બેન્ક વર્ક', 'parent_id'=> 0],
        ['name'=> 'ક્લાયન્ટ વર્ક', 'description'=> 'ક્લાયન્ટ વર્ક', 'parent_id'=> 0],
        ['name'=> 'Our Ofiice (office work)', 'description'=> 'Our Ofiice (office work)', 'parent_id'=> 0],
        ['name'=> 'જમીન મિલકત ખાતું', 'description'=> 'જમીન મિલકત ખાતું', 'parent_id'=> 2],
        ['name'=> 'રાજા ચીઠી વિભાગ', 'description'=>  'રાજા ચીઠી વિભાગ', 'parent_id'=> 2]
        ]);
    }
}
