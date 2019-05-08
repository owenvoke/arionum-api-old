<?php

namespace App\GraphQL\Query;

use App\Mempool;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class MempoolsQuery extends Query
{
    private const DEFAULT_LIMIT = 15;
    private const DEFAULT_PAGE = 1;

    protected $attributes = [
        'name' => 'Mempools query',
    ];

    public function type()
    {
        return GraphQL::paginate('Mempool');
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
        return Mempool::query()->paginate(
            $args['limit'] ?? self::DEFAULT_LIMIT,
            ['*'],
            'page',
            $args['page'] ?? self::DEFAULT_PAGE
        );
    }
}
