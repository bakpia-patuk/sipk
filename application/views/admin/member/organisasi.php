<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_organisasi').bind('click', function(e) {
			var lastOrderingOrganisasi = parseInt($(this).parent().parent().parent().find('#organisasi_last_ordering').val());
			if (isNaN(lastOrderingOrganisasi)) {
				lastOrderingOrganisasi = 0;
			}
			var ordering = lastOrderingOrganisasi + 1;
            $(this).parent().parent().parent().find('#organisasi_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#organisasi_panel').clone();
			cln.attr('id', '')
				.addClass('organisasi_panel');
            
            cln.find('#jform_organisasi-lbl').attr('id', 'jform_organisasi_' + ordering + '-lbl')
                .attr('for', 'jform_organisasi_' + ordering);
            cln.find('#jform_organisasi_id').attr('id', 'jform_organisasi_id_' + ordering)
                .attr('name', 'jform[organisasi_id][]')
                .val('new_organisasi_id_' + ordering);
            cln.find('#jform_nama_organisasi').attr('id', 'jform_nama_organisasi_' + ordering)
                .attr('name', 'jform[nama_organisasi][]');
            cln.find('#jform_organisasi_tahun_dari-lbl').attr('id', 'jform_organisasi_tahun_dari_' + ordering + '-lbl')
                .attr('for', 'jform_organisasi_tahun_dari_' + ordering);
            cln.find('#jform_organisasi_tahun_dari').attr('id', 'jform_organisasi_tahun_dari_' + ordering)
                .attr('name', 'jform[organisasi_tahun_dari][]');
            cln.find('#jform_organisasi_tahun_sampai-lbl').attr('id', 'jform_organisasi_tahun_sampai_' + ordering + '-lbl')
                .attr('for', 'jform_organisasi_tahun_sampai_' + ordering);
            cln.find('#jform_organisasi_tahun_sampai').attr('id', 'jform_organisasi_tahun_sampai_' + ordering)
                .attr('name', 'jform[organisasi_tahun_sampai][]');
            cln.find('#jform_jenis_organisasi-lbl').attr('id', 'jform_jenis_organisasi_' + ordering + '-lbl')
                .attr('for', 'jform_jenis_organisasi_' + ordering);
            cln.find('#jform_jenis_organisasi').attr('id', 'jform_jenis_organisasi_' + ordering)
                .attr('name', 'jform[jenis_organisasi][]');
            cln.find('#jform_organisasi_jabatan-lbl').attr('id', 'jform_organisasi_jabatan_' + ordering + '-lbl')
                .attr('for', 'jform_organisasi_jabatan_' + ordering);
            cln.find('#jform_organisasi_jabatan').attr('id', 'jform_organisasi_jabatan_' + ordering)
                .attr('name', 'jform[organisasi_jabatan][]');
            
			cln.appendTo('#organisasi_container')
				.slideDown(500);
			
		});
		
		$('#organisasi_canvas').on('click', '.hapus_organisasi', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.organisasi_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<div class="panel">
	<h3 class="pane-toggler title" id="metadata">
		<a href="javascript:void(0);">
			<span>Organisasi</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform">
			<ul class="adminformlist">
				<li>
					<label id="jform_organisasi-lbl" for="jform_organisasi" class="hasTip" title="">Organisasi</label>
					<div id="organisasi_canvas" style="margin-left: 150px;">
						<div id="organisasi_container" style="">
							<input type="hidden" id="organisasi_last_ordering" name="organisasi_last_ordering" value="<?php echo count($member_organisasis); ?>" />
                            
                            <?php
								$idxOrg = 0;
								foreach ($member_organisasis as $org) {
							?>
                            <div class="organisasi_panel">
                                
								<div style="float: left; width: 125px;">
									<label id="jform_organisasi-lbl" for="jform_nama_organisasi_<?php echo $idxOrg; ?>" class="hasTip" title="">Nama Organisasi</label>
								</div>
								<div style="float: left; width: 250px;">
									<input id="jform_organisasi_id_<?php echo $idxOrg; ?>" name="jform[organisasi_id][]" type="hidden" value="<?php echo $org->id; ?>" />
									<input id="jform_nama_organisasi_<?php echo $idxOrg; ?>" name="jform[nama_organisasi][]" class="inputbox" type="text" maxlength="50" value="<?php echo $org->nama; ?>" />
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_organisasi" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>
                                
								<div style="float: left; width: 125px;">
                                    <label id="jform_organisasi_tahun_dari_<?php echo $idxOrg; ?>-lbl" for="jform_organisasi_tahun_dari_<?php echo $idxOrg; ?>" class="hasTip" title="">Dari tahun</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select class="combobox" id="jform_organisasi_tahun_dari_<?php echo $idxOrg; ?>" name="jform[organisasi_tahun_dari][]" >
                                        <option value="" selected="1"></option>
                                        <?php
                                            foreach ($member_tahun AS $thn => $value) {
                                                if ($value == $org->tahun_dari)
                                                    echo "<option value=\"{$thn}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                                else
                                                   echo "<option value=\"{$thn}\">$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 25px;">
                                    <label id="jform_organisasi_tahun_sampai_<?php echo $idxOrg; ?>-lbl" for="jform_organisasi_tahun_sampai_<?php echo $idxOrg; ?>" class="hasTip" title="">s/d</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select id="jform_organisasi_tahun_sampai_<?php echo $idxOrg; ?>" name="jform[organisasi_tahun_sampai][]" class="combobox">
                                        <option value="" selected="1"></option>
                                        <?php
                                            foreach ($member_tahun AS $thn => $value) {
                                                if ($value == $org->tahun_sampai)
                                                    echo "<option value=\"{$thn}\" selected=\"selected\">$value&nbsp;&nbsp;</option>";
                                                else
                                                   echo "<option value=\"{$thn}\">$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                
                                <div style="float: left; width: 125px; padding-top: 4px;">
                                    <label id="jform_jenis_organisasi_<?php echo $idxOrg; ?>-lbl" for="jform_jenis_organisasi_<?php echo $idxOrg; ?>" class="hasTip" title="">Jenis Organisasi:</label>
                                </div>
                                <div style="float: left; width: 250px; padding-top: 4px;">
                                    <select id="jform_jenis_organisasi_<?php echo $idxOrg; ?>" name="jform[jenis_organisasi][]" class="combobox">
                                    <?php
                                        foreach ($member_jenis_organisasi AS $key => $value) {
                                            if ($value == $org->jenis)
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
                                    <label id="jform_organisasi_jabatan-lbl_<?php echo $idxOrg; ?>" for="jform_organisasi_jabatan_<?php echo $idxOrg; ?>" class="hasTip" title="">Jabatan</label>
                                </div>
                                <div style="float: left; width: 250px;">
                                    <input class="inputbox" id="jform_organisasi_jabatan_<?php echo $idxOrg; ?>" name="jform[organisasi_jabatan][]" type="text" value="<?php echo $org->jabatan; ?>" style="width: 95%;">
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                
								<hr>
							</div>
                            <?php
									$idxOrg++;
								}
							?>

							<div id="organisasi_panel" style="display: none;">
                                
								<div style="float: left; width: 125px;">
									<label id="jform_organisasi-lbl" class="hasTip" title="">Nama Organisasi</label>
								</div>
								<div style="float: left; width: 250px;">
									<input id="jform_organisasi_id" type="hidden" value="" />
									<input id="jform_nama_organisasi" class="inputbox" type="text" maxlength="50" value="">
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_organisasi" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>
                                
								<div style="float: left; width: 125px;">
                                    <label id="jform_organisasi_tahun_dari-lbl" class="hasTip" title="">Dari tahun</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select class="combobox" id="jform_organisasi_tahun_dari">
                                        <option id="jform_organisasi_tahun_dari" value="" selected="1"></option>
                                        <?php
                                            foreach ($member_tahun AS $thn => $value) {
                                                echo "<option value='$thn'>$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 25px;">
                                    <label id="jform_organisasi_tahun_sampai-lbl" class="hasTip" title="">s/d</label>
                                </div>
                                <div style="float: left; width: 75px;">
                                    <select id="jform_organisasi_tahun_sampai" class="combobox">
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
                                
                                <div style="float: left; width: 125px; padding-top: 4px;">
                                    <label id="jform_jenis_organisasi-lbl" class="hasTip" title="">Jenis Organisasi:</label>
                                </div>
                                <div style="float: left; width: 250px; padding-top: 4px;">
                                    <select id="jform_jenis_organisasi" class="combobox">
                                    <?php
                                        foreach ($member_jenis_organisasi AS $org => $value) {
                                            echo "<option value='$org'>$value&nbsp;&nbsp;</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                
                                <div style="float: left; width: 125px;">
                                    <label id="jform_organisasi_jabatan-lbl" class="hasTip" title="">Jabatan</label>
                                </div>
                                <div style="float: left; width: 250px;">
                                    <input class="inputbox" id="jform_organisasi_jabatan" type="text" value="" style="width: 95%;">
                                </div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                
								<hr>
							</div>
							
						</div>
						<div class="organisasi_button button2-left">
							<div class="blank">
								<a id="tambah_organisasi" title="Tambah Organisasi" href="#">Tambah Organisasi</a>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</li>
			</ul>
		</fieldset>
	</div>
</div>