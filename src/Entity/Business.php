<?php

/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 27/10/21
 * Time: 16:48
 */

namespace Bizmate\PhpunitTest\Entity;

/**
 * Class Business
 * @package Bizmate\PhpunitTest\Entity
 *
 * This structure is based on the Yelp response to business resource detail. See the fixtures with _place suffix.
 */

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;

/**
 *
 */
class Business
{
    /**
     * @var BusinessId
     */
    private BusinessId $id;
    /**
     * @var string
     */
    private string $alias;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $imageUrl;
    /**
     * @var boolean
     */
    private bool $isClaimed;
    /**
     * @var boolean
     */
    private bool $isClosed;
    
    /**
     * @var string
     */
    private string $url;
    /**
     * @var string
     */
    private string $phone;
    /**
     * @var string
     */
    private string $displayPhone;
    /**
     * @var int
     */
    private int $reviewCount;
    /**
     * @var array
     */
    private array $categories;
    /**
     * @var float
     */
    private float $rating;
    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $createDate;
    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $updateDate;
    
    /**
     * @param BusinessId $id
     * @param string $alias
     * @param string $name
     * @param string $imageUrl
     * @param bool $isClaimed
     * @param bool $isClosed
     * @param string $url
     * @param string $phone
     * @param string $displayPhone
     * @param int $reviewCount
     * @param array $categories
     * @param float $rating
     * @param DateTimeImmutable $createDate
     * @param DateTimeImmutable $updateDate
     */
    public function __construct(
        BusinessId $id,
        string $alias,
        string $name,
        string $imageUrl,
        bool $isClaimed,
        bool $isClosed,
        string $url,
        string $phone,
        string $displayPhone,
        int $reviewCount,
        array $categories,
        float $rating,
        DateTimeImmutable $createDate,
        DateTimeImmutable $updateDate
    ) {
        $this->id = $id;
        $this->alias = $alias;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->isClaimed = $isClaimed;
        $this->isClosed = $isClosed;
        $this->url = $url;
        $this->phone = $phone;
        $this->displayPhone = $displayPhone;
        $this->reviewCount = $reviewCount;
        $this->categories = $categories;
        $this->rating = $rating;
        $this->createDate = $createDate;
        $this->updateDate = $updateDate;
    }
    
    /**
     * @return BusinessId
     */
    public function getId(): BusinessId
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
    
    /**
     * @return bool
     */
    public function isClaimed(): bool
    {
        return $this->isClaimed;
    }
    
    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    /**
     * @return string
     */
    public function getDisplayPhone(): string
    {
        return $this->displayPhone;
    }
    
    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
    
    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }
    
    /**
     * @return DateTimeImmutable
     */
    public function getCreateDate(): DateTimeImmutable
    {
        return $this->createDate;
    }
    
    /**
     * @return DateTimeImmutable
     */
    public function getUpdateDate(): DateTimeImmutable
    {
        return $this->updateDate;
    }
    
    /**
     * @return float
     */
    public function getReviewAverage(): float
    {
        return $this->reviewAverage;
    }
}
