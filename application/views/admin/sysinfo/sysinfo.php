<form action="<?php echo site_url('admin/sysinfo'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="config-document">
		<div id="page-site" class="tab">
			<div class="noshow">
				<div class="width-100">
					<?php echo $this->load->view('admin/sysinfo/system'); ?>
				</div>
			</div>
		</div>
		<div id="page-phpsettings" class="tab">
			<div class="noshow">
				<div class="width-60">
                    <?php echo $this->load->view('admin/sysinfo/phpsettings'); ?>
				</div>
			</div>
		</div>
		<div id="page-config" class="tab">
			<div class="noshow">
				<div class="width-60">
                    <?php //echo $this->load->view('admin/sysinfo/config'); ?>
				</div>
			</div>
		</div>
		<div id="page-directory" class="tab">
			<div class="noshow">
				<div class="width-60">
                    <?php //echo $this->load->view('directory'); ?>
				</div>
			</div>
		</div>
		<div id="page-phpinfo" class="tab">
			<div class="noshow">
				<div class="width-100">
                    <?php echo $this->load->view('admin/sysinfo/phpinfo'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="clr"></div>
</form>
