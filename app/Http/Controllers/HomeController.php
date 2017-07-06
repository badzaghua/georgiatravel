<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $roleCount = \App\Role::count();
		if($roleCount != 0) {
			if($roleCount != 0) {
			    
                $language = Language();
                $mainpage = \App\Models\Mainpage::where('lang',$language)->first();
                
                
                $experiences_in = json_decode($mainpage->experiences);

                $experiences = \App\Models\Experience::whereIn('id',$experiences_in)->limit(6)->get();
                $towns = \App\Models\Town::where('lang',$language)->get();
                $sights = \App\Models\Sightseeing::where('lang',$language)->inRandomOrder()->limit(6)->get();
                //$events = \App\Models\Event::where('lang',$language)->limit(3)->get();
                $articles = \App\Models\Article::where('lang',$language)->limit(2)->get();
                
                
                $slider = \App\Models\Slider_image::where('slider',$mainpage->slider)->get();
                
            
                $sections = json_decode($mainpage->sections);

                
                
                //$eventCategories = \App\Models\Event_category::where('lang',$language)->get();
                //$tempCategory = array();
                //foreach($eventCategories as $eventCategory) {
                //$tempCategory[$eventCategory->title] = $eventCategory->title;
                //}
                //$eventCategories = $tempCategory;
                
                //$tempEventWhere=array();
                //foreach($towns as $town) {
                //$tempEventWhere[$town->id] = $town->title;
                //}
                //$eventWhere = $tempEventWhere;
                
                

                $translationJson = translationJson();
                
				return view('home',['mainpage'=>$mainpage,'sections'=>$sections,'slider'=>$slider,'sights'=>$sights,'experiences'=>$experiences,'towns'=>$towns,'articles'=>$articles,'translationJson'=>$translationJson]);
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }
}