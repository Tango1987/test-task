<?php


namespace App\Repositories;


use App\Models\Office;

class OfficeRepository
{
    /**
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email)
    {
        return Office::whereHas('company.clients', function ($query) use ($email) {
            $query->whereEmail($email);
        })->get(['id', 'title']);
    }
}
