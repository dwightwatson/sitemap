<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <?php foreach ($tags as $tag): ?>
    <url>
      <loc><?= $tag['loc'] ?></loc>
      <?php if ($tag['lastmod']): ?>
        <lastmod><?= date('Y-m-d\TH:i:sP', strtotime($tag['lastmod'])) ?></lastmod>
      <?php endif ?>
      <?php if ($tag['changefreq']): ?>
        <changefreq><?= $tag['changefreq'] ?></changefreq>
      <?php endif ?>
      <?php if ($tag['priority']): ?>
        <priority><?= $tag['priority'] ?></priority>
      <?php endif ?>
    </url>
  <?php endforeach ?>
</urlset>
