<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Shows details about a particular message
     * 
     * @param  Integer $message_id 
     * @return Response             
     */
    public function show($message_id) 
    {
      $message = Message::find($message_id);
      $from = User::find($message->from);

      return view('pages.user.message.show', [
        'message' => $message, 
        'from' => $from
      ]);
    }

    /**
     * Deletes a particular message
     * 
     * @param  Integer $message_id
     * @return Response             
     */
    public function destroy($message_id)
    {
      $message = Message::find($message_id);

      if ($message->delete()) {
        $message->users()->detach([$message->from, $message->to]);

        return redirect('/profile/')->with('status', 'Message deleted successfully!');
      }
    }

    /**
     * Stores a new message in the database
     * 
     * @param  Request $request
     * @param  Integer  $user_id 
     * @return Response           
     */
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
    }

    /**
     * Show all messages that the user has
     * 
     * @return Response 
     */
    public function showAll()
    {
      $user = User::find(Auth::user()->id);
      $messages = $user->messages()->where('to', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
      
      // Grab the sender's first and last name
      foreach ($messages as $message) {
        $from = User::find($message->from);
        $fullname = $from->first_name . ' ' . $from->last_name;
        $message->from_fullname = $fullname;
      }

      return view('pages.user.message.show_all', [
        'messages' => $messages
      ]);
    }
}
