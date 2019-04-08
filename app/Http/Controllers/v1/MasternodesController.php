<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Transformers\MasternodeTransformer;
use App\Masternode;
use Illuminate\Http\JsonResponse;

final class MasternodesController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        $masternodes = $id ? Masternode::findOrFail($id) : Masternode::query()->paginate();
        return fractal($masternodes, MasternodeTransformer::class)->respond();
    }
}
