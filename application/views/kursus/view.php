<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
<div id="s5_component_wrap">
<div id="s5_component_wrap_inner">
    
    <div id="system-message-container"></div>
    <div class="item-page">
        
        <h2>Daftar Bimbel/Kursus/Test</h2>
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

		<form action="" method="post" name="adminForm" id="adminForm">
		
            <fieldset id="filter-bar">
                <div class="filter-search fltlft">
                    <div style="float: left;">
                        <label class="filter-search-lbl" for="filter_search">Filter:</label>
                        <input name="filter_search" id="filter_search" title="Search title or alias. Prefix with id: to search for an article id." type="text">
                        <button type="submit" class="btn">Search</button>
                        <button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="filter-select fltrt" style="float: left;">
                    <select name="filter_ketegori" onchange="this.form.submit()">
                        <?php
                            $kategori['Semua'] = '- Kategori -';
                            $html = "";
                            foreach ($kategori as $key => $value) {
                                if ($key == $filterKategori) {
                                    $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                }
                                else {
                                    $html .= "<option value=\"$key\">$value</option>";
                                }
                            }
                            echo $html;
                        ?>
                    </select>
                    <select name="filter_wilayah" onchange="this.form.submit()">
                        <?php
                            $wilayah['Semua'] = '- Wilayah -';
                            $html = "";
                            foreach ($wilayah as $key => $value) {
                                if ($key == (string)$filterStatus) {
                                    $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                }
                                else {
                                    $html .= "<option value=\"$key\">$value</option>";
                                }
                            }
                            echo $html;
                        ?>
                    </select>
                </div>
            </fieldset>
            <fieldset class="filters">
                <?php echo $this->pagination->render_limit_box(); ?>
                <!-- @TODO add hidden inputs -->
                <input type="hidden" name="filter_order" value="" />
                <input type="hidden" name="filter_order_Dir" value="" />
                <input type="hidden" name="limitstart" value="" />
            </fieldset>
		
            <div style="float: left; width: 100%; overflow:auto;" id="load_data">
                <table style="width: 1800px;">
                    <thead>
                        <tr class="tablehead bold">
                            <th class="list-no">No.</th>
                            <th height="19">Nama</th>
                            <th height="19">Kategori</th>
                            <th height="19">Wilayah</th>
                            <th height="19">Alamat</th>
                            <th height="19">Telepon 1</th>
                            <th height="19">Telepon 2</th>
                            <th height="19">Fax</th>
                            <th height="19">Email</th>
                            <th height="19">Web Site</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($data as $row)
                            {
                                if ($no % 2 == 0) {
                                    echo "<tr class=\"cat-list-row0\" >";
                                }
                                else {
                                    echo "<tr class=\"cat-list-row1\" >";
                                }
                                echo '<td class="list-no">'.$no.'</td>';
                                echo '<td nowrap="nowrap" class="list-nama">';
                                echo '	<a href="'.site_url('kursus/detail/'.$row->id).'">'.$row->nama.'</a>';
                                echo '</td>';
                                echo '<td>'.$row->kategori.'</td>';
                                echo '<td>'.$row->wilayah.'</td>';
                                echo '<td>'.$row->alamat.'</td>';
                                echo '<td>'.$row->telepon1.'</td>';
                                echo '<td>'.$row->telepon2.'</td>';
                                echo '<td>'.$row->fax.'</td>';
                                echo '<td>'.$row->email.'</td>';
                                echo '<td>'.$row->website.'</td>';
                                echo '</tr>';
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div style="clear:both; height:0px"></div>
            
            <?php
                if (($total_rows > 0) && ($total_rows > $limit)) {
            ?>
            <div class="pagination">
                <?php echo $this->pagination->render_page_counter(); ?>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <?php
                }
            ?>
            
        </form>
    </div>
    
</div>
</div>
</div>