<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * se implemnta *ShouldBroadcast*
 * para decirle a laravel que este evento debe de ser 
 * broadcasted para cualquier control que se encuentre en 
 * el archivo de configuracion
 */
class StatusLiked implements ShouldBroadcast 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username = $username;
        $this->message = "{$username} le gusto tu estado";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['status-liked'];
        return new PrivateChannel('channel-name');
    }
}
