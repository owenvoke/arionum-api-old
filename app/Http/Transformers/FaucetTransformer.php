<?php

namespace App\Http\Transformers;

use App\Account;
use App\Generators\ArionumExplorer;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

final class FaucetTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'transactions',
    ];


    public static function transform(Account $account): array
    {
        return [
            'account' => $account,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('v1.accounts', ['id' => $account->id]),
                ],
                [
                    'rel' => 'explorer',
                    'uri' => ArionumExplorer::accountUri($account->id),
                ],
            ],
        ];
    }

    public function includeTransactions(Account $account): Collection
    {
        $transaction = $account->transactionsFrom()->paginate();

        return $this->collection($transaction, new TransactionTransformer());
    }
}
