<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;
use Input;

class EbrdController extends Controller
{
    




      public static function Search(){
       
   
        $location = Input::get('location');        
        $language = Input::get('language');        
        $duration = Input::get('duration');
        $type = Input::get('type');
        
        $query= \App\Models\Ebrd_tour::where('title','like','%%');
        
        
        if($location) $query->where('locations','like',"%$location%");
        if($language) $query->where('languages','like',"%$language%");
        if($type) $query->where('types','like',"%$type%");
        if($duration) $query->where('duration',$duration);

        
        
        
        
        
        $search_locations = \App\Models\Ebrd_location::all();
        foreach($search_locations as $search_location) {
        $temp_search_locations[$search_location->id] = $search_location->title;
        }
        $params['search_locations'] = $temp_search_locations;
        
        
        $search_languages = \App\Models\Ebrd_language::all();
        foreach($search_languages as $search_language) {
        $temp_search_languages[$search_language->id] = $search_language->title;
        }
        $params['search_languages'] = $temp_search_languages;
        
        
        $search_types = \App\Models\Ebrd_type::all();
        foreach($search_types as $search_type) {
        $temp_search_types[$search_type->id] = $search_type->title;
        }
        $params['search_types'] = $temp_search_types;        
                  
        
        $params['search_location'] = $location;
        $params['search_language'] = $language;
        $params['search_duration'] = $duration;
        $params['search_type'] = $type;
        
        
        $tours = $query->paginate(15);
        $tours->filter(function($tour) {
          $type_ids = json_decode($tour->types); 
          $types = \App\Models\Ebrd_type::whereIn('id',$type_ids)->get();
          $tour->types = $types;
          
          $location_ids = json_decode($tour->locations); 
          $locations = \App\Models\Ebrd_location::whereIn('id',$location_ids)->get();
          $tour->locations = $locations;
          
          $language_ids = json_decode($tour->languages); 
          $languages = \App\Models\Ebrd_language::whereIn('id',$language_ids)->get();
          $tour->languages = $languages;          
        });
        
        $params['tours'] = $tours;

        return view('ebrdTours',$params);
    }  
    
    
}
