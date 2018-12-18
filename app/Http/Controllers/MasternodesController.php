<?php

namespace App\Http\Controllers;

use App\Http\Transformers\MasternodeTransformer;
use App\Masternode;
use Illuminate\Http\JsonResponse;

/**
 * Class MasternodesController
 */
class MasternodesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $blocks = fractal(Masternode::query()->paginate(), new MasternodeTransformer())->toArray();
        return response()->json($blocks);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $block = fractal(Masternode::findOrFail($id), new MasternodeTransformer())->toArray();
        return response()->json($block);
    }
}
