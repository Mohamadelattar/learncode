<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Track;
use App\Course;

class HomeController extends Controller
{
	public function index() {

		$tracks = Track::with('courses')->orderBy('id', 'desc')->get();

		$famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

		$famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count', 'desc')->get();

		if(\Auth::check()) {
			$user = auth()->user();
			
			$user_courses = $user->courses;

			$user_courses_ids = $user->courses()->pluck('id');

			$user_tracks_ids = $user->tracks()->pluck('id');

			$recommended_courses = Course::whereIn('track_id', $user_tracks_ids)->whereNotIn('id', $user_courses_ids)->limit(4)->get();

			return view('home', compact('user_courses', 'tracks', 'famous_tracks', 'recommended_courses'));
		}else {
			return view('home', compact('tracks', 'famous_tracks'));
		}
	}
}