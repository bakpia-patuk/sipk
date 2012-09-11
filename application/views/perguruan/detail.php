<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
<div id="s5_component_wrap">
<div id="s5_component_wrap_inner">
    
    <div id="system-message-container"></div>
    <div class="item-page">
		<h2 class="page-title">Data Perguruan Tinggi</h2>
		<ul class="actions">
            <li class="print-icon">
                <a href="<?php echo site_url('about_us'); ?>" title="Print" onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;" rel="nofollow">
                    <img src="<?php echo base_url('images/system/printButton.png'); ?>" alt="Print" />
                </a>
            </li>
            <li class="email-icon">
                <a href="<?php echo site_url('about_us'); ?>" title="Email" onclick="window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;">
                    <img src="<?php echo base_url('images/system/emailButton.png'); ?>" alt="Email" />
                </a>
            </li>
        </ul>
        <dl class="article-info">
            <dt class="article-info-term"></dt>
            <dd class="category-name">Kategori: <a href="<?php echo site_url('perguruan'); ?>">Perguruan Tinggi</a></dd>
            <?php
                setlocale(LC_TIME, 'INDONESIA');
                $dt = strftime( "%A, %d %B %Y %H:%M", strtotime($data->modified));
            ?>
            <dd class="published">Update terakhir pada <?php echo $dt; ?></dd>
        </dl>
		<table style="width: 375px; height: 136px;" border="0">
			<tbody>
				<tr>
					<td>Nama Perguruan Tinggi</td>
					<td>:</td>
					<td><?php echo $data->nama; ?></td>
				</tr>
				<tr>
					<td>Akronim</td>
					<td>:</td>
					<td><?php echo $data->akronim; ?></td>
				</tr>
				<tr>
					<td>Kategori Perguruan Tinggi</td>
					<td>:</td>
					<td><?php echo $data->kategori; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>: <br></td>
					<td><?php echo $data->status; ?></td>
				</tr>
				<tr>
					<td>Status Akreditasi</td>
					<td>: <br></td>
					<td><?php echo $data->akreditasi; ?></td>
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
					<td>Telepon 1</td>
					<td>: <br></td>
					<td><?php echo $data->telepon1; ?></td>
				</tr>
				<tr>
					<td>Telepon 2</td>
					<td>: <br></td>
					<td><?php echo $data->telepon2; ?></td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>: <br></td>
					<td><?php echo $data->fax; ?></td>
				</tr>
				<tr>
					<td>Pimpinan</td>
					<td>: <br></td>
					<td><?php echo $data->rektor; ?></td>
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
					<td><?php echo $data->deskripsi; ?></td>
				</tr>
				
			</tbody>
		</table>		
        
    </div>

</div>
</div>
</div>