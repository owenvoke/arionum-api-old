<?php

namespace App\GraphQL\Query;

use App\Block;
use GraphQL\Type\Definition\Type;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

final class BlocksQuery extends Query
{
    private const DEFAULT_LIMIT = 15;
    private const DEFAULT_PAGE = 1;

    protected $attributes = [
        'name' => 'Blocks query',
    ];

    public function type()
    {
        return GraphQL::paginate('Block');
    }

    public function args(): array
    {
        return [
            'page' => ['name' => 'page', 'type' => Type::int()],
            'limit' => ['name' => 'limit', 'type' => Type::int()],
        ];
    }

    public function resolve($root, $args): LengthAwarePaginator
    {
        return Block::query()->paginate(
            $args['limit'] ?? self::DEFAULT_LIMIT,
            ['*'],
            'page',
            $args['page'] ?? self::DEFAULT_PAGE
        );
    }
}
