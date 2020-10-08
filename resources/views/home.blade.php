
@extends('layouts.user_layout')

@section('content')
	@include('includes.home_picture')

	@auth
		@include('includes.mycourses')
	@endauth

	@include('includes.track_famous_courses')
@endsection