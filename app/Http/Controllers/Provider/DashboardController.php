<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:provider.verification.notice');
    }

    public function index()
    {
        return view('provider.dashboard');
    }

    public function provtrans()
    {
        $transactionsCurrent = Transaction::join("properties", "properties.id", "=", "transaction.properties_id")
            ->join("providers", "providers.id", "=", "properties.providers_id")
            ->where("properties.providers_id", "=", Auth::guard('provider')->user()->id)
            ->whereRaw('Date(transaction.enddate) < CURDATE()')
            ->orderBy('transaction.startdate', 'DESC')
            ->get();

        $transactionsPrevious = Transaction::join("properties", "properties.id", "=", "transaction.properties_id")
            ->join("providers", "providers.id", "=", "properties.providers_id")
            ->where("properties.providers_id", "=", Auth::guard('provider')->user()->id)
            ->whereRaw('Date(transaction.enddate) > CURDATE()')
            ->orderBy('transaction.startdate', 'DESC')
            ->get();

        return view('provider.dashboard', ['transactionsCurrent' => $transactionsCurrent], ['transactionsPrevious' => $transactionsPrevious]);
    }
}
