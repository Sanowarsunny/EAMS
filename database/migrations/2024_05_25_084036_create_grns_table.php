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
        Schema::create('grns', function (Blueprint $table) {
            $table->id();
            $table->string('assetitem_po_mst_id')->nullable()->unique();
            $table->string('spareparts_po_mst_id')->nullable()->unique();
            $table->string('categorymodel_id')->nullable()->unique();
            $table->string('spartpart_id')->nullable()->unique();
            $table->string('brand_id')->nullable()->unique();
            $table->string('unit_price')->nullable()->unique();
            $table->string('quantity')->nullable();
            $table->string('totla_amount')->nullable();
            $table->string('uom_id')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('item_type')->nullable();
 
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
        Schema::dropIfExists('grns');
    }
};
