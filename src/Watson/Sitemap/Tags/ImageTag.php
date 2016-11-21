<?php namespace Watson\Sitemap\Tags;

class ImageTag extends BaseTag
{
    /**
     * The caption of the image.
     *
     * @var string
     */
    protected $caption;

    /**
     * The geographic location of the image.
     *
     * @var string
     */
    protected $geoLocation;

    /**
     * The title of the image.
     *
     * @var string
     */
    protected $title;

    /**
     * A URL to the license of the image.
     *
     * @var string
     */
    protected $license;

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'          => 'location',
        'caption'      => 'caption',
        'geo_location' => 'geoLocation',
        'title'        => 'title',
        'license'      => 'license',
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  string  $caption
     * @param  string  $geo_location
     * @param  string  $title
     * @param  string  $license
     * @return void
     */
    public function __construct($location, $caption = null, $geoLocation = null, $title = null, $license = null)
    {
        parent::__construct($location);

        $this->caption = $caption;
        $this->geoLocation = $geoLocation;
        $this->title = $title;
        $this->license = $license;
    }

    /**
     * Get the caption.
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set the caption.
     *
     * @param  string  $caption
     * @return void
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * Get the geoLocation.
     *
     * @return string
     */
    public function getGeoLocation()
    {
        return $this->geoLocation;
    }

    /**
     * Set the priority.
     *
     * @param  string  $geoLocation
     * @return void
     */
    public function setGeoLocation($geoLocation)
    {
        $this->geoLocation = $geoLocation;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title.
     *
     * @param  string  $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the license.
     *
     * @return string
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Set the license.
     *
     * @param  string  $license
     * @return void
     */
    public function setLicense($license)
    {
        $this->license = $license;
    }
}
