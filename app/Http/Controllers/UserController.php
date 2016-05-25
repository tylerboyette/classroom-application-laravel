<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Specify the middleware for this controller
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user's profile
     * 
     * @return Response
     */
    public function show() 
    {
        return view('pages.user.profile');
    }

    /**
     * Updates the user's profile
     * 
     * @return Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return view('pages.user.profile');
    }
}
