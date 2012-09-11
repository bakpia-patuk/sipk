 <script type="text/javascript">
    document.switcher = null;
    window.addEvent('domready', function(){
        toggler = document.id('submenu');
        element = document.id('config-document');
        if (element) {
            document.switcher = new JSwitcher(toggler, element, {cookieName: toggler.getProperty('class')});
        }
    });
</script>
<div class="mc-wrapper">
	<div id="system-message-container"></div>
	<div id="mc-title">
		<h1>Global Configuration</h1>
		<div class="mc-toolbar" id="help">
			<ul>
				<li class="button" id="help-help">
					<a href="#" onclick="popupWindow('http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help16:Site_Global_Configuration', 'Help', 700, 500, 1)" rel="help" class="toolbar">
						<span class="icon-32-help"></span>Help
					</a>
				</li>
			</ul>
		</div>
		<div class="mc-toolbar" id="toolbar">
			<ul>
				<li class="button special" id="toolbar-apply">
					<a href="#" onclick="javascript:Joomla.submitbutton('application.apply')" class="toolbar">
						<span class="icon-32-apply"></span>Save
					</a>
				</li>
				<li class="button special" id="toolbar-save">
					<a href="#" onclick="javascript:Joomla.submitbutton('application.save')" class="toolbar">
						<span class="icon-32-save"></span>Save &amp; Close
					</a>
				</li>
				<li class="divider"></li>
				<li class="button" id="toolbar-cancel">
					<a href="#" onclick="javascript:Joomla.submitbutton('application.cancel')" class="toolbar">
						<span class="icon-32-cancel"></span>Cancel
					</a>
				</li>
				<li class="divider"></li>
			</ul>
		</div>
		<div class="mc-clr"></div>
	</div>
	<div id="mc-submenu">
		<div id="submenu-box">
			<div class="submenu-box">
				<div class="submenu-pad">
					<ul id="submenu" class="configuration">
						<li><a href="#" onclick="return false;" id="site" class="active">Site</a></li>
						<li><a href="#" onclick="return false;" id="system">System</a></li>
						<li><a href="#" onclick="return false;" id="server">Server</a></li>
						<li><a href="#" onclick="return false;" id="permissions">Permissions</a></li>
					</ul>
					<div class="clr"></div>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
	<div id="mc-component">
        
        <form action="<?php echo site_url('admin/admin/config'); ?>" id="application-form" method="post" name="adminForm" class="form-validate">
            
		<div id="config-document">
            <div id="page-site" class="tab" style="display: block;">
				<div class="noshow">
					<div class="width-60 fltlft">
						<div class="width-100">
							<fieldset class="adminform">
								<legend>Site Settings</legend>
								<ul class="adminformlist">
									<li><label id="jform_sitename-lbl" for="jform_sitename" class="hasTip required" title="Site Name::Enter the name of your Web site. This will be used in various locations (e.g. the backend browser title bar and &lt;em&gt;Site Offline&lt;/em&gt; pages).">Site Name<span class="star">&#160;*</span></label>					<input type="text" name="jform[sitename]" id="jform_sitename" value="SABB" class="required" size="50"/></li>
									<li><label id="jform_offline-lbl" for="jform_offline" class="hasTip" title="Site Offline::Select whether access to the Site frontend is available. If Yes, the frontend will display the message below.">Site Offline</label>					<fieldset id="jform_offline" class="radio"><input type="radio" id="jform_offline0" name="jform[offline]" value="1"/><label for="jform_offline0">Yes</label><input type="radio" id="jform_offline1" name="jform[offline]" value="0" checked="checked"/><label for="jform_offline1">No</label></fieldset></li>
									<li><label id="jform_offline_message-lbl" for="jform_offline_message" class="hasTip" title="Offline Message::A message that displays in the frontend if your site is offline.">Offline Message</label>					<textarea name="jform[offline_message]" id="jform_offline_message" cols="60" rows="2">This site is down for maintenance.&lt;br /&gt; Please check back again soon.</textarea></li>
									<li><label id="jform_editor-lbl" for="jform_editor" class="hasTip required" title="Default Editor::Select the default text editor for your site. Registered Users will be able to change their preference in their personal details if you allow that option.">Default Editor<span class="star">&#160;*</span></label>					<select id="jform_editor" name="jform[editor]" class="required">
										<option value="codemirror">Editor - CodeMirror</option>
										<option value="none">Editor - None</option>
										<option value="tinymce" selected="selected">Editor - TinyMCE</option>
									</select>
									</li>
									<li><label id="jform_access-lbl" for="jform_access" class="hasTip required" title="Default Access Level::Select the default access level for new content, menu items, and other items created on your site.">Default Access Level<span class="star">&#160;*</span></label>					<select id="jform_access" name="jform[access]"  class="required">
										<option value="2">Registered</option>
										<option value="3">Special</option>
										<option value="1" selected="selected">Public</option>
										<option value="4">Customer Access Level (Example)</option>
									</select>
									</li>
									<li><label id="jform_list_limit-lbl" for="jform_list_limit" class="hasTip" title="Default List Limit::Sets the default length of lists in the Control Panel for all users">Default List Limit</label>					<select id="jform_list_limit" name="jform[list_limit]">
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="15">15</option>
										<option value="20" selected="selected">20</option>
										<option value="25">25</option>
										<option value="30">30</option>
										<option value="50">50</option>
										<option value="100">100</option>
									</select>
									</li>
									<li><label id="jform_feed_limit-lbl" for="jform_feed_limit" class="hasTip" title="Default Feed Limit::Select the number of content items to show in the feed(s).">Default Feed Limit</label>					<select id="jform_feed_limit" name="jform[feed_limit]">
										<option value="5">5</option>
										<option value="10" selected="selected">10</option>
										<option value="15">15</option>
										<option value="20">20</option>
										<option value="25">25</option>
										<option value="30">30</option>
										<option value="50">50</option>
										<option value="100">100</option>
									</select>
									</li>
									<li><label id="jform_feed_email-lbl" for="jform_feed_email" class="hasTip" title="Feed email::The RSS and Atom newsfeeds include the author's email address. Select Author Email to use each author's email (from the User Manager) in the news feed. Select Site Email to include the site 'Mail from' email address for each article.">Feed email</label>					<select id="jform_feed_email" name="jform[feed_email]">
										<option value="author" selected="selected">Author Email</option>
										<option value="site">Site Email</option>
										</select>
									</li>
								</ul>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
            <div id="page-system" class="tab" style="display: none;">
                <div class="noshow">
                    <div class="width-60 fltlft">
                        <div class="width-100">
                            <fieldset class="adminform">
                                <legend>System Settings</legend>
                                
                            </fieldset>
                        </div>				
                    </div>
                </div>				
            </div>
			<input type="hidden" name="task" value="" />
        </div>
		<div class="clr"></div>
	</form>
        
	</div>
	<div class="mc-clr"></div>
</div>
