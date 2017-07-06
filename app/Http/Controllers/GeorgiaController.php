<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;

class GeorgiaController extends Controller
{
    
    
    
    public static function ShowContent() {
        $georgia = \App\Models\Georgia::where('lang',Language())->first();
        $slider = \App\Models\Slider_image::where('slider',$georgia->slider)->get();
        $tabs = \App\Models\Georgia_tab::where('lang',Language())->get();
        $translationJson = translationJson('georgia');            
        return view('georgia',['georgia'=>$georgia,'slider'=>$slider,'tabs'=>$tabs,'translationJson'=>$translationJson]);        
    }
}
