<?php

namespace Watson\Sitemap\Tags;

use DateTime;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class ExpiredTag extends BaseTag
{
    /**
     * The expiration date.
     *
     * @var \DateTimeInterface
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
     * @param  \DateTimeInterface|string|null  $expired
     * @return void
     */
    public function __construct($location, $expired = null)
    {
        parent::__construct($location);

        $this->setExpired($expired);
    }

    /**
     * Get the expired timestamp.
     *
     * @return \DateTimeInterface
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set the expiration date
     *
     * @param  \DateTimeInterface|\Illuminate\Database\Eloquent\Model|string  $expired
     * @return void
     */
    public function setExpired($expired)
    {
        if ($expired instanceof DateTimeInterface) {
            $this->expired = $expired;
            return;
        } elseif ($expired instanceof Model) {
            $this->expired = $expired->deleted_at ?: $expired->updated_at;
            return;
        }

        $this->expired = new DateTime($expired);
    }
}
