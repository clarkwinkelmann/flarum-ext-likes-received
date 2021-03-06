<?php


namespace ClarkWinkelmann\LikesReceived\Listeners;


use Flarum\Likes\Event\PostWasLiked;

class PostWasLikedListener extends BasePostListener
{
    public function handle(PostWasLiked $event)
    {
        if (!$this->postCounts($event->post)) {
            return;
        }

        $event->post->user->clarkwinkelmann_likes_received_count++;
        $event->post->user->save();
    }
}
