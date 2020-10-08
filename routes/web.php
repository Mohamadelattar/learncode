<?php

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');

Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

// User Routes

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/courses/{slug}', 'CourseController@index');

Route::post('/courses/{slug}', 'CourseController@enroll');

Route::get('/courses/{slug}/quizzes/{name}', 'QuizController@index');

Route::post('/courses/{slug}/quizzes/{name}', 'QuizController@submit');

Route::get('/search', 'SearchController@index');

Route::get('/tracks/{name}', 'TrackController@index');

Route::get('/mycourses', 'MyCoursesController@index');

Route::get('/profile', 'ProfileController@index');

Route::post('/profile', 'ProfileController@update');


Route::get('/allcourses', 'AllCoursesController@index');

Route::get('/contact', "ContactController@index");

Route::post('/contact', "ContactController@sendEmail");

// Logout 

Route::get('/logout', function() {
	if(\Auth::check()) {
		\Auth::logout();
		return redirect('/home');
	}else {
		return redirect('/');
	}
})->name('logout');


// Admin Routes 

Route::group(['middleware' => ['auth', 'admin'] ], function () {

	Route::get('admin', function() {
		return redirect('admin/dashboard');
	});

	Route::get('admin/dashboard', 'Admin\HomeController@index')->name('home');

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

	Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);

	Route::resource('admin/tracks', 'Admin\TrackController');

	Route::resource('admin/tracks.courses', 'Admin\TrackCourseController');

	Route::resource('admin/courses', 'Admin\CourseController');

	Route::resource('admin/courses.videos', 'Admin\CourseVideoController');

	Route::resource('admin/courses.quizzes', 'Admin\CourseQuizController');

	Route::resource('admin/videos', 'Admin\VideoController');

	Route::resource('admin/quizzes', 'Admin\QuizController');

	Route::resource('admin/quizzes.questions', 'Admin\QuizQuestionController');

	Route::resource('admin/questions', 'Admin\QuestionController', ['except' => ['show']]);

	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
	
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
});