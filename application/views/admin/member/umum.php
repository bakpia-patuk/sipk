<script type="text/javascript">
    $(document).ready(function() {
        
        $('#tambah_telepon').bind('click', function(e) {
			var lastOrderingTelepon = parseInt($(this).parent().parent().parent().find('#telepon_last_ordering').val());
			if (isNaN(lastOrderingTelepon)) {
				lastOrderingTelepon = 0;
			}
			var ordering = lastOrderingTelepon + 1;
            $(this).parent().parent().parent().find('#telepon_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#telepon_panel').clone();
			cln.attr('id', '')
				.addClass('telepon_panel');
				
			cln.find('#jform_jenis_telepon').attr('id', 'jform_jenis_telepon_' + ordering)
				.attr('name', 'jform[jenis_telepon][]');
			cln.find('#jform_telepon_id').attr('id', 'jform_telepon_id_' + ordering)
				.attr('name', 'jform[telepon_id][]')
				.val('new_telepon_id_' + ordering);
			cln.find('#jform_telepon_member_id').attr('id', 'jform_telepon_member_id_' + ordering)
				.attr('name', 'jform[telepon_member_id][]')
				.val('new_telepon_member_id_' + ordering);;
			cln.find('#jform_telepon').attr('id', 'jform_telepon_' + ordering)
				.attr('name', 'jform[telepon][]');
			
			cln.appendTo('#telepon_container')
				.slideDown(500);
			
		});
		
		$('#telepon_canvas').on('click', '.hapus_telepon', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.telepon_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
	
		switch ($('#jform_jenis_kelamin').val()) {
			case 'Laki-laki':
                $('#pasangan_istri_container').show();
                $('#pasangan_suami_container').hide();
				break;
			case 'Perempuan':
                $('#pasangan_istri_container').hide();
                $('#pasangan_suami_container').show();
				break;
		}
		$('#jform_jenis_kelamin').bind('change', function(){
			var sChosenItemValue = $(this).val();
			switch (sChosenItemValue) {
				case 'Laki-laki':
					$('#pasangan_istri_container').show();
                    $('#pasangan_suami_container').hide();
                    break;
				case 'Perempuan':
					$('#pasangan_istri_container').hide();
                    $('#pasangan_suami_container').show();
                    break;
			}
		});
        
        var oPasangan = $('.option_pasangan');
		$.each(oPasangan, function(index, value) {
			if (this.checked) {
				$('#jform_nama_pasangan_'+index).hide();
				$('#jform_relation_pasangan_id_'+index).show();
			}
			else {
				$('#jform_nama_pasangan_'+index).show();
				$('#jform_relation_pasangan_id_'+index).hide();
			}
		});
        
        $('#tambah_pasangan').bind('click', function(e) {
			var lastOrderingPasangan = parseInt($(this).parent().parent().parent().find('#pasangan_last_ordering').val());
			if (isNaN(lastOrderingPasangan)) {
				lastOrderingPasangan = 0;
			}
			var ordering = lastOrderingPasangan + 1;
            $(this).parent().parent().parent().find('#pasangan_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#pasangan_panel').clone();
			cln.attr('id', '')
				.addClass('pasangan_panel');
            cln.find('#toggleNamaPasangan').attr('id', 'toggleNamaPasangan_' + ordering);
            cln.find('#jform_pasangan_id').attr('id', 'jform_pasangan_id_' + ordering)
                .attr('name', 'jform[pasangan_id][]')
                .val('new_pasangan_id_' + ordering);
            cln.find('#jform_option_pasangan').attr('id', 'jform_option_pasangan_' + ordering)
                .attr('name', 'jform[option_pasangan][]')
                .attr('onclick', '$.Toggle(this, \'jform_nama_pasangan_' + ordering + '\', \'jform_relation_pasangan_id_' + ordering + '\');')
                .val('option_pasangan_' + ordering)
                .addClass('option_pasangan');;
            cln.find('#textLookupNamaPasangan').attr('id', 'textLookupNamaPasangan_' + ordering);
            cln.find('#jform_nama_pasangan').attr('id', 'jform_nama_pasangan_' + ordering)
                .attr('name', 'jform[nama_pasangan][]');
            cln.find('#jform_relation_pasangan_id').attr('id', 'jform_relation_pasangan_id_' + ordering)
                .attr('name', 'jform[relation_pasangan_id][]')
                .hide();
			cln.appendTo('#pasangan_container')
				.slideDown(500);

            var member_id = $('jform_id').val();
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("admin/member/get_member"); ?>' + '/' + member_id,
                dataType: 'html',
                success: function(html, textStatus) {
                    $('#jform_relation_pasangan_id_' + ordering).append(html);
                    //$('body').append(html);
                    //alert(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred! ' + errorThrown);
                }
            });
			
		});
		
		$('#pasangan_canvas').on('click', '.hapus_pasangan', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.pasangan_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
	});
