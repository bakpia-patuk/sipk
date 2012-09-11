<fieldset class="adminform">
	<legend>System Information</legend>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="250">Setting</th>
				<th>Value</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="2">&#160;
				</td>
			</tr>
		</tfoot>
		<tbody>
			<tr>
				<td><strong>PHP Built On</strong></td>
				<td><?php echo $info['php']; ?></td>
			</tr>
			<tr>
				<td><strong>Database Version</strong></td>
				<td><?php echo $info['dbversion']; ?></td>
			</tr>
			<tr>
				<td><strong>Database Collation</strong></td>
				<td><?php echo $info['dbcollation']; ?></td>
			</tr>
			<tr>
				<td><strong>PHP Version</strong></td>
				<td><?php echo $info['phpversion']; ?></td>
			</tr>
			<tr>
				<td><strong>Web Server</strong></td>
				<td><?php echo $info['server']; ?></td>
			</tr>
			<tr>
				<td><strong>WebServer to PHP Interface</strong></td>
				<td><?php echo $info['sapi_name']; ?></td>
			</tr>
			<tr>
				<td><strong>SIPK Version</strong></td>
				<td><?php echo $info['version']; ?></td>
			</tr>
			<tr>
				<td><strong>User Agent</strong></td>
				<td><?php echo $info['useragent']; ?></td>
			</tr>
		</tbody>
	</table>
</fieldset>