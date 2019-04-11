<?php

namespace App\GraphQL\Query;

use App\Account;
use GraphQL\Type\Definition\Type;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

final class AccountsQuery extends Query
{
    protected $attributes = [
        'name' => 'Accounts query',
    ];

    public function type()
    {
        return GraphQL::paginate('Account');
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
        return Account::query()->paginate($args['limit'], ['*'], 'page', $args['page']);
    }
}
