<?php

namespace App\Services;

use App\Actions\FindAffiliatesByRadiusAction;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class AffiliateService
{
    /**
     * @var float[]
     */
    public $dublinOffice = [53.3340285, -6.2535495];
    /**
     * @var string
     */
    public $fileNamePath = 'affiliate_list\affiliates.txt';

    /**
     * @return Collection
     */
    public function getAffiliateListFromFile(): Collection {
        if(!Storage::disk('public')->exists($this->fileNamePath)) {
            return new Collection();
        }

        $filePath                           = Storage::disk('public')->path('affiliate_list\affiliates.txt');
        $affiliateArrayList                 = file($filePath, FILE_IGNORE_NEW_LINES);

        if(is_array($affiliateArrayList)) {
            foreach($affiliateArrayList as $key => $jsonAffiliateData) {
                $decodedJson = json_decode($jsonAffiliateData);
                if(is_object($decodedJson)) {
                    $affiliateArrayList[$key] = $decodedJson;
                }
            }

            $affiliateCollection           = collect($affiliateArrayList);
            //Can pass distance range required if needed. Default 100.
            $affiliateCollection           = FindAffiliatesByRadiusAction::execute($this->dublinOffice, $affiliateCollection);

            return $affiliateCollection->sortBy('affiliate_id');
        }
    }
}
