<?php
	$listOrder	= empty($_POST['filter_order']) ? 'spesialis' : $_POST['filter_order'];
	$listDirn	= empty($_POST['filter_order_Dir']) ? 'asc' : $_POST['filter_order_Dir'];
	$filterSearch = !isset($_POST['filter_search']) ? "" : $_POST['filter_search'];
	$filterKategori = !isset($_POST['filter_kategori']) ? "" : $_POST['filter_kategori'];
	$filterStatus = !isset($_POST['filter_status']) ? "" : $_POST['filter_status'];
	$filterAkreditasi = !isset($_POST['filter_akreditasi']) ? "" : $_POST['filter_akreditasi'];
	$filterWilayah = !isset($_POST['filter_wilayah']) ? "" : $_POST['filter_wilayah'];
?>
<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<h2 class="page-title">Daftar Spesialis Kedokteran</h2>
		
		<script type="text/javascript">
 
			$(document).ready(function(){
			 
				$(".slidingDiv").hide();
				$(".show_hide").show();
			 
				$('.show_hide').click(function() {
					$(".slidingDiv").slideToggle();
				});
			 
			});
		 
		</script>

		<style type="text/css">
			.slidingDiv {
				height: 48px;
				background-color: #99CCFF;
				padding: 20px;
				margin-top: 10px;
				margin-bottom: 10px;
				border-bottom: 5px solid #3399FF;
			}
			 
			.show_hide {
				display: none;
			}
		</style>
		
		<form action="" method="post" name="adminForm" id="adminForm">
		
			<a href="#" class="show_hide">Show/hide Filter &gt;&gt;</a>
			<div class="slidingDiv">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<div style="float: left;">
							<label class="filter-search-lbl" for="filter_search">Filter:</label>
							<input name="filter_search" id="filter_search" title="Search title or alias. Prefix with id: to search for an article id." type="text">
							<button type="submit" class="btn">Search</button>
							<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
						</div>
						<div style="float: right;">
							<label class="filter-search-lbl" for="filter_search">Urut berdasarkan:</label>
							<select name="filter_published" class="inputbox" align="right" onchange="this.form.submit()">
							</select>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
		
		<div style="clear: both;"></div>
		
		<div id="load_data" style="float: left; width: 300px; overflow: auto; top-margin: 10px;">
			<table style="width: 300px;">
				<thead>
					<tr>
						<td colspan="2" height="19" align="center" valign="center"><strong>Spesialisasi</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = $limitstart + 1;
						foreach ($data as $row)
						{
							echo '<tr>';
							echo '<td align="center">'.$no.'</td>';
							echo '<td height="10" nowrap="nowrap" style="overflow: hidden;"><strong><a href="'.site_url('spesialis/detail/'.$row->id).'">'.$row->spesialis.'</a></strong></td>';
							echo '</tr>';
							$no++;
						}
					?>
				</tbody>
			</table>
		</div>
		<div style="float: left; width: 405px; overflow:auto;" id="load_data">
			<table style="width: 1800px;">
				<thead>
					<tr class="tablehead bold">
						<td height="19">Gelar</td>
						<td height="19">Penyakit yang ditangani</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						foreach ($data as $row)
						{
							echo '<tr>';
							echo '<td>'.$row->gelar.'</td>';
							echo '<td>'.$row->deskripsi.'</td>';
							echo '</tr>';
							$no++;
						}
					?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
		<div>
			<?php echo $this->pagination->create_links(); ?>
		</div>

	</div>		
</div>