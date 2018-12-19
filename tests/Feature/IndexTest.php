<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Class IndexTest
 */
class IndexTest extends TestCase
{
    /** @var string */
    private const JSON_MIME_TYPE = 'application/json';

    /**
     * @test
     * @return void
     */
    public function indexWithOnlyContentTypeAccepted(): void
    {
        $this->get('/', [
            'Content-Type' => self::JSON_MIME_TYPE,
        ])->seeJsonEquals(['message' => 'You must accept JSON', 'status' => 406]);
    }

    /**
     * @test
     * @return void
     */
    public function indexWithOnlyJsonAccepted(): void
    {
        $this->get('/', [
            'Accept' => self::JSON_MIME_TYPE,
        ])->seeJsonEquals(['message' => 'Unsupported Media Type', 'status' => 415]);
    }

    /**
     * @test
     * @return void
     */
    public function indexWithJsonHeaders(): void
    {
        $this->json('GET', '/')->seeJsonEquals([
            'accounts_url' => route('accounts'),
            'blocks_url' => route('blocks'),
            'masternodes_url' => route('masternodes'),
            'mempools_url' => route('mempools'),
            'transactions_url' => route('transactions'),
        ]);
    }
}
