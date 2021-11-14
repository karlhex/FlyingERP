<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class FwRoute extends Facade {

       /**
     * 获取组件注册名称
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'FwRoute';
    }

    public static function fwResource($path, $class, $search=false, $sid=false) {
        $p = Str::singular($path);

        Route::apiResource($path, $class);

        if ($search)
            Route::get('/'.$p.'/search', [$class, 'search']);

        if ($sid)
            Route::get('/'.$p.'/sid', [$class, 'sid']);
    }

    public static function fwResources($list) {
        foreach ( $list as $item ) {
            FwRoute::fwResource(
                $item['path'],
                $item['class'],
                $item['search'],
                $item['sid']
            );
        }
    }
}
