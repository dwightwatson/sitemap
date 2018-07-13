<?php namespace Watson\Sitemap\Tags\Video;

class VideoRestrictionTag
{
    /**
     * Supported tag relationships.
     *
     * @var array
     */
    private static $allowedRelationships = ['deny', 'allow'];

    /**
     * The tag countries.
     *
     * @var array
     */
    protected $countries;

    /**
     * The tag relationship.
     *
     * @var string
     */
    protected $relationship = 'deny';

    /**
     * Create a new video restriction tag.
     *
     * @param  array  $countries
     * @param  string  $relationship
     * @return void
     */
    public function __construct(array $countries = [], $relationship = 'deny')
    {
        $this->countries = $countries;

        if (in_array($relationship, $this::$allowedRelationships)) {
            $this->relationship = $relationship;
        }
    }

    /**
     * Get the tag countries.
     *
     * @return string
     */
    public function getCountries()
    {
        return implode(' ', $this->countries);
    }

    /**
     * Get the tag relationship.
     *
     * @return string
     */
    public function getRelationship()
    {
        return $this->relationship;
    }
}
