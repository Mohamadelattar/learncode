@extends('layouts.user_layout')

@section('content')


<div class="container">

	<div class="all-courses">

		<h4>All Courses</h4>

		<div class="row">	
		@foreach($courses as $course)
		
			<div class="col-sm-3">
				<div class="course">
					@if($course->photo)
					<a href="/courses/{{$course->slug}}"><img src="/images/{{ $course->photo->filename }}"></a>
					@else
					<a href="/courses/{{$course->slug}}"><img src="/images/default.jpg"></a>
					@endif
					<h6><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title, 50)}}</a></h6>
					<span style="margin-left: 10px; font-weight: 500;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
					<span style="margin-left: 50%">{{ count($course->users) }} users</span>
				</div>
			</div>


		@endforeach
		</div>
	</div>
{{ $courses->links() }}
</div>


@endsection