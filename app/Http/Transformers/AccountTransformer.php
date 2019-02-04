<?php

namespace App\Http\Transformers;

use App\Account;
use App\Generators\ArionumExplorer;
use League\Fractal\TransformerAbstract;

class AccountTransformer extends TransformerAbstract
{
    public static function transform(Account $account): array
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
                    'uri' => route('v1.accounts', ['id' => $account->id]),
                    'explorer' => ArionumExplorer::accountUri($account->id),
                ],
            ],
        ];
    }
}
