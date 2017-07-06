<?php


namespace App\Http\Controllers;

use App\Content as Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class FeedbackController extends Controller
{
        public function send() {


    $name = Input::get('name');
    $email = Input::get('email');
    $department = Input::get('department');
    $message = Input::get('message');
    $headers = "From: $name <$email>";
    mail("feedback@georgia.travel",$department,$message,$headers);
    $translationJson = translationJson('/feedback');        
    return view('feedback',array('submit'=>true));
    }

}