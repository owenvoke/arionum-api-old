<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 *
 * @property-read string $id
 * @property-read string $public_key
 * @property-read string $block
 * @property-read float  $balance
 * @property-read string $alias
 */
class Account extends Model
{
    /** @var bool */
    public $incrementing = false;

    /** @var array */
    protected $casts = [
        'balance' => 'float',
    ];
}
