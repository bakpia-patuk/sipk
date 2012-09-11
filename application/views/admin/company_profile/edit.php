<div class="mc-wrapper">
	<div id="system-message-container"></div>
		<div id="mc-title">
			<h1>Article Manager: Add New Article</h1>
			<div class="mc-toolbar" id="help">
				<ul>
					<li class="button" id="help-help">
						<a href="#" onclick="popupWindow('http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help16:Content_Article_Manager_Edit', 'Help', 700, 500, 1)" rel="help" class="toolbar">
							<span class="icon-32-help"></span>Help
						</a>
					</li>
				</ul>
			</div>
			<div class="mc-toolbar" id="toolbar">
				<ul>
					<li class="button special" id="toolbar-apply">
						<a href="#" onclick="javascript:Joomla.submitbutton('article.apply')" class="toolbar">
							<span class="icon-32-apply"></span>Save
						</a>
					</li>
					<li class="button special" id="toolbar-save">
						<a href="#" onclick="javascript:Joomla.submitbutton('article.save')" class="toolbar">
							<span class="icon-32-save"></span>Save &amp; Close
						</a>
					</li>
					<li class="button" id="toolbar-save-new">
						<a href="#" onclick="javascript:Joomla.submitbutton('article.save2new')" class="toolbar">
							<span class="icon-32-save-new"></span>Save &amp; New
						</a>
					</li>
					<li class="button" id="toolbar-cancel">
						<a href="#" onclick="javascript:Joomla.submitbutton('article.cancel')" class="toolbar">
							<span class="icon-32-cancel"></span>Cancel
						</a>
					</li>
					<li class="divider"></li>
				</ul>
			</div>
			<div class="mc-clr"></div>
		</div>
		<div id="mc-submenu">
			<ul id="submenu">
				<li>
					<span class="nolink">Articles</span>
				</li>
				<li>
					<span class="nolink">Categories</span>
				</li>
				<li>
					<span class="nolink">Featured Articles</span>
				</li>
			</ul>
		</div>
		<div id="mc-component">
			<script type="text/javascript">
				Joomla.submitbutton = function(task) {
					if (task == 'article.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
						if (tinyMCE.get("jform_articletext").isHidden()) {tinyMCE.get("jform_articletext").show()}; tinyMCE.get("jform_articletext").save();			Joomla.submitform(task, document.getElementById('item-form'));
					} else {
						alert('Invalid form');
					}
				}
			</script>
			<form action="/joomla/administrator/index.php?option=com_content&amp;layout=edit&amp;id=0" method="post" name="adminForm" id="item-form" class="form-validate">
				<div id="mc-article-key" class="adminform">
					<ul class="adminformlist">
						<li>
							<label id="jform_title-lbl" for="jform_title" class="hasTip required" title="Title::Title">Title<span class="star"> *</span></label>				<input type="text" name="jform[title]" id="jform_title" value="" class="inputbox required mc-bigger-field" size="30">
						</li>
						<li>
							<label id="jform_alias-lbl" for="jform_alias" class="hasTip" title="Alias::The Alias will be used in the SEF URL. Leave this blank and Joomla will fill in a default value from the title. This value will depend on the SEO settings (Global Configuration-&gt;Site). &lt;br /&gt;Using Unicode will produce UTF8 aliases. You may also enter manually any utf8 character. Spaces and some forbidden characters will be changed to hyphens.&lt;br /&gt;When using default transliteration it will produce an alias in lower case and with dashes instead of spaces. You may enter the Alias manually. Use lowercase letters and hyphens (-). No spaces or underscores are allowed. Default value will be a date and time if the title is typed in non-latin letters .">Alias</label>				<input type="text" name="jform[alias]" id="jform_alias" value="" class="inputbox" size="45">
						</li>
						<li>
							<label id="jform_catid-lbl" for="jform_catid" class="hasTip required" title="Category::The category that this item is assigned to.">Category<span class="star"> *</span></label>
							<select id="jform_catid" name="jform[catid]" class="inputbox required">
								<option value="14">Sample Data-Articles</option>
								<option value="19">- Joomla!</option>
								<option value="20">- - Extensions</option>
								<option value="21">- - - Components</option>
								<option value="22">- - - Modules</option>
								<option value="64">- - - - Content Modules</option>
								<option value="65">- - - - User Modules</option>
								<option value="66">- - - - Display Modules</option>
								<option value="67">- - - - Utility Modules</option>
								<option value="75">- - - - Navigation Modules</option>
								<option value="23">- - - Templates</option>
								<option value="69">- - - - Beez 20</option>
								<option value="70">- - - - Beez5</option>
								<option value="68">- - - - Atomic</option>
								<option value="24">- - - Languages</option>
								<option value="25">- - - Plugins</option>
								<option value="26">- Park Site</option>
								<option value="27">- - Park Blog</option>
								<option value="28">- - Photo Gallery</option>
								<option value="72">- - - Animals</option>
								<option value="73">- - - Scenery</option>
								<option value="29">- Fruit Shop Site</option>
								<option value="30">- - Growers</option>
								<option value="76">- - Recipes</option>
								<option value="9">Uncategorised</option>
							</select>
						</li>
						<li>
							<label id="jform_state-lbl" for="jform_state" class="hasTip" title="Status::Set publication status.">Status</label>
							<select id="jform_state" name="jform[state]" class="inputbox" size="1"><option value="1" selected>Published</option>
								<option value="0">Unpublished</option>
								<option value="2">Archived</option>
								<option value="-2">Trashed</option>
							</select>
						</li>
						<li>
							<label id="jform_access-lbl" for="jform_access" class="hasTip" title="Access::The access level group that is allowed to view this item.">Access</label>
							<select id="jform_access" name="jform[access]" class="inputbox" size="1">
								<option value="2">Registered</option>
								<option value="3">Special</option>
								<option value="1" selected>Public</option>
								<option value="4">Customer Access Level (Example)</option>
							</select>
						</li>
						<li>
							<label id="jform_featured-lbl" for="jform_featured" class="hasTip" title="Featured::Assign the article to the featured blog layout">Featured</label>
							<select id="jform_featured" name="jform[featured]">
								<option value="0" selected>No</option>
								<option value="1">Yes</option>
							</select>
						</li>
						<li>
							<label id="jform_language-lbl" for="jform_language" class="hasTip" title="Language::The language that the article is assigned to.">Language</label>
							<select id="jform_language" name="jform[language]" class="inputbox">
								<option value="*">All</option>
								<option value="en-GB">English (UK)</option>
							</select>
						</li>
						<li>
							<label id="jform_id-lbl" for="jform_id" class="hasTip" title="ID::Record number in the database">ID</label>
							<input type="text" name="jform[id]" id="jform_id" value="0" class="readonly" size="10" readonly>
						</li>
					</ul>
				</div>
				<ul id="mc-article-tabs" class="mc-form-tabs">
					<li>
						<a id="editor" class="active">Article Editor</a>
					</li>
					<li>
						<a id="publishing">Publishing &amp; MetaData</a>
					</li>
					<li>
						<a id="advanced">Advanced &amp; Permissions</a>
					</li>
				</ul>
				<div id="mc-article" class="adminform">
					<div id="page-editor">
						<fieldset class="adminform">
							<div class="clr"></div>
							<div class="clr"></div>
							<textarea name="jform[articletext]" id="jform_articletext" cols="0" rows="0" style="width:100%; height:250px;" class="mce_editable"></textarea>
							<div id="editor-xtd-buttons">
								<div class="button2-left">
									<div class="article">
										<a class="modal-button" title="Article" href="http://localhost/joomla/administrator/index.php?option=com_content&amp;view=articles&amp;layout=modal&amp;tmpl=component" onclick="IeCursorFix(); return false;" rel="{handler: 'iframe', size: {x: 770, y: 400}}">Article</a>
									</div>
								</div>
								<div class="button2-left">
									<div class="image">
										<a class="modal-button" title="Image" href="http://localhost/joomla/administrator/index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;e_name=jform_articletext&amp;asset=&amp;author=" onclick="IeCursorFix(); return false;" rel="{handler: 'iframe', size: {x: 800, y: 500}}">Image</a>
									</div>
								</div>
								<div class="button2-left">
									<div class="pagebreak">
										<a class="modal-button" title="Page Break" href="http://localhost/joomla/administrator/index.php?option=com_content&amp;view=article&amp;layout=pagebreak&amp;tmpl=component&amp;e_name=jform_articletext" onclick="IeCursorFix(); return false;" rel="{handler: 'iframe', size: {x: 400, y: 100}}">Page Break</a>
									</div>
								</div>
								<div class="button2-left">
									<div class="readmore">
										<a title="Read More" href="http://localhost/joomla/administrator/#" onclick="insertReadmore('jform_articletext');return false;" rel="">Read More</a>
									</div>
								</div>
							</div>

