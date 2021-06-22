<?php


namespace App\Services;

use App\Models\User;

class ExternalApiService
{
    private $externalApi;

    /**
     * @param User $user
     */
    public function sync(User $user)
    {
        $this->externalApi->createOrUpdate($user);
    }
}
