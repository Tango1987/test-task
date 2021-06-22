<?php

namespace App\Http\Controllers;

use App\Events\UserCreatedOrUpdated;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserRequest $request)
    {
        $user = User::updateOrCreate(
            ['email'   => $request->email],
            ['address' => $request->address]
        );

        event(new UserCreatedOrUpdated($user));

        return response()->json([ 'status' => 'OK']);
    }
}
