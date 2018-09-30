<?php use Cake\Routing\Router; ?>
<?php use Cake\View\Helper\TimeHelper; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    <?php foreach ($videos as $video): ?>
    <url>
        <loc><?php echo Router::url('http://www.videosmisterio.com/videos/misterio/' . $video->slug_titulo); ?></loc>
        <lastmod><?php echo $this->Time->toAtom($video->modified); ?></lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>
</urlset>