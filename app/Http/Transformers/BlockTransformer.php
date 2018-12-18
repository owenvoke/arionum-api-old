<?php

namespace App\Http\Transformers;

use App\Block;
use League\Fractal\TransformerAbstract;

/**
 * Class BlockTransformer
 */
class BlockTransformer extends TransformerAbstract
{
    /**
     * @param Block $block
     * @return array
     */
    public function transform(Block $block): array
    {
        return [
            'id' => $block->id,
            'generator' => $block->generator,
            'height' => $block->height,
            'date' => $block->date,
            'nonce' => $block->nonce,
            'signature' => $block->signature,
            'difficulty' => $block->difficulty,
            'argon' => $block->argon,
            'transactions' => $block->transactions,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('blocks', ['id' => $block->id]),
                ],
            ],
        ];
    }
}
