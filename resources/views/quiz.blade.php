@extends('layouts.user_layout')

@section('content')
	
	<div class="container">

		<div class="quiz-container">
			
			<h2>{{ \Str::limit($quiz->course->title, 30) }}: {{ $quiz->name }} Quiz</h2>

			<div class="col-12">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        	</div>
			
			<div class="quiz-questions">
				<form method="POST" action="/courses/{{$quiz->course->slug}}/quizzes/{{ $quiz->name }}" autocomplete="off">
					@csrf
				<?php foreach ($quiz->questions as $question): ?>
						<div class="form-group">
							<label for="answer">Q: {{ $question->title }} ( <span>{{ $question->score }} Points</span> )</label>
							@if($question->type == 'text')
							<input type="text" name="answer{{$question->id}}" class="form-control" placeholder="Your answer">
							@else
							<?php $answers = explode(',', $question->answers); ?>
							@foreach($answers as $answer)
							<div class="radio">
								<label> <input value="{{$answer}}" class="" type="radio" name="answer{{$question->id}}">{{ $answer }}</label>
							</div>
							@endforeach
							@endif
						</div><hr>
				<?php endforeach ?>

					<input type="submit" value="Submit" class="btn btn-primary">
				</form>

			</div>

		</div>

	</div>


@endsection