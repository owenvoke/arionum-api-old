<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Transaction
 *
 * @property-read string $id
 * @property-read string $block
 * @property-read int    $height
 * @property-read string $dst
 * @property-read float  $val
 * @property-read float  $fee
 * @property-read string $signature
 * @property-read int    $version
 * @property-read string $message
 * @property-read Carbon $date
 * @property-read string $public_key
 */
class Transaction extends Model
{
    /** @var bool */
    public $incrementing = false;

    /** @var array */
    protected $dates = ['date'];

    /** @var array */
    protected $casts = [
        'height' => 'int',
        'val' => 'float',
        'fee' => 'float',
        'version' => 'int',
    ];
}
