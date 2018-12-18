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
     * @param string|null $id
     * @return JsonResponse
     */
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Block::findOrFail($id) : Block::query()->paginate();
        return fractal($data, BlockTransformer::class)->respond();
    }
}
