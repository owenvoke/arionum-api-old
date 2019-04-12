<?php

namespace App\GraphQL\Type;

use App\Block;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

final class BlockType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Block',
        'description' => 'A block',
        'model' => Block::class,
    ];

    public function fields(): array
    {
        return [

            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the block',
            ],

            'generator' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The account id that generated the block',
            ],

            'height' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The height of the block',
            ],

            'date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The date that the block was created on',
            ],

            'nonce' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The nonce registered with the block',
            ],

            'signature' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The signature registered with the block',
            ],

            'difficulty' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The difficulty registered with the block',
            ],

            'argon' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The argon generation data registered with the block',
            ],

            'transactions' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The number of transactions registered with the block',
            ],

        ];
    }
}
