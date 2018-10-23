<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <?php foreach ($tags as $tag): ?>
    <url>
      <loc><?php echo $tag->getLocation() ?></loc>
      <?php if ($lastModified = $tag->getLastModified()): ?>
        <lastmod><?php echo $lastModified->format(DateTimeInterface::ATOM) ?></lastmod>
      <?php endif ?>
      <?php if ($priority = $tag->getPriority()): ?>
        <priority><?php echo $priority ?></priority>
      <?php endif ?>
      <?php if ($changeFrequency = $tag->getChangeFrequency()): ?>
        <changefreq><?php echo $changeFrequency ?></changefreq>
      <?php endif ?>
      <?php if ($expired = $tag->getExpired()): ?>
        <expires><?php echo $expired->format(DateTimeInterface::ATOM) ?></expires>
      <?php endif; ?>
    </url>
  <?php endforeach ?>
</urlset>
