<?php

namespace App\Http\Transformers;

use App\Account;
use League\Fractal\TransformerAbstract;

/**
 * Class AccountTransformer
 */
class AccountTransformer extends TransformerAbstract
{
    /**
     * @param Account $account
     * @return array
     */
    public function transform(Account $account): array
    {
        return [
            'id' => $account->id,
            'public_key' => $account->public_key,
            'block_id' => $account->block,
            'balance' => $account->balance,
            'alias' => $account->alias,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('accounts', ['id' => $account->id]),
                ],
            ],
        ];
    }
}
