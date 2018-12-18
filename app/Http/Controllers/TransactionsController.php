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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $blocks = fractal(Transaction::query()->paginate(), new TransactionTransformer())->toArray();
        return response()->json($blocks);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $block = fractal(Transaction::findOrFail($id), new TransactionTransformer())->toArray();
        return response()->json($block);
    }
}
