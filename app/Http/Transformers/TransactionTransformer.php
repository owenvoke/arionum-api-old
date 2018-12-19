<?php

namespace App\Http\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

/**
 * Class TransactionTransformer
 */
class TransactionTransformer extends TransformerAbstract
{
    /**
     * @param Transaction $transaction
     * @return array
     */
    public function transform(Transaction $transaction): array
    {
        return [
            'id' => $transaction->id,
            'block_id' => $transaction->block,
            'height' => $transaction->height,
            'destination' => $transaction->dst,
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
                    'uri' => route('transactions', ['id' => $transaction->id]),
                ],
            ],
        ];
    }
}
