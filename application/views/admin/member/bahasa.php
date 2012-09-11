<script type="text/javascript">
    $(document).ready(function() {
	
		$('#tambah_bahasa').bind('click', function(e) {
			var lastOrderingBahasa = parseInt($(this).parent().parent().parent().find('#bahasa_last_ordering').val());
			if (isNaN(lastOrderingBahasa)) {
				lastOrderingBahasa = 0;
			}
			var ordering = lastOrderingBahasa + 1;
            $(this).parent().parent().parent().find('#bahasa_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#bahasa_panel').clone();
			cln.attr('id', '')
				.addClass('bahasa_panel');
            
            cln.find('#jform_bahasa-lbl').attr('id', 'jform_bahasa_' + ordering + '-lbl')
                .attr('for', 'jform_bahasa_' + ordering);
			cln.find('#jform_bahasa_id').attr('id', 'jform_bahasa_id_' + ordering)
                .attr('name', 'jform[bahasa_id][]');
            cln.find('#jform_nama_bahasa').attr('id', 'jform_nama_bahasa_' + ordering)
                .attr('name', 'jform[nama_bahasa][]');
            cln.find('#jform_penguasaan-lbl').attr('id', 'jform_penguasaan_' + ordering + '-lbl')
                .attr('for', 'jform_penguasaan_' + ordering);
			cln.find('#jform_membaca-lbl').attr('id', 'jform_membaca_' + ordering + '-lbl')
                .attr('for', 'jform_membaca_' + ordering);
			cln.find('#jform_membaca').attr('id', 'jform_membaca_' + ordering)
                .attr('name', 'jform[membaca][]');
            cln.find('#jform_menulis-lbl').attr('id', 'jform_menulis_' + ordering + '-lbl')
                .attr('for', 'jform_menulis_' + ordering);
            cln.find('#jform_menulis').attr('id', 'jform_menulis_' + ordering)
                .attr('name', 'jform[menulis][]');
            cln.find('#jform_berbicara-lbl').attr('id', 'jform_berbicara_' + ordering + '-lbl')
                .attr('for', 'jform_berbicara_' + ordering);
            cln.find('#jform_berbicara').attr('id', 'jform_berbicara_' + ordering)
                .attr('name', 'jform[berbicara][]');
            
			cln.appendTo('#bahasa_container')
				.slideDown(500);
			
		});
		
		$('#bahasa_canvas').on('click', '.hapus_bahasa', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.bahasa_panel').slideUp(500, function() {
				$(this).remove();
			});
		});

    });
</script>
<div class="panel">
	<h3 class="pane-toggler title" id="metadata">
		<a href="javascript:void(0);">
			<span>Bahasa</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform">
			<ul class="adminformlist">
				<li>
					<label id="jform_bahasa-lbl" for="jform_bahasa" class="hasTip" title="">Bahasa</label>
					<div id="bahasa_canvas" style="margin-left: 150px;">
						<div id="bahasa_container" style="">
							<input type="hidden" id="bahasa_last_ordering" name="bahasa_last_ordering" value="0" />
                            
                            <div id="bahasa_panel" style="display: none;">

								<div style="float: left; width: 125px;">
									<label id="jform_bahasa-lbl" class="hasTip" title="">Nama Bahasa Asing</label>
								</div>
								<div style="float: left; width: 250px;">
									<input id="jform_bahasa_id" type="hidden" value="" />
									<input id="jform_nama_bahasa" class="inputbox" type="text" maxlength="50" value="" style="width: 95%;">
								</div>
								<div style="float: left; width: 47px; margin-left: 2px;">
									<div class="button2-left">
										<div class="blank">
											<a class="hapus_bahasa" title="Hapus" href="#">Hapus</a>
										</div>
									</div>
								</div>
								<div class="clr"></div>

								<div style="float: left; width: 125px; margin-top: 4px;">
									<label id="jform_penguasaan-lbl" class="hasTip" title="">Tingkat Penguasaan</label>
								</div>
								<div style="float: left; width: 250px; margin-top: 4px;">
									<div style="float: left; width: 100px;">
										<label id="jform_membaca-lbl" class="hasTip" title="">Membaca</label>
									</div>
									<div style="float: left; width: 100px;">
										<select id="jform_membaca" class="combobox">
                                        <?php
                                            foreach ($member_tingkat_penguasaan_bahasa AS $bhs => $value) {
                                                echo "<option value='$bhs'>$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
										</select>
									</div>
                                    <div class="clr"></div>
									<div style="float: left; width: 100px;">
										<label id="jform_menulis-lbl" class="hasTip" title="">Menulis</label>
									</div>
									<div style="float: left; width: 100px;">
										<select id="jform_menulis" class="combobox">
                                        <?php
                                            foreach ($member_tingkat_penguasaan_bahasa AS $bhs => $value) {
                                                echo "<option value='$bhs'>$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
										</select>
									</div>
                                    <div class="clr"></div>
									<div style="float: left; width: 100px;">
										<label id="jform_berbicara-lbl" class="hasTip" title="">Berbicara</label>
									</div>
									<div style="float: left; width: 100px;">
										<select id="jform_berbicara" class="combobox">
                                        <?php
                                            foreach ($member_tingkat_penguasaan_bahasa AS $bhs => $value) {
                                                echo "<option value='$bhs'>$value&nbsp;&nbsp;</option>";
                                            }
                                        ?>
										</select>
									</div>
								</div>
                                <div style="float: left; width: 47px; margin-left: 2px;"></div>
                                <div class="clr"></div>
                                <hr />
							</div>
                            
						</div>
						<div class="bahasa_button button2-left">
							<div class="blank">
								<a id="tambah_bahasa" title="Tambah Bahasa" href="#">Tambah Bahasa</a>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</li>
			</ul>
		</fieldset>
	</div>
</div>