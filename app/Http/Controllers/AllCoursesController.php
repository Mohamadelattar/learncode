<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

class AllCoursesController extends Controller
{
    public function index() {
    	$courses = Course::paginate(16);
    	return view('allcourses', compact('courses'));
    }

}