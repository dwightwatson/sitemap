<?php
namespace Watson\Sitemap\Tags;

class NewsTag extends BaseTag
{

    /**
     * The name of the publisher.
     *
     * @var string
     */
    protected $publicationName;

    /**
     * The language.
     *
     * @var string
     */
    protected $publicationLanguage;

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
        'name' => 'publicationName',
        'language' => 'publicationLanguage',
        'genres' => 'genres',
        'publication_date' => 'publicationDate',
        'title' => 'title',
        'keywords' => 'keywords',
        'stock_tickers' => 'stockTickers'
    ];

    /**
     * Construct the tag.
     *
     * @param string $publicationName            
     * @param string $publicationLanguage            
     * @param array $genres            
     * @param \DateTime $publicationDate            
     * @param string $title            
     * @param array $keywords            
     * @param array $stockTickers            
     * @return void
     */
    public function __construct($publicationName = null, $publicationLanguage = null, $genres = null, $publicationDate = null, $title = null, $keywords = null, $stockTickers = null)
    {
        parent::__construct(null);
        
        $this->publicationName = $publicationName;
        $this->publicationLanguage = $publicationLanguage;
        $this->genres = $genres;
        $this->publicationDate = $publicationDate;
        $this->title = $title;
        $this->keywords = $keywords;
        $this->stockTickers = $stockTickers;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getPublicationName()
    {
        return $this->publicationName;
    }

    /**
     * Set the title.
     *
     * @param string $caption            
     * @return void
     */
    public function setPublicationName($name)
    {
        $this->publicationName = $name;
    }

    /**
     * Get the publication language.
     *
     * @return string
     */
    public function getPublicationLanguage()
    {
        return $this->publicationLanguage;
    }

    /**
     * Set the publication language.
     *
     * @param string $language            
     * @return void
     */
    public function setPublicationLanguage($language)
    {
        $this->publicationLanguage = $language;
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
     * @param string $title            
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
        if ($this->publicationDate)
            return $this->publicationDate->format('Y-m-d');
        
        return null;
    }

    /**
     * Set the publication date.
     *
     * @param \DateTime $date            
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
     * @param array $genres            
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
     * @param array $keywords            
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
     * @param array $tickers            
     * @return void
     */
    public function setStockTickers($tickers)
    {
        $this->stockTickers = $tickers;
    }
}
