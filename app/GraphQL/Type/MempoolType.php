<?php

namespace App\GraphQL\Type;

use App\Mempool;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

final class MempoolType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Mempool',
        'description' => 'A mempool transaction',
        'model' => Mempool::class,
    ];

    public function fields(): array
    {
        return [

            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the mempool transaction',
            ],

            'height' => [
                'type' => Type::int(),
                'description' => 'The height of the mempool transaction',
            ],

            'src' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The source address of the mempool transaction',
            ],

            'dst' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The destination address of the mempool transaction',
            ],

            'val' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'The value of the mempool transaction',
            ],

            'fee' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'The fee total for the mempool transaction',
            ],

            'signature' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The signature of the mempool transaction',
            ],

            'version' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The version type for the mempool transaction',
            ],

            'message' => [
                'type' => Type::string(),
                'description' => 'The message for the mempool transaction',
            ],

            'publicKey' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The public key for the source of the mempool transaction',
                'alias' => 'public_key',
                'resolve' => function ($root) {
                    return $root->public_key;
                },
            ],

            'peer' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The peer address that the mempool transaction originated at',
            ],

        ];
    }
}