<div class="toggle-editor">
<div class="button2-left"><div class="blank"><a href="#" onclick="tinyMCE.execCommand('mceToggleEditor', false, 'jform_articletext');return false;" title="Toggle editor">Toggle editor</a></div></div>
</div>
						</fieldset>
					</div>
					   	<div id="page-publishing">
					   		<div id="mc-pubdata">
					   			<div class="mc-block">
					   				<h3>Publishing Options</h3>
					   			<fieldset class="panelform"><ul class="adminformlist">
<li>
<label id="jform_created_by-lbl" for="jform_created_by" class="hasTip" title="Created by::You can change here the name of the user who created the article.">Created by</label>					<div class="fltlft">
	<input type="text" id="jform_created_by_name" value="Select a User" disabled>
</div>
<div class="button2-left">
  <div class="blank">
		<a class="modal_jform_created_by" title="Select User" href="index.php?option=com_users&amp;view=users&amp;layout=modal&amp;tmpl=component&amp;field=jform_created_by" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
			Select User</a>
  </div>
</div>
<input type="hidden" id="jform_created_by_id" name="jform[created_by]" value="0">
</li>

					<li>
<label id="jform_created_by_alias-lbl" for="jform_created_by_alias" class="hasTip" title="Created by alias::You can enter here an alias to be displayed instead of the name of the user who created the article.">Created by alias</label>					<input type="text" name="jform[created_by_alias]" id="jform_created_by_alias" value="" class="inputbox" size="20">
</li>

					<li>
