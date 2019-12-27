<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentPresentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absent_presents', function (Blueprint $table) {
            $table->engine = 'MyIsam';

            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->date('checkdate');
            $table->boolean('present')->default(false);
            $table->timestamps();

            $table->unique(['student_id','checkdate']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absent_presents');
    }
}
