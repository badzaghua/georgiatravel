<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;

class townsController extends Controller
{
    public static function ShowAll(){

        $towns = \App\Models\Town::where('lang',Language())->paginate(20);
        $translationJson = \translationJson('towns');                
        return view('towns',['towns'=>$towns,'translationJson'=>$translationJson]);
    }
    
    
    
    public static function ShowContent($regionSlug,$slug) {
        $town = \App\Models\Town::where('lang',Language())->where('slug',$slug)->first();
        $slider = \App\Models\Slider_image::where('slider',$town->slider)->get();
        $sights = \App\Models\Sightseeing::where('lang',Language())->where('town',$town->id)->get();   
        $featured_towns = \App\Models\Town::where('lang',Language())->where('id','<>',$town->id)->limit(4)->get();
        $translationJson = translationJson(null,'Town',$town->id);            
        return view('town',['town'=>$town,'sights'=>$sights,'slider'=>$slider,'featured_towns'=>$featured_towns,'translationJson'=>$translationJson]);        
    }
}
