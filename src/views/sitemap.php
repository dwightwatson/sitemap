<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <?php foreach ($__tags as $__tag): ?>
    <url>
      <loc><?php echo $__tag->getLocation() ?></loc>
      <?php if ($__tag->getLastModified()): ?>
        <lastmod><?php echo $__tag->getLastModified()->format('Y-m-d\TH:i:sP') ?></lastmod>
      <?php endif ?>
      <?php if ($__tag instanceof \Watson\Sitemap\Tags\Tag): ?>
        <?php if ($__tag->getPriority()): ?>
          <priority><?php echo $__tag->getPriority() ?></priority>
        <?php endif ?>
        <?php if ($__tag->getChangeFrequency()): ?>
          <changefreq><?php echo $__tag->getChangeFrequency() ?></changefreq>
        <?php endif ?>
      <?php endif; ?>
      <?php if ($__tag instanceof \Watson\Sitemap\Tags\ExpiredTag): ?>
        <expires><?php echo $__tag->getExpired()->format('Y-m-d\TH:i:sP') ?></expires>
      <?php endif; ?>
    </url>
  <?php endforeach ?>
</urlset>
