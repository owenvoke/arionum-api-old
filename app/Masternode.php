<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Masternode
 *
 * @property-read string $public_key
 * @property-read int    $height
 * @property-read string $ip
 * @property-read int    $last_won
 * @property-read int    $blacklist
 * @property-read int    $fails
 * @property-read int    $status
 */
class Masternode extends Model
{
    /** @var bool */
    public $incrementing = false;

    /** @var string */
    protected $primaryKey = 'public_key';

    /** @var string */
    protected $table = 'masternode';

    /** @var array */
    protected $casts = [
        'height' => 'int',
        'last_won' => 'int',
        'blacklist' => 'int',
        'fails' => 'int',
        'status' => 'int',
    ];
}
