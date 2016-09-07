<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach ($tags as $tag): ?>
    <url>
      <loc><?php echo htmlspecialchars($tag->getLocation(), ENT_XML1) ?></loc>
      <?php if ($tag->getLastModified()): ?>
        <lastmod><?php echo $tag->getLastModified()->format('Y-m-d\TH:i:sP') ?></lastmod>
      <?php endif ?>
      <?php if ($tag instanceof \Watson\Sitemap\Tags\Tag): ?>
        <?php if ($tag->getPriority()): ?>
          <priority><?php echo $tag->getPriority() ?></priority>
        <?php endif ?>
        <?php if ($tag->getChangeFrequency()): ?>
          <changefreq><?php echo $tag->getChangeFrequency() ?></changefreq>
        <?php endif ?>
      <?php endif ?>
      <?php if ($tag instanceof \Watson\Sitemap\Tags\MultilingualTag): ?>
        <?php foreach ($tag->getMultilingual() as $lang => $href): ?>
          <xhtml:link rel="alternate" hreflang="<?php echo $lang ?>" href="<?php echo $href ?>" />
        <?php endforeach;?>
      <?php endif ?>
      <?php if ($tag instanceof \Watson\Sitemap\Tags\ExpiredTag): ?>
        <expires><?php echo $tag->getExpired()->format('Y-m-d\TH:i:sP') ?></expires>
      <?php endif ?>
    </url>
  <?php endforeach ?>
</urlset>
