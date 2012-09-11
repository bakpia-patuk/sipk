<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_p').bind('click', function(e) {
			var lastOrderingP = parseInt($(this).parent().parent().parent().find('#p_last_ordering').val());
			if (isNaN(lastOrderingP)) {
				lastOrderingP = 0;
			}
			var ordering = lastOrderingP + 1;
            $(this).parent().parent().parent().find('#p_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#p_panel').clone();
			cln.attr('id', '')
				.addClass('p_panel');
            
			cln.find('#jform_p_nama-lbl').attr('id', 'jform_p_nama_' + ordering + '-lbl')
                .attr('for', 'jform_p_nama_' + ordering);
            cln.find('#jform_p_pendidikan_id').attr('id', 'jform_p_pendidikan_id_' + ordering)
                .attr('name', 'jform[p_pendidikan_id][]')
                .val('new_p_pendidikan_id_' + ordering);
            cln.find('#jform_p_nama').attr('id', 'jform_p_nama_' + ordering)
                .attr('name', 'jform[p_nama][]');
			cln.find('#jform_p_tahun-lbl').attr('id', 'jform_p_tahun_' + ordering + '-lbl')
                .attr('for', 'jform_p_tahun_' + ordering);
            cln.find('#jform_p_tahun').attr('id', 'jform_p_tahun_' + ordering)
                .attr('name', 'jform[p_tahun][]');
            cln.find('#jform_p_lokasi-lbl').attr('id', 'jform_p_lokasi_' + ordering + '-lbl')
                .attr('for', 'jform_p_tahun_sampai_' + ordering);
            cln.find('#jform_p_lokasi').attr('id', 'jform_p_lokasi_' + ordering)
                .attr('name', 'jform[p_lokasi][]');
            cln.find('#jform_p_deskripsi-lbl').attr('id', 'jform_p_deskripsi_' + ordering + '-lbl')
                .attr('for', 'jform_p_deskripsi_' + ordering);
            cln.find('#jform_p_deskripsi').attr('id', 'jform_p_deskripsi_' + ordering)
                .attr('name', 'jform[p_deskripsi][]');
           
			cln.appendTo('#p_container')
				.slideDown(500);
			
		});
		
		$('#p_canvas').on('click', '.hapus_p', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.p_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<div class="pane-slider memberprofile">
    <fieldset class="panelform">
        <ul class="adminformlist">
            <li>
                <label id="jform_pelatihan-lbl" for="jform_pengalaman_kerja" class="hasTip" title="">Pelatihan/Kursus/Seminar</label>

                <div id="p_canvas" style="margin-left: 150px;">
                    <div id="p_container">
                        <input type="hidden" id="p_last_ordering" name="p_last_ordering" value="<?php echo count($member_pendidikan_pelatihan); ?>" />
                        
                        <?php
                            $idxP = 0;
                            foreach ($member_pendidikan_pelatihan as $p) {
                        ?>
                        <div class="p_panel">

                            <div style="float: left; width: 125px;">
                                <label id="jform_p_nama-lbl" for="jform_p_nama_<?php echo $idxP; ?>" class="hasTip" title="">Nama Pelatihan<br>/Kursus/Seminar:</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input id="jform_p_pendidikan_id_<?php echo $idxP; ?>" name="jform[p_pendidikan_id][]" type="hidden" value="<?php echo $p->id; ?>" />
                                <input id="jform_p_nama_<?php echo $idxP; ?>" name="jform[p_nama][]" class="inputbox" type="text" maxlength="50" value="<?php echo $p->nama; ?>" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_p" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_p_tahun_<?php echo $idxP; ?>-lbl" for="jform_p_tahun_<?php echo $idxP; ?>" class="hasTip" title="">Tahun</label>
                            </div>
                            <div style="float: left; width: 75px;">
                                <select class="combobox" id="jform_p_tahun_<?php echo $idxP; ?>" name="jform[p_tahun][]" >
                                    <option id="jform_p_tahun" value="" selected="1"></option>
                                    <?php
                                        foreach ($member_tahun AS $key => $value) {
                                            if ($key == $p->tahun_dari)
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
                                <label id="jform_p_lokasi-lbl" for="jform_p_lokasi_<?php echo $idxP; ?>" class="hasTip" title="">Lokasi</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input class="inputbox" id="jform_p_lokasi_<?php echo $idxP; ?>" name="jform[p_lokasi][]" type="text" value="<?php echo $p->lokasi; ?>" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_p_deskripsi-lbl" for="jform_p_deskripsi_<?php echo $idxP; ?>" class="hasTip" title="">Lulus/Sertifikas</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <textarea id="jform_p_deskripsi_<?php echo $idxP; ?>" name="jform[p_deskripsi][]" style="width: 95%; margin-top: 2px;" ><?php echo $p->deskripsi; ?></textarea>
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>
                            <hr />
                        </div>
                        <?php
                                $idxP++;
                            }
                        ?>

                        <div id="p_panel" style="display: none;">

                            <div style="float: left; width: 125px;">
                                <label id="jform_p_nama-lbl" class="hasTip" title="">Nama Pelatihan<br>/Kursus/Seminar:</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input id="jform_p_pendidikan_id" type="hidden" value="" />
                                <input id="jform_p_nama" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;">
                                <div class="button2-left">
                                    <div class="blank">
                                        <a class="hapus_p" title="Hapus" href="#">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_p_tahun_dari-lbl" class="hasTip" title="">Tahun</label>
                            </div>
                            <div style="float: left; width: 75px;">
                                <select class="combobox" id="jform_p_tahun_dari">
                                    <option id="jform_p_tahun_dari" value="" selected="1"></option>
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
                                <label id="jform_p_lokasi-lbl" class="hasTip" title="">Lokasi</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <input class="inputbox" id="jform_p_lokasi" type="text" value="" style="width: 95%;">
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>

                            <div style="float: left; width: 125px;">
                                <label id="jform_p_deskripsi-lbl" class="hasTip" title="">Lulus/Sertifikas</label>
                            </div>
                            <div style="float: left; width: 250px;">
                                <textarea id="jform_p_deskripsi" style="width: 95%; margin-top: 2px;" ></textarea>
                            </div>
                            <div style="float: left; width: 47px; margin-left: 2px;"></div>
                            <div class="clr"></div>
                            <hr />
                        </div>

                    </div>
                    <div class="p_button button2-left">
                        <div class="blank">
                            <a id="tambah_p" title="Tambah Pelatihan/Kursus/Seminar" href="#">Tambah Pelatihan/Kursus/Seminar</a>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </li>
        </ul>
    </fieldset>
</div>