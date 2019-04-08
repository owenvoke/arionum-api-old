<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read string                 $id
 * @property-read string                 $public_key
 * @property-read string                 $block
 * @property-read float                  $balance
 * @property-read string                 $alias
 *
 * @property-read Collection|Transaction $transactionsFrom
 * @property-read Collection|Transaction $transactionsTo
 */
final class Account extends Model
{
    /** @var bool */
    public $incrementing = false;

    /** @var array */
    protected $casts = [
        'balance' => 'float',
    ];

    public function transactionsFrom(): HasMany
    {
        return $this->hasMany(Transaction::class, 'public_key', 'public_key');
    }

    public function transactionsTo(): HasMany
    {
        return $this->hasMany(Transaction::class, 'dst');
    }

    public static function findByAlias(string $alias): self
    {
        return self::query()->where('alias', $alias)->firstOrFail();
    }
}
