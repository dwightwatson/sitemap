<?php
use Watson\Sitemap\Tags\Tag;
use Watson\Sitemap\Tags\NewsTag;

class NewsTagTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
        
        date_default_timezone_set('UTC');
        
        $this->tag = new NewsTag('foo', 'bar', [
            'eenie',
            'meenie',
            'meinie'
        ], new DateTime('1945/08/17', null), 'bat', [
            'row',
            'your',
            'boat'
        ], [
            'gently',
            'down',
            'stream'
        ]);
    }

    public function test_get_publication_name()
    {
        $this->assertEquals('foo', $this->tag->getPublicationName());
    }

    public function test_set_publication_name()
    {
        $this->tag->setPublicationName('baz');
        
        $this->assertEquals('baz', $this->tag->getPublicationName());
    }

    public function test_get_publication_language()
    {
        $this->assertEquals('bar', $this->tag->getPublicationLanguage());
    }

    public function test_set_publication_language()
    {
        $this->tag->setPublicationLanguage('foobaz');
        
        $this->assertEquals('foobaz', $this->tag->getPublicationLanguage());
    }

    public function test_get_publication_date()
    {
        $this->assertEquals('1945-08-17', $this->tag->getPublicationDate());
    }

    public function test_set_publication_date()
    {
        $this->tag->setPublicationDate(new DateTime('1969/08/20'));
        
        $this->assertEquals('1969-08-20', $this->tag->getPublicationDate());
    }

    public function test_get_title()
    {
        $this->assertEquals('bat', $this->tag->getTitle());
    }

    public function test_set_title()
    {
        $this->tag->setTitle('baz');
        
        $this->assertEquals('baz', $this->tag->getTitle());
    }

    public function test_get_keywords()
    {
        $this->assertEquals('row, your, boat', $this->tag->getKeywords());
    }

    public function test_set_keywords()
    {
        $this->tag->setKeywords([
            'freak',
            'like',
            'me'
        ]);
        
        $this->assertEquals('freak, like, me', $this->tag->getKeywords());
    }

    public function test_get_genres()
    {
        $this->assertEquals('eenie, meenie, meinie', $this->tag->getGenres());
    }

    public function test_set_genres()
    {
        $this->tag->setGenres([
            'freak',
            'like',
            'me'
        ]);
        
        $this->assertEquals('freak, like, me', $this->tag->getGenres());
    }

    public function test_get_stock_tickers()
    {
        $this->assertEquals('gently, down, stream', $this->tag->getStockTickers());
    }

    public function test_set_stock_tickers()
    {
        $this->tag->setStockTickers([
            'freak',
            'like',
            'me'
        ]);
        
        $this->assertEquals('freak, like, me', $this->tag->getStockTickers());
    }
}
