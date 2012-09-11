<?php
	$listOrder	= empty($_POST['filter_order']) ? 'nama' : $_POST['filter_order'];
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
		<h2 class="page-title">Daftar Dokter</h2>
		<div class="share-buttons">
			<div class="twitter-share">
				<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</div>
			<div class="facebook-share">
				<a name="fb_share"></a>
				<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
			</div>
		</div>
		<div style="clear: both;"></div>
		
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
					<div style="clear: both;"></div>
					<div class="filter-select fltrt" style="float: left;">
						<select name="filter_wilayah" onchange="this.form.submit()">
							<?php
								$wilayah['Semua'] = '- Wilayah -';
								$html = "";
								foreach ($wilayah as $key => $value) {
									if ($key == (string)$filterStatus) {
										$html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
									}
									else {
										$html .= "<option value=\"$key\">$value</option>";
									}
								}
								echo $html;
							?>
						</select>
					</div>
				</fieldset>
			</div>
		</form>
		
		<div style="clear: both;"></div>
		
		<div id="load_data" style="float: left; width: 300px; overflow: auto; top-margin: 10px;">
			<table style="width: 300px;">
				<thead>
					<tr>
						<td colspan="2" height="19" align="center" valign="center"><strong>Nama</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = $limitstart + 1;
						foreach ($data as $row)
						{
							echo '<tr>';
							echo '<td align="center">'.$no.'</td>';
							echo '<td height="10" nowrap="nowrap" style="overflow: hidden;"><strong><a href="'.site_url('dokter/detail/'.$row->dokter_id).'">'.$row->nama.'</a></strong></td>';
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
						<td height="19">Wilayah</td>
						<td height="19">Alamat</td>
						<td height="19">Telepon</td>
						<td height="19">Masa Berlaku Izin s/d</td>
						<td height="19">Spesialis</td>
						<td height="19">Email</td>
						<td height="19">Web Site</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						foreach ($data as $row)
						{
							echo '<tr>';
							echo '<td>'.$row->wilayah.'</td>';
							echo '<td>'.$row->alamat.'</td>';
							echo '<td>'.$row->telepon.'</td>';
							echo '<td>'.$row->masa_berlaku_izin.'</td>';
							echo '<td><a href="'.site_url('spesialis/detail/'.$row->dokter_spesialis_id).'">'.$row->spesialis.'</a></td>';
							echo '<td>'.$row->email.'</td>';
							echo '<td>'.$row->website.'</td>';
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
		    