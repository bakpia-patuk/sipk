<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
	<div id="s5_component_wrap">
		<div id="s5_component_wrap_inner">

            <div id="system-message-container"></div>
            <div class="item-page">
                <h2>Daftar Jurusan Perguruan Tinggi</h2>
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
                <form action="<?php echo site_url('sekolah'); ?>" method="post" name="adminForm" id="adminForm">
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
                            <select name="filter_jenjang" onchange="this.form.submit()">
                                <?php
                                /*
                                    $jenjang['Semua'] = '- Jenjang -';
                                    $html = "";
                                    foreach ($sekolah_jenjang as $key => $value) {
                                        if ($key == $filter_jenjang) {
                                            $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                        }
                                        else {
                                            $html .= "<option value=\"$key\">$value</option>";
                                        }
                                    }
                                    echo $html;
                                 */
                                ?>
                            </select>
                            <select name="filter_status" onchange="this.form.submit()">
                                <?php
                                /*
                                    $status['Semua'] = '- Status -';
                                    $html = "";
                                    foreach ($sekolah_status as $key => $value) {
                                        if ($key == (string)$filter_status) {
                                            $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                        }
                                        else {
                                            $html .= "<option value=\"$key\">$value</option>";
                                        }
                                    }
                                    echo $html;
                                 * 
                                 */
                                ?>
                            </select>
                            <select name="filter_wilayah" onchange="this.form.submit()">
                                <?php
                                /*
                                    $wilayah['Semua'] = '- Wilayah -';
                                    $html = "";
                                    foreach ($sekolah_wilayah as $key => $value) {
                                        if ($key == (string)$filter_wilayah) {
                                            $html .= "\n<option selected=\"selected\" value=\"$key\">$value</option>";
                                        }
                                        else {
                                            $html .= "<option value=\"$key\">$value</option>";
                                        }
                                    }
                                    echo $html;
                                 * 
                                 */
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
                                    <th class="list-jenjang" id="tableOrdering3">
                                        <a href="javascript:tableOrdering('jenjang','asc','');" title="Click to sort by this column">Jenjang</a>
                                    </th>
                                    <th class="list-status" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('status','asc','');" title="Click to sort by this column">Status</a>
                                    </th>
                                    <th class="list-wilayah" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('wilayah','asc','');" title="Click to sort by this column">Wilayah</a>
                                    </th>
                                    <th class="list-alamat" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('alamat','asc','');" title="Click to sort by this column">Alamat</a>
                                    </th>
                                    <th nowrap="nowrap" class="list-telepon1" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('telepon1','asc','');" title="Click to sort by this column">Telepon 1</a>
                                    </th>
                                    <th nowrap="nowrap" class="list-telepon2" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('telepon2','asc','');" title="Click to sort by this column">Telepon 2</a>
                                    </th>
                                    <th nowrap="nowrap" class="list-fax" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('fax','asc','');" title="Click to sort by this column">Fax</a>
                                    </th>

                                    <th class="list-daya-tampung" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('daya_tampung','asc','');" title="Click to sort by this column">Daya Tampung</a>
                                    </th>
                                    <th class="list-nilai-tertinggi" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('nilai_tertinggi','asc','');" title="Click to sort by this column">Nilai Tertinggi</a>
                                    </th>
                                    <th class="list-grade" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('grade','asc','');" title="Click to sort by this column">Passing Grade</a>
                                    </th>
                                    <th class="list-cluster" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('cluster','asc','');" title="Click to sort by this column">Cluster</a>
                                    </th>
                                    <th class="list-biaya" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('biaya','asc','');" title="Click to sort by this column">Perkiraan Biaya</a>
                                    </th>

                                    <th class="list-email" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('email','asc','');" title="Click to sort by this column">Email</a>
                                    </th>
                                    <th class="list-website" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('website','asc','');" title="Click to sort by this column">Web Site</a>
                                    </th>
                                    <th class="list-hits" id="tableOrdering4">
                                        <a href="javascript:tableOrdering('hits','asc','');" title="Click to sort by this column">Hits</a>
                                    </th>
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
                                        echo '	<a href="'.site_url('sekolah/detail/'.$row->id).'">'.$row->nama.'</a>';
                                        echo '</td>';
                                        echo '<td class="list-jenjang">'.$row->jenjang.'</td>';
                                        echo '<td class="list-jenjang">'.$row->status.'</td>';
                                        echo '<td class="list-jenjang">'.$row->wilayah.'</td>';
                                        echo '<td class="list-jenjang">'.$row->alamat.'</td>';
                                        echo '<td nowrap="nowrap" class="list-jenjang">'.$row->telepon1.'</td>';
                                        echo '<td nowrap="nowrap" class="list-jenjang">'.$row->telepon2.'</td>';
                                        echo '<td nowrap="nowrap" class="list-jenjang">'.$row->fax.'</td>';
                                        echo '<td class="list-jenjang">'.$row->daya_tampung.'</td>';
                                        echo '<td class="list-jenjang">'.$row->nilai_tertinggi.'</td>';
                                        echo '<td class="list-jenjang">'.$row->grade.'</td>';
                                        echo '<td class="list-jenjang">'.$row->cluster.'</td>';
                                        echo '<td class="list-jenjang">'.$row->biaya.'</td>';
                                        echo '<td class="list-jenjang">'.$row->email.'</td>';
                                        echo '<td class="list-jenjang">'.$row->website.'</td>';
                                        echo '<td class="list-jenjang">'.$row->hits.'</td>';
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