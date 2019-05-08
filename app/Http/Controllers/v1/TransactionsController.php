<?php

namespace App\Http\Controllers\v1;

use App\Transaction;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Transformers\TransactionTransformer;

final class TransactionsController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Transaction::findOrFail($id) : Transaction::query()->orderByDesc('date')->paginate();

        return fractal($data, TransactionTransformer::class)->respond();
    }
}
