<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Annoucement;

class AnnoucementController extends Controller
{
    /**
     * Stores a new annoucement into the database
     * 
     * @param  Request $request   
     * @param  integer  $course_id 
     * @return Response             
     */
    public function store(Request $request, $course_id)
    {
      $this->validate($request, [
        'title' => 'required',
        'message' => 'required'
      ]);

      $annoucement = new Annoucement;
      $annoucement->title = $request->input('title');
      $annoucement->message = $request->input('message');
      $annoucement->course_id = $course_id;

      if ($annoucement->save()) {
        return redirect('/course/' . $course_id)->with('status', 'Annoucement added successfully!');
      }
    }
}
