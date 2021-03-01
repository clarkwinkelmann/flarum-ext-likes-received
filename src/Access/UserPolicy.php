<?php

namespace ClarkWinkelmann\LikesReceived\Access;

use Flarum\User\User;

class UserPolicy extends \Flarum\User\Access\UserPolicy
{
    public function viewLikesReceived(User $actor, User $user)
    {
        return ($actor->id === $user->id || $actor->hasPermission('clarkwinkelmann-likes-received.view'))
            ? $this->allow()
            : $this->deny();
    }
}
