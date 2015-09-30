<?php namespace Watson\Sitemap\Tags;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class ExpiredTag extends BaseTag
{
    /**
     * The expiration date.
     *
     * @var \DateTime
     */
    protected $expired;

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'     => 'location',
        'expired' => 'expired',
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  \DateTime|string  $expired
     * @return void
     */
    public function __construct($location, $expired = null)
    {
        parent::__construct($location, null);

        $this->setExpired($expired);
    }

    /**
     * Get the expired expired timestamp.
     *
     * @return \DateTime
     */
    public function getExpired()
    {
        return $this->expired;
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
            $this->expired = $expired->deleted_at ?: $expired->updated_at;
            return;
        }

        $this->expired = new DateTime($expired);
    }
}
