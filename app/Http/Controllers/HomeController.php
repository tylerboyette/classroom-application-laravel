<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent = array();

        // Recent Activity For Current User
        if (Auth::check()) {
            if (count(Auth::user()->courses()->get()) > 0) {
                foreach (Auth::user()->courses()->get() as $course) {
                    $name = $course->subject . ' ' . $course->course . '-' . $course->section;
                    foreach ($course->assignments()->orderBy('created_at', 'desc')->get() as $assignment) {
                        $assignment->course_title = $name;
                        array_push($recent, $assignment);
                    }
                }
            }
        }

        return view('pages.home', [
            'recent_assignments' => $recent
        ]);
    }
}
