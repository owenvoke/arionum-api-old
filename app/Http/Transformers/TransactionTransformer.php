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
     * @param Transaction $mempool
     * @return array
     */
    public function transform(Transaction $mempool): array
    {
        return [
            'id' => $mempool->id,
            'block' => $mempool->block,
            'height' => $mempool->height,
            'destination' => $mempool->dst,
            'value' => $mempool->val,
            'fee' => $mempool->fee,
            'signature' => $mempool->signature,
            'version' => $mempool->version,
            'message' => $mempool->message,
            'date' => $mempool->date,
            'public_key' => $mempool->public_key,
        ];
    }
}
