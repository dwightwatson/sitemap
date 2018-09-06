<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    <?php if ($__hasImages): ?> xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"<?php endif ?>
    <?php if ($__hasVideos): ?> xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"<?php endif ?>
    <?php if ($__isMultilingual): ?> xmlns:xhtml="http://www.w3.org/1999/xhtml"<?php endif ?>>
  <?php foreach ($__tags as $__tag): ?>
  <url>
    <loc><?php echo htmlspecialchars($__tag->getLocation(), ENT_XML1) ?></loc>
    <?php if ($__tag->getLastModified()): ?>
    <lastmod><?php echo $__tag->getLastModified()->format('Y-m-d\TH:i:sP') ?></lastmod>
    <?php endif ?>
    <?php if ($__tag instanceof \Watson\Sitemap\Tags\Tag): ?>
    <?php if ($__tag->getChangeFrequency()): ?>
    <changefreq><?php echo $__tag->getChangeFrequency() ?></changefreq>
    <?php endif ?>
    <?php if ($__tag->getPriority()): ?>
    <priority><?php echo $__tag->getPriority() ?></priority>
    <?php endif ?>
    <?php endif ?>
    <?php if ($__tag instanceof \Watson\Sitemap\Tags\MultilingualTag): ?>
    <?php foreach ($__tag->getMultilingual() as $lang => $href): ?>
    <xhtml:link rel="alternate" hreflang="<?php echo $lang ?>" href="<?php echo $href ?>" />
    <?php endforeach ?>
    <?php endif ?>
    <?php if ($__tag instanceof \Watson\Sitemap\Tags\ExpiredTag): ?>
    <expires><?php echo $__tag->getExpired()->format('Y-m-d\TH:i:sP') ?></expires>
    <?php endif ?>
    <?php foreach ($__tag->getImages() as $__image): ?>
      <image:image>
        <image:loc><?php echo $__image->getLocation() ?></image:loc>
        <?php if ($__image->getCaption()): ?>
        <image:caption><?php echo htmlspecialchars($__image->getCaption()) ?></image:caption>
        <?php endif ?>
        <?php if ($__image->getGeoLocation()): ?>
        <image:geo_location><?php echo htmlspecialchars($__image->getGeoLocation()) ?></image:geo_location>
        <?php endif ?>
        <?php if ($__image->getTitle()): ?>
        <image:title><?php echo htmlspecialchars($__image->getTitle()) ?></image:title>
        <?php endif ?>
        <?php if ($__image->getLicense()): ?>
        <image:license><?php echo htmlspecialchars($__image->getLicense()) ?></image:license>
        <?php endif ?>
      </image:image>
    <?php endforeach ?>
      <?php foreach ($__tag->getVideos() as $__video): ?>
          <video:video>
              <?php if ($__video->getThumbnailLocation()): ?>
                  <video:thumbnail_loc><?php echo htmlspecialchars($__video->getThumbnailLocation()) ?></video:thumbnail_loc>
              <?php endif ?>
              <?php if ($__video->getTitle()): ?>
                  <video:title><?php echo htmlspecialchars($__video->getTitle()) ?></video:title>
              <?php endif ?>
              <?php if ($__video->getDescription()): ?>
                  <video:description><?php echo htmlspecialchars($__video->getDescription()) ?></video:description>
              <?php endif ?>
              <?php if ($__video->getContentLocation() && !$__video->getPlayerLocation()): ?>
                  <video:content_loc><?php echo htmlspecialchars($__video->getContentLocation()) ?></video:content_loc>
              <?php endif ?>
              <?php if ($__video->getPlayerLocation() && !$__video->getContentLocation()): ?>
                  <video:player_loc><?php echo htmlspecialchars($__video->getPlayerLocation()) ?></video:player_loc>
              <?php endif ?>
              <?php if ($__video->getDuration()): ?>
                  <video:duration><?php echo $__video->getDuration() ?></video:duration>
              <?php endif ?>
              <?php if ($__video->getExpirationDate()): ?>
                  <video:expiration_date><?php echo $__video->getExpirationDate()->format('Y-m-d\TH:i:sP') ?></video:expiration_date>
              <?php endif ?>
              <?php if ($__video->getRating()): ?>
                  <video:rating><?php echo $__video->getRating() ?></video:rating>
              <?php endif ?>
              <?php if ($__video->getViewCount()): ?>
                  <video:view_count><?php echo $__video->getViewCount() ?></video:view_count>
              <?php endif ?>
              <?php if ($__video->getPublicationDate()): ?>
                  <video:publication_date><?php echo $__video->getPublicationDate()->format('Y-m-d\TH:i:sP') ?></video:publication_date>
              <?php endif ?>
              <video:family_friendly><?php echo $__video->getFamilyFriendly() ? 'yes' : 'no' ?></video:family_friendly>
              <?php if ($__video->getRestriction()): ?>
                  <video:restriction relationship="<?php echo $__video->getRestriction()->getRelationship() ?>"><?php echo $__video->getRestriction()->getCountries() ?></video:restriction>
              <?php endif ?>
              <?php if ($__video->getGalleryLocation()): ?>
                  <video:gallery_loc><?php echo htmlspecialchars($__video->getGalleryLocation()) ?></video:gallery_loc>
              <?php endif ?>
              <?php foreach ($__video->getPrices() as $__price): ?>
                  <video:price
                          currency="<?php echo $__price->getCurrency() ?>"
                      <?php if ($__price->getResolution()): ?> resolution="<?php echo $__price->getResolution() ?>" <?php endif ?>
                      <?php if ($__price->getType()): ?> type="<?php echo $__price->getType() ?>" <?php endif ?>><?php echo $__price->getPrice() ?></video:price>
              <?php endforeach ?>
              <video:requires_subscription><?php echo $__video->getRequiresSubscription() ? 'yes' : 'no' ?></video:requires_subscription>
              <?php if ($__video->getUploader()): ?>
                  <video:uploader><?php echo htmlspecialchars($__video->getUploader()) ?></video:uploader>
              <?php endif ?>
              <video:live><?php echo $__video->getLive() ? 'yes' : 'no' ?></video:live>
          </video:video>
      <?php endforeach ?>
  </url>
  <?php endforeach ?>
</urlset>
