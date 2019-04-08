<?php

namespace Tests\Feature;

use Tests\TestCase;

final class IndexTest extends TestCase
{
    /** @test */
    public function itCanRetrieveTheIndexWithJsonHeaders(): void
    {
        $this->json('GET', '/')->seeJsonStructure([
            'status',
            'message',
        ]);
    }
}
