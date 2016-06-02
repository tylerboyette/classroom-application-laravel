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
        $recent_activity = array();

        $courses = Auth::user()->courses()->get();

        foreach ($courses as $course) {
            if ($course->assignments()->get()) {
                foreach ($course->assignments()->orderBy('created_at', 'desc')->get() as $assignment) {
                    $course = $assignment->course()->get();
                    $course_info = $course[0]->subject . ' ' . $course[0]->course . '-' . $course[0]->section;
                    $assignment->type = 'assignment';
                    $assignment->course_info = $course_info;
                    array_push($recent_activity, $assignment);
                }
            }
        }

        foreach ($courses as $course) {
            if ($course->annoucements()->get()) {
                foreach ($course->annoucements()->orderBy('created_at', 'desc')->get() as $annoucement) {
                    $course = $annoucement->course()->get();
                    $course_info = $course[0]->subject . ' ' . $course[0]->course . '-' . $course[0]->section;
                    $annoucement->type = 'annoucement';
                    $annoucement->course_info = $course_info;
                    array_push($recent_activity, $annoucement);
                }
            }
        }

        if (count($recent_activity) > 0) {
            usort($recent_activity, function($a, $b) {
                if ($a->created_at == $b->created_at) {
                    return 0;
                }
                return ($a->created_at > $b->created_at) ? -1 : 1;
            });
        }

        return view('pages.home', [
            'recent_activity' => $recent_activity
        ]);
    }
}
