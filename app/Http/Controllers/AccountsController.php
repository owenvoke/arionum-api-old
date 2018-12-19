<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Transformers\AccountTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class AccountsController
 */
class AccountsController extends Controller
{
    /**
     * @param string|null $id
     * @return JsonResponse
     */
    public function list(?string $id = null): JsonResponse
    {
        $data = $id ? Account::findOrFail($id) : Account::query()->paginate();
        return fractal($data, AccountTransformer::class)->respond();
    }
}
