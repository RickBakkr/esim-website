<?php

use App\Models\Currency;
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
        Schema::table('currencies', function (Blueprint $table) {
            $table->string('decimal_separator', 2)->default(',')->after('symbol');
            $table->string('thousands_separator', 2)->default('.')->after('decimal_separator');
        });

        // EUR
        Currency::where('code', 'EUR')->update([
            'decimal_separator' => ',',
            'thousands_separator' => '.'
        ]);

        // CHF
        Currency::where('code', 'CHF')->update([
            'decimal_separator' => '.',
            'thousands_separator' => '\''
        ]);

        // USD and GBP
        Currency::whereIn('code', ['USD', 'GBP'])->update([
            'decimal_separator' => '.',
            'thousands_separator' => ','
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropColumn('decimal_separator');
            $table->dropColumn('thousands_separator');
        });
    }
};
