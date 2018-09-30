<!DOCTYPE HTML>
<html lang="es-ES">
	<head>
		<title><?php if (isset($title_for_layout)) echo $title_for_layout; ?></title>
		<?php if (isset($canonical) && !empty($canonical)) { ?>
			<link rel="canonical" href="<?php echo $canonical; ?>"/>
		<?php } ?>
		<?= $this->element('metaDatos'); ?>
	</head>
	<body>
		<div id="page-wrapper">
			<!-- Header -->
            <?= $this->element('header'); ?>
			<!-- Content -->
			<?= $this->fetch('content'); ?>
			<!-- Footer -->
            <?= $this->element('footer'); ?>
	</body>
</html>
