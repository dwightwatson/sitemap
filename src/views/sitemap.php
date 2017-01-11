<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"<?php if ($__hasImages): ?> xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"<?php endif ?><?php if ($__isMultilingual): ?> xmlns:xhtml="http://www.w3.org/1999/xhtml"<?php endif ?>>
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
    <?php if ($__tag instanceof \Watson\Sitemap\Tags\NewsTag): ?>
    <?php /** @var $__tag \Watson\Sitemap\Tags\NewsTag */ ?>
	    <news:news>
	      <news:publication>
	      	<?php if ($__tag->getPublicationName()): ?>
	        <news:name><?php echo htmlspecialchars($__tag->getPublicationName()) ?></news:name>
	        <?php endif ?>
	        <?php if ($__tag->getPublicationLanguage()): ?>
	        <news:language><?php echo htmlspecialchars($__tag->getPublicationLanguage()) ?></news:language
	        <?php endif ?>>
	      </news:publication>
	      <?php if (!empty($__tag->getGenres())) : ?>
	      <news:genres><?php echo htmlspecialchars($__tag->getGenres()) ?></news:genres>
	      <?php endif ?>
	      <?php if ($__tag->getPublicationDate()) : ?>
	      <news:publication_date><?php echo htmlspecialchars($__tag->getPublicationDate()) ?></news:publication_date>
	      <?php endif ?>
	      <?php if ($__tag->getTitle()) : ?>
	      <news:title><?php echo htmlspecialchars($__tag->getTitle()) ?></news:title>
	      <?php endif ?>
	      <?php if (!empty($__tag->getKeywords())) : ?>
	      <news:keywords><?php echo htmlspecialchars($__tag->getKeywords()) ?></news:keywords>
	      <?php endif ?>
	      <?php if (!empty($__tag->getStockTickers())) : ?>
	      <news:stock_tickers><?php echo htmlspecialchars($__tag->getStockTickers()) ?></news:stock_tickers>
	      <?php endif ?>
	    </news:news>
    <?php endif ?>
  </url>
  <?php endforeach ?>
</urlset>
