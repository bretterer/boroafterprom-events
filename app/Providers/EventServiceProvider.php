<?php

namespace App\Providers;

use App\Events\LogActivity;
use App\Events\AttendeeCheckedIn;
use App\Events\AttendeeCheckedOut;
use App\Listeners\StoreActivityLog;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendAttendeeCheckedInSMS;
use App\Listeners\SendAttendeeCheckedOutSMS;
use App\Listeners\SendAttendeeCheckedInEmail;
use App\Listeners\SendAttendeeCheckedOutEmail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AttendeeCheckedIn::class => [
            // SendAttendeeCheckedInSMS::class,
            SendAttendeeCheckedInEmail::class,
        ],
        AttendeeCheckedOut::class => [
            // SendAttendeeCheckedOutSMS::class,
            SendAttendeeCheckedOutEmail::class,
        ],
        LogActivity::class => [
            StoreActivityLog::class,
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
