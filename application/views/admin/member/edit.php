<script type="text/javascript">
    window.addEvent('domready', function() {
        $$('.hasTip').each(function(el) {
            var title = el.get('title');
            if (title) {
                var parts = title.split('::', 2);
                el.store('tip:title', parts[0]);
                el.store('tip:text', parts[1]);
            }
        });
        var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false});
    });
    /*
    function keepAlive() {
        var myAjax = new Request({method: "get", url: "index.php"}).send();
    }
    window.addEvent("domready", function() {
        keepAlive.periodical(840000);
    });
    */
    window.addEvent('domready', function() {
        SqueezeBox.initialize({});
        SqueezeBox.assign($$('a.modal-button'), {
            parse: 'rel'
        });
    });
    function isBrowserIE() {
        return navigator.appName=="Microsoft Internet Explorer";
    }
    function jInsertEditorText( text, editor ) {
        if (isBrowserIE()) {
            if (window.parent.tinyMCE) {
                window.parent.tinyMCE.selectedInstance.selection.moveToBookmark(window.parent.global_ie_bookmark);
            }
        }
        tinyMCE.execInstanceCommand(editor, 'mceInsertContent',false,text);
    }

    var global_ie_bookmark = false;

    function IeCursorFix() {
        if (isBrowserIE()) {
            tinyMCE.execCommand('mceInsertContent', false, '');
            global_ie_bookmark = tinyMCE.activeEditor.selection.getBookmark(false);
        }
        return true;
    }
    
    function jSelectArticle(id, title, catid, object) {
        var tag = '<a href='+'"index.php?option=com_content&amp;view=article&amp;catid='+catid+'&amp;id='+id+'">'+title+'</a>';
        jInsertEditorText(tag, 'jform_articletext');
        SqueezeBox.close();
    }
    window.addEvent('domready', function() {
        SqueezeBox.initialize({});
        SqueezeBox.assign($$('a.modal'), {
            parse: 'rel'
        });
    });
    function insertReadmore(editor) {
        var content = tinyMCE.get('jform_articletext').getContent();
        if (content.match(/<hr\s+id=("|')system-readmore("|')\s*\/*>/i)) {
            alert('There is already a Read more... link that has been inserted. Only one such link is permitted. Use {pagebreak} to split the page up further.');
            return false;
        } else {
            jInsertEditorText('<hr id="system-readmore" />', editor);
        }
    }
    window.addEvent('domready', function() {
        new Fx.Accordion(
            $$('div#memberprofile-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#memberprofile-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_memberprofile-sliders', $$('div#memberprofile-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#memberprofile-sliders.pane-sliders > .panel > h3').length == $$('div#memberprofile-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_memberprofile-sliders',-1);
                },
                duration: 300,
                opacity: false,
                alwaysHide: true
            }
        );
    });
    window.addEvent('domready', function() {
        new Fx.Accordion(
            $$('div#member-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#member-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_member-sliders', $$('div#member-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#member-sliders.pane-sliders > .panel > h3').length == $$('div#member-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_member-sliders',-1);
                },
                duration: 300,
                opacity: false,
                alwaysHide: true
            }
        );
    });
	window.addEvent('domready', function() {
		SqueezeBox.initialize({});
		SqueezeBox.assign($$('a.modal_jform_created_by'), {
			parse: 'rel'
		});
	});
	function jSelectUser_jform_created_by(id, title) {
		var old_id = document.getElementById("jform_created_by_id").value;
		if (old_id != id) {
			document.getElementById("jform_created_by_id").value = id;
			document.getElementById("jform_created_by_name").value = title;
			
		}
		SqueezeBox.close();
	}
    Calendar._DN = new Array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"); Calendar._SDN = new Array ("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"); Calendar._FD = 0; Calendar._MN = new Array ("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); Calendar._SMN = new Array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"); Calendar._TT = {};Calendar._TT["INFO"] = "About the Calendar"; Calendar._TT["ABOUT"] =
    "DHTML Date/Time Selector\n" +
    "(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
    "For latest version visit: http://www.dynarch.com/projects/calendar/\n" +
    "Distributed under GNU LGPL.  See http://gnu.org/licenses/lgpl.html for details." +
    "\n\n" +
    "Date selection:\\n" +
    "- Use the « and » buttons to select year\\n" +
    "- Use the < and > buttons to select month\\n" +
    "- Hold mouse button on any of the above buttons for faster selection.";
    Calendar._TT["ABOUT_TIME"] = "\n\n" +
    "Time selection:\n" +
    "- Click on any of the time parts to increase it\n" +
    "- or Shift-click to decrease it\n" +
    "- or click and drag for faster selection.";
    Calendar._TT["PREV_YEAR"] = "Click to move to the previous year. Click and hold for a list of years.";
	Calendar._TT["PREV_MONTH"] = "Click to move to the previous month. Click and hold for a list of the months.";
	Calendar._TT["GO_TODAY"] = "Go to today";
	Calendar._TT["NEXT_MONTH"] = "Click to move to the next month. Click and hold for a list of the months.";
	Calendar._TT["NEXT_YEAR"] = "Click to move to the next year. Click and hold for a list of years.";
	Calendar._TT["SEL_DATE"] = "Select a date.";
	Calendar._TT["DRAG_TO_MOVE"] = "Drag to move";
	Calendar._TT["PART_TODAY"] = "Today";
	Calendar._TT["DAY_FIRST"] = "Display %s first";
	Calendar._TT["WEEKEND"] = "0,6";
	Calendar._TT["CLOSE"] = "Close";
	Calendar._TT["TODAY"] = "Today";
	Calendar._TT["TIME_PART"] = "(Shift-)Click or Drag to change the value.";
	Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d";
	Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";
	Calendar._TT["WK"] = "wk";
	Calendar._TT["TIME"] = "Time:";
    window.addEvent('domready', function() {
		Calendar.setup({
			// Id of the input field
			inputField: "jform_created",
			// Format of the input field
			//ifFormat: "%Y-%m-%d %H:%M:%S",
			ifFormat: "%d-%m-%Y %H:%M:%S",
			// Trigger for the calendar (button ID)
			button: "jform_created_img",
			// Alignment (defaults to "Bl")
			align: "Tl",
			singleClick: true,
			firstDay: 0
		});
	});
	window.addEvent('domready', function() {
		Calendar.setup({
			// Id of the input field
			inputField: "jform_tanggal_lahir",
			// Format of the input field
			//ifFormat: "%Y-%m-%d %H:%M:%S",
			ifFormat: "%d-%m-%Y %H:%M:%S",
			// Trigger for the calendar (button ID)
			button: "jform_tanggal_lahir_img",
			// Alignment (defaults to "Bl")
			align: "Tl",
			singleClick: true,
			firstDay: 0
		});
	});
	/*
	window.addEvent('domready', function() {
		toggler = document.id('mc-article-tabs')
		element = document.id('mc-article')
		if(element) {
			document.switcher = new JSwitcher(toggler, element);
		}
	});
	var updateEditor = function(){
		var editor = document.id('editor_selection');
		var xhr = new Request({
			url: 'index.php?process=ajax&model=quickeditor&id=42&editor=' + editor.value + '&nocache=' + (Date.now() + Math.random(0, 50000)).toInt(),
			method: 'get',
			onRequest: editorAjax.request,
			onSuccess: editorAjax.success,
		}).send();
	};
	
	var editorAjax = {
		'request': function(){
			document.id('editor_spinner').setStyle('display', 'block');
			document.id('editor_selection').getParent().getFirst().setStyle('margin-left', 10);
		},
		'success': function(){
			document.id('editor_spinner').setStyle('display', 'none');
			document.id('editor_selection').getParent().getFirst().setStyle('margin-left', 0);
		}
	};
	window.addEvent('domready', function(){
		document.id('editor_selection').addEvent('change', updateEditor);
	});
	*/
	var MCSessionTimeout = 900000;
	var MCSessionLang = {
		"expired": "Session Expired"
	}
