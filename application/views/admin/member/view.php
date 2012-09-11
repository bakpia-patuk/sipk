<?php
	//print_r($data['data']);
?>
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
								<a class="active" href="index.php?option=com_content&amp;view=articles">User</a>
							</li>
							<li>
								<a href="index.php?option=com_categories&amp;extension=com_content">Member</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="mc-component" class="clearfix">
			<form action="<?php echo site_url('admin/member'); ?>" method="post" name="adminForm" id="adminForm">
				<fieldset id="filter-bar">
					<div class="filter-search fltlft">
						<label class="filter-search-lbl" for="filter_search">Filter:</label>
						<input type="text" name="filter_search" id="filter_search" value="" title="Search title or alias. Prefix with ID: to search for an article ID." />
						<button type="submit" class="btn">Search</button>
						<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
					</div>
					<div class="filter-select fltrt">
						<select name="filter_published" class="inputbox" onchange="this.form.submit()">
							<option value="">- Select Status -</option>
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
							<option value="2">Archived</option>
							<option value="-2">Trashed</option>
							<option value="*">All</option>
						</select>
						<select name="filter_category_id" class="inputbox" onchange="this.form.submit()">
							<option value="">- Select Category -</option>
							<option value="14">Sample Data-Articles</option>
							<option value="19">- Joomla!</option>
							<option value="20">- - Extensions</option>
							<option value="21">- - - Components</option>
							<option value="22">- - - Modules</option>
							<option value="64">- - - - Content Modules</option>
							<option value="65">- - - - User Modules</option>
							<option value="66">- - - - Display Modules</option>
							<option value="67">- - - - Utility Modules</option>
							<option value="75">- - - - Navigation Modules</option>
							<option value="23">- - - Templates</option>
							<option value="69">- - - - Beez 20</option>
							<option value="70">- - - - Beez 5</option>
							<option value="68">- - - - Atomic</option>
							<option value="24">- - - Languages</option>
							<option value="25">- - - Plugins</option>
							<option value="26">- Park Site</option>
							<option value="27">- - Park Blog</option>
							<option value="28">- - Photo Gallery</option>
							<option value="72">- - - Animals</option>
							<option value="73">- - - Scenery</option>
							<option value="29">- Fruit Shop Site</option>
							<option value="30">- - Growers</option>
							<option value="76">- - Recipes</option>
							<option value="9">Uncategorised</option>
						</select>
						<select name="filter_level" class="inputbox" onchange="this.form.submit()">
							<option value="">- Select Max Levels -</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
						<select name="filter_access" class="inputbox" onchange="this.form.submit()">
							<option value="">- Select Access -</option>
							<option value="1">Public</option>
							<option value="2">Registered</option>
							<option value="3">Special</option>
							<option value="4">Customer Access Level (Example)</option>
						</select>
						<select name="filter_author_id" class="inputbox" onchange="this.form.submit()">
							<option value="">- Select Author -</option>
							<option value="42">Super User</option>
						</select>
						<select name="filter_language" class="inputbox" onchange="this.form.submit()">
							<option value="">- Select Language -</option>
							<option value="*">All</option>
							<option value="en-GB">English (UK)</option>
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
                            <th width="10%">
								<a href="#" onclick="Joomla.tableOrdering('no_anggota','desc','');" title="Click to sort by this column">No. Anggota<img src="<?php echo base_url('images/admin/sort_asc.png'); ?>" alt="" /></a>
							</th>
							<th>
								<a href="#" onclick="Joomla.tableOrdering('a.nama','desc','');" title="Click to sort by this column">Nama</a>
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
                            <td colspan="10">
                                <?php echo $this->pagination->create_links(); ?>
                                <input type="hidden" name="limitstart" value="<?php //echo $limitstart; ?>" />
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
                                $no_anggota = $row->no_anggota;
								$nama = $row->nama;
								$state = $row->state;
								$hits = $row->hits;
						?>
						<td class="center">
							<input type="checkbox" id="cb<?php echo $no; ?>" name="cid[]" value="<?php echo $id; ?>" onclick="Joomla.isChecked(this.checked);" title="Checkbox for row <?php echo $no; ?>" />
						</td>
                        <td class="nowrap">
							<a href="<?php echo site_url('admin/member/edit/'.$id); ?>"><?php echo $no_anggota; ?></a>
						</td>
						<td class="nowrap">
							<a href="<?php echo site_url('admin/member/edit/'.$id); ?>"><?php echo $nama; ?></a>
						</td>
						<td class="center">
							<a class="jgrid hasTip" href="javascript:void(0);" onclick="return listItemTask('cb0','articles.unpublish')" title="Published and is Current::Start: 2011-01-01 00:00:01">
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