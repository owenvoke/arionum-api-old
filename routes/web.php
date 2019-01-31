<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// API Routes
$router->group(['namespace' => 'v1', 'prefix' => 1], function (Router $router) {
    $router->get('accounts[/{id}]', ['as' => 'accounts', 'uses' => 'AccountsController@list']);
    $router->get('blocks[/{id}]', ['as' => 'blocks', 'uses' => 'BlocksController@list']);
    $router->get('masternodes[/{id}]', ['as' => 'masternodes', 'uses' => 'MasternodesController@list']);
    $router->get('mempools[/{id}]', ['as' => 'mempools', 'uses' => 'MempoolsController@list']);
    $router->get('transactions[/{id}]', ['as' => 'transactions', 'uses' => 'TransactionsController@list']);
});

// General
$router->get('', function () {
    return response()->json([
        'accounts_url' => route('accounts'),
        'blocks_url' => route('blocks'),
        'masternodes_url' => route('masternodes'),
        'mempools_url' => route('mempools'),
        'transactions_url' => route('transactions'),
    ]);
});
