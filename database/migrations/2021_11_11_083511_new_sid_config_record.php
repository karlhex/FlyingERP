<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class NewSidConfigRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('sid_configs')->insert([
            [
                'key' => 'employee',
                'prefix' => 'FWEMP',
                'inc_year' => false,
                'inc_month' => false,
                'inc_day' => false,
                'length' => 8,
                'current_no' => 0,
                'max_no' => 9999999,
                'clear_interval' => 'never'
            ],
            [
                'key' => 'contract',
                'prefix' => 'FWAI',
                'inc_year' => true,
                'inc_month' => true,
                'inc_day' => false,
                'length' => 6,
                'current_no' => 0,
                'max_no' => 99999,
                'clear_interval' => 'month'
            ],
            [
                'key' => 'project',
                'prefix' => 'FWPRJ',
                'inc_year' => true,
                'inc_month' => true,
                'inc_day' => false,
                'length' => 6,
                'current_no' => 0,
                'max_no' => 99999,
                'clear_interval' => 'month'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('sid_configs')->truncate();
    }
}
