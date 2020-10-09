<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\User;

class ProfileController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {
    	
    	$user = auth()->user();

        $tracks = $user->tracks;

    	return view('profile', compact('user', 'tracks'));
    }

    
    public function update(Request $request) {
    	$user = auth()->user();
    	if($image = $request->file('image')) {

    		$photoable_type = 'App\User'; 
    		$photoable_id = $user->id;

    		$file_to_store = time() . '_' . $user->name . '_' . '.' . $image->getClientOriginalExtension();

    		if( $user->photo->delete() ) {
    			if($user->photo()->create(['filename' => $file_to_store, 'photoable_id' => $photoable_id,'photoable_type' => $photoable_type])) {

	    			$image->move(public_path('images'), $file_to_store);
	    		}
    		}
	    	return response()->json([
	    		'message' => 'Your profile image successfully uploaded',
	    		'uploaded_image' => '<img src="/images/'. $file_to_store .'" class="img-thumbnail img-fluid">'
	    	]);
    	} else {

    		$rules = [
    			'name' => 'required', 'min:5',
    			'email' => 'required', 'email',
    			'password' => 'nullable', 'confirmed', 'min:6',
    		];

    		$this->validate($request, $rules);

    		if($request->password == null) {

	    		if($user->update(['name' => $request->name, 'email' => $request->email])) {
	    			return response()->json([
			    		'message' => 'Your profile info successfully updated',
			    	]);
	    		}

    		} else {

    			$password = password_hash($request->password, PASSWORD_DEFAULT);

    			if($user->update(['name' => $request->name, 'email' => $request->email, 'password' => $password])) {
	    			return response()->json([
			    		'message' => 'Your profile info successfully updated',
			    	]);
	    		}

    		}

    	}
	}
}