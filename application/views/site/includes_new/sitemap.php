<?php header("Content-type: text/xml; charset=utf-8"); ?>
<?= '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

<url>
  <loc><?php echo base_url();?></loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>

<url>
  <loc><?php echo base_url();?>sobre</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>servicos</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>parceiros</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>cotacao</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>noticias</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>galeria</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>videos</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>curriculo</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>
<url>
  <loc><?php echo base_url();?>contato</loc>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>

<?php foreach ($sitemap as $map) {
 
?>
<url>
  <loc><?php echo base_url();?>noticias/info/<?php echo url_title($map->titulo).'/'.$map->id;?></loc>
  <changefreq>daily</changefreq>
  <priority>1.0</priority>
</url>

<?php }?>

<?php foreach ($especialidades as $esp) {
 
?>
<url>
  <loc><?php echo base_url();?>servicos/em/<?php echo url_title($esp->titulo).'/'.$esp->id;?></loc>
  <changefreq>daily</changefreq>
  <priority>1.0</priority>
</url>

<?php }?>


</urlset>
</sitemapindex>

