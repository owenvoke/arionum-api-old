<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Transformers\AccountTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class AccountsController
 */
class AccountsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $accounts = fractal(Account::query()->paginate(), new AccountTransformer())->toArray();
        return response()->json($accounts);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $account = fractal(Account::findOrFail($id), new AccountTransformer())->toArray();
        return response()->json($account);
    }
}
