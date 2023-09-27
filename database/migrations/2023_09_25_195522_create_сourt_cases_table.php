<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('court_cases', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('case_number')->unique();
            $table->string('case_production_number');
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('user_id');
            $table->string('article');
            $table->string('case_category');
            $table->string('google_drive_link');
            $table->smallInteger('case_status')->default(0);
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cases');
    }
};
