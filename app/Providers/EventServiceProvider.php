<?php

namespace App\Providers;

use App\Events\StarMashup;
use App\Events\UnstarMashup;
use App\Events\FollowProfile;
use App\Events\UnfollowProfile;
use App\Listeners\AddFavorite;
use App\Listeners\RemoveFavorite;
use App\Listeners\AddFan;
use App\Listeners\RemoveFan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StarMashup::class => [
            AddFavorite::class,
        ],
        UnstarMashup::class => [
            RemoveFavorite::class,
        ],
        FollowProfile::class => [
            AddFan::class,
        ],
        UnfollowProfile::class => [
            RemoveFan::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
