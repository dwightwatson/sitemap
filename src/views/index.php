<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($tags as $tag): ?>
  <sitemap>
    <loc><?php echo htmlspecialchars($tag->getLocation(), ENT_XML1) ?></loc>
    <?php if ($tag->getLastModified()): ?>
      <lastmod><?php echo $tag->getLastModified()->format(DateTimeInterface::ATOM) ?></lastmod>
    <?php endif; ?>
  </sitemap>
  <?php endforeach ?>
</sitemapindex>
