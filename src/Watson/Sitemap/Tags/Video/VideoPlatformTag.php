<?php namespace Watson\Sitemap\Tags\Video;

/**
 * Class VideoPlatformTag
 * @see https://developers.google.com/webmasters/videosearch/platformrestrictions.html
 */
class VideoPlatformTag
{
    /**
     * @var array Allowed values are web, mobile, and tv
     */
    protected $platforms;

    /**
     * @var array Allowed values according to google
     */
    private static $allowedPlatforms = ['web', 'mobile', 'tv'];

    /**
     * @var string pecifies whether the video is restricted or permitted for the specified platforms
     * Default: deny and if no platforms are specified, the video will appear on all devices.
     */
    protected $relationship = 'deny';

    private static $allowedRelationships = ['deny', 'allow'];

    public function __construct(array $platforms, $relationship = 'deny')
    {
        $this->platforms = array_intersect($platforms, $this::$allowedPlatforms);
        if (in_array($relationship, $this::$allowedRelationships)) {
            $this->relationship = $relationship;
        }
    }

    public function getPlatforms()
    {
        if (count($this->platforms)) {
            return implode(' ', $this->platforms);
        }
        return;
    }

    public function getRelationship()
    {
        return $this->relationship;
    }
}
