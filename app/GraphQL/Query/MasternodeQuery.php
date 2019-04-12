<?php

namespace App\GraphQL\Query;

use App\Masternode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

final class MasternodeQuery extends Query
{
    protected $attributes = [
        'name' => 'Masternode query',
    ];

    public function type()
    {
        return GraphQL::type('Masternode');
    }

    public function args(): array
    {
        return [
            'public_key' => ['name' => 'public_key', 'type' => Type::nonNull(Type::string())],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['public_key'])) {
            return Masternode::query()->find($args['public_key']);
        }

        return null;
    }
}
