<?php

use App\Models\Currency;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Currency::create([
            'code' => 'NOK',
            'name' => 'Norwegian Krone',
            'symbol' => 'kr',
        ]);

        Currency::create([
            'code' => 'SEK',
            'name' => 'Swedish Krona',
            'symbol' => 'kr',
        ]);

        // Polish
        Currency::create([
            'code' => 'PLN',
            'name' => 'Polish Zloty',
            'symbol' => 'zł',
        ]);

        // Czech
        Currency::create([
            'code' => 'CZK',
            'name' => 'Czech Koruna',
            'symbol' => 'Kč',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Currency::whereIn('code', ['DKK'])->delete();
    }
};
