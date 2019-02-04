<?php

namespace App\Http\Transformers;

use App\Account;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class FaucetTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'transactions'
    ];


    public static function transform(Account $account): array
    {
        return [
            'account' => $account,
        ];
    }

    public function includeTransactions(Account $account): Collection
    {
        $transaction = $account->transactionsFrom()->paginate();

        return $this->collection($transaction, new TransactionTransformer());
    }
}
