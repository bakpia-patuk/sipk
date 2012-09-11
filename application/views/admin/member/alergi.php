<div class="panel">
	<h3 class="pane-toggler title" id="metadata">
		<a href="javascript:void(0);">
			<span>Lain-lain</span>
		</a>
	</h3>
	<div class="pane-slider memberprofile">
		<fieldset class="panelform">
			<ul class="adminformlist">
                <li>
                    <label id="jform_keterangan-lbl" for="jform_keterangan" class="hasTip" title="Keterangan::Keterangan.">Keterangan</label>
                    <?php
                        $value = set_value('jform[keterangan]', $data->keterangan);
                    ?>
                    <textarea name="jform[keterangan]" id="jform_keterangan" cols="45" rows="2"><?php echo $value; ?></textarea>
                </li>
			</ul>
		</fieldset>
	</div>
</div>