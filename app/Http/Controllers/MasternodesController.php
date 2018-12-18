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
     * @param string|null $id
     * @return JsonResponse
     */
    public function list(?string $id = null): JsonResponse
    {
        $masternodes = $id ? Masternode::findOrFail($id) : Masternode::query()->paginate();
        return fractal($masternodes, new MasternodeTransformer())->respond();
    }
}
