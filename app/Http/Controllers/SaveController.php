<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use \stdClass;

use App\Http\Requests;

class SaveController extends Controller
{



    
    public static function Save() {
        $user = Auth::user();
        $object_id = Input::get('object_id');
        $type = Input::get('type');         
        $saved = DB::table('user_saves')->where('user_id',$user->id)->where('type',$type)->where('object_id',$object_id)->get();
        if(!$saved) {
        $result = new stdClass();
        $data['user_id'] = $user->id;
        $data['object_id'] = Input::get('object_id');
        $data['title'] = Input::get('title');
        $data['type'] = Input::get('type');
        $data['image'] = Input::get('image');
        $data['href'] = Input::get('href');
        DB::table('user_saves')->insert($data);
        $result->saved = true;
        }
        
        return "success";
    }
    
    
    
    
    public static function Unsave() {
        $result = new stdClass();
        $user = Auth::user();
        $user_id = $user->id;
        $object_id = Input::get('object_id');
        $type = Input::get('type'); 
        DB::table('user_saves')->where('user_id',$user_id)->where('type',$type)->where('object_id',$object_id)->delete();
        $result->unsaved = true;
        return "success";
    }
    
    
    
    
    
    public static function PlaceExists($object_id) {
        if(!Auth::check()) {
            $result['unauthorized'] = 1;
        } else {
            $user = Auth::user();
            $exists = \App\Models\User_safe::where('user_id',$user->id)->where('type','place')->where('object_id',$object_id)->get();
            if(count($exists)) $result['exists'] = 'yes';
            else $result['exists'] = 'no';
        }
            return json_encode($result);
    }
    
    
    
}
