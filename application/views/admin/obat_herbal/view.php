<?php
	//print_r($data['data']);
?>
<?php
	$filter_search = '';
	$filter_published = '';
	$filter_wilayah = '';
?>
<script type="text/javascript">
    window.addEvent('domready', function() {
        $$('.hasTip').each(function(el) {
            var title = el.get('title');
            if (title) {
                var parts = title.split('::', 2);
                el.store('tip:title', parts[0]);
                el.store('tip:text', parts[1]);
            }
        });
        var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false});
    });

    var MCSessionTimeout = 900000;
    var MCSessionLang = {
        "expired": "Session Expired"
    }
</script>
<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		/*
        switch (task) {
            case 'obat_herbal.delete':
                document.adminForm.action = '<?php echo site_url('admin/obat_herbal/delete'); ?>';
                break;
        }
		*/
		if (task != 'obat_herbal.delete' || confirm('Are you sure you want to delete these menus? Confirming will delete the selected menu types, all their menu items and the associated menu modules.')) {
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
								<a <?php echo $tab_active == 'Obat' ? 'class="active" ' : ''; ?>href="<?php echo site_url('admin/obat'); ?>">Obat</a>
							</li>
							<li>
								<a <?php echo $tab_active == 'Obat Herbal' ? 'class="active" ' : ''; ?>href="<?php echo site_url('admin/obat_herbal'); ?>">Obat Herbal</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="mc-component" class="clearfix">
			<form action="<?php echo site_url('admin/obat_herbal'); ?>" method="post" name="adminForm" id="adminForm">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<label class="filter-search-lbl" for="filter_search">Filter:</label>
						<input type="text" name="filter_search" id="filter_search" value="" title="Search title or alias. Prefix with ID: to search for an article ID." />
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
								$obat_herbal_state = array_merge($first, $obat_herbal_state);
								$obat_herbal_state = array_merge($obat_herbal_state, $last);
								foreach ($obat_herbal_state AS $key => $value) {
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
								<a href="#" onclick="Joomla.tableOrdering('a.nama','desc','');" title="Click to sort by this column">Nama Penyakit<img src="/joomla/media/system/images/sort_asc.png" alt=""  /></a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('a.state','desc','');" title="Click to sort by this column">Status</a>
							</th>
							<th width="5%">
								<a href="#" onclick="Joomla.tableOrdering('a.hits','asc','');" title="Click to sort by this column">Hits</a>
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
								$hits = $row->hits;
						?>
						<td class="center">
							<input type="checkbox" id="cb<?php echo $no; ?>" name="cid[]" value="<?php echo $id; ?>" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row <?php echo $no; ?>" />
						</td>
						<td class="nowrap">
							<a href="<?php echo site_url('admin/obat_herbal/edit/'.$id); ?>"><?php echo $nama; ?></a>
						</td>
						<td class="center">
							<a class="jgrid hasTip" href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $no; ?>','articles.unpublish')" title="Published and is Current::Start: 2011-01-01 00:00:01">
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
						?>
					</tbody>
				</table>
				<div>
					<input type="hidden" name="task" value="" />
					<input type="hidden" name="boxchecked" value="0" />
					<input type="hidden" name="filter_order" value="a.title" />
					<input type="hidden" name="filter_order_Dir" value="asc" />
					<input type="hidden" name="c7e4eeb3e30937ad5bd0cc2a45eb21ae" value="1" />
				</div>
			</form>
		</div>
		<div class="mc-clr"></div>
	</div>
</div>