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
            'publicKey' => ['name' => 'publicKey', 'type' => Type::string()],
            'ip' => ['name' => 'ip', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['publicKey'])) {
            return Masternode::query()->find($args['publicKey']);
        }

        if (isset($args['ip'])) {
            return Masternode::query()->where('ip', $args['ip'])->first();
        }

        return null;
    }
}
