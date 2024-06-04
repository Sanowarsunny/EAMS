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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('nid')->nullable();
            $table->string('houseNO')->nullable();
            $table->string('roadNO')->nullable();
            $table->string('wordNO')->nullable();
            $table->string('contctNo')->nullable();
            $table->string('permanentAddress')->nullable();
            $table->string('status')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('ending_date')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('section')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('national_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('job_location')->nullable();
            $table->string('education')->nullable();
            $table->string('experiences')->nullable();
            $table->string('skills')->nullable();
            $table->string('awarded')->nullable();
            $table->string('holyday')->nullable();
            $table->string('salary')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('currency')->nullable();
            $table->string('reference')->nullable();


            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           
            $table->index('name');
            $table->index('houseNO');
            $table->index('contctNo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
