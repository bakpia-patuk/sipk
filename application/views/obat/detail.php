<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<p style="margin-top: 10px;">
			<a href="<?php echo site_url('obat'); ?>">Daftar Obat</a>
		</p>
		<h2 style="margin-top: 0px;"><?php echo $data->nama; ?></h2>
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
		<p><span class="date"><?php echo $data->created; ?></span></p>
		<img src="<?php echo base_url('uploads/minim-katalis-euro-terjepit-di-bawah-125.jpg'); ?>" alt="Minim Katalis, Euro Terjepit di Bawah $1.25" style="float: left; margin: 5px 10px 5px 0; max-width: 370px;" />
		
		<h3>Deskripsi</h3>
		<p>
			<?php echo $data->deskripsi; ?>
		</p>
		<?php
			$komposisi = $data->komposisi;
			if (!is_null($komposisi) && !empty($komposisi)) {
				echo "<h3>Komposisi</h3>";
				echo "<p>";
				echo $komposisi;
				echo "</p>";
			}
			$dosis = $data->dosis;
			if (!is_null($dosis) && !empty($dosis)) {
				echo "<h3>Dosis</h3>";
				echo "<p>";
				echo $dosis;
				echo "</p>";
			}
			$indikasi = $data->indikasi;
			if (!is_null($indikasi) && !empty($indikasi)) {
				echo "<h3>Indikasi</h3>";
				echo "<p>";
				echo $indikasi;
				echo "</p>";
			}
			$paket = $data->paket;
			if (!is_null($paket) && !empty($paket)) {
				echo "<h3>Paket</h3>";
				echo "<p>";
				echo $paket;
				echo "</p>";
			}
			$noRegistrasi = $data->no_registrasi;
			if (!is_null($noRegistrasi) && !empty($noRegistrasi)) {
				echo "<h3>No. Registrasi</h3>";
				echo "<p>";
				echo $noRegistrasi;
				echo "</p>";
			}
			$produksi = $data->produksi;
			if (!is_null($produksi) && !empty($produksi)) {
				echo "<h3>Diproduksi oleh</h3>";
				echo "<p>";
				echo $produksi;
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
		    