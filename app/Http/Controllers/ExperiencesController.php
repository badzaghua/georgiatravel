<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;

class experiencesController extends Controller
{
    public static function ShowAll(){

        $experiences = \App\Models\Experience::where('lang',Language())->where('parent',0)->paginate(20);
        $translationJson = translationJson('experiences');        
        return view('experiences',['experiences'=>$experiences,'translationJson'=>$translationJson]);
    }
    
    
    
    public static function ShowContent($slug) {
        $experience = \App\Models\Experience::where('lang',Language())->where('slug',$slug)->first();
        $slider = \App\Models\Slider_image::where('slider',$experience->slider)->get();
        $featured_experiences = \App\Models\Experience::where('lang',Language())->where('parent',$experience->parent)->where('id','<>',$experience->id)->limit(3)->get();
        $translationJson = translationJson('experience','Experience',$experience->id);            
        return view('experience',['experience'=>$experience,'slider'=>$slider,'featured_experiences'=>$featured_experiences,'translationJson'=>$translationJson]);        
    }
}
