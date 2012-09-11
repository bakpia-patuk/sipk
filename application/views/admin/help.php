<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<title>SIPK Help</title>
		<?php
			if (isset($extraCSS)) {
				echo $extraCSS;
			}
		?>
	</head>
	<body>
		<a name="Top" id="Top"></a>
		<script type="text/javascript">
			//<![CDATA[
			if (window.showTocToggle) { var tocShowText = "show"; var tocHideText = "hide"; showTocToggle(); } 
			//]]>
		</script>
		
		<?php echo $this->load->view($topic); ?>
		
		<hr />
		<a href="#Top">Top</a>
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			var pageTracker = _gat._getTracker("UA-544070-3");
			pageTracker._initData();
			pageTracker._setDomainName("joomla.org");
			pageTracker._trackPageview();
		</script>
	</body>
</html>