<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use \App\Models as App;

class TempController extends Controller
{
 
    public static function Exec(){
        $articles = App\Article::all();
        foreach($articles as $article) {
            $article->slug = urldecode($article->slug);
            $article->save();
        }
        

        $experiences = App\Experience::all();
        foreach($experiences as $experience) {
            $experience->slug = urldecode($experience->slug);
            $experience->save();
        }
        
        
        }
        

        

}
