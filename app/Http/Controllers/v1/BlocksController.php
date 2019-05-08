<?php

namespace App\Http\Controllers\v1;

use App\Block;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Transformers\BlockTransformer;

final class BlocksController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Block::findOrFail($id) : Block::query()->orderByDesc('date')->paginate();

        return fractal($data, BlockTransformer::class)->respond();
    }
}
