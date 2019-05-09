<?php

namespace App\Http\Controllers\v1;

use App\Masternode;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Transformers\MasternodeTransformer;

final class MasternodesController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        $masternodes = $id ? Masternode::findOrFail($id) : Masternode::query()->paginate();

        return fractal($masternodes, MasternodeTransformer::class)->respond();
    }
}
