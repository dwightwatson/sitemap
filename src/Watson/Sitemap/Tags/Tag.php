<?php namespace Watson\Sitemap\Tags;

use Watson\Sitemap\Tags\ImageTag;

class Tag extends BaseTag
{
    /**
     * The change frequency.
     *
     * @var string
     */
    protected $changeFrequency;

    /**
     * The priority.
     *
     * @var string
     */
    protected $priority;

    /**
     * Image Tags belonging to this Tags
     *
     * @var array
     */
    protected $images = [];

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'        => 'location',
        'lastmod'    => 'lastModified',
        'changefreq' => 'changeFrequency',
        'priority'   => 'priority'
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  string  $lastModified
     * @param  string  $changeFrequency
     * @param  string  $priority
     * @return void
     */
    public function __construct($location, $lastModified = null, $changeFrequency = null, $priority = null)
    {
        parent::__construct($location, $lastModified);

        $this->changeFrequency = $changeFrequency;
        $this->priority = $priority;
    }

    /**
     * Get the change frequency.
     *
     * @return string
     */
    public function getChangeFrequency()
    {
        return $this->changeFrequency;
    }

    /**
     * Set the change frequency.
     *
     * @param  \Watson\Sitemap\Tags\ChangeFrequency|string  $changeFrequency
     * @return void
     */
    public function setChangeFrequency($changeFrequency)
    {
        $this->changeFrequency = $changeFrequency;
    }

    /**
     * Get the priority.
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get the multilangual urls if exist.
     *
     * @return array
     */
    public function getMultiLangual()
    {
        return $this->multilang;
    }

    /**
     * Set the priority.
     *
     * @param  string  $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Add an image tag
     * @param  string  $location
     * @param  string  $caption
     * @param  string  $geo_location
     * @param  string  $title
     * @param  string  $license
     * @return void
     */
    public function addImage($location, $caption = null, $geoLocation = null, $title = null, $license = null)
    {
        $image = $location instanceof ImageTag ? $location : new ImageTag($location, $caption, $geoLocation, $title, $license);

        $this->images[] = $image;
    }

    /**
     * Get associated image tags
     * Google Image Sitemap specifiction allows only up to 1000 images per each page
     *
     * @return array
     */
    public function getImages()
    {
        return array_slice($this->images, 0, 1000);
    }

    /**
     * Tell if the tag has associate image tags
     *
     * @return boolean
     */
    public function hasImages()
    {
        return count($this->images) > 0;
    }
}
