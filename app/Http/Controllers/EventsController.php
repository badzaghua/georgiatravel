<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;
use Input;

class EventsController extends Controller
{
    public static function ShowAll(){ 
        $events = \App\Models\Event::where('lang',Language())->where('datetime_from','>',date('Y-m-d H:i:s'))->orderBy('datetime_from','asc')->paginate(15);
        if($events->isEmpty()) {
            return view('nothing');
            return;  }
        $eventSettings = \App\Models\Event_setting::where('lang',Language())->first();
        $slider = \App\Models\Slider_image::where('slider',$eventSettings->slider)->get();
        $slider = $slider->filter('ImagePath');        
    
        $eventCategories = \App\Models\Event_category::where('lang',Language())->get();
        $tempCategory[] = ucwords(trans('lang.category'));
        foreach($eventCategories as $eventCategory) {
        $tempCategory[$eventCategory->id] = $eventCategory->title;
        }
        $eventCategories = $tempCategory;
        
        $towns = \App\Models\Town::where('lang',Language())->get();
        $tempEventWhere[] = trans('lang.location');
        foreach($towns as $town) {
        $tempEventWhere[$town->id] = $town->title;
        }
        $eventWhere = $tempEventWhere;
                  
                
        $translationJson = translationJson('events');   
        
        $where=null;
        $date_from=null;
        $date_to=null;
        $category=null;
        return view('events',['slider'=>$slider,'eventCategories'=>$eventCategories,'eventWhere'=>$eventWhere,'events'=>$events,'where'=>$where,'date_from'=>$date_from,'date_to'=>$date_to,'category'=>$category,'translationJson'=>$translationJson]);
    }
    





      public static function Search(){
        $eventSettings = \App\Models\Event_setting::where('lang',Language())->first();
        $slider = \App\Models\Slider_image::where('slider',$eventSettings->slider)->get();
        $slider = $slider->filter('ImagePath');        
    
        $eventCategories = \App\Models\Event_category::where('lang',Language())->get();
        $tempCategory[] = ucwords(trans('lang.category'));        
        foreach($eventCategories as $eventCategory) {
        $tempCategory[$eventCategory->id] = $eventCategory->title;
        }
        $eventCategories = $tempCategory;
             
        $towns = \App\Models\Town::where('lang',Language())->get();
        $tempEventWhere[] = trans('lang.location');        
        foreach($towns as $town) {
        $tempEventWhere[$town->id] = $town->title;
        }
        $eventWhere = $tempEventWhere;
                  
             
        $where = Input::get('where');        
        $category = Input::get('category');        
        $date_from = Input::get('date_from');
        $date_to = Input::get('date_to');
        
        $query= \App\Models\Event::where('lang',Language())->where('datetime_from','>',date('Y-m-d H:i:s'));
        
        if($where) $query->where('town',$where);
        if($date_from) $query->where('datetime_from','>',date_create($date_from)->format("Y-m-d 00:00:00"));
        if($date_to) $query->where('datetime_from','<',date_create($date_to)->format("Y-m-d 23:59:59"));
        if($category) $query->where('category_id',$category);
        
        
        $events = $query->orderBy('datetime_from','asc')->paginate(15);
        $translationJson = translationJson('events');        
        return view('events',['slider'=>$slider,'eventCategories'=>$eventCategories,'eventWhere'=>$eventWhere,'events'=>$events,'where'=>$where,'date_from'=>$date_from,'date_to'=>$date_to,'category'=>$category,'translationJson'=>$translationJson]);
    }  
    
    
    
    
    public static function ShowContent($slug) {

        $event = \App\Models\Event::where('lang',Language())->where('slug',$slug)->first();
        $featured_events = \App\Models\Event::where('lang',Language())->where('datetime_from','>',date('Y-m-d H:i:s'))->where('id','<>',$event->id)->where('status','public')->limit(3)->get();
        $translationJson = translationJson('event','Event',$event->id);               
        return view('event',['event'=>$event,'featured_events'=>$featured_events,'translationJson'=>$translationJson]);        
    }
}
