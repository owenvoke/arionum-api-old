<?php

namespace App\Http\Controllers\v1;

use App\Account;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Transformers\AccountTransformer;

final class AccountsController extends Controller
{
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Account::findOrFail($id) : Account::query()->paginate();

        return fractal($data, AccountTransformer::class)->respond();
    }
}
