<?php

namespace ClarkWinkelmann\LikesReceived\Listeners;

use Flarum\Api\Event\Serializing;
use Flarum\Api\Serializer\UserSerializer;
use Illuminate\Contracts\Events\Dispatcher;

class UserAttributes
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Serializing::class, [$this, 'attributes']);
    }

    public function attributes(Serializing $event)
    {
        if ($event->isSerializer(UserSerializer::class)) {
            if ($event->actor->can('viewLikesReceived', $event->model)) {
                $event->attributes['likesReceived'] = $event->model->clarkwinkelmann_likes_received_count;
            }
        }
    }
}
