<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/')->assertOk();

        $response->assertViewHas(['affiliateList']);
    }

    /**
     * @return void
     */
    public function test_the_page_not_found_response(): void
    {
        $response = $this->get('/other')->assertNotFound();
    }
}
