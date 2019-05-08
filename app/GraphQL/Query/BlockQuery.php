<?php

namespace App\GraphQL\Query;

use App\Block;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

final class BlockQuery extends Query
{
    protected $attributes = [
        'name' => 'Block query',
    ];

    public function type()
    {
        return GraphQL::type('Block');
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
            return Block::query()->find($args['id']);
        }
    }
}
