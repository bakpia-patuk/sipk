<h2><span class="mw-headline" id="How_to_Access">How to Access</span></h2>
<p>To add a new article, navigate to the back end of the site and perform one of these actions:</p>
<ul>
<li>Press the 'Add New Article' button in the <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Site_Control_Panel" title="Help25:Site Control Panel">Control Panel</a></li>
<li>Select Content?Article Manager?Add New Article from the drop-down menus</li>
<li>Click the 'New' button on the Article Manager.</li>
</ul>
<p>To edit an existing article, in Article Manager click on an article's Title or click the Article's check box and then click the 'Edit' button. The Add New Article and Edit Article screens have the same functionality.</p>
<h2><span class="mw-headline" id="Description">Description</span></h2>
<p>This is the back-end screen where you can add and edit Articles. The same screen is used for adding a new Article and editing an existing Article. You can also select the Section and Category for an Article and indicate whether or not it is Published and if it is selected to appear on the Front Page.</p>
<p>The Article's content is edited using the default editor selected in the <a href="/proxy/index.php?option=com_help&view=help&keyref=Screen.users.edit.15" title="Screen.users.edit.15" class="mw-redirect">User Manager - New/Edit</a>. The Joomla! default editor is called TinyMCE.</p>
<p>A number of Parameters can be set for the Article. Metadata can also be entered.</p>
<h2><span class="mw-headline" id="Screenshot">Screenshot</span></h2>
<div class="thumb tnone">
<div class="thumbinner" style="width:702px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:25-articleedit.png" class="image"><img alt="25-articleedit.png" src="http://docs.joomla.org/images/6/67/25-articleedit.png" width="700" height="323" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<h2><span class="mw-headline" id="Column_Headers">Column Headers</span></h2>
<h3><span class="mw-headline" id="Edit_Article">Edit Article</span></h3>
<p>Enter the heading information for the Article, as shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:437px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:25-article-edit-header.png" class="image"><img alt="25-article-edit-header.png" src="http://docs.joomla.org/images/4/44/25-article-edit-header.png" width="435" height="277" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>Title.</b> The Title for this item. This may or may not display on the page, depending on the parameter values you choose.</li>
</ul>
<ul>
<li><b>Alias</b>. The internal name of the item, also used in the URL when <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Site_Global_Configuration#SEO_Settings" title="Help25:Site Global Configuration">SEF</a> is activated. Normally, you can leave this blank and Joomla! will fill in a default value. The default value is the Title or Name in lower case and with dashes instead of spaces. You may enter the Alias manually. The Alias should consist of lowercase letters and hyphens (-). No blank spaces or underscores are allowed. Non-Latin characters can be allowed in the alias if you set the Unicode Aliases option to Yes in <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Site_Global_Configuration#SEO_Settings" title="Help25:Site Global Configuration">Global Configuration</a>. If this option is set to No and the title includes non-Latin characters, the Alias will default to the current date and time (for example "2012-12-31-17-54-38").</li>
</ul>
<ul>
<li><b>Category.</b> Select the Category for this Article from the drop-down list box.</li>
</ul>
<ul>
<li><b>Status.</b> The published status of this item.
<ul>
<li><i>Published:</i> Item is visible in the front end of the site.</li>
<li><i>Unpublished:</i> Item is will not be visible to guests in the front end of the site. It may be visible to logged in users who have edit state permission for the item.</li>
<li><i>Archived:</i> Item will no longer show on blog or list menu items.</li>
<li><i>Trashed:</i> Item is deleted from the site but still in the database. It can be permanently deleted from the database with the Empty Trash function in Article Manager.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Access.</b> Select the viewing access level for this item from the list box. The access levels that display will depend on the what has been set up for this site in <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Users_Access_Levels" title="Help25:Users Access Levels">Users?Access Levels</a>. Note that access levels are separate from ACL permissions. Access levels control what a user can see. ACL permissions control what actions a user can perform.</li>
<li><b>Permissions.</b> Click the Set Permissions button to navigate to the bottom of the screen, where you can set ACL permissions for this article. See <a href="#Article_Permissions">Article Permissions</a>.</li>
</ul>
<ul>
<li><b>Featured.</b> Yes/No. Select Yes if item will be shown in the Featured menu item. Select No otherwise.</li>
</ul>
<ul>
<li><b>Language.</b> Select the language for this item. If you are not using the multi-language feature of Joomla, keep the default of 'All'.</li>
</ul>
<ul>
<li><b>ID</b>. This is a unique identification number for this item assigned automatically by Joomla!. It is used to identify the item internally, and you cannot change this number. When creating a new item, this field displays 0 until you save the new entry, at which point a new ID is assigned to it.</li>
</ul>
<h3><span class="mw-headline" id="Article_Text">Article Text</span></h3>
<p>This is where you enter the contents of the article. The editor you use depends on the settings for your site and your user. Joomla core includes three editor options: TinyMCE (the default), Code Mirror, and None.</p>
<h4><span class="mw-headline" id="TinyMCE_Editor">TinyMCE Editor</span></h4>
<p>TinyMCE is the default editor for both front-end and back-end users. TinyMCE is a WYSIWYG (what you see is what you get) editor that allows users a familiar word-processing interface to use when editing Articles and other content. TinyMCE can be configured with three different sets of toolbar buttons: advanced, simple, and extended. This is set as an option in the <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Extensions_Plugin_Manager" title="Help25:Extensions Plugin Manager">Plugin Manager</a> for the 'Editor - TinyMCE' plugin.</p>
<p><b>Advanced Toolbar</b></p>
<p>The advanced toolbar provides a three-row toolbar as shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:613px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-tinymce-advanced.png" class="image"><img alt="Help25-screenshot-editor-tinymce-advanced.png" src="http://docs.joomla.org/images/a/ad/Help25-screenshot-editor-tinymce-advanced.png" width="611" height="82" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p>This is the default setting. The 3-row toolbar below provides many standard editing commands, as follows:</p>
<ul>
<li><b>Top Row.</b>
<ul>
<li>Buttons in the upper left allow you to make text bold, italic, underlined, or strikethrough. Next to that are buttons for align left, right, center, and full.</li>
<li>Styles. Caption and System Pagebreak styles can be set. Highlight the desired text and select the style. This will allow this text to be formatted based on CSS rules.</li>
<li>Format. Select pre-defined formats for Paragraph, Address, Heading1, and so on.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Second Row.</b>
<ul>
<li>Unordered List, Ordered list, Outdent (move left) and Indent (indent right).</li>
<li>Undo (Ctrl+Z) and Re-do (Ctrl+Y).</li>
<li>Insert/Edit Link. To insert or edit a link, select the linked text and press this button. A popup dialog displays that lets you enter details about the link.</li>
<li>Unlink. To remove a link, highlight the linked text and press this button.</li>
<li>Insert/Edit Anchor. An <a href="/proxy/index.php?option=com_help&view=help&keyref=Glossary#Anchor" title="Glossary">anchor</a> is a bookmark inside an article that lets you link directly to that point in the article. To insert an anchor, move the cursor to the desired location within the article and click this button. A window will display. Enter the name of the Anchor and press Insert. A small anchor icon will show in the location of the anchor. You can edit the name of the anchor by clicking on it and pressing this button. You can delete the anchor just by selecting it and pressing the Delete key.</li>
<li>Insert/Edit Image. To insert and image, place the cursor in the desired location and press this button. A popup dialog displays that lets you enter in the Image URL and other information about how the image will display.</li>
<li>Cleanup Messy Code. This button allows you to clean up HTML code, perhaps from HTML text that you copied in from another source.</li>
<li>About TinyMCE editor. Shows the TinyMCE version.</li>
<li>Edit HTML Source. A popup displays showing the HTML source code, allowing you to edit the HTML source code.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Third Row.</b>
<ul>
<li>Insert Horizontal Ruler.</li>
<li>Remove Formatting.</li>
<li>Toggle Guidelines/Invisible elements.</li>
<li>Subscript, Superscript, Insert Custom Character</li>
</ul>
</li>
</ul>
<p><b>Simple Toolbar</b></p>
<p>The simple toolbar provides one row of buttons as shown below.</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:612px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-tinymce-simple.png" class="image"><img alt="Help25-screenshot-editor-tinymce-simple.png" src="http://docs.joomla.org/images/a/aa/Help25-screenshot-editor-tinymce-simple.png" width="610" height="25" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>First Row.</b>
<ul>
<li>Buttons allow you to make text bold, italic, underlined, or strikethrough.</li>
<li>Undo (Ctrl+Z) and Re-do (Ctrl+Y).</li>
<li>Cleanup Messy Code. This button allows you to clean up HTML code, perhaps from HTML text that you copied in from another source.</li>
<li>Unordered list, Ordered list.</li>
</ul>
</li>
</ul>
<p>The extended toolbar provides the most extensive editing options, as shown below.</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:611px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-tinymce-extended.png" class="image"><img alt="Help25-screenshot-editor-tinymce-extended.png" src="http://docs.joomla.org/images/9/91/Help25-screenshot-editor-tinymce-extended.png" width="609" height="106" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p>This option provides all of the same buttons as documented in the Advanced Toolbar above. In addition, the following options are available:</p>
<ul>
<li><b>First Row.</b>
<ul>
<li>Font Family. Select the desired font.</li>
<li>Font Size. Select the desired font size.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Second Row.</b>
<ul>
<li>Find and Find/Replace.</li>
<li>Insert Date or Time.</li>
<li>Select Text Color or Background Color.</li>
<li>Toggle Full Screen Mode.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Third Row.</b>
<ul>
<li>Insert New Table, Table Row Properties, Table Cell Properties, Insert Row Before, Insert Row After, Delete Row, Insert Column Before, Insert Column After, Delete Column, Split Merged Table Cells, Merge Table Cells.</li>
<li>Insert Emotions.</li>
<li>Insert Embedded Media. To insert embedded media (such as Flash), place the cursor at the desired location and press this button. A popup dialog will display that allows you to enter the Type, File or URL, and other information about the media.</li>
<li>Insert horizontal line.</li>
<li>Direction Left to Right and Direction Right to Left. These buttons allow you to enter or change the text direction, for example for languages that read right to left.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Fourth Row.</b>
<ul>
<li>Cut, Copy, Paste, Paste as Plain Text, Paste from Word. Often when copying and pasting text from other sources, such as PDF files, Word documents, or web pages, the selected text contains formatting information that is not needed or wanted. Using the Paste as Plain Text will strip out all formatting from the text. Paste as Word tries to preserve some of the formatting while stripping out unnecessary formatting.</li>
<li>Select All.</li>
<li>Insert New Layer, Move Forward, Move Backware, Toggle Absolute Position. For working with layered items.</li>
<li>Edit CSS Style. A popup dialog box displays that allows you to enter CSS style information for the selected text.</li>
<li>Citation, Abbreviation, Acronym, Insertion, Deletion, Insert/Edit Attributes.</li>
<li>Show/Hide Visual Control Characters (like paragraph endings).</li>
<li>Show/Hide Block Elements.</li>
<li>Insert Non-Breaking Space Character.</li>
<li>Block Quote.</li>
<li>Insert Predefined Template Content.</li>
</ul>
</li>
</ul>
<h4><span class="mw-headline" id="Code_Mirror_Editor">Code Mirror Editor</span></h4>
<p>The CodeMirror editor is designed to make it easy to enter HTML code in an article or description. CodeMirror supports syntax highlighting and auto-completion, as shown in this screenshot.</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:313px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-codemirror-example.png" class="image"><img alt="Help25-screenshot-editor-codemirror-example.png" src="http://docs.joomla.org/images/8/80/Help25-screenshot-editor-codemirror-example.png" width="311" height="138" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p>CodeMirror offers some of the same advantages of using No Editor, but makes it somewhat easier to work with raw HTML code.</p>
<h4><span class="mw-headline" id="No_Editor">No Editor</span></h4>
<p>If 'No editor' is selected for a User, then a simple text editor displays. This allows you to enter in raw, unformatted HTML. You can use the toolbar 'Preview' button to preview how the HTML will display.</p>
<p>Note that the 'No Editor' option can be useful if you are entering in 'boilerplate' or custom HTML, for example to create a PayPal link. TinyMCE automatically re-formats and strips some HTML when a file is saved. This can cause complex HTML to not work correctly.</p>
<p>If this happens, you can temporarily change the editor to 'No Editor' and create the desired content. Note that if you wish to edit this content in the future, you should be careful to change your editor to 'No Editor'. Otherwise, if you open and save the content with TinyMCE, you may lose your custom HTML.</p>
<h4><span class="mw-headline" id="Editor_Buttons">Editor Buttons</span></h4>
<p>Five buttons are located just below the edit window, as shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:419px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-buttons.png" class="image"><img alt="Help25-screenshot-editor-buttons.png" src="http://docs.joomla.org/images/2/2c/Help25-screenshot-editor-buttons.png" width="417" height="41" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p><b>Article.</b> This button opens a modal window that allows you to easily create a link to any article on the current site. The link is created using the article's title as the link text. The modal window is the same as for selecting an article for a Single Article Menu Item. To create a link to the desired article:</p>
<ul>
<li>Place the cursor at the point in the article where you want the linked article title to be inserted.</li>
<li>Click on the Article button to open the modal window.</li>
<li>Click on the title to select the desired article in the modal window. You can use the filters and search to help find the desired article.</li>
<li>A link with the article's title will be inserted at the current cursor location.</li>
<li>If needed, you can edit the link text.</li>
</ul>
<p><b>Image.</b> This button provides an easy way to insert an image into an Article. Images may be inserted from the 'images' folder and may also be uploaded. When you click the Image button, a window pops up, as shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:809px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-image-button.png" class="image"><img alt="Help25-screenshot-editor-image-button.png" src="http://docs.joomla.org/images/0/0e/Help25-screenshot-editor-image-button.png" width="807" height="478" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>Directory.</b> The current directory on the host server. This is the 'images' directory under your Joomla! home directory. Use the drop-down list box to select a subdirectory.</li>
<li><b>Up.</b> Navigate to the parent directory. Note that the top directory for this function is 'images/stories'. You can not navigate to a higher directory.</li>
<li><b>Insert.</b> Insert the selected image. The insert point will be the current cursor position. You will see the image display inside the edit window.</li>
<li><b>Cancel</b>. Cancel the operation and close the popup window. You can cancel also in clicking the X at right top corner.</li>
<li><b>Thumbnail Browse Area.</b> Click on an image thumbnail to select the image. Click on a folder icon to navigate to that subdirectory.</li>
<li><b>Image URL.</b> Click on one of the image thumbnails and the URL for the image will be entered for you.</li>
<li><b>Align.</b> Select the desired alignment (left or right) from the drop-down list box.</li>
<li><b>Image Description.</b> Enter a description for the image.</li>
<li><b>Image Title.</b> Enter a Title for this image. This displays when a User hovers the mouse on the image.</li>
<li><b>Caption.</b> If checked, image title will display as a caption below the image.</li>
<li><b>Choose Files.</b> Click this button to browse to an image file to upload from your local computer. A file dialog will open allowing you to select a file.</li>
<li><b>Start Upload.</b> Once you have selected a file, press this button to upload the file to your Joomla! 'images' folder. The thumbnail for the new image will now show in the thumbnail area.</li>
</ul>
<p><b>Pagebreak.</b> This button allows you to insert a pagebreak inside an Article. A pagebreak allows for page navigation when the article is displayed on a layout. This is useful for long articles. When this button is pressed, a popup window is displayed as shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:436px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-editor-pagebreak-button.png" class="image"><img alt="Help25-screenshot-editor-pagebreak-button.png" src="http://docs.joomla.org/images/d/d0/Help25-screenshot-editor-pagebreak-button.png" width="434" height="136" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>Page Title</b>. Enter the title to display for the new page (for example, 'Page 2').</li>
<li><b>Table of Contents Alias</b>. Optional field to display in the table of contents for this page. In a multi-page article, Joomla! displays a 'table of contents' for the page that allows the user to select any page. If this field is blank, the Page Title will be used. If you want a different title in the table of contents, enter it here.</li>
<li><b>Insert Page Break.</b> Click this button to insert the pagebreak with the entered fields. The Pagebreak will display as a gray dashed line across the Article. Note that a pagebreak cannot be edited. If you need to change a field in the pagebreak, click on the Article just past the pagebreak, press Backspace until the pagebreak is deleted, then insert a new pagebreak with the desired information.</li>
<li><b>Read more...</b> This button inserts a 'Read more...' break in the Article. This shows as a red dotted line across the Article. If an Article has a 'Read more...' break, only the text before the break, called the Into Text, will initially display, along with a 'Read more...' link. If the User clicks this link, either the entire Article or just the part after the 'Read more...' link is displayed. This depends on the setting of the 'Intro Text' parameters for the Article and in the Global Configuration. The 'Read more...' break allows you to save space on pages by just showing the Intro Text. Note that the 'Read more...' break only shows in the Front Page, Section, and Category Blog layouts. If you want to insert breaks for an Article shown in an Article Layout, use the Page Break button.</li>
</ul>
<p><b>Toggle Editor.</b> If you are using the TinyMCE editor, a Toggle Editor button will show. This button allows you to toggle between the TinyMCE editor and No Editor.</p>
<h3><span class="mw-headline" id="Publishing_Options">Publishing Options</span></h3>
<p><b>Note: This slider can be hidden by users with Admin Permission for the article manager.</b></p>
<p>This section allows you to enter parameters for this Article, as shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:366px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-publishing-options.png" class="image"><img alt="Help25-screenshot-article-edit-publishing-options.png" src="http://docs.joomla.org/images/c/ca/Help25-screenshot-article-edit-publishing-options.png" width="364" height="181" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p>These entries are optional. Joomla! automatically creates default entries for these values.</p>
<ul>
<li><b>Created by</b>. Name of the Joomla! User who created this item. This will default to the currently logged-in user. If you want to change this to a different user, click the Select User button to select a different user.</li>
</ul>
<ul>
<li><b>Created By Alias.</b> This optional field allows you to enter in an alias for this Author for this Article. This allows you to display a different Author name for this Article.</li>
</ul>
<ul>
<li><b>Created Date.</b> This field defaults to the current time when the Article was created. You can enter in a different date and time or click on the calendar icon to find the desired date.</li>
</ul>
<ul>
<li><b>Start Publishing.</b> Date and time to start publishing. Use this field if you want to enter content ahead of time and then have it published automatically at a future time.</li>
</ul>
<ul>
<li><b>Finish Publishing.</b> Date and time to finish publishing. Use this field if you want to have content automatically changed to Unpublished state at a future time (for example, when it is no longer applicable).</li>
</ul>
<h3><span class="mw-headline" id="Article_Options">Article Options</span></h3>
<p><b>Note: This slider can be hidden by users with Admin Permission for the article manager.</b></p>
<p>This is a set of options you can use to control how this article will show in the Featured or Category blog layout. Joomla allows you to set these options at the following levels:</p>
<ol>
<li>In <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Content_Article_Manager_Options" title="Help25:Content Article Manager Options">Article Manager?Options</a></li>
<li>When you set up a <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Menus_Menu_Item_Article_Category_Blog" title="Help25:Menus Menu Item Article Category Blog">Category Blog</a> or <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Menus_Menu_Item_Article_Featured" title="Help25:Menus Menu Item Article Featured">Featured Articles</a> menu item.</li>
<li>When you create the article here.</li>
</ol>
<p>When you create the blog menu item, you can set each of these options as follows:</p>
<ul>
<li><i>Use Global:</i> Uses the setting from <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Content_Article_Manager_Options" title="Help25:Content Article Manager Options">Article Manager?Options</a></li>
<li><i>Yes/No or Hide/Show:</i> Use the setting in that menu item.</li>
<li><i>Use Article Settings:</i> Use the setting set here for the specific article. This allows you to show different articles with different options in the same blog page. For example, one article might show the author and a different article might not show the author.</li>
</ul>
<p>The following Article Options can be set:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:424px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-article-options.png" class="image"><img alt="Help25-screenshot-article-edit-article-options.png" src="http://docs.joomla.org/images/1/14/Help25-screenshot-article-edit-article-options.png" width="422" height="720" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>Show Title.</b> (Use Global/Hide/Show). Whether or not to show the Article's Title.</li>
</ul>
<ul>
<li><b>Linked Titles.</b> (Use Global/No/Yes). If the Article's Title is shown, whether to show it as a link to the article.</li>
</ul>
<ul>
<li><b>Show Intro Text.</b> (Use Global/Hide/Show). If set to Show, the Intro Text of the article will show when you drill down to the article. If set to Hide, only the part of the article after the "Read More" break will show.</li>
</ul>
<ul>
<li><b>Show Category.</b> (Use Global/Hide/Show). Whether or not to show the Article's Category.</li>
</ul>
<ul>
<li><b>Link Category.</b> (Use Global/No/Yes). If the Article's Category is shown, whether to show it as a link to a Category layout (list or blog) for that Category.</li>
</ul>
<ul>
<li><b>Show Parent.</b> (Use Global/Hide/Show). Whether or not to show the Article's Parent Category.</li>
</ul>
<ul>
<li><b>Link Parent.</b> (Use Global/No/Yes). If the Article's Parent Category is shown, whether to show it as a link to a Category layout (list or blog) for that Category.</li>
</ul>
<ul>
<li><b>Show Author.</b> (Use Global/Hide/Show) Whether to show the author of the Article.</li>
</ul>
<ul>
<li><b>Link Author.</b> (Use Global/No/Yes). If the Article's author is shown, whether to show it as a link to a Contact layout for that author. Note that the author must be set up as a Contact in <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Components_Contact_Categories_Edit" title="Help25:Components Contact Categories Edit">Contact Manager: Edit</a>.</li>
</ul>
<ul>
<li><b>Show Create Date.</b> (Use Global/Hide/Show). Whether or not to show the Article's create date.</li>
</ul>
<ul>
<li><b>Show Modify Date.</b> (Use Global/Hide/Show). Whether or not to show the Article's modify date.</li>
</ul>
<ul>
<li><b>Show Publish Date.</b> (Use Global/Hide/Show). Whether or not to show the Article's start publishing date.</li>
</ul>
<ul>
<li><b>Show Navigation.</b> (Use Global/Hide/Show). Whether or not to show a navigation link (for example, Next or Previous article) when you drill down to the article.</li>
</ul>
<ul>
<li><b>Show Icons.</b> (Use Global/Hide/Show). If set to Show, Print and Email will use icons instead of text.</li>
</ul>
<ul>
<li><b>Show Print Icon.</b> (Use Global/Hide/Show). Show or Hide the Print Article button.</li>
</ul>
<ul>
<li><b>Show Email Icon.</b> (Use Global/Hide/Show). Show or Hide the Email Article button.</li>
</ul>
<ul>
<li><b>Show Hits.</b> (Use Global/Hide/Show). Show or Hide the number of times the article has been hit (displayed by a user).</li>
</ul>
<ul>
<li><b>Show Unauthorised Links.</b> (Use Global/No/Yes). If Yes, the Intro Text for restricted articles will show. Clicking on the "Read More" link will require users to log in to view the full article content.</li>
</ul>
<ul>
<li><b>Positioning of the Links.</b> (Use Global/Above/Below). If Above, links are shown above the content. Otherwise they are shown below the content.</li>
<li><b>Read More Text.</b> Optional field that allows you to customize the text that shows for a "read more" link. The default wording for English is "Read more".</li>
<li><b>Alternative Layout.</b> If you have defined one or more alternative layouts for the Single Article menu item, you can select the layout to use for this article. See <a href="/proxy/index.php?option=com_help&view=help&keyref=Layout_Overrides_in_Joomla_1.6" title="Layout Overrides in Joomla 1.6">Layout Overrides in Joomla 1.6</a> for more information about alternative layouts.</li>
</ul>
<h3><span class="mw-headline" id="Configure_Edit_Screen">Configure Edit Screen</span></h3>
<div class="thumb tnone">
<div class="thumbinner" style="width:298px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-configure-edit-screen.png" class="image"><img alt="Help25-screenshot-article-edit-configure-edit-screen.png" src="http://docs.joomla.org/images/e/e2/Help25-screenshot-article-edit-configure-edit-screen.png" width="296" height="162" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p><b>Note: This slider by default is only visible to those with Admin permissions for the Article Manager permissions.</b></p>
<p>On some installations you may need to save the Content Options in order for these options to work.</p>
<ul>
<li><b>Show Publishing Options.</b> (Use Global/No/Yes). If No, the Publishing Options slider in this screen (<strong class="selflink">Article Manager: Add/Edit Screen</strong>) will not show. This means that back-end users will not be able to edit the fields Created by, Created by alias, Created Date, Start Publishing, or Finish Publishing. These fields will always be set to their default values.</li>
<li><b>Show Article Options.</b> (Use Global/No/Yes). If No, the Article Options slider in this screen (<strong class="selflink">Article Manager: Add/Edit Screen</strong>) will not show. This means that back-end users will not be able to edit the fields in this slider. These fields will always be set to their default values.</li>
<li><b>Administrator Images and Links.</b> (Use Global/No/Yes). If Yes, the Images and Links slider will show in this screen (<strong class="selflink">Article Manager: Add/Edit Screen</strong>).</li>
<li><b>Frontend Images and Links.</b> (Use Global/No/Yes). If Yes, the Images and Links fields will show in the Front End article editor screen. These fields allow users to optionally enter two images and three links in an easy-to-use form in the front end. When used with a single-article override, this can allow the site administrator to create a simple form for users to create standard article layouts.</li>
</ul>
<h3><span class="mw-headline" id="Images_and_Links">Images and Links</span></h3>
<p><b>Note: This slider can be hidden by a user with Admin permissions for the article manager.</b> This section lets you display images and links in your articles using standardized layouts.</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:392px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-images-links.png" class="image"><img alt="Help25-screenshot-article-edit-images-links.png" src="http://docs.joomla.org/images/d/dd/Help25-screenshot-article-edit-images-links.png" width="390" height="575" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>Intro Image.</b> Click the Select button to select an image to be displayed in a fixed location in the Intro Text of an article. This will open a modal window that allows you to select an image from your images folder. See <a href="#Editor_Buttons">Editor Buttons</a> for more information on working with images. After you have selected an image, you can hover the mouse on the "Preview" text to see a preview of the image.</li>
<li><b>Image Float.</b> (Use Global/Right/Left/None). Set the float attribute for this image.</li>
<li><b>Alt Text.</b> Set the alt attribute for the this image.</li>
<li><b>Caption.</b> Create a caption for the this image.</li>
</ul>
<ul>
<li><b>Full Article Image.</b> Click the Select button to select an image to be displayed in a fixed location in the Intro Text of an article. This will open a modal window that allows you to select an image from your images folder. See <a href="#Editor_Buttons">Editor Buttons</a> for more information on working with images. After you have selected an image, you can hover the mouse on the "Preview" text to see a preview of the image.</li>
<li><b>Image Float.</b> (Use Global/Right/Left/None). Set the float attribute for this image.</li>
<li><b>Alt Text.</b> Enter optional alt attribute for the this image.</li>
<li><b>Caption.</b> Enter an optional caption for the this image.</li>
</ul>
<ul>
<li><b>URL B Target Window.</b> Sets the default value for the target for the second Link in the article. Same options as URL A.</li>
<li><b>URL C Target Window.</b> Sets the default value for the target for the third Link in the article. Same options as URL A.</li>
<li><b>Link A.</b> The URL for the first link to be displayed in a fixed location in the article text. This must be a full URL, not relative. For example, it normally would start with "http://".</li>
<li><b>Link A Text.</b> The text used for Link A. If blank, the URL will be displayed.</li>
<li><b>URL Target Window.</b> Sets the default value for the target for the first Link in the article. Choices are:
<ul>
<li><i>Open in parent window:</i> Opens the in the main browser window, replacing the current Joomla article.</li>
<li><i>Open in new window:</i> Opens the link in a new browser window.</li>
<li><i>Open in pop up:</i> Opens the link in a pop-up browser window (without full navigation controls).</li>
<li><i>Modal:</i> Opens the link in a modal pop-up window.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Link B.</b> The URL for the second link to be displayed in a fixed location in the article text. This must be a full URL, not relative. For example, For example, it normally would start with "http://".</li>
<li><b>Link B Text.</b> The text used for Link B. If blank, the URL will be displayed.</li>
<li><b>URL Target Window.</b> The target for the URL. Same options as Link A.</li>
</ul>
<ul>
<li><b>Link C</b> The URL for the third link to be displayed in a fixed location in the article text. This must be a full URL, not relative. For example, For example, it normally would start with "http://".</li>
<li><b>Link C Text</b> The text used for Link C. If blank, the URL will be displayed.</li>
<li><b>URL Target Window.</b> The target for the URL. Same options as Link A.</li>
</ul>
<h3><span class="mw-headline" id="Metadata_Options">Metadata Options</span></h3>
<p>This section allows you to enter Metadata Information for this Article. Metadata is information about the Article that is not displayed but is available to Search Engines and other systems to classify the Article. This gives you more control over how the content will be analyzed by these programs. All of these entries are optional. Metadata is shown inside HTML meta elements. The entry screen is shown below:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:423px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-metadata-options.png" class="image"><img alt="Help25-screenshot-article-edit-metadata-options.png" src="http://docs.joomla.org/images/1/16/Help25-screenshot-article-edit-metadata-options.png" width="421" height="281" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<ul>
<li><b>Meta Description.</b> An optional paragraph to be used as the description of the page in the HTML output. This will generally display in the results of search engines. If entered, this creates an HTML meta element with a name attribute of "description" and a content attribute equal to the entered text.</li>
</ul>
<ul>
<li><b>Meta Keywords.</b> Optional entry for keywords. Must be entered separated by commas (for example, "cats, dogs, pets") and may be entered in upper or lower case. (For example, "CATS" will match "cats" or "Cats"). Keywords can be used in several ways:</li>
</ul>
<ol>
<li>To help Search Engines and other systems classify the content of the Article.</li>
<li>In combination with Banner tags, to display specific Banners based on the Article content. For example, say you have one Banner with an ad for dog products and another Banner for cat products. You can have your dog Banner display when a User is viewing a dog-related Article and your cat Banner display for a cat-related Article. To do this, you would:
<ol>
<li>Add the keywords 'dog' and 'cat' to the appropriate Articles.</li>
<li>Add the Tags 'dog' and 'cat' to the appropriate Banners in the <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Components_Banners_Banners_Edit" title="Help25:Components Banners Banners Edit">Banner Manager New/Edit</a> screen.</li>
<li>Set the Banner module Parameter 'Search By Tags' to 'Yes in the <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Extensions_Module_Manager_Banners" title="Help25:Extensions Module Manager Banners">Banner Module Edit</a> screen.</li>
</ol>
</li>
<li>For articles only, in combination with the <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Extensions_Module_Manager_Articles_Related" title="Help25:Extensions Module Manager Articles Related">Related Articles module</a>, to display Articles that share at least one keyword in common. For example, if the current Article displayed has the keywords "cats, dogs, monkeys", any other Articles with at least one of these keywords will show in the Related Articles module.</li>
</ol>
<ul>
<li><b>Robots.</b> The instructions for web "robots" that browse to this page.
<ul>
<li><i>Use Global:</i> Use the value set in the Component?Options for this component.</li>
<li><i>Index, Follow:</i> Index this page and follow the links on this page.</li>
<li><i>No index, Follow:</i> Do not index this page, but still follow the links on the page. For example, you might do this for a site map page where you want the links to be indexed but you don't want this page to show in search engines.</li>
<li><i>Index, No follow:</i> Index this page, but do not follow any links on the page. For example, you might want to do this for an events calendar, where you want the page to show in search engines but you do not want to index each event.</li>
<li><i>No index, no follow:</i> Do not index this page or follow any links on the page.</li>
</ul>
</li>
</ul>
<ul>
<li><b>Author.</b> Optional entry for an Author name within the metadata. If entered, this creates an HTML meta element with the name attribute of "author" and the content attribute as entered here.</li>
</ul>
<ul>
<li><b>Content Rights.</b> Optional metadata field to describe legal rights for the content. Creates an HTML meta element with two attributes: name equals "rights" and content equals the entered text.</li>
</ul>
<ul>
<li><b>External Reference.</b> An optional reference used to link to external data sources. If entered, this creates an HTML meta element with a name attribute of "xreference" and a content attribute equal to the entered text.</li>
</ul>
<h3><span class="mw-headline" id="Article_Permissions">Article Permissions</span></h3>
<p>Joomla lets you set permissions for articles at four levels, as follows.</p>
<ol>
<li>Globally, using <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Site_Global_Configuration#Permissions" title="Help25:Site Global Configuration">Global Configuration</a>.</li>
<li>For all articles, using <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Content_Article_Manager_Options" title="Help25:Content Article Manager Options">Article Manager?Options</a>.</li>
<li>For all articles in a category, using <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Components_Content_Categories_Edit" title="Help25:Components Content Categories Edit">Category Manager</a>.</li>
<li>For an individual article, using this screen.</li>
</ol>
<p>This is where you can enter permissions for this one article. The screen shows as follows.</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:879px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-permissions.png" class="image"><img alt="Help25-screenshot-article-edit-permissions.png" src="http://docs.joomla.org/images/5/53/Help25-screenshot-article-edit-permissions.png" width="877" height="529" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p>To change the permissions for this article, do the following.</p>
<ol>
<li>Select the Group by clicking its title.</li>
<li>Find the desired Action. Possible Actions are:
<dl>
<dd><i>Delete.</i> Users can delete this article.</dd>
<dd><i>Edit.</i> Users can edit this article.</dd>
<dd><i>Edit State.</i> User can change the published state and related information for this article.</dd>
</dl>
</li>
<li>Select the desired permission for the action you wish to change. Possible settings are:
<dl>
<dd><i>Inherited.</i> Inherited for users in this Group from the Global Configuration, Article Manager Options, or Category permissions.</dd>
<dd><i>Allowed.</i> Allowed for users in this Group. Note that, if this action is Denied at one of the higher levels, the Allowed permission here will not take effect. A Denied setting cannot be overridden.</dd>
<dd><i>Denied.</i> Denied for users in this Group.</dd>
</dl>
</li>
<li>Click Save. When the screen refreshes, the Calculated Setting column will show the effective permission for this Group and Action.</li>
</ol>
<h2><span class="mw-headline" id="Toolbar">Toolbar</span></h2>
<p>At the top right you will see the toolbar:</p>
<div class="thumb tnone">
<div class="thumbinner" style="width:410px;"><a href="/proxy/index.php?option=com_help&view=help&keyref=File:Help25-screenshot-article-edit-toolbar.png" class="image"><img alt="Help25-screenshot-article-edit-toolbar.png" src="http://docs.joomla.org/images/1/12/Help25-screenshot-article-edit-toolbar.png" width="408" height="64" class="thumbimage" /></a>
<div class="thumbcaption"></div>
</div>
</div>
<p>The functions are:</p>
<ul>
<li><b>Save</b>. Saves the article and stays in the current screen.</li>
<li><b>Save &amp; Close</b>. Saves the article and closes the current screen.</li>
<li><b>Save &amp; New</b>. Saves the article and keeps the editing screen open and ready to create another article.</li>
<li><b>Save as Copy</b>. Saves your changes to a copy of the current article. Does not affect the current article. This toolbar icon is not shown if you are creating a new article.</li>
<li><b>Cancel/Close</b>. Closes the current screen and returns to the previous screen without saving any modifications you may have made.</li>
<li><b>Help</b>. Opens this help screen.</li>
</ul>
<h2><span class="mw-headline" id="Quick_Tips">Quick Tips</span></h2>
<ul>
<li>The hierarchy of display parameters is as follows:
<ol>
<li><i>Parameters - Advanced</i> for the specific Article. A setting other than 'Use Global' here always controls the setting.</li>
<li><i>Parameters - Component</i> for the Menu Item. If the Parameters - Advanced above is 'Use Global' and this setting is not 'Use Global', then this controls the setting.</li>
<li><i>Global Configuration</i> settings in the Article Manager/Parameters section. Settings here only apply if both of the above are set to 'Use Global'.</li>
</ol>
</li>
</ul>
<dl>
<dd>Example: The 'Title Linkable' setting in the Article's 'Parameters - Advanced' section is set to 'Use Global'. The Menu Item is an Article Layout, and 'Title Linkable' in the 'Parameters - Component' is 'No'. The Global Configuration 'Title Linkable' is set to 'Yes'. The result will be 'Yes', since the Menu Item overrides the Global Configuration.</dd>
</dl>
<ul>
<li>You can add images using either the TinyMCE Insert/Edit Image icon or the Image button below the edit area. For adding new images in an Article, it is easier to use the Image button (below the edit area). This is because it lets you browse to the image file and also lets you upload images. However, for editing an existing image, you need to use the TinyMCE icon. The Image button only supports adding new images.</li>
<li>'Read more...' breaks allow you to save space on the Front Page or on any blog layout page by showing just the first portion of an Article. 'Pagebreaks' allow you to provide multi-page navigation for long Articles. You can use both on one Article, if desired. For example, you could put a 'Read more...' break after the first paragraph of a multi-page article, and have Pagebreaks after each page. No page navigation would display on the Front Page until the User selects the 'Read more...' link. At that time, the Article's table of contents would display showing links to every page.</li>
<li>You can insert a Joomla! Module inside an Article by typing "{loadposition xxx}", where "xxx" is the position entered for the desired Module. Note that the position name must not conflict with a position used by your Joomla! template. It can be any name (e.g., "mymoduleposition1") as long as it matches the position name typed in for the Module. The Menu Assignment for the Module must include the Menu Item where the Article is displayed, and the Plugin called "Content - Load Module" must be enabled (which it is by default). This feature allows you, for example, to insert a Custom HTML Module anywhere in an Article. See <a href="/proxy/index.php?option=com_help&view=help&keyref=Screen.modules.edit.15" title="Screen.modules.edit.15" class="mw-redirect">Module Manager - New/Edit</a> for information about adding modules.</li>
</ul>
<h2><span class="mw-headline" id="Related_Information">Related Information</span></h2>
<ul>
<li>To find and edit existing Articles: <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Content_Article_Manager" title="Help25:Content Article Manager">Article Manager</a></li>
<li>To set options for the TinyMCE editor: <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Extensions_Plugin_Manager_Edit#Editor_-_TinyMCE" title="Help25:Extensions Plugin Manager Edit">TinyMCE Editor Plugin</a></li>
<li>To set options for the CodeMirror editor: <a href="/proxy/index.php?option=com_help&view=help&keyref=Help25:Extensions_Plugin_Manager_Edit#Editor_-_CodeMirror" title="Help25:Extensions Plugin Manager Edit">CodeMirror Editor Plugin</a></li>
</ul>

<!-- 
NewPP limit report
Preprocessor node count: 465/1000000
Post-expand include size: 30448/2097152 bytes
Template argument size: 639/2097152 bytes
Expensive parser function count: 0/100
-->

<!-- Saved in parser cache with key docsj_mediawiki:pcache:idhash:23049-0!1!0!!en!2!edit=0 and timestamp 20120629011106 -->
<div id="license">License: <a href="http://docs.joomla.org/JEDL">Joomla! Electronic Documentation License</a></div>
<div id="source-page">Source page: <a href="http://docs.joomla.org/Help25:Content_Article_Manager_Edit">http://docs.joomla.org/Help25:Content_Article_Manager_Edit</a></div>
<div id="profiler"> Page retrieved: 0.188 seconds, 6.04 MB<br />
</div>
<div id="copyright">Copyright &copy; 2012 <a href="http://www.opensourcematters.org">Open Source Matters, Inc.</a>  All rights reserved.</div>