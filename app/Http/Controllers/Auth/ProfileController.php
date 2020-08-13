<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('user.edit')->with('user', $user);
    }

    public function update(User $user)
    {
        $user = Auth::user();

        if ($user->email == request('email'))
        {

            $this->validate(request(), [
                'name'              =>  'string',
                'address'           =>  'string',
                'date_of_birth'     =>  'date',
            ]);

            $user->name = request('name');
            $user->address = request('address');
            $user->date_of_birth = request('date_of_birth');

            $user->save();

            return redirect()->route('home');
        }

        $this->validate(request(), [
            'name'              =>  'string',
            'address'           =>  'string',
            'email'             =>  'email|unique:users',
            'date_of_birth'     =>  'date',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->address = request('address');
        $user->date_of_birth = request('date_of_birth');

        $user->save();
        return redirect()->route('home');
    }

    public function updatePassword(Request $request)
    {

        if (!(Hash::check($request->get('old_password'), Auth::user()->password)))
        {
            // The passwords don't not match
            // return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");

            return response()->json(['errors' => ['current' => ['Current password does not match']]], 422);
        }

        if (strcmp($request->get('old_password'),
                $request->get('new_password')) == 0)
        {
            // Current password and new password are same
            // return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");

            return response()->json(['errors' => ['current' => ['New Password cannot be same as your current password']]], 422);
        }

        if (strcmp($request->get('new_password'), $request->get('password_confirmation')) !== 0)
        {
            // Current password and new password are same
            // return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");

            return response()->json(['errors' => ['current' => ['Password confirmation wrong!!!']]], 422);
        }

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6',
            'password_confirmation' => 'required'
        ]);

        // Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        Auth::logout();

        if ($admin->delete())
        {
            return redirect('/dashboard')
                ->with('global', 'Your account has been successfully deactivated!');
        }
    }
}
