<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;

class TestController extends Controller
{
    public function test()
    {
        $time = Carbon::now();
        dd('ss', $time);
    }
}