</script>
<div class="panel">
	<h3 class="pane-toggler title" id="publishing-details">
		<a href="javascript:void(0);">
			<span>Informasi Umum</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform">
			
			<ul class="adminformlist">
				<li>
					<label id="jform_no_anggota-lbl" for="jform_no_anggota" class="hasTip required" title="">No. Anggota<span class="star">&nbsp;*</span></label>
					<input type="hidden" name="jform[id]" id="jform_id" value="<?php echo $data->id; ?>">
                    <?php
                        $value = set_value('jform[no_anggota]', $data->no_anggota);
                    ?>
					<input name="jform[no_anggota]" id="jform_no_anggota" class="inputbox required" size="54" maxlength="50" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" >
                    <?php echo form_error('jform[no_anggota]'); ?>
				</li>
				<li>
					<label id="jform_nama-lbl" for="jform_nama" class="hasTip required" title="">Nama Lengkap<span class="star">&nbsp;*</span></label>
                    <?php
                        $value = set_value('jform[nama]', $data->nama);
                    ?>
					<input name="jform[nama]" id="jform_nama" class="inputbox required" size="54" maxlength="50" type="text" value="<?php echo htmlentities($value); ?>" autocomplete="off" >
                    <?php echo form_error('jform[nama]'); ?>
				</li>
				<li>
					<label id="jform_alamat-lbl" for="jform_alamat" class="hasTip" title="">Alamat</label>
                    <?php
                        $value = set_value('jform[alamat]', $data->alamat);
                    ?>
					<textarea name="jform[alamat]" id="jform_alamat" cols="45" rows="2"><?php echo htmlentities($value); ?></textarea>
				<li>
					<label id="jform_telepon-lbl" for="jform_telepon" class="hasTip" title="">Telepon</label>
					<div id="telepon_canvas" style="margin-left: 150px;">
						<div id="telepon_container" style="">
							<input type="hidden" id="telepon_last_ordering" name="telepon_last_ordering" value="<?php echo count($member_telepons); ?>" />
							<?php
								$idxTelepon = 0;
								foreach ($member_telepons as $telepon) {
							?>
							<div class="telepon_panel" style="margin-bottom: 2px;">
								<div style="float: left; width: 135px;">
									<select id="jform_jenis_telepon_<?php echo $idxTelepon; ?>" name="jform[jenis_telepon][]" class="inputbox" size="1">
										<?php
											foreach ($member_jenis_telepon AS $key => $value) {
												if ($key == $telepon->jenis)
													echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
												else
													echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
											}
										?>
									</select>
								</div>
								<div style="float: left; width: 250px;">
									<input name="jform[telepon_id][]" id="jform_telepon_id_<?php echo $idxTelepon; ?>" type="hidden" value="<?php echo $telepon->id; ?>" />
									<input name="jform[telepon_member_id][]" id="jform_telepon_member_id_<?php echo $idxTelepon; ?>" type="hidden" value="<?php echo $telepon->member_id; ?>" />
									<input name="jform[telepon]" id="jform_telepon_<?php echo $idxTelepon; ?>" class="inputbox" size="31" maxlength="50" type="text" value="<?php echo htmlentities($telepon->telepon); ?>" >
								</div>
								<div style="float: left; width: 50px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_telepon" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>
								<hr>
							</div>
							<?php
									$idxTelepon++;
								}
							?>

							<div id="telepon_panel" style="margin-bottom: 2px; display: none;">
								<div style="float: left; width: 135px;">
									<select id="jform_jenis_telepon" class="inputbox" size="1">
										<?php
											foreach ($member_jenis_telepon AS $key => $value) {
												echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
											}
										?>
									</select>
								</div>
								<div style="float: left; width: 250px;">
									<input id="jform_telepon_id" type="hidden" value="" />
									<input id="jform_telepon_member_id" type="hidden" value="0" />
									<input id="jform_telepon" class="inputbox" size="31" maxlength="50" type="text" value="" >
								</div>
								<div style="float: left; width: 50px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_telepon" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>
							</div>

						</div>
						<div class="telepon_button button2-left">
							<div class="blank">
								<a id="tambah_telepon" title="Tambah Telepon" href="#">Tambah Telepon</a>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</li>
				
				<li>
					<label id="jform_tempat_lahir-lbl" for="jform_tempat_lahir" class="hasTip" title="">Tempat Lahir</label>
                    <?php
                        $value = set_value('jform[tempat_lahir]', $data->tempat_lahir);
                    ?>
					<input type="text" id="jform_tempat_lahir" name="jform[tempat_lahir]" class="inputbox" value="<?php echo htmlentities($value); ?>" size="54" maxlength="50" autocomplete="off" />
				</li>
				<li>
					<label id="jform_tanggal_lahir-lbl" for="jform_tanggal_lahir" class="hasTip" title="">Tanggal Lahir</label>
                    <?php
                        $value = set_value('jform[tanggal_lahir]', $data->tanggal_lahir);
                        if (empty($value)) {
                            $tanggal_lahir = '';
                        }
                        else {
                            $tanggal_lahir = strftime( "%d-%m-%Y %H:%M:%S", strtotime($value));
                        }
                        //$str_tanggal_lahir = strftime( "%A, %d %B %Y", strtotime($data->tanggal_lahir));
                    ?>
					<input type="text" name="jform[tanggal_lahir]" id="jform_tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" size="22" class="inputbox" />
					<img src="<?php echo base_url('images/admin/calendar.png'); ?>" alt="Tanggal Lahir" class="calendar" id="jform_tanggal_lahir_img" />
				</li>
				<li>
					<label id="jform_agama-lbl" for="jform_agama" class="hasTip" title="">Agama</label>
					<select id="jform_agama" name="jform[agama]" class="inputbox" size="1">
						<?php
							foreach ($member_agama AS $key => $value) {
								if ($key == $data->agama)
									echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
								else
									echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
							}
						?>
					</select>
				</li>
				<li>
					<label id="jform_suku-lbl" for="jform_suku" class="hasTip" title="">Suku</label>
                    <?php
                        $value = set_value('jform[suku]', $data->suku);
                    ?>
					<input class="inputbox" name="jform[suku]" id="jform_suku" type="text" value="<?php echo htmlentities($value); ?>" size="54" maxlength="50" autocomplete="off" />
				</li>
				<li>
					<label id="jform_kewarganegaraan-lbl" for="jform_kewarganegaraan" class="hasTip" title="">Kewarganegaraan</label>
                    <?php
                        $value = set_value('jform[kewarganegaraan]', $data->kewarganegaraan);
                    ?>
					<input class="inputbox" name="jform[kewarganegaraan]" id="jform_kewarganegaraan" type="text" value="<?php echo htmlentities($value); ?>" size="54" maxlength="50" autocomplete="off" />
				</li>
				<li>
					<label id="jform_tinggi_badan-lbl" for="jform_tinggi_badan" class="hasTip" title="">Tinggi Badan</label>
                    <?php
                        $value = set_value('jform[tinggi_badan]', $data->tinggi_badan);
                    ?>
					<input class="inputbox" name="jform[tinggi_badan]" id="jform_tinggi_badan" type="text" value="<?php echo htmlentities($value); ?>" size="10" maxlength="10" autocomplete="off" /> cm
				</li>
				<li>
					<label id="jform_berat_badan-lbl" for="jform_berat_badan" class="hasTip" title="">Berat Badan</label>
                    <?php
                        $value = set_value('jform[berat_badan]', $data->berat_badan);
                    ?>
					<input class="inputbox" name="jform[berat_badan]" id="jform_berat_badan" type="text" value="<?php echo htmlentities($value); ?>" size="10" maxlength="10" autocomplete="off" /> kg
				</li>
				<li>
					<label id="jform_golongan-darah-lbl" for="jform_golongan_darah" class="hasTip" title="">Golongan Darah</label>
					<select id="jform_golongan_darah" name="jform[golongan_darah]" class="inputbox" size="1">
						<?php
							foreach ($member_golongan_darah AS $key => $value) {
								if ($key == $data->golongan_darah)
									echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
								else
									echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
							}
						?>
					</select>
				</li>
				<li>
					<label id="jform_jenis_kelamin-lbl" for="jform_jenis_kelamin" class="hasTip" title="">Jenis Kelamin</label>
					<select class="combobox" name="jform[jenis_kelamin]" id="jform_jenis_kelamin">
                        <?php
							foreach ($member_jenis_kelamin AS $key => $value) {
								if ($key == $data->jenis_kelamin)
									echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
								else
									echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
							}
						?>
					</select>
				</li>
				<li>
					<label id="jform_status_menikah-lbl" for="jform_status_menikah" class="hasTip" title="">Status Menikah</label>
					<select class="combobox" name="jform[status_menikah]" id="jform_status_menikah">
                        <?php
							foreach ($member_status_menikah AS $key => $value) {
								if ($key == $data->jenis_kelamin)
									echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
								else
									echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
							}
						?>
					</select>
				</li>
				
				<li>
                    <div id="pasangan_suami_container">
                        <label id="jform_nama_suami-lbl" for="jform_nama_suami" class="hasTip" title="">Nama Suami</label>
                        <?php
                            $value = set_value('jform[tinggi_badan]', $data->tinggi_badan);
                        ?>
                        <input type="text" id="jform_nama_suami" name="jform[nama_suami]" value="" class="inputbox" size="54" maxlength="50" autocomplete="off" />
                    </div>
                    <div id="pasangan_istri_container">
                        <label id="jform_nama_pasangan-lbl" for="jform_nama_pasangan" class="hasTip" title="">Nama Istri</label>
                        <div id="pasangan_canvas" style="margin-left: 150px;">
                            <div id="pasangan_container" style="">
                                <input type="hidden" id="pasangan_last_ordering" name="pasangan_last_ordering" value="<?php echo count($member_pasangans); ?>" />
                                
                                <?php
                                    $idxPasangan = 0;
                                    foreach ($member_pasangans as $pasangan) {
                                ?>
                                <div class="pasangan_panel">
                                    <div id="toggleNamaPasangan_<?php echo $idxPasangan; ?>" style="float: left; width: 25px;">
                                        <input id="jform_pasangan_id_<?php echo $idxPasangan; ?>" name="jform[pasangan_id][]" type="hidden" value="<?php echo $pasangan->id; ?>" />
                                        <input class="option_pasangan" <?php echo ($pasangan->option_nama == TRUE ? "checked=\"checked\"" : ""); ?> type="checkbox" id="jform_option_pasangan_<?php echo $idxPasangan; ?>" name="jform[option_pasangan][]" onclick="$.Toggle(this, 'jform_nama_pasangan_<?php echo $idxPasangan; ?>', 'jform_relation_pasangan_id_<?php echo $idxPasangan; ?>');" value="option_pasangan_<?php echo $idxPasangan; ?>" />
                                    </div>
                                    <div id="textLookupNamaPasangan_<?php echo $idxPasangan; ?>" style="float: left; width: 350px;" >
                                        <input class="inputbox" type="text" id="jform_nama_pasangan_<?php echo $idxPasangan; ?>" name="jform[nama_pasangan][]" value="<?php echo $pasangan->nama; ?>" style="width: 96%;" />
                                        <select class="combobox" id="jform_relation_pasangan_id_<?php echo $idxPasangan; ?>" name="jform[relation_pasangan_id][]" style="width: 100%;" >
                                            <option value="0" selected="selected"></option>
                                        </select>
                                    </div>
                                    <div style="float: left; width: 47px; margin-left: 2px;">
                                        <div class="button2-left">
                                            <div class="blank">
                                                <a class="hapus_pasangan" title="Hapus" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                    <hr>
                                </div>
                                <?php
                                        $idxPasangan++;
                                    }
                                ?>

                                <div id="pasangan_panel" style="display: none;">
                                    <div id="toggleNamaPasangan" style="float: left; width: 25px;">
                                        <input id="jform_pasangan_id" type="hidden" value="" />
                                        <input type="checkbox" id="jform_option_pasangan" onclick="$.Toggle(this, 'jform_nama_pasangan', 'jform_relation_pasangan_id');" value="option_pasangan" />
                                    </div>
                                    <div id="textLookupNamaPasangan" style="float: left; width: 350px;" >
                                        <input class="inputbox" type="text" id="jform_nama_pasangan" value="" style="width: 96%;" />
                                        <select class="combobox" id="jform_relation_pasangan_id" style="width: 100%;" >
                                            <option value="0" selected="selected"></option>
                                        </select>
                                    </div>
                                    <div style="float: left; width: 47px; margin-left: 2px;">
                                        <div class="button2-left">
                                            <div class="blank">
                                                <a class="hapus_pasangan" title="Hapus" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                    <hr>
                                </div>

                            </div>
                            <div class="pasangan_button button2-left">
                                <div class="blank">
                                    <a id="tambah_pasangan" title="Tambah Pasangan" href="#">Tambah Pasangan</a>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
				</li>
                <li>
                    <?php echo $this->load->view('admin/member/orang_tua'); ?>
                </li>
                <li>
                    <?php echo $this->load->view('admin/member/saudara'); ?>
                </li>
                <li>
                    <?php echo $this->load->view('admin/member/anak'); ?>
                </li>
			</ul>
			
		</fieldset>
	</div>
</div>