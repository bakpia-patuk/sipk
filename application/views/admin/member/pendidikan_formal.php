<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_pf').bind('click', function(e) {
			var lastOrderingPF = parseInt($(this).parent().parent().parent().find('#pf_last_ordering').val());
			if (isNaN(lastOrderingPF)) {
				lastOrderingPF = 0;
			}
			var ordering = lastOrderingPF + 1;
            $(this).parent().parent().parent().find('#pf_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#pf_panel').clone();
			cln.attr('id', '')
				.addClass('pf_panel');
			
            cln.find('#jform_pf_nama-lbl').attr('id', 'jform_pf_nama_' + ordering + '-lbl')
                .attr('for', 'jform_pf_nama_' + ordering);
            cln.find('#jform_pf_pendidikan_id').attr('id', 'jform_pf_pendidikan_id_' + ordering)
                .attr('name', 'jform[pf_pendidikan_id][]')
                .val('new_pf_pendidikan_id_' + ordering);
            cln.find('#jform_pf_nama').attr('id', 'jform_pf_nama_' + ordering)
                .attr('name', 'jform[pf_nama][]');
			cln.find('#jform_pf_tahun_dari-lbl').attr('id', 'jform_pf_tahun_dari_' + ordering + '-lbl')
                .attr('for', 'jform_pf_tahun_dari_' + ordering);
            cln.find('#jform_pf_tahun_dari').attr('id', 'jform_pf_tahun_dari_' + ordering)
                .attr('name', 'jform[pf_tahun_dari][]');
            cln.find('#jform_pf_tahun_sampai-lbl').attr('id', 'jform_pf_tahun_sampai_' + ordering + '-lbl')
                .attr('for', 'jform_pf_tahun_sampai_' + ordering);
            cln.find('#jform_pf_tahun_sampai').attr('id', 'jform_pf_tahun_sampai_' + ordering)
                .attr('name', 'jform[pf_tahun_sampai][]');
            cln.find('#jform_pf_lokasi-lbl').attr('id', 'jform_pf_lokasi_' + ordering + '-lbl')
                .attr('for', 'jform_pf_tahun_sampai_' + ordering);
            cln.find('#jform_pf_lokasi').attr('id', 'jform_pf_lokasi_' + ordering)
                .attr('name', 'jform[pf_lokasi][]');
            cln.find('#jform_pf_jenjang-lbl').attr('id', 'jform_pf_jenjang_' + ordering + '-lbl')
                .attr('for', 'jform_pf_jenjang_' + ordering);
            cln.find('#jform_pf_jenjang').attr('id', 'jform_pf_jenjang_' + ordering)
                .attr('name', 'jform[pf_jenjang][]');
            cln.find('#jform_pf_deskripsi-lbl').attr('id', 'jform_pf_deskripsi_' + ordering + '-lbl')
                .attr('for', 'jform_pf_deskripsi_' + ordering);
            cln.find('#jform_pf_deskripsi').attr('id', 'jform_pf_deskripsi_' + ordering)
                .attr('name', 'jform[pf_deskripsi][]');
            
			cln.appendTo('#pf_container')
				.slideDown(500);
			
		});
		
		$('#pf_canvas').on('click', '.hapus_pf', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.pf_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<ul class="adminformlist">
    <li>
        <label id="jform_pengalaman_kerja-lbl" for="jform_pengalaman_kerja" class="hasTip" title="">Pendidikan Formal</label>

        <div id="pf_canvas" style="margin-left: 150px;">
            <div id="pf_container">
                <input type="hidden" id="pf_last_ordering" name="pf_last_ordering" value="<?php echo count($member_pendidikan_formal); ?>" />
                
                <?php
                    $idxPF = 0;
                    foreach ($member_pendidikan_formal as $pf) {
                ?>
                <div class="pf_panel">

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_nama_<?php echo $idxPF; ?>-lbl" for="jform_pf_nama_<?php echo $idxPF; ?>" class="hasTip" title="">Nama Sekolah / Perguruan Tinggi:</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <input id="jform_pf_pendidikan_id_<?php echo $idxPF; ?>" name="jform[pf_pendidikan_id][]" type="hidden" value="<?php echo $pf->id; ?>" />
                        <input id="jform_pf_nama_<?php echo $idxPF; ?>" name="jform[pf_nama][]" class="inputbox" type="text" maxlength="50" value="<?php echo $pf->nama; ?>" style="width: 95%;">
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;">
                        <div class="button2-left">
                            <div class="blank">
                                <a class="hapus_pf" title="Hapus" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_tahun_dari_<?php echo $idxPF; ?>-lbl" for="jform_pf_tahun_dari_<?php echo $idxPF; ?>" class="hasTip" title="">Dari tahun</label>
                    </div>
                    <div style="float: left; width: 75px;">
                        <select class="combobox" id="jform_pf_tahun_dari" name="jform[pf_tahun_dari][]">
                            <option value="" selected="selected"></option>
                            <?php
                                foreach ($member_tahun AS $key => $value) {
                                    if ($key == $pf->tahun_dari)
                                        echo "<option value=\"{$key}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                    else
                                        echo "<option value=\"$key\">$value&nbsp;&nbsp;</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div style="float: left; width: 25px;">
                        <label id="jform_pf_tahun_sampai_<?php echo $idxPF; ?>-lbl" for="jform_pf_tahun_sampai_<?php echo $idxPF; ?>" class="hasTip" title="">s/d</label>
                    </div>
                    <div style="float: left; width: 75px;">
                        <select id="jform_pf_tahun_sampai" name="jform[pf_tahun_sampai][]" class="combobox">
                            <option value="" selected="selected"></option>
                            <?php
                                foreach ($member_tahun AS $key => $value) {
                                    if ($key == $pf->tahun_sampai)
                                        echo "<option value=\"{$key}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                    else
                                        echo "<option value=\"$key\">$value&nbsp;&nbsp;</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_lokasi_<?php echo $idxPF; ?>-lbl" for="jform_pf_lokasi_<?php echo $idxPF; ?>" class="hasTip" title="">Lokasi</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <input class="inputbox" id="jform_pf_lokasi_<?php echo $idxPF; ?>" name="jform[pf_lokasi][]" type="text" value="<?php echo $pf->lokasi; ?>" style="width: 95%;">
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px; padding-top: 4px;">
                        <label id="jform_pf_jenjang_<?php echo $idxPF; ?>-lbl" for="jform_pf_jenjang_<?php echo $idxPF; ?>" class="hasTip" title="">Jenjang Pendidikan:</label>
                    </div>
                    <div style="float: left; width: 250px; padding-top: 4px;">
                        <select class="combobox" id="jform_pf_jenjang_<?php echo $idxPF; ?>" name="jform[pf_jenjang][]">
                        <?php
                            foreach ($member_jenjang_pendidikan_program_studi AS $key => $value) {
                                if ($key == $pf->jenjang)
                                    echo "<option value=\"{$key}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                else
                                    echo "<option value=\"{$key}\">$value&nbsp;&nbsp;</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_deskripsi_<?php echo $idxPF; ?>-lbl" for="jform_pf_deskripsi_<?php echo $idxPF; ?>" class="hasTip" title="">Deskripsi</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <textarea id="jform_pf_deskripsi_<?php echo $idxPF; ?>" name="jform[pf_deskripsi][]" style="width: 95%;" ><?php echo $pf->deskripsi; ?></textarea>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>
                    <hr />
                </div>
                <?php
                        $idxPF++;
                    }
                ?>

                <div id="pf_panel" style="display: none;">

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_nama-lbl" class="hasTip" title="">Nama Sekolah / Perguruan Tinggi:</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <input id="jform_pf_pendidikan_id" type="hidden" value="" />
                        <input id="jform_pf_nama" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;">
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;">
                        <div class="button2-left">
                            <div class="blank">
                                <a class="hapus_pf" title="Hapus" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_tahun_dari-lbl" class="hasTip" title="">Dari tahun</label>
                    </div>
                    <div style="float: left; width: 75px;">
                        <select class="combobox" id="jform_pf_tahun_dari">
                            <option id="jform_pf_tahun_dari" selected="1"></option>
                            <?php
                                foreach ($member_tahun AS $thn => $value) {
                                    echo "<option value='$thn'>$value&nbsp;&nbsp;</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div style="float: left; width: 25px;">
                        <label id="jform_pf_tahun_sampai-lbl" class="hasTip" title="">s/d</label>
                    </div>
                    <div style="float: left; width: 75px;">
                        <select id="jform_pf_tahun_sampai" class="combobox">
                            <option value="" selected="1"></option>
                            <?php
                                foreach ($member_tahun AS $thn => $value) {
                                    echo "<option value='$thn'>$value&nbsp;&nbsp;</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_lokasi-lbl" class="hasTip" title="">Lokasi</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <input class="inputbox" id="jform_pf_lokasi" type="text" value="" style="width: 95%;">
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px; padding-top: 4px;">
                        <label id="jform_pf_jenjang-lbl" class="hasTip" title="">Jenjang Pendidikan:</label>
                    </div>
                    <div style="float: left; width: 250px; padding-top: 4px;">
                        <select class="combobox" id="jform_pf_jenjang">
                        <?php
                            foreach ($member_jenjang_pendidikan_program_studi AS $jjn => $value) {
                                echo "<option value='$jjn'>$value&nbsp;&nbsp;</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_pf_deskripsi-lbl" class="hasTip" title="">Deskripsi</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <textarea id="jform_pf_deskripsi" style="width: 95%;" ></textarea>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>
                    <hr />
                </div>

            </div>
            <div class="pf_button button2-left">
                <div class="blank">
                    <a id="tambah_pf" title="Tambah Pendidikan Formal" href="#">Tambah Pendidikan Formal</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </li>
</ul>