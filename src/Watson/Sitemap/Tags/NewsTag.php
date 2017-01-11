<?php namespace Watson\Sitemap\Tags;

class NewsTag extends BaseTag
{
    /**
     * The name of the publisher.
     *
     * @var string
     */
    protected $name;

    /**
     * The language.
     *
     * @var string
     */
    protected $language;

    /**
     * The title of the news.
     *
     * @var string
     */
    protected $title;

    /**
     * The genres.
     *
     * @var array
     */
    protected $genres = [];
    
    /**
     * Publication Date.
     *
     * @var \DateTime
     */
    protected $publicationDate;
    
    
    /**
     * Keywords.
     *
     * @var array
     */
    protected $keywords = [];

    /**
     * Stock tickers.
     *
     * @var array
     */
    protected $stockTickers = [];
    
    
    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'name' => 'name',
    	'name' => 'name',
    	'name' => 'name',
    	'name' => 'name',
    	'name' => 'name',
    		 
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  string  $caption
     * @param  string  $geo_location
     * @param  string  $title
     * @param  string  $license
     * @return void
     */
    public function __construct($location, $caption = null, $geoLocation = null, $title = null, $license = null)
    {
        parent::__construct($location);

        $this->caption = $caption;
        $this->geoLocation = $geoLocation;
        $this->title = $title;
        $this->license = $license;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getPublicationName()
    {
        return $this->name;
    }

    /**
     * Set the title.
     *
     * @param  string  $caption
     * @return void
     */
    public function setPublicationName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the publication language.
     *
     * @return string
     */
    public function getPublicationLanguage()
    {
        return $this->language;
    }

    /**
     * Set the publication language.
     *
     * @param  string  $language
     * @return void
     */
    public function setPublicationLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title.
     *
     * @param  string  $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the publication date.
     *
     * @return string
     */
    public function getPublicationDate()
    {
    	if($this->publicationDate)
        	return $this->publicationDate->format('Y-m-d');
    	
        return null;
    }

    /**
     * Set the publication date.
     *
     * @param  \DateTime  $date
     * @return void
     */
    public function setPublicationDate($date)
    {
        $this->publicationDate = $date;
    }
    
    /**
     * Get the genres.
     *
     * @return string
     */
    public function getGenres()
    {
    	return implode(', ', $this->genres);
    }
    
    /**
     * Set the genres.
     *
     * @param  array  $genres
     * @return void
     */
    public function setGenres($genres)
    {
    	$this->genres = $genres;
    }
    
    /**
     * Get the keywords.
     *
     * @return string
     */
    public function getKeywords()
    {
    	return implode(', ', $this->keywords);
    }
    
    /**
     * Set the keywords.
     *
     * @param  array  $keywords
     * @return void
     */
    public function setKeywords($keywords)
    {
    	$this->keywords = $keywords;
    }
    
    /**
     * Get the stock tickers.
     *
     * @return string
     */
    public function getStockTickers()
    {
    	return implode(', ', $this->stockTickers);
    }
    
    /**
     * Set the stock tickers.
     *
     * @param  array  $tickers
     * @return void
     */
    public function setStockTickers($tickers)
    {
    	$this->stockTickers = $tickers;
    }
}
