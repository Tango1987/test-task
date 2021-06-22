<?php

namespace App\Listeners;

use App\Events\UserCreatedOrUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\ExternalApiService;

class ExternalApiSync implements ShouldQueue
{
    private ExternalApiService $externalApiService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ExternalApiService $externalApiService)
    {
        $this->externalApiService = $externalApiService;
    }

    /**
     * Handle the event.
     *
     * @param  UserCreatedOrUpdated  $event
     * @return void
     */
    public function handle(UserCreatedOrUpdated $event)
    {
        $this->externalApiService->sync($event->getUser());
    }
}
