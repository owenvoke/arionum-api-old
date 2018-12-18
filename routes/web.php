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

// Account Routes
$router->get('accounts', 'AccountsController@index');
$router->get('accounts/{id}', 'AccountsController@show');

// Block Routes
$router->get('blocks', 'BlocksController@index');
$router->get('blocks/{id}', 'BlocksController@show');

// Masternode Routes
$router->get('masternodes', 'MasternodesController@index');
$router->get('masternodes/{id}', 'MasternodesController@show');

// Mempool Routes
$router->get('mempools', 'MempoolsController@index');
$router->get('mempools/{id}', 'MempoolsController@show');

// Transaction Routes
$router->get('transactions', 'TransactionsController@index');
$router->get('transactions/{id}', 'TransactionsController@show');
