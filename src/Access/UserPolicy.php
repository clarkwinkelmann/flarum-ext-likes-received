<?php

namespace ClarkWinkelmann\LikesReceived\Access;

use Flarum\User\AbstractPolicy;
use Flarum\User\User;

class UserPolicy extends AbstractPolicy
{
    protected $model = User::class;

    public function viewLikesReceived(User $actor, User $user)
    {
        return $actor->id === $user->id || $actor->hasPermission('clarkwinkelmann-likes-received.view');
    }
}
