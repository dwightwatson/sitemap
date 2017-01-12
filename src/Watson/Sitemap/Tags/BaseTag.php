<?php
namespace Watson\Sitemap\Tags;

use DateTime;
use ArrayAccess;
use Watson\Sitemap\Tags\ImageTag;
use Illuminate\Database\Eloquent\Model;

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
     * @var \DateTime
     */
    protected $lastModified;

    /**
     * News tag belonging to this tag.
     *
     * @var NewsTag
     */
    protected $news;

    /**
     * Image tags belonging to this tag.
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
        'loc' => 'location',
        'lastmod' => 'lastModified'
    ];

    /**
     * Construct the tag.
     *
     * @param string $location            
     * @param \DateTime|string $lastModified            
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
     * @param string $location            
     * @return void
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get the last modified timestamp.
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set the last modified timestamp.
     *
     * @param \DateTime|string $lastModified            
     * @return void
     */
    public function setLastModified($lastModified)
    {
        if ($lastModified instanceof DateTime) {
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
     * @param string $location            
     * @param string $caption            
     * @param string $geo_location            
     * @param string $title            
     * @param string $license            
     * @return void
     */
    public function addImage($location, $caption = null, $geoLocation = null, $title = null, $license = null)
    {
        $image = $location instanceof ImageTag ? $location : new ImageTag($location, $caption, $geoLocation, $title, $license);
        
        $this->images[] = $image;
    }

    /**
     * Get associated image tags.
     * Google image sitemaps only allow up to
     * 1,000 images per page.
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

    /**
     * Get associated image tags.
     * Google image sitemaps only allow up to
     * 1,000 images per page.
     *
     * @return array
     */
    public function getNews()
    {
        return array_slice($this->images, 0, 1000);
    }

    /**
     * Set news tag
     *
     * @param $publicationName string
     * @param $publicationLanguage string
     * @param $genres array
     * @param $publicationDate \DateTime
     * @param $title string
     * @param $keywords array
     * @param $stockTickers array
     * @return void
     */
    public function setNews($publicationName, $publicationLanguage, $genres, $publicationDate, $title, $keywords = null, $stockTickers = null)
    {
        $news = $location instanceof NewsTag ? $location : new NewsTag($publicationName, $publicationLanguage, $genres, $publicationDate, $title, $keywords, $stockTickers);
        $this->news;
    }

    /**
     * Tell if the tag has Google news extension tags
     *
     * @return boolean
     */
    public function isNews()
    {
        return $this->news instanceof NewsTag;
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

    protected function getXmlTagAttribute($tag)
    {
        if (array_key_exists($offset, $this->xmlTags)) {
            return $this->xmlTags[$offset];
        }
        
        return null;
    }
}
