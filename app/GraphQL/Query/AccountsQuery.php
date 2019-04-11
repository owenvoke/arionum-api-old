<?php

namespace App\GraphQL\Query;

use App\Account;
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

    public function resolve($root, $args): LengthAwarePaginator
    {
        return Account::query()->paginate($args['limit'], ['*'], 'page', $args['page']);
    }
}
