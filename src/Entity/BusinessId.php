<?php

/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 25/01/22
 * Time: 14:53
 */

namespace Bizmate\PhpunitTest\Entity;

use MyReviews\BusinessReviews\Domain\Reviews\Models\SiteId;
use ValueObjects\StringLiteral\StringLiteral;

/**
 * Class BusinessId
 * @package Bizmate\PhpunitTest\Entity
 */
class BusinessId
{
    /**
     * @var int
     */
    private $id;

    /**
     * BusinessId constructor.
     * @param $id
     */
    public function __construct(string $id)
    {
        $this->$id = $id;
    }

    /**
     * @return StringLiteral
     */
    public function getId(): StringLiteral
    {
        return new StringLiteral((string) $this->id);
    }
}