<label id="jform_created-lbl" for="jform_created" class="hasTip" title="Created Date::Created Date">Created Date</label>					<input type="text" title="" name="jform[created]" id="jform_created" value="" size="22" class="inputbox"><img src="/joomla/media/system/images/calendar.png" alt="Calendar" class="calendar" id="jform_created_img">
</li>

					<li>
<label id="jform_publish_up-lbl" for="jform_publish_up" class="hasTip" title="Start Publishing::An optional date to Start Publishing the article.">Start Publishing</label>					<input type="text" title="" name="jform[publish_up]" id="jform_publish_up" value="" size="22" class="inputbox"><img src="/joomla/media/system/images/calendar.png" alt="Calendar" class="calendar" id="jform_publish_up_img">
</li>

					<li>
<label id="jform_publish_down-lbl" for="jform_publish_down" class="hasTip" title="Finish Publishing::An optional date to Finish Publishing the article.">Finish Publishing</label>					<input type="text" title="" name="jform[publish_down]" id="jform_publish_down" value="" size="22" class="inputbox"><img src="/joomla/media/system/images/calendar.png" alt="Calendar" class="calendar" id="jform_publish_down_img">
</li>

					
					
									</ul></fieldset>
<h3 class="title">Editors</h3>No one has edited this article...</div>
					   		</div>
					   		<div id="mc-metadata">
					   			<div class="mc-block">
					   				<h3>MetaData</h3>
					   			<fieldset class="panelform"><ul class="adminformlist">
<li>
<label id="jform_metadesc-lbl" for="jform_metadesc" class="hasTip" title="Meta Description::An optional paragraph to be used as the description of the page in the HTML output. This will generally display in the results of search engines.">Meta Description</label>	<textarea name="jform[metadesc]" id="jform_metadesc" cols="30" rows="3" class="inputbox"></textarea>
</li>

	<li>
<label id="jform_metakey-lbl" for="jform_metakey" class="hasTip" title="Meta Keywords::An optional comma-separated list of keywords and/or phrases to be used in the HTML output.">Meta Keywords</label>	<textarea name="jform[metakey]" id="jform_metakey" cols="30" rows="3" class="inputbox"></textarea>
</li>


	<li>
					<label id="jform_metadata_robots-lbl" for="jform_metadata_robots" class="hasTip" title="Robots::Robots Instructions">Robots</label>				<select id="jform_metadata_robots" name="jform[metadata][robots]"><option value="" selected>Use Global</option>
<option value="index, follow">Index, Follow</option>
<option value="noindex, follow">No index, follow</option>
<option value="index, nofollow">Index, No follow</option>
<option value="noindex, nofollow">No index, no follow</option></select>
</li>
	<li>
					<label id="jform_metadata_author-lbl" for="jform_metadata_author" class="hasTip" title="Author::The author of this content">Author</label>				<input type="text" name="jform[metadata][author]" id="jform_metadata_author" value="" size="20">
</li>
	<li>
					<label id="jform_metadata_rights-lbl" for="jform_metadata_rights" class="hasTip" title="Content Rights::Describe what rights others have to use this content.">Content Rights</label>				<textarea name="jform[metadata][rights]" id="jform_metadata_rights" cols="30" rows="2"></textarea>
</li>
	<li>
					<label id="jform_metadata_xreference-lbl" for="jform_metadata_xreference" class="hasTip" title="External Reference::An optional reference used to link to external data sources.">External Reference</label>				<input type="text" name="jform[metadata][xreference]" id="jform_metadata_xreference" value="" class="inputbox" size="20">
</li>
</ul></fieldset>
</div>
					   		</div>
					   	</div>
					   	<div id="page-advanced">
					   		<div id="mc-settings">
					   			<div class="mc-block">
					   				<h3>Advanced Options</h3>
					   			<fieldset class="panelform"><ul class="adminformlist">
<li>
<label id="jform_attribs_show_title-lbl" for="jform_attribs_show_title" class="hasTip" title="Show Title::If set to Show, the article title is shown.">Show Title</label>						<select id="jform_attribs_show_title" name="jform[attribs][show_title]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_link_titles-lbl" for="jform_attribs_link_titles" class="hasTip" title="Linked Titles::If set to Yes, the article title will be a link to the article.">Linked Titles</label>						<select id="jform_attribs_link_titles" name="jform[attribs][link_titles]"><option value="" selected>Use Global</option>
<option value="0">No</option>
<option value="1">Yes</option></select>
</li>
											<li>
<label id="jform_attribs_show_intro-lbl" for="jform_attribs_show_intro" class="hasTip" title="Show Intro Text::If set to Show, the Intro Text of the article will show when you drill down to the article. If set to Hide, only the part of the article after the &amp;quot;Read More&amp;quot; break will show.">Show Intro Text</label>						<select id="jform_attribs_show_intro" name="jform[attribs][show_intro]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_category-lbl" for="jform_attribs_show_category" class="hasTip" title="Show Category::If set to Show, the title of the article&amp;rsquo;s category will show.">Show Category</label>						<select id="jform_attribs_show_category" name="jform[attribs][show_category]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_link_category-lbl" for="jform_attribs_link_category" class="hasTip" title="Link Category::If set to Yes, and if Show Category is set to 'Show', the Category Title will link to a layout showing articles in that Category.">Link Category</label>						<select id="jform_attribs_link_category" name="jform[attribs][link_category]"><option value="" selected>Use Global</option>
<option value="0">No</option>
<option value="1">Yes</option></select>
</li>
											<li>
<label id="jform_attribs_show_parent_category-lbl" for="jform_attribs_show_parent_category" class="hasTip" title="Show Parent::If set to Show, the title of the article&amp;rsquo;s parent category will show.">Show Parent</label>						<select id="jform_attribs_show_parent_category" name="jform[attribs][show_parent_category]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_link_parent_category-lbl" for="jform_attribs_link_parent_category" class="hasTip" title="Link Parent::If set to Yes, and if Show Parent is set to 'Show', the Parent Category Title will link to a layout showing articles in that Category.">Link Parent</label>						<select id="jform_attribs_link_parent_category" name="jform[attribs][link_parent_category]"><option value="" selected>Use Global</option>
<option value="0">No</option>
<option value="1">Yes</option></select>
</li>
											<li>
