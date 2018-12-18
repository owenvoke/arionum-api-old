<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Class IndexTest
 */
class IndexTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function indexWithNoJsonAccepted(): void
    {
        $this->get('/');

        $this->assertJson($this->response->getContent());
        $this->seeJson([['error' => 'You must accept JSON']], $this->response->getContent());
    }
}
