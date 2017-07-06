<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;

class regionsController extends Controller
{
    public static function ShowAll(){

        $towns = \App\Models\Town::where('lang',Language())->get();
        $regions = \App\Models\Region::where('lang',Language())->paginate(20);
        $translationJson = \translationJson('regions');                
        return view('regions',['towns'=>$towns,'regions'=>$regions,'translationJson'=>$translationJson]);
    }
    
    
    
    public static function ShowContent($slug) {
        $region = \App\Models\Region::where('lang',Language())->where('slug',$slug)->first();
        $slider = \App\Models\Slider_image::where('slider',$region->slider)->get();
        $towns = \App\Models\Town::where('lang',Language())->where('region',$region->id)->get();
        $featured_regions = \App\Models\Region::where('lang',Language())->where('id','<>',$region->id)->limit(3)->get();
        $translationJson = translationJson(null,'Region',$region->id);            
        return view('region',['region'=>$region,'slider'=>$slider,'towns'=>$towns,'featured_regions'=>$featured_regions,'translationJson'=>$translationJson]);        
    }
}
