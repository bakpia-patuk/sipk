<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<p style="margin-top: 10px;">
			<a href="<?php echo site_url('obat_herbal'); ?>">Daftar Obat Herbal</a>
		</p>
		<h2 class="page-title"><?php echo $data->nama; ?></h2>
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

		<img src="<?php echo base_url('uploads/obat_herbal/obat_herbal.jpg'); ?>" alt="" title="" />
		<?php
			$kandungan = $data->kandungan;
			if (!is_null($kandungan) && !empty($kandungan)) {
				echo "<p><strong>Kandungan</strong></p>";
				echo "<p>";
				echo $kandungan;
				echo "</p>";
			}
			$khasiat = $data->khasiat;
			if (!is_null($khasiat) && !empty($khasiat)) {
				echo "<p><strong>Khasiat</strong></p>";
				echo "<p>";
				echo $khasiat;
				echo "</p>";
			}
			$catatan = $data->catatan;
			if (!is_null($catatan) && !empty($catatan)) {
				echo "<p><strong>Catatan tambahan</strong></p>";
				echo "<p>";
				echo $catatan;
				echo "</p>";
			}
		?>

	</div>		
</div>
		    