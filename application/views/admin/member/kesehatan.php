<script type="text/javascript">
    window.addEvent('domready', function() {
        new Fx.Accordion(
            $$('div#kesehatan-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#kesehatan-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_kesehatan-sliders', $$('div#kesehatan-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#kesehatan-sliders.pane-sliders > .panel > h3').length == $$('div#kesehatan-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_kesehatan-sliders',-1);
                },
                duration: 300,
                opacity: false,
                alwaysHide: true
            }
        );
    });
</script>
<div class="panel">
	<h3 class="pane-toggler title" id="metadata">
		<a href="javascript:void(0);">
			<span>Kesehatan</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform" style="padding-left: 20px;">
            <div id="kesehatan-sliders" class="pane-sliders">
                <div style="display:none;">
                    <div></div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="pola-hidup">
                        <a href="javascript:void(0);">
                            <span>Riwayat/Pola Hidup</span>
                        </a>
                    </h3>
                    <div class="pane-slider kesehatan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/kesehatan_pola_hidup'); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="riwayat-penyakit">
                        <a href="javascript:void(0);">
                            <span>Riwayat Penyakit</span>
                        </a>
                    </h3>
                    <div class="pane-slider kesehatan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/kesehatan_riwayat'); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="hasil-laboratorium">
                        <a href="javascript:void(0);">
                            <span>Hasil Laboratorium</span>
                        </a>
                    </h3>
                    <div class="pane-slider kesehatan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/hasil_laboratorium'); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="hasil-dokter">
                        <a href="javascript:void(0);">
                            <span>Hasil Pemeriksaan Dokter dan Konsultasi</span>
                        </a>
                    </h3>
                    <div class="pane-slider kesehatan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/hasil_dokter'); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="riwayat-makan">
                        <a href="javascript:void(0);">
                            <span>Riwayat Makan</span>
                        </a>
                    </h3>
                    <div class="pane-slider kesehatan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/kesehatan_makan'); ?>
                        </fieldset>
                    </div>
                </div>
            </div>
		</fieldset>
	</div>
</div>