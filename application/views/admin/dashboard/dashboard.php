<script type="text/javascript">
    window.addEvent('domready', function() {
        new Fx.Accordion(
            $$('div#panel-sliders.pane-sliders > .panel > h3.pane-toggler'), 
            $$('div#panel-sliders.pane-sliders > .panel > div.pane-slider'), {
                onActive: function(toggler, i) {
                    toggler.addClass('pane-toggler-down');
                    toggler.removeClass('pane-toggler');
                    i.addClass('pane-down');
                    i.removeClass('pane-hide');
                    Cookie.write('jpanesliders_panel-sliders',$$('div#panel-sliders.pane-sliders > .panel > h3').indexOf(toggler));
                },
                onBackground: function(toggler, i) {
                    toggler.addClass('pane-toggler');
                    toggler.removeClass('pane-toggler-down');
                    i.addClass('pane-hide');
                    i.removeClass('pane-down');
                    if ($$('div#panel-sliders.pane-sliders > .panel > h3').length == $$('div#panel-sliders.pane-sliders > .panel > h3.pane-toggler').length)
                        Cookie.write('jpanesliders_panel-sliders', -1);
                },
                duration: 300,
                opacity: false,
                alwaysHide: true
            }
        );
    });
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
    var updateEditor = function(){
        var editor = document.id('editor_selection');
        var xhr = new Request({
            url: 'index.php?process=ajax&model=quickeditor&id=42&editor=' + editor.value + '&nocache=' + (Date.now() + Math.random(0, 50000)).toInt(),
            method: 'get',
            onRequest: editorAjax.request,
            onSuccess: editorAjax.success,
        }).send();
    };
    var editorAjax = {
        'request': function(){
            document.id('editor_spinner').setStyle('display', 'block');
            document.id('editor_selection').getParent().getFirst().setStyle('margin-left', 10);
        },
        'success': function(){
            document.id('editor_spinner').setStyle('display', 'none');
            document.id('editor_selection').getParent().getFirst().setStyle('margin-left', 0);
        }
    };
    window.addEvent('domready', function(){
        document.id('editor_selection').addEvent('change', updateEditor);
    });

    var MCSessionTimeout = 900000;
    var MCSessionLang = {
        "expired": "Session Expired"
    }
		
    window.addEvent('domready', function(){
        new RokAudit('rok-audit', {start: 0, limit: 5, details: 'low', amount: 4, url: 'index.php?process=ajax&model=module&moduleid=89'});
    });
