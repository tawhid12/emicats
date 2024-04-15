<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->whereNull('email_verified_at')->paginate(10);
        return view('user.index', compact('users'));
    }
    public function edit($user)
    {
        $user = User::findOrFail($user);
        $user->email_verified_at = Carbon::now();
        $user->save();
        //Auth::login($user, true); // Set remember token
        //return redirect(RouteServiceProvider::HOME);
        return redirect()->back()->with('status', 'Account  Approve Sucessful');
    }
}
