<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTrade implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

     public function broadcastAs()  //"boardcastAs" method use for listing karene ke liye event ka name change karo
     {
         return 'custom_name';
     }

     public function broadcastWith()  //our own message how broadcast message
     {
         return ['custom_message' => $this->message . ', how are you?', 'id'=>1];
     }
     

    public function broadcastOn()
    {
        // for private channel
        //return new PrivateChannel('trades');

        // use for public channel
        // return new Channel('trades');

         // use for presence channel  (when user login or logout and typing detect  some information store)
         return new PresenceChannel('track-message-channel');

    }

 
}
