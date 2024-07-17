<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function store(Request $request) {
        $userData = $request->validate([
            'name' => ['required','string','min:2','max:255'],
            'email' => ['required','string', 'email','min:4','max:255', 'unique:users'],
            'password' => ['required','string','min:8'],
            'avatar' => ['string','min:4','max:255'],
        ]);
        // 'password' => ['required','string','min:8', 'confirmed'],
        
        $user = User::create($userData);
        
        // return redirect(route('/'));
        return redirect(route('users.dashboard'));
    }
    
    public function delete(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return redirect(route('users.dashboard'));
    }
    
    public function signup() {
        return view('signup');
    }

    public function login() {
        return view('login');
    }
    
    public function dashboard() {
        Log::info('loaded users.');
        $users = User::all();
        return view('dashboard', ['users' => $users]);
    }
}
