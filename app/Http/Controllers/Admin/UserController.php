<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UserController extends Controller
{   

    public function index(User $model)
    {   
        $users = User::where('admin', 0)->orderBy('id', 'desc')->paginate(15);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('users.index')->withStatus(__('User successfully created.'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('users.index')->withStatus(__('User successfully updated.'));
    }

    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('users.index')->withStatus(__('User successfully deleted.'));
    }
}
