<?php

namespace App\Http\Controllers;

use App\Block;
use App\Http\Transformers\BlockTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class BlocksController
 */
class BlocksController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $blocks = fractal(Block::query()->paginate(), new BlockTransformer())->toArray();
        return response()->json($blocks);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $block = fractal(Block::findOrFail($id), new BlockTransformer())->toArray();
        return response()->json($block);
    }
}
