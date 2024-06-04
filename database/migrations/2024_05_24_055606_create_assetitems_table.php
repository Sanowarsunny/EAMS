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
        Schema::create('assetitems', function (Blueprint $table) {
            $table->id();
            $table->string('asset_no')->nullable()->unique();
            $table->string('manufacture_no')->nullable()->unique();
            $table->string('gov_registration_no')->nullable()->unique();
            $table->string('chassis_no')->nullable()->unique();
            $table->string('enginee_no')->nullable()->unique();
            $table->string('stock_sts')->nullable();
           
            $table->string('pruchase_date')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('WarrantyEndDate')->nullable();
            $table->string('DepreciationRate')->nullable();
            
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('categorymodel_id');
            $table->foreign('categorymodel_id')->references('id')->on('categorymodels')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->string('updated_by')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           
            $table->index('asset_no');
            $table->index('manufacture_no');
            $table->index('gov_registration_no');
            $table->index('chassis_no');
            $table->index('enginee_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assetitems');
    }
};
