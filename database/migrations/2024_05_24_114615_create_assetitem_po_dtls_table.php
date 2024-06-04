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
        Schema::create('assetitem_po_dtls', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('assetitem_po_mst_id');
            $table->foreign('assetitem_po_mst_id')->references('id')->on('assetitem_po_msts')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->unsignedBigInteger('categorymodel_id');
            $table->foreign('categorymodel_id')->references('id')->on('categorymodels')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->string('unit_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('totla_amount')->nullable();
            $table->string('uom_id')->nullable();


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
        Schema::dropIfExists('assetitem_po_dtls');
    }
};
