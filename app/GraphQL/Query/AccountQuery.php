<?php

namespace App\GraphQL\Query;

use App\Account;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

final class AccountQuery extends Query
{
    protected $attributes = [
        'name' => 'Accounts query',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('account'));
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
            return Account::where('id', $args['id'])->get();
        }

        if (isset($args['alias'])) {
            return Account::where('alias', $args['alias'])->get();
        }

        return Account::query()->paginate();
    }
}
