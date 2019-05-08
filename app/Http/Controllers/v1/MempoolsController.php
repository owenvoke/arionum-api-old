<?php

namespace App\Http\Controllers\v1;

use App\Mempool;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Transformers\MempoolTransformer;

final class MempoolsController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Mempool::findOrFail($id) : Mempool::query()->orderByDesc('date')->paginate();

        return fractal($data, MempoolTransformer::class)->respond();
    }
}
