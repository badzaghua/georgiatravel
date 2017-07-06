<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Requests;
use Input;
use App\Models;

class EventsController extends Controller
{
    public function AddEvent(Request $request) {
        
        
        
        
     $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'original_id' => 'required|numeric',
            'provider' => 'required',
            'category' => 'required',
            'town' => 'required',
            'image_href' => 'required',
            'datetime_from' => 'required',
            'organiser' => 'required',
            'min_price' => 'required',
            'original_href' => 'required'
        ]);

        if ($validator->fails()) {
            $response['errors'] = $validator->errors()->all();
        }    else    {
            
        $event = new Models\Event;
        
        $event->provider = Input::get('provider');
        $event->title = Input::get('title');  
        $event->slug = str_slug($event->title,'-');        
        $event->original_id = Input::get('original_id');
        $event->datetime_from = Input::get('datetime_from');
        $event->datetime_to = Input::get('datetime_to');
        $event->content = Input::get('content');
        $event->organiser = Input::get('organiser');
        $event->address = Input::get('address');
        $event->lng = Input::get('lng');
        $event->lat = Input::get('lat');
        $event->min_price = Input::get('min_price');
        $event->max_price = Input::get('max_price');
        $event->original_href = Input::get('original_href');        
        $event->status = 'draft'; 
        

        
        // category
        $category = Models\Event_category::firstOrCreate(['title' => strtolower($request->category)]);
        $event->category_id = $category->id;
        
        
        
        // town
        $town = Models\Town::where('title',strtolower($request->town))->first();
        if(null!=$town) {
            $event->town = $town->id;
        } else {
            $event->town = null;
        }    
    
    
        
        
        // image
        $folder = base_path('storage/uploads');
		$dateAppend = date("Y-m-d-His-");
		$fileName = basename($request->image_href);
        $copy = copy($request->image_href, $folder.'/'.$dateAppend.$fileName);
        if(!$copy) { 
            $response['errors'][] = 'Image url is invalid';
        } else {
        $upload = new Models\Upload;
        $upload->public = 1;
        $upload->name = $fileName;
        $upload->path = $folder.'/'.$dateAppend.$fileName;
        $upload->extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $upload->hash = strtolower(str_random(20));
        $upload->user_id = 1;
        $upload->save();
        $event->image = $upload->id;
        }
        }
        
        

        if(!isset($response['errors'])) {
        $response['success'] = 1;
        $response['content'] = 'Event saved successfully';
        $event->save();
        }
        
        echo json_encode($response);
        
        
    }
    
    
    
    public static function DelEvent() {
        $provider = Input::get('provider');
        $original_id = Input::get('original_id');
        
        
        
        
        $deleted = Models\Event::where('original_id',$original_id)->where('provider',$provider)->delete();
        if($deleted) {
        $response['success'] = 1;
        $response['content'] = 'Event deleted successfully';
        } else {
            $response['error'] = "Event couldn't be found";
        }
        echo json_encode($response);        
    }
}
