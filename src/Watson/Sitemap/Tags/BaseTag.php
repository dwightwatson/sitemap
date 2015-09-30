<?php namespace Watson\Sitemap\Tags;

use DateTime;
use ArrayAccess;
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
     * @param  \DateTime|string  $lastModified
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
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set the last modified timestamp.
     *
     * @param  \DateTime|string  $lastModified
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
