<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\SidConfig;
use App\Traits\WithSid;

class SidTest extends TestCase
{

    use WithSid;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_generate()
    {
        $record = SidConfig::where('key', 'employee')->first();

        $v = $record->sid;

        print($v);

        $record->sid = $v;

        $record->save();

        $record = SidConfig::where('key', 'employee')->first();

        print($record);

        $this->sidkey = 'employee';

        $v = $this->generateSid();

        print($v);

        $this->setSid($v);

        $this->assertTrue(true);
    }
}
