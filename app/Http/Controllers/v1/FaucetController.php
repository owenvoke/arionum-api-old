<?php

namespace App\Http\Controllers\v1;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Transformers\FaucetTransformer;

final class FaucetController extends Controller
{
    public const ADDRESS = '2bG9Z7LiMaCoz6WhcnR55z8Uz73RdmLDyn62bWTovuPLK4x6ThYyWGaUKL5HKBHE3UUzsjNJk8He9BNKFd5Zr93Q';

    public function index(Request $request): JsonResponse
    {
        $response = fractal(Account::query()->find(self::ADDRESS), FaucetTransformer::class);

        if ($request->get('withTransactions')) {
            $response = $response->includeTransactions();
        }

        return $response->respond();
    }

    public function balance(): array
    {
        return [
            'data' => [
                'balance' => Account::query()->find(self::ADDRESS)->balance,
            ],
        ];
    }
}
