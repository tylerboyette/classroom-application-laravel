<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function store(Request $request, $id)
    {
      $today = date('Y-m-d H:i:s');

      $this->validate($request, [
        'title' => 'required',
        'due_date' => 'required|date|after:' . $today,
        'description' => 'required'
      ]);

      $due_date = $request->input('due_date');
      $due_date = str_replace('T', ' ', $due_date);
      $due_date = $due_date . ':00';
      
      $assignment = new Assignment;
      $assignment->title = $request->input('title');
      $assignment->due_date = $due_date;
      $assignment->description = $request->input('description');
      $assignment->course_id = $id;

      if ($assignment->save()) {
        return redirect('/course/' . $id)->with('status', 'Assignment added successfully!');
      }
    }
}
