<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<p style="margin-top: 10px;">
			<a href="<?php echo site_url('spesialis'); ?>">Daftar Spesialis Kedokteran</a>
		</p>
		<h2 class="page-title">Data Spesialis Kedokteran</h2>
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

		<table style="width: 375px; height: 136px;" border="0">
			<tbody>
				<tr>
					<td>Spesialisasi</td>
					<td>:</td>
					<td><?php echo $data->spesialis; ?></td>
				</tr>
				<tr>
					<td>Gelar<br></td>
					<td>: <br></td>
					<td><?php echo $data->gelar; ?></td>
				</tr>
				<tr>
					<td>Penyakit yang ditangani</td>
					<td>: <br></td>
					<td><?php echo $data->deskripsi; ?></td>
				</tr>
			</tbody>
		</table>		

	</div>		
</div>
		    