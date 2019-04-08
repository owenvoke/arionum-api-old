<?php

namespace App\Http\Transformers;

use App\Mempool;
use League\Fractal\TransformerAbstract;

final class MempoolTransformer extends TransformerAbstract
{
    public static function transform(Mempool $mempool): array
    {
        return [
            'id' => $mempool->id,
            'height' => $mempool->height,
            'source_address' => $mempool->src,
            'destination_address' => $mempool->dst,
            'value' => $mempool->val,
            'fee' => $mempool->fee,
            'signature' => $mempool->signature,
            'version' => $mempool->version,
            'message' => $mempool->message,
            'public_key' => $mempool->public_key,
            'date' => $mempool->date,
            'peer' => $mempool->peer,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('v1.mempools', ['id' => $mempool->id]),
                ],
            ],
        ];
    }
}
