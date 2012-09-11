<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB" lang="en-GB">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Home</title>
		<link href="<?php echo site_url(); ?>?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
		<link href="<?php echo site_url(); ?>?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
		
		<link href="<?php echo base_url('favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon" />
		
		<link rel="stylesheet" href="<?php echo base_url('css/finder.css'); ?>" type="text/css" />
		
		<script src="<?php echo base_url('js/mootools-core.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/core.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/mootools-more.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/autocompleter.js'); ?>" type="text/javascript"></script>
		
		<script type="text/javascript">
			window.addEvent('load', function() {
				new JCaption('img.caption');
			});
			function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(840000); });
		</script>

		<script type="text/javascript">
			var s5_multibox_path = "";
		</script>

		<meta http-equiv="Content-Type" content="text/html;" />
		<meta http-equiv="Content-Style-Type" content="text/css" />

		<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=no;" />

		<script type="text/javascript">
		//<![CDATA[
			window.addEvent('domready', function() {
				var myMenu = new MenuMatic({
					effect:"slide & fade",
					duration:1000,
					physics: Fx.Transitions.Pow.easeOut,
					hideDelay:500,
					orientation:"horizontal",
					tweakInitial:{x:0, y:0},
					direction:{
						x: 'right',
						y: 'down'
					},
					opacity:100
				});
			});		
		//]]>	
		</script>    
		<!-- Css and js addons for vertex features -->	
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald" />
		<style type="text/css"> 
			/* MAX IMAGE WIDTH */

			img {
				height:auto !important;
				max-width:100% !important;
				-webkit-box-sizing: border-box !important; /* Safari/Chrome, other WebKit */
				-moz-box-sizing: border-box !important;    /* Firefox, other Gecko */
				box-sizing: border-box !important;         /* Opera/IE 8+ */
			}

			.full_width {
				width:100% !important;
				-webkit-box-sizing: border-box !important; /* Safari/Chrome, other WebKit */
				-moz-box-sizing: border-box !important;    /* Firefox, other Gecko */
				box-sizing: border-box !important;         /* Opera/IE 8+ */
			}

			#s5_responsive_modile_drop_down_wrap input {
				width:96% !important;
			}
			#s5_responsive_mobile_drop_down_search input {
				width:100% !important;
			}

			@media screen and (max-width: 750px){
				body {
					height:100% !important;
					position:relative !important;
					padding-bottom:48px !important;
				}
			}

			#s5_responsive_mobile_bottom_bar, #s5_responsive_mobile_top_bar {
				background:#0B0B0B;
				background: -moz-linear-gradient(top, #272727 0%, #0B0B0B 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#272727), color-stop(100%,#0B0B0B)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top, #272727 0%,#0B0B0B 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top, #272727 0%,#0B0B0B 100%); /* Opera11.10+ */
				background: -ms-linear-gradient(top, #272727 0%,#0B0B0B 100%); /* IE10+ */
				background: linear-gradient(top, #272727 0%,#0B0B0B 100%); /* W3C */
				font-family: Oswald !important;
			}
				
			.s5_responsive_mobile_drop_down_inner, .s5_responsive_mobile_drop_down_inner input, .s5_responsive_mobile_drop_down_inner button, .s5_responsive_mobile_drop_down_inner .button, #s5_responsive_mobile_drop_down_search .validate {
				font-family: Oswald !important;
			}
				
			.s5_responsive_mobile_drop_down_inner button:hover, .s5_responsive_mobile_drop_down_inner .button:hover {
				background:#0B0B0B !important;
			}
				
			#s5_responsive_mobile_drop_down_menu, #s5_responsive_mobile_drop_down_menu a, #s5_responsive_mobile_drop_down_login a {
				font-family: Oswald !important;
				color:#FFFFFF !important;
			}
				
			#s5_responsive_mobile_bar_active, #s5_responsive_mobile_drop_down_menu .current a, .s5_responsive_mobile_drop_down_inner .s5_mod_h3, .s5_responsive_mobile_drop_down_inner .s5_h3_first {
				color:#73A0CF !important;
			}
				
			.s5_responsive_mobile_drop_down_inner button, .s5_responsive_mobile_drop_down_inner .button {
				background:#73A0CF !important;
			}
				
			#s5_responsive_mobile_drop_down_menu .active ul li, #s5_responsive_mobile_drop_down_menu .current ul li a, #s5_responsive_switch_mobile a, #s5_responsive_switch_desktop a, #s5_responsive_modile_drop_down_wrap {
				color:#FFFFFF !important;
			}
				
			#s5_responsive_mobile_toggle_click_menu span {
				border-right:solid 1px #272727;
			}

			#s5_responsive_mobile_toggle_click_menu {
				border-right:solid 1px #0B0B0B;
			}

			#s5_responsive_mobile_toggle_click_search span, #s5_responsive_mobile_toggle_click_register span, #s5_responsive_mobile_toggle_click_login span, #s5_responsive_mobile_scroll a {
				border-left:solid 1px #272727;
			}

			#s5_responsive_mobile_toggle_click_search, #s5_responsive_mobile_toggle_click_register, #s5_responsive_mobile_toggle_click_login, #s5_responsive_mobile_scroll {
				border-left:solid 1px #0B0B0B;
			}

			.s5_responsive_mobile_open, .s5_responsive_mobile_closed:hover, #s5_responsive_mobile_scroll:hover {
				background:#272727;
			}

			#s5_responsive_mobile_drop_down_menu .s5_responsive_mobile_drop_down_inner, #s5_responsive_mobile_drop_down_register .s5_responsive_mobile_drop_down_inner, #s5_responsive_mobile_drop_down_login .s5_responsive_mobile_drop_down_inner, #s5_responsive_mobile_drop_down_search .s5_responsive_mobile_drop_down_inner {
				background:#272727;
			}

			@media screen and (max-width: 579px){
				#s5_top_row1_area1 {
					display:none;
				}
			}

			.s5_wrap {
				max-width:1300px !important;
			}
				
			@media screen and (min-width: 1300px){
			
				#s5_right_top_wrap {
					width:595.4px !important;
				}
				#s5_right_inset_wrap {
					width:286px !important;
				}
				#s5_right_wrap {
					width:309.4px !important;
				}
				#s5_right_bottom_wrap {
					width:595.4px !important;
				}
				#s5_left_top_wrap {
					width:0px !important;
				}
				#s5_left_inset_wrap {
					width:0px !important;
				}
				#s5_left_wrap {
					width:0px !important;
				}
				#s5_left_bottom_wrap {
					width:0px !important;
				}
				#s5_right_column_wrap {
					width:595.4px !important;
					margin-left:-595.4px !important;
				}
				#s5_left_column_wrap {
					width:0px !important;
					margin-right:-595.4px !important;
				}
				#s5_center_column_wrap_inner {
					margin-left:0px !important;
					margin-right:595.4px !important;
				}
			}

			@media screen and (max-width: 970px){
			
				#s5_right_top_wrap {
					width:238px !important;
				}
				#s5_right_inset_wrap {
					width:238px !important;
				}
				#s5_right_wrap {
					width:238px !important;
				}
				#s5_right_bottom_wrap {
					width:238px !important;
				}
				#s5_left_top_wrap {
					width:0px !important;
				}
				#s5_left_inset_wrap {
					width:0px !important;
				}
				#s5_left_wrap {
					width:0px !important;
				}
				#s5_left_bottom_wrap {
					width:0px !important;
				}
				#s5_right_column_wrap {
					width:238px !important;
					margin-left:-238px !important;
				}
				#s5_left_column_wrap {
					width:0px !important;
					margin-right:-0px !important;
				}
				#s5_center_column_wrap_inner {
					margin-left:0px !important;
					margin-right:238px !important;
				}
			
			}
				
		</style>
		
		<script type="text/javascript">
		//<![CDATA[
		//]]>
		</script>
		
		<script type="text/javascript" src="<?php echo base_url('js/s5_flex_menu.js'); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url('css/s5_flex_menu.css'); ?>" type="text/css" />
			
		<link rel="stylesheet" href="<?php echo base_url('css/system.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('css/general.css'); ?>" type="text/css" />

		<link href="<?php echo base_url('css/template_default.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('css/template.css'); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url('css/com_content.css'); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url('css/editor.css'); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url('css/thirdparty.css'); ?>" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url('css/multibox.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('css/ajax.css'); ?>" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo base_url('js/overlay.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/multibox.js'); ?>"></script>

		<script type="text/javascript" src="<?php echo base_url('js/s5_font_adjuster.js'); ?>"></script>

		<link type="text/css" href="<?php echo base_url('css/s5_responsive_bars.css'); ?>" rel="stylesheet" />
		<link type="text/css" href="<?php echo base_url('css/s5_responsive_hide_classes.css'); ?>" rel="stylesheet" />

		<link type="text/css" href="<?php echo base_url('css/s5_responsive.css'); ?>" rel="stylesheet" />

		<!-- Info Slide Script - Called in header so css validates -->	
		<link href="<?php echo base_url('css/s5_info_slide.css'); ?>" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo base_url('js/s5_info_slide.js'); ?>"></script>

		<!-- File compression. Needs to be called last on this file -->	

		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald" />

		<style type="text/css"> 
			body {font-family: 'Arial',Helvetica,Arial,Sans-Serif ;
				background:#F0F0F0;
			} 

			#s5_search input, #s5_menu_wrap, .s5_mod_h3, #subMenusContainer, h2 {
				font-family: Oswald;
			}

			#s5_menu_wrap, .s5_mod_h3 {
				text-transform:uppercase;
			}

			#s5_header_area_inner2, .module_round_box, .module_round_box-dark, #s5_component_wrap, #s5_footer_area_inner2 {
				-webkit-box-shadow: 0 0px 8px #BDBDBD;
				-moz-box-shadow: 0 0px 8px #BDBDBD;
				box-shadow: 0 0px 8px #BDBDBD; 
			}

			a, .module_round_box .s5_h3_first, .module_round_box-none .s5_h3_first, .module_round_box ul.menu .current a, h2, h4, #s5_md_outer_wrap h3 {
				color:#73A0CF;
			}

			#s5_nav li.active a, #s5_nav li.mainMenuParentBtnFocused a, #s5_nav li:hover a {
				color:#73A0CF;
			}

			.button, li.pagenav-next, li.pagenav-prev, .validate {
				background:#73A0CF;
			}

			#subMenusContainer div.s5_sub_wrap ul, #subMenusContainer div.s5_sub_wrap_rtl ul, #subMenusContainer div.s5_sub_wrap_lower ul, #subMenusContainer div.s5_sub_wrap_lower_rtl ul {
				border-bottom:solid 3px #73A0CF;
			}

			/* k2 stuff */
			div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle, h3.userItemTitle a, #comments-form p, #comments-report-form p, #comments-form span, #comments-form .counter, #comments .comment-author, #comments .author-homepage,
			#comments-form p, #comments-form #comments-form-buttons, #comments-form #comments-form-error, #comments-form #comments-form-captcha-holder {font-family: 'Arial',Helvetica,Arial,Sans-Serif ;} 
				
			.s5_wrap{width:94%;}	
		</style>
	</head>
	<body id="s5_body">

		<div id="s5_scrolltotop"></div>

		<!-- Top Vertex Calls -->
		<!-- Call top bar for mobile devices if layout is responsive -->	
	
		<!-- s5_responsive_mobile_top_bar_spacer must be called to keep a space at the top of the page since s5_responsive_mobile_top_bar_wrap is position absolute. -->	
		<div id="s5_responsive_mobile_top_bar_spacer"></div>

		<!-- s5_responsive_mobile_top_bar_wrap must be called off the page and not with display:none or it will cause issues with the togglers. -->
		<div id="s5_responsive_mobile_top_bar_wrap" style="margin-top:-5000px;position:absolute;z-index:2;top:0px">
		
			<div id="s5_responsive_mobile_top_bar" class="s5_responsive_mobile_bar_light">
				<div id="s5_responsive_mobile_toggle_click_menu" style="display:block;float:left">
					<span></span>
				</div>
				<div id="s5_responsive_mobile_bar_active">
					<span>Home</span>
				</div>
				<div id="s5_responsive_mobile_toggle_click_login" style="display:block;float:right">
					<span></span>
				</div>
				<div id="s5_responsive_mobile_toggle_click_register" style="display:block;float:right">
					<span></span>
				</div>
				<div id="s5_responsive_mobile_toggle_click_search" style="display:block;float:right">
					<span></span>
				</div>
				<div style="clear:both;height:0px"></div>
			</div>

			<div id="s5_responsive_modile_drop_down_wrap" class="s5_responsive_modile_drop_down_wrap_loading">
				<div id="s5_responsive_mobile_drop_down_menu">
					<div class="s5_responsive_mobile_drop_down_inner" style="-webkit-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);-moz-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);">
						<ul class="menu">
							<li class="item-102 current active">
								<a href="<?php echo site_url(); ?>" >Home</a>
							</li>
							<li class="item-111 deeper parent">
                                <span class="image-title">Informasi</span>
								<ul>
									<li class="item-112 deeper parent">
										<span class="image-title">Informasi Pendidikan</span>
										<ul>
                                            <li class="item-211">
												<a href="<?php echo site_url('sekolah'); ?>" >Sekolah</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('perguruan'); ?>" >Perguruan Tinggi</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('kursus'); ?>" >Bimbel/Kursus/Test</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('tips?kategori=pendidikan'); ?>" >Tips Pendidikan</a>
											</li>
										</ul>
									</li>
                                    <li class="item-112 deeper parent">
										<span class="image-title">Informasi Kesehatan</span>
										<ul>
                                            <li class="item-211">
												<a href="<?php echo site_url('kesehatan'); ?>" >Institusi Kesehatan</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('dokter'); ?>" >Dokter</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('obat'); ?>" >Obat</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('obat_herbal'); ?>" >Obat Herbal</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('penyakit'); ?>" >Penyakit</a>
											</li>
                                            <li class="item-211">
												<a href="<?php echo site_url('tips?kategori=kesehatan'); ?>" >Tips Kesehatan</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="item-119 deeper parent">
								<a href="javascript:;" >Artikel</a>
								<ul>
                                    <?php
                                        $kategori = $this->Kategori_Model->getAll();
                                        foreach ($kategori['data'] as $kategori) {
                                    ?>
                                    <li class="item-195">
                                        <a href="<?php echo site_url('artikel?kategori='.$kategori->kategori); ?>"><?php echo $kategori->kategori; ?></a>
                                    </li>
                                    <?php
                                        }
                                    ?>
								</ul>
							</li>
							<li class="item-120 deeper parent">
								<a href="javascript:;" >Company Profile</a>
								<ul>
									<li class="item-124">
										<a href="<?php echo site_url('about_us'); ?>" >About Us</a>
									</li>
									<li class="item-129">
										<a href="<?php echo site_url('contact_us'); ?>" >Contact Us</a>
									</li>
									<li class="item-125">
										<a href="<?php echo site_url('privacy_policy'); ?>" >Privacy Policy</a>
									</li>
								</ul>
							</li>
                            <li class="item-120 deeper parent">
								<a href="javascript:;" >Support</a>
								<ul>
									<li class="item-124">
										<a href="<?php echo site_url('FAQ'); ?>" >FAQ</a>
									</li>
									<li class="item-129">
										<a href="<?php echo site_url('disclaimer'); ?>" >Disclaimer</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				
				<div id="s5_responsive_mobile_drop_down_search">
					<div class="s5_responsive_mobile_drop_down_inner" style="-webkit-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);-moz-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);">
						<form method="post" action="http://www.shape5.com/demo/vertex/">
							<input type="text" onfocus="if (this.value=='Search...') this.value='';" onblur="if (this.value=='') this.value='Search...';" value="Search..." id="s5_responsive_mobile_search" name="searchword"></input>
							<input type="hidden" value="search" name="task"></input>
							<input type="hidden" value="com_search" name="option"></input>
							<input type="hidden" value="1" name="Itemid"></input>
						</form>
					</div>
				</div>
				
				<div id="s5_responsive_mobile_drop_down_login">
					<div class="s5_responsive_mobile_drop_down_inner" id="s5_responsive_mobile_drop_down_login_inner" style="-webkit-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);-moz-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);"></div>
				</div>
				
				<div id="s5_responsive_mobile_login_wrap" style="display:none">
					<div class="module_round_box_outer">
						<div class="module_round_box">
							<div class="s5_module_box_1">
								<div class="s5_module_box_2">
									<div class="s5_mod_h3_outer">
										<h3 class="s5_mod_h3">
											<span class="s5_h3_first">Login </span>
										</h3>
									</div>
									<form action="/demo/vertex/index.php" method="post" id="login-form" >
										<fieldset class="userdata">
											<p id="form-login-username">
												<label for="modlgn-username">User Name</label>
												<input id="modlgn-username" type="text" name="username" class="inputbox"  size="18" />
											</p>
											<p id="form-login-password">
												<label for="modlgn-passwd">Password</label>
												<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18"  />
											</p>
											<p id="form-login-remember">
												<label for="modlgn-remember">Remember Me</label>
												<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
											</p>
											<input type="submit" name="Submit" class="button" value="Log in" />
											<input type="hidden" name="option" value="com_users" />
											<input type="hidden" name="task" value="user.login" />
											<input type="hidden" name="return" value="aW5kZXgucGhwP0l0ZW1pZD0xMDI=" />
											<input type="hidden" name="571722358e6ac5d7f14801e074871dd6" value="1" />
										</fieldset>
										<ul>
											<li>
												<a href="/demo/vertex/index.php/component/users/?view=reset">
												Forgot your password?</a>
											</li>
											<li>
												<a href="/demo/vertex/index.php/component/users/?view=remind">
												Forgot your username?</a>
											</li>
											<li>
												<a href="/demo/vertex/index.php/component/users/?view=registration">Create an account</a>
											</li>
										</ul>
									</form>
									<div style="clear:both; height:0px"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
						
				<div id="s5_responsive_mobile_drop_down_register">
					<div class="s5_responsive_mobile_drop_down_inner" id="s5_responsive_mobile_drop_down_register_inner" style="-webkit-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);-moz-box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.6);"></div>
				</div>
				
				<div id="s5_responsive_mobile_register_wrap" style="display:none">
					<div class="module_round_box_outer">
						<div class="module_round_box">

							<div class="s5_module_box_1">
								<div class="s5_module_box_2">
									<div class="s5_mod_h3_outer">
										<h3 class="s5_mod_h3"><span class="s5_h3_first">S5 </span> Register</h3>
									</div>
									<style>
										.s5_regfloatleft{  float:left;}
									</style>

									<form id="member-registration" action="/demo/vertex/index.php/component/users/" method="post" class="form-validate">

										<div style="width:108px;line-height:31px;" class="s5_regfloatleft">
											<label for="jform_name" id="jform_name-lbl">Name:</label>
										</div>		
										<div class="s5_regfloatleft">
											<input type="text" maxlength="50" class="inputbox required" value="" size="40" id="jform_name" name="jform[name]"/> *
										</div>
										<div style="clear:both;"></div>

										<div style="width:108px;line-height:31px;" class="s5_regfloatleft">
											<label for="jform_username" id="jform_username-lbl">Username:</label>
										</div>
										<div class="s5_regfloatleft">
											<input type="text" maxlength="25" class="inputbox required validate-username" value="" size="40" name="jform[username]" id="jform_username"/> *
										</div>
										<div style="clear:both;"></div>
										<div style="width:108px;line-height:31px;" class="s5_regfloatleft"> 
											<label for="jform_email1" id="jform_email1-lbl">E-mail:</label>
										</div>
										<div class="s5_regfloatleft">
											<input type="text" maxlength="100" class="inputbox required validate-email" value="" size="40" name="jform[email1]" id="jform_email1"/> *
										</div>
										<div style="clear:both;"></div>

										<div style="width:108px;line-height:31px;" class="s5_regfloatleft">
											<label for="jform_email2" id="jform_email2-lbl">Verify E-mail:</label>
										</div>
										<div class="s5_regfloatleft">
											<input type="text" maxlength="100" class="inputbox required validate-email" value="" size="40" name="jform[email2]" id="jform_email2"/> *
										</div>
										<div style="clear:both;"></div>

										<div style="width:108px;line-height:31px;" class="s5_regfloatleft">
											<label for="jform_password1" id="jform_password1-lbl">Password:</label>
										</div>
										<div class="s5_regfloatleft">
											<input type="password" value="" size="40" name="jform[password1]" id="jform_password1" class="inputbox required validate-password"/> *
										</div>
										<div style="clear:both;"></div>

										<div style="width:108px;line-height:31px;" class="s5_regfloatleft">
											<label for="jform_password2" id="jform_password2-lbl">Verify Password:</label>
										</div>
										<div class="s5_regfloatleft">
											<input type="password" value="" size="40" name="jform[password2]" id="jform_password2" class="inputbox required validate-password"/> *
										</div>
										<div style="clear:both;"></div>

										<br/>
										Fields marked with an asterisk (*) are required.	
										<br/><br/>
										<button type="submit" class="button validate">Register</button>
										<input type="hidden" name="option" value="com_users" />
										<input type="hidden" name="task" value="registration.register" />
										<input type="hidden" name="571722358e6ac5d7f14801e074871dd6" value="1" />
									</form>
							
									<div style="clear:both; height:0px"></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<script language="JavaScript" type="text/javascript">
			var s5_responsive_login_url = "";
			var s5_responsive_register_url = "";
		</script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('js/s5_responsive_mobile_bar.js'); ?>"></script>

		<!-- Fixed Tabs -->	

		<!-- Drop Down -->	

		<!-- Body Padding Div Used For Responsive Spacing -->		
		<div id="s5_body_padding">

			<!-- Header -->			
			<div id="s5_header_area1">		
				<div id="s5_header_area2">	
					<div id="s5_header_area_inner" class="s5_wrap">		
						<div id="s5_header_area_inner2">	
							<div id="s5_header_wrap">
								<img alt="logo"  style="height:130px;width:400px" src="<?php echo base_url('images/s5_logo.png'); ?>" id="s5_logo" onclick="window.document.location.href='<?php echo base_url(); ?>'"></img>
								<div id="s5_banner" style="padding-left:410px">
									<div class="bannergroup">
										<div class="banneritem">
											<a href="/demo/vertex/index.php/component/banners/click/9" target="_blank" title="Demo Banner">
												<img src="http://www.shape5.com/demo/vertex/images/banners/osmbanner1.png" alt="Demo Banner" width ="468" height ="60" />
											</a>
											<div class="clr"></div>
										</div>
									</div>
								</div>
								<div style="clear:both; height:0px"></div>			
							</div>
				
							<div id="s5_menu_wrap">
								<ul id='s5_nav' class='menu'>
									<li class='active'>
										<span class='s5_level1_span1'>
											<span class='s5_level1_span2'>
												<a href="<?php echo site_url(); ?>">Home</a>
												<span onclick='window.document.location.href="<?php echo site_url(); ?>"' class='S5_parent_subtext'>Return Home</span>
											</span>
										</span>
									</li>
									<li>
										<span class='s5_level1_span1'>
											<span class='s5_level1_span2'>
												<a href="javascript:;">Informasi</a>
												<span onclick='window.document.location.href="javascript:;"' class='S5_parent_subtext'>Informasi Pendidikan & Kesehatan</span>
											</span>
										</span>
										<ul style='float:left;'>
											<li>
												<span class='S5_submenu_item'>
													<a href="javascript:;">Informasi Pendidikan</a>
												</span>
												<div class='S5_grouped_child_item'>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('sekolah'); ?>">Sekolah</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('perguruan'); ?>">Perguruan Tinggi</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('kursus'); ?>">Bimbel/Kursus/Test</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('tips?kategori=pendidikan'); ?>">Tips Pendidikan</a>
														</span>
													</span>
												</div>
											</li>
										</ul>
										<ul style='float:left;'>
											<li>
												<span class='S5_submenu_item'>
													<a href="javascript:;">Informasi Kesehatan</a>
												</span>
												<div class='S5_grouped_child_item'>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('kesehatan'); ?>">Institusi Kesehatan</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('dokter'); ?>">Dokter</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('obat'); ?>">Obat</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('obat_herbal'); ?>">Obat Herbal</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('penyakit'); ?>">Penyakit</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="<?php echo site_url('tips?kategori=kesehatan'); ?>">Tips Kesehatan</a>
														</span>
													</span>
												</div>
											</li>
										</ul>
                                        <ul style='float:left;'>
											<li>
												<span class='S5_submenu_item'>
													<a href="javascript:;">Kalkulator Kesehatan</a>
												</span>
												<div class='S5_grouped_child_item'>
													<span>
														<span class='S5_submenu_item'>
															<a href="/demo/vertex/index.php/features-mainmenu-47/style-and-layout-options/3rd-party-component-compatible">Institusi Kesehatan</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="/demo/vertex/index.php/features-mainmenu-47/style-and-layout-options/site-shaper-available">Dokter</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="/demo/vertex/index.php/features-mainmenu-47/style-and-layout-options/google-fonts-enabled">Obat</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="/demo/vertex/index.php/features-mainmenu-47/style-and-layout-options/page-row-and-column-widths">Obat Herbal</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="/demo/vertex/index.php/features-mainmenu-47/style-and-layout-options/typography-mainmenu-27">Penyakit</a>
														</span>
													</span>
													<span>
														<span class='S5_submenu_item'>
															<a href="/demo/vertex/index.php/features-mainmenu-47/style-and-layout-options/css-tableless-overrides">Tips Kesehatan</a>
														</span>
													</span>
												</div>
											</li>
										</ul>
									</li>
									<li >
										<span class='s5_level1_span1'>
											<span class='s5_level1_span2'>
												<a href="javascript:;">Artikel</a>
												<span onclick='window.document.location.href="javascript:;"' class='S5_parent_subtext'>Artikel</span>
											</span>
										</span>
										<ul style='float:left;'>
                                            <?php
                                                $kategori = $this->Kategori_Model->getAll();
                                                foreach ($kategori['data'] as $kategori) {
                                            ?>
											<li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('artikel?kategori='.$kategori->kategori); ?>"><?php echo $kategori->kategori; ?></a>
												</span>
											</li>
                                            <?php
                                                }
                                            ?>
										</ul>
									</li>
                                    <li>
										<span class='s5_level1_span1'>
											<span class='s5_level1_span2'>
												<a href="<?php echo site_url(); ?>">Forum</a>
												<span onclick='window.document.location.href="<?php echo site_url(); ?>"' class='S5_parent_subtext'>Forum Komunikasi</span>
											</span>
										</span>
									</li>
                                    <li >
										<span class='s5_level1_span1'>
											<span class='s5_level1_span2'>
												<a href="javascript:;">Company Profile</a>
												<span onclick='window.document.location.href="javascript:;"' class='S5_parent_subtext'>Company Profile</span>
											</span>
										</span>
										<ul style='float:left;'>
											<li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('about_us'); ?>">About Us</a>
												</span>
											</li>
											<li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('contact_us'); ?>">Contact us</a>
												</span>
											</li>
                                            <li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('privacy_policy'); ?>">Privacy Policy</a>
												</span>
											</li>
                                            <li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('admin/admin'); ?>" target="_blank">Site Administrator</a>
												</span>
											</li>
										</ul>
									</li>
                                    <li >
										<span class='s5_level1_span1'>
											<span class='s5_level1_span2'>
												<a href="javascript:;">Support</a>
												<span onclick='window.document.location.href="javascript:;"' class='S5_parent_subtext'>Support System</span>
											</span>
										</span>
										<ul style='float:left;'>
											<li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('FAQ'); ?>">FAQs</a>
												</span>
											</li>
											<li>
												<span class='S5_submenu_item'>
													<a href="<?php echo site_url('disclaimer'); ?>">Disclaimer</a>
												</span>
											</li>
										</ul>
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
												<br />
												<input type="text" name="q" id="mod-finder-searchword" class="inputbox" size="25" value="" />
												<button class="button finder" type="submit">Go</button>
												<input type="hidden" name="Itemid" value="102" />
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
											<span>Home</span>
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
												<a href="/demo/vertex/index.php/component/users/?view=login" id="s5_login">Login</a>
												<a href="/demo/vertex/index.php/component/users/?view=registration" id="s5_register">Register</a>
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
			<!-- End Header -->	
		
			<!-- Top Row1 -->	
			<!--div id="s5_top_row1_area1">
				<div id="s5_top_row1_area2">
					<div id="s5_top_row1_area_inner" class="s5_wrap">
						<div id="s5_top_row1_wrap">
							<div id="s5_top_row1">
								<div id="s5_top_row1_inner">
									<div id="s5_pos_top_row1_1" class="s5_float_left" style="width:25%">
										<div class="module_round_box_outer">
			
											<div class="module_round_box">
												<div class="s5_module_box_1">
													<div class="s5_module_box_2">
														<div class="s5_mod_h3_outer">
															<h3 class="s5_mod_h3"><span class="s5_h3_first">Custom </span> Row Sizes</h3>
														</div>
														<div class="custom" >
															<a href="/demo/vertex/images/vertex_large1.jpg" id="mb1" class="s5mb" title="Image #1:">
																<img style="margin:0px" class="padded" src="/demo/vertex/images/vertex1.jpg" alt=""></img>
															</a>
														</div>
														<div style="clear:both; height:0px"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
													
									<div id="s5_pos_top_row1_2" class="s5_float_left" style="width:25%">
										<div class="module_round_box_outer">
											<div class="module_round_box">

													<div class="s5_module_box_1">
														<div class="s5_module_box_2">
															<div class="s5_mod_h3_outer">
																<h3 class="s5_mod_h3"><span class="s5_h3_first">Color </span> Picker</h3>
															</div>
															<div class="custom">
																<a href="/demo/vertex/images/vertex_large2.jpg" id="mb2" class="s5mb" title="Image #2:">
																	<img style="margin:0px" class="padded" src="/demo/vertex/images/vertex2.jpg" alt=""></img>
																</a>
															</div>
															<div style="clear:both; height:0px"></div>
														</div>
													</div>
												
											</div>
										</div>
									</div>
													
									<div id="s5_pos_top_row1_3" class="s5_float_left" style="width:25%">
										<div class="module_round_box_outer">
											<div class="module_round_box">
												<div class="s5_module_box_1">
													<div class="s5_module_box_2">
														<div class="s5_mod_h3_outer">
															<h3 class="s5_mod_h3"><span class="s5_h3_first">Google </span> Fonts</h3>
														</div>
														<div class="custom"  >
															<a href="/demo/vertex/images/vertex_large3.jpg" id="mb3" class="s5mb" title="Image #3:">
																<img style="margin:0px;" class="padded" src="/demo/vertex/images/vertex3.jpg" alt=""></img>
															</a>
														</div>
														<div style="clear:both; height:0px"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
													
									<div id="s5_pos_top_row1_4" class="s5_float_left" style="width:25%">
										<div class="module_round_box_outer">
											<div class="module_round_box">
												<div class="s5_module_box_1">
													<div class="s5_module_box_2">
														<div class="s5_mod_h3_outer">
															<h3 class="s5_mod_h3"><span class="s5_h3_first">Responsive </span> Options</h3>
														</div>
														<div class="custom"  >
															<a href="/demo/vertex/images/vertex_large4.jpg" id="mb4" class="s5mb" title="Image #4:">
																<img style="margin:0px" class="padded" src="/demo/vertex/images/vertex4.jpg" alt=""></img>
															</a>
														</div>
														<div style="clear:both; height:0px"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
						
									<div style="clear:both; height:0px"></div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div-->
			<!-- End Top Row1 -->	

			<!-- Top Row2 -->	
			<!--div id="s5_top_row2_area1">
				<div id="s5_top_row2_area2">
					<div id="s5_top_row2_area_inner" class="s5_wrap">			
			
						<div id="s5_top_row2_wrap">
							<div id="s5_top_row2">
								<div id="s5_top_row2_inner">					
									<div id="s5_pos_top_row2_1" class="s5_float_left" style="width:100%">

										<div class="module_round_box_outer">
			
											<div class="module_round_box">

												<div class="s5_module_box_1">
													<div class="s5_module_box_2">
														<div class="s5_mod_h3_outer">
															<h3 class="s5_mod_h3"><span class="s5_h3_first">Free </span> Responsive Vertex Template</h3>
														</div>
														<div class="custom">The S5 Vertex Framework is a set of functionality that creates the core logic and structure of a template. The purpose of the S5 Vertex framework is to unify the layouts, designs, and functions that Shape5 has built over the years to create one of the most flexible, robust and powerful template blue prints available! 
														<br /><br />
														<strong>Be sure to resize your browser to see the responsive layout take effect and to view the mobile functionality.</strong>
														<br /><br />
														Some of the great features of S5 Vertext include: Responsive layout, Fixed or Fluid layouts, custom page, row and column widths, an average of 80 module positions giving you an almost unlimited amount of layouts including up to 5 columns, S5 Flex Menu, integrated multibox and tooltips, third party component styling, google font integration, file compression, SEF optimized layout, RTL language support, and so much more! The functionality of the S5 Vertex Framework is endless. Seize the power of this great framework today for your site! <a target="blank" href="http://www.shape5.com/joomla/framework/vertex_framework.html">Read more...</a></div>
														<div style="clear:both; height:0px"></div>
													</div>
												</div>

											</div>
			
										</div>

									</div>
				
									<div style="clear:both; height:0px"></div>
								</div>
							</div>	
						</div>	
					
					</div>
				</div>
			</div-->
			<!-- End Top Row2 -->

			<!-- Top Row3 -->	
			<!-- End Top Row3 -->
		
			<!-- Center area -->
			<?php
				if (isset($center_area)) {
			?>
			<div id="s5_center_area1">
			<div id="s5_center_area2">
			<div id="s5_center_area_inner" class="s5_wrap">
		
				<!-- Above Columns Wrap -->
				<!-- End Above Columns Wrap -->
				
				<!-- Columns wrap, contains left, right and center columns -->
				<div id="s5_columns_wrap">
				<div id="s5_columns_wrap_inner">

					<div id="s5_center_column_wrap">
                        <?php echo $this->load->view($center_area); ?>
					</div>
				
					<!-- Left column -->	
					<!-- End Left column -->
				
					<!-- Right column -->
					<div id="s5_right_column_wrap" class="s5_float_left" style="width:238px; margin-left:-238px">
					<div id="s5_right_column_wrap_inner">
						<?php echo $this->load->view($right_column); ?>
					</div>
					</div>
					<!-- End Right column -->	
					
				</div>
				</div>
				<!-- End columns wrap -->
				
				<!-- Below Columns Wrap -->
				<!-- End Below Columns Wrap -->
				
			</div>
			</div>
			</div>
			<?php
				}
			?>
			<!-- End Center area -->	
		
			<!-- Bottom Row1 -->
			<?php
				if (isset($bottom_row_1)) {
			?>
			<div id="s5_bottom_row1_area1">
            <div id="s5_bottom_row1_area2">
            <div id="s5_bottom_row1_area_inner" class="s5_wrap">

                <div id="s5_bottom_row1_wrap">
                    <div id="s5_bottom_row1">
                        <?php
                            echo $this->load->view($bottom_row_1);
                        ?>
                    </div>
                </div>

            </div>
            </div>
			</div>
			<?php
				}
			?>
			<!-- End Bottom Row1 -->	

			<!-- Bottom Row2 -->	
			<!--div id="s5_bottom_row2_area1">
				<div id="s5_bottom_row2_area2">
					<div id="s5_bottom_row2_area_inner" class="s5_wrap">
					
						<div id="s5_bottom_row2_wrap">
							<div id="s5_bottom_row2">
								<div id="s5_bottom_row2_inner">
								
									<div id="s5_pos_bottom_row2_1" class="s5_float_left" style="width:100%">
										<div class="module_round_box_outer">
											<div class="module_round_box-dark">
												<div class="s5_module_box_1">
													<div class="s5_module_box_2">
														<div class="s5_mod_h3_outer">
															<h3 class="s5_mod_h3"><span class="s5_h3_first">Site </span> Shaper Available</h3>
														</div>
														<div class="custom-dark"  >
															<p>Do you need a website up and running quickly? Then a site shaper is just what you are looking for. A Site Shaper is a quick and easy way to get your site looking just like our demo in just minutes! It includes Joomla itself, this template and any extensions that you see on this demo. It also installs the same module and article content, making an exact copy of this demo with very little effort. <a href="/demo/vertex/index.php/tutorials-mainmenu-48/site-shaper-setup">Learn More...</a></p>
														</div>
														<div style="clear:both; height:0px"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div style="clear:both; height:0px"></div>
									
								</div>
							</div>	
						</div>
						
					</div>
				</div>
			</div-->
			<!-- End Bottom Row2 -->

			<!-- Bottom Row3 -->	
			<!-- End Bottom Row3 -->

			<!-- Footer Area -->
            <?php
                if (isset($footer_area)) {
            ?>
			<div id="s5_footer_area1">
				<div id="s5_footer_area2">
					<div id="s5_footer_area_inner" class="s5_wrap">
						<div id="s5_footer_area_inner2">
							<div id="s5_footer">
								<?php require("footer.php"); ?>
							</div>
                            <?php
                                if (isset($bottom_menu)) {
                            ?>
							<div id="s5_bottom_menu_wrap">
								<?php require('bottom_menu.php'); ?>
							</div>
                            <?php
                                }
                            ?>
							<div style="clear:both; height:0px"></div>
						</div>
					</div>
				</div>
			</div>
            <?php
                }
            ?>
			<!-- End Footer Area -->
		
			<!-- Bottom Vertex Calls -->
			<?php require("includes_bottom.php"); ?>
			
			<a title="sipk.com" href="<?php echo base_url(); ?>" target="blank" id="s5_shape5_logo"></a>
			
			<!-- End Body Padding -->
		</div>

	</body>
</html>