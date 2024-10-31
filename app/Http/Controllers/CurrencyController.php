<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class CurrencyController extends Controller
{

    public function setCurrencySession(string $language, string $currency) {
        $sessionKey = config('session.constants.currency');

        $currency = Currency::where('code', strtoupper($currency))->first();

        if($currency) {
            session([$sessionKey => $currency->code]);
        }

        return redirect()->back();
    }

}
