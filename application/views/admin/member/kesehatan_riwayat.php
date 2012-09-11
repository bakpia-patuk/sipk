<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_rp').bind('click', function(e) {
			var lastOrderingRP = parseInt($(this).parent().parent().parent().find('#rp_last_ordering').val());
			if (isNaN(lastOrderingRP)) {
				lastOrderingRP = 0;
			}
			var ordering = lastOrderingRP + 1;
            $(this).parent().parent().parent().find('#rp_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#rp_panel').clone();
			cln.attr('id', '')
				.addClass('rp_panel');
            
            cln.find('#jform_rp_nama-lbl').attr('id', 'jform_rp_nama_' + ordering + '-lbl')
                .attr('for', 'jform_rp_nama_' + ordering);
            cln.find('#jform_rp_id').attr('id', 'jform_rp_id_' + ordering)
                .attr('name', 'jform[rp_id][]')
                .val('new_rp_id_' + ordering);
            cln.find('#jform_rp_penyakit').attr('id', 'jform_rp_penyakit_' + ordering)
                .attr('name', 'jform[rp_penyakit][]');
			cln.find('#jform_rp_tahun-lbl').attr('id', 'jform_rp_tahun_' + ordering + '-lbl')
                .attr('for', 'jform_rp_tahun_' + ordering);
            cln.find('#jform_rp_tahun').attr('id', 'jform_rp_tahun_' + ordering)
                .attr('name', 'jform[rp_tahun][]');
            cln.find('#jform_rp_perawatan-lbl').attr('id', 'jform_rp_perawatan_' + ordering + '-lbl')
                .attr('for', 'jform_rp_perawatan_' + ordering);
            cln.find('#jform_rp_perawatan').attr('id', 'jform_rp_perawatan_' + ordering)
                .attr('name', 'jform[rp_perawatan][]');
            cln.find('#jform_rp_keterangan-lbl').attr('id', 'jform_rp_keterangan_' + ordering + '-lbl')
                .attr('for', 'jform_rp_keterangan_' + ordering);
            cln.find('#jform_rp_keterangan').attr('id', 'jform_rp_keterangan_' + ordering)
                .attr('name', 'jform[rp_keterangan][]');
            
			cln.appendTo('#rp_container')
				.slideDown(500);
			
		});
		
		$('#rp_canvas').on('click', '.hapus_rp', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.rp_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<ul class="adminformlist">
    <li>
        <label id="jform_rp-lbl" for="jform_rk" class="hasTip" title="">Riwayat Penyakit</label>

        <div id="rp_canvas" style="margin-left: 150px;">
            <div id="rp_container">
                <input type="hidden" id="rp_last_ordering" name="rp_last_ordering" value="0" />

                <div id="rp_panel" style="display: none;">

                    <div style="float: left; width: 125px;">
                        <label id="jform_rp_penyakit-lbl" for="jform_rp_penyakit" class="hasTip" title="">Nama Penyakit:</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <input id="jform_rp_id" type="hidden" value="" />
                        <input id="jform_rp_penyakit" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;" autocomplete="off" >
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;">
                        <div class="button2-left">
                            <div class="blank">
                                <a class="hapus_rp" title="Hapus" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_rp_tahun-lbl" for="jform_rp_tahun" class="hasTip" title="">Tahun</label>
                    </div>
                    <div style="float: left; width: 75px;">
                        <select class="combobox" id="jform_rp_tahun">
                            <option id="jform_rp_tahun" value="" selected="1"></option>
                            <?php
                                foreach ($member_tahun AS $key => $value) {
                                    echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>
                    
                    <div style="float: left; width: 125px;">
                        <label id="jform_rp_perawatan-lbl" for="jform_rp_perawatan" class="hasTip" title="">Perawatan</label>
                    </div>
                    <div style="float: left; width: 250px; padding-top: 4px;">
                        <select class="combobox" id="jform_rp_perawatan">
                        <?php
                            foreach ($member_jenis_perawatan AS $key => $value) {
                                echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_rp_keterangan-lbl" for="jform_rp_keterangan" class="hasTip" title="">Keterangan</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <textarea id="jform_rp_keterangan" style="width: 95%;" ></textarea>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>
                    
                    <hr />
                </div>

            </div>
            <div class="rp_button button2-left">
                <div class="blank">
                    <a id="tambah_rp" title="Tambah Riwayat Penyakit" href="#">Tambah Riwayat Penyakit</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </li>
</ul>