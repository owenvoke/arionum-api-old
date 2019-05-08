<?php

use Rebing\GraphQL\GraphQL;
use App\GraphQL\Type\BlockType;
use App\GraphQL\Query\BlockQuery;
use App\GraphQL\Type\AccountType;
use App\GraphQL\Type\MempoolType;
use App\GraphQL\Query\BlocksQuery;
use App\GraphQL\Query\AccountQuery;
use App\GraphQL\Query\MempoolQuery;
use App\GraphQL\Query\AccountsQuery;
use App\GraphQL\Query\MempoolsQuery;
use App\GraphQL\Type\MasternodeType;
use App\GraphQL\Query\MasternodeQuery;
use App\GraphQL\Query\MasternodesQuery;
use Rebing\GraphQL\Support\PaginationType;
use App\GraphQL\Controllers\LumenGraphQLController;
use App\Http\Middleware\PreconditionHeaderMiddleware;

return [

    // The prefix for routes
    'prefix' => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route

    'routes' => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method

    'controllers' => LumenGraphQLController::class.'@query',

    // Any middleware for the graphql route group

    'middleware' => [
        PreconditionHeaderMiddleware::class,
    ],

    // Additional route group attributes

    'route_group_attributes' => [],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.

    'default_schema' => 'default',

    // The schemas for query and/or mutation. It expects an array of schemas to provide
    // both the 'query' fields and the 'mutation' fields. You can also provide a middleware
    // that will only apply to the given schema

    'schemas' => [
        'default' => [
            'query' => [
                'account' => AccountQuery::class,
                'accounts' => AccountsQuery::class,
                'block' => BlockQuery::class,
                'blocks' => BlocksQuery::class,
                'masternode' => MasternodeQuery::class,
                'masternodes' => MasternodesQuery::class,
                'mempool' => MempoolQuery::class,
                'mempools' => MempoolsQuery::class,
            ],
            'mutation' => [],
            'middleware' => [],
            'method' => ['post'],
        ],
    ],

    // The types available in the application. You can then access it from the facade like this:
    // GraphQL::type('user')

    'types' => [
        'Account' => AccountType::class,
        'Block' => BlockType::class,
        'Masternode' => MasternodeType::class,
        'Mempool' => MempoolType::class,
    ],

    // This callable will be passed the Error object for each errors GraphQL catch.
    // The method should return an array representing the error.

    'error_formatter' => [GraphQL::class, 'formatError'],

    /*
     * Custom Error Handling
     *
     * Expected handler signature is: function (array $errors, callable $formatter): array
     *
     * The default handler will pass exceptions to laravel Error Handling mechanism
     */

    'errors_handler' => [GraphQL::class, 'handleErrors'],

    // You can set the key, which will be used to retrieve the dynamic variables

    'params_key' => 'variables',

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false,
    ],

    /*
     * You can define your own pagination type.
     * Reference \Rebing\GraphQL\Support\PaginationType::class
     */

    'pagination_type' => PaginationType::class,

    /* Config for GraphiQL (see (https://github.com/graphql/graphiql). */

    'graphiql' => [
        'display' => false,
    ],

];
