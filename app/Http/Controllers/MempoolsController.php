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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $blocks = fractal(Mempool::query()->paginate(), new MempoolTransformer())->toArray();
        return response()->json($blocks);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $block = fractal(Mempool::findOrFail($id), new MempoolTransformer())->toArray();
        return response()->json($block);
    }
}
