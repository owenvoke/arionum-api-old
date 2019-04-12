<?php

namespace App\GraphQL\Type;

use App\Masternode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

final class MasternodeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Masternode',
        'description' => 'A masternode',
        'model' => Masternode::class,
    ];

    public function fields(): array
    {
        return [

            'publicKey' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The public key of the masternode',
                'alias' => 'public_key',
                'resolve' => function ($root) {
                    return $root->public_key;
                },
            ],

            'height' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The block height that the masternode was created on',
            ],

            'ip' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The IP address registered with the masternode',
            ],

            'lastWon' => [
                'type' => Type::int(),
                'description' => 'The height of the last block that the masternode won',
                'alias' => 'last_won',
                'resolve' => function ($root) {
                    return $root->last_won;
                },
            ],

            'blacklist' => [
                'type' => Type::int(),
                'description' => 'The timestamp that the masternode was last blacklisted',
            ],

            'fails' => [
                'type' => Type::int(),
                'description' => 'The number of failed requests for the masternode',
            ],

            'status' => [
                'type' => Type::int(),
                'description' => 'The current status of the masternode',
            ],

        ];
    }
}
