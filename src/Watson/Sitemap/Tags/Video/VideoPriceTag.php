<?php namespace Watson\Sitemap\Tags\Video;

class VideoPriceTag
{
    /**
     * The tag price.
     *
     * @var float
     */
    protected $price;

    /**
     * The tag currency (ISO 4217 format).
     *
     * @var string
     */
    protected $currency;

    /**
     * The tag price type.
     *
     * @var string
     */
    protected $type;

    /**
     * The tag resolution.
     *
     * @var string
     */
    protected $resolution;

    /**
     * Create a new video price tag.
     *
     * @param  float  $price
     * @param  string  $currency
     * @return void
     */
    public function __construct($price, $currency)
    {
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * Get the tag type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the tag type.
     *
     * @param  string  $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the tag resolution.
     *
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set the tag resolution.
     *
     * @param  string  $resolution
     * @return void
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
    }

    /**
     * Get the tag price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the tag price.
     *
     * @param  float  $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the tag currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the tag currency.
     *
     * @param  string  $currency
     * @return void
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}
