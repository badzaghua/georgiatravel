<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Image;
use DB;
use Auth;









class UserController extends Controller
{
    










public static function EditUser() { 
            $id = Auth::id();
            $data['name'] = Input::get('name');
            $data['age'] = Input::get('age');
            $data['gender'] = Input::get('gender');
            $data['interests'] = Input::get('interests');         
            $data['country'] = Input::get('country');     
            $data['city'] = Input::get('city');         
            DB::table('users')->where('id',$id)->update($data);
        return redirect('/user/profile');
    
}



public static function EditSettings() { 
            $id = Auth::id();
            $data['email'] = Input::get('email');
            $data['password'] = bcrypt(Input::get('password'));   
            DB::table('users')->where('id',$id)->update($data);
        return redirect('/user/profile');
}





public static function DeleteAccount() { 
            $id = Auth::id();
            DB::table('users')->where('id',$id)->delete();
        return redirect('/');
}





public static function ShowCalendar() {
$events = [];

$events[] = \Calendar::event(
    'Event One', //event title
    false, //full day event?
    '2015-02-11T0800', //start time (you can also use Carbon instead of DateTime)
    '2015-02-12T0800', //end time (you can also use Carbon instead of DateTime)
    0 //optionally, you can specify an event ID
);

$events[] = \Calendar::event(
    "Valentine's Day", //event title
    true, //full day event?
    new \DateTime('2015-02-14'), //start time (you can also use Carbon instead of DateTime)
    new \DateTime('2015-02-14'), //end time (you can also use Carbon instead of DateTime)
    'stringEventId' //optionally, you can specify an event ID
);



$calendar = \Calendar::addEvents($events);
return view('user.calendar',compact('calendar'));

}










}
