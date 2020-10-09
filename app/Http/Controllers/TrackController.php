<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class TrackController extends Controller
{
    public function index($name) {
    	$track = Track::where('name', $name)->first();
    	$courses = $track->courses;
    	return view('track_courses', compact('courses', 'track'));
    }
}