<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Annoucement;
use App\Models\Course;

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

    /**
     * Show details about the specific annoucement
     * 
     * @param  Integer $course_id      
     * @param  Integer $annoucement_id 
     * @return Response                 
     */
    public function show($course_id, $annoucement_id) 
    {
      $course = Course::find($course_id);
      $annoucement = Annoucement::find($annoucement_id);

      return view('pages.course.annoucement.show', [
        'course' => $course,
        'annoucement' => $annoucement
      ]);
    }

    /**
     * Deletes a particular annoucement
     * 
     * @param  Integer $course_id      
     * @param  Integer $annoucement_id 
     * @return Response                 
     */
    public function destroy($course_id, $annoucement_id)
    {
      if (Annoucement::destroy($annoucement_id)) {
        return redirect('/course/' . $course_id)->with('status', 'Annoucement deleted successfully!');
      }
    }

    public function update(Request $request, $course_id, $annoucement_id) 
    {
      $this->validate($request, [
        'title' => 'required',
        'message' => 'required'
      ]);

      $annoucement = Annoucement::find($annoucement_id);
      $annoucement->title = $request->input('title');
      $annoucement->message = $request->input('message');

      if ($annoucement->save()) {
        return redirect('/course/' . $course_id . '/annoucement/' . $annoucement_id)->with('status', 'Annoucement updated successfully!');
      }
    }
}
