<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;

class sightsController extends Controller
{
    public static function ShowAll(){

        $sights = \App\Models\Sightseeing::where('lang',Language())->paginate(5);
        $translationJson = \translationJson('sights');                
        return view('sights',['sights'=>$sights,'translationJson'=>$translationJson]);
    }
    
    
    
    public static function ShowContent($regionSlug,$townSlug,$slug) {
        $sight = \App\Models\Sightseeing::where('lang',Language())->where('slug',$slug)->first();
        $featured_sights = \App\Models\Sightseeing::where('lang',Language())->where('id','<>',$sight->id)->limit(3)->get();
        $translationJson = translationJson('sight','Sightseeing',$sight->id);            
        return view('sight',['sight'=>$sight,'featured_sights'=>$featured_sights,'translationJson'=>$translationJson]);        
    }
}
