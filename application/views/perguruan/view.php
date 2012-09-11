<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
	<div id="s5_component_wrap">
		<div id="s5_component_wrap_inner">

            <div id="system-message-container"></div>
            <div class="item-page">
                <h2 class="page-title">Perguruan Tinggi</h2>
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
                <form action="<?php echo site_url('perguruan'); ?>" method="post" name="adminForm" id="adminForm">
		
                    <fieldset id="filter-bar">
                        <div class="filter-search fltlft">
                            <div style="float: left;">
                                <label class="filter-search-lbl" for="filter_search">Filter:</label>
                                <input name="filter_search" id="filter_search" title="Search title or alias. Prefix with id: to search for an article id." type="text">
                                <button type="submit" class="btn">Search</button>
                                <button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
                            </div>
                        </div>
                        <div style="clear:both; height:0px"></div>
                        <div class="filter-select fltrt" style="float: left;">
                            <select name="filter_ketegori" onchange="this.form.submit()">
                                <?php
                                    $perguruan_kategori['Semua'] = '- Kategori Perguruan Tinggi -';
                                    $html = "";
                                    foreach ($perguruan_kategori as $key => $value) {
                                        if ($key == $filter_kategori) {
                                            $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                        }
                                        else {
                                            $html .= "<option value=\"$key\">$value</option>";
                                        }
                                    }
                                    echo $html;
                                ?>
                            </select>
                            <select name="filter_status" onchange="this.form.submit()">
                                <?php
                                    $perguruan_status['Semua'] = '- Status -';
                                    $html = "";
                                    foreach ($perguruan_status as $key => $value) {
                                        if ($key == (string)$filter_status) {
                                            $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                        }
                                        else {
                                            $html .= "<option value=\"$key\">$value</option>";
                                        }
                                    }
                                    echo $html;
                                ?>
                            </select>
                            <select name="filter_akreditasi" onchange="this.form.submit()">
                                <?php
                                    $perguruan_akreditasi['Semua'] = '- Status Akreditasi -';
                                    $html = "";
                                    foreach ($perguruan_akreditasi as $key => $value) {
                                        if ($key == (string)$filter_akreditasi) {
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
                                    $perguruan_wilayah['Semua'] = '- Wilayah -';
                                    $html = "";
                                    foreach ($perguruan_wilayah as $key => $value) {
                                        if ($key == (string)$filter_wilayah) {
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
                        <div class="display-limit">Display #&#160;
                            <select id="limit" name="limit" class="inputbox" size="1" onchange="this.form.submit()">
                                <option value="5">5</option>
                                <option value="10" selected="selected">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="0">All</option>
                            </select>
                        </div>

                        <!-- @TODO add hidden inputs -->
                        <input type="hidden" name="filter_order" value="" />
                        <input type="hidden" name="filter_order_Dir" value="" />
                        <input type="hidden" name="limitstart" value="" />
                    </fieldset>
		
                    <div style="float: left; width: 100%; overflow:auto;" id="load_data">
                        <table class="category">
                            <thead>
                                <tr>
                                    <th class="list-no">No.</th>
                                    <th nowrap="nowrap" class="list-nama" id="tableOrdering">
                                        <a href="javascript:tableOrdering('nama','asc','');" title="Click to sort by this column">Nama Sekolah</a>
                                    </th>
                                    <th  class="list-akronim">Akronim</th>
                                    <th height="19">Kategori</th>
                                    <th height="19">Status</th>
                                    <th height="19">Akreditasi</th>
                                    <th height="19">Wilayah</th>
                                    <th height="19">Alamat</th>
                                    <th height="19">Telepon 1</th>
                                    <th height="19">Telepon 2</th>
                                    <th height="19">Fax</th>
                                    <th height="19">Nama Pimpinan</th>
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
                                        echo '<td class="list-nama" nowrap="nowrap">';
                                        echo '	<a href="'.site_url('perguruan/detail/'.$row->id).'">'.$row->nama.'</a>';
                                        echo '</td>';
                                        echo '<td class="list-akronim" nowrap="nowrap" align="center">'.$row->akronim.'</td>';
                                        echo '<td class="list-kategori">'.$row->kategori.'</td>';
                                        echo '<td class="list-status">'.$row->status.'</td>';
                                        echo '<td class="list-akronim">'.$row->akreditasi.'</td>';
                                        echo '<td class="list-akronim">'.$row->wilayah.'</td>';
                                        echo '<td class="list-akronim">'.$row->alamat.'</td>';
                                        echo '<td class="list-akronim">'.$row->telepon1.'</td>';
                                        echo '<td class="list-akronim">'.$row->telepon2.'</td>';
                                        echo '<td class="list-akronim">'.$row->fax.'</td>';
                                        echo '<td class="list-akronim">'.$row->rektor.'</td>';
                                        echo '<td class="list-akronim">'.$row->email.'</td>';
                                        echo '<td class="list-akronim">'.$row->website.'</td>';
                                        echo '</tr>';
                                        $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear:both; height:0px"></div>
            
                    <div class="pagination">
                        <p class="counter">Page 1 of 2</p>
                        <div class="pagination">
                            <span>&laquo;</span>
                            <span>Start</span>
                            <span>Prev</span>
                            <strong>
                                <span>1</span>
                            </strong>
                            <strong>
                                <a href="#" title="2">2</a>
                            </strong>
                            <a href="#" title="Next">Next</a>
                            <a href="#" title="End">End</a>
                            <span>&raquo;</span>
                            <?php //echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
            
                </form>
            </div>
            
        </div>
    </div>		
</div>