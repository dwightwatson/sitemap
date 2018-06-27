<?php namespace Watson\Sitemap\Tags\Video;

/**
 * Class VideoRestrictionTag
 * @see https://developers.google.com/webmasters/videosearch/countryrestrictions
 */
class VideoRestrictionTag
{
    /**
     * @var array Countries where the video is either available or not
     */
    protected $countries;

    /**
     * @var string pecifies whether the video is restricted or permitted for the specified countries
     * Default: deny and if no countries are specified, the video will appear anywhere.
     */
    protected $relationship = 'deny';

    private static $allowedRelationships = ['deny', 'allow'];

    public function __construct(array $countries = [], $relationship = 'deny')
    {
        $this->countries = $countries;
        if (in_array($relationship, $this::$allowedRelationships)) {
            $this->relationship = $relationship;
        }
    }

    public function getCountries()
    {
        if (count($this->countries)) {
            return implode(' ', $this->countries);
        }
        return;
    }

    public function getRelationship()
    {
        return $this->relationship;
    }
}
