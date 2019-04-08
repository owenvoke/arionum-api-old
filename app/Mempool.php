<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Mempool
 *
 * @property-read string $id
 * @property-read int    $height
 * @property-read string $src
 * @property-read string $dst
 * @property-read float  $val
 * @property-read float  $fee
 * @property-read string $signature
 * @property-read int    $version
 * @property-read string $message
 * @property-read string $public_key
 * @property-read Carbon $date
 * @property-read string $peer
 */
final class Mempool extends Model
{
    /** @var bool */
    public $incrementing = false;

    /** @var string */
    protected $table = 'mempool';

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
