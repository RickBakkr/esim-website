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
        Schema::create('esim_bundles', function (Blueprint $table) {
            $table->id();

            $table->integer('portal_bundle_id');

            $table->integer('data_traffic_mb');
            $table->integer('days_valid');

            $table->float('price'); // price in EUR

            $table->foreignId('country_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esim_bundles');
    }
};
