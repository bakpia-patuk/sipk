<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_makanan_pokok').bind('click', function(e) {
			var lastOrderingMakananPokok = parseInt($(this).parent().parent().parent().find('#makanan_pokok_last_ordering').val());
			if (isNaN(lastOrderingMakananPokok)) {
				lastOrderingMakananPokok = 0;
			}
			var ordering = lastOrderingMakananPokok + 1;
            $(this).parent().parent().parent().find('#makanan_pokok_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#makanan_pokok_panel').clone();
			cln.attr('id', '')
				.addClass('makanan_pokok_panel');
            
			cln.find('#jform_makanan_pokok-lbl').attr('id', 'jform_makanan_pokok_' + ordering + '-lbl')
                .attr('for', 'jform_makanan_pokok_nama_' + ordering);
            cln.find('#jform_makanan_pokok_id').attr('id', 'jform_makanan_pokok_id_' + ordering)
                .attr('name', 'jform[makanan_pokok_id][]');
            cln.find('#jform_makanan_pokok_kategori').attr('id', 'jform_makanan_pokok_kategori_' + ordering)
                .attr('name', 'jform[makanan_pokok_kategori][]');
            cln.find('#jform_makanan_pokok_nama').attr('id', 'jform_makanan_pokok_nama_' + ordering)
                .attr('name', 'jform[makanan_pokok_nama][]');
            cln.find('#jform_makanan_pokok_frekwensi-lbl').attr('id', 'jform_makanan_pokok_frekwensi_' + ordering + '-lbl')
                .attr('for', 'jform_makanan_pokok_frekwensi_' + ordering);
            cln.find('#jform_makanan_pokok_frekwensi').attr('id', 'jform_makanan_pokok_frekwensi_' + ordering)
                .attr('name', 'jform[makanan_pokok_frekwensi][]');
            cln.find('#jform_makanan_pokok_keterangan-lbl').attr('id', 'jform_makanan_pokok_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_makanan_pokok_keterangan_' + ordering);
            cln.find('#jform_makanan_pokok_keterangan').attr('id', 'jform_makanan_pokok_keterangan_' + ordering)
                .attr('name', 'jform[makanan_pokok_keterangan][]');
           
			cln.appendTo('#makanan_pokok_container')
				.slideDown(500);
			
		});
		
		$('#makanan_pokok_canvas').on('click', '.hapus_makanan_pokok', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.makanan_pokok_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        $('#tambah_lauk_hewani').bind('click', function(e) {
			var lastOrderingLaukHewani = parseInt($(this).parent().parent().parent().find('#lauk_hewani_last_ordering').val());
			if (isNaN(lastOrderingLaukHewani)) {
				lastOrderingLaukHewani = 0;
			}
			var ordering = lastOrderingLaukHewani + 1;
            $(this).parent().parent().parent().find('#lauk_hewani_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#lauk_hewani_panel').clone();
			cln.attr('id', '')
				.addClass('lauk_hewani_panel');
            
			cln.find('#jform_lauk_hewani-lbl').attr('id', 'jform_lauk_hewani_' + ordering + '-lbl')
                .attr('for', 'jform_lauk_hewani_nama_' + ordering);
            cln.find('#jform_lauk_hewani_id').attr('id', 'jform_lauk_hewani_id_' + ordering)
                .attr('name', 'jform[lauk_hewani_id][]');
            cln.find('#jform_lauk_hewani_kategori').attr('id', 'jform_lauk_hewanik_kategori_' + ordering)
                .attr('name', 'jform[lauk_hewani_kategori][]');
            cln.find('#jform_lauk_hewani_nama').attr('id', 'jform_lauk_hewani_nama_' + ordering)
                .attr('name', 'jform[lauk_hewani_nama][]');
            cln.find('#jform_lauk_hewani_frekwensi-lbl').attr('id', 'jform_lauk_hewani_frekwensi_' + ordering + '-lbl')
                .attr('for', 'jform_lauk_hewani_frekwensi_' + ordering);
            cln.find('#jform_lauk_hewani_frekwensi').attr('id', 'jform_lauk_hewani_frekwensi_' + ordering)
                .attr('name', 'jform[lauk_hewani_frekwensi][]');
            cln.find('#jform_lauk_hewani_keterangan-lbl').attr('id', 'jform_lauk_hewani_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_lauk_hewani_keterangan_' + ordering);
            cln.find('#jform_lauk_hewani_keterangan').attr('id', 'jform_lauk_hewani_keterangan_' + ordering)
                .attr('name', 'jform[lauk_hewani_keterangan][]');
           
			cln.appendTo('#lauk_hewani_container')
				.slideDown(500);
			
		});
		
		$('#lauk_hewani_canvas').on('click', '.hapus_lauk_hewani', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.lauk_hewani_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        $('#tambah_lauk_nabati').bind('click', function(e) {
			var lastOrderingLaukNabati = parseInt($(this).parent().parent().parent().find('#lauk_nabati_last_ordering').val());
			if (isNaN(lastOrderingLaukNabati)) {
				lastOrderingLaukNabati = 0;
			}
			var ordering = lastOrderingLaukNabati + 1;
            $(this).parent().parent().parent().find('#lauk_nabati_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#lauk_nabati_panel').clone();
			cln.attr('id', '')
				.addClass('lauk_nabati_panel');
            
			cln.find('#jform_lauk_nabati-lbl').attr('id', 'jform_lauk_nabati_' + ordering + '-lbl')
                .attr('for', 'jform_lauk_nabati_nama_' + ordering);
            cln.find('#jform_lauk_nabati_id').attr('id', 'jform_lauk_nabati_id_' + ordering)
                .attr('name', 'jform[lauk_nabati_id][]');
            cln.find('#jform_lauk_nabati_kategori').attr('id', 'jform_lauk_nabati_kategori_' + ordering)
                .attr('name', 'jform[lauk_nabati_kategori][]');
            cln.find('#jform_lauk_nabati_nama').attr('id', 'jform_lauk_nabati_nama_' + ordering)
                .attr('name', 'jform[lauk_nabati_nama][]');
            cln.find('#jform_lauk_nabati_frekwensi-lbl').attr('id', 'jform_lauk_nabati_frekwensi_' + ordering + '-lbl')
                .attr('for', 'jform_lauk_nabati_frekwensi_' + ordering);
            cln.find('#jform_lauk_nabati_frekwensi').attr('id', 'jform_lauk_nabati_frekwensi_' + ordering)
                .attr('name', 'jform[lauk_nabati_frekwensi][]');
            cln.find('#jform_lauk_nabati_keterangan-lbl').attr('id', 'jform_lauk_nabati_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_lauk_nabati_keterangan_' + ordering);
            cln.find('#jform_lauk_nabati_keterangan').attr('id', 'jform_lauk_nabati_keterangan_' + ordering)
                .attr('name', 'jform[lauk_nabati_keterangan][]');
           
			cln.appendTo('#lauk_nabati_container')
				.slideDown(500);
			
		});
		
		$('#lauk_nabati_canvas').on('click', '.hapus_lauk_nabati', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.lauk_nabati_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        $('#tambah_sayuran').bind('click', function(e) {
			var lastOrderingSayuran = parseInt($(this).parent().parent().parent().find('#sayuran_last_ordering').val());
			if (isNaN(lastOrderingSayuran)) {
				lastOrderingSayuran = 0;
			}
			var ordering = lastOrderingSayuran + 1;
            $(this).parent().parent().parent().find('#sayuran_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#sayuran_panel').clone();
			cln.attr('id', '')
				.addClass('sayuran_panel');
            
			cln.find('#jform_sayuran-lbl').attr('id', 'jform_sayuran_' + ordering + '-lbl')
                .attr('for', 'jform_sayuran_nama_' + ordering);
            cln.find('#jform_sayuran_id').attr('id', 'jform_sayuran_id_' + ordering)
                .attr('name', 'jform[sayuran_id][]');
            cln.find('#jform_sayuran_kategori').attr('id', 'jform_sayuran_kategori_' + ordering)
                .attr('name', 'jform[sayuran_kategori][]');
            cln.find('#jform_sayuran_nama').attr('id', 'jform_sayuran_nama_' + ordering)
                .attr('name', 'jform[sayuran_nama][]');
            cln.find('#jform_sayuran_frekwensi-lbl').attr('id', 'jform_sayuran_frekwensi_' + ordering + '-lbl')
                .attr('for', 'jform_sayuran_frekwensi_' + ordering);
            cln.find('#jform_sayuran_frekwensi').attr('id', 'jform_sayuran_frekwensi_' + ordering)
                .attr('name', 'jform[sayuran_frekwensi][]');
            cln.find('#jform_sayuran_keterangan-lbl').attr('id', 'jform_sayuran_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_sayuran_keterangan_' + ordering);
            cln.find('#jform_sayuran_keterangan').attr('id', 'jform_sayuran_keterangan_' + ordering)
                .attr('name', 'jform[sayuran_keterangan][]');
           
			cln.appendTo('#sayuran_container')
				.slideDown(500);
			
		});
		
		$('#sayuran_canvas').on('click', '.hapus_sayuran', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.sayuran_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        $('#tambah_buah').bind('click', function(e) {
			var lastOrderingbuah = parseInt($(this).parent().parent().parent().find('#buah_last_ordering').val());
			if (isNaN(lastOrderingbuah)) {
				lastOrderingbuah = 0;
			}
			var ordering = lastOrderingbuah + 1;
            $(this).parent().parent().parent().find('#buah_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#buah_panel').clone();
			cln.attr('id', '')
				.addClass('buah_panel');
            
			cln.find('#jform_buah-lbl').attr('id', 'jform_buah_' + ordering + '-lbl')
                .attr('for', 'jform_buah_nama_' + ordering);
            cln.find('#jform_buah_id').attr('id', 'jform_buah_id_' + ordering)
                .attr('name', 'jform[buah_id][]');
            cln.find('#jform_buah_kategori').attr('id', 'jform_buah_kategori_' + ordering)
                .attr('name', 'jform[buah_kategori][]');
            cln.find('#jform_buah_nama').attr('id', 'jform_buah_nama_' + ordering)
                .attr('name', 'jform[buah_nama][]');
            cln.find('#jform_buah_frekwensi-lbl').attr('id', 'jform_buah_frekwensi_' + ordering + '-lbl')
                .attr('for', 'jform_buah_frekwensi_' + ordering);
            cln.find('#jform_buah_frekwensi').attr('id', 'jform_buah_frekwensi_' + ordering)
                .attr('name', 'jform[buah_frekwensi][]');
            cln.find('#jform_buah_keterangan-lbl').attr('id', 'jform_buah_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_buah_keterangan_' + ordering);
            cln.find('#jform_buah_keterangan').attr('id', 'jform_buah_keterangan_' + ordering)
                .attr('name', 'jform[buah_keterangan][]');
           
			cln.appendTo('#buah_container')
				.slideDown(500);
			
		});
		
		$('#buah_canvas').on('click', '.hapus_buah', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.buah_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        $('#tambah_ff_lain_lain').bind('click', function(e) {
			var lastOrderingff_lain_lain = parseInt($(this).parent().parent().parent().find('#ff_lain_lain_last_ordering').val());
			if (isNaN(lastOrderingff_lain_lain)) {
				lastOrderingff_lain_lain = 0;
			}
			var ordering = lastOrderingff_lain_lain + 1;
            $(this).parent().parent().parent().find('#ff_lain_lain_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#ff_lain_lain_panel').clone();
			cln.attr('id', '')
				.addClass('ff_lain_lain_panel');
            
			cln.find('#jform_ff_lain_lain-lbl').attr('id', 'jform_ff_lain_lain_' + ordering + '-lbl')
                .attr('for', 'jform_ff_lain_lain_nama_' + ordering);
            cln.find('#jform_ff_lain_lain_id').attr('id', 'jform_ff_lain_lain_id_' + ordering)
                .attr('name', 'jform[ff_lain_lain_id][]');
            cln.find('#jform_ff_lain_lain_kategori').attr('id', 'jform_ff_lain_lain_kategori_' + ordering)
                .attr('name', 'jform[ff_lain_lain_kategori][]');
            cln.find('#jform_ff_lain_lain_nama').attr('id', 'jform_ff_lain_lain_nama_' + ordering)
                .attr('name', 'jform[ff_lain_lain_nama][]');
            cln.find('#jform_ff_lain_lain_frekwensi-lbl').attr('id', 'jform_ff_lain_lain_frekwensi_' + ordering + '-lbl')
                .attr('for', 'jform_ff_lain_lain_frekwensi_' + ordering);
            cln.find('#jform_ff_lain_lain_frekwensi').attr('id', 'jform_ff_lain_lain_frekwensi_' + ordering)
                .attr('name', 'jform[ff_lain_lain_frekwensi][]');
            cln.find('#jform_ff_lain_lain_keterangan-lbl').attr('id', 'jform_ff_lain_lain_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_ff_lain_lain_keterangan_' + ordering);
            cln.find('#jform_ff_lain_lain_keterangan').attr('id', 'jform_ff_lain_lain_keterangan_' + ordering)
                .attr('name', 'jform[ff_lain_lain_keterangan][]');
           
			cln.appendTo('#ff_lain_lain_container')
				.slideDown(500);
			
		});
		
		$('#ff_lain_lain_canvas').on('click', '.hapus_ff_lain_lain', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.ff_lain_lain_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<fieldset class="panelform">
    <legend>Kebiasaan Makan</legend>
    <ul class="adminformlist">
        <li>
            <label id="jform_sarapan-lbl" for="jform_sarapan" class="hasTip required" title="">Sarapan</label>
            <?php
                $value = set_value('jform[sarapan]', $data->sarapan);
            ?>
            <select id="jform_sarapan" name="jform[sarapan]" class="inputbox" size="1">
            <?php
                foreach ($member_ya_tidak AS $key => $value) {
                    if ($key == $data->sarapan)
                        echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                    else
                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                }
            ?>
            </select>
        </li>
        <li>
            <label id="jform_makan_siang-lbl" for="jform_makan_siang" class="hasTip required" title="">Makan Siang</label>
            <?php
                $value = set_value('jform[makan_siang]', $data->makan_siang);
            ?>
            <select id="jform_sarapan" name="jform[makan_siang]" class="inputbox" size="1">
            <?php
                foreach ($member_ya_tidak AS $key => $value) {
                    if ($key == $data->makan_siang)
                        echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                    else
                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                }
            ?>
            </select>
        </li>
        <li>
            <label id="jform_makan_malam-lbl" for="jform_makan_malam" class="hasTip required" title="">Makan Malam</label>
            <?php
                $value = set_value('jform[makan_malam]', $data->sarapan);
            ?>
            <select id="jform_sarapan" name="jform[makan_malam]" class="inputbox" size="1">
            <?php
                foreach ($member_ya_tidak AS $key => $value) {
                    if ($key == $data->makan_malam)
                        echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                    else
                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                }
            ?>
            </select>
        </li>
    </ul>
</fieldset>
<fieldset class="panelform">
    <legend>Food Frequency</legend>
    <ul class="adminformlist">
        <li>
            <label id="jform_makanan_pokok-lbl" class="hasTip" title="Makanan Pokok::Makanan Pokok.">Makanan Pokok</label>
            <div id="makanan_pokok_canvas" style="margin-left: 150px;">
                <div id="makanan_pokok_container" style="">
                    <input type="hidden" id="makanan_pokok_last_ordering" name="makanan_pokok_last_ordering" value="0" />

                    <div id="makanan_pokok_panel" style="display: none;">
                        <div style="float: left; width: 125px;">
                            <label id="jform_makanan_pokok-lbl" class="hasTip" title="">Bahan Makanan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <input id="jform_makanan_pokok_id" type="hidden" value="" />
                            <input id="jform_makanan_pokok_kategori" type="hidden" value="Makanan Pokok" />
                            <input id="jform_makanan_pokok_nama" class="inputbox" type="text" maxlength="50" value="">
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;">
                            <div class="button2-left">
                                <div class="blank">
                                    <a class="hapus_makanan_pokok" title="Hapus" href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div style="float: left; width: 125px;">
                            <label id="jform_makanan_pokok_frekwensi-lbl" for="jform_makanan_pokok_frekwensi" class="hasTip" title="">Frekwensi</label>
                        </div>
                        <div style="float: left; width: 75px;">
                            <select class="combobox" id="jform_makanan_pokok_frekwensi">
                                <?php
                                    foreach ($member_frekwensi_konsumsi AS $key => $value) {
                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>
                        
                        <div style="float: left; width: 125px;">
                            <label id="jform_makanan_pokok_keterangan-lbl" class="hasTip" title="">Keterangan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <textarea id="jform_makanan_pokok_keterangan" style="width: 95%; margin-top: 2px;" ></textarea>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>

                        <hr>
                    </div>

                </div>
                <div class="makanan_pokok_button button2-left">
                    <div class="blank">
                        <a id="tambah_makanan_pokok" title="Tambah Makanan Pokok" href="#">Tambah Makanan Pokok</a>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </li>
        <li>
            <label id="jform_lauk_hewani-lbl" for="jform_lauk_hewani" class="hasTip" title="Lauk Hewani::Lauk Hewani.">Lauk Hewani</label>
            <div id="lauk_hewani_canvas" style="margin-left: 150px;">
                <div id="lauk_hewani_container" style="">
                    <input type="hidden" id="lauk_hewani_last_ordering" name="lauk_hewani_last_ordering" value="0" />

                    <div id="lauk_hewani_panel" style="display: none;">
                        <div style="float: left; width: 125px;">
                            <label id="jform_lauk_hewani-lbl" class="hasTip" title="">Bahan Makanan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <input id="jform_lauk_hewani_id" type="hidden" value="" />
                            <input id="jform_lauk_hewani_kategori" type="hidden" value="Lauk Hewani" />
                            <input id="jform_lauk_hewani_nama" class="inputbox" type="text" maxlength="50" value="">
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;">
                            <div class="button2-left">
                                <div class="blank">
                                    <a class="hapus_lauk_hewani" title="Hapus" href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div style="float: left; width: 125px;">
                            <label id="jform_lauk_hewani_frekwensi-lbl" class="hasTip" title="">Frekwensi</label>
                        </div>
                        <div style="float: left; width: 75px;">
                            <select class="combobox" id="jform_lauk_hewani_frekwensi">
                                <?php
                                    foreach ($member_frekwensi_konsumsi AS $key => $value) {
                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>
                        
                        <div style="float: left; width: 125px;">
                            <label id="jform_lauk_hewani_keterangan-lbl" class="hasTip" title="">Keterangan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <textarea id="jform_lauk_hewani_keterangan" style="width: 95%; margin-top: 2px;" ></textarea>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>

                        <hr>
                    </div>

                </div>
                <div class="lauk_hewani_button button2-left">
                    <div class="blank">
                        <a id="tambah_lauk_hewani" title="Tambah Lauk Hewani" href="#">Tambah Lauk Hewani</a>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </li>
        <li>
            <label id="jform_lauk_nabati-lbl" for="jform_lauk_nabati" class="hasTip" title="Lauk Nabati::Lauk Nabati.">Lauk Nabati</label>
            <div id="lauk_nabati_canvas" style="margin-left: 150px;">
                <div id="lauk_nabati_container" style="">
                    <input type="hidden" id="lauk_nabati_last_ordering" name="lauk_nabati_last_ordering" value="0" />

                    <div id="lauk_nabati_panel" style="display: none;">
                        <div style="float: left; width: 125px;">
                            <label id="jform_lauk_nabati-lbl" class="hasTip" title="">Bahan Makanan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <input id="jform_lauk_nabati_id" type="hidden" value="" />
                            <input id="jform_lauk_nabati_kategori" type="hidden" value="Lauk Nabati" />
                            <input id="jform_lauk_nabati_nama" class="inputbox" type="text" maxlength="50" value="">
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;">
                            <div class="button2-left">
                                <div class="blank">
                                    <a class="hapus_lauk_nabati" title="Hapus" href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div style="float: left; width: 125px;">
                            <label id="jform_lauk_nabati_frekwensi-lbl" class="hasTip" title="">Frekwensi</label>
                        </div>
                        <div style="float: left; width: 75px;">
                            <select class="combobox" id="jform_lauk_nabati_frekwensi">
                                <?php
                                    foreach ($member_frekwensi_konsumsi AS $key => $value) {
                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>
                        
                        <div style="float: left; width: 125px;">
                            <label id="jform_lauk_nabati_keterangan-lbl" class="hasTip" title="">Keterangan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <textarea id="jform_lauk_nabati_keterangan" style="width: 95%; margin-top: 2px;" ></textarea>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>

                        <hr>
                    </div>

                </div>
                <div class="lauk_nabati_button button2-left">
                    <div class="blank">
                        <a id="tambah_lauk_nabati" title="Tambah Lauk Nabati" href="#">Tambah Lauk Nabati</a>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </li>
        <li>
            <label id="jform_sayuran-lbl" for="jform_sayuran" class="hasTip" title="Sayuran::Sayuran.">Sayuran</label>
            <div id="sayuran_canvas" style="margin-left: 150px;">
                <div id="sayuran_container" style="">
                    <input type="hidden" id="sayuran_last_ordering" name="sayuran_last_ordering" value="0" />

                    <div id="sayuran_panel" style="display: none;">
                        <div style="float: left; width: 125px;">
                            <label id="jform_sayuran-lbl" class="hasTip" title="">Bahan Makanan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <input id="jform_sayuran_id" type="hidden" value="" />
                            <input id="jform_sayuran_kategori" type="hidden" value="Sayuran" />
                            <input id="jform_sayuran_nama" class="inputbox" type="text" maxlength="50" value="">
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;">
                            <div class="button2-left">
                                <div class="blank">
                                    <a class="hapus_sayuran" title="Hapus" href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div style="float: left; width: 125px;">
                            <label id="jform_sayuran_frekwensi-lbl" class="hasTip" title="">Frekwensi</label>
                        </div>
                        <div style="float: left; width: 75px;">
                            <select class="combobox" id="jform_sayuran_frekwensi">
                                <?php
                                    foreach ($member_frekwensi_konsumsi AS $key => $value) {
                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>
                        
                        <div style="float: left; width: 125px;">
                            <label id="jform_sayuran_keterangan-lbl" class="hasTip" title="">Keterangan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <textarea id="jform_sayuran_keterangan" style="width: 95%; margin-top: 2px;" ></textarea>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>

                        <hr>
                    </div>

                </div>
                <div class="sayuran_button button2-left">
                    <div class="blank">
                        <a id="tambah_sayuran" title="Tambah Sayuran" href="#">Tambah Sayuran</a>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </li>
        <li>
            <label id="jform_buah-lbl" for="jform_buah" class="hasTip" title="Buah-buahan::Buah-buahan.">Buah-buahan</label>
            <div id="buah_canvas" style="margin-left: 150px;">
                <div id="buah_container" style="">
                    <input type="hidden" id="buah_last_ordering" name="buah_last_ordering" value="0" />

                    <div id="buah_panel" style="display: none;">
                        <div style="float: left; width: 125px;">
                            <label id="jform_buah-lbl" class="hasTip" title="">Bahan Makanan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <input id="jform_buah_id" type="hidden" value="" />
                            <input id="jform_buah_kategori" type="hidden" value="Buah-buahan" />
                            <input id="jform_buah_nama" class="inputbox" type="text" maxlength="50" value="">
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;">
                            <div class="button2-left">
                                <div class="blank">
                                    <a class="hapus_buah" title="Hapus" href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div style="float: left; width: 125px;">
                            <label id="jform_buah_frekwensi-lbl" class="hasTip" title="">Frekwensi</label>
                        </div>
                        <div style="float: left; width: 75px;">
                            <select class="combobox" id="jform_buah_frekwensi">
                                <?php
                                    foreach ($member_frekwensi_konsumsi AS $key => $value) {
                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>
                        
                        <div style="float: left; width: 125px;">
                            <label id="jform_buah_keterangan-lbl" class="hasTip" title="">Keterangan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <textarea id="jform_buah_keterangan" style="width: 95%; margin-top: 2px;" ></textarea>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>

                        <hr>
                    </div>

                </div>
                <div class="buah_button button2-left">
                    <div class="blank">
                        <a id="tambah_buah" title="Tambah Buah-buahan" href="#">Tambah Buah-buahan</a>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </li>
        <li>
            <label id="jform_ff_lain_lain-lbl" for="jform_ff_lain_lain" class="hasTip" title="Lain-lain::Lain-lain.">Lain-lain</label>
            <div id="ff_lain_lain_canvas" style="margin-left: 150px;">
                <div id="ff_lain_lain_container" style="">
                    <input type="hidden" id="ff_lain_lain_last_ordering" name="ff_lain_lain_last_ordering" value="0" />

                    <div id="ff_lain_lain_panel" style="display: none;">
                        <div style="float: left; width: 125px;">
                            <label id="jform_ff_lain_lain-lbl" class="hasTip" title="">Bahan Makanan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <input id="jform_ff_lain_lain_id" type="hidden" value="" />
                            <input id="jform_ff_lain_lain_kategori" type="hidden" value="Lain-lain" />
                            <input id="jform_ff_lain_lain_nama" class="inputbox" type="text" maxlength="50" value="">
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;">
                            <div class="button2-left">
                                <div class="blank">
                                    <a class="hapus_ff_lain_lain" title="Hapus" href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div style="float: left; width: 125px;">
                            <label id="jform_ff_lain_lain_frekwensi-lbl" class="hasTip" title="">Frekwensi</label>
                        </div>
                        <div style="float: left; width: 75px;">
                            <select class="combobox" id="jform_ff_lain_lain_frekwensi">
                                <?php
                                    foreach ($member_frekwensi_konsumsi AS $key => $value) {
                                        echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>
                        
                        <div style="float: left; width: 125px;">
                            <label id="jform_ff_lain_lain_keterangan-lbl" class="hasTip" title="">Keterangan</label>
                        </div>
                        <div style="float: left; width: 250px;">
                            <textarea id="jform_ff_lain_lain_keterangan" style="width: 95%; margin-top: 2px;" ></textarea>
                        </div>
                        <div style="float: left; width: 47px; margin-left: 2px;"></div>
                        <div class="clr"></div>

                        <hr>
                    </div>

                </div>
                <div class="ff_lain_lain_button button2-left">
                    <div class="blank">
                        <a id="tambah_ff_lain_lain" title="Tambah Lain-lain" href="#">Tambah Lain-lain</a>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </li>
    </ul>
</fieldset>
<fieldset class="panelform">
    <legend>Makanan yang tidak disukai / Alergi terhadap makanan</legend>
    <ul class="adminformlist">
        <li>
            <label id="jform_alergi-lbl" for="jform_alergi" class="hasTip" title="Alergi::Alergi.">Deskripsi</label>
            <?php
                $value = set_value('jform[alergi]', $data->alergi);
            ?>
            <textarea name="jform[alergi]" id="jform_alergi" cols="45" rows="2"><?php echo $value; ?></textarea>
        </li>
    </ul>
</fieldset>