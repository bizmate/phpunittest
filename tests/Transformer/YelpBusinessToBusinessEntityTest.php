<?php

namespace PhpunitTest\Tests\Transformer;

use Bizmate\PhpunitTest\Entity\Business;
use Bizmate\PhpunitTest\Transformer\YelpBusinessToBusinessEntity;
use PHPUnit\Framework\TestCase;
use Bizmate\PhpunitTest\Tests\DataProvider\YelpStubResponses;

/**
 * Class YelpBusinessToBusinessEntityTest
 * @package Bizmate\PhpunitTest\Tests\Transformer
 * @coversDefaultClass \Bizmate\PhpunitTest\Transformer\YelpBusinessToBusinessEntity
 * @group unit
 * @group yelp
 */
class YelpBusinessToBusinessEntityTest extends TestCase
{
    /**
     * @var YelpBusinessToBusinessEntity
     */
    private YelpBusinessToBusinessEntity $yelpBusinessToBusinessEntity;

    /**
     * @var YelpStubResponses
     */
    private $yelpStubResponses;

    /**
     *
     */
    public function setUp(): void
    {
        
        $this->yelpBusinessToBusinessEntity = new YelpBusinessToBusinessEntity();
        $this->yelpStubResponses = new YelpStubResponses();
    }

    /**
     * @covers ::transform
     */
    public function testReviewsTransform()
    {
        $yelpBusinessReviews = $this->yelpStubResponses->getPlace("megasun-nice-4");

        $business = $this->yelpBusinessToBusinessEntity->transform($yelpBusinessReviews);
        $this->assertInstanceOf(Business::class, $business);
    }
}
