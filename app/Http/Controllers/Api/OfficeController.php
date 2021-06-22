<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\OfficeRepository;

class OfficeController extends Controller
{

    private OfficeRepository $officeRepository;

    public function __construct(OfficeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }

    public function view($email)
    {
        return response()->json($this->officeRepository->findByEmail($email));
    }
}
