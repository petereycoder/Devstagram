<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        $user->followers()->attach(auth()->user()->id);

        return back();
    }
}
