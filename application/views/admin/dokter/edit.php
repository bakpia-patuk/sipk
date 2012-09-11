<?php
	//print_r($data);
	//print_r($dokter_praktek);
?>
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
            $$('div#dokter-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#dokter-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_dokter-sliders', $$('div#dokter-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#dokter-sliders.pane-sliders > .panel > h3').length == $$('div#dokter-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_dokter-sliders',-1);
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
    Calendar._DN = new Array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	Calendar._SDN = new Array ("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
	Calendar._FD = 0;
	Calendar._MN = new Array ("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	Calendar._SMN = new Array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	Calendar._TT = {};
	Calendar._TT["INFO"] = "About the Calendar";
	Calendar._TT["ABOUT"] =
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
        editor_selector: "mce_editable",
        language: "en",
        mode: "specific_textareas",
        skin: "default",
        theme: "advanced",
        // Cleanup/Output
        inline_styles: true,
        gecko_spellcheck: true,
        entity_encoding: "raw",
        extended_valid_elements: "hr[id|title|alt|class|width|size|noshade|style],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style],a[id|class|name|href|target|title|onclick|rel|style]",
        force_br_newlines: false, 
        force_p_newlines: true, 
        forced_root_block: 'p',
        invalid_elements: "script,applet,iframe",
        // URL
        relative_urls: true,
        remove_script_host: false,
        document_base_url: "<?php echo base_url(); ?>",
        // Layout
        content_css: "<?php echo base_url('css/admin/editor.css'); ?>",
        // Advanced theme
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_source_editor_height: "550",
        theme_advanced_source_editor_width: "750",
        theme_advanced_resizing: true,
        theme_advanced_resize_horizontal: false,
        theme_advanced_statusbar_location: "bottom", 
        theme_advanced_path: true
    });
</script>
<script src="<?php echo base_url('js/jquery-1.7.2.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tambah_tempat_praktek').bind('click', function(e) {
            var lastOrdering = parseInt($('#last_ordering').val());
            var ordering = lastOrdering + 1;
            $('#last_ordering').val(ordering)
            
			e.preventDefault();
			/* $('#praktek').clone()
				.attr('id', '')
				.addClass('praktek')
				.appendTo('#containerPraktek')
				.slideDown(500); */
				
			var cln = $('#praktek').clone();
			cln.attr('id', '')
				.addClass('praktek')
				.find('#jform_praktek_alamat-lbl').attr('id', 'jform_praktek_alamat_' + ordering + '-lbl')
					.attr('for', 'jform_alamat_praktek_' + ordering);
			cln.find('#jform_praktek_id').attr('id', 'jform_praktek_id_' + ordering)
				.attr('name', 'jform[praktek_id][]')
				.val('new_praktek_id_' + ordering);
			cln.find('#jform_dokter_praktek_id').attr('id', 'jform_dokter_praktek_id_' + ordering)
				.attr('name', 'jform[dokter_praktek_id][]')
				.val('new_dokter_praktek_' + ordering);
			cln.find('#jform_alamat_praktek').attr('id', 'jform_alamat_praktek_' + ordering)
				.attr('name', 'jform[alamat_praktek][]');
			
			cln.find('#jform_telepon_praktek-lbl').attr('id', 'jform_telepon_praktek_' + ordering + '-lbl')
				.attr('for', 'jform_telepon_praktek_' + ordering);
			cln.find('#jform_telepon_praktek').attr('id', 'jform_telepon_praktek_' + ordering + '-lbl')
				.attr('name', 'jform[telepon_praktek][]');
			
			cln.find('#jform_no_izin_praktek-lbl').attr('id', 'jform_no_izin_praktek_' + ordering + '-lbl')
				.attr('for', 'jform_no_izin_praktek_' + ordering);
			cln.find('#jform_no_izin_praktek').attr('id', 'jform_no_izin_praktek_' + ordering)
				.attr('name', 'jform[no_izin_praktek][]');

			cln.appendTo('#containerPraktek')
				.slideDown(500);
        });
		
		$('#containerPraktek').on('click', '.hapus_praktek', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.praktek').slideUp(500, function() {
				$(this).remove();
			});
		});
        
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
	<div id="dokter-box">
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
                    case 'dokter.apply':
                        var jform_task = document.getElementById('jform_task')
                        jform_task.value = 'dokter.apply';
                        var jform_form = document.getElementById('dokter-form');
                        jform_form.action = "<?php echo site_url('admin/dokter/add?'); ?>";
                        Joomla.submitform(task, document.getElementById('dokter-form'));
                        break;
                    case 'dokter.save':
                        var form = document.getElementById('dokter-form');
                        form.action = "<?php echo site_url('admin/dokter/add'); ?>";
                        Joomla.submitform(task, document.getElementById('dokter-form'));
                        break;
                    case 'spesdokterialis.save2new':
                        var form = document.getElementById('dokter-form');
                        form.action = "<?php echo site_url('admin/dokter/add'); ?>";
                        Joomla.submitform(task, document.getElementById('dokter-form'));
                        break;
                }
                if (task == 'dokter.cancel' || document.formvalidator.isValid(document.id('dokter-form'))) {
                    Joomla.submitform(task, document.getElementById('dokter-form'));
                }
            }
		</script>
		<form action="<?php echo site_url('admin/dokter'); ?>" method="post" name="adminForm" id="dokter-form" class="form-validate">
			<div class="width-60 fltlft">
				<fieldset class="adminform">
					<legend>
                        <?php
							if ($is_new)
								echo "Dokter Baru";
							else
								echo "Edit Dokter";
						?>
                    </legend>
					<ul class="adminformlist">
						<li>
							<label id="jform_nama-lbl" for="jform_nama" class="hasTip required" title="Nama::Nama Dokter.">Nama<span class="star"> *</span></label>
                            <input type="hidden" name="jform[id]" id="jform_id" value="<?php echo $data->id; ?>">
							<input type="text" name="jform[nama]" id="jform_nama" value="<?php echo $data->nama; ?>" class="inputbox required mc-bigger-field" size="54" maxlength="50" autocomplete="off" />
                            <?php echo form_error('jform[nama]'); ?>
						</li>
                        <li>
							<label id="jform_state-lbl" for="jform_state" class="hasTip" title="Status::Set status penerbitan.">Status</label>
                            <select id="jform_state" name="jform[state]" class="inputbox" size="1">
                                <?php
                                    foreach ($dokter_state AS $key => $value) {
                                        if ($key == $data->state)
                                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                                        else
                                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
						</li>
						<li>
							<label id="jform_wilayah-lbl" for="jform_state" class="hasTip" title="Wilayah::Wilayah.">Wilayah</label>
                            <select id="jform_wilayah" name="jform[wilayah]" class="inputbox" size="1">
                                <?php
                                    foreach ($dokter_wilayah AS $key => $value) {
                                        if ($key == $data->wilayah)
                                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                                        else
                                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
						</li>
                        <li>
							<label id="jform_alamat-lbl" for="jform_alamat" class="hasTip" title="Alamat::Alamat Dokter">Alamat</label>
							<textarea name="jform[alamat]" id="jform_alamat" cols="30" rows="2" maxlength="255" class="inputbox"><?php echo $data->alamat; ?></textarea>
						</li>
						<li>
							<label id="jform_telepon-lbl" for="jform_telepon" class="hasTip" title="Telepon::Telepon dokter">Telepon</label>
							<input type="text" name="jform[telepon]" id="jform_telepon" value="<?php echo $data->telepon; ?>" class="inputbox required mc-bigger-field" size="54" maxlength="50" autocomplete="off" />
						</li>
						<li>
                            <label id="jform_praktek-lbl" class="hasTip" title="">Praktek</label>
                            <div id="containerPraktek" style="margin-left: 150px;">
								<?php
									$count = count($dokter_praktek);
								?>
                                <input id="last_ordering" name="last_ordering" type="hidden" value="<?php echo $count; ?>" />
                                <?php
                                    $idx = 0;
                                    foreach ($dokter_praktek as $praktek) {
                                ?>
                                <div class="praktek">
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_praktek_alamat_<?php echo $idx; ?>-lbl" for="jform_alamat_praktek_<?php echo $idx; ?>" class="hasTip" title="">Alamat</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input name="jform[praktek_id][]" id="jform_praktek_id_<?php echo $idx; ?>" type="hidden" value="<?php echo $praktek->id; ?>" />
										<textarea name="jform[alamat_praktek][]" id="jform_alamat_praktek_<?php echo $idx; ?>" class="inputbox" maxlength="255"  rows="2" style="width: 217px;"><?php echo $praktek->alamat; ?></textarea>
                                    </div>
                                    <div style="float: left; width: 100px; margin-left: 2px;">
                                        <div class="button2-left">
                                            <div class="blank">
												<a class="hapus_praktek" title="Hapus" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_telepon_praktek-lbl<?php echo $idx; ?>" for="jform_telepon_praktek_<?php echo $idx; ?>" class="hasTip" title="">Telepon</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input type="text" name="jform[telepon_praktek][]" id="jform_telepon_praktek_<?php echo $idx; ?>" class="inputbox" value="<?php echo htmlentities($praktek->telepon); ?>" size="31" maxlength="50" autocomplete="off" />
                                    </div>
                                    <div class="clr"></div>
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_no_izin_praktek-lbl<?php echo $idx; ?>" for="jform_no_izin_praktek_<?php echo $idx; ?>" class="hasTip" title="">No. Izin Praktek</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input type="text" name="jform[no_izin_praktek][]" id="jform_no_izin_praktek_<?php echo $idx; ?>" class="inputbox" value="<?php echo htmlentities($praktek->no_izin); ?>" size="31" maxlength="50" autocomplete="off" />
                                    </div>
                                    <div class="clr"></div>
                                    <hr>
                                </div>
                                <?php
                                        $idx++;
                                    }
                                ?>
								
								<div id="praktek" style="display: none;">
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_praktek_alamat-lbl" for="jform_alamat_praktek" class="hasTip" title="">Alamat</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input id="jform_praktek_id" type="hidden" value="" />
										<input id="jform_dokter_praktek_id" type="hidden" value="" />
										<textarea id="jform_alamat_praktek" class="inputbox" maxlength="255"  rows="2" style="width: 217px;"></textarea>
                                    </div>
                                    <div style="float: left; width: 100px; margin-left: 2px;">
                                        <div class="button2-left">
                                            <div class="blank">
                                                <a class="hapus_praktek" title="Hapus" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_telepon_praktek-lbl" class="hasTip" title="">Telepon</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input type="text" id="jform_telepon_praktek" class="inputbox" value="" size="31" maxlength="50" autocomplete="off" />
                                    </div>
                                    <div class="clr"></div>
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_no_izin_praktek-lbl" class="hasTip" title="">No. Izin Praktek</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input type="text" id="jform_no_izin_praktek" class="inputbox" value="" size="31" maxlength="50" autocomplete="off" />
                                    </div>
                                    <div class="clr"></div>
                                    <hr>
                                </div>
								
                            </div>
                            <div style="margin-left: 150px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a id="tambah_tempat_praktek" title="Tambah Alamat Praktek" href="#">Tambah Alamat Praktek</a>
                                    </div>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </li>
                        <li>
							<label id="jform_masa_berlaku_izin-lbl" for="jform_masa_berlaku_izin" class="hasTip" title="Masa Berlaku Izin Praktek:">Masa Berlaku Izin Praktek</label>
							<?php
								$value = set_value('jform[masa_berlaku_izin]', $data->masa_berlaku_izin);
							?>
							<input name="jform[masa_berlaku_izin]" id="jform_masa_berlaku_izin" class="inputbox" size="54" maxlength="50" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" />
						</li>
						<li>
							<label id="jform_spesialis-lbl" for="jform_spesialis_id" class="hasTip" title="Spesialis::Spesialis dokter.">Spesialis</label>
							<?php
								$value = set_value('jform[spesialis_id]', $data->spesialis_id);
							?>
                            <select id="jform_spesialis_id" name="jform[spesialis_id]" class="inputbox" size="1">
                                <?php
                                    foreach ($dokter_spesialis AS $key => $val) {
                                        if ($value == $key)
                                            echo "<option value=\"{$key}\" selected=\"selected\">{$val->spesialis}&nbsp;&nbsp;</option>";
                                        else
                                            echo "<option value=\"{$key}\">{$val->spesialis}&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
						</li>
						<li>
							<label id="jform_email-lbl" for="jform_email" class="hasTip" title="E-Mail:">E-Mail</label>
							<?php
								$value = set_value('jform[email]', $data->email);
							?>
							<input name="jform[email]" id="jform_email" class="inputbox" size="54" maxlength="255" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" />
						</li>
						<li>
							<label id="jform_website-lbl" for="jform_website" class="hasTip" title="Web Site:">Web Site</label>
							<?php
								$value = set_value('jform[website]', $data->website);
							?>
							<input name="jform[website]" id="jform_website" class="inputbox" size="54" maxlength="255" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" />
						</li>
						<div class="clr"></div>
						<label id="jform_catatan-lbl" for="jform_catatan" class="hasTip" title="">Catatan</label>
						<div class="clr"></div>
						<?php
							$value = set_value('jform[catatan]', $data->catatan);
						?>
						<textarea name="jform[catatan]" id="jform_catatan" cols="0" rows="0" style="width:100%; height:100px;" class="mce_editable"><?php echo $value; ?></textarea>
						<div id="editor-xtd-buttons"></div>
						<div class="toggle-editor">
							<div class="button2-left">
								<div class="blank">
									<a href="#" onclick="tinyMCE.execCommand('mceToggleEditor', true, 'jform_catatan');return false;" title="Toggle editor">Toggle editor</a>
								</div>
							</div>
						</div>
					</ul>
					<div class="clr"></div>
				</fieldset>
			</div>
			<div class="width-40 fltrt">
				<div id="dokter-sliders" class="pane-sliders">
					<div style="display:none;">
						<div></div>
					</div>
					<div class="panel">
						<h3 class="pane-toggler title" id="publishing-details">
							<a href="javascript:void(0);">
								<span>Publishing Options</span>
							</a>
						</h3>
						<div class="pane-slider dokter">
							<fieldset class="panelform">
								<ul class="adminformlist">
                                    <li>
                                        <label id="jform_created_by-lbl" for="jform_created_by" class="hasTip" title="Created by::You can change here the name of the user who created the article.">Created by</label>
                                        <div class="fltlft">
                                            <input type="text" id="jform_created_by_name" value="<?php echo empty($data->created_by) ? "Select a User" : $data->created_by; ?>" disabled>
                                        </div>
                                        <div class="button2-left">
                                            <div class="blank">
                                                <a class="modal_jform_created_by" title="Select User" href="<?php echo site_url('admin/user/select_user'); ?>" rel="{handler: 'iframe', size: {x: 800, y: 500}}">Select User</a>
                                            </div>
                                        </div>
                                        <input type="hidden" id="jform_created_by_id" name="jform[created_by]" value="<?php echo $data->created_by; ?>" />
                                    </li>
                                    <li>
                                        <label id="jform_created_by_alias-lbl" for="jform_created_by_alias" class="hasTip" title="Created by alias::You can enter here an alias to be displayed instead of the name of the user who created the article.">Created by alias</label>
                                        <input type="text" name="jform[created_by_alias]" id="jform_created_by_alias" value="<?php echo $data->created_by_alias; ?>" class="inputbox" size="20" maxlength="255" />
                                    </li>
									<li>
										<label id="jform_created-lbl" for="jform_created" class="hasTip" title="Created Date::Dokter created date">Created Date</label>
										<?php
											$created = strftime( "%d-%m-%Y %H:%M:%S", strtotime($data->created));
											$str_created = strftime( "%A, %d %B %Y", strtotime($data->created));
										?>
										<input type="text" title="<?php echo $str_created; ?>" name="jform[created]" id="jform_created" value="<?php echo $created; ?>" size="22" class="inputbox">
										<img src="<?php echo base_url('images/admin/calendar.png'); ?>" alt="Calendar" class="calendar" id="jform_created_img">
									</li>
                                    <?php
                                        if (isset($data->id) && ($data->id != 0)) {
                                    ?>
                                    <li>
                                        <label id="jform_modified_by-lbl" for="jform_modified_by" class="">Modified by</label>
                                        <div class="fltlft">
                                            <input type="text" id="jform_modified_by_name" value="<?php echo $data->modified_by; ?>" disabled class="readonly">
                                        </div>
                                        <div class="button2-left">
											<div class="blank"></div>
                                        </div>
                                        <input type="hidden" id="jform_modified_by_id" name="jform[modified_by]" value="42">
                                    </li>
                                    <li>
                                        <label id="jform_modified-lbl" for="jform_modified" class="hasTip" title="Modified Date::The date and time that the article was last modified.">Modified Date</label>
										<?php
											$modified = strftime( "%d-%m-%Y %H:%M:%S", strtotime($data->modified));
											$str_modified = strftime( "%A, %d %B %Y", strtotime($data->modified));
										?>
                                        <input type="text" title="<?php echo $str_modified; ?>" name="jform[modified]" id="jform_modified" value="<?php echo $modified; ?>" size="22" class="readonly" readonly>
                                    </li>
                                    <li>
                                        <label id="jform_version-lbl" for="jform_version" class="hasTip" title="Revision::A count of the number of times this article has been revised.">Revision</label>
                                        <input type="text" name="jform[version]" id="jform_version" value="<?php echo $data->version; ?>" class="readonly" size="6" readonly>
                                    </li>
                                    <li>
                                        <label id="jform_hits-lbl" for="jform_hits" class="hasTip" title="Hits::Number of hits for this article">Hits</label>
                                        <input type="text" name="jform[hits]" id="jform_hits" value="<?php echo $data->hits; ?>" class="readonly" size="6" readonly>
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
						<div class="pane-slider dokter">
							<fieldset class="panelform">
								<ul class="adminformlist">
									<li>
										<label id="jform_metakey-lbl" for="jform_metakey" class="hasTip" title="Meta Keywords::Enter here the meta keywords for the Dokter">Meta Keywords</label>
                                        <textarea name="jform[metakey]" id="jform_metakey" cols="30" rows="3" class="inputbox"><?php echo $data->metakey; ?></textarea>
									</li>
									<li>
										<label id="jform_own_prefix-lbl" for="jform_own_prefix" class="hasTip" title="Use Own Prefix::Use own prefix or the client prefix">Use Own Prefix</label>
										<fieldset id="jform_own_prefix" class="radio inputbox">
											<input type="radio" id="jform_own_prefix0" name="jform[own_prefix]" value="0"<?php echo $data->own_prefix == FALSE ? ' checked' : ''; ?> />
											<label for="jform_own_prefix0">No</label>
											<input type="radio" id="jform_own_prefix1" name="jform[own_prefix]" value="1"<?php echo $data->own_prefix == TRUE ? ' checked' : ''; ?> />
											<label for="jform_own_prefix1">Yes</label>
										</fieldset>
									</li>
									<li>
										<label id="jform_metakey_prefix-lbl" for="jform_metakey_prefix" class="hasTip" title="Meta Keyword Prefix::When matching Meta Keywords, only search for Meta Keywords with this prefix (improves performance).">Meta Keyword Prefix</label>
                                        <input type="text" name="jform[metakey_prefix]" id="jform_metakey_prefix" value="<?php echo $data->metakey_prefix; ?>">
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
