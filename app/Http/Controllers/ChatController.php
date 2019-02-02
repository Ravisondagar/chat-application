<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvent;
use Pusher\Pusher;


class ChatController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function chat()
	{
		return view('chat');
	}

	/*public function send(Request $request)
	{
		$user = User::find(Auth::id());
		event(new ChatEvent($request->message,$user));
	}*/

	public function send()
	{
		$options = array(
		    'cluster' => 'ap2',
		    'useTLS' => true
		  );
		$pusher = new Pusher(
		    '18035712f08e65bb823d',
		    '47a007f12ee485878205',
		    '700752',
		    $options
		  );

	  /*$data['message'] = 'hello world';
	  $pusher->trigger('my-channel', 'my-event', $data);*/
		$message = 'hello';
		$user = User::find(Auth::id())->name;
		event(new ChatEvent($message,$user));
	}
}
