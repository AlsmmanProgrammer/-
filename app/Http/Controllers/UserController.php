<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users= User::get();
        return view ('user.index')->with('users', $users);
    }


    public function create()
    {
        return view ('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'User_Type' =>$request->user_type,
        ]);

        return redirect('dashboard');
    }


    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect('/user')->with('message','Done deleted');
    }
}
