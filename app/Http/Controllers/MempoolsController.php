<?php

namespace App\Http\Controllers;

use App\Http\Transformers\MempoolTransformer;
use App\Mempool;
use Illuminate\Http\JsonResponse;

/**
 * Class MempoolsController
 */
class MempoolsController extends Controller
{
    /**
     * @param string|null $id
     * @return JsonResponse
     */
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Mempool::findOrFail($id) : Mempool::query()->orderByDesc('date')->paginate();
        return fractal($data, MempoolTransformer::class)->respond();
    }
}
