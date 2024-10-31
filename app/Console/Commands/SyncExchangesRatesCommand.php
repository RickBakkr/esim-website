<?php

namespace App\Console\Commands;

use App\Models\Currency;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;

class SyncExchangesRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-exchanges-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timestamp = now();

        $this->info('Syncing exchange rates...');

        $currencies = Currency::all();

        foreach($currencies as $currency) {

            $this->info('Syncing exchange rate for ' . $currency->code . '...');

            try {
                $currentEuroRate = $currency->eur_rate;

                $eurRate = $this->getEurRate($currency->code);

                $currency->update([
                    'eur_rate' => $eurRate,
                    'last_synced_at' => $timestamp,
                ]);

                $this->info('Updated exchange rate for ' . $currency->code . ' from ' . $currentEuroRate . ' to ' . $eurRate . '.');

            } catch (\Exception $e) {
                $this->error('Failed to update exchange rate: ' . $e->getMessage());
            }
        }

    }

    private function getEurRate(mixed $code)
    {
        $code = trim(strtolower($code));

        // TODO: find a better source for exchange rates
        $url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/eur.json';

        $client = new Client();

        try {
            $response = $client->get($url);

            $data = json_decode($response->getBody(), true);

            if (isset($data['eur'][$code])) {
                return $data['eur'][$code];
            } else {
                throw new \Exception("Currency code '{$code}' not found in API response.");
            }

        } catch (RequestException $e) {
            throw new \Exception("Failed to fetch currency data: " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
