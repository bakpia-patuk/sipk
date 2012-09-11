<?php $this->load->view('sidebar'); ?>
<div id="content">
	<div id="content-body">
		<p style="margin-top: 10px;">
			<a href="<?php echo site_url('dokter'); ?>">Daftar Dokter</a>
		</p>
		<h2 class="page-title">Data Dokter</h2>
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
					<td>Nama</td>
					<td>:</td>
					<td><?php echo $data->nama; ?></td>
				</tr>
				<tr>
					<td>Wilayah</td>
					<td>: <br></td>
					<td><?php echo $data->wilayah; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <br></td>
					<td><?php echo $data->nama; ?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>: <br></td>
					<td><?php echo $data->telepon; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>: <br></td>
					<td><?php echo $data->email; ?></td>
				</tr>
				<tr>
					<td>Web Site</td>
					<td>: <br></td>
					<td><?php echo $data->website; ?></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>: <br></td>
					<td><?php echo $data->catatan; ?></td>
				</tr>
			</tbody>
		</table>		

	</div>		
</div>
		    