<?php

namespace App\GraphQL\Query;

use App\Account;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

final class AccountQuery extends Query
{
    protected $attributes = [
        'name' => 'Account query',
    ];

    public function type()
    {
        return GraphQL::type('Account');
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
            'alias' => ['name' => 'alias', 'type' => Type::string()],
            'publicKey' => ['name' => 'publicKey', 'type' => Type::string()],
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

        if (isset($args['publicKey'])) {
            return Account::query()->where('public_key', $args['publicKey'])->first();
        }

        return null;
    }
}
