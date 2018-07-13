<?php

use Watson\Sitemap\Tags\Video\VideoPlatformTag;
use Watson\Sitemap\Tags\Video\VideoPriceTag;
use Watson\Sitemap\Tags\Video\VideoRestrictionTag;
use Watson\Sitemap\Tags\Video\VideoTag;

/**
 * @property VideoTag tag
 */
class VideoTagTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();

        date_default_timezone_set('UTC');

        $this->tag = new VideoTag('location', 'title', 'description', 'thumbnail');
    }

    public function test_get_required_tags()
    {
        $this->assertEquals('location', $this->tag->getLocation());
        $this->assertEquals('title', $this->tag->getTitle());
        $this->assertEquals('description', $this->tag->getDescription());
        $this->assertEquals('thumbnail', $this->tag->getThumbnailLocation());
    }

    public function test_set_basic_optional_tags()
    {
        $this->tag->setDuration(3550);
        $this->assertEquals(3550, $this->tag->getDuration());

        $date = new DateTime();
        $this->tag->setExpirationDate($date);
        $this->assertEquals($date, $this->tag->getExpirationDate());

        $this->tag->setRating(4.5);
        $this->assertEquals(4.5, $this->tag->getRating());

        $this->tag->setViewCount(1245);
        $this->assertEquals(1245, $this->tag->getViewCount());

        $this->tag->setPublicationDate($date);
        $this->assertEquals($date, $this->tag->getPublicationDate());

        $this->tag->setFamilyFriendly(false);
        $this->assertFalse($this->tag->getFamilyFriendly());

        $this->tag->setTags(["tag", "tag"]);
        $this->assertEquals(["tag", "tag"], $this->tag->getTags());

        $this->tag->setCategory('Awesome');
        $this->assertEquals('Awesome', $this->tag->getCategory());

        $this->tag->setGalleryLocation('link');
        $this->assertEquals('link', $this->tag->getGalleryLocation());

        $this->tag->setRequiresSubscription(true);
        $this->assertTrue($this->tag->getRequiresSubscription());

        $this->tag->setUploader('Uploader');
        $this->assertEquals('Uploader', $this->tag->getUploader());

        $this->tag->setLive(false);
        $this->assertFalse($this->tag->getLive());
    }

    public function test_set_price_tag_required()
    {
        $price = new VideoPriceTag(2.99, 'USD');
        $this->tag->setPrices([$price]);
        $tagPrice = $this->tag->getPrices()[0];
        $this->assertEquals($price, $tagPrice);
        $this->assertEquals(2.99, $tagPrice->getPrice());
        $this->assertEquals('USD', $tagPrice->getCurrency());
        $this->assertNull($tagPrice->getResolution());
        $this->assertNull($tagPrice->getType());
    }

    public function test_set_price_tag_optional()
    {
        $price = new VideoPriceTag(2.99, 'USD');
        $price->setResolution('HD');
        $this->tag->setPrices([$price]);
        $tagPrice = $this->tag->getPrices()[0];
        $this->assertEquals('HD',$tagPrice->getResolution());
        $this->assertNull($tagPrice->getType());
    }

    public function test_set_restriction_tag()
    {
        $restriction = new VideoRestrictionTag(['US', 'CA'], 'allow');
        $this->tag->setRestriction($restriction);
        $tagRestriction = $this->tag->getRestriction();
        $this->assertEquals($restriction, $tagRestriction);
        $this->assertEquals('allow', $tagRestriction->getRelationship());
        $this->assertEquals('US CA', $tagRestriction->getCountries());
    }

    public function test_set_restriction_tag_with_countries_deny()
    {
        $restriction = new VideoRestrictionTag(['US', 'CA'], 'deny');
        $this->tag->setRestriction($restriction);
        $tagRestriction = $this->tag->getRestriction();
        $this->assertEquals($restriction, $tagRestriction);
        $this->assertEquals('deny', $tagRestriction->getRelationship());
        $this->assertEquals('US CA', $tagRestriction->getCountries());
    }

    public function test_set_restriction_tag_without_countries_defaults_to_deny()
    {
        $restriction = new VideoRestrictionTag();
        $this->tag->setRestriction($restriction);
        $tagRestriction = $this->tag->getRestriction();
        $this->assertEquals($restriction, $tagRestriction);
        $this->assertEquals('deny', $tagRestriction->getRelationship());
        $this->assertEmpty($tagRestriction->getCountries());
    }

    public function test_set_platform_tag()
    {
        $platform = new VideoPlatformTag(['web', 'mobile'], 'allow');
        $this->tag->setPlatform($platform);
        $tagPlatform = $this->tag->getPlatform();
        $this->assertEquals($platform, $tagPlatform);
        $this->assertEquals('allow', $tagPlatform->getRelationship());
        $this->assertEquals('web mobile', $tagPlatform->getPlatforms());
    }

    public function test_set_platform_tag_with_platforms_deny()
    {
        $platform = new VideoPlatformTag(['web'], 'deny');
        $this->tag->setPlatform($platform);
        $tagPlatform = $this->tag->getPlatform();
        $this->assertEquals($platform, $tagPlatform);
        $this->assertEquals('deny', $tagPlatform->getRelationship());
        $this->assertEquals('web', $tagPlatform->getPlatforms());
    }

    public function test_set_platform_tag_with_filtering_valid_platforms()
    {
        $platform = new VideoPlatformTag(['web', 'tv', 'invalid', 'anotherinalid']);
        $this->tag->setPlatform($platform);
        $tagPlatform = $this->tag->getPlatform();
        $this->assertEquals($platform, $tagPlatform);
        $this->assertEquals('deny', $tagPlatform->getRelationship());
        $this->assertEquals('web tv', $tagPlatform->getPlatforms());
    }
}
