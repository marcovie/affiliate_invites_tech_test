<?php

namespace App\Actions;

use Illuminate\Support\Collection;

/**
 *
 */
class FindAffiliatesByRadiusAction
{
    /**
     *
     */
    const EARTH_RADIUS = 6371.009;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * Filter a collection of Affiliates by distance from Lat/Lon provided.
     * @param array $filterByLatLon
     * @param Collection $affiliateCollectionData
     * @param $distance in KM
     * @return Collection
     */
    public static function execute(Array $filterByLatLon, Collection $affiliateCollectionData, $distanceArea = 100): Collection {
        if(empty($filterByLatLon))
            return new Collection();

        foreach($affiliateCollectionData as $key => $affiliate) {
            if(isset($filterByLatLon[0], $filterByLatLon[1], $affiliate->latitude, $affiliate->longitude)) {
                $subtractLatitudes                       = (float)(($filterByLatLon[0] - (float)$affiliate->latitude) / 2);
                $subtractLongitudes                      = (float)(($filterByLatLon[1] - (float)$affiliate->longitude) / 2);

                $result                                  = asin(min(1, sqrt(sin(deg2rad($subtractLatitudes)) * sin(deg2rad($subtractLatitudes)) + cos(deg2rad($filterByLatLon[0])) * cos(deg2rad((float)$affiliate->latitude)) * sin(deg2rad($subtractLongitudes)) * sin(deg2rad($subtractLongitudes)))));
                $distance                                = 2 * FindAffiliatesByRadiusAction::EARTH_RADIUS * $result;

                $affiliateCollectionData[$key]->distance = round($distance, 2);

                if ($affiliateCollectionData[$key]->distance >= round($distanceArea)) {
                    unset($affiliateCollectionData[$key]);
                }
            }
            else {
                unset($affiliateCollectionData[$key]);
            }
        }


        return $affiliateCollectionData;
    }
}
