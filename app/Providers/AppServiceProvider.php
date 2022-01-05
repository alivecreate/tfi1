<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        error_reporting(0);

// dd(getFooterLinks());

        // function checkUrlLinkIsExist(){
        //     $get_url_lists = DB::table('url_list')->get();
        //     $tables = [
        //         [
        //             'table'=> 'categories',
        //             'type'=> 'category_link',
        //         ],
        //         [
        //             'table'=> 'products',
        //             'type'=> 'product_link',
        //         ],
        //         [
        //             'table'=> 'blogs',
        //             'type'=> 'blog_link',
        //         ],
        //         [
        //             'table'=> 'testimonials',
        //             'type'=> 'testimonial_link',
        //         ],

        //     ];
        //     foreach($tables as $table){
        //         // echo $table['table']. '-' .  $table['type'];
        //     }

        //     // dd($tableDatas);
            
        //     foreach($get_url_lists as  $get_url_list){

        //     if($get_url_list->type =  'category_link'){
        //         $tableDatas = DB::table('categories')->where(['id' => $get_url_list->item_id])->get()->count();
        //         $pageTitle = 'Category';
        //         $type = 'category_link';
        //         $table = 'categories';
        //     }
        //     elseif($get_url_list->type =  'product_link'){
        //         $tableDatas = DB::table('products')->where(['id' => $get_url_list->item_id])->get()->count();
        //         $pageTitle = 'Product';
        //         $type = 'product_link';
        //         $table = 'products';
        //     }
        //     elseif($get_url_list->type =  'blog_link'){
        //         $tableDatas = DB::table('blogs')->where(['id' => $get_url_list->item_id])->get()->count();
        //         $pageTitle = 'blog';
        //         $type = 'blog_link';
        //         $table = 'blogs';
        //     }
        //     elseif($get_url_list->type =  'testimonial_link'){
        //         $tableDatas = DB::table('testimonials')->where(['id' => $get_url_list->item_id])->get()->count();
        //         $pageTitle = 'testimonial';
        //         $type = 'testimonial_link';
        //         $table = 'testimonials';
        //     }
        //     // dd($get_url_list->id);
        //         if($tableDatas == 0){
        //             DB::table('url_list')->where(['id' => $get_url_list->id])->delete();
        //         }else{
        //             echo 'all good';
        //         }
        //     }

        
        // }
        // checkUrlLinkIsExist();
        
//         echo "<pre>";
//         // checkIfCriteriaMetaDataDeleted(84, 'products');
//         checkIfCriteriaMetaDataDeleted(271, 'categories');
//         echo "</pre>";
// die();
        
    // echo 'boot';

        // dd('boot');
    }
}
