<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<meta name="author" content="David CM" />
<meta name="description" content="<?php if(isset($description_for_layout)){echo $description_for_layout; }?>" />
<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords; }?>" />
<meta name="msvalidate.01" content="D7113C79B02261D9D17701F3276F7650" />
<meta property="fb:app_id" content="567534933358679"/>
<?php if (isset($robots)) { ?>
    <meta name="robots" content="<?php echo $robots; ?>">
<?php } ?>
<?php if (isset($jsonld)) { ?>
    <?php echo $jsonld; ?>
<?php } ?>
<?php if (isset($video->slug_titulo)) { ?>
    <link rel="amphtml" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/amp/videos/misterio/<?php echo $video->slug_titulo; ?>">
<?php } ?>
<?php var_dump($categoriaAlias); ?>
<?php if (isset($categoriaAlias)) { ?>
    <link rel="amphtml" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/amp/categoria/index/<?php echo $categoriaAlias; ?>">
<?php } ?>
<?php if(isset($snippetTitle)) { ?>
    <meta property="og:site_name" content="Videos de misterio" />
    <meta property="og:type" content="article" />
    <?php if(isset($snippetTitle) && !empty($snippetTitle)) { ?>
        <meta property="og:title" content="<?php echo $snippetTitle; ?>" />
    <?php } ?>
    <?php if(isset($snippetDescription) && !empty($snippetDescription)) { ?>
        <meta property="og:description" content="<?php echo $snippetDescription; ?>" />
    <?php } ?>
    <?php if(isset($urlAcesso) && !empty($urlAcesso)) { ?>
        <meta property="og:url" content="http://www.videosmisterio.com<?php echo $urlAcesso; ?>" />
    <?php } ?>
    <?php if(isset($snippetEnlaceImagen) && !empty($snippetEnlaceImagen)) { ?>
        <meta property="og:image" content="<?php echo $snippetEnlaceImagen; ?>" />
    <?php } ?>
    <?php if(isset($tagVideo) && !empty($tagVideo)) { ?>
        <meta property="article:tag" content="<?php echo $tagVideo; ?>" />
    <?php } ?>
    
    <meta property="article:publisher" content="https://www.facebook.com/videosmisterio" />
    <meta name="twitter:card" content="summary_large_image" />
    <?php if(isset($snippetTitle) && !empty($snippetTitle)) { ?>
        <meta name="twitter:title" content="<?php echo $snippetTitle; ?>" />
    <?php } ?>
    <?php if(isset($snippetDescription) && !empty($snippetDescription)) { ?>
        <meta name="twitter:description" content="<?php echo $snippetDescription; ?>" />
    <?php } ?>
    <?php if(isset($urlAcesso) && !empty($urlAcesso)) { ?>
        <meta name="twitter:url" content="http://www.videosmisterio.com<?php echo $urlAcesso; ?>" />
    <?php } ?>
    <?php if(isset($snippetEnlaceImagen) && !empty($snippetEnlaceImagen)) { ?>
        <meta name="twitter:image" content="<?php echo $snippetEnlaceImagen; ?>" />
    <?php } ?>
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Videos Misterio" />
    <meta name="twitter:label2" content="Filed under" />
    <?php if(isset($tagVideo) && !empty($tagVideo)) { ?>
        <meta name="twitter:data2" content="<?php echo $tagVideo; ?>" />
    <?php } ?>
    <meta name="twitter:site" content="@VideosMisterio" />
<?php } ?>
<?= $this->Html->css('main.min', ['async']) ?>
<!-- Hotjar Tracking Code for www.videosmisterio.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:352840,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>