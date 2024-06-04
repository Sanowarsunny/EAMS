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
        Schema::create('womaterials', function (Blueprint $table) {
            $table->id();
            $table->string('quantity')->nullable();
            $table->string('required_date')->nullable();
            $table->string('activities')->nullable();   
            $table->string('UOM')->nullable();   
            
           

            $table->unsignedBigInteger('workorder_id');
            $table->foreign('workorder_id')->references('id')->on('workorders')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('wooperation_id');
            $table->foreign('wooperation_id')->references('id')->on('wooperations')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->string('updated_by')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('womaterials');
    }
};
