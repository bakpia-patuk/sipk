<script type="text/javascript">
    $(document).ready(function() {
        
		$('#tambah_hasil_dokter').bind('click', function(e) {
			var lastOrderingHasilLab = parseInt($(this).parent().parent().parent().find('#hasil_dokter_last_ordering').val());
			if (isNaN(lastOrderingHasilLab)) {
				lastOrderingHasilLab = 0;
			}
			var ordering = lastOrderingHasilLab + 1;
            $(this).parent().parent().parent().find('#hasil_dokter_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#hasil_dokter_panel').clone();
			cln.attr('id', '')
				.addClass('hasil_dokter_panel');
			/*
            cln.find('#jform_pf_nama-lbl').attr('id', 'jform_pf_nama_' + ordering + '-lbl')
                .attr('for', 'jform_pf_nama_' + ordering);
            cln.find('#jform_pf_pendidikan_id').attr('id', 'jform_pf_pendidikan_id_' + ordering)
                .attr('name', 'jform[pf_pendidikan_id][]');
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
            */
			cln.appendTo('#hasil_dokter_container')
				.slideDown(500);
			
		});
		
		$('#hasil_dokter_canvas').on('click', '.hapus_hasil_dokter', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.hasil_dokter_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
    });
</script>
<ul class="adminformlist">
    <li>
        <label id="jform_hasil_dokter-lbl" for="jform_hasil_dokter" class="hasTip" title="">Pendidikan Formal</label>

        <div id="hasil_dokter_canvas" style="margin-left: 150px;">
            <div id="hasil_dokter_container">
                <input type="hidden" id="hasil_dokter_last_ordering" name="hasil_dokter_last_ordering" value="0" />

                <div id="hasil_dokter_panel" style="display: none;">

                    <div style="float: left; width: 125px;">
                        <label id="jform_hasil_dokter_tanggal-lbl" class="hasTip" title="">Tanggal:</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <input id="jform_hasil_dokter_id" type="hidden" value="" />
                        <input id="jform_hasil_dokter_tanggal" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;">
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;">
                        <div class="button2-left">
                            <div class="blank">
                                <a class="hapus_hasil_dokter" title="Hapus" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>

                    <div style="float: left; width: 125px;">
                        <label id="jform_hasil_dokter_kesimpulan-lbl" for="jform_hasil_dokter_kesimpulan" class="hasTip" title="">Kesimpulan</label>
                    </div>
                    <div style="float: left; width: 250px;">
                        <textarea id="jform_hasil_dokter_kesimpulan" style="width: 95%;" ></textarea>
                    </div>
                    <div style="float: left; width: 47px; margin-left: 2px;"></div>
                    <div class="clr"></div>
                    <hr />
                </div>

            </div>
            <div class="hasil_dokter_button button2-left">
                <div class="blank">
                    <a id="tambah_hasil_dokter" title="Tambah Hasil Laboratorium" href="#">Tambah Hasil Laboratorium</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </li>
</ul>