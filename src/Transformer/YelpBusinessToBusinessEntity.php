<?php

namespace Bizmate\PhpunitTest\Transformer;

use Bizmate\PhpunitTest\Entity\Business;
use DateTimeImmutable;
use Bizmate\PhpunitTest\Entity\BusinessId;
use stdClass;

/**
 *
 */
class YelpBusinessToBusinessEntity
{
    /**
     * Takes A Yelp SBusiness response from the Yelp Client and returns a Business Entity,
     * adding the Reviews in the process
     *
     * @param stdClass $businessResponse
     * @return Business
     */
    public function transform(stdClass $businessResponse): Business
    {
        $businessId = new BusinessId($businessResponse->id);
        $createDateTimeImm = new DateTimeImmutable();
        $updateDateTimeImm = new DateTimeImmutable();
        
        return new Business(
            $businessId,
            $businessResponse->alias,
            $businessResponse->name,
            $businessResponse->image_url ?? '',
            $businessResponse->is_claimed,
            $businessResponse->is_closed,
            $businessResponse->url ?? '',
            $businessResponse->phone ?? '',
            $businessResponse->display_phone ?? '',
            $businessResponse->review_count ?? 0,
            $businessResponse->categories ?? [],
            $businessResponse->rating ?? 0,
            $createDateTimeImm,
            $updateDateTimeImm
        );
    }
}
