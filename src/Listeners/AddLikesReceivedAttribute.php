<?php

namespace ClarkWinkelmann\LikesReceived\Listeners;

class AddLikesReceivedAttribute
{
    public function __invoke($serializer, $user, $attributes)
    {
        if ($serializer->getActor()->can('viewLikesReceived', $user)) {
            $attributes['likesReceived'] = $user->clarkwinkelmann_likes_received_count;
        }

        return $attributes;
    }
}
