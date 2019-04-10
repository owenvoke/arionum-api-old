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
        return Type::listOf(GraphQL::type('account'));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'public_key' => ['name' => 'public_key', 'type' => Type::string()],
            'block' => ['name' => 'block', 'type' => Type::string()],
            'balance' => ['name' => 'balance', 'type' => Type::float()],
            'alias' => ['name' => 'alias', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Account::where('id', $args['id'])->get();
        }

        return Account::all();
    }
}