</script>
<div class="mc-wrapper">
	<div id="system-message-container"></div>
	<div id="mc-title">
		<?php
			echo $module_title;
            if (isset($help))
                echo $help->render();
            if (isset($toolbar))
                echo $toolbar->render();
		?>
		<div class="clr"></div>
	</div>
	<div id="mc-submenu"></div>
	<div id="mc-sidebar">
		<div class="mc-module-sidebar ">
			<h2>Statistics Overview</h2>
			<div class="mc-module-content">
				<div id="rok-stats">
					<ul>
						<li class="none"><span class="desc">Current Active Users</span><span class="value">0</span></li>
						<li class="none"><span class="desc">Active Guests</span><span class="value">0</span></li>
						<li class="none"><span class="desc">Active Registered</span><span class="value">0</span></li>
						<li class="up"><span class="desc">Unique Visits Today</span><span class="value">1</span></li>
						<li class="down"><span class="desc">Unique Visits Yesterday</span><span class="value">0</span></li>
						<li class="up"><span class="desc">Visits This Week</span><span class="value">1</span></li>
						<li class="up"><span class="desc">Visits Previous Week</span><span class="value">0</span></li>
						<li class="none"><span class="desc">Total Articles</span><span class="value">65</span></li>
						<li class="up"><span class="desc">New Articles This Week</span><span class="value">0</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mc-module-sidebar ">
			<h2>User Activity Chart</h2>
			<div class="mc-module-content">
				<div id="rok-userchart">
				<img src="https://chart.googleapis.com/chart?cht=lc&amp;chs=285x120&amp;chtt=Unique+Users+%28Past+7+days%29&amp;chts=666666%2C13&amp;chd=t%3A1%2C1%2C1&amp;chco=4F9BD8&amp;chls=2&amp;chds=0%2C1&amp;chxt=y%2Cx&amp;chxr=0%2C0%2C1%7C1%2C0%2C2&amp;chxtc=0%2C2%7C1%2C2" alt="" /></div>
			</div>
		</div>
		<div class="mc-module-sidebar ">
			<h2>Admin Audit Trail</h2>
			<div class="mc-module-content">
				<div id="rok-audit">
					<input type="hidden" id="rok-audit-count" value="2" />
					<ul>
                        <li>
                            <span class="rok-audit-user">Super User<img src="http://www.gravatar.com/avatar/e99acaab4dac6bd5b3b7d81292e2d9b8?s=20&d=mm&r=g" /></span>
                            <span class="rok-audit-date">2012-06-28 06:11:42</span>
                            <span class="rok-audit-details">Banners: <a href="/joomla/administrator/index.php?option=com_banners&task=banner.edit">Saved: <em>fdfdfdfd</em></a></span>
                        </li>
						<li>
                            <span class="rok-audit-user">Super User<img src="http://www.gravatar.com/avatar/e99acaab4dac6bd5b3b7d81292e2d9b8?s=20&d=mm&r=g" /></span>
                            <span class="rok-audit-date">2012-06-28 00:39:52</span>
                            <span class="rok-audit-details">Users: <a href="/joomla/administrator/index.php?option=com_users&id=44&task=user.edit">Saved: <em>AAA AAA</em></a></span>
                        </li>
					</ul>
                    <div class="rok-more">
                        <span class="loader"></span>
                        <div class="mc-button">
                            <span class="button"><a href="#">load more</a></span>
                        </div>
                        <div class="rok-audit-filter">
                            <span>details</span>
                            <select id="rok-audit-details" autocomplete="off">
                                <option value="low" selected="selected">Low</option>
                                <option value="medium" >Medium</option>
                                <option value="high" >High</option>
                            </select>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </div>
    <div id="mc-cpanel">
        <p class="mc-dashtext">MissionControl is a brand-new take on the Joomla Administrator template.  Primary objectives during development were clean modern design, optimal usability, configurable colors and logo, and enhanced functionality via optimizations and new extensions.</p>
        <div class="mc-module-standard ">
			<h2>Quick Links</h2>
			<div class="mc-module-content">
				<?php $this->load->view('admin/dashboard/quicklinks'); ?>
			</div>
		</div>
        <div id="mc-component">
            <div id="panel-sliders" class="pane-sliders">
                <div style="display:none;">
                    <div></div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="cpanel-panel-logged">
                        <a href="javascript:void(0);"><span>Last 5 Logged-in Users</span></a>
                    </h3>
                    <div class="pane-slider content">
                        <table class="adminlist">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th><strong>Location</strong></th>
                                    <th><strong>ID</strong></th>
                                    <th><strong>Last Activity</strong></th>
                                    <th><strong>Logout</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_users&amp;task=user.edit&amp;id=42">Super User</a></th>
                                    <td class="center">Administrator</td>
                                    <td class="center">42</td>
                                    <td class="center">2012-06-29 17:27:13</td>
                                    <td class="center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="cpanel-panel-popular">
                        <a href="javascript:void(0);"><span>Top 5 Popular Articles</span></a>
                    </h3>
                    <div class="pane-slider content">
                        <table class="adminlist">
                            <thead>
                                <tr>
                                    <th>Popular Items</th>
                                    <th><strong>Created</strong></th>
                                    <th><strong>Hits</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=10">Content</a></th>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">48</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=53">Using Joomla!</a></th>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">44</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=22">Getting Started</a></th>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">35</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=6">Australian Parks </a></th>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">32</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=55">Weblinks Module</a></th>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">26</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel">
                    <h3 class="pane-toggler title" id="cpanel-panel-latest"><a href="javascript:void(0);"><span>Last 5 Added Articles</span></a></h3>
                    <div class="pane-slider content">
                        <table class="adminlist">
                            <thead>
                                <tr>
                                    <th>Latest Items</th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Created</strong></th>
                                    <th><strong>Created By</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=77">a</a></th>
                                    <td class="center"><span class="jgrid" title="Archived"><span class="state archive"><span class="text">Archived</span></span></span></td>
                                    <td class="center">2012-02-06 13:15:16</td>
                                    <td class="center">Super User</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=76">b</a></th>
                                    <td class="center"><span class="jgrid" title="Published"><span class="state publish"><span class="text">Published</span></span></span></td>
                                    <td class="center">2012-01-17 21:16:38</td>
                                    <td class="center">Super User</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=35">Professionals</a></th>
                                    <td class="center"><span class="jgrid" title="Published"><span class="state publish"><span class="text">Published</span></span></span></td>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">Super User</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=44">Statistics Module</a></th>
                                    <td class="center"><span class="jgrid" title="Published"><span class="state publish"><span class="text">Published</span></span></span></td>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">Super User</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/joomla/administrator/index.php?option=com_content&amp;task=article.edit&amp;id=53">Using Joomla!</a></th>
                                    <td class="center"><span class="jgrid" title="Published"><span class="state publish"><span class="text">Published</span></span></span></td>
                                    <td class="center">2011-01-01 00:00:01</td>
                                    <td class="center">Super User</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mc-clr"></div>
</div>