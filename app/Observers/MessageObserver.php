<?php

namespace App\Observers;

use App\Models\Message;
use App\Events\Message as MessageEvent;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        MessageEvent::dispatch($message);
    }
}
