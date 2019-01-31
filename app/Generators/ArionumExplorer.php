<?php

namespace App\Generators;

class ArionumExplorer
{
    public const BASE_URI = 'https://arionum.info';

    public static function accountUri(string $id): string
    {
        return sprintf('%s/account/%s', self::BASE_URI, $id);
    }

    public static function blockUri(string $id): string
    {
        return sprintf('%s/block/%s', self::BASE_URI, $id);
    }

    public static function transactionUri(string $id): string
    {
        return sprintf('%s/transaction/%s', self::BASE_URI, $id);
    }
}
