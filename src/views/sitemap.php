<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
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
    <?php endforeach;?>
    <?php endif ?>
    <?php if ($__tag instanceof \Watson\Sitemap\Tags\ExpiredTag): ?>
    <expires><?php echo $__tag->getExpired()->format('Y-m-d\TH:i:sP') ?></expires>
    <?php endif ?>
  </url>
  <?php endforeach ?>
</urlset>
