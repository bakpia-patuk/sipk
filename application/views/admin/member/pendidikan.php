<script type="text/javascript">
    window.addEvent('domready', function() {
        new Fx.Accordion(
            $$('div#pendidikan-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#pendidikan-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_pendidikan-sliders', $$('div#pendidikan-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#pendidikan-sliders.pane-sliders > .panel > h3').length == $$('div#pendidikan-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_pendidikan-sliders',-1);
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
			<span>Pendidikan</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform" style="padding-left: 20px;">
            
            <div id="pendidikan-sliders" class="pane-sliders">
                <div style="display:none;">
                    <div></div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="formal">
                        <a href="javascript:void(0);">
                            <span>Pendidikan Formal</span>
                        </a>
                    </h3>
                    <div class="pane-slider pendidikan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/pendidikan_formal'); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="non-formal">
                        <a href="javascript:void(0);">
                            <span>Pendidikan Non-Formal</span>
                        </a>
                    </h3>
                    <div class="pane-slider pendidikan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/pendidikan_non_formal'); ?>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="pelatihan">
                        <a href="javascript:void(0);">
                            <span>Pelatihan/Kursus/Seminar</span>
                        </a>
                    </h3>
                    <div class="pane-slider pendidikan">
                        <fieldset class="panelform">
                            <?php echo $this->load->view('admin/member/pelatihan'); ?>
                        </fieldset>
                    </div>
                </div>
            </div>
		</fieldset>
	</div>
</div>