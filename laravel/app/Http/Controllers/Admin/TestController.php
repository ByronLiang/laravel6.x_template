<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

/**
 * 基础测试类 不进行认证校验
 */
class TestController extends Controller
{
    public function test()
    {
        $time = Carbon::now();
        dd('ss', $time);
    }
}
