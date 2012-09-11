<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
	<div id="s5_component_wrap">
		<div id="s5_component_wrap_inner">

            <div id="system-message-container"></div>
            <div class="item-page">
                <h2>Data Sekolah</h2>

                <ul class="actions">
                    <li class="print-icon">
                        <a href="/demo/vertex/index.php/tutorials-mainmenu-48/configuring-the-template?tmpl=component&amp;print=1&amp;page=" title="Print" onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;" rel="nofollow">
                            <img src="<?php echo base_url('images/system/printButton.png'); ?>" alt="Print" />
                        </a>
                    </li>
                    <li class="email-icon">
                        <a href="/demo/vertex/index.php/component/mailto/?tmpl=component&amp;template=shape5_vertex&amp;link=5e9a3ea2b4ebda7c3a37e555af5354e51fe84349" title="Email" onclick="window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;">
                            <img src="<?php echo base_url('images/system/emailButton.png'); ?>" alt="Email" />
                        </a>
                    </li>
                </ul>

                <dl class="article-info">
                    <dt class="article-info-term"></dt>
                    <dd class="category-name">Kategori: <a href="<?php echo site_url('sekolah'); ?>">Sekolah</a></dd>
                    <?php
                        setlocale(LC_TIME, 'INDONESIA');
                        $dt = strftime( "%A, %d %B %Y %H:%M", strtotime($data->modified));
                    ?>
                    <dd class="published">Update terakhir pada <?php echo $dt; ?></dd>
                </dl>

                <table style="width: 375px; height: 136px;">
                    <tbody>
                        <tr>
                            <td><strong>Nama Sekolah</strong></td>
                            <td>:</td>
                            <td><?php echo $data->nama; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenjang</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->jenjang; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->status; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Wilayah</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->wilayah; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->nama; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Telepon 1</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->telepon1; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Telepon 2</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->telepon2; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Fax</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->fax; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Daya Tampung</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->daya_tampung; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nilai Tertinggi</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->nilai_tertinggi; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Passing Grade</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->grade; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Cluster</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->cluster; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Biaya</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->biaya; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->email; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Web Site</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->website; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Deskripsi</strong></td>
                            <td>: <br></td>
                            <td><?php echo $data->deskripsi; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="clear:both;height:0px"></div>

        </div>
    </div>
</div>