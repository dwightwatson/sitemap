<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($sitemaps as $sitemap): ?>
  <sitemap>
    <loc><?= $sitemap->getLocation() ?></loc>
    <?php if ($sitemap->getLastModified()): ?>
      <lastmod><?= $sitemap->getLastModified()->format('Y-m-d\TH:i:sP') ?></lastmod>
    <?php endif; ?>
  </sitemap>
  <?php endforeach ?>
</sitemapindex>
