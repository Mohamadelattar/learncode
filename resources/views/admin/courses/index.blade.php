@extends('layouts.app', ['title' => __('Courses Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Courses') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">{{ __('Add course') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    @include('includes.errors')

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    @if(count($courses))

                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-sm-3">
                            <div class="card">
                                @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo">
                                @else
                                <img  src="/images/11.jpg" class="card-img-top" alt="Course Photo">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($course->title, 100) }}</h5>

                                    <form  method="POST" action="{{ route('courses.destroy', $course) }}">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">show</a>

                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletecourse">
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    @else
                        <p class="lead text-center"> No Courses found</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $courses->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection