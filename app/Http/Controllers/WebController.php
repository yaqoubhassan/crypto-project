<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $cryptoData = [];

        try {
            // Try to get data from cache first
            if (Cache::has('crypto_data')) {
                $cryptoData = Cache::get('crypto_data');
            } else {
                // If not in cache, fetch from API
                $response = Http::get('rest.coincap.io/v3/assets', [
                    'limit' => 10,
                    'apiKey' => env('COINCAP_APIKEY')
                ]);

                // Check if response is successful
                if ($response->successful()) {
                    $cryptoData = $response->json()['data'];

                    // Store in cache for 10 minutes (adjust time as needed)
                    Cache::put('crypto_data', $cryptoData, now()->addMinutes(30));
                } else {
                    Log::error('CoinCap API error: ' . $response->status() . ' - ' . $response->body());
                }
            }
        } catch (\Throwable $th) {
            Log::error('Error fetching crypto data: ' . $th->getMessage());
        }

        return Inertia::render('Web/Home', [
            'cryptoData' => $cryptoData
        ]);
    }

    public function features()
    {
        return Inertia::render('Web/Features');
    }

    public function markets()
    {
        return Inertia::render('Web/Markets');
    }
}
