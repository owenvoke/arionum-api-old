<?php

namespace App\Http\Transformers;

use App\Generators\ArionumExplorer;
use League\Fractal\TransformerAbstract;

class AliasTransformer extends TransformerAbstract
{
    public static function transform(object $data): array
    {
        return [
            'alias' => $data->alias,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => route('v1.alias', ['id' => $data->alias]),
                ],
                [
                    'rel' => 'explorer',
                    'uri' => ArionumExplorer::accountUri($data->alias),
                ],
            ],
        ];
    }
}
