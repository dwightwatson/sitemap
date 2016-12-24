<?php namespace Watson\Sitemap\Tags;

class MultilingualTag extends Tag
{
    /**
     * The multilingual options.
     *
     * @var string
     */
    protected $multilingual;

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'        => 'location',
        'lastmod'    => 'lastModified',
        'changefreq' => 'changeFrequency',
        'priority'   => 'priority',
        'xhtml:link' => 'multilingual',
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  string  $lastModified
     * @param  string  $changeFrequency
     * @param  string  $priority
     * @param  array   $multilingual
     * @return void
     */
    public function __construct($location, $lastModified = null, $changeFrequency = null, $priority = null, array $multilingual = [])
    {
        parent::__construct($location, $lastModified, $changeFrequency, $priority);

        $this->multilingual = $multilingual;
    }

    /**
     * Get the multilingual options.
     *
     * @return array
     */
    public function getMultilingual()
    {
        return $this->multilingual;
    }

    /**
     * Set the multilingual options.
     *
     * @param  array  $multilingual
     * @return void
     */
    public function setMultilingual(array $multilingual)
    {
        $this->multilingual = $multilingual;
    }
}
