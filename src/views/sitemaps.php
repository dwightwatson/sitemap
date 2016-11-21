<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($__sitemaps as $__sitemap): ?>
  <sitemap>
    <loc><?php echo htmlspecialchars($__sitemap->getLocation(), ENT_XML1) ?></loc>
    <?php if ($__sitemap->getLastModified()): ?>
    <lastmod><?php echo $__sitemap->getLastModified()->format('Y-m-d\TH:i:sP') ?></lastmod>
    <?php endif ?>
  </sitemap>
  <?php endforeach ?>
</sitemapindex>
