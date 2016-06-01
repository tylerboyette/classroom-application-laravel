<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request, $user_id)
    {
      $from = Auth::user()->id;

      $this->validate($request, [
        'title' => 'required',
        'message' => 'required'
      ]);

      $message = new Message;
      $message->title = $request->input('title');
      $message->message = $request->input('message');
      $message->from = $from;
      $message->to = $user_id;

      if ($message->save()) {
        // Insert information into the pivot table
        $message->users()->attach($from);
        $message->users()->attach($user_id);

        return redirect('/profile/' . $user_id)->with('status', 'Message sent successfully!');
      }

      //return $request->all();
    }
}
