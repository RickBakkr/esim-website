<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->string('name');
            $table->string('symbol');

            $table->float('eur_rate')->default(1.00); // rate to EUR

            $table->datetime('last_synced_at')->nullable();

            $table->timestamps();
        });

        // prepare data (EUR, USD, CHF, GBP)
        DB::table('currencies')->insert([
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'],
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'],
            ['code' => 'CHF', 'name' => 'Swiss Franc', 'symbol' => 'CHF'],
            ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£'],
        ]);

        DB::table('currencies')->insert([
            ['code' => 'TRY', 'name' => 'Turkish Lira', 'symbol' => '₺'],
            ['code' => 'RUB', 'name' => 'Russian Ruble', 'symbol' => '₽'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
