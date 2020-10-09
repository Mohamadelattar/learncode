@extends('layouts.user_layout')

@section('content')

	<div class="contact1">
		
		<p id="message"></p>

		<div class="container-contact1">

			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form id="contactForm" method="POST" action="/contact" class="contact1-form validate-form">
				<span class="contact1-form-title">
					Get in touch
				</span>
				@csrf
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input id='name' class="input1" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id='email' class="input1" type="text" name="email" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input id="subject" class="input1" type="text" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea id="the_message" class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Send Email
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection	