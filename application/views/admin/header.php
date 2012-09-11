<?php
	if ($admin_status == TRUE) {
		$logout_active = "active";
		$logout_status = "action";
		$logout_url = " href=\"".site_url('admin/logout/confirm')."\"";
		$profile_url = " href=\"".site_url('admin/profile')."\"";
		$message_url = " href=\"".site_url('admin/logout/confirm')."\"";
	}
	else {
		$logout_active = "disabled";
		$logout_status = "inactive";
		$logout_url = '';
		$profile_url = 
		$message_url = '';
	}
?>
<div class="mc-wrapper">
	<div id="mc-status">
		<ul class="<?php echo $logout_active; ?>">
			<li class="<?php echo $logout_status; ?>">
				<span class="logout">
					<a<?php echo $logout_url; ?>>Logout</a>
				</span>
			</li>
			<li>
				<span class="preview">
					<a href="<?php echo site_url(); ?>" target="_blank">View Site</a>
				</span>
			</li>
			<?php
				if ($admin_status == TRUE) {
			?>
			<li class="mdropdown">
				<a href="#" id="ToolsToggle">
					<span class="select-active">System Tools</span>
					<span class="select-arrow">&#x25BE;</span>
				</a>
				<ul class="mc-dropdown">
					<li class="checkin">
						<a href="index.php?option=com_checkin">Checkin Manager</a>
					</li>
					<li class="divider"></li>
					<li class="qcc">
						<a href="#">Quick-Cache-Clean</a>
						<span class="badge number">0</span>
					</li>
					<li class="config">
						<a href="index.php?option=com_cache">Cache Manager</a>
					</li>
					<li class="config">
						<a href="index.php?option=com_cache&view=purge">Purge Expired Cache</a>
					</li>
					<li class="divider"></li>
					<li class="sysinfo">
						<a href="<?php echo site_url('admin/sysinfo'); ?>">System Information</a>
					</li>
				</ul>
			</li>
			<?php
				}
				else {
			?>
			<li>
				<span>
					<a>System Tools</a>
				</span>
			</li>
			<?php
				}
			?>
		</ul>
	</div>
	<div id="mc-logo">
		<img src="<?php echo base_url('images/admin/logo.png') ?>" alt="logo" class="mc-logo" width="53" height="53" />
		<h1>SIPK Administrator</h1>
	</div>
	<div id="mc-nav">
		<?php $this->load->view($menu); ?>
	</div>
	<div id="mc-userinfo">
		<div class="mc-userinfo2">
			<div class="gravatar">
				<img src="http://www.gravatar.com/avatar/e99acaab4dac6bd5b3b7d81292e2d9b8?s=46&d=mm&r=g" alt="gravatar" />
			</div>
			<div class="userinfo <?php echo $logout_active; ?>">
				<b>Super User</b>
				<span class="mc-button">
					<a<?php echo $profile_url; ?>>edit</a>
				</span>
                <br />
				<span class="mc-messages">
					<a<?php echo $message_url; ?>>(<span class="no-unread-messages">0</span>) Messages</a>
				</span>
				last visit: 2012-06-07 05:38:17
			</div>
			<div class="session_expire">
				<div class="session_progress"></div>
			</div>
		</div>
	</div>
	<div class="mc-clr"></div>
</div>