<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 
 


//temp
Route::get('temp','TempController@Exec');


App::setLocale('en_US');
$prefix='';
$segment = Request::segment(1);

if($segment=='ru_RU' || $segment=='ka_GE' || $segment=='en_US') {
	$prefix=$segment;
	if(App::getLocale()!=$prefix) App::setLocale($prefix);
}


Route::group(['prefix' => $prefix ,'middleware' => ['web']], function () {
    
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');




Route::any('{src}/w={w}&h={h}','InterventionController@fit')->where('src', '.*');
Route::any('{src}/w={w}','InterventionController@toWidth')->where('src', '.*');
Route::any('{src}/h={h}','InterventionController@toHeight')->where('src', '.*');
Route::any('{src}/{w}x{h}','InterventionController@fit')->where('src', '.*')->where('w', '[0-9]+')->where('h', '[0-9]+');


require __DIR__.'/admin_routes.php';
require __DIR__.'/api_routes.php';
require __DIR__.'/sitemap_routes.php';






Route::group(['middleware' => 'auth'], function () {





Route::get('/user/profile/', function() {
    return view('user.saved');
});

Route::get('/user/saved/', function() {
    return view('user.saved');
});

Route::post('user/save', 'SaveController@Save');
Route::post('user/unsave', 'SaveController@Unsave');


Route::get('/user/accountSettings/', function() {
    return view('user.accountSettings');
});


Route::get('/user/editProfile/', function() {
    return view('user.editProfile');
});



Route::get('/user/calendar/', 'UserController@ShowCalendar');






Route::post('/user/editUser', 'UserController@EditUser');
Route::post('/user/editSettings', 'UserController@editSettings');
Route::get('/user/deleteAccount', 'UserController@DeleteAccount');


});
// end of auth middleware







Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);



// Registration routes...
Route::get('register', 'Auth\AuthController@showLoginForm');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);





Route::get('home',function(){
    if(Auth::check() && Auth::user()->status=='admin') return redirect('/admin');
    else return redirect('/user/saves');
});





Route::post('user/placeExists', 'SaveController@PlaceExists');



//english routes
Route::get(Urltrans('events'), 'EventsController@ShowAll');
Route::get(Urltrans('events/search'), 'EventsController@Search');
Route::get(Urltrans('event/{slug}'), 'EventsController@ShowContent');
Route::get(Urltrans('articles'), 'ArticlesController@ShowAll');
Route::get(Urltrans('article/{slug}'), 'ArticlesController@ShowContent');
Route::get(Urltrans('experiences'), 'ExperiencesController@ShowAll');
Route::get(Urltrans('experience/{slug}'), 'ExperiencesController@ShowContent');
Route::get(Urltrans('regions'), 'RegionsController@ShowAll');
Route::get(Urltrans('georgia'), 'GeorgiaController@ShowContent');



Route::get('rugby-championship-tours', 'EbrdController@Search');
Route::get('rugby-tours', 'EbrdController@Search');
Route::get('world-rugby-championship-tours', 'EbrdController@Search');
Route::get('world-rugby-championship', 'EbrdController@Search');





Route::get('static/{slug}', 'StaticController@ShowContent');
Route::get('search', 'SearchController@Index');








Route::get('/feedback', function(){
	return view('feedback');
});
Route::post('/feedback/send', 'FeedbackController@send');




Route::get('/map', function() {
    return view('map.map');
});


Route::get('/markers', function() {
    return view('map.markers');
});


Route::get('/dialog/{place_record_id}/{venue}', function($place_record_id,$venue) {
    return view('map.dialog',['place_record_id'=>$place_record_id,'venue'=>$venue]);
});




Route::get('{regionSlug}/{townSlug}/{slug}', 'SightsController@ShowContent');
Route::get('{regionSlug}/{slug}', 'TownsController@ShowContent');
Route::get('{slug}', 'RegionsController@ShowContent');



Route::get('/', 'HomeController@Index');





});