</script>
<script type="text/javascript" src="<?php echo base_url('media/editors/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General
        directionality: "ltr",
        editor_selector : "mce_editable",
        language : "en",
        mode : "specific_textareas",
        skin : "default",
        theme : "advanced",
        // Cleanup/Output
        inline_styles : true,
        gecko_spellcheck : true,
        entity_encoding : "raw",
        extended_valid_elements : "hr[id|title|alt|class|width|size|noshade|style],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style],a[id|class|name|href|target|title|onclick|rel|style]",
        force_br_newlines : false, force_p_newlines : true, forced_root_block : 'p',
        invalid_elements : "script,applet,iframe",
        // URL
        relative_urls : true,
        remove_script_host : false,
        document_base_url : "http://localhost/joomla/",
        // Layout
        content_css : "http://localhost/joomla/templates/system/css/editor.css",
        // Advanced theme
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_source_editor_height : "550",
        theme_advanced_source_editor_width : "750",
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : false,
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_path: true
    });
</script>
<script src="<?php echo base_url('js/jquery-1.7.2.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		switch ($('#status_menikah').val()) {
			case 'Menikah':
				$("#pasangan").show();
				$("#anak_anak").show();
				break;
			case 'Belum Menikah':
				$("#pasangan").hide();
				$("#anak_anak").hide();
				break;
			case 'Bercerai':
				$("#pasangan").hide();
				$("#anak_anak").show();
				break;
		}
		$('#status_menikah').bind('change', function(){
			switch ($(this).val()) {
				case 'Menikah':
					$("#pasangan").show();
					$("#anak_anak").show();
					break;
				case 'Belum Menikah':
					$("#pasangan").hide();
					$("#anak_anak").hide();
					break;
				case 'Bercerai':
					$("#pasangan").hide();
					$("#anak_anak").show();
					break;
			}
			$('#label_nama_pasangan').text(sNamaPasangan);
		});
		
		(function($){
			$.Toggle = function(oCheck, sText, sCombo) {
				if (oCheck.checked) {
					$('#' + sText).hide();
					$('#' + sCombo).show();
				}
				else {
					$('#' + sText).show();
					$('#' + sCombo).hide();
				}
			};
		})(jQuery);
		
	});
	
