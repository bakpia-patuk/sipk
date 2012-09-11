<?php
	header('HTTP/1.0 200 OK'); // stoopid IIS
	header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="<?php echo base_url('favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon">
		<title>
			<?php
				echo 'si'.'pk Ad'.'minis'.'tration'.' | Login';
			?>
		</title>
		<link rel="stylesheet" href="<?php echo base_url('css/admin/core.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('css/admin/core-gecko.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('css/admin/colors.css.php'); ?>" type="text/css" />
		
        <script src="<?php echo base_url('js/admin/core.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/admin/mootools-core.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/admin/mootools-more.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/admin/MC.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/admin/MC.Notice.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('js/admin/MC.Lang.js'); ?>" type="text/javascript"></script>
		<?php
			if (isset($extraHeadContent)) {
				echo $extraHeadContent;
			}
		?>
	</head>
	<body id="mc-login" class="transitions-enabled headers-fancy extendmenu-off menuwidth-small width-variable avatar-1 ltr option-com-login task- view-login">
<?php
    //$this->load->library('encrypt');
    //echo $this->encrypt->decode('33H1YdFONFCI415Oc4M5mtrRcTW/lGX/NlB+/SujJWvizqa2cr3l4Mdgi9507VJYzX+6q2o2G7siyPnRPXK2+w==');
    //print_r($_POST);
?>
		<div id="mc-frame">
			<div id="mc-header">
				<div class="mc-wrapper">
					<div id="mc-status">
                        <ul>
                            <li class="action">
                                <a href="<?php echo site_url(); ?>" target="_blank">Frontend</a>
                            </li>
                            <!--li class="dropdown">
                                <select id="lang" name="lang"  class="inputbox">
                                    <option value="" selected="selected">Language: Default</option>
                                    <option value="en-GB">English (United Kingdom)</option>
                                    <option value="id-ID">Bahasa Indonesia</option>
                                </select>
                            </li-->
                        </ul>
                    </div>
				</div>
				<div id="mc-logo">
					<img src="<?php echo base_url('images/admin/logo.png'); ?>" alt="logo" class="mc-logo" width="53" height="68" />
                    <h1>Administrator Login</h1>
				</div>
			</div>
			<div id="mc-body">
				<div class="mc-wrapper">
					<br />
					<form action="" method="post" name="login" id="form-login" onsubmit="return checkform();" style="clear: both;">
						<div id="login-wrapper">
							<input name="username" id="modlgn_username" type="text" placeholder="Username" class="inputbox" size="15" />
							<input name="password" id="modlgn_passwd" type="password" placeholder="Password" class="inputbox" size="15" />
							<span class="button" onclick="login.submit();">Login</span>
						</div>
						<div class="clr"></div>
						<input type="submit" style="border: 0; padding: 0; margin: 0; width: 0px; height: 0px;" value="Login" />
						<input type="hidden" name="option" value="com_login" />
						<input type="hidden" name="task" value="login" />
						<input id="hidden_lang" type="hidden" name="lang" value="" />
						<input type="hidden" name="return" value="aW5kZXgucGhw" />
						<div id="joomla_token">
						<input type="hidden" name="4eb9598ce7a07798d6d52b2d1ac6e8b6" value="1" />	</div>
					</form>
				</div>
			</div>
			<div id="mc-footer">
				<div class="mc-wrapper">
					<p class="copyright">
						<span class="mc-footer-logo"></span>
                        Copyright (c) 2012 by PT Sari Mandiri Eka Tama. All Rights Reserved.
					</p>
				</div>
			</div>
            
            <div id="mc-message">
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
            </div>
			
		</div>
	</body>
</html>