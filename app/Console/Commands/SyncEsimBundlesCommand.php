<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\EsimBundle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;

class SyncEsimBundlesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-esim-bundles';

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
        $countries = $this->apiCall('countries');
        if(isset($countries['countries'])) {
            foreach($countries['countries'] as $country) {

                $ourCountry = Country::where('code', $country['code'])->first();

                if(!$ourCountry) {
                    $this->info('Country ' . $country['name'] . ' not found in our database. Creating...');

                    $ourCountry = Country::create([
                        'code' => $country['code'],
                        'name' => $country['name'],
                    ]);
                }

                $this->info('Syncing bundles for ' . $country['name'] . '...');

                $bundles = $this->apiCall('bundles', ['country_id' => $country['id']]);
                if(isset($bundles['bundles'])) {

                    $apiBundleIds = [];

                    foreach($bundles['bundles'] as $bundle) {
                            $apiBundleIds[] = $bundle['id'];

                            $this->info('Syncing bundle ' . $bundle['id'] . '...');

                            EsimBundle::updateOrCreate(
                                [
                                    'portal_bundle_id' => $bundle['id'],
                                    'country_id' => $ourCountry->id,
                                ],
                                [
                                    'data_traffic_mb' => $bundle['data_traffic'],
                                    'days_valid' => $bundle['days'],
                                    'price' => $bundle['price'],
                                ]
                            );
                    }

                    if(!empty($apiBundleIds)) {
                        EsimBundle::where('country_id', $ourCountry->id)
                            ->whereNotIn('portal_bundle_id', $apiBundleIds)
                            ->delete();
                    } else {
                        $this->warn('Trying to delete all bundles for ' . $country['name'] . '...');
                    }
                }
            }
        }
    }

    public function apiCall($url, $parameters = [])
    {
        $client = new Client([
            'base_uri' => config('webapi.base_url'),
        ]);

        // bearer token
        $token = config('webapi.token');

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        // add parameters to url
        $url .= '?' . http_build_query($parameters);

        try {
            $response = $client->get($url, [
                'headers' => $headers,
            ]);

            $data = json_decode($response->getBody(), true);

            return $data;

        } catch (RequestException $e) {
            throw new \Exception("Failed to fetch currency data: " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
