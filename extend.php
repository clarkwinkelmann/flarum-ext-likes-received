<?php

namespace ClarkWinkelmann\LikesReceived;

use Flarum\Extend;
use Illuminate\Contracts\Events\Dispatcher;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js'),

    new Extend\Locales(__DIR__ . '/resources/locale'),

    (new Extend\Console())
        ->command(Commands\UpdateLikesReceivedCommand::class),

    function (Dispatcher $events) {
        $events->subscribe(Access\UserPolicy::class);
        $events->subscribe(Listeners\LikesCountUpdater::class);
        $events->subscribe(Listeners\UserAttributes::class);
    },
];
