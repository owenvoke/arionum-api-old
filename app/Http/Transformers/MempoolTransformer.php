<?php

namespace App\Http\Transformers;

use App\Mempool;
use League\Fractal\TransformerAbstract;

/**
 * Class MempoolTransformer
 */
class MempoolTransformer extends TransformerAbstract
{
    /**
     * @param Mempool $mempool
     * @return array
     */
    public function transform(Mempool $mempool): array
    {
        return [
            'id' => $mempool->id,
            'height' => $mempool->height,
            'source' => $mempool->src,
            'destination' => $mempool->dst,
            'value' => $mempool->val,
            'fee' => $mempool->fee,
            'signature' => $mempool->signature,
            'version' => $mempool->version,
            'message' => $mempool->message,
            'public_key' => $mempool->public_key,
            'date' => $mempool->date,
            'peer' => $mempool->peer,
        ];
    }
}
