<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'DashboardController@index');
    
	/*Route::get('/test', function(){
		$ciius= file_get_contents(storage_path('CIIU.txt'));
		$ciius = explode(";", $ciius);
		foreach($ciius as $ciiu){
			echo $ciiu . "<br>";
		}
		/*$id = "ceo@camilovera.com.co";
		$emails = file_get_contents(storage_path('ffiemails.txt'));
		$emails = explode(",", $emails);
		if(in_array($id, $emails)){
			echo "Match found";
		}else{
			echo "Not found..";
		}
		foreach($emails as $email){
			echo strtolower($email) . "<br>";
		}*/
	/*});*/

	Route::auth();

	//Users

	Route::get('/users', 'UserController@index');

	Route::get('/users/update/{id}', 'UserController@update');

	Route::post('/users/update/{id}', 'UserController@update');

	Route::get('/users/view/{id}', 'UserController@view');

	Route::get('/users/search', 'UserController@search');

	//Companies

	Route::get('/companies', 'CompanyController@index');

	Route::get('/companies/create', 'CompanyController@create');

	Route::post('/companies/create', 'CompanyController@create');

	Route::get('/companies/update/{id}', 'CompanyController@update');

	Route::post('/companies/update/{id}', 'CompanyController@update');

	Route::get('/companies/view/{id}', 'CompanyController@view');

	Route::get('/companies/search', 'CompanyController@search');

	//Projects

	Route::get('/projects', 'ProjectController@index');

	Route::get('/projects/create', 'ProjectController@create');

	Route::post('/projects/create', 'ProjectController@create');

	Route::get('/projects/view/{id}', 'ProjectController@view');

	Route::get('/projects/update/{id}', 'ProjectController@update');

	Route::post('/projects/update/{id}', 'ProjectController@update');

	Route::get('/projects/search', 'ProjectController@search');

	//Project Comments

	Route::post('projects/comment/{id}', 'ProjectCommentController@create');

	Route::delete('projects/comment/{id}', 'ProjectCommentController@destroy');

	//Consultations

	Route::get('consultations/view/{id}', 'ConsultationController@view');

	Route::get('/consultations', 'ConsultationController@index');

	Route::get('/consultations/create', 'ConsultationController@create');

	Route::post('/consultations/create', 'ConsultationController@create');

	Route::get('/consultations/update/{id}', 'ConsultationController@update');

	Route::post('/consultations/update/{id}', 'ConsultationController@update');

	//Canvases

	Route::get('/canvas/create/{id}', 'CanvasController@create');

	Route::post('/canvas/create/{id}', 'CanvasController@create');

	Route::get('/canvas/update/{id}', 'CanvasController@update');

	Route::post('/canvas/update/{id}', 'CanvasController@update');

	Route::get('/canvas/view/{id}', 'CanvasController@view');

	//IMI

	Route::get('/imi/create/{id}', 'ImiController@create');

	Route::post('/imi/create/{id}', 'ImiController@create');

	Route::get('/imi/update/{id}', 'ImiController@update');

	Route::post('/imi/update/{id}', 'ImiController@update');

	//ACAP

	/*Route::get('/acap/create/{id}', 'AcapController@create');

	Route::post('/acap/create/{id}', 'AcapController@create');

	Route::get('/acap/update/{id}', 'AcapController@update');

	Route::post('/acap/update/{id}', 'AcapController@update');*/

	//ICAI

	Route::get('/icai/create/{id}', 'IcaiController@create');

	Route::post('/icai/create/{id}', 'IcaiController@create');

	Route::get('/icai/update/{id}', 'IcaiController@update');

	Route::post('/icai/update/{id}', 'IcaiController@update');

});
