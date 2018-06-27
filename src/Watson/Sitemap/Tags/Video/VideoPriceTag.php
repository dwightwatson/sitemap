<?php namespace Watson\Sitemap\Tags\Video;

/**
 * Class VideoPriceTag
 * @see https://developers.google.com/webmasters/videosearch/sitemaps
 */
class VideoPriceTag
{

    /**
     * @var float price amount
     */
    protected $price;

    /**
     * @var string the currency in ISO 4217 format
     * REQUIRED
     */
    protected $currency;

    /**
     * @var string Allowed values are rent and own.
     */
    protected $type;

    /**
     * @var string Allowed values are HD and SD
     */
    protected $resolution;

    public function __construct($price, $currency)
    {
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * @param string $resolution
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }


}
