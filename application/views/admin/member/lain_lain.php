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
					<label id="jform_email-lbl" for="jform_email" class="hasTip" title="EMail::Masukan alamat Email.">Email</label>
                    <?php
                        $value = set_value('jform[email]', $data->email);
                    ?>
					<input type="text" id="jform_email" name="jform[email]" size="54" maxlength="255" class="inputbox" value="<?php echo $value; ?>">
				</li>
				<li>
					<label id="jform_website-lbl" for="jform_website" class="hasTip" title="Web Site::Masukan alamat Web Site.">Web Site</label>
                    <?php
                        $value = set_value('jform[website]', $data->website);
                    ?>
					<input type="text" id="jform_website" name="jform[website]" size="54" maxlength="255" class="inputbox" value="<?php echo $value; ?>">
				</li>
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