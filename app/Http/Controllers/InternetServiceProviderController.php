<?php

namespace App\Http\Controllers;

use App\Services\InternetServiceProvider\Ooredoo;;
use App\Services\InternetServiceProvider\Mpt;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{

    public function getMptInvoiceAmount(Request $request): \Illuminate\Http\JsonResponse
    {
        $mpt = new Mpt();
        $mpt->setMonth($request->get('month') ?: 1);
        $amount = $mpt->calculateTotalAmount();

        return response()->json([
            'data' => $amount
        ]);
    }

    public function getOoredooInvoiceAmount(Request $request): \Illuminate\Http\JsonResponse
    {
        $ooredoo = new Ooredoo();
        $ooredoo->setMonth($request->get('month') ?: 1);
        $amount = $ooredoo->calculateTotalAmount();

        return response()->json([
            'data' => $amount
        ]);
    }
}