<label id="jform_attribs_show_author-lbl" for="jform_attribs_show_author" class="hasTip" title="Show Author::If set to Show, the Name of the article's Author will be displayed.  This is a global setting but can be changed at the Category, Menu and Article levels.">Show Author</label>						<select id="jform_attribs_show_author" name="jform[attribs][show_author]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_link_author-lbl" for="jform_attribs_link_author" class="hasTip" title="Link Author::If set to Yes, the Name of the article's Author will be linked to its contact page. You must create a contact linked to the author's user record for this to be ineffect.  This is a global setting but can be changed at the Category, Menu and Article levels.">Link Author</label>						<select id="jform_attribs_link_author" name="jform[attribs][link_author]"><option value="" selected>Use Global</option>
<option value="0">No</option>
<option value="1">Yes</option></select>
</li>
											<li>
<label id="jform_attribs_show_create_date-lbl" for="jform_attribs_show_create_date" class="hasTip" title="Show Create Date::If set to Show, the date and time an Article was created will be displayed. This a global setting but can be changed at Menu and Article levels.">Show Create Date</label>						<select id="jform_attribs_show_create_date" name="jform[attribs][show_create_date]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_modify_date-lbl" for="jform_attribs_show_modify_date" class="hasTip" title="Show Modify Date::If set to Show, the date and time an Article was last modified will be displayed. This is a global setting but can be changed at the Category, Menu and Article levels.">Show Modify Date</label>						<select id="jform_attribs_show_modify_date" name="jform[attribs][show_modify_date]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_publish_date-lbl" for="jform_attribs_show_publish_date" class="hasTip" title="Show Publish Date::If set to Show, the date and time an Article was published will be displayed. This is a global setting but can be changed at the Category, Menu and Article levels.">Show Publish Date</label>						<select id="jform_attribs_show_publish_date" name="jform[attribs][show_publish_date]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_item_navigation-lbl" for="jform_attribs_show_item_navigation" class="hasTip" title="Show Navigation::If set to Show, shows a navigation link (Next, Previous) between articles.">Show Navigation</label>						<select id="jform_attribs_show_item_navigation" name="jform[attribs][show_item_navigation]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_icons-lbl" for="jform_attribs_show_icons" class="hasTip" title="Show Icons::Print and email will utilise Icons or Text">Show Icons</label>						<select id="jform_attribs_show_icons" name="jform[attribs][show_icons]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_print_icon-lbl" for="jform_attribs_show_print_icon" class="hasTip" title="Show Print Icon::Show/Hide the Item Print button.">Show Print Icon</label>						<select id="jform_attribs_show_print_icon" name="jform[attribs][show_print_icon]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_email_icon-lbl" for="jform_attribs_show_email_icon" class="hasTip" title="Show Email Icon::Show/Hide the email icon. This allows you to email an article.">Show Email Icon</label>						<select id="jform_attribs_show_email_icon" name="jform[attribs][show_email_icon]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_vote-lbl" for="jform_attribs_show_vote" class="hasTip" title="Show Voting::If set to show , a voting system will be enabled for Articles">Show Voting</label>						<select id="jform_attribs_show_vote" name="jform[attribs][show_vote]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_hits-lbl" for="jform_attribs_show_hits" class="hasTip" title="Show Hits::If set to Show, the number of Hits on a particular Article will be displayed. This is a global setting but can be changed at the Category, Menu and Article levels.">Show Hits</label>						<select id="jform_attribs_show_hits" name="jform[attribs][show_hits]"><option value="" selected>Use Global</option>
<option value="0">Hide</option>
<option value="1">Show</option></select>
</li>
											<li>
<label id="jform_attribs_show_noauth-lbl" for="jform_attribs_show_noauth" class="hasTip" title="Show Unauthorised Links::If set to Yes, links to registered content will be shown even if you are not logged in. You will need to log in to access the full item.">Show Unauthorised Links</label>						<select id="jform_attribs_show_noauth" name="jform[attribs][show_noauth]"><option value="" selected>Use Global</option>
<option value="0">No</option>
<option value="1">Yes</option></select>
</li>
											<li>
<span class="spacer"><span class="before"></span><span class=""><hr class=""></span><span class="after"></span></span>						 </li>
											<li>
<label id="jform_attribs_alternative_readmore-lbl" for="jform_attribs_alternative_readmore" class="hasTip" title="Read More Text::Add a custom text instead of Read More">Read More Text</label>						<input type="text" name="jform[attribs][alternative_readmore]" id="jform_attribs_alternative_readmore" value="" class="inputbox" size="25">
</li>
											<li>
