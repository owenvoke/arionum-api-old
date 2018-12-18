<?php

namespace App\Http\Transformers;

use App\Masternode;
use League\Fractal\TransformerAbstract;

/**
 * Class MasternodeTransformer
 */
class MasternodeTransformer extends TransformerAbstract
{
    /**
     * @param Masternode $masternode
     * @return array
     */
    public function transform(Masternode $masternode): array
    {
        return [
            'id' => $masternode->public_key,
            'height' => $masternode->height,
            'ip' => $masternode->ip,
            'last_won' => $masternode->last_won,
            'blacklist' => $masternode->blacklist,
            'fails' => $masternode->fails,
            'status' => $masternode->status,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('masternodes', ['id' => $masternode->public_key]),
                ],
            ],
        ];
    }
}
