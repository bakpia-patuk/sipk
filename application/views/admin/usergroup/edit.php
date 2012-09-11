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
            $$('div#user-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#user-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_user-sliders', $$('div#user-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#user-sliders.pane-sliders > .panel > h3').length == $$('div#user-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_user-sliders',-1);
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
	var MCSessionTimeout = 900000;
	var MCSessionLang = {
		"expired": "Session Expired"
	}
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
	<div id="user-box">
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
                    case 'usergroup.apply':
                        var jform_task = document.getElementById('jform_task')
                        jform_task.value = 'usergroup.apply';
                        var jform_form = document.getElementById('usergroup-form');
                        jform_form.action = "<?php echo site_url('admin/usergroup/add'); ?>";
                        Joomla.submitform(task, document.getElementById('usergroup-form'));
                        break;
                    case 'usergroup.save':
                        var form = document.getElementById('usergroup-form');
                        form.action = "<?php echo site_url('admin/usergroup/add'); ?>";
                        Joomla.submitform(task, document.getElementById('usergroup-form'));
                        break;
                    case 'usergroup.save2new':
                        var form = document.getElementById('usergroup-form');
                        form.action = "<?php echo site_url('admin/usergroup/add'); ?>";
                        Joomla.submitform(task, document.getElementById('usergroup-form'));
                        break;
                }
                if (task == 'usergroup.cancel' || document.formvalidator.isValid(document.id('usergroup-form'))) {
                    Joomla.submitform(task, document.getElementById('usergroup-form'));
                }
            }
		</script>
        <?php echo validation_errors(); ?>
		<form action="<?php echo site_url('admin/usergroup'); ?>" method="post" name="adminForm" id="usergroup-form" class="form-validate">
			<div class="width-100">
				<fieldset class="adminform">
					<legend>
						<?php
							if ($is_new)
								echo "User Group Baru";
							else
								echo "Edit User Group";
						?>
					</legend>
					<ul class="adminformlist">
						<li>
							<label id="jform_nama-lbl" for="jform_nama" class="hasTip required" title="">Nama Group<span class="star">&nbsp;*</span></label>
                            <input type="hidden" name="jform[id]" id="jform_id" value="<?php echo $data->id; ?>">
							<input name="jform[group]" id="jform_nama" class="inputbox required" size="54" maxlength="100" type="text" value="<?php echo htmlentities($data->group); ?>" >
						</li>
					</ul>
					<div class="clr"></div>
				</fieldset>
                <input type="hidden" name="task" id="jform_task" value="" />
			</div>
			<div class="clr"></div>
		</form>
	</div>
	<div class="mc-clr"></div>
</div>