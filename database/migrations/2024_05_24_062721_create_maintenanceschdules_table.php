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
        Schema::create('maintenanceschdules', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('assetitem_id');
            $table->foreign('assetitem_id')->references('id')->on('assetitems')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->string('maint_date')->nullable();
            $table->string('maint_sts')->nullable();
            $table->string('totla_amount')->nullable();
            $table->string('uom_id')->nullable();


            $table->unsignedBigInteger('workshop_id');
            $table->foreign('workshop_id')->references('id')->on('workshops')
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
        Schema::dropIfExists('maintenanceschdules');
    }
};
