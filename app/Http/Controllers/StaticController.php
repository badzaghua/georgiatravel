<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;

class StaticController extends Controller
{
    
    
    
    
    public static function ShowContent($slug) {
        $staticPage = \App\Models\Static_page::where('lang',Language())->where('slug',$slug)->first();
        $translationJson = translationJson('static','Static_page',$staticPage->id);            
        return view('staticPage',['staticPage'=>$staticPage,'translationJson'=>$translationJson]);        
    }
}
