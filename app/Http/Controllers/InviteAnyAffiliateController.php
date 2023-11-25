<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Services\AffiliateService;
use Illuminate\View\View;

class InviteAnyAffiliateController extends Controller
{
    /**
     * @var AffiliateService
     */
    private $affiliateService;

    /**
     * @param AffiliateService $affiliateService
     */
    public function __construct(AffiliateService $affiliateService)
    {
        $this->affiliateService = $affiliateService;
    }

    /**
     * @return View
     */
    public function index(): View  {
        //Try and catch is global under app\Exceptions\Handler.php
        $affiliateList = $this->affiliateService->getAffiliateListFromFile();

        return view('welcome', compact('affiliateList'));
    }
}
