<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task != 'jurusan.delete' || confirm('Anda yakin ingin menghapus Jurusan ini? Konfirmasi akan menghapus Jurusan yang dipilih.')) {
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
								<a href="<?php echo site_url('admin/perguruan'); ?>">Perguruan Tinggi</a>
							</li>
							<li>
								<a class="active" href="<?php echo site_url('admin/jurusan'); ?>">Jurusan Perguruan Tinggi</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="mc-component" class="clearfix">
			<form action="<?php echo site_url('admin/jurusan'); ?>" method="post" name="adminForm" id="admin-form">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<label class="filter-search-lbl" for="filter_search">Filter:</label>
						<input type="text" name="filter_search" id="filter_search" value="<?php echo $filter_search; ?>" title="Search title or alias. Prefix with ID: to search for an article ID." />
						<button type="submit" class="btn">Search</button>
						<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
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
								<a href="#" onclick="Joomla.tableOrdering('jurusan','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Nama Jurusan<?php echo $filter_order == 'spesialis' ? $tag : ''; ?></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('state','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Status<?php echo $filter_order == 'state' ? $tag : ''; ?></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('hits','<?php echo $filter_order_dir; ?>','');" title="Click to sort by this column">Hits<?php echo $filter_order == 'hits' ? $tag : ''; ?></a>
							</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
                            <td colspan="4">
								<?php echo $this->pagination->render_limit_box(); ?>
								<?php echo $this->pagination->render_page_counter(); ?>
                                <?php echo $this->pagination->create_links(); ?>
                                <input type="hidden" name="limitstart" value="<?php echo $limitstart; ?>" />
                            </td>
                        </tr>
					</tfoot>
					<tbody>
						<?php
							if (isset($data)) {
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
									$jurusan = $row->jurusan;
									$state = $row->state;
									$hits = $row->hits;
							?>
							<td class="center">
								<input type="checkbox" id="cb<?php echo $no; ?>" name="cid[]" value="<?php echo $id; ?>" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row <?php echo $no; ?>" />
							</td>
							<td class="nowrap">
								<a href="<?php echo site_url('admin/jurusan/edit/'.$id); ?>"><?php echo $jurusan; ?></a>
							</td>
							<td class="center">
								<a class="jgrid hasTip" href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $no; ?>','jurusan.unpublish')" title="Published and is Current::Start: 2011-01-01 00:00:01">
									<span class="state publish">
										<span class="text">Published</span>
									</span>
								</a>
							</td>
							<td class="nowrap"><?php echo $hits; ?></td>
							<?php
									echo "</tr>";
									$no++;
								}
							}
							else
							{
								//
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