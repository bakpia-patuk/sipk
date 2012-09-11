<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task != 'kategori.delete' || confirm('Anda yakin untuk menghapus Group ini? Konfirmasi akan menghapus Group yang dipilih.')) {
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
			<form action="<?php echo site_url('admin/kategori'); ?>" method="post" name="adminForm" id="adminForm">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<label class="filter-search-lbl" for="filter_search">Filter:</label>
						<input type="text" name="filter_search" id="filter_search" value="" title="Search title or alias. Prefix with ID: to search for an article ID." />
						<button type="submit" class="btn">Search</button>
						<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
					</div>
					<div class="filter-select fltrt">
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
								<a href="#" onclick="Joomla.tableOrdering('a.group','desc','');" title="Click to sort by this column">Kategori<img src="<?php echo base_url('images/admin/sort_asc.png'); ?>" alt=""  /></a>
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
								$kategori = $row->kategori;
						?>
						<td class="center">
							<input type="checkbox" id="cb<?php echo $no; ?>" name="cid[]" value="<?php echo $id; ?>" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row <?php echo $no; ?>" />
						</td>
						<td class="nowrap">
							<a href="<?php echo site_url('admin/kategori/add?id='.$id); ?>"><?php echo $kategori; ?></a>
						</td>
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
					<input type="hidden" name="filter_order" value="a.title" />
					<input type="hidden" name="filter_order_Dir" value="asc" />
				</div>
			</form>
		</div>
		<div class="mc-clr"></div>
	</div>
</div>