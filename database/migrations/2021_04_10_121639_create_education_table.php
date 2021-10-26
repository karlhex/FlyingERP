<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
1. 员工ID nid
2. 开始时间 startDate
3. 结束时间 endDate
4. 学校 school
5. 学历 degree
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->unsignedTinyInteger('sequence');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('school');
            $table->string('degree',10); /*['highschool','college','bachelor','master','PHD','other']*/
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('select_options')->insert([
            ['key' => 'degree','option' => 'highschool','value'=>'高中'],
            ['key' => 'degree','option' => 'college','value'=>'大专'],
            ['key' => 'degree','option' => 'bachelor','value'=>'本科'],
            ['key' => 'degree','option' => 'master','value'=>'硕士'],
            ['key' => 'degree','option' => 'PHD','value'=>'博士'],
            ['key' => 'degree','option' => 'other','value'=>'其他'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
