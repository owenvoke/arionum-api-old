<?php

namespace App\Http\Controllers\v1;

use App\Account;
use App\Http\Controllers\Controller;
use App\Http\Transformers\AccountTransformer;
use App\Http\Transformers\AliasTransformer;
use Illuminate\Http\JsonResponse;

class AliasController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        if ($id !== null) {
            return fractal(Account::findByAlias($id), AccountTransformer::class)->respond();
        }

        $data = Account::query()
            ->whereNotNull('alias')
            ->where('alias', '!=', '')
            ->select('alias')
            ->paginate();

        return fractal($data, AliasTransformer::class)->respond();
    }
}
