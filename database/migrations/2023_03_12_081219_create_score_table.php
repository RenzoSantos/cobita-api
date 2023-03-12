<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('activity_id')->nullable();
            $table->string('name');
            $table->string('activity')->nullable();
            $table->string('detail')->nullable();
            $table->string('output')->nullable();
            $table->string('points')->nullable();
            $table->string('score')->nullable();
            $table->string('answer')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('section')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score');
    }
};
