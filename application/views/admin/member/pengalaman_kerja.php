<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_pk').bind('click', function(e) {
			var lastOrderingPK = parseInt($(this).parent().parent().parent().find('#pk_last_ordering').val());
			if (isNaN(lastOrderingPK)) {
				lastOrderingPK = 0;
			}
			var ordering = lastOrderingPK + 1;
            $(this).parent().parent().parent().find('#pk_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#pk_panel').clone();
			cln.attr('id', '')
				.addClass('pk_panel');
            
			/*
			jform[pk_id][]
			jform[pk_nama][]
			jform[pk_tahun_dari][]
			jform[pk_tahun_sampai][]
			jform[pk_lokasi][]
			jform[pk_jabatan][]
			jform[pk_prestasi][]
			*/
			
            cln.find('#jform_pk_nama-lbl').attr('id', 'jform_pk_nama_' + ordering + '-lbl')
                .attr('for', 'jform_pk_nama_' + ordering);
            cln.find('#jform_pk_id').attr('id', 'jform_pk_id_' + ordering)
                .attr('name', 'jform[pk_id][]')
                .val('new_pk_id_' + ordering);
            cln.find('#jform_pk_nama').attr('id', 'jform_pk_nama_' + ordering)
                .attr('name', 'jform[pk_nama][]');
			cln.find('#jform_pk_tahun_dari-lbl').attr('id', 'jform_pk_tahun_dari_' + ordering + '-lbl')
                .attr('for', 'jform_pk_tahun_dari_' + ordering);
            cln.find('#jform_pk_tahun_dari').attr('id', 'jform_pk_tahun_dari_' + ordering)
                .attr('name', 'jform[pk_tahun_dari][]');
            cln.find('#jform_pk_tahun_sampai-lbl').attr('id', 'jform_pk_tahun_sampai_' + ordering + '-lbl')
                .attr('for', 'jform_pk_tahun_sampai_' + ordering);
            cln.find('#jform_pk_tahun_sampai').attr('id', 'jform_pk_tahun_sampai_' + ordering)
                .attr('name', 'jform[pk_tahun_sampai][]');
            cln.find('#jform_pk_lokasi-lbl').attr('id', 'jform_pk_lokasi_' + ordering + '-lbl')
                .attr('for', 'jform_pk_tahun_sampai_' + ordering);
            cln.find('#jform_pk_lokasi').attr('id', 'jform_pk_lokasi_' + ordering)
                .attr('name', 'jform[pk_lokasi][]');
            cln.find('#jform_pk_jabatan-lbl').attr('id', 'jform_pk_jabatan_' + ordering + '-lbl')
                .attr('for', 'jform_pk_jabatan_' + ordering);
            cln.find('#jform_pk_jabatan').attr('id', 'jform_pk_jabatan_' + ordering)
                .attr('name', 'jform[pk_jabatan][]');
            cln.find('#jform_pk_prestasi-lbl').attr('id', 'jform_pk_prestasi_' + ordering + '-lbl')
                .attr('for', 'jform_pk_prestasi_' + ordering);
            cln.find('#jform_pk_prestasi').attr('id', 'jform_pk_prestasi_' + ordering)
                .attr('name', 'jform[pk_prestasi][]');
            
			cln.appendTo('#pk_container')
				.slideDown(500);
			
		});
		
		$('#pk_canvas').on('click', '.hapus_pk', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.pk_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<div class="panel">
	<h3 class="pane-toggler title" id="metadata">
		<a href="javascript:void(0);">
			<span>Pengalaman Kerja</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform">
			<ul class="adminformlist">
				<li>
					<label id="jform_pengalaman_kerja-lbl" for="jform_pengalaman_kerja" class="hasTip" title="">Pengalaman Kerja</label>
					<div id="pengalaman_kerja_canvas" style="margin-left: 150px;">
						<div id="pk_container" style="">
							<input type="hidden" id="pk_last_ordering" name="pk_last_ordering" value="<?php echo count($member_pengalaman_kerjas); ?>" />
                            
                            <?php
								$idxPK = 0;
								foreach ($member_pengalaman_kerjas as $pk) {
							?>
                            <div class="pk_panel">
                                
								<div style="float: left; width: 125px;">
									<label id="jform_pk_nama_<?php echo $idxPK; ?>-lbl" for="jform_pk_nama_<?php echo $idxPK; ?>" class="hasTip" title="">Nama Perusahaan</label>
								</div>
                                <div style="float: left; width: 250px;">
									<input id="jform_pk_id_<?php echo $idxPK; ?>" name="jform[pk_id][]" type="hidden" value="<?php echo $pk->id; ?>" />
									<input id="jform_pk_nama_<?php echo $idxPK; ?>" name="jform[pk_nama][]" class="inputbox" type="text" maxlength="50" value="<?php echo $pk->nama; ?>" style="width: 95%;"  autocomplete="off">
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_pk" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>
                                
								<div style="float: left; width: 125px;">
                                    <label id="jform_pk_tahun_dari_<?php echo $idxPK; ?>-lbl" for="jform_pk_tahun_dari_<?php echo $idxPK; ?>" class="hasTip" title="">Dari tahun</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select class="combobox" id="jform_pk_tahun_dari_<?php echo $idxPK; ?>" name="jform[pk_tahun_dari][]">
                                        <option id="jform_pk_tahun_dari" name="jform[pk_tahun_dari][]" value="" selected="1"></option>
                                        <?php
                                            foreach ($member_tahun AS $thn => $value) {
                                                if ($value == $pk->tahun_dari)
                                                    echo "<option value=\"{$thn}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                                else
                                                   echo "<option value=\"{$thn}\">$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 25px;">
                                    <label id="jform_pk_tahun_sampai_<?php echo $idxPK; ?>-lbl" for="jform_pk_tahun_sampai_<?php echo $idxPK; ?>" class="hasTip" title="">s/d</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select id="jform_pk_tahun_sampai" name="jform[pk_tahun_sampai][]" class="combobox">
                                        <option value="" selected="1"></option>
                                        <?php
                                            foreach ($member_tahun AS $thn => $value) {
                                                if ($value == $pk->tahun_sampai)
                                                    echo "<option value=\"{$thn}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                                else
                                                   echo "<option value=\"{$thn}\">$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                
                                <div style="float: left; width: 125px;">
                                    <label id="jform_pk_lokasi_<?php echo $idxPK; ?>-lbl" for="jform_pk_lokasi_<?php echo $idxPK; ?>" class="hasTip" title="">Lokasi</label>
                                </div>
                                <div style="float: left; width: 250px;">
                                    <input id="jform_pk_lokasi_<?php echo $idxPK; ?>" name="jform[pk_lokasi][]" class="inputbox" type="text" value="<?php echo $pk->lokasi; ?>" style="width: 95%;" autocomplete="off">
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                
                                <div style="float: left; width: 125px;">
									<label id="jform_pk_jabatan_<?php echo $idxPK; ?>-lbl" for="jform_pk_jabatan_<?php echo $idxPK; ?>" class="hasTip" title="">Jabatan</label>
								</div>
                                <div style="float: left; width: 250px;">
									<input id="jform_pk_jabatan_<?php echo $idxPK; ?>" name="jform[pk_jabatan][]" class="inputbox" type="text" value="<?php echo $pk->jabatan; ?>" style="width: 95%;" autocomplete="off">
								</div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
								<div class="clr"></div>
                                
								<div style="float: left; width: 125px;">
									<label id="jform_pk_prestasi_<?php echo $idxPK; ?>-lbl" for="jform_pk_prestasi_<?php echo $idxPK; ?>" class="hasTip" title="">Prestasi</label>
								</div>
								<div style="float: left; width: 250px;">
									<textarea id="jform_pk_prestasi_<?php echo $idxPK; ?>" name="jform[pk_prestasi][]" style="width: 95%;"><?php echo $pk->prestasi; ?></textarea>
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;"></div>
								<div class="clr"></div>
                                
								<hr>
							</div>
                            <?php
									$idxPK++;
								}
							?>

							<div id="pk_panel" style="display: none;">
                                
								<div style="float: left; width: 125px;">
									<label id="jform_pk_nama-lbl" class="hasTip" title="">Nama Perusahaan</label>
								</div>
								<div style="float: left; width: 250px;">
									<input id="jform_pk_id" type="hidden" value="" />
									<input id="jform_pk_nama" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;"  autocomplete="off">
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_pk" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>
                                
								<div style="float: left; width: 125px;">
                                    <label id="jform_pk_tahun_dari-lbl" class="hasTip" title="">Dari tahun</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select class="combobox" id="jform_pk_tahun_dari">
                                        <option id="jform_pk_tahun_dari" value="" selected="1"></option>
                                        <?php
                                            foreach ($member_tahun AS $thn => $value) {
                                                echo "<option value='$thn'>$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 25px;">
                                    <label id="jform_pk_tahun_sampai-lbl" class="hasTip" title="">s/d</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select id="jform_pk_tahun_sampai" class="combobox">
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
                                    <label id="jform_pk_lokasi-lbl" class="hasTip" title="">Lokasi</label>
                                </div>
                                <div style="float: left; width: 250px;">
                                    <input id="jform_pk_lokasi" class="inputbox" type="text" value="" style="width: 95%;" autocomplete="off">
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>

								<div style="float: left; width: 125px;">
									<label id="jform_pk_jabatan-lbl" class="hasTip" title="">Jabatan</label>
								</div>
								<div style="float: left; width: 250px;">
									<input id="jform_pk_jabatan" class="inputbox" type="text" value="" style="width: 95%;" autocomplete="off">
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;"></div>
								<div class="clr"></div>

								<div style="float: left; width: 125px;">
									<label id="jform_pk_prestasi-lbl" class="hasTip" title="">Prestasi</label>
								</div>
								<div style="float: left; width: 250px;">
									<textarea id="jform_pk_prestasi" style="width: 95%;"></textarea>
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;"></div>
								<div class="clr"></div>
                                
								<hr>
							</div>
                            
						</div>
						<div class="pk_button button2-left">
							<div class="blank">
								<a id="tambah_pk" title="Tambah Pengalaman Kerja" href="#">Tambah Pengalaman Kerja</a>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</li>
			</ul>
		</fieldset>
	</div>
</div>