<?php

namespace App\Http\Transformers;

use App\Generators\ArionumExplorer;
use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    public static function transform(Transaction $transaction): array
    {
        return [
            'id' => $transaction->id,
            'block_id' => $transaction->block,
            'height' => $transaction->height,
            'destination_address' => $transaction->dst,
            'value' => $transaction->val,
            'fee' => $transaction->fee,
            'signature' => $transaction->signature,
            'version' => $transaction->version,
            'message' => $transaction->message,
            'date' => $transaction->date,
            'public_key' => $transaction->public_key,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('v1.transactions', ['id' => $transaction->id]),
                ],
                [
                    'rel' => 'explorer',
                    'uri' => ArionumExplorer::transactionUri($transaction->id),
                ],
            ],
        ];
    }
}
