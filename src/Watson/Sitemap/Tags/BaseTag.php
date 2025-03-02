<?php

namespace Watson\Sitemap\Tags;

use DateTime;
use ArrayAccess;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Watson\Sitemap\Tags\Video\VideoTag;

abstract class BaseTag implements ArrayAccess
{
    /**
     * The sitemap location.
     *
     * @var string
     */
    protected $location;

    /**
     * The last modified timestamp.
     *
     * @var \DateTimeInterface|null
     */
    protected $lastModified;

    /**
     * Image tags belonging to this tag.
     *
     * @var ImageTag[]
     */
    protected $images = [];

    /**
     * Videos tags belonging to this tag.
     *
     * @var VideoTag[]
     */
    protected $videos = [];

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'     => 'location',
        'lastmod' => 'lastModified'
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  \DateTimeInterface|string|null  $lastModified
     * @return void
     */
    public function __construct($location, $lastModified = null)
    {
        $this->location = $location;

        if ($lastModified) {
            $this->setLastModified($lastModified);
        }
    }

    /**
     * Get the sitemap location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the sitemap location.
     *
     * @param  string  $location
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get the last modified timestamp.
     *
     * @return \DateTimeInterface|null
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set the last modified timestamp.
     *
     * @param  \DateTimeInterface|\Illuminate\Database\Eloquent\Model|string  $lastModified
     * @return void
     */
    public function setLastModified($lastModified)
    {
        if ($lastModified instanceof DateTimeInterface) {
            $this->lastModified = $lastModified;
            return;
        } elseif ($lastModified instanceof Model) {
            $this->lastModified = $lastModified->updated_at;
            return;
        }

        $this->lastModified = new DateTime($lastModified);
    }

    /**
     * Add an image tag to the tag.
     *
     * @param  string|ImageTag  $location
     * @param  string|null  $caption
     * @param  string|null  $geoLocation
     * @param  string|null  $title
     * @param  string|null  $license
     * @return void
     */
    public function addImage($location, $caption = null, $geoLocation = null, $title = null, $license = null)
    {
        $image = $location instanceof ImageTag ? $location : new ImageTag($location, $caption, $geoLocation, $title, $license);

        $this->images[] = $image;
    }

    /**
     * Add a video tag to the tag.
     *
     * @param  string|VideoTag  $location
     * @param  string|null  $title
     * @param  string|null  $description
     * @param  string|null  $thumbnailLocation
     * @return void
     */
    public function addVideo($location, $title = null, $description = null, $thumbnailLocation = null)
    {
        $video = $location instanceof VideoTag ? $location : new VideoTag($location, $title, $description, $thumbnailLocation);

        $this->videos[] = $video;
    }

    /**
     * Get associated image tags. Google image sitemaps only allow up to
     * 1,000 images per page.
     *
     * @return ImageTag[]
     */
    public function getImages()
    {
        return array_slice($this->images, 0, 1000);
    }

    /**
     * Get associated video tags
     *
     * @return VideoTag[]
     */
    public function getVideos()
    {
        return $this->videos;
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

    /**
     * Tell if the tag has associate image tags
     *
     * @return boolean
     */
    public function hasVideos()
    {
        return count($this->videos) > 0;
    }

    public function offsetExists($offset)
    {
        if (array_key_exists($offset, $this->xmlTags)) {
            $attribute = $this->xmlTags[$offset];

            return isset($this->{$attribute});
        }

        return null;
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            $attribute = $this->xmlTags[$offset];

            return $this->{$attribute};
        }

        return null;
    }

    public function offsetSet($offset, $value)
    {
        if (array_key_exists($offset, $this->xmlTags)) {
            $attribute = $this->xmlTags[$offset];

            $this->{$attribute} = $value;
        }
    }

    public function offsetUnset($offset)
    {
        if ($attribute = $this->getXmlTagAttribute($offset)) {
            unset($this->{$attribute});
        }

        return null;
    }

    protected function getXmlTagAttribute($offset)
    {
        if (array_key_exists($offset, $this->xmlTags)) {
            return $this->xmlTags[$offset];
        }

        return null;
    }
}
