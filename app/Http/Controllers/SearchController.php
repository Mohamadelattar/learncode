<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class SearchController extends Controller
{
    public function index(Request $request) {
    	$q = $request->q;
    	$courses = Course::where('title', 'LIKE', '%'.$q.'%')->get();
    	return view('search', compact('courses'));
    }
    
}