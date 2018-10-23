<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($sitemaps as $sitemap): ?>
  <sitemap>
    <loc><?php echo htmlspecialchars($sitemap->getLocation(), ENT_XML1) ?></loc>
    <?php if ($sitemap->getLastModified()): ?>
      <lastmod><?php echo $sitemap->getLastModified()->format(DateTimeInterface::ATOM) ?></lastmod>
    <?php endif; ?>
  </sitemap>
  <?php endforeach ?>
</sitemapindex>
