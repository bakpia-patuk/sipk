<!-- Page scroll, tooltips, multibox, and ie6 warning -->	
<!-- Start compression if enabled -->	
<div id="s5_scroll_wrap" class="s5_wrap">
	<script type="text/javascript">
		function s5_scrollit() { new SmoothScroll({ duration: 800 }); }
		function s5_scrollitload() {s5_scrollit();}
		window.setTimeout(s5_scrollitload,400);
	</script>
	<a href="#s5_scrolltotop" class="s5_scrolltotop"></a>
</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/tooltips.js'); ?>"></script>

<script type="text/javascript">
	window.addEvent('domready',function() {
		$$('.s5mb').each(function(z,i){if(!$(z).getAttribute('rel'))$(z).setAttribute('rel','[me]');});
	});
	var s5mbox = {};
	window.addEvent('domready', function() {
		window.s5mbox = new multiBox({
			mbClass: '.s5mb',//class you need to add links that you want to trigger multiBox with (remember and update CSS files)
			container: $(document.body),//where to inject multiBox
			path: '<?php echo base_url('multibox'); ?>',//path to mp3player and flvplayer etc
			useOverlay: true,//detect overlay setting
			maxSize: {w:600, h:400},//max dimensions (width,height) - set to null to disable resizing
			movieSize: {w:400, h:300},
			addDownload: false,//do you want the files to be downloadable?
			descClassName: 's5_multibox',//the class name of the description divs
			pathToDownloadScript: '<?php echo base_url('js/multibox/forceDownload.asp'); ?>',//if above is true, specify path to download script (classicASP and ASP.NET versions included)
			addRollover: true,//add rollover fade to each multibox link
			addOverlayIcon: false,//adds overlay icons to images within multibox links
			addChain: false,//cycle through all images fading them out then in
			recalcTop: true,//subtract the height of controls panel from top position
			addTips: true,//adds MooTools built in 'Tips' class to each element (see: http://mootools.net/docs/Plugins/Tips)
			autoOpen: 0//to auto open a multiBox element on page load change to (1, 2, or 3 etc)
		});
	});
	Eventx.onResizend(function(){		
		s5mbox.resize(); 
	});
</script>

<script type="text/javascript">
//<![CDATA[
	var s5_lazyload = "all";
//]]>
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/lazy_load.js'); ?>"></script>			
		
<script type="text/javascript">
//<![CDATA[
	var s5_resize_columns = "all";
	var s5_resize_columns_delay = "500";
	var s5_resize_columns_small_tablets = "default";
//]]>
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('js/s5_columns_equalizer.js'); ?>"></script>	
<!-- Additional scripts to load just before closing body tag -->

<!-- Info Slide script - JS and CSS called in header -->
<script type='text/javascript'>
	$$('.s5_is_slide').each(function(item,index){item.wrapInner(new Element('div',{'class':'s5_is_display'}));});  
	var options = {wrapperId:"s5_body"};
	new Slidex(options);
</script>

<!-- File compression. Needs to be called last on this file -->	

<!-- Responsive Bottom Mobile Bar -->
<!-- Call bottom bar for mobile devices if layout is responsive -->	
<div id="s5_responsive_mobile_bottom_bar_outer" style="display:none">
	<div id="s5_responsive_mobile_bottom_bar" class="s5_responsive_mobile_bar_light">
		<!-- Call mobile links if links are enabled and cookie is currently set to mobile -->	
		<div id="s5_responsive_switch_mobile">
			<a id="s5_responsive_switch" href="<?php echo site_url(); ?>/?s5_responsive_switch_wwwshape5comdemovertex=0">Desktop Version</a>
		</div>
		<div id="s5_responsive_mobile_scroll">
			<a href="#s5_scrolltotop" class="s5_scrolltotop"></a>
		</div>
		<div style="clear:both;height:0px"></div>
	</div>
</div>

<!-- Call bottom bar for all devices if user has chosen to see desktop version -->