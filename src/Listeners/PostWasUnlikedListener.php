<?php


namespace ClarkWinkelmann\LikesReceived\Listeners;


use Flarum\Likes\Event\PostWasUnliked;

class PostWasUnlikedListener extends BasePostListener
{
    public function handle(PostWasUnliked $event)
    {
        if (!$this->postCounts($event->post)) {
            return;
        }

        // Substract one like but don't go below zero
        $event->post->user->clarkwinkelmann_likes_received_count = max($event->post->user->clarkwinkelmann_likes_received_count - 1, 0);
        $event->post->user->save();
    }
}
