<?php

namespace App\Http\Controllers;

use App\Http\Transformers\TransactionTransformer;
use App\Transaction;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionsController
 */
class TransactionsController extends Controller
{
    /**
     * @param string|null $id
     * @return JsonResponse
     */
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Transaction::findOrFail($id) : Transaction::query()->orderByDesc('date')->paginate();
        return fractal($data, TransactionTransformer::class)->respond();
    }
}
