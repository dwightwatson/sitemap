<?php namespace Watson\Sitemap\Tags;

use DateTime;

class Expired extends BaseTag
{
    /**
     * The expiration date.
     *
     * @var string
     */
    protected $expired;

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'        => 'location',
        'expired'    => 'expired',
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  string  $expired
     * @return void
     */
    public function __construct($location, $expired=null)
    {
        parent::__construct($location, null);

        $this->setExpired($expired);
    }

    /**
     * Set the expiration date
     *
     * @param  \DateTime|string  $expired
     * @return void
     */
    public function setExpired($expired)
    {
        if ($expired instanceof DateTime) {
            $this->expired = $expired;
            return;
        } elseif ($expired instanceof Model) {
            $this->expired = $expired->updated_at;
            return;
        }

        $this->expired = new DateTime($expired);
    }

    /**
     * Returns the expiration date
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Null placeholder for priority
     */
    public function getPriority()
    {
        return null;
    }

    /**
     * Null placeholder for last modified
     */
    public function getLastModified()
    {
        return null;
    }

    /**
     * Null placeholder for change frequency
     */
    public function getChangeFrequency()
    {
        return null;
    }


}
