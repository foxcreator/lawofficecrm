<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('email');
            $table->string('name');
            $table->string('surname');
            $table->string('father_name');
            $table->date('birthdate');
            $table->string('tin_code')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_issued_by')->nullable();
            $table->date('passport_when_issued')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->boolean('visitor_status');
            $table->boolean('personal_agree')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
