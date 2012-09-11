<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<p style="margin-top: 10px;">
			<a href="<?php echo site_url('penyakit'); ?>">Daftar Penyakit</a>
		</p>
		<h2 class="page-title">Data Penyakit</h2>
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
		
		<div id="table_of_contents">
			<img src="<?php echo base_url('uploads/penyakit/penyakit.jpg'); ?>" />
		</div>
		<h3>Deskripsi</h3>
		<p>
			<?php echo $data->deskripsi; ?>
		</p>
		<?php
			$gejala = $data->gejala;
			if (!is_null($gejala) && !empty($gejala)) {
				echo "<h3>Gejala</h3>";
				echo "<p>";
				echo $gejala;
				echo "</p>";
			}
			$pencegahan = $data->pencegahan;
			if (!is_null($pencegahan) && !empty($pencegahan)) {
				echo "<h3>Pencegahan</h3>";
				echo "<p>";
				echo $pencegahan;
				echo "</p>";
			}
			$pengobatan = $data->pengobatan;
			if (!is_null($pengobatan) && !empty($pengobatan)) {
				echo "<h3>Pengobatan</h3>";
				echo "<p>";
				echo $pengobatan;
				echo "</p>";
			}
			$obat = $data->obat;
			if (!is_null($obat) && !empty($obat)) {	
				echo "<h3>Obat-obatan yang dapat digunakan</h3>";
				echo "<p>";
				echo $obat;
				echo "</p>";
			}
			$catatan = $data->catatan;
			if (!is_null($catatan) && !empty($catatan)) {
				echo "<h3>Catatan tambahan</h3>";
				echo "<p>";
				echo $catatan;
				echo "</p>";
			}
		?>

	</div>		
</div>
		    