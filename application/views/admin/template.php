<?php
	header('HTTP/1.0 200 OK'); // stoopid IIS
	header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="robots" content="index, follow" />
        <link href="<?php echo base_url('favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon">
		<title>SIPK Administration | <?php echo $title; ?></title>
		
		<link rel="stylesheet" href="<?php echo base_url('css/admin/core.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('css/admin/core-gecko.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('css/admin/menu.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('css/admin/colors.css.php'); ?>" type="text/css" />
        
		<?php
			if (isset($extraCSS)) {
				echo $extraCSS;
			}
		?>
        <script src="<?php echo base_url('js/core.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/mootools-core.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/mootools-more.js'); ?>" type="text/javascript"></script>
		<?php
			if (isset($extraJS)) {
				echo $extraJS;
			}
		?>

	</head>
	<body id="mc-standard" class="transitions-enabled headers-fancy extendmenu-off menuwidth-small width-variable avatar-1 ltr option-com-content task-add view-">
		<div id="mc-frame">
			<div id="mc-header">
				<?php $this->load->view('admin/header'); ?>
			</div>
			<div id="mc-body">
				<?php $this->load->view($content); ?>
			</div>
			<div id="mc-footer">
				<?php $this->load->view('admin/footer'); ?>
			</div>
			<div id="mc-message"></div>
		</div>
	</body>
</html>
