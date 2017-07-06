<?php

/* ================== Homepage ================== */


/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');

	/* ================== Settings ================== */
	Route::resource(config('laraadmin.adminRoute') . '/settings', 'LA\SettingsController');
	Route::get(config('laraadmin.adminRoute') . '/setting_dt_ajax', 'LA\SettingsController@dtajax');

	/* ================== Languages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/languages', 'LA\LanguagesController');
	Route::get(config('laraadmin.adminRoute') . '/language_dt_ajax', 'LA\LanguagesController@dtajax');


	/* ================== Social_media ================== */
	Route::resource(config('laraadmin.adminRoute') . '/social_media', 'LA\Social_mediaController');
	Route::get(config('laraadmin.adminRoute') . '/social_media_dt_ajax', 'LA\Social_mediaController@dtajax');

	/* ================== Static_pages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/static_pages', 'LA\Static_pagesController');
	Route::get(config('laraadmin.adminRoute') . '/static_page_dt_ajax', 'LA\Static_pagesController@dtajax');

	/* ================== Navigations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/navigations', 'LA\NavigationsController');
	Route::get(config('laraadmin.adminRoute') . '/navigation_dt_ajax', 'LA\NavigationsController@dtajax');


	/* ================== Sliders ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sliders', 'LA\SlidersController');
	Route::get(config('laraadmin.adminRoute') . '/slider_dt_ajax', 'LA\SlidersController@dtajax');

	/* ================== Slider_images ================== */
	Route::resource(config('laraadmin.adminRoute') . '/slider_images', 'LA\Slider_imagesController');
	Route::get(config('laraadmin.adminRoute') . '/slider_image_dt_ajax', 'LA\Slider_imagesController@dtajax');

	/* ================== Mainpages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/mainpages', 'LA\MainpagesController');
	Route::get(config('laraadmin.adminRoute') . '/mainpage_dt_ajax', 'LA\MainpagesController@dtajax');

	/* ================== Regions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/regions', 'LA\RegionsController');
	Route::get(config('laraadmin.adminRoute') . '/region_dt_ajax', 'LA\RegionsController@dtajax');

	/* ================== Towns ================== */
	Route::resource(config('laraadmin.adminRoute') . '/towns', 'LA\TownsController');
	Route::get(config('laraadmin.adminRoute') . '/town_dt_ajax', 'LA\TownsController@dtajax');

	/* ================== Events ================== */
	Route::resource(config('laraadmin.adminRoute') . '/events', 'LA\EventsController');
	Route::get(config('laraadmin.adminRoute') . '/event_dt_ajax', 'LA\EventsController@dtajax');

	/* ================== Article_categories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/article_categories', 'LA\Article_categoriesController');
	Route::get(config('laraadmin.adminRoute') . '/article_category_dt_ajax', 'LA\Article_categoriesController@dtajax');

	/* ================== Articles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/articles', 'LA\ArticlesController');
	Route::get(config('laraadmin.adminRoute') . '/article_dt_ajax', 'LA\ArticlesController@dtajax');


	/* ================== Experiences ================== */
	Route::resource(config('laraadmin.adminRoute') . '/experiences', 'LA\ExperiencesController');
	Route::get(config('laraadmin.adminRoute') . '/experience_dt_ajax', 'LA\ExperiencesController@dtajax');

	/* ================== Event_categories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/event_categories', 'LA\Event_categoriesController');
	Route::get(config('laraadmin.adminRoute') . '/event_category_dt_ajax', 'LA\Event_categoriesController@dtajax');

	/* ================== Event_settings ================== */
	Route::resource(config('laraadmin.adminRoute') . '/event_settings', 'LA\Event_settingsController');
	Route::get(config('laraadmin.adminRoute') . '/event_setting_dt_ajax', 'LA\Event_settingsController@dtajax');

	/* ================== Sightseeings ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sightseeings', 'LA\SightseeingsController');
	Route::get(config('laraadmin.adminRoute') . '/sightseeing_dt_ajax', 'LA\SightseeingsController@dtajax');

	/* ================== Georgias ================== */
	Route::resource(config('laraadmin.adminRoute') . '/georgias', 'LA\GeorgiasController');
	Route::get(config('laraadmin.adminRoute') . '/georgia_dt_ajax', 'LA\GeorgiasController@dtajax');

	/* ================== Georgia_tabs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/georgia_tabs', 'LA\Georgia_tabsController');
	Route::get(config('laraadmin.adminRoute') . '/georgia_tab_dt_ajax', 'LA\Georgia_tabsController@dtajax');

	/* ================== Svgmaps ================== */
	Route::resource(config('laraadmin.adminRoute') . '/svgmaps', 'LA\SvgmapsController');
	Route::get(config('laraadmin.adminRoute') . '/svgmap_dt_ajax', 'LA\SvgmapsController@dtajax');

	/* ================== Ebrd_languages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/ebrd_languages', 'LA\Ebrd_languagesController');
	Route::get(config('laraadmin.adminRoute') . '/ebrd_language_dt_ajax', 'LA\Ebrd_languagesController@dtajax');

	/* ================== Ebrd_locations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/ebrd_locations', 'LA\Ebrd_locationsController');
	Route::get(config('laraadmin.adminRoute') . '/ebrd_location_dt_ajax', 'LA\Ebrd_locationsController@dtajax');

	/* ================== Ebrd_tours ================== */
	Route::resource(config('laraadmin.adminRoute') . '/ebrd_tours', 'LA\Ebrd_toursController');
	Route::get(config('laraadmin.adminRoute') . '/ebrd_tour_dt_ajax', 'LA\Ebrd_toursController@dtajax');

	/* ================== Ebrd_types ================== */
	Route::resource(config('laraadmin.adminRoute') . '/ebrd_types', 'LA\Ebrd_typesController');
	Route::get(config('laraadmin.adminRoute') . '/ebrd_type_dt_ajax', 'LA\Ebrd_typesController@dtajax');

	/* ================== User_saves ================== */
	Route::resource(config('laraadmin.adminRoute') . '/user_saves', 'LA\User_savesController');
	Route::get(config('laraadmin.adminRoute') . '/user_safe_dt_ajax', 'LA\User_savesController@dtajax');
});
