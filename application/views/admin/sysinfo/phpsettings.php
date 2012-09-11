<fieldset class="adminform">
	<legend>Relevant PHP Settings</legend>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="250">Setting</th>
				<th>Value</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="2">&#160;</td>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td>Safe Mode</td>
				<td><?php echo $php_settings['safe_mode'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>Open basedir</td>
				<td><?php echo $php_settings['open_basedir'] ? 'Yes' : 'None'; ?></td>
			</tr>
			<tr>
				<td>Display Errors</td>
				<td><?php echo $php_settings['display_errors'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>Short Open Tags</td>
				<td><?php echo $php_settings['short_open_tag'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>File Uploads</td>
				<td><?php echo $php_settings['file_uploads'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>Magic Quotes</td>
				<td><?php echo $php_settings['magic_quotes_gpc'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>Register Globals</td>
				<td><?php echo $php_settings['register_globals'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>Output Buffering</td>
				<td><?php echo $php_settings['output_buffering'] ? 'On' : 'Off'; ?></td>
			</tr>
			<tr>
				<td>Session Save Path</td>
				<td><?php echo $php_settings['session.save_path']; ?></td>
			</tr>
			<tr>
				<td>Session Auto Start</td>
				<td><?php echo $php_settings['session.auto_start']; ?></td>
			</tr>
			<tr>
				<td>XML Enabled</td>
				<td><?php echo $php_settings['xml'] ? 'Yes' : 'None'; ?></td>
			</tr>
			<tr>
				<td>Zlib Enabled</td>
				<td><?php echo $php_settings['zlib'] ? 'Yes' : 'None'; ?></td>
			</tr>
			<tr>
				<td>Native ZIP Enabled</td>
				<td><?php echo $php_settings['zip'] ? 'Yes' : 'None'; ?></td>
			</tr>
			<tr>
				<td>Disabled Functions</td>
				<td><?php echo $php_settings['disable_functions'] ? 'Yes' : 'None'; ?></td>
			</tr>
			<tr>
				<td>Mbstring Enabled</td>
				<td><?php echo $php_settings['mbstring'] ? 'Yes' : 'None'; ?></td>
			</tr>
			<tr>
				<td>Iconv Available</td>
				<td><?php echo $php_settings['iconv'] ? 'Yes' : 'None'; ?></td>
			</tr>
		</tbody>
	</table>
</fieldset>