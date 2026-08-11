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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->string('employee_number')->unique();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', ['MALE', "FEMALE"]);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('phone');
            $table->string('personal_email')->unique();
            $table->text('address');

            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');

            $table->date('join_date');
            $table->date('termination_date')->nullable();


            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->boolean('is_active')->default(true);

            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
