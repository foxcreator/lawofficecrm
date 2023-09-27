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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->date('consultation_date');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('reception_id');
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('reception_id')->references('id')->on('receptions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }

};
