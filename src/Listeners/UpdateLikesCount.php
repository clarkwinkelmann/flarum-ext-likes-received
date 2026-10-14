<?php

namespace ClarkWinkelmann\LikesReceived\Listeners;

use Flarum\Likes\Event\PostWasLiked;
use Flarum\Likes\Event\PostWasUnliked;
use Flarum\Post\Post;

class UpdateLikesCount
{
    protected function postCounts(Post $post): bool
    {
        return $post->user && $post->type === 'comment' && !$post->is_private;
    }

    public function postWasLiked(PostWasLiked $event): void
    {
        if (!$this->postCounts($event->post)) {
            return;
        }

        $event->post->user->clarkwinkelmann_likes_received_count++;
        $event->post->user->save();
    }

    public function postWasUnliked(PostWasUnliked $event): void
    {
        if (!$this->postCounts($event->post)) {
            return;
        }

        // Subtract one like but don't go below zero
        $event->post->user->clarkwinkelmann_likes_received_count = max($event->post->user->clarkwinkelmann_likes_received_count - 1, 0);
        $event->post->user->save();
    }
}
