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
        Schema::create('objecttoroles', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('rollmanage_id');
            $table->foreign('rollmanage_id')->references('id')->on('rollmanages')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('manageobject_id');
            $table->foreign('manageobject_id')->references('id')->on('manageobjects')
            ->cascadeOnUpdate()->restrictOnDelete();

         
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           
            $table->index('rollmanage_id');
            $table->index('manageobject_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objecttoroles');
    }
};
