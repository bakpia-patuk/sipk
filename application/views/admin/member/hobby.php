<script type="text/javascript">
    window.addEvent('domready', function() {
        new Fx.Accordion(
            $$('div#hobby-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#hobby-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_hobby-sliders', $$('div#hobby-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#hobby-sliders.pane-sliders > .panel > h3').length == $$('div#hobby-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_hobby-sliders',-1);
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
			<span>Hobby/Minat</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform" style="padding-left: 20px;">
            
            <div id="hobby-sliders" class="pane-sliders">
                <div style="display:none;">
                    <div></div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="olahraga">
                        <a href="javascript:void(0);">
                            <span>Olah Raga</span>
                        </a>
                    </h3>
                    <div class="pane-slider hobby">
                        <fieldset class="panelform">
							<label id="jform_hobby_olah_raga-lbl" for="jform_hobby_olah_raga" class="hasTip" title="">Olah Raga</label>
							<div class="clr"></div>
							<textarea name="jform[hobby_olah_raga]" id="jform_hobby_olah_raga" cols="0" rows="0" style="width:100%; height:100px;" class="mce_editable"><?php echo $data->hobby_olah_raga; ?></textarea>
							<div class="toggle-editor">
								<div class="button2-left">
									<div class="blank">
										<a href="#" onclick="tinyMCE.execCommand('mceToggleEditor', true, 'jform_hobby_olah_raga');return false;" title="Toggle editor">Toggle editor</a>
									</div>
								</div>
							</div>
							<div class="clr"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="kesenian">
                        <a href="javascript:void(0);">
                            <span>Kesenian</span>
                        </a>
                    </h3>
                    <div class="pane-slider hobby">
                        <fieldset class="panelform">
                            <label id="jform_hobby_kesenian-lbl" for="jform_hobby_kesenian" class="hasTip" title="">Kesenian</label>
							<div class="clr"></div>
							<textarea name="jform[hobby_kesenian]" id="jform_hobby_kesenian" cols="0" rows="0" style="width:100%; height:100px;" class="mce_editable"><?php echo $data->hobby_kesenian; ?></textarea>
							<div class="toggle-editor">
								<div class="button2-left">
									<div class="blank">
										<a href="#" onclick="tinyMCE.execCommand('mceToggleEditor', true, 'jform_hobby_kesenian');return false;" title="Toggle editor">Toggle editor</a>
									</div>
								</div>
							</div>
							<div class="clr"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="lain_lain">
                        <a href="javascript:void(0);">
                            <span>Lain-lain</span>
                        </a>
                    </h3>
                    <div class="pane-slider hobby">
                        <fieldset class="panelform">
                            <label id="jform_hobby_lain_lain-lbl" for="jform_hobby_lain_lain" class="hasTip" title="">Lain-lain</label>
							<div class="clr"></div>
							<textarea name="jform[hobby_lain_lain]" id="jform_hobby_lain_lain" cols="0" rows="0" style="width:100%; height:100px;" class="mce_editable"><?php echo $data->hobby_lain_lain; ?></textarea>
							<div class="toggle-editor">
								<div class="button2-left">
									<div class="blank">
										<a href="#" onclick="tinyMCE.execCommand('mceToggleEditor', true, 'jform_hobby_lain_lain');return false;" title="Toggle editor">Toggle editor</a>
									</div>
								</div>
							</div>
							<div class="clr"></div>
                        </fieldset>
                    </div>
                </div>
            </div>
		</fieldset>
	</div>
</div>