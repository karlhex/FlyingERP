<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FlyingModel;
use Illuminate\Support\Facades\Log;

class SidConfig extends FlyingModel
{
    use HasFactory;

    protected $fillable=[
        'key','prefix','inc_year','inc_month','inc_day','length','current_no','max_no','clear_interval'
    ];


    public function getSidAttribute()
    {
        $x = trim($this->prefix);
        $y = date('Y');
        $m = date('m');
        $d = date('d');

        if ($this->inc_year)
            $x = $x.$y;

        if ($this->inc_month)
            $x = $x.$m;

        if ($this->inc_day)
            $x = $x.$d;

        $n = sprintf("%0".$this->length."u",$this->current_no + 1);

        return $x.$n;
    }

    public function setSidAttribute($value) {
        $x = trim($this->prefix);

        $xlen = strlen($x);
        if (substr($value, 0, $xlen) != $x ) return;

        $y = date('Y');
        $m = date('m');
        $d = date('d');

        if ($this->inc_year ) {
            if (substr($value, $xlen, 4) != $y) return;
            $xlen += 4;
        }

        if ($this->inc_month ) {
            if (substr($value, $xlen, 2) != $m) return;
            $xlen += 2;
        }

        if ($this->inc_day ) {
            if (substr($value, $xlen, 2) != $d) return;
            $xlen += 2;
        }

        $n = (int)substr($value, -1 * $this->length, $this->length);

        if ( $n > $this->current_no )
            $this->attributes['current_no'] = $n;
    }
}
