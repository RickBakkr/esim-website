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
            'code' => 'DKK',
            'name' => 'Danish Krone',
            'symbol' => 'kr',
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
