<?php

namespace App\GraphQL\Type;

use App\Account;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

final class AccountType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Account',
        'description' => 'An account',
        'model' => Account::class,
    ];

    public function fields(): array
    {
        return [

            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the account',
            ],

            'public_key' => [
                'type' => Type::string(),
                'description' => 'The public key of the account',
            ],

            'block' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The block id that the account was created on',
            ],

            'balance' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'The current balance of the account',
            ],

            'alias' => [
                'type' => Type::string(),
                'description' => 'The alias of the account',
            ],

        ];
    }
}
