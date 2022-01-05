<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\admin\Media;
use DB;

class ApiCallController extends Controller
{
    public function sendContact(Request $request){
        // New code for captcha


        // return ($request->input());
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['token_response'])){
    // return ($request->input());
    $url='https://www.google.com/recaptcha/api/siteverify';
    $secret='6Ld3ciIdAAAAAOiQD-WpAW_81lrWOW1wNR-EGIWE';
    $recaptcha_response=$_POST['token_response'];
    
    $requestRecaptcha = file_get_contents($url . '?secret=' . $secret . '&response=' . $recaptcha_response);
    $response = json_decode($requestRecaptcha);
    
    if($response->success==true && $response->score >= 0.5){
        $to = 'sales@giantinflatables.in';

        sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
            ['name'=>$request->name,
            'phone'=>$request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'msg' => $request->message,
            'page_url' => $request->page_url,
        ]);
        return ['status' => 'success', 'message' => 'Thank you for showing interest in our work and sending 
        us the quote request. We will get back to you within 24 hours.'];
        
    }else{
        
        $to = 'sales@giantinflatables.in';
        sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
            ['name'=>$request->name,
            'phone'=>$request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'msg' => $request->message,
            'page_url' => $request->page_url,

        ]);
        return ['status' => 'fail', 'message' => 'Thank you for showing interest in our work and sending 
        us the quote request. We will get back to you within 24 hours.'];   
    }   
}else{
    return 'err';
}
        

// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['token_response'])){
//     $url='https://www.google.com/recaptcha/api/siteverify';
//     $secret='6Ld3ciIdAAAAAOiQD-WpAW_81lrWOW1wNR-EGIWE';
//     $recaptcha_response=$_POST['token_response'];
    
//     $requestRecaptcha = file_get_contents($url . '?secret=' . $secret . '&response=' . $recaptcha_response);
//     $response = json_decode($requestRecaptcha);
    
//     return $response();

//     if($response->success==true && $response->score >= 0.5){
//         // return 'recaptcha success';
//         $to = 'manage@giantinflatables.in';

//         sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
//             ['name'=>$request->name,
//             'phone'=>$request->phone,
//             'email' => $request->email,
//             'country' => $request->country,
//             'msg' => $request->message,
//             'page_url' => $request->page_url,
//         ]);
//         return ['status' => 'success', 'message' => 'Thank you for showing interest in our work and sending 
//         us the quote request. We will get back to you within 24 hours.'];
        
//     }else{
//         // return 'recaptcha failed';
        
//         // $to = 'manage@giantinflatables.in';
//         // sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
//         //     ['name'=>$request->name,
//         //     'phone'=>$request->phone,
//         //     'email' => $request->email,
//         //     'country' => $request->country,
//         //     'msg' => $request->msg,
//         //     'page_url' => $request->page_url,
//         // ]);
        
//         return ['status' => 'fail', 'message' => 'Thank you for showing interest in our work and sending 
//         us the quote request. We will get back to you within 24 hours.'];   
//     }   
// }


        // Old Code 
        // dd('send contact');
        // dd($request->input());
        // mail@giantinflatables.in
            $to = 'manage@giantinflatables.in';

           

            sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
                 ['name'=>$request->name, 'phone'=>$request->phone,
                  'email' => $request->email,
                  'country' => $request->country,
                  'msg' => $request->message,
                  'page_url' => $request->page_url,

            ]);

            // if (Mail::failures()) {
            //     dd('failed mails');
            //     // return new Error(Mail::failures()); 
            // }else{
            //     dd('mail sent');
            // }
            // check for failed ones
       

        // else do redirect back to normal
        return back()->with('success', 'Contact Inquiry Sent...');
    }


    public function sendContactEnquiry(Request $request){
        // dd('send Product enquiry');

        // dd($request->input());
        // mail@giantinflatables.in
            $to = 'manage@giantinflatables.in';

            sendMailNotification('enquire', $to, 'Enquire From: '.$request->name,
                 ['name'=>$request->name,
                  'phone'=>$request->phone,
                  'email' => $request->email,
                  'country' => $request->country,
                  'title' => $request->title,
                  'image' => $request->image,
                  'product_url' => $request->product_url,
                  'page_url' => $request->page_url,
                  'msg' => $request->message
            ]);

            // check for failed ones
        if (Mail::failures()) {
            // return failed mails
            return new Error(Mail::failures()); 
        }

        // else do redirect back to normal
        return back()->with('success', 'Contact Inquiry Sent...');
    }

    public function testMail(){

        sendMailNotification('comment', 'manage@giantinflatables.in', 'Comment From '. 'Contact Page',
                ['name'=>'Admin','client_name' => 'Mahesh Bhai', 'msg' => 'Testing Mail',
                'task_name' => 'Sending Mail', 'satus' => 1,
                'url' => 'https://www.giantinflatables.in', 
        ]);

        return back()->with('success', 'Contact Inquiry Sent...');
    }


    public function UploadMultipleImage(Request $request){

        // dd($request->file('image')[0]);

        // dd($request->input());

        header("Access-Control-Allow-Origin: *");

        $image_name = uploadMultipleImageThumb($request);
       
        // dd($image_name);
        foreach($image_name as $index => $image_name){
            $media = new Media;
            $media->media_id = $request->media_id;
            $media->image_type = $request->image_type;

            $media->image_alt = $request->alt[$index];
            $media->image_title = $request->title[$index];
            $media->image = $image_name;
            $save = $media->save();
        }
        if($save){       
            return back()->with('success', 'Image Filed Uploaded...');
            // return back()->with('success', 'Images Uploaded...');
        }else{
            return 'something went wrong, try again later.';

        }
    }

    public function updateMultipleImageField($id, Request $request){

        $update = DB::table('media')->where('id', $id)
            ->update(['image_title' =>$request->title, 'image_alt' =>$request->alt]);


        

        if($update){       
            return back()->with('success', 'Image Filed Uploaded...');
            // return (['status' => 'success', 'message' => 'Image fields are Updated...']);
        }else{
            return (['status' => 'failed', 'message' => 'Something went wrong, Try again...']);

        }
    }
}
