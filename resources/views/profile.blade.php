@extends('layouts.user_layout')

@section('content')

	<div class="container">
		
		<div class="user-profile">
				


			<h3>Profile: {{ $user->name }}</h3>

			<div class="row">
				
				<div class="col-sm-4">
					<div class="user-info">
						
						<div class="user-image">

							<p id="message"></p>

							<div id="uploaded_image">
								@if($user->photo)
								<img class="img-fluid img-thumbnail" src="/images/{{$user->photo->filename}}">
								@else
								<img class="img-fluid img-thumbnail" src="/images/default.jpg">
								@endif
							</div>
							<a id="upload_btn" class="btn btn-primary" href=""><i class="fas fa-cloud-upload-alt"></i> Upload</a>

							<form id="form" method="POST" action="/profile" enctype="multipart/form-data">
								@csrf
								<input id="image_file" type="file" name="image" >
							</form>

						</div>

						<div class="user-data">
							
							<ul class="list-unstyled">
								<li>{{ $user->email }}</li>
								<li>{{ $user->score }} Points</li>
								<li style="color: #1c5996;"><i class="fas fa-user-shield"></i> {{ $user->admin == 1 ? 'Admin' : 'User' }}</li>
								<li style="font-weight: bold;" class="{{ $user->email_verified_at ? 'text-success' : 'text-danger' }}">{{ $user->email_verified_at ? 'Verified' : 'Unverified' }}</li>

								<li>Member_at: <sapn style="margin-left: 20px;">{{ $user->created_at->diffForHumans() }}</sapn></li>
								
							</ul>

						</div>

					</div>

				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm">
					
					<h4>User Info</h4>

					<div class="user-form">
						
						<p id="errorMessage">Please Enter Username, email and password correctly.</p>

						<form id="user_info_form" method="POST" action="/profile">
							
							@csrf
							<div class="form-group">
								<label for="email">Your Email</label>
								<input placeholder="Email" type="email" name="email" class="form-control" value="{{ $user->email }}">
							</div>

							<div class="form-group">
								<label for="name">Your Username</label>
								<input placeholder="Username" type="text" name="name" class="form-control" value="{{ $user->name }}">
							</div>

							<div class="form-group">
								<label for="password">Your Password</label>
								<input placeholder="Password" type="password" name="password" class="form-control">
							</div>

							<div class="form-group">
								<label for="confirmpassword">Your Confirmation</label>
								<input placeholder="Confirm Password" type="password" name="confirmpassword" class="form-control">
							</div>

							<input style="font-size: 20px; width: 100px;" type="submit" name="save" value="Save" class="btn btn-primary">

						</form>


					</div>

				</div>


			</div>

			
			<div class="user-tracks">

				<div class="heading">
					<h4>You're learning in these tracks</h4>
					<hr>
				</div>

				<div class="famous-tracks">

					<div class="tracks">
						<ul class="list-unstyled">
						@foreach($tracks as $famous_track)

							<li><a class="btn track-name" href="#">{{ $famous_track->name }}</a></li>

						@endforeach
						</ul>
					</div>

				</div>


			</div>


		</div>

	</div>

@endsection