<label id="jform_attribs_article_layout-lbl" for="jform_attribs_article_layout" class="hasTip" title="Alternative Layout::Use a different layout from the supplied component view or overrides in the templates.">Alternative Layout</label>						<select id="jform_attribs_article_layout" name="jform[attribs][article_layout]"><optgroup label="---From Global Options---"><option value="" selected>Use Global</option></optgroup>
<optgroup id="jform_attribs_article_layout__" label="---From Component---"><option value="_:default">Default</option></optgroup>
<optgroup id="jform_attribs_article_layout_jb_antracit" label="---From jb_antracit Template---"><option value="jb_antracit:form">form</option></optgroup>
<optgroup id="jform_attribs_article_layout_jb_artist" label="---From jb_artist Template---"><option value="jb_artist:form">form</option></optgroup>
<optgroup id="jform_attribs_article_layout_joomla_brown" label="---From joomla_brown Template---"><option value="joomla_brown:form">form</option></optgroup>
<optgroup id="jform_attribs_article_layout_medical_joomla_template" label="---From medical_joomla_template Template---"><option value="medical_joomla_template:form">form</option></optgroup></select>
</li>
										</ul></fieldset>
</div>
					   		</div>
					   		<div id="mc-permissions">
					   			<div class="mc-block">
					   				<h3>Article Permissions</h3>
					   			<div id="permissions-sliders" class="pane-sliders">

