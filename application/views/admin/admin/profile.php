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
	window.addEvent('domready', function() {
		new Fx.Accordion(
			$$('div#sliders.pane-sliders > .panel > h3.pane-toggler'), 
			$$('div#sliders.pane-sliders > .panel > div.pane-slider'), {
				onActive: function(toggler, i) {
					toggler.addClass('pane-toggler-down');
					toggler.removeClass('pane-toggler');
					i.addClass('pane-down');
					i.removeClass('pane-hide');
					Cookie.write('jpanesliders_sliders',$$('div#sliders.pane-sliders > .panel > h3').indexOf(toggler));
				},
				onBackground: function(toggler, i) {
					toggler.addClass('pane-toggler');
					toggler.removeClass('pane-toggler-down');
					i.addClass('pane-hide');
					i.removeClass('pane-down');
					if($$('div#sliders.pane-sliders > .panel > h3').length==$$('div#sliders.pane-sliders > .panel > h3.pane-toggler').length)
						Cookie.write('jpanesliders_sliders',-1);
				},
				duration: 300,
				opacity: false,
				alwaysHide: true
			}
		);
	});

	var updateEditor = function(){
		var editor = document.id('editor_selection');
		var xhr = new Request({
			url: 'index.php?process=ajax&model=quickeditor&id=43&editor=' + editor.value + '&nocache=' + (Date.now() + Math.random(0, 50000)).toInt(),
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
	<div id="mc-title">
		<?php
			echo $module_title;
			echo $help->render();
			echo $toolbar->render();
		?>
		<div class="mc-clr"></div>
	</div>
	<div id="mc-submenu"></div>
	<div id="mc-component">
		<script type="text/javascript">
			Joomla.submitbutton = function(task)
			{
				if (task == 'profile.cancel' || document.formvalidator.isValid(document.id('profile-form'))) {
					Joomla.submitform(task, document.getElementById('profile-form'));
				}
			}
		</script>
		<form action="<?php site_url('admin/profile/index'); ?>" method="post" name="adminForm" id="profile-form" class="form-validate">
			<div class="width-60 fltlft">
				<fieldset class="adminform">
					<legend>My Profile Details</legend>
					<ul class="adminformlist">
						<li><label id="jform_name-lbl" for="jform_name" class="hasTip required" title="Name::Enter the name of the user">Name<span class="star">&#160;*</span></label>				<input type="text" name="jform[name]" id="jform_name" value="Dadang Dana Suryana" class="inputbox required" size="30"/></li>
						<li><label id="jform_username-lbl" for="jform_username" class="hasTip required" title="Login Name::Enter the login name (User name) for the user.">Login Name<span class="star">&#160;*</span></label>				<input type="text" name="jform[username]" id="jform_username" value="Dadang" class="inputbox required" size="30"/></li>
						<li><label id="jform_password-lbl" for="jform_password" class="hasTip" title="Password::Enter the password for the user">Password</label>				<input type="password" name="jform[password]" id="jform_password" value="" autocomplete="off" class="inputbox" size="30"/></li>
						<li><label id="jform_password2-lbl" for="jform_password2" class="hasTip" title="Confirm Password::Confirm the user's password">Confirm Password</label>				<input type="password" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="inputbox" size="30"/></li>
						<li><label id="jform_email-lbl" for="jform_email" class="hasTip required" title="Email::Enter an email for the user">Email<span class="star">&#160;*</span></label>				<input type="text" name="jform[email]" class="validate-email inputbox required" id="jform_email" value="asti_aprily@yahoo.co.id" size="30"/></li>
						<li><label id="jform_registerDate-lbl" for="jform_registerDate" class="hasTip" title="Registration Date::Registration Date">Registration Date</label>				<input type="text" title="Friday, 27 January 2012" name="jform[registerDate]" id="jform_registerDate" value="2012-01-27 06:36:13" size="22" class="readonly" readonly="readonly" /></li>
						<li><label id="jform_lastvisitDate-lbl" for="jform_lastvisitDate" class="hasTip" title="Last Visit Date::Last Visit Date">Last Visit Date</label>				<input type="text" title="Wednesday, 04 July 2012" name="jform[lastvisitDate]" id="jform_lastvisitDate" value="2012-07-04 19:18:14" size="22" class="readonly" readonly="readonly" /></li>
						<li><label id="jform_id-lbl" for="jform_id" class="hasTip" title="ID::Record number in the database">ID</label>				<input type="text" name="jform[id]" id="jform_id" value="43" class="readonly" readonly="readonly"/></li>
					</ul>
				</fieldset>
			</div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="9b14dc2ba42da66b9603f7cf2082008b" value="1" />
		</form>
	</div>
	<div class="mc-clr"></div>
</div>
			