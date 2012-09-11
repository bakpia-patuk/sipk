<div id="s5_header_area1">		
	<div id="s5_header_area2">	
		<div id="s5_header_area_inner" class="s5_wrap">		
			<div id="s5_header_area_inner2">	
				<div id="s5_header_wrap">

					<img alt="logo" style="height:130px;width:400px" src="<?php echo base_url('images/s5_logo.png'); ?>" id="s5_logo" onclick="window.document.location.href='http://www.shape5.com/demo/vertex/'">
					
					<div id="s5_banner" style="padding-left:410px">
						<div class="bannergroup">

							<div class="banneritem">
								<a href="http://www.shape5.com/demo/vertex/index.php/component/banners/click/9" target="_blank" title="Demo Banner">
									<img src="configuring-the-template_files/osmbanner1.png" alt="" height="60" width="468">
								</a>
								<div class="clr"></div>
							</div>

						</div>

					</div>
					
					<div style="clear:both; height:0px"></div>			
				</div>

				<div id="s5_menu_wrap">
					<ul id="s5_nav" class="menu">
						<li class="active">
							<span class="s5_level1_span1">
								<span class="s5_level1_span2">
									<a href="<?php echo site_url(); ?>">Home</a>
									<span onclick='window.document.location.href="<?php echo site_url(); ?>"' class="S5_parent_subtext">Home</span>
								</span>
							</span>
						</li>
						<li>
							<span class="s5_level1_span1">
								<span class="s5_level1_span2">
									<a href="<?php echo site_url('sekolah'); ?>">Informasi</a>
									<span onclick='window.document.location.href="<?php echo site_url('sekolah'); ?>"' class="S5_parent_subtext">Informasi Pendidikan & Kesehatan</span>
								</span>
							</span>
						</li>
						<li>
							<span class="s5_level1_span1">
								<span class="s5_level1_span2">
									<a href="<?php echo site_url('artikel'); ?>">Artikel</a>
									<span onclick='window.document.location.href="<?php echo site_url('artikel'); ?>"' class="S5_parent_subtext">Artikel</span>
								</span>
							</span>
						</li>
						<li>
							<span class="s5_level1_span1">
								<span class="s5_level1_span2">
									<a href="<?php echo site_url('about_us'); ?>">About Us</a>
									<span onclick='window.document.location.href="<?php echo site_url('about_us'); ?>"' class="S5_parent_subtext">Find Help Here</span>
								</span>
							</span>
						</li>
					</ul>
					<div id="s5_search">
						<div class="moduletable">

							<script type="text/javascript">
							//<![CDATA[
								window.addEvent('domready', function() {
									var value;

									// Set the input value if not already set.
									if (!document.id('mod-finder-searchword').getProperty('value')) {
										document.id('mod-finder-searchword').setProperty('value', 'Search...');
									}

									// Get the current value.
									value = document.id('mod-finder-searchword').getProperty('value');

									// If the current value equals the default value, clear it.
									document.id('mod-finder-searchword').addEvent('focus', function() {
										if (this.getProperty('value') == 'Search...') {
											this.setProperty('value', '');
										}
									});

									// If the current value is empty, set the previous value.
									document.id('mod-finder-searchword').addEvent('blur', function() {
										if (!this.getProperty('value')) {
											this.setProperty('value', value);
										}
									});

									document.id('mod-finder-searchform').addEvent('submit', function(e){
										e = new Event(e);
										e.stop();

										// Disable select boxes with no value selected.
										if (document.id('mod-finder-advanced') != null) {
											document.id('mod-finder-advanced').getElements('select').each(function(s){
												if (!s.getProperty('value')) {
													s.setProperty('disabled', 'disabled');
												}
											});
										}

										document.id('mod-finder-searchform').submit();
									});

									/*
									 * This segment of code sets up the autocompleter.
									 */
									var url = '/demo/vertex/index.php/component/finder/?task=suggestions.display&format=json&tmpl=component';
									var ModCompleter = new Autocompleter.Request.JSON(document.id('mod-finder-searchword'), url, {'postVar': 'q'});
								});
							//]]>
							</script>

							<form id="mod-finder-searchform" action="/demo/vertex/index.php/component/finder/search" method="get">
								<div class="finder">
									<label for="mod-finder-searchword" class="finder">Search</label>
									<br>
									<input autocomplete="off" name="q" id="mod-finder-searchword" class="inputbox" size="25" value="Search..." type="text">
									<button class="button finder" type="submit">Go</button>
									<input name="Itemid" value="130" type="hidden">
								</div>
							</form>
						</div>

					</div>
					<div style="clear:both; height:0px"></div>
				</div>
			
				<div id="s5_breadcrumb_fonts_wrap">
					<div id="s5_breadcrumb_wrap">
						<div class="moduletable">
							<div class="breadcrumbs">
								<span class="showHere">You are here: </span>
								<a href="<?php echo base_url(); ?>" class="pathway">Home</a> //  <img src="<?php echo base_url('images/arrow.png'); ?>" alt="">
								<a href="javascript:;" class="pathway">Informasi Pendidikan</a> //  <img src="<?php echo base_url('images/arrow.png'); ?>" alt="">
								<span>Sekolah</span>
							</div>
						</div>
					</div>
							
					<div id="s5_social_wrap1">
						<div id="s5_social_wrap_inner">
				
							<div id="s5_facebook" onclick="window.open('javascript:;')"></div>
							<div id="s5_google" onclick="window.open('javascript:;')"></div>
							<div id="s5_twitter" onclick="window.open('javascript:;')"></div>
							<div id="s5_linked_in" onclick="window.open('javascript:;')"></div>
							<div id="s5_rss" onclick="window.open('javascript:;')"></div>

							<div id="s5_loginreg">	
								<div id="s5_logregtm">
									<a href="<?php echo site_url('login'); ?>" id="s5_login">Login</a>
									<a href="<?php echo site_url('login/register'); ?>" id="s5_register">Register</a>
								</div>
							</div>
													
							<div id="fontControls"></div>
												
						</div>
					</div>
						
					<div style="clear:both;height:0px"></div>
				</div>

			</div>
		</div>
	</div>
</div>