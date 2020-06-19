<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.home');
    }

    public function edit(User $user)
    {
        return view('users.compte', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->save();
        return redirect()->route('users.home');
    }

   
}
