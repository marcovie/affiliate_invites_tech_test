<?php


namespace Actions;

use App\Services\AffiliateService;
use App\Actions\FindAffiliatesByRadiusAction;
use Tests\TestCase;

class FindAffiliateByRadiusActionTest extends TestCase
{
    public $affiliateService;

    public function test_something_happens()
    {
        $this->affiliateService = new AffiliateService();

        $dataArray = json_decode('[{"latitude": "52.986375", "affiliate_id": 12, "name": "Yosef Giles", "longitude": "-6.043701"}]');

        $dataCollection = Collect($dataArray);

        $response = FindAffiliatesByRadiusAction::execute($this->affiliateService->dublinOffice, $dataCollection, FindAffiliatesByRadiusAction::EARTH_RADIUS);

        $this->assertTrue($this->count($response) > 0);

        $response = FindAffiliatesByRadiusAction::execute($this->affiliateService->dublinOffice, $dataCollection, 1);

        $this->assertFalse($this->count($response) < 1);
    }
}