</script>
<div class="mc-wrapper">
	<div id="system-message-container">
        <?php
            //message, error, notice
            $message_data = $this->session->flashdata('message');
            $message_type = $message_data['type'];
            $message_title = ucfirst($message_data['type']);;
            $message_message = $message_data['message'];
            if ($message_message) {
        ?>
        <dl id="system-message">
            <dt class="<?php echo $message_type; ?>"><?php echo $message_title; ?></dt>
            <dd class="<?php echo $message_type; ?> message">
                <ul>
                    <li><?php echo $message_message; ?></li>
                </ul>

            </dd>
        </dl>
        <?php
            }
        ?>
    </div>
	<div id="member-box">
		<div id="toolbar-box">
			<div class="m">
				<div id="mc-title">
					<?php
						echo $module_title;
						echo $help->render();
						echo $toolbar->render();
					?>
					<div class="mc-clr"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="mc-component" class="clearfix">
		<script type="text/javascript">
			Joomla.submitbutton = function(task)
            {
                switch (task) {
                    case 'member.apply':
                        var jform_task = document.getElementById('jform_task')
                        jform_task.value = 'member.apply';
                        var jform_form = document.getElementById('member-form');
                        jform_form.action = "<?php echo site_url('admin/member/add'); ?>";
                        Joomla.submitform(task, document.getElementById('member-form'));
                        break;
                    case 'member.save':
                        var form = document.getElementById('member-form');
                        form.action = "<?php echo site_url('admin/member/add'); ?>";
                        Joomla.submitform(task, document.getElementById('member-form'));
                        break;
                    case 'member.save2new':
                        var form = document.getElementById('member-form');
                        form.action = "<?php echo site_url('admin/member/add'); ?>";
                        Joomla.submitform(task, document.getElementById('member-form'));
                        break;
                }
                if (task == 'member.cancel' || document.formvalidator.isValid(document.id('member-form'))) {
                    Joomla.submitform(task, document.getElementById('member-form'));
                }
            }
		</script>
		<form action="<?php echo site_url('admin/member'); ?>" method="post" name="adminForm" id="member-form" class="form-validate">
			<div class="width-60 fltlft">
				<fieldset class="adminform">
					<legend>
						<?php
							if ($is_new)
								echo "Member Baru";
							else
								echo "Edit Member";
						?>
					</legend>
                    
                    <div id="memberprofile-sliders" class="pane-sliders">
						<div style="display:none;">
							<div></div>
						</div>
						<?php echo $this->load->view('admin/member/umum'); ?>
						<?php echo $this->load->view('admin/member/kesehatan'); ?>
						<?php echo $this->load->view('admin/member/pendidikan'); ?>
						<?php echo $this->load->view('admin/member/keahlian'); ?>
						<?php echo $this->load->view('admin/member/bahasa'); ?>
						<?php echo $this->load->view('admin/member/organisasi'); ?>
						<?php echo $this->load->view('admin/member/pengalaman_kerja'); ?>
						<?php echo $this->load->view('admin/member/hobby'); ?>
                        <?php echo $this->load->view('admin/member/prestasi'); ?>
						<?php echo $this->load->view('admin/member/lain_lain'); ?>
					</div>
					<div class="clr"></div>
				</fieldset>
			</div>
			<div class="width-40 fltrt">
				<div id="member-sliders" class="pane-sliders">
					<div style="display:none;">
						<div></div>
					</div>
					<div class="panel">
						<h3 class="pane-toggler title" id="publishing-details">
							<a href="javascript:void(0);">
								<span>Publishing Options</span>
							</a>
						</h3>
						<div class="pane-slider member">
							<fieldset class="panelform">
								<ul class="adminformlist">
                                    <li>
                                        <label id="jform_created_by-lbl" for="jform_created_by" class="hasTip" title="Created by::You can change here the name of the user who created the article.">Created by</label>
                                        <div class="fltlft">
                                            <input type="text" id="jform_created_by_name" value="<?php echo empty($data->created_by) ? "Select a User" : $data->created_by; ?>" disabled>
                                        </div>
                                        <div class="button2-left">
                                            <div class="blank">
                                                <a class="modal_jform_created_by" title="Select User" href="<?php echo site_url('admin/user'); ?>" rel="{handler: 'iframe', size: {x: 800, y: 500}}">Select User</a>
                                            </div>
                                        </div>
                                        <input type="hidden" id="jform_created_by_id" name="jform[created_by]" value="<?php echo $data->created_by; ?>" />
                                    </li>
                                    <li>
                                        <label id="jform_created_by_alias-lbl" for="jform_created_by_alias" class="hasTip" title="Created by alias::You can enter here an alias to be displayed instead of the name of the user who created the article.">Created by alias</label>
                                        <input type="text" name="jform[created_by_alias]" id="jform_created_by_alias" value="<?php echo $data->created_by_alias; ?>" class="inputbox" size="20" maxlength="255" />
                                    </li>
									<li>
										<label id="jform_created-lbl" for="jform_created" class="hasTip" title="Created Date::Member created date">Created Date</label>
										<input type="text" title="Saturday, 01 January 2011" name="jform[created]" id="jform_created" value="2011-01-01 00:00:01" size="22" class="inputbox">
										<img src="<?php echo base_url('images/admin/calendar.png'); ?>" alt="Calendar" class="calendar" id="jform_created_img">
									</li>
                                    <?php
                                        if (isset($id)) {
                                    ?>
                                    <li>
                                        <label id="jform_modified_by-lbl" for="jform_modified_by" class="">Modified by</label>
                                        <div class="fltlft">
                                            <input type="text" id="jform_modified_by_name" value="admin" disabled class="readonly">
                                        </div>
                                        <div class="button2-left">
                                        <div class="blank"></div>
                                        </div>
                                        <input type="hidden" id="jform_modified_by_id" name="jform[modified_by]" value="42">
                                    </li>
                                    <li>
                                        <label id="jform_modified-lbl" for="jform_modified" class="hasTip" title="Modified Date::The date and time that the article was last modified.">Modified Date</label>
                                        <input type="text" title="Saturday, 17 September 2011" name="jform[modified]" id="jform_modified" value="2011-09-17 22:18:05" size="22" class="readonly" readonly>
                                    </li>
                                    <li>
                                        <label id="jform_version-lbl" for="jform_version" class="hasTip" title="Revision::A count of the number of times this article has been revised.">Revision</label>
                                        <input type="text" name="jform[version]" id="jform_version" value="5" class="readonly" size="6" readonly>
                                    </li>
                                    <li>
                                        <label id="jform_hits-lbl" for="jform_hits" class="hasTip" title="Hits::Number of hits for this article">Hits</label>
                                        <input type="text" name="jform[hits]" id="jform_hits" value="7" class="readonly" size="6" readonly>
                                    </li>
									<li>
										<label id="jform_sticky-lbl" for="jform_sticky" class="hasTip" title="Sticky::Whether or not the Member is 'sticky'. If one or more Member in a Category are sticky, they will take priority over Member that are not sticky. For example, if two Member in a Category are sticky and a third Member is not sticky, the third Member will not display if the module setting is 'Sticky, Randomise'. Only the two sticky Member will display.">Sticky</label>
										<select id="jform_sticky" name="jform[sticky]">
											<option value="0" selected>No</option>
											<option value="1">Yes</option>
										</select>
									</li>
                                    <?php
                                        }
                                    ?>
								</ul>
							</fieldset>
						</div>
					</div>
					<div class="panel">
						<h3 class="pane-toggler title" id="metadata">
							<a href="javascript:void(0);">
								<span>Metadata Options</span>
							</a>
						</h3>
						<div class="pane-slider member">
							<fieldset class="panelform">
								<ul class="adminformlist">
									<li>
										<label id="jform_metakey-lbl" for="jform_metakey" class="hasTip" title="Meta Keywords::Enter here the meta keywords for the Member">Meta Keywords</label>
                                        <textarea name="jform[metakey]" id="jform_metakey" cols="30" rows="3" class="inputbox"></textarea>
									</li>
									<li>
										<label id="jform_own_prefix-lbl" for="jform_own_prefix" class="hasTip" title="Use Own Prefix::Use own prefix or the client prefix">Use Own Prefix</label>
										<fieldset id="jform_own_prefix" class="radio inputbox">
											<input type="radio" id="jform_own_prefix0" name="jform[own_prefix]" value="0" checked>
											<label for="jform_own_prefix0">No</label>
											<input type="radio" id="jform_own_prefix1" name="jform[own_prefix]" value="1">
											<label for="jform_own_prefix1">Yes</label>
										</fieldset>
									</li>
									<li>
										<label id="jform_metakey_prefix-lbl" for="jform_metakey_prefix" class="hasTip" title="Meta Keyword Prefix::When matching Meta Keywords, only search for Meta Keywords with this prefix (improves performance).">Meta Keyword Prefix</label>						<input type="text" name="jform[metakey_prefix]" id="jform_metakey_prefix" value="">
									</li>
								</ul>
							</fieldset>
						</div>
					</div>
				</div>
                <input type="hidden" name="task" id="jform_task" value="" />
			</div>
			<div class="clr"></div>
		</form>
	</div>
	<div class="mc-clr"></div>
</div>