<?php namespace Watson\Sitemap\Tags\Video;

use DateTime;
use Watson\Sitemap\Tags\BaseTag;

class VideoTag extends BaseTag
{
    /**
     * The tag title.
     *
     * @var string
     */
    protected $title;

    /**
     * The tag description.
     *
     * @var string
     */
    protected $description;

    /**
     * The tag thumbnail image URL.
     *
     * @var string
     */
    protected $thumbnailLocation;

    /**
     * The tag content location URL.
     *
     * @var string
     */
    protected $contentLocation;

    /**
     * The tag player location URL.
     *
     * @var string
     */
    protected $playerLocation;

    /**
     * The tag duration in seconds.
     *
     * @var int
     */
    protected $duration;

    /**
     * The tag expiration date.
     *
     * @var \DateTime
     */
    protected $expirationDate;

    /**
     * The tag rating.
     *
     * @var float
     */
    protected $rating;

    /**
     * The tag view count.
     *
     * @var int
     */
    protected $viewCount;

    /**
     * The tag publication date.
     *
     * @var \DateTime
     */
    protected $publicationDate;

    /**
     * The tag family friendly status.
     *
     * @var bool
     */
    protected $familyFriendly = true;

    /**
     * The video tags.
     *
     * @var array
     */
    protected $tags;

    /**
     * The video category.
     *
     * @var string
     */
    protected $category;

    /**
     * The tag restriction.
     *
     * @var VideoRestrictionTag
     */
    protected $restriction;

    /**
     * The gallery location URL.
     *
     * @var string
     */
    protected $galleryLocation;

    /**
     * The tag prices.
     *
     * @var VideoPriceTag[]
     */
    protected $prices = [];

    /**
     * Whether a subscription is required for the video.
     *
     * @var bool
     */
    protected $requiresSubscription = false;

    /**
     * The video uploader's name.
     *
     * @var string
     */
    protected $uploader;

    /**
     * The platform where the video may be played.
     *
     * @var VideoPlatformTag
     */
    protected $platform;

    /**
     * Whether the video is a live stream.
     *
     * @var bool
     */
    protected $live = false;

    /**
     * Create a new video tag.
     *
     * @param  string  $location
     * @param  string  $title
     * @param  string  $description
     * @param  string  $thumbnailLocation
     * @return void
     */
    public function __construct($location, $title, $description, $thumbnailLocation)
    {
        parent::__construct($location);

        $this->title = $title;
        $this->description = $description;
        $this->thumbnailLocation = $thumbnailLocation;
    }

    /**
     * Get the tag title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the tag description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the thumbnail location.
     *
     * @return string
     */
    public function getThumbnailLocation()
    {
        return $this->thumbnailLocation;
    }

    /**
     * Get the content location.
     *
     * @return string
     */
    public function getContentLocation()
    {
        return $this->contentLocation;
    }

    /**
     * Set the content location.
     *
     * @param  string  $contentLocation
     * @return void
     */
    public function setContentLocation($contentLocation)
    {
        $this->contentLocation = $contentLocation;
    }

    /**
     * Get the player location.
     *
     * @return string
     */
    public function getPlayerLocation()
    {
        return $this->playerLocation;
    }

    /**
     * Set the player location.
     *
     * @param  string  $playerLocation
     * @return void
     */
    public function setPlayerLocation($playerLocation)
    {
        $this->playerLocation = $playerLocation;
    }

    /**
     * Get the video duration.
     *
     * @var int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the video duration.
     *
     * @param  int  $duration
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get the expiration date.
     *
     * @var \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set the expiration date.
     *
     * @param  \DateTime  $expirationDate
     * @return void
     */
    public function setExpirationDate(DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * Get the video rating.
     *
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the video rating.
     *
     * @param  float  $rating
     * @return void
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * Get the view count.
     *
     * @return int
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     * Set the view count.
     *
     * @param  int  $viewCount
     * @return void
     */
    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
    }

    /**
     * Get the publication date.
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set the publication date.
     *
     * @param  \DateTime  $publicationDate
     * @return void
     */
    public function setPublicationDate(DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Get the family friendly status.
     *
     * @return bool
     */
    public function getFamilyFriendly()
    {
        return $this->familyFriendly;
    }

    /**
     * Set the family friendly status.
     *
     * @param  bool  $familyFriendly
     */
    public function setFamilyFriendly(bool $familyFriendly)
    {
        $this->familyFriendly = $familyFriendly;
    }

    /**
     * Get the tags.
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the tags.
     *
     * @param  array  $tags
     * @return void
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get the category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the category.
     *
     * @param  string  $category
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Get the tag restriction.
     *
     * @return VideoRestrictionTag
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * Set the tag restriction.
     *
     * @param  VideoRestrictionTag  $restriction
     * @return void
     */
    public function setRestriction(VideoRestrictionTag $restriction)
    {
        $this->restriction = $restriction;
    }

    /**
     * Get the gallery location.
     *
     * @return string
     */
    public function getGalleryLocation()
    {
        return $this->galleryLocation;
    }

    /**
     * Set the gallery location.
     *
     * @param  string  $galleryLocation
     * @return string
     */
    public function setGalleryLocation($galleryLocation)
    {
        $this->galleryLocation = $galleryLocation;
    }

    /**
     * Get the tag prices.
     *
     * @return  VideoPriceTag[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set the tag prices.
     *
     * @param  VideoPriceTag[]  $prices
     * @return void
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    /**
     * Get whether a subscription is required.
     *
     * @return bool
     */
    public function getRequiresSubscription()
    {
        return $this->requiresSubscription;
    }

    /**
     * Set whether a subscription is required.
     *
     * @param  bool  $requiresSubscription
     * @return void
     */
    public function setRequiresSubscription(bool $requiresSubscription)
    {
        $this->requiresSubscription = $requiresSubscription;
    }

    /**
     * Get the uploader.
     *
     * @return string
     */
    public function getUploader()
    {
        return $this->uploader;
    }

    /**
     * Set the uploader.
     *
     * @param  string  $uploader
     * @return void
     */
    public function setUploader($uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Get the platform.
     *
     * @return VideoPlatformTag
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set the platform.
     *
     * @param  VideoPlatformTag  $platform
     * @return void
     */
    public function setPlatform(VideoPlatformTag $platform)
    {
        $this->platform = $platform;
    }

    /**
     * Get the live status.
     *
     * @return bool
     */
    public function getLive()
    {
        return $this->live;
    }

    /**
     * Set the live status.
     *
     * @param  bool  $live
     * @return void
     */
    public function setLive(bool $live)
    {
        $this->live = $live;
    }
}