<ul id="rules">
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
Public
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th1">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th1">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth1">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th1">
<label class="hasTip" for="jform_rules_core.delete_1" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th1">
<select name="jform[rules][core.delete][1]" id="jform_rules_core.delete_1" title="Allow or deny Delete for users in the Public group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth1">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th1">
<label class="hasTip" for="jform_rules_core.edit_1" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th1">
<select name="jform[rules][core.edit][1]" id="jform_rules_core.edit_1" title="Allow or deny Edit for users in the Public group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth1">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th1">
<label class="hasTip" for="jform_rules_core.edit.state_1" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th1">
<select name="jform[rules][core.edit.state][1]" id="jform_rules_core.edit.state_1" title="Allow or deny Edit State for users in the Public group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth1">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
<li><ul>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> Manager
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th6">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th6">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth6">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th6">
<label class="hasTip" for="jform_rules_core.delete_6" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th6">
<select name="jform[rules][core.delete][6]" id="jform_rules_core.delete_6" title="Allow or deny Delete for users in the Manager group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth6">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th6">
<label class="hasTip" for="jform_rules_core.edit_6" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th6">
<select name="jform[rules][core.edit][6]" id="jform_rules_core.edit_6" title="Allow or deny Edit for users in the Manager group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth6">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th6">
<label class="hasTip" for="jform_rules_core.edit.state_6" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th6">
<select name="jform[rules][core.edit.state][6]" id="jform_rules_core.edit.state_6" title="Allow or deny Edit State for users in the Manager group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth6">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
<li><ul>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> Administrator
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th7">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th7">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth7">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th7">
<label class="hasTip" for="jform_rules_core.delete_7" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th7">
<select name="jform[rules][core.delete][7]" id="jform_rules_core.delete_7" title="Allow or deny Delete for users in the Administrator group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth7">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th7">
<label class="hasTip" for="jform_rules_core.edit_7" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th7">
<select name="jform[rules][core.edit][7]" id="jform_rules_core.edit_7" title="Allow or deny Edit for users in the Administrator group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth7">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th7">
<label class="hasTip" for="jform_rules_core.edit.state_7" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th7">
<select name="jform[rules][core.edit.state][7]" id="jform_rules_core.edit.state_7" title="Allow or deny Edit State for users in the Administrator group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth7">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
</ul></li>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> Registered
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th2">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th2">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth2">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th2">
<label class="hasTip" for="jform_rules_core.delete_2" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th2">
<select name="jform[rules][core.delete][2]" id="jform_rules_core.delete_2" title="Allow or deny Delete for users in the Registered group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth2">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th2">
<label class="hasTip" for="jform_rules_core.edit_2" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th2">
<select name="jform[rules][core.edit][2]" id="jform_rules_core.edit_2" title="Allow or deny Edit for users in the Registered group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth2">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th2">
<label class="hasTip" for="jform_rules_core.edit.state_2" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th2">
<select name="jform[rules][core.edit.state][2]" id="jform_rules_core.edit.state_2" title="Allow or deny Edit State for users in the Registered group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth2">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
<li><ul>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> Author
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th3">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th3">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth3">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th3">
<label class="hasTip" for="jform_rules_core.delete_3" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th3">
<select name="jform[rules][core.delete][3]" id="jform_rules_core.delete_3" title="Allow or deny Delete for users in the Author group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth3">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th3">
<label class="hasTip" for="jform_rules_core.edit_3" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th3">
<select name="jform[rules][core.edit][3]" id="jform_rules_core.edit_3" title="Allow or deny Edit for users in the Author group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth3">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th3">
<label class="hasTip" for="jform_rules_core.edit.state_3" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th3">
<select name="jform[rules][core.edit.state][3]" id="jform_rules_core.edit.state_3" title="Allow or deny Edit State for users in the Author group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth3">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
<li><ul>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> <span class="level">|–</span> Editor
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th4">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th4">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth4">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th4">
<label class="hasTip" for="jform_rules_core.delete_4" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th4">
<select name="jform[rules][core.delete][4]" id="jform_rules_core.delete_4" title="Allow or deny Delete for users in the Editor group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth4">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th4">
<label class="hasTip" for="jform_rules_core.edit_4" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th4">
<select name="jform[rules][core.edit][4]" id="jform_rules_core.edit_4" title="Allow or deny Edit for users in the Editor group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth4">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th4">
<label class="hasTip" for="jform_rules_core.edit.state_4" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th4">
<select name="jform[rules][core.edit.state][4]" id="jform_rules_core.edit.state_4" title="Allow or deny Edit State for users in the Editor group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth4">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
<li><ul>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> <span class="level">|–</span> <span class="level">|–</span> Publisher
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th5">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th5">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth5">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th5">
<label class="hasTip" for="jform_rules_core.delete_5" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th5">
<select name="jform[rules][core.delete][5]" id="jform_rules_core.delete_5" title="Allow or deny Delete for users in the Publisher group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth5">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th5">
<label class="hasTip" for="jform_rules_core.edit_5" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th5">
<select name="jform[rules][core.edit][5]" id="jform_rules_core.edit_5" title="Allow or deny Edit for users in the Publisher group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth5">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th5">
<label class="hasTip" for="jform_rules_core.edit.state_5" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th5">
<select name="jform[rules][core.edit.state][5]" id="jform_rules_core.edit.state_5" title="Allow or deny Edit State for users in the Publisher group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth5">
<span class="icon-16-allowed">Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
</ul></li>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> <span class="level">|–</span> Shop Suppliers (Example)
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th10">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th10">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth10">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th10">
<label class="hasTip" for="jform_rules_core.delete_10" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th10">
<select name="jform[rules][core.delete][10]" id="jform_rules_core.delete_10" title="Allow or deny Delete for users in the Shop Suppliers (Example) group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth10">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th10">
<label class="hasTip" for="jform_rules_core.edit_10" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th10">
<select name="jform[rules][core.edit][10]" id="jform_rules_core.edit_10" title="Allow or deny Edit for users in the Shop Suppliers (Example) group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth10">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th10">
<label class="hasTip" for="jform_rules_core.edit.state_10" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th10">
<select name="jform[rules][core.edit.state][10]" id="jform_rules_core.edit.state_10" title="Allow or deny Edit State for users in the Shop Suppliers (Example) group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth10">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
</ul></li>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> Customer Group (Example)
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th12">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th12">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth12">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th12">
<label class="hasTip" for="jform_rules_core.delete_12" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th12">
<select name="jform[rules][core.delete][12]" id="jform_rules_core.delete_12" title="Allow or deny Delete for users in the Customer Group (Example) group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth12">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th12">
<label class="hasTip" for="jform_rules_core.edit_12" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th12">
<select name="jform[rules][core.edit][12]" id="jform_rules_core.edit_12" title="Allow or deny Edit for users in the Customer Group (Example) group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth12">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th12">
<label class="hasTip" for="jform_rules_core.edit.state_12" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th12">
<select name="jform[rules][core.edit.state][12]" id="jform_rules_core.edit.state_12" title="Allow or deny Edit State for users in the Customer Group (Example) group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth12">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> <span class="level">|–</span> test
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th13">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th13">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth13">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th13">
<label class="hasTip" for="jform_rules_core.delete_13" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th13">
<select name="jform[rules][core.delete][13]" id="jform_rules_core.delete_13" title="Allow or deny Delete for users in the test group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth13">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th13">
<label class="hasTip" for="jform_rules_core.edit_13" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th13">
<select name="jform[rules][core.edit][13]" id="jform_rules_core.edit_13" title="Allow or deny Edit for users in the test group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth13">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
<tr>
<td headers="actions-th13">
<label class="hasTip" for="jform_rules_core.edit.state_13" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th13">
<select name="jform[rules][core.edit.state][13]" id="jform_rules_core.edit.state_13" title="Allow or deny Edit State for users in the test group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth13">
<span class="icon-16-unset">Not Allowed</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
</ul></li>
<li>
<div class="panel">
<h3 class="pane-toggler title"><a href="javascript:void(0);"><span>
<span class="level">|–</span> Super Users
</span></a></h3>
<div class="pane-slider content pane-hide">
<div class="mypanel">
<table class="group-rules">
<thead><tr>
<th class="actions" id="actions-th8">
<span class="acl-action">Action</span>
</th>
<th class="settings" id="settings-th8">
<span class="acl-action">Select New Setting <sup>1</sup></span>
</th>
<th id="aclactionth8">
<span class="acl-action">Calculated Setting <sup>2</sup></span>
</th>
</tr></thead>
<tbody>
<tr>
<td headers="actions-th8">
<label class="hasTip" for="jform_rules_core.delete_8" title="Delete::New setting for &lt;strong&gt;delete actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Delete
</label>
</td>
<td headers="settings-th8">
<select name="jform[rules][core.delete][8]" id="jform_rules_core.delete_8" title="Allow or deny Delete for users in the Super Users group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth8">
<span class="icon-16-allowed"><span class="icon-16-locked">Allowed (Super Admin)</span></span>
</td>
</tr>
<tr>
<td headers="actions-th8">
<label class="hasTip" for="jform_rules_core.edit_8" title="Edit::New setting for &lt;strong&gt;edit actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit
</label>
</td>
<td headers="settings-th8">
<select name="jform[rules][core.edit][8]" id="jform_rules_core.edit_8" title="Allow or deny Edit for users in the Super Users group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth8">
<span class="icon-16-allowed"><span class="icon-16-locked">Allowed (Super Admin)</span></span>
</td>
</tr>
<tr>
<td headers="actions-th8">
<label class="hasTip" for="jform_rules_core.edit.state_8" title="Edit State::New setting for &lt;strong&gt;edit state actions&lt;/strong&gt; on this article and the calculated setting based on the parent category and group permissions.">
Edit State
</label>
</td>
<td headers="settings-th8">
<select name="jform[rules][core.edit.state][8]" id="jform_rules_core.edit.state_8" title="Allow or deny Edit State for users in the Super Users group"><option value="" selected>Inherited</option>
<option value="1">Allowed</option>
<option value="0">Denied</option></select>  
</td>
<td headers="aclactionth8">
<span class="icon-16-allowed"><span class="icon-16-locked">Allowed (Super Admin)</span></span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</li>
</ul></li>
</ul>
<div class="rule-notes">
1. If you change the setting, it will apply to this article. Note that:<br><em>Inherited</em> means that the permissions from global configuration, parent group and category will be used.<br><em>Denied</em> means that no matter what the global configuration, parent group or category settings are, the group being edited cannot take this action on this article.<br><em>Allowed</em> means that the group being edited will be able to take this action for this article (but if this is in conflict with the global configuration, parent group or category it will have no impact; a conflict will be indicated by <em>Not Allowed (Locked)</em> under Calculated Settings).<br>2. If you select a new setting, click <em>Save</em> to refresh the calculated settings.
</div>
</div>
</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
			<div class="width-100 fltlft"></div>
			<div>
				<input type="hidden" name="task" value=""><input type="hidden" name="return" value=""><input type="hidden" name="8d965a52e8d0376610e0ac8f612305ef" value="1">
			</div>
		</form>
	</div>
	<div class="mc-clr"></div>
</div>