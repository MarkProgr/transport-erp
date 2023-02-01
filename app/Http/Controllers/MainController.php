<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Driver;
use App\Models\Transport;

class MainController extends Controller
{
    public function index()
    {
        $successfulOrders = Customer::query()
            ->where('status_of_deal', 'Done')
            ->count();

        $countOfAvailableDrivers = Driver::query()
            ->where('status', 'Inactive')
            ->count();

        $countOfCustomers = Customer::query()
            ->count();

        $countOfTransport = Transport::query()
            ->count();

        $countOfTypesOfTransport = Transport::query()
            ->distinct()
            ->count('type');

        return view(
            'welcome',
            compact(
                'successfulOrders',
                'countOfAvailableDrivers',
                'countOfCustomers',
                'countOfTransport',
                'countOfTypesOfTransport'
            )
        );
    }
}
