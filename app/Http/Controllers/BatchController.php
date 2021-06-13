<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\Ticket;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;

class BatchController extends Controller
{
    public function test() {
        Bus::batch([new TestJob(), new TestJob()])->dispatch();
}
}
