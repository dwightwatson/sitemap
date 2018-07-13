<?php namespace Watson\Sitemap\Tags\Video;

class VideoPlatformTag
{
    /**
     * The supported tag platforms.
     *
     * @var array
     */
    private static $allowedPlatforms = ['web', 'mobile', 'tv'];

    /**
     * The supported tag relationships.
     *
     * @var array
     */
    private static $allowedRelationships = ['deny', 'allow'];

    /**
     * The tag platforms.
     *
     * @var array
     */
    protected $platforms;

    /**
     * The tag relationship.
     *
     * @var string
     */
    protected $relationship = 'deny';

    /**
     * Create a new video platform tag.
     *
     * @param  array  $platforms
     * @param  string  $relationship
     * @return void
     */
    public function __construct(array $platforms, $relationship = 'deny')
    {
        $this->platforms = array_intersect($platforms, $this::$allowedPlatforms);

        if (in_array($relationship, $this::$allowedRelationships)) {
            $this->relationship = $relationship;
        }
    }

    /**
     * Get the tag platforms.
     *
     * @return string
     */
    public function getPlatforms()
    {
        return implode(' ', $this->platforms);
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
