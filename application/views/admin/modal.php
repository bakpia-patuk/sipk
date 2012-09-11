<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="generator" content="Joomla! - Open Source Content Management" />
		
		<title>sipk - Administration</title>
		
		<link rel="stylesheet" href="/joomla/media/system/css/modal.css" type="text/css" />
		<link rel="stylesheet" href="templates/rt_missioncontrol/css/core.css" type="text/css" />
		<link rel="stylesheet" href="templates/rt_missioncontrol/css/core-gecko.css" type="text/css" />
		<link rel="stylesheet" href="templates/rt_missioncontrol/css/menu.css" type="text/css" />
		<link rel="stylesheet" href="templates/rt_missioncontrol/css/colors.css" type="text/css" />
		
		<script src="/joomla/media/system/js/mootools-core.js" type="text/javascript"></script>
		<script src="/joomla/media/system/js/core.js" type="text/javascript"></script>
		<script src="/joomla/media/system/js/mootools-more.js" type="text/javascript"></script>
		<script src="/joomla/media/system/js/modal.js" type="text/javascript"></script>
		<script src="templates/rt_missioncontrol/js/MC.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			window.addEvent('domready', function() {
				$$('.hasTip').each(function(el) {
					var title = el.get('title');
					if (title) {
						var parts = title.split('::', 2);
						el.store('tip:title', parts[0]);
						el.store('tip:text', parts[1]);
					}
				});
				var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false});
			});
			window.addEvent('domready', function() {
				SqueezeBox.initialize({});
				SqueezeBox.assign($$('a.modal'), {
					parse: 'rel'
				});
			});
		</script>
	</head>
	<body id="mc-standalone" class="transitions-enabled headers-fancy extendmenu-off menuwidth-small width-variable avatar-1 ltr option-com-users task- view-users">
		<div id="mc-body">
			<div id="system-message-container"></div>
			<div id="mc-component2">
				<form action="/joomla/administrator/index.php?option=com_users&amp;view=users&amp;layout=modal&amp;tmpl=component&amp;groups=&amp;excluded=" method="post" name="adminForm" id="adminForm">
					<fieldset class="filter">
						<div class="left">
							<label for="filter_search">Search</label>
							<input type="text" name="filter_search" id="filter_search" value="" size="40" title="Search in name" />
							<button type="submit">Search</button>
							<button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Clear</button>
							<button type="button" onclick="if (window.parent) window.parent.jSelectUser_jform_created_by('', 'Select a User');">- No User -</button>
						</div>
						<div class="right">
							<ol>
								<li>
									<label for="filter_group_id">Filter User Group</label>
									<select id="filter_group_id" name="filter_group_id" onchange="this.form.submit()">
										<option value="" selected="selected">Show All Groups</option>
										<option value="1">Public</option>
										<option value="6">- Manager</option>
										<option value="7">- - Administrator</option>
										<option value="2">- Registered</option>
										<option value="3">- - Author</option>
										<option value="4">- - - Editor</option>
										<option value="5">- - - - Publisher</option>
										<option value="10">- - - Shop Suppliers (Example)</option>
										<option value="12">- - Customer Group (Example)</option>
										<option value="8">- Super Users</option>
									</select>
								</li>
							</ol>
						</div>
					</fieldset>
					<table class="adminlist">
						<thead>
							<tr>
								<th class="left">
									<a href="#" onclick="Joomla.tableOrdering('a.name','desc','');" title="Click to sort by this column">Name<img src="/joomla/media/system/images/sort_asc.png" alt="" /></a>
								</th>
								<th class="nowrap" width="25%">
									<a href="#" onclick="Joomla.tableOrdering('a.username','asc','');" title="Click to sort by this column">User Name</a>
								</th>
								<th class="nowrap" width="25%">
									<a href="#" onclick="Joomla.tableOrdering('group_names','asc','');" title="Click to sort by this column">User Groups</a>
								</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="15">
									<div class="mc-limit">
										<select id="limit" name="limit" class="inputbox" size="1" onchange="Joomla.submitform();">
											<option value="5">5</option>
											<option value="10">10</option>
											<option value="15">15</option>
											<option value="20" selected="selected">20</option>
											<option value="25">25</option>
											<option value="30">30</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="0">All</option>
										</select>
										<span>Display # </span>
									</div>
									<div class="mc-page-count"></div>
									<del class="mc-pagination-container">
										<div class="mc-pagination"></div>
									</del>
									<input type="hidden" name="limitstart" value="0" />
								</td>
							</tr>
						</tfoot>
						<tbody>
							<tr class="row0">
								<td><a class="pointer" onclick="if (window.parent) window.parent.jSelectUser_jform_created_by('42', 'Super User');">Super User</a></td>
								<td align="center">admin</td>
								<td align="left">Super Users</td>
							</tr>
						</tbody>
					</table>
					<div>
						<input type="hidden" name="task" value="" />
						<input type="hidden" name="field" value="jform_created_by" />
						<input type="hidden" name="boxchecked" value="0" />
						<input type="hidden" name="filter_order" value="a.name" />
						<input type="hidden" name="filter_order_Dir" value="asc" />
						<input type="hidden" name="fa1a9a9b70cac090c46eee8af4313804" value="1" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
