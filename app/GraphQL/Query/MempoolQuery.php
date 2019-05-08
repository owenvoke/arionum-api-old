<?php

namespace App\GraphQL\Query;

use App\Mempool;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

final class MempoolQuery extends Query
{
    protected $attributes = [
        'name' => 'Mempool query',
    ];

    public function type()
    {
        return GraphQL::type('Mempool');
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Mempool::query()->find($args['id']);
        }
    }
}
