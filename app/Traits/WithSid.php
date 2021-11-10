<?php

namespace App\Traits;

use App\Models\SidConfig;
use Illuminate\Http\Request;

trait WithSid{
    protected $sidkey;

    public function sid(Request $request) {
        return [
            'sid' => $this->generateSid(),
        ];
    }

    public function generateSid()
    {
        return SidConfig::where('key', $this->sidkey)->first()->sid;
    }

    public function setSid($new_value) {
        $record = SidConfig::where('key', $this->sidkey)->first();
        $record->sid = $new_value;
        $record->save();
    }
}
