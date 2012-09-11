<script type="text/javascript">
    $(document).ready(function() {
        
		switch ($('#jform_olah_raga').val()) {
			case 'Ya':
                $('#ya_olah_raga').show();
				break;
			case 'Tidak':
                $('#ya_olah_raga').hide();
				break;
		}
		$('#jform_olah_raga').bind('change', function() {
            switch ($('#jform_olah_raga').val()) {
                case 'Ya':
                    $('#ya_olah_raga').show();
                    break;
                case 'Tidak':
                    $('#ya_olah_raga').hide();
                    break;
            }
		});
        
        $('#tambah_jor').bind('click', function(e) {
			var lastOrderingJOR = parseInt($(this).parent().parent().parent().find('#jor_last_ordering').val());
			if (isNaN(lastOrderingJOR)) {
				lastOrderingJOR = 0;
			}
			var ordering = lastOrderingJOR + 1;
            $(this).parent().parent().parent().find('#jor_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#jor_panel').clone();
			cln.attr('id', '')
				.addClass('jor_panel');
                
            cln.find('#jform_jor_id').attr('id', 'jform_jor_id_' + ordering)
                .attr('name', 'jform[jor_id][]')
                .val('new_jor_id_' + ordering);
            cln.find('#jform_jor_nama').attr('id', 'jform_jor_nama_' + ordering)
                .attr('name', 'jform[jor_nama][]');
			cln.find('#jform_jor_frekwensi').attr('id', 'jform_jor_frekwensi_' + ordering)
                .attr('name', 'jform[jor_frekwensi][]');

			cln.appendTo('#jor_container')
				.slideDown(500);
                
		});
        
		$('#jor_canvas').on('click', '.hapus_jor', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.jor_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
	});
</script>
<ul class="adminformlist">
    <li>
        <label id="jform_kelahiran-lbl" for="jform_kelahiran" class="hasTip" title="">Kelahiran</label>
        <?php
            $value = set_value('jform[kelahiran]', $data->kelahiran);
        ?>
        <select id="jform_kelahiran" name="jform[kelahiran]" class="inputbox" size="1">
        <?php
            foreach ($member_kelahiran AS $key => $value) {
                if ($key == $data->kelahiran)
                    echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                else
                    echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
            }
        ?>
        </select>
        <ul style="padding-left: 20px;">
            <li>
                <label id="jform_berat_badan_lahir-lbl" for="jform_berat_badan_lahir" class="hasTip" title="">Berat Badan Lahir</label>
                <?php
                    $value = set_value('jform[berat_badan_lahir]', $data->berat_badan_lahir);
                ?>
                <input name="jform[berat_badan_lahir]" id="jform_berat_badan_lahir" class="inputbox" size="10" maxlength="10" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" > kg
            </li>
            <li>
                <label id="jform_panjang_badan_lahir-lbl" for="jform_panjang_badan_lahir" class="hasTip" title="">Panjang Badan Lahir</label>
                <?php
                    $value = set_value('jform[panjang_badan_lahir]', $data->panjang_badan_lahir);
                ?>
                <input name="jform[panjang_badan_lahir]" id="jform_panjang_badan_lahir" class="inputbox" size="10" maxlength="10" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" > cm
            </li>
            <li>
                <label id="jform_persalinan-lbl" for="jform_persalinan" class="hasTip" title="">Penanganan Persalinan</label>
                <select id="jform_persalinan" name="jform[persalinan]" class="inputbox" size="1">
                <?php
                    foreach ($member_persalinan AS $key => $value) {
                        if ($key == $data->persalinan)
                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                        else
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                    }
                ?>
                </select>
            </li>
            <li>
                <label id="jform_imunisasi-lbl" for="jform_imunisasi" class="hasTip" title="">Program Imunisasi</label>
                <?php
                    $value = set_value('jform[imunisasi]', $data->imunisasi);
                ?>
                <select id="jform_imunisasi" name="jform[imunisasi]" class="inputbox" size="1">
                <?php
                    foreach ($member_ya_tidak AS $key => $value) {
                        if ($key == $data->imunisasi)
                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                        else
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                    }
                ?>
                </select>
            </li>
            <li>
                <label id="jform_imunisasi_lengkap-lbl" for="jform_imunisasi_lengkap" class="hasTip" title="">Imunisasi Lengkap</label>
                <select id="jform_imunisasi_lengkap" name="jform[imunisasi_lengkap]" class="inputbox" size="1">
                <?php
                    foreach ($member_ya_tidak AS $key => $value) {
                        if ($key == $data->imunisasi_lengkap)
                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                        else
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                    }
                ?>
                </select>
            </li>
        </ul>
    </li>
    <li>
        <label id="jform_cacat-lbl" for="jform_cacat" class="hasTip" title="">Memiliki Cacat Lahir</label>
        <select id="jform_cacat" name="jform[cacat]" class="inputbox" size="1">
        <?php
            foreach ($member_ya_tidak AS $key => $value) {
                if ($key == $data->cacat)
                    echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                else
                    echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
            }
        ?>
        </select>
    </li>
    <li>
        <label id="jform_kacamata-lbl" for="jform_kacamata" class="hasTip" title="">Menggunakan Kacamata</label>
        <select id="jform_kacamata" name="jform[kacamata]" class="inputbox" size="1">
        <?php
            foreach ($member_ya_tidak AS $key => $value) {
                if ($key == $data->kacamata)
                    echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                else
                    echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
            }
        ?>
        </select>
    </li>
    <li>
        <label id="jform_merokok-lbl" for="jform_merokok" class="hasTip" title="">Merokok</label>
        <select id="jform_merokok" name="jform[merokok]" class="inputbox" size="1">
        <?php
            foreach ($member_ya_tidak AS $key => $value) {
                if ($key == $data->merokok)
                    echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                else
                    echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
            }
        ?>
        </select>
    </li>
    <li>
        <label id="jform_olah_raga-lbl" for="jform_olah_raga" class="hasTip" title="">Olah Raga</label>
        <select id="jform_olah_raga" name="jform[olah_raga]" class="inputbox" size="1">
        <?php
            foreach ($member_ya_tidak AS $key => $value) {
                if ($key == $data->olah_raga)
                    echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                else
                    echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
            }
        ?>
        </select>
    </li>
    <li id="ya_olah_raga">
        
        <label id="jform_jenis_olah_raga-lbl" for="jform_jenis_olah_raga" class="hasTip" title="">Jenis Olah Raga</label>

        <div id="jor_canvas" style="margin-left: 150px;">
            <div id="jor_container">
                <input type="hidden" id="jor_last_ordering" name="jor_last_ordering" value="0" />

                <div id="jor_panel" style="display: none;">

                    <div style="float: left; width: 250px;">
                        <input id="jform_jor_id" type="hidden" value="" />
                        <input id="jform_jor_nama" class="inputbox" type="text" maxlength="50" value="" style="width: 94%;">
                    </div>
                    <div style="float: left; width: 125px;">
                        (<input id="jform_jor_frekwensi" class="inputbox" type="text" maxlength="50" value="" style="width: 27%;"> kali/minggu)
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;">
                        <div class="button2-left">
                            <div class="blank">
                                <a class="hapus_jor" title="Hapus" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>
                    
                    <hr />
                </div>

            </div>
            <div class="jor_button button2-left">
                <div class="blank">
                    <a id="tambah_jor" title="Tambah Jenis Olah Raga" href="#">Tambah Jenis Olah Raga</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>
        
    </li>
    <li>
        <label id="jform_kelahiran-lbl" for="jform_kelahiran" class="hasTip" title="">Ritme Kegiatan Harian</label>
    </li>
    <li>
        <ul style="padding-left: 20px;">
            <li style="height: 35px;">
                <label id="jform_tidur_siang-lbl" for="jform_tidur_siang" class="hasTip" title="">Apakah terbiasa Tidur Siang</label>
                <select id="jform_tidur_siang" name="jform[tidur_siang]" class="inputbox" size="1">
                <?php
                    foreach ($member_ya_tidak AS $key => $value) {
                        if ($key == $data->tidur_siang)
                            echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                        else
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                    }
                ?>
                </select>
            </li>
            <li style="height: 35px;">
                <label id="jform_lama_tidur-lbl" for="jform_lama_tidur" class="hasTip" title="">Berapa lama Anda terbiasa tidur</label>
                <?php
                    $value = set_value('jform[lama_tidur]', $data->lama_tidur);
                ?>
                <input name="jform[lama_tidur]" id="jform_lama_tidur" class="inputbox" size="10" maxlength="10" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" > jam
            </li>
            <li style="height: 35px;">
                <label id="jform_lama_duduk-lbl" for="jform_lama_duduk" class="hasTip" title="">Berapa lama Anda Duduk dalam sehari</label>
                <?php
                    $value = set_value('jform[lama_duduk]', $data->lama_duduk);
                ?>
                <input name="jform[lama_duduk]" id="jform_lama_duduk" class="inputbox" size="10" maxlength="10" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" > jam
            </li>
            <li style="height: 35px;">
                <label id="jform_lama_berkendaraan-lbl" for="jform_lama_berkendaraan" class="hasTip" title="">Berapa lama Anda Berkendaraan</label>
                <?php
                    $value = set_value('jform[lama_berkendaraan]', $data->lama_berkendaraan);
                ?>
                <input name="jform[lama_berkendaraan]" id="jform_lama_berkendaraan" class="inputbox" size="10" maxlength="10" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" > jam
            </li>
        </ul>
    </li>
</ul>