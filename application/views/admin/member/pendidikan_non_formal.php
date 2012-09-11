<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_pnf').bind('click', function(e) {
			var lastOrderingPNF = parseInt($(this).parent().parent().parent().find('#pnf_last_ordering').val());
			if (isNaN(lastOrderingPNF)) {
				lastOrderingPNF = 0;
			}
			var ordering = lastOrderingPNF + 1;
            $(this).parent().parent().parent().find('#pnf_last_ordering').val(ordering);
			
			e.preventDefault();

			var cln = $('#pnf_panel').clone();
			cln.attr('id', '')
				.addClass('pnf_panel');
			cln.find('#jform_pnf_nama-lbl').attr('id', 'jform_pnf_nama_' + ordering + '-lbl')
                .attr('for', 'jform_pnf_nama_' + ordering);
            cln.find('#jform_pnf_pendidikan_id').attr('id', 'jform_pnf_pendidikan_id_' + ordering)
                .attr('name', 'jform[pnf_pendidikan_id][]')
                .val('new_pnf_pendidikan_id_' + ordering);
            cln.find('#jform_pnf_nama').attr('id', 'jform_pnf_nama_' + ordering)
                .attr('name', 'jform[pnf_nama][]');
			cln.find('#jform_pnf_tahun_dari-lbl').attr('id', 'jform_pnf_tahun_dari_' + ordering + '-lbl')
                .attr('for', 'jform_pnf_tahun_dari_' + ordering);
            cln.find('#jform_pnf_tahun_dari').attr('id', 'jform_pnf_tahun_dari_' + ordering)
                .attr('name', 'jform[pnf_tahun_dari][]');
            cln.find('#jform_pnf_tahun_sampai-lbl').attr('id', 'jform_pnf_tahun_sampai_' + ordering + '-lbl')
                .attr('for', 'jform_pnf_tahun_sampai_' + ordering);
            cln.find('#jform_pnf_tahun_sampai').attr('id', 'jform_pnf_tahun_sampai_' + ordering)
                .attr('name', 'jform[pnf_tahun_sampai][]');
            cln.find('#jform_pnf_lokasi-lbl').attr('id', 'jform_pnf_lokasi_' + ordering + '-lbl')
                .attr('for', 'jform_pnf_tahun_sampai_' + ordering);
            cln.find('#jform_pnf_lokasi').attr('id', 'jform_pnf_lokasi_' + ordering)
                .attr('name', 'jform[pnf_lokasi][]');
            cln.find('#jform_pnf_deskripsi-lbl').attr('id', 'jform_pnf_deskripsi_' + ordering + '-lbl')
                .attr('for', 'jform_pnf_deskripsi_' + ordering);
            cln.find('#jform_pnf_deskripsi').attr('id', 'jform_pnf_deskripsi_' + ordering)
                .attr('name', 'jform[pnf_deskripsi][]');
			cln.appendTo('#pnf_container')
				.slideDown(500);
			
		});
		
		$('#pnf_canvas').on('click', '.hapus_pnf', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.pnf_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<div class="pane-slider memberprofile">
    <fieldset class="panelform">
        <ul class="adminformlist">
            <li>
                <label id="jform_pengalaman_kerja-lbl" for="jform_pengalaman_kerja" class="hasTip" title="">Pendidikan Non Formal</label>

                <div id="pnf_canvas" style="margin-left: 150px;">
                    <div id="pnf_container">
                        <input type="hidden" id="pnf_last_ordering" name="pnf_last_ordering" value="<?php echo count($member_pendidikan_non_formal); ?>" />
                        
                        <?php
                            $idxPNF = 0;
                            foreach ($member_pendidikan_non_formal as $pnf) {
                        ?>
                        <div class="pnf_panel">

                            <div style="float: left; width: 125px;">
                                <label id="jform_pnf_nama-lbl" for="jform_pnf_nama_<?php echo $idxPNF; ?>" class="hasTip" title="">Nama Pendidikan:</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input id="jform_pnf_pendidikan_id_<?php echo $idxPNF; ?>" name="jform[pnf_pendidikan_id][]" type="hidden" value="<?php echo $pnf->id; ?>" />
                                <input id="jform_pnf_nama_<?php echo $idxPNF; ?>" name="jform[pnf_nama][]" class="inputbox" type="text" maxlength="50" value="<?php echo $pnf->nama; ?>" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_pnf" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_pnf_tahun_dari-lbl" for="jform_pnf_tahun_dari_<?php echo $idxPNF; ?>" class="hasTip" title="">Dari tahun</label>
                            </div>
                            <div style="float: left; width: 75px;">
                                <select id="jform_pnf_tahun_dari_<?php echo $idxPNF; ?>" name="jform[pnf_tahun_dari][]" class="combobox">
                                    <option value="" selected="selected"></option>
                                    <?php
                                        foreach ($member_tahun AS $key => $value) {
                                            if ($key == $pnf->tahun_dari)
                                                echo "<option value=\"{$key}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                            else
                                                echo "<option value=\"{$key}\">$value&nbsp;&nbsp;</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div style="float: left; width: 25px;">
                                <label id="jform_pnf_tahun_sampai-lbl" for="jform_pnf_tahun_sampai_<?php echo $idxPNF; ?>" class="hasTip" title="">s/d</label>
                            </div>
                            <div style="float: left; width: 75px;">
                                <select id="jform_pnf_tahun_sampai_<?php echo $idxPNF; ?>" name="jform[pnf_tahun_sampai][]" class="combobox">
                                    <option value="" selected="1"></option>
                                    <?php
                                        foreach ($member_tahun AS $key => $value) {
                                            if ($key == $pnf->tahun_sampai)
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
                                <label id="jform_pnf_lokasi-lbl" for="jform_pnf_lokasi_<?php echo $idxPNF; ?>" class="hasTip" title="">Lokasi</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input class="inputbox" id="jform_pnf_lokasi_<?php echo $idxPNF; ?>" name="jform[pnf_lokasi][]" type="text" value="<?php echo $pnf->lokasi ?>" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_pnf_deskripsi-lbl" for="jform_pnf_deskripsi_<?php echo $idxPNF; ?>" class="hasTip" title="">Lulus/Sertifikasi</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <textarea id="jform_pnf_deskripsi_<?php echo $idxPNF; ?>" name="jform[pnf_deskripsi][]" style="width: 95%;" ><?php echo $pnf->deskripsi ?></textarea>
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>
                            <hr />
                        </div>
                        <?php
                                $idxPNF++;
                            }
                        ?>

                        <div id="pnf_panel" style="display: none;">

                            <div style="float: left; width: 125px;">
                                <label id="jform_pnf_nama-lbl" class="hasTip" title="">Nama Pendidikan:</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input id="jform_pnf_pendidikan_id" type="hidden" value="" />
                                <input id="jform_pnf_nama" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_pnf" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_pnf_tahun_dari-lbl" class="hasTip" title="">Dari tahun</label>
                            </div>
                            <div style="float: left; width: 75px;">
                                <select id="jform_pnf_tahun_dari" class="combobox">
                                    <option value="" selected="1"></option>
                                    <?php
                                        foreach ($member_tahun AS $thn => $value) {
                                            echo "<option value='$thn'>$value&nbsp;&nbsp;</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div style="float: left; width: 25px;">
                                <label id="jform_pnf_tahun_sampai-lbl" class="hasTip" title="">s/d</label>
                            </div>
                            <div style="float: left; width: 75px;">
                                <select id="jform_pnf_tahun_sampai" class="combobox">
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
                                <label id="jform_pnf_lokasi-lbl" class="hasTip" title="">Lokasi</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input class="inputbox" id="jform_pnf_lokasi" type="text" value="" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_pnf_deskripsi-lbl" class="hasTip" title="">Lulus/Sertifikasi</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <textarea id="jform_pnf_deskripsi" style="width: 95%;" ></textarea>
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>
                            <hr />
                        </div>
                        
                    </div>
                    <div class="pnf_button button2-left">
                        <div class="blank">
                            <a id="tambah_pnf" title="Tambah Pendidikan Non Formal" href="#">Tambah Pendidikan Non Formal</a>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </li>
        </ul>
    </fieldset>
</div>