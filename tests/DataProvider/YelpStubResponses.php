<?php

/**
 *
 */

namespace Bizmate\PhpunitTest\Tests\DataProvider;

use Faker\Factory;

/**
 * @package PhpunitTest\Tests
 */
class YelpStubResponses
{
    use JsonObjectFixtureLoader;

    const BASE_FIXTURES_PATH = '/tests/fixtures/';
    const PLACE_SUFFIX= '_place.json';

    /**
     * EtsyStubResponses constructor.
     */
    public function __construct()
    {
    }
    
    /**
     * @param string $yelpPlaceId
     * @return mixed|void
     */
    public function getPlace(string $yelpPlaceId)
    {
        try {
            $reviewsJson = self::loadJsonString($yelpPlaceId . self::PLACE_SUFFIX);
            return json_decode($reviewsJson);
        } catch (\Exception $e) {
            error_log('Exception ' . $e->getMessage());
        }
    }
}
