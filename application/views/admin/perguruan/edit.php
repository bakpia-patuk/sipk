<?php
	print_r($_POST);
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
            $$('div#perguruan-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#perguruan-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_perguruan-sliders', $$('div#perguruan-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#perguruan-sliders.pane-sliders > .panel > h3').length == $$('div#perguruan-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_perguruan-sliders',-1);
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
			ifFormat: "%Y-%m-%d %H:%M:%S",
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
		
		$('#tambah_program_studi').bind('click', function(e) {
			var lastOrderingPS = parseInt($(this).parent().parent().parent().find('#program_studi_last_ordering').val());
			if (isNaN(lastOrderingPS)) {
				lastOrderingPS = 0;
			}
			var ordering = lastOrderingPS + 1;
            $(this).parent().parent().parent().find('#program_studi_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#program_studi_panel').clone();
			cln.attr('id', '')
				.addClass('program_studi_panel');
			
			cln.find('#jform_program_studi-lbl').attr('id', 'jform_program_studi_' + ordering + '-lbl')
                .attr('for', 'jform_program_studi_' + ordering);
			cln.find('#jform_program_studi_id').attr('id', 'jform_program_studi_id_' + ordering)
                .attr('id', 'jform_program_studi_id_' + ordering)
                .attr('name', 'jform[program_studi_id][]')
                .val('new_program_studi_' + ordering);
			cln.find('#jform_program_studi_perguruan_id').attr('id', 'jform_program_studi_perguruan_id_' + ordering)
                .attr('name', 'jform[program_studi_perguruan_id][]')
                .val('new_program_studi_perguruan_' + ordering);
			cln.find('#jform_program_studi').attr('id', 'jform_program_studi_' + ordering)
                .attr('name', 'jform[program_studi][]');
			
			cln.find('#fakultas_container').attr('id', 'fakultas_container_' + ordering);
			cln.find('#fakultas_last_ordering').attr('id', 'fakultas_last_ordering_' + ordering);
			cln.find('#tambah_fakultas').attr('id', 'tambah_fakultas_' + ordering);
			
			cln.appendTo('#program_studi_container')
				.slideDown(500);
			
		});
		
		$('#program_studi_canvas').on('click', '.hapus_program_studi', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.program_studi_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        $('#program_studi_canvas').on('click', '.tambah_fakultas', function(e) {
			var sId = $(this).attr('id');
			var aPS = sId.split('_');
			var programStudiIndex = aPS[2];
			var lastOrderingFakultas = parseInt($(this).parent().parent().parent().find('#fakultas_last_ordering_' + programStudiIndex).val());
			if (isNaN(lastOrderingFakultas)) {
				lastOrderingFakultas = 0;
			}
			var ordering = lastOrderingFakultas + 1;
            $(this).parent().parent().parent().find('#fakultas_last_ordering_' + programStudiIndex).val(ordering);
			
			e.preventDefault();
			
			var cln = $('#fakultas_panel').clone();
			cln.attr('id', '')
				.addClass('fakultas_panel');
			
            cln.find('#jform_fakultas-lbl').attr('id', 'jform_fakultas_' + ordering + '-lbl')
                .attr('for', 'jform_fakultas_' + programStudiIndex + '_' + ordering);
			cln.find('#jform_fakultas_id').attr('id', 'jform_fakultas_id_' + programStudiIndex + '_' + ordering)
                .attr('name', 'jform_fakultas_id[' + programStudiIndex + '][]')
			cln.find('#jform_fakultas_program_studi_id').attr('id', 'jform_fakultas_program_studi_id_' + programStudiIndex + '_' + ordering)
                .attr('name', 'jform_fakultas_program_studi_id[' + programStudiIndex + '][]');
			cln.find('#jform_fakultas').attr('id', 'jform_fakultas_' + programStudiIndex + '_' + ordering)
                .attr('name', 'jform_fakultas[' + programStudiIndex + '][]');
                
			cln.find('#jurusan_container').attr('id', 'jurusan_container_' + programStudiIndex + '_' + ordering);
			cln.find('#jurusan_last_ordering').attr('id', 'jurusan_last_ordering_' + programStudiIndex + '_' + ordering);
			cln.find('#tambah_jurusan').attr('id', 'tambah_jurusan_' + programStudiIndex + '_' + ordering);
			
			cln.appendTo('#fakultas_container_' + programStudiIndex)
				.slideDown(500);
			
		});
		
		$('#program_studi_canvas').on('click', '.hapus_fakultas', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.fakultas_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
		
		$('#program_studi_canvas').on('click', '.tambah_jurusan', function(e) {
			var sId = $(this).attr('id');
			var aFak = sId.split('_');
			var programStudiIndex = aFak[2];
			var fakultasIndex = aFak[3];
			var lastOrderingJurusan = parseInt($(this).parent().parent().parent().find('#jurusan_last_ordering_' + programStudiIndex + '_' + fakultasIndex).val());
			if (isNaN(lastOrderingJurusan)) {
				lastOrderingJurusan = 0;
			}
			var ordering = lastOrderingJurusan + 1;
            $(this).parent().parent().parent().find('#jurusan_last_ordering_' + programStudiIndex + '_' + fakultasIndex).val(ordering);
			
			e.preventDefault();
			
			var cln = $('#jurusan_panel').clone();
			cln.attr('id', '')
				.addClass('jurusan_panel');
                
			cln.find('#jform_jurusan_id').attr('id', 'jform_jurusan_id_' + programStudiIndex + '_' + fakultasIndex + '_' + ordering)
                .attr('name', 'jform[jurusan_id][' + programStudiIndex + '][' + fakultasIndex + '][]');
			cln.find('#jform_jurusan_fakultas_id').attr('id', 'jform_jurusan_fakultas_id_' + programStudiIndex + '_' + fakultasIndex + '_' + ordering)
                .attr('name', 'jform_jurusan_fakultas_id[' + programStudiIndex + '][' + fakultasIndex + '][]');
			cln.find('#jform_jurusan').attr('id', 'jform_jurusan_' + programStudiIndex + '_' + fakultasIndex + '_' + ordering)
                .attr('name', 'jform_jurusan[' + programStudiIndex + '][' + fakultasIndex + '][]');
                
			cln.find('#jform_konsentrasi').attr('id', 'jform_konsentrasi_' + programStudiIndex + '_' + fakultasIndex + '_' + ordering)
                .attr('name', 'jform_konsentrasi[' + programStudiIndex + '][' + fakultasIndex + '][]');
				
			cln.appendTo('#jurusan_container_' + programStudiIndex + '_' + fakultasIndex)
				.slideDown(500);
			
		});
		
		$('#program_studi_canvas').on('click', '.hapus_jurusan', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.jurusan_panel').slideUp(500, function() {
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
	<div id="perguruan-box">
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
                    case 'perguruan.apply':
                        var jform_task = document.getElementById('jform_task')
                        jform_task.value = 'perguruan.apply';
                        var jform_form = document.getElementById('perguruan-form');
                        jform_form.action = "<?php echo site_url('admin/perguruan/add?'); ?>";
                        Joomla.submitform(task, document.getElementById('perguruan-form'));
                        break;
                    case 'perguruan.save':
                        var form = document.getElementById('perguruan-form');
                        form.action = "<?php echo site_url('admin/perguruan/add'); ?>";
                        Joomla.submitform(task, document.getElementById('perguruan-form'));
                        break;
                    case 'perguruan.save2new':
                        var form = document.getElementById('perguruan-form');
                        form.action = "<?php echo site_url('admin/perguruan/add'); ?>";
                        Joomla.submitform(task, document.getElementById('perguruan-form'));
                        break;
                }
                if (task == 'perguruan.cancel' || document.formvalidator.isValid(document.id('perguruan-form'))) {
                    Joomla.submitform(task, document.getElementById('perguruan-form'));
                }
            }
		</script>
        <?php echo validation_errors(); ?>
		<form action="<?php echo site_url('admin/perguruan'); ?>" method="post" name="adminForm" id="perguruan-form" class="form-validate">
			<div class="width-60 fltlft">
				<fieldset class="adminform">
					<legend>
						<?php
							if ($is_new)
								echo "Perguruan Tinggi Baru";
							else
								echo "Edit Perguruan Tinggi";
						?>
					</legend>
					<ul class="adminformlist">
						<li>
							<label id="jform_nama-lbl" for="jform_nama" class="hasTip required" title="">Nama<span class="star">&nbsp;*</span></label>
							<input type="hidden" name="jform[id]" id="jform_id" value="<?php echo $data->id; ?>">
							<input name="jform[nama]" id="jform_nama" class="inputbox required" size="54" maxlength="50" type="text" value="<?php echo htmlentities($data->nama); ?>" >
						</li>
                        <li>
							<label id="jform_state-lbl" for="jform_state" class="hasTip" title="Status::Set status penerbitan.">Status</label>
                            <select id="jform_state" name="jform[state]" class="inputbox" size="1">
                                <?php
                                    foreach ($perguruan_state AS $key => $value) {
                                        if ($key == $data->state)
                                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                                        else
                                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
						</li>
						<li>
							<label id="jform_akronim-lbl" for="jform_akronim" class="hasTip" title="">Akronim</label>
							<input name="jform[akronim]" id="jform_akronim" class="inputbox" size="54" maxlength="50" type="text" value="<?php echo htmlentities($data->akronim); ?>" >
						</li>
						<li>
							<label id="jform_kategori-lbl" for="jform_kategori" class="hasTip" title="Status::Set kategori.">Kategori</label>
							<select id="jform_kategori" name="jform[kategori]" class="inputbox" size="1">
								<?php
									foreach ($perguruan_kategori AS $key => $value) {
										if ($key == $data->kategori)
											echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
										else
											echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
									}
								?>
							</select>
						</li>
						<li>
							<label id="jform_status-lbl" for="jform_status" class="hasTip" title="Status::Set status.">Status Sekolah</label>
							<select id="jform_status" name="jform[status]" class="inputbox" size="1">
								<?php
									foreach ($perguruan_status AS $key => $value) {
										if ($key == $data->status)
											echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
										else
											echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
									}
								?>
							</select>
						</li>
						<li>
							<label id="jform_akreditasi-lbl" for="jform_akreditasi" class="hasTip" title="Akreditasi::Set status akreditasi.">Status Akreditasi</label>
							<select id="jform_akreditasi" name="jform[akreditasi]" class="inputbox" size="1">
								<?php
									foreach ($perguruan_akreditasi AS $key => $value) {
										if ($key == $data->akreditasi)
											echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
										else
											echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
									}
								?>
							</select>
						</li>
						<li>
							<label id="jform_wilayah-lbl" for="jform_wilayah" class="hasTip" title="Wilayah::Set status wilayah.">Wilayah</label>
							<select id="jform_wilayah" name="jform[wilayah]" class="inputbox" size="1">
								<?php
									foreach ($perguruan_wilayah AS $key => $value) {
										if ($key == $data->wilayah)
											echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
										else
											echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
									}
								?>
							</select>
						</li>
						<li>
							<label id="jform_alamat-lbl" for="jform_alamat" class="hasTip" title="">Alamat</label>
							<textarea name="jform[alamat]" id="jform_alamat" cols="30" rows="2" maxlength="255" class="inputbox"><?php echo htmlentities($data->alamat); ?></textarea>
						</li>
						<li>
							<label id="jform_telepon1-lbl" for="jform_telepon1" class="hasTip" title="">Telepon 1</label>
							<input name="jform[telepon1]" id="jform_telepon1" class="inputbox" size="54" maxlength="50" type="text" value="<?php echo htmlentities($data->telepon1); ?>" >
						</li>
						<li>
							<label id="jform_telepon2-lbl" for="jform_telepon2" class="hasTip" title="">Telepon 2</label>
							<input name="jform[telepon2]" id="jform_telepon2" class="inputbox" size="54" maxlength="50" type="text" value="<?php echo htmlentities($data->telepon2); ?>" >
						</li>
						<li>
							<label id="jform_fax-lbl" for="jform_fax" class="hasTip" title="">Fax</label>
							<input name="jform[fax]" id="jform_fax" class="inputbox" size="54" maxlength="50" type="text" value="<?php echo htmlentities($data->fax); ?>" >
						</li>
						<li>
							<label id="jform_rektor-lbl" for="jform_rektor" class="hasTip" title="">Nama Pimpinan</label>
							<input name="jform[rektor]" id="jform_rektor" class="inputbox" size="54" maxlength="50" type="text" value="<?php echo htmlentities($data->rektor); ?>" >
						</li>
						
						<li>
							<label id="jform_program_studi-lbl" for="jform_program_studi" class="hasTip" title="">Program Studi</label>
							<div id="program_studi_canvas" style="margin-left: 150px;">
								<div id="program_studi_container" style="">
									<input type="hidden" id="program_studi_last_ordering" name="program_studi_last_ordering" value="0" />
									<!-- Program Studi Panel -->
								</div>
								<div class="program_studi_button button2-left">
									<div class="blank">
										<a id="tambah_program_studi" title="Tambah Program Studi" href="#">Tambah Program Studi</a>
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</li>
                        
                        <div id="program_studi_panel" style="display: none;">
                            <div style="float: left; width: 100px;">
                                <label id="jform_program_studi-lbl" for="jform_program_studi" class="hasTip" title="">Program Studi</label>
                            </div>
                            <div style="float: left; width: 281px;">
                                <input id="jform_program_studi_id" type="hidden" value="" />
                                <input id="jform_program_studi_perguruan_id" type="hidden" value="0" />
                                <select id="jform_program_studi" class="inputbox" size="1">
                                    <?php
                                        foreach ($perguruan_program_studi AS $key => $value) {
                                            if ($key == $data->wilayah)
                                                echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                                            else
                                                echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div style="float: left; width: 100px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_program_studi" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
							<div class="clr"></div>
							<div class="fakultas_canvas" style="margin-top: 4px;">
								<div id="fakultas_container" style="float: left; width: 494px; margin-left: 25px;">
									<input id="fakultas_last_ordering" name="fakultas_last_ordering" type="hidden" value="" />
								</div>
								<div class="fakultas_button button2-left" style="margin-left: 25px;">
									<div class="blank">
										<a id="tambah_fakultas" class="tambah_fakultas" title="Tambah Fakultas" href="#">Tambah Fakultas</a>
									</div>
								</div>
							</div>
							<div class="clr"></div>
							<hr>
                        </div>
                        
                        <div id="fakultas_panel" style="display: none;">
                            <div style="float: left; width: 100px;">
                                <label id="jform_fakultas-lbl" for="jform_fakultas" class="hasTip" title="">Nama Fakultas</label>
                            </div>
                            <div style="float: left; width: 256px;">
                                <input type="hidden" id="jform_fakultas_id" value="" />
                                <input type="hidden" id="jform_fakultas_program_studi_id" value="" />
                                <input type="text" id="jform_fakultas" class="inputbox" value="" size="31" maxlength="50" autocomplete="off" />
                            </div>
                            <div style="float: left; width: 100px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_fakultas" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
							<div class="clr"></div>
							<div class="jurusan_canvas" style="margin-top: 4px;">
								<div id="jurusan_container" style="float: left; width: 467px; margin-left: 25px;">
									<input type="hidden" name="jurusan_last_ordering" id="jurusan_last_ordering" value="0" />
								</div>
								<div class="jurusan_button button2-left" style="margin-left: 25px;">
									<div class="blank">
										<a id="tambah_jurusan" class="tambah_jurusan" title="Tambah Jurusan" href="#">Tambah Jurusan</a>
									</div>
								</div>
							</div>
                            <div class="clr"></div>
                            <hr>
                        </div>
                        
                        <div id="jurusan_panel" style="display: none;">
                            <div style="float: left; width: 100px;">
                                <label id="jform_jurusan-lbl" for="jform_jurusan" class="hasTip" title="">Nama Jurusan</label>
                            </div>
                            <div style="float: left; width: 230px;">
                                <input type="hidden" id="jform_jurusan_id" value="" />
                                <input type="hidden" id="jform_jurusan_fakultas_id" value="" />
                                <input type="text" id="jform_jurusan" class="inputbox" value="" size="31" maxlength="50" autocomplete="off" />
                            </div>
                            <div style="float: left; width: 100px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_jurusan" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <div style="float: left; width: 100px;">
                                <label id="jform_konsentrasi-lbl" for="jform_konsentrasi" class="hasTip" title="">Konsentrasi</label>
                            </div>
                            <div style="float: left; width: 230px;">
                                <textarea id="jform_konsentrasi" class="inputbox" maxlength="255"  rows="2" style="width: 217px;"></textarea>
                            </div>
                            <div class="clr"></div>
                            <hr>
                        </div>
						
						<!--li>
							<label id="jform_program_studi-lbl" for="jform_program_studi" class="hasTip" title="">Program Studi</label>
                            <div class="containerProgramStudi" style="margin-left: 150px; border: 1px solid #000; background: #00F;">
                                <input id="last_ordering_ps" name="last_ordering_ps" type="hidden" value="" />
                                <div class="program_studi">
                                    <div style="float: left; width: 100px;">
                                        <label id="jform_program_studi-lbl" for="jform_program_studi" class="hasTip" title="">Program Studi</label>
                                    </div>
                                    <div style="float: left; width: 230px;">
                                        <input name="jform[program_studi_id][]" id="jform_program_studi_id" type="hidden" value="" />
										<input name="jform[program_studi_perguruan_id][]" id="jform_program_studi_perguruan_id" type="hidden" value="" />
										<select id="jform_program_studi" name="jform[program_studi]" class="inputbox" size="1">
                                            begin php
                                                foreach ($perguruan_program_studi AS $key => $value) {
                                                    if ($key == $data->wilayah)
                                                        echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                                                    else
                                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                                }
                                            end php
                                        </select>
                                    </div>
                                    <div style="float: left; width: 100px; margin-left: 2px;">
                                        <div class="button2-left">
                                            <div class="blank">
												<a class="hapus_program_studi" title="Hapus" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="containerFakultas" style="float: left; width: 494px; margin-left: 25px; border: 1px solid #000; background: #0F0;">
                                        <input id="last_ordering_fakultas" name="last_ordering_fakultas" type="hidden" value="" />
                                        <div class="fakultas">
                                            <div style="float: left; width: 100px;">
                                                <label id="jform_fakultas-lbl" for="jform_fakultas" class="hasTip" title="">Nama Fakultas</label>
                                            </div>
                                            <div style="float: left; width: 230px;">
                                                <input name="jform[fakultas_id][]" id="jform_program_studi_id" type="hidden" value="" />
                                                <input name="jform[fakultas_program_studi_id][]" id="jform_fakultas_program_studi_id" type="hidden" value="" />
                                                <input type="text" name="jform[fakultas][]" id="jform_fakultas" class="inputbox" value="" size="31" maxlength="50" autocomplete="off" />
                                            </div>
                                            <div style="float: left; width: 100px; margin-left: 2px;">
                                                <div class="button2-left">
                                                    <div class="blank">
                                                        <a class="hapus_fakultas" title="Hapus" href="#">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="containerJurusan" style="float: left; width: 467px; margin-left: 25px; border: 1px solid #000; background: #F00;">
                                                <input id="last_ordering_jurusan" name="last_ordering_jurusan" type="hidden" value="" />
                                                <div class="jurusan">
                                                    <div style="float: left; width: 100px;">
                                                        <label id="jform_jurusan-lbl" for="jform_jurusan" class="hasTip" title="">Nama Jurusan</label>
                                                    </div>
                                                    <div style="float: left; width: 230px;">
                                                        <input name="jform[jurusan_id][]" id="jform_jurusan_id" type="hidden" value="" />
                                                        <input name="jform[jurusan_fakultas_id][]" id="jform_jurusan_fakultas_id" type="hidden" value="" />
                                                        <input type="text" name="jform[jurusan][]" id="jform_jurusan" class="inputbox" value="" size="31" maxlength="50" autocomplete="off" />
                                                    </div>
                                                    <div style="float: left; width: 100px; margin-left: 2px;">
                                                        <div class="button2-left">
                                                            <div class="blank">
                                                                <a class="hapus_jurusan" title="Hapus" href="#">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="float: left; width: 100px;">
                                                        <label id="jform_konsentrasi-lbl" for="jform_konsentrasi" class="hasTip" title="">Konsentrasi</label>
                                                    </div>
                                                    <div style="float: left; width: 230px;">
                                                        <textarea name="jform[konsentrasi][]" id="jform_konsentrasi" class="inputbox" maxlength="255"  rows="2" style="width: 217px;"></textarea>
                                                    </div>
                                                    <div class="clr"></div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="button2-left" style="margin-left: 25px; border: 1px solid #000;">
                                                <div class="blank">
                                                    <a id="tambah_jurusan" title="Tambah Jurusan" href="#">Tambah Jurusan</a>
                                                </div>
                                            </div>
                                            <div class="clr"></div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="button2-left" style="margin-left: 25px; border: 1px solid #000;">
                                        <div class="blank">
                                            <a id="tambah_fakultas" title="Tambah Fakultas" href="#">Tambah Fakultas</a>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                    <hr>
                                </div>
                            </div>
                            <div style="margin-left: 150px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a id="tambah_program_studi" title="Tambah Program Studi" href="#">Tambah Program Studi</a>
                                    </div>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </li-->
						
						<li>
							<label id="jform_email-lbl" for="jform_email" class="hasTip" title="">E-Mail</label>
							<input name="jform[email]" id="jform_email" class="inputbox" size="54" maxlength="255" type="text" value="<?php echo htmlentities($data->email); ?>" >
						</li>
						<li>
							<label id="jform_website-lbl" for="jform_website" class="hasTip" title="">Web Site</label>
							<input name="jform[website]" id="jform_website" class="inputbox" size="54" maxlength="255" type="text" value="<?php echo htmlentities($data->website); ?>" >
						</li>
						<div class="clr"></div>
						<label id="jform_menutype-lbl" for="jform_deskripsi" class="hasTip" title="">Deskripsi</label>
						<div class="clr"></div>
						<textarea name="jform[deskripsi]" id="jform_deskripsi" cols="0" rows="0" style="width:100%; height:250px;" class="mce_editable"><?php echo $data->deskripsi; ?></textarea>
						<div id="editor-xtd-buttons"></div>
						<div class="toggle-editor">
							<div class="button2-left">
								<div class="blank">
									<a href="#" onclick="tinyMCE.execCommand('mceToggleEditor', true, 'jform_deskripsi');return false;" title="Toggle editor">Toggle editor</a>
								</div>
							</div>
						</div>
					</ul>
					<div class="clr"></div>
				</fieldset>
			</div>
			<div class="width-40 fltrt">
				<div id="perguruan-sliders" class="pane-sliders">
					<div style="display:none;">
						<div></div>
					</div>
					<div class="panel">
						<h3 class="pane-toggler title" id="publishing-details">
							<a href="javascript:void(0);">
								<span>Publishing Options</span>
							</a>
						</h3>
						<div class="pane-slider perguruan">
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
                                        <input type="hidden" id="jform_created_by_id" name="jform[created_by]" value="<?php echo $data->id; ?>" />
                                    </li>
                                    <li>
                                        <label id="jform_created_by_alias-lbl" for="jform_created_by_alias" class="hasTip" title="Created by alias::You can enter here an alias to be displayed instead of the name of the user who created the article.">Created by alias</label>
                                        <input type="text" name="jform[created_by_alias]" id="jform_created_by_alias" value="<?php echo $data->created_by_alias; ?>" class="inputbox" size="20" maxlength="255" />
                                    </li>
									<li>
										<label id="jform_created-lbl" for="jform_created" class="hasTip" title="Created Date::Perguruan created date">Created Date</label>
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
										<label id="jform_sticky-lbl" for="jform_sticky" class="hasTip" title="Sticky::Whether or not the Perguruan is 'sticky'. If one or more Perguruan in a Category are sticky, they will take priority over Perguruan that are not sticky. For example, if two Perguruan in a Category are sticky and a third Perguruan is not sticky, the third Perguruan will not display if the module setting is 'Sticky, Randomise'. Only the two sticky Perguruan will display.">Sticky</label>
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
						<div class="pane-slider perguruan">
							<fieldset class="panelform">
								<ul class="adminformlist">
									<li>
										<label id="jform_metakey-lbl" for="jform_metakey" class="hasTip" title="Meta Keywords::Enter here the meta keywords for the Perguruan">Meta Keywords</label>
                                        <textarea name="jform[metakey]" id="jform_metakey" cols="30" rows="3" class="inputbox"></textarea>
									</li>
									<li>
										<label id="jform_own_prefix-lbl" for="jform_own_prefix" class="hasTip" title="Use Own Prefix::Use own prefix or the client prefix">Use Own Prefix</label>						<fieldset id="jform_own_prefix" class="radio inputbox">
										<input type="radio" id="jform_own_prefix0" name="jform[own_prefix]" value="0" checked><label for="jform_own_prefix0">No</label><input type="radio" id="jform_own_prefix1" name="jform[own_prefix]" value="1"><label for="jform_own_prefix1">Yes</label>
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