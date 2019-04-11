<?php

namespace App\GraphQL\Query;

use App\Account;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

final class AccountsQuery extends Query
{
    protected $attributes = [
        'name' => 'Accounts query',
    ];

    public function type()
    {
        return GraphQL::paginate('accounts');
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
            'alias' => ['name' => 'alias', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Account::query()->find($args['id']);
        }

        if (isset($args['alias'])) {
            return Account::findByAlias($args['alias']);
        }

        return Account::query()->paginate($args['limit'], ['*'], 'page', $args['page']);
    }
}
