<div id="s5_columns_wrap">
	<div id="s5_columns_wrap_inner">
	
		<div id="s5_center_column_wrap">
			<?php
				if (isset($column_wrap_content))
					echo $this->load->view($column_wrap_content);
			?>
		</div>

		<!-- Left column -->
		<?php
			if (isset($left_column))
				echo $this->load->view($left_column);
		?>
		<!-- End Left column -->
	
		<!-- Right column -->	
		<?php
			if (isset($right_column))
				echo $this->load->view($right_column);
		?>
		<!-- End Right column -->
		
	</div>
</div>