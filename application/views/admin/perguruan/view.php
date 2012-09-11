<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task != 'perguruan.delete' || confirm('Anda yakin ingin menghapus Perguruan Tinggi ini? Konfirmasi akan menghapus Perguruan Tinggi yang dipilih.')) {
			Joomla.submitform(task);
		}
	}
</script>
<div class="mc-wrapper">
	<div id="system-message-container">
		<?php
            //message, error, notice
            $message_data = $this->session->flashdata('message');
            $message_type = $message_data['type'];
            $message_title = ucfirst($message_data['type']);;
            $message_message = $message_data['message'];
            if ($message_message) {
        ?>
        <dl id="system-message">
            <dt class="<?php echo $message_type; ?>"><?php echo $message_title; ?></dt>
            <dd class="<?php echo $message_type; ?> message">
                <ul>
                    <li><?php echo $message_message; ?></li>
                </ul>

            </dd>
        </dl>
        <?php
            }
        ?>
	</div>
	<div id="content-box">
		<div id="toolbar-box">
			<div class="m">
				<div id="mc-title">
					<?php
						echo $module_title;
						echo $help->render();
						echo $toolbar->render();
					?>
					<div class="clr"></div>
					<div id="mc-submenu">
						<ul id="submenu">
							<li>
								<a class="active" href="<?php echo site_url('admin/perguruan'); ?>">Perguruan Tinggi</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/jurusan'); ?>">Jurusan Perguruan Tinggi</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="mc-component" class="clearfix">
			<form action="<?php echo site_url('admin/perguruan'); ?>" method="post" name="adminForm" id="adminForm">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<label class="filter-search-lbl" for="filter_search">Filter:</label>
						<input type="text" name="filter_search" id="filter_search" value="<?php echo $filter_search; ?>" title="Search title or alias. Prefix with ID: to search for an article ID." />
						<button type="submit" class="btn">Search</button>
						<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
					</div>
					<div class="filter-select fltrt">
						<select name="filter_published" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Status -'
								);
								$last = array(
									'*' => 'Semua'
								);
								$perguruan_state = array_merge($first, $perguruan_state);
								$perguruan_state = array_merge($perguruan_state, $last);
								foreach ($perguruan_state AS $key => $value) {
									if (strval($key) === strval($filter_published))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select name="filter_kategori" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih kategori -'
								);
								$perguruan_kategori = array_merge($first, $perguruan_kategori);
								foreach ($perguruan_kategori AS $key => $value) {
									if (strval($key) === strval($filter_published))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select name="filter_status" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Status -'
								);
								$perguruan_status = array_merge($first, $perguruan_status);
								foreach ($perguruan_status AS $key => $value) {
									if (strval($key) === strval($filter_published))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select name="filter_akreditasi" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Status Akreditasi -'
								);
								$perguruan_akreditasi = array_merge($first, $perguruan_akreditasi);
								foreach ($perguruan_akreditasi AS $key => $value) {
									if (strval($key) === strval($filter_published))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select name="filter_wilayah" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Wilayah -'
								);
								$perguruan_wilayah = array_merge($first, $perguruan_wilayah);
								foreach ($perguruan_wilayah AS $key => $value) {
									if (strval($key) === strval($filter_published))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
					</div>
				</fieldset>
				<div class="clr"></div>
				<table class="adminlist">
					<thead>
						<tr>
							<th width="1%">
								<input type="checkbox" name="checkall-toggle" value="" title="Check All" onclick="Joomla.checkAll(this)" />
							</th>
							<th>
								<a href="#" onclick="Joomla.tableOrdering('nama','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Nama Perguruan Tinggi<img src="/joomla/media/system/images/sort_asc.png" alt=""  /></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('state','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Status</a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('kategori','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Kategori</a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('status','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Status Sekolah</a>
							</th>
							<th width="10%">
								<a href="#" onclick="Joomla.tableOrdering('akreditasi','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Status Akreditasi</a>
							</th>
							<th width="10%">
								<a href="#" onclick="Joomla.tableOrdering('wilayah','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Wilayah</a>
							</th>
							<th width="25%">
								<a href="#" onclick="Joomla.tableOrdering('alamat','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Alamat</a>
							</th>
							<th width="10%">
								<a href="#" onclick="Joomla.tableOrdering('telepon','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Telepon</a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('rektor','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Nama Pimpinan</a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('hits','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Hits</a>
							</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
                            <td colspan="11">
                                <?php echo $this->pagination->render_limit_box(); ?>
								<?php echo $this->pagination->render_page_counter(); ?>
                                <?php echo $this->pagination->create_links(); ?>
                                <input type="hidden" name="limitstart" value="<?php echo $limitstart; ?>" />
                            </td>
                        </tr>
					</tfoot>
					<tbody>
						<?php
							$no = 1;
							foreach ($data as $row)
							{
								 if ($no % 2 == 0) {
									echo "<tr class=\"row0\">";
								}
								else {
									echo "<tr class=\"row1\">";
								}
								$id = $row->id;
								$nama = $row->nama;
								$akronim = $row->akronim;
								$kategori = $row->kategori;
								$status = $row->status;
								$akreditasi = $row->akreditasi;
								$wilayah = $row->wilayah;
								$alamat = $row->alamat;
								$telepon1 = $row->telepon1;
								$telepon2 = $row->telepon2;
								$fax = $row->fax;
								$rektor = $row->rektor;
						?>
						<td class="center">
							<input type="checkbox" id="cb<?php echo $no; ?>" name="cid[]" value="<?php echo $id; ?>" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row <?php echo $no; ?>" />
						</td>
						<td class="nowrap">
							<a href="<?php echo site_url('admin/perguruan/edit/'.$id); ?>"><?php echo $nama; ?></a>
							<p class="smallsub">(<span>Akronim</span>: <?php echo (empty($akronim) OR $akronim = '-') ? '-' : $akronim; ?>)</p>
						</td>
						<td class="center">
							<a class="jgrid hasTip" href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $no; ?>','articles.unpublish')" title="Published and is Current::Start: 2011-01-01 00:00:01">
								<span class="state publish">
									<span class="text">Published</span>
								</span>
							</a>
						</td>
						<td class="center"><?php echo $kategori; ?></td>
						<td class="center"><?php echo $status; ?></td>
						<td class="center"><?php echo $akreditasi; ?></td>
						<td class="center"><?php echo $wilayah; ?></td>
						<td><?php echo $alamat; ?></td>
						<td class="nowrap">
							<?php echo $telepon1; ?>
							<p class="smallsub">(<span>Telepon 2</span>: <?php echo empty($telepon2) ? '-' : $telepon2; ?>)</p>
							<p class="smallsub">(<span>Fax</span>: <?php echo empty($fax) ? '-' : $fax; ?>)</p>
						</td>
						<td class="nowrap"><?php echo $rektor; ?></td>
						<td class="nowrap"><?php echo 1; ?></td>
						<?php
								echo "</tr>";
								$no++;
							}
						?>
					</tbody>
				</table>
				<div>
					<input type="hidden" name="task" value="" />
					<input type="hidden" name="boxchecked" value="0" />
					<input type="hidden" name="filter_order" value="<?php echo $filter_order; ?>" />
					<input type="hidden" name="filter_order_Dir" value="<?php echo $filter_order_dir; ?>" />
				</div>
			</form>
		</div>
		<div class="mc-clr"></div>
	</div>
</div>