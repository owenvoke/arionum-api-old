<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Class IndexTest
 */
class IndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        $this->get('/');

        $this->assertJson($this->response->getContent());
        $this->seeJson([['error' => 'You must accept JSON']], $this->response->getContent());
    }
}
