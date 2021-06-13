<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test()
    {
        User::query()->leftJoinSub(
            Team::whereColumn('teams.user_id', 'users.id')->latest()->limit(1), 'teams', 'teams.user_id', 'users.id')
            ->where('teams.status', 1)
            ->toSql();
    }
}
