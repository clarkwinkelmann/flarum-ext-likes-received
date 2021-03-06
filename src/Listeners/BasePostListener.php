<?php


namespace ClarkWinkelmann\LikesReceived\Listeners;


use Flarum\Post\Post;

abstract class BasePostListener
{
    protected function postCounts(Post $post)
    {
        return $post->user && $post->type === 'comment' && !$post->is_private;
    }
}
