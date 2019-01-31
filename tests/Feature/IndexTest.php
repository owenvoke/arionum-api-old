<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function itCanRetrieveTheIndexWithJsonHeaders(): void
    {
        $this->json('GET', '/')->seeJsonStructure([
            'routes' => [],
        ]);
    }
}
