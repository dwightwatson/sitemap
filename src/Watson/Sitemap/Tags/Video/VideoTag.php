<?php namespace Watson\Sitemap\Tags\Video;

use Watson\Sitemap\Tags\BaseTag;

/**
 * Class VideoTag
 *
 * @see https://developers.google.com/webmasters/videosearch/sitemaps
 */
class VideoTag extends BaseTag
{
    /**
     * @var string Title
     * REQUIRED
     */
    protected $title;

    /**
     * @var string Description
     * REQUIRED
     */
    protected $description;

    /**
     * @var string Thumbnail image URL
     * REQUIRED
     */
    protected $thumbnailLocation;

    /**
     * @var string A URL pointing to the actual video media file
     *
     */
    protected $contentLocation;

    /**
     * @var string A URL pointing to a player for a specific video.
     */
    protected $playerLocation;

    /**
     * @var int Duration in seconds
     */
    protected $duration;

    /**
     * @var \DateTime The date after which the video will no longer be available
     */
    protected $expirationDate;

    /**
     * @var float The rating of the video
     */
    protected $rating;

    /**
     * @var int The number of times the video has been viewed.
     */
    protected $viewCount;

    /**
     * @var \DateTime The date the video was first published
     */
    protected $publicationDate;

    /**
     * @var bool if the video should be available only to users with SafeSearch turned off
     */
    protected $familyFriendly = true;

    /**
     * @var array Tags associated with the video
     */
    protected $tags;

    /**
     * @var string The video's category.
     */
    protected $category;

    /**
     * @var VideoRestrictionTag A space-delimited list of countries where the video may or may not be played
     */
    protected $restriction;

    /**
     * @var string A link to the gallery (collection of videos) in which this video appears.
     */
    protected $galleryLocation;

    /**
     * @var VideoPriceTag[] The price or prices to download or view the video.
     */
    protected $prices = [];

    /**
     * @var boolean Indicates whether a subscription (either paid or free) is required to view the video
     */
    protected $requiresSubscription = false;

    /**
     * @var string The video uploader's name
     */
    protected $uploader;

    /**
     * @var VideoPlatformTag A list of space-delimited platforms where the video may or may not be played.
     */
    protected $platform;

    /**
     * @var boolean Indicates whether the video is a live stream
     */
    protected $live = false;

    /**
     * VideoTag constructor.
     *
     * @param $location
     * @param $title
     * @param $description
     * @param $thumbnailLocation
     */
    public function __construct($location, $title, $description, $thumbnailLocation)
    {
        parent::__construct($location);

        $this->title = $title;
        $this->description = $description;
        $this->thumbnailLocation = $thumbnailLocation;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getThumbnailLocation()
    {
        return $this->thumbnailLocation;
    }

    /**
     * @return string
     */
    public function getContentLocation()
    {
        return $this->contentLocation;
    }

    /**
     * @param string $contentLocation
     */
    public function setContentLocation($contentLocation)
    {
        $this->contentLocation = $contentLocation;
    }

    /**
     * @return string
     */
    public function getPlayerLocation()
    {
        return $this->playerLocation;
    }

    /**
     * @param string $playerLocation
     */
    public function setPlayerLocation($playerLocation)
    {
        $this->playerLocation = $playerLocation;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param \DateTime $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     * @param int $viewCount
     */
    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
    }

    /**
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * @param \DateTime $publicationDate
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * @return bool
     */
    public function isFamilyFriendly()
    {
        return $this->familyFriendly;
    }

    /**
     * @param bool $familyFriendly
     */
    public function setFamilyFriendly(bool $familyFriendly)
    {
        $this->familyFriendly = $familyFriendly;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return VideoRestrictionTag
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * @param VideoRestrictionTag $restriction
     */
    public function setRestriction(VideoRestrictionTag $restriction)
    {
        $this->restriction = $restriction;
    }

    /**
     * @return string
     */
    public function getGalleryLocation()
    {
        return $this->galleryLocation;
    }

    /**
     * @param string $galleryLocation
     */
    public function setGalleryLocation($galleryLocation)
    {
        $this->galleryLocation = $galleryLocation;
    }

    /**
     * @return VideoPriceTag[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param VideoPriceTag[] $prices
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    /**
     * @return bool
     */
    public function isRequiresSubscription()
    {
        return $this->requiresSubscription;
    }

    /**
     * @param bool $requiresSubscription
     */
    public function setRequiresSubscription(bool $requiresSubscription)
    {
        $this->requiresSubscription = $requiresSubscription;
    }

    /**
     * @return string
     */
    public function getUploader()
    {
        return $this->uploader;
    }

    /**
     * @param string $uploader
     */
    public function setUploader($uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * @return VideoPlatformTag
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param VideoPlatformTag $platform
     */
    public function setPlatform(VideoPlatformTag $platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return bool
     */
    public function isLive()
    {
        return $this->live;
    }

    /**
     * @param bool $live
     */
    public function setLive(bool $live)
    {
        $this->live = $live;
    }
}
