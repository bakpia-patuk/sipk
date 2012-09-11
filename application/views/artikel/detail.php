<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<p style="margin-top: 10px;">
			<?php
			$title = "undefined";
			switch ($kategori) {
				case 'membership':
					$title = "Membership";
					break;
				case 'pendidikan':
					$title = "Pendidikan";
					break;
				case 'kesehatan':
					$title = "Kesehatan";
					break;
				case 'tafakur':
					$title = "Tafakur";
					break;
				}
			?>
			<a href="<?php echo site_url('artikel?kategori='.$kategori); ?>">Artikel <?php echo $title; ?></a>
		</p>
		<h2 style="margin-top: 0px;">Minim Katalis, Euro Terjepit di Bawah $1.25</h2>
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
		<p><span class="date">13 Juni 2012 12:56:26 WIB</span></p>
		<img src="<?php echo base_url('uploads/minim-katalis-euro-terjepit-di-bawah-125.jpg'); ?>" alt="Minim Katalis, Euro Terjepit di Bawah $1.25" style="float: left; margin: 5px 10px 5px 0; max-width: 370px;" />
		<p>Hingga sesi siang di hari Rabu (13/6) mata uang tunggal Euro nampak tengah berjuang untuk pulih kembali ke level-level seperti kemarin di atas $1.2500.</p><p>Sulitnya penguatan Euro terutama lantaran sebagian investor masih melakukan short dan enggan untuk masuk posisi dahulu (wait and see) sambil menunggu berita-berita terbaru terkait tentang kejelasan penanganan krisis utang Eropa. Sikap tersebut diambil berkenaan dengan pesimisme pasar bahwa dengan bertambahnya likuiditas perbankan Spanyol melalui bailout, justru meningkatkan rasio utang luar negerinya yang semakin membengkak. Sehingga investor khawatir krisis utang Eropa ini bisa kembali memperlambat pertumbuhan ekonomi dunia.</p><p>Hingga saat ini Eropa masih menjadi pusat perhatian pasar dunia dan kadang-kadang berita dari Eropa menjadi market mover bagi pasar yang memerlukan katalis dalam bertransaksi. Dan pasar kini masih dicemaskan oleh tiga event penting dunia, yaitu pemilu Yunani 17 Juni, pertemuan G-20 summit tanggal 18-19 Juni, dan pertemuan the Fed tanggal 19-20 Juni. Euro tercatat flat di kisaran $1.2490-an setelah sempat mencapai level tinggi pada $1.2505.(Dar)</p><p>&Acirc;&nbsp;</p>
		<!-- begin htmlcommentbox.com -->
		<div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
		<script type="text/javascript" language="javascript" id="hcb">
			/*<!--*/
			if (!window.hcb_user) {
				hcb_user = {};
			}
			(function() {
				s = document.createElement("script");
				s.setAttribute("type", "text/javascript");
				s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page=" + escape((window.hcb_user && hcb_user.PAGE) || ("" + window.location)).replace("+", "%2B") + "&opts=470&num=10");
				if (typeof s != "undefined")
					document.getElementsByTagName("head")[0].appendChild(s);
			})();
			/*-->*/
		</script>
		<!-- end htmlcommentbox.com -->
	</div>
</div>
		    