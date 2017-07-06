<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models as Model;
use Input;

use App\Http\Requests;

class SearchController extends Controller
{
    
    public static function Index() {
    $s = Input::get('s');
    $results['region'] = Model\Region::where('lang',Language())->where('title','like',"%$s%")->where('content','like',"%$s%")->get();
    $results['town'] = Model\Town::where('lang',Language())->where('title','like',"%$s%")->where('content','like',"%$s%")->get();
    $results['sight'] = Model\Sightseeing::where('lang',Language())->where('title','like',"%$s%")->where('content','like',"%$s%")->get();
    $results['article'] = Model\Article::where('lang',Language())->where('title','like',"%$s%")->where('content','like',"%$s%")->get();
    $results['event'] = Model\Event::where('lang',Language())->where('title','like',"%$s%")->get();
    $translationJson = TranslationJson('search');

    return view('search',['results'=>$results,'s'=>$s,'translationJson'=>$translationJson]);
    }



}