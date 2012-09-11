<?php
	//print_r($_POST);
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task != 'sekolah.delete' || confirm('Anda yakin untuk menghapus sekolah ini? Konfirmasi akan menghapus sekolah yang dipilih.')) {
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
				</div>
			</div>
		</div>
		<div id="mc-component" class="clearfix">
			<form action="<?php echo site_url('admin/sekolah/index/'.$limitstart); ?>" method="post" name="adminForm" id="adminForm">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<label class="filter-search-lbl" for="filter_search">Filter:</label>
						<input type="text" name="filter_search" id="filter_search" value="<?php echo $filter_search; ?>" title="Search title or alias. Prefix with ID: to search for an article ID." />
						<button type="submit" class="btn">Search</button>
						<button type="button" onclick="document.id('filter_search').value='';document.id('filter_published').value='';document.id('filter_jenjang').value='';document.id('filter_status').value='';document.id('filter_wilayah').value='';this.form.submit();">Clear</button>
					</div>
					<div class="filter-select fltrt">
						<select id="filter_published" name="filter_published" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Status -'
								);
								$last = array(
									'*' => 'Semua'
								);
								$sekolah_state = array_merge($first, $sekolah_state);
								$sekolah_state = array_merge($sekolah_state, $last);
								foreach ($sekolah_state AS $key => $value) {
									if (strval($key) === strval($filter_published))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select id="filter_jenjang" name="filter_jenjang" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Jenjang Sekolah -'
								);
								$sekolah_jenjang = array_merge($first, $sekolah_jenjang);
								foreach ($sekolah_jenjang AS $key => $value) {
									if (strval($key) === strval($filter_jenjang))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select id="filter_status" name="filter_status" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Status Sekolah -'
								);
								$last = array(
									'*' => 'Semua'
								);
								$sekolah_status = array_merge($first, $sekolah_status);
								foreach ($sekolah_status AS $key => $value) {
									if (strval($key) === strval($filter_status))
										echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
									else
										echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
								}
							?>
						</select>
						<select id="filter_wilayah" name="filter_wilayah" class="inputbox" onchange="this.form.submit()">
							<?php
								$first = array(
									'' => '- Pilih Wilayah -'
								);
								$sekolah_wilayah = array_merge($first, $sekolah_wilayah);
								foreach ($sekolah_wilayah AS $key => $value) {
									if (strval($key) === strval($filter_wilayah))
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
							<?php
								$image = ($filter_order_dir == 'asc' ? 'sort_asc.png' : 'sort_desc.png');
								$image = base_url('images/admin/'.$image);
								$tag = "<img src=\"".$image."\" alt=\"\" />";
							?>
							<th width="1%">
								<input type="checkbox" name="checkall-toggle" value="" title="Check All" onclick="Joomla.checkAll(this)" />
							</th>
							<th>
								<a href="#" onclick="Joomla.tableOrdering('nama', <?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>, '');" title="Click to sort by this column">Nama Sekolah<?php echo $filter_order == 'nama' ? $tag : ''; ?></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('state',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Status<?php echo $filter_order == 'state' ? $tag : ''; ?></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('jenjang',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Jenjang<?php echo $filter_order == 'janjang' ? $tag : ''; ?></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('status',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Status Sekolah<?php echo $filter_order == 'status' ? $tag : ''; ?></a>
							</th>
							<th width="10%">
								<a href="#" onclick="Joomla.tableOrdering('wilayah',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Wilayah<?php echo $filter_order == 'wilayah' ? $tag : ''; ?></a>
							</th>
							<th width="25%">
								<a href="#" onclick="Joomla.tableOrdering('alamat',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Alamat<?php echo $filter_order == 'alamat' ? $tag : ''; ?></a>
							</th>
							<th width="10%">
								<a href="#" onclick="Joomla.tableOrdering('telepon1',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Telepon<?php echo $filter_order == 'telepon' ? $tag : ''; ?></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('hits',<?php echo $filter_order_dir == 'asc' ? 'desc' : 'asc'; ?>,'');" title="Click to sort by this column">Hits<?php echo $filter_order == 'hits' ? $tag : ''; ?></a>
							</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
                            <td colspan="9">
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
								$state = $row->state;
								$jenjang = $row->jenjang;
								$status = $row->status;
								$wilayah = $row->wilayah;
								$alamat = $row->alamat;
								$telepon1 = $row->telepon1;
								$telepon2 = $row->telepon2;
								$fax = $row->fax;
								$hits = $row->hits;
						?>
						<td class="center">
							<input type="checkbox" id="cb<?php echo $no; ?>" name="cid[]" value="<?php echo $id; ?>" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row <?php echo $no; ?>" />
						</td>
						<td class="nowrap">
							<a href="<?php echo site_url('admin/sekolah/add?id='.$id); ?>"><?php echo $nama; ?></a>
						</td>
						<td class="center">
							<a class="jgrid hasTip" href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $no; ?>','articles.unpublish')" title="Published and is Current::Start: 2011-01-01 00:00:01">
								<span class="state publish">
									<span class="text">Published</span>
								</span>
							</a>
						</td>
						<td class="center"><?php echo $jenjang; ?></td>
						<td class="center"><?php echo $status; ?></td>
						<td class="center"><?php echo $wilayah; ?></td>
						<td><?php echo $alamat; ?></td>
						<td class="nowrap">
							<?php echo $telepon1; ?>
							<p class="smallsub">(<span>Telepon 2</span>: <?php echo empty($telepon2) ? '-' : $telepon2; ?>)</p>
							<p class="smallsub">(<span>Fax</span>: <?php echo empty($fax) ? '-' : $fax; ?>)</p>
						</td>
						<td class="nowrap"><?php echo $hits; ?></td>
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
					<input type="hidden" name="filter_order_dir" value="<?php echo $filter_order_dir; ?>" />
				</div>
			</form>
		</div>
		<div class="mc-clr"></div>
	</div>
</div>