<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:0px;">
	<div id="s5_component_wrap">
		<div id="s5_component_wrap_inner">
			<div id="system-message-container"></div>
			<div class="registration">
				<form id="member-registration" action="/demo/vertex/index.php/component/users/?task=registration.register" method="post" class="form-validate">
					<fieldset>
						<legend>User Registration</legend>
						<dl>
							<dt>
								<span class="spacer">
									<span class="before"></span>
									<span class="text">
										<label id="jform_spacer-lbl" class=""><strong class="red">*</strong> Required field</label>
									</span>
									<span class="after"></span>
								</span>
							</dt>
							<dd></dd>
							<dt>
								<label id="jform_name-lbl" for="jform_name" class="hasTip required" title="Name::Enter your full name">Name:<span class="star">&#160;*</span></label>
							</dt>
							<dd>
								<input type="text" name="jform[name]" id="jform_name" value="" class="required" size="30"/>
							</dd>
							<dt>
								<label id="jform_username-lbl" for="jform_username" class="hasTip required" title="Username::Enter your desired user name">Username:<span class="star">&#160;*</span></label>
							</dt>
							<dd>
								<input type="text" name="jform[username]" id="jform_username" value="" class="validate-username required" size="30"/>
							</dd>
							<dt>
								<label id="jform_password1-lbl" for="jform_password1" class="hasTip required" title="Password::Enter your desired password - Enter a minimum of 4 characters">Password:<span class="star">&#160;*</span></label>
							</dt>
							<dd>
								<input type="password" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="validate-password required" size="30"/>
							</dd>
							<dt>
								<label id="jform_password2-lbl" for="jform_password2" class="hasTip required" title="Confirm Password::Confirm your password">Confirm Password:<span class="star">&#160;*</span></label>
							</dt>
							<dd>
								<input type="password" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="validate-password required" size="30"/>
							</dd>
							<dt>
								<label id="jform_email1-lbl" for="jform_email1" class="hasTip required" title="Email Address::Enter your email address">Email Address:<span class="star">&#160;*</span></label>
							</dt>
							<dd>
								<input type="text" name="jform[email1]" class="validate-email required" id="jform_email1" value="" size="30"/>
							</dd>
							<dt>
								<label id="jform_email2-lbl" for="jform_email2" class="hasTip required" title="Confirm email Address::Confirm your email address">Confirm email Address:<span class="star">&#160;*</span></label>
							</dt>
							<dd>
								<input type="text" name="jform[email2]" class="validate-email required" id="jform_email2" value="" size="30"/>
							</dd>
						</dl>
					</fieldset>
					<div>
						<button type="submit" class="validate">Register</button>or<a href="/demo/vertex/" title="Cancel">Cancel</a>
						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
						<input type="hidden" name="15db19d51bdea10b5a01eb5a973dd38d" value="1" />
					</div>
				</form>
			</div>
			<div style="clear:both;height:0px"></div>
		</div>
	</div>
</div>
