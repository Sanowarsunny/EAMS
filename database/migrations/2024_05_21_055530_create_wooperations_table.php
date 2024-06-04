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
        Schema::create('wooperations', function (Blueprint $table) {
            $table->id();
            $table->string('operation_name')->nullable();
            $table->string('resoulation',300)->nullable();
            $table->string('no_of_engineer')->nullable();
            $table->string('started_at')->nullable();
            $table->string('ended_at')->nullable();
            $table->string('after_efficiency')->nullable();
            $table->string('status')->nullable();//draft/released/complete
            $table->string('approval_stas')->nullable();
            $table->string('approve_stats_by')->nullable();
           

          
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
           

            $table->unsignedBigInteger('workorder_id');
            $table->foreign('workorder_id')->references('id')->on('workorders')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->string('updated_by')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           
            $table->index('operation_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wooperations');
    }
};
