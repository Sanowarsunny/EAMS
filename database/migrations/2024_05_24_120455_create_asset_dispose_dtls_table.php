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
        Schema::create('asset_dispose_dtls', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('asset_dispose_mst_id');
            $table->foreign('asset_dispose_mst_id')->references('id')->on('asset_dispose_msts')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->unsignedBigInteger('assetitem_id');
            $table->foreign('assetitem_id')->references('id')->on('assetitems')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->string('remarks')->nullable();
            
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
        Schema::dropIfExists('asset_dispose_dtls');
    }
};
