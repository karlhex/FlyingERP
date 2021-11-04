<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait WithReplaceList {

    /**
     * 保存列表内的一条列表数据入数据库
     *
     *  @var parentdb 父模型
     *  @var name 列表名
     *  @var rec 一条列表纪录
     *  @return void
     */
    public function replaceList($parentdb,$name,$rec){
        $num = 10;

        $items = $parentdb->$name()->get();

        foreach ($items as $xid)
        {
            if (!in_array($xid->id,array_column($rec,'id')))
            {
                Log::debug("not in array ".$xid->id);
                $parentdb->$name()->find($xid->id)->delete();
            }
        }

        foreach ($rec as $item )
        {

            $item['sequence'] = $num;

            Log::debug('item'.json_encode($item));

            $a = $parentdb->$name()->find($item['id']);
            if ($a != null)
                $a->update($item);
            else {
                $a = $parentdb->$name()->create($item);
                Log::debug('a'.json_encode($a));
            }

            $num += 10;
        }
    }
}
