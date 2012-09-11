<script type="text/javascript">
	var MCSessionTimeout = 900000;
	var MCSessionLang = {
		"expired": "Session Expired"
	}
</script>
<div id="mc-body">
	<div class="mc-wrapper">
		<div id="system-message-container"></div>
		<div id="content-box">
			<div id="toolbar-box">
				<div class="m">
					<div id="mc-title">
						<?php
							echo $module_title;
						?>
						<div class="mc-clr"></div>
					</div>
					<div id="mc-submenu"></div>
				</div>
			</div>
		</div>
		<div id="mc-component" class="clearfix">
			<form action="" method="post" name="adminForm" id="adminForm">
				<div class="width-40 fltlft">
					<fieldset class="adminform">
						<legend>Search</legend>
						<input class="textarea" type="hidden" name="option" value="com_admin">
						<input type="text" name="helpsearch" size="40" value="" class="inputbox">
						<input type="submit" value="Go" class="button">
						<input type="button" value="Clear results" class="button" onclick="f=document.adminForm;f.helpsearch.value='';f.submit()">
					</fieldset>
				</div>
				<div class="width-50 fltrt helplinks">
					<div class="mc-toolbar" id="toolbar">
						<ul class="helpmenu">
							<li><a href="<?php echo site_url('admin/help/get_help?topic=help_start_here'); ?>" target="helpFrame">Start here</a></li>
							<li><a href="<?php echo site_url('admin/help/get_help?topic=help_glossary'); ?>" target="helpFrame">Glossary</a></li>
						</ul>
					</div>
				</div>
				<div class="clr"></div>
				<div id="treecellhelp" class="width-20 fltleft">
					<fieldset class="adminform whitebg" title="Alphabetical Index">
						<legend>Alphabetical Index</legend>
						<div class="helpIndex">
							<ul class="subext">
								<li><a href="<?php echo site_url('admin/help/get_help?topic=help_sekolah_manager'); ?>" target="helpFrame">Sekolah Manager: Sekolah</a></li>
								<li><a href="<?php echo site_url('admin/help/get_help?topic=help_sekolah_manager_edit'); ?>" target="helpFrame">Sekolah Manager: Sekolah - Tambah/Edit</a></li>
								<li><a href="<?php echo site_url('admin/help/get_help?topic=help_perguruan_manager'); ?>" target="helpFrame">Perguruan Tinggi Manager: Perguruan Tinggi</a></li>
								<li><a href="<?php echo site_url('admin/help/get_help?topic=help_perguruan_manager_edit'); ?>" target="helpFrame">Perguruan Tinggi Manager: Perguruan Tinggi - Tambah/Edit</a></li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Site_Maintenance_Global_Check-in" target="helpFrame">Global Check-in</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Site_Global_Configuration" target="helpFrame">Global Configuration</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Glossary" target="helpFrame">Glossary</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Language_Manager_Edit" target="helpFrame">Language Manager - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Language_Manager_Content" target="helpFrame">Language Manager: Content Languages</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Language_Manager_Installed" target="helpFrame">Language Manager: Installed Languages</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_Mass_Mail_Users" target="helpFrame">Mass Mail Users</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Content_Media_Manager" target="helpFrame">Media Manager</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Menus_Menu_Item_Manager" target="helpFrame">Menu Item Manager</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Menus_Menu_Item_Manager_Edit" target="helpFrame">Menu Item Manager - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Menus_Menu_Manager" target="helpFrame">Menu Manager</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Menus_Menu_Manager_Edit" target="helpFrame">Menu Manager - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Module_Manager" target="helpFrame">Module Manager</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Module_Manager_Edit" target="helpFrame">Module Manager - Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Newsfeeds_Categories" target="helpFrame">News Feeds Manager: Categories</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Newsfeeds_Categories_Edit" target="helpFrame">News Feeds Manager: Categories - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Newsfeeds_Feeds" target="helpFrame">News Feeds Manager: Feeds</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Newsfeeds_Feeds_Edit" target="helpFrame">News Feeds Manager: Feeds - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Plugin_Manager" target="helpFrame">Plug-in Manager: Plug-ins</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Plugin_Manager_Edit" target="helpFrame">Plug-in Manager: Plug-ins - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Messaging_Inbox" target="helpFrame">Private Messages: Inbox</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Messaging_Read" target="helpFrame">Private Messages: Read</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Messaging_Write" target="helpFrame">Private Messages: Write</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Redirect_Manager" target="helpFrame">Redirect Manager: Links</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Redirect_Manager_Edit" target="helpFrame">Redirect Manager: Links - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Search" target="helpFrame">Search Manager</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Start_Here" target="helpFrame">Start Here</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Site_System_Information" target="helpFrame">System Information</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Template_Manager_Templates_Edit_Source" target="helpFrame">Template Manager: Source - Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Template_Manager_Styles" target="helpFrame">Template Manager: Styles</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Template_Manager_Styles_Edit" target="helpFrame">Template Manager: Styles - Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Template_Manager_Templates" target="helpFrame">Template Manager: Templates</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Extensions_Template_Manager_Templates_Edit" target="helpFrame">Template Manager: Templates - Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_Access_Levels" target="helpFrame">User Manager: Access Levels</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_Access_Levels_Edit" target="helpFrame">User Manager: Access Levels - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_Debug_Users" target="helpFrame">User Manager: Debug Users Permissions</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_Groups" target="helpFrame">User Manager: Groups</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_Groups_Edit" target="helpFrame">User Manager: Groups - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_User_Manager" target="helpFrame">User Manager: Users</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Users_User_Manager_Edit" target="helpFrame">User Manager: Users - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Weblinks_Categories" target="helpFrame">Web Links Manager: Categories</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Weblinks_Categories_Edit" target="helpFrame">Web Links Manager: Categories - New/Edit</a>						</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Weblinks_Links" target="helpFrame">Web Links Manager: Web Links</a>
								</li>
								<li>
									<a href="http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help25:Components_Weblinks_Links_Edit" target="helpFrame">Web Links Manager: Web Links - New/Edit</a>
								</li>
							</ul>
						</div>
					</fieldset>
				</div>
				<div id="datacellhelp" class="width-80 fltrt">
					<fieldset title="View">
						<legend>View</legend>
						<iframe name="helpFrame" src="<?php echo site_url('admin/help/get_help?topic='.$topic); ?>" class="helpFrame"></iframe>
					</fieldset>
				</div>
			</form>
		</div>
		<div class="mc-clr"></div>
	</div>
</div>
			