<?php

/**
 * 后台路由，url前缀 /api/admin.
 */

Route::group([], function () {
    Route::get('/test', 'TestController@test');
});
