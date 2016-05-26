<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClassController extends Controller
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
     * Show a form to create a new class
     * 
     * @return Response 
     */
    public function create()
    {
        // /class/create - show form that creates a new class [GET]
        return view('pages.class.create');
    }

    /**
     * Save a newly created class 
     * 
     * @return Response 
     */
    public function store()
    {
        // /class - save a newly created class [POST]
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
