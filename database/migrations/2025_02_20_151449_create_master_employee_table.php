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
        Schema::create('master_employee', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('employee_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('phone_number');
            $table->text('address');
            $table->date('date_of_birth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_employee');
    }
};
