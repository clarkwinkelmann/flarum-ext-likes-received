<?php

namespace ClarkWinkelmann\LikesReceived\Api;

use Flarum\Api\Context;
use Flarum\Api\Schema;
use Flarum\User\User;

class UserResourceFields
{
    public function __invoke(): array
    {
        return [
            Schema\Integer::make('likesReceived')
                ->visible(
                    fn(User $user, Context $context) => $context->getActor()->can('viewLikesReceived', $user)
                )
                ->get(fn(User $user) => (int)$user->clarkwinkelmann_likes_received_count),
        ];
    }
}
