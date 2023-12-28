<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Events\MessageEvent;

class ChatAppController extends Controller
{
    public function loadview(){
        return view('chat');
    }

    public function board_message(Request $request){

        event(new MessageEvent($request->username, $request->message));
    }
}
