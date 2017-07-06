<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Upload;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class InterventionController extends Controller
{


    
    // გავასწოროთ სიგანის მიხედვით
    public function toWidth($src,$w) {
    $src = rawurlencode($src);
    $src = str_replace('%2F','/',$src);
    $cacheimage = \Image::cache(function($image) use ($src, $w){        
            return $image->make(asset($src))->resize($w, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
    });
    
        },10); // 9999999 mins in cache
        return \Response::make($cacheimage, 200, array('Content-Type'=>'image'))
                ->setMaxAge(604800) //seconds
               ->setPublic(); 
    }



    // გავასწოროთ სიმაღლის მიხედვით
    public function toHeight($src,$h) { 
    $src = rawurlencode($src);
    $src = str_replace('%2F','/',$src);
    $cacheimage = \Image::cache(function($image) use ($src, $h){        
            return $image->make(asset($src))->resize(null, $h, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
    });
    
        },10); // 9999999 mins in cache
        return \Response::make($cacheimage, 200, array('Content-Type'=>'image'))
                ->setMaxAge(604800) //seconds
               ->setPublic(); 
    }



    // მოვკროპოთ
    public function fit($src,$w,$h) {
    $src = rawurlencode($src);
    $src = str_replace('%2F','/',$src);
    $cacheimage = \Image::cache(function($image) use ($src,$w, $h){        
         return $image->make(asset($src))->fit($w,$h);   
        },10); // 9999999 mins in cache
        return \Response::make($cacheimage, 200, array('Content-Type'=>'image'))
                ->setMaxAge(604800) //seconds
               ->setPublic(); 
    }



}




