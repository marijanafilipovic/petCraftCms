<?php

namespace App\Providers;

use App\Models\Pet;
use App\Observers\PetObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     * @property array<class-string, array<int, class-string>> $observers
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
    protected $observers = [
        Pet::class => [PetObserver::class],
    ];

    /**
     * @return void
     */
    public function boot(): void
    {
        Pet::observe(PetObserver::class);
    }

    /**
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
