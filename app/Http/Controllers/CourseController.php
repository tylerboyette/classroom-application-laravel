<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
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
     * Show details about a particular class 
     * 
     * @return Response 
     */
    public function show()
    {
        // /class/{id} - show details about the class [GET]
    }

    /**
     * Show a form to create a new class - GET
     * 
     * @return Response 
     */
    public function create()
    {
        return view('pages.course.create');
    }

    /**
     * Save a newly created class - POST
     * 
     * @return Response 
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|string|max:5', // CS
            'title' => 'required|string|max:255',   // Roadmap To Computing
            'course' => 'required|numeric|digits_between:2,4', // 100
            'section' => 'required|numeric|digits_between:2,4' // 001
        ]);

        $user_id = Auth::user()->id;

        $course = new Course;
        $course->subject = $request->input('subject');
        $course->title = $request->input('title');
        $course->course = $request->input('course');
        $course->section = $request->input('section');
        $course->user_id = $user_id;

        if ($course->save()) {
            return redirect('/course/create')->with('status', 'Course added successfully!');
        }
    }

    /**
     * Show the form to edit a particular class
     * 
     * @return Response 
     */
    public function edit()
    {
        // /class/{id}/edit - show the form to edit the class [GET]
    }

    /**
     * Update the class' information
     * 
     * @return Response
     */
    public function update()
    {
        // /class/{id} - update the class' information [PUT/PATCH]
    }

    /**
     * Delete a particular class
     * 
     * @return Response 
     */
    public function destroy()
    {
        // /class/{id} - delete the class [DELETE]
    }
}
