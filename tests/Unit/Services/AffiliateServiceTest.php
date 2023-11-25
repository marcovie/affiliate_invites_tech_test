<?php

namespace Services;

use App\Services\AffiliateService;
use Tests\TestCase;

class AffiliateServiceTest extends TestCase
{
    /**
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $affiliateService = new AffiliateService();

        $response = $affiliateService->getAffiliateListFromFile();
        $this->assertTrue($this->count($response) > 0);
    }
}
