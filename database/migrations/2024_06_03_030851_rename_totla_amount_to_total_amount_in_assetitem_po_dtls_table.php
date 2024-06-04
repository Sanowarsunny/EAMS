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
        Schema::table('assetitem_po_dtls', function (Blueprint $table) {
            $table->renameColumn('totla_amount', 'total_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assetitem_po_dtls', function (Blueprint $table) {
            $table->renameColumn('total_amount', 'totla_amount');
        });
    }
};
