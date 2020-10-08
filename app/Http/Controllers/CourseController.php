<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

class CourseController extends Controller
{	

	public function __construct() {
		$this->middleware('auth');
	}

    public function index($slug) {
    	$course = Course::where('slug', $slug)->first();
    	return view('course', compact('course'));
    }
    
    public function enroll($slug) {
    	$course = Course::where('slug', $slug)->first();
    	$user = auth()->user();

        $track = $course->track;

    	$user->tracks()->attach([$track->id]);

        $user->courses()->attach([$course->id]);
    	return redirect('/courses/' . $slug . '')->withStatus("You've Enrolled in " . $course->title);
    }

}