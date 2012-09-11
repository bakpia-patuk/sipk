<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
<div id="s5_component_wrap">
<div id="s5_component_wrap_inner">
    <div id="system-message-container"></div>
    <div class="item-page">
		<?php
			switch ($kategori) {
			case 'pendidikan':
				$title = "Daftar Tips Pendidikan";
				break;
			case 'kesehatan':
				$title = "Daftar Tips Kesehatan";
				break;
			}
		?>
		<h1><?php echo $title; ?></h1>
        
        <form action="<?php echo site_url('tips?kategori='.$kategori); ?>" method="post" name="adminForm" id="adminForm">
        
            <fieldset class="filters">
                <?php echo $this->pagination->render_limit_box(); ?>
                <!-- @TODO add hidden inputs -->
                <input type="hidden" name="filter_order" value="" />
                <input type="hidden" name="filter_order_Dir" value="" />
                <input type="hidden" name="limitstart" value="" />
            </fieldset>

            <?php
                foreach ($data as $row) {
            ?>
            <div class="items-row cols-1 row-0">
                <div class="item column-1">

                    <h2><a href="<?php echo site_url('tips/detail?kategori='.$kategori.'&id='.$row->id); ?>"><?php echo $row->judul; ?></a></h2>

                    <div style="float: left;">
                        <img class="padded s5_lazyload" style="margin-bottom: 10px; opacity: 1;" alt="" src="<?php echo base_url('images/tips.gif'); ?>" width="27" height="36">
                    </div>
                    <div style="float: right;">
                        <ul class="actions">
                            <li class="print-icon">
                                <a href="<?php echo site_url('about_us'); ?>" title="Print" onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;" rel="nofollow">
                                    <img src="<?php echo base_url('images/system/printButton.png'); ?>" alt="Print" />
                                </a>
                            </li>
                            <li class="email-icon">
                                <a href="<?php echo site_url('about_us'); ?>" title="Email" onclick="window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;">
                                    <img src="<?php echo base_url('images/system/emailButton.png'); ?>" alt="Email" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div style="float: left; width: 82%;">
                        <?php echo strip_tags(abstract_html_contents($row->deskripsi, 300)); ?>... <a href="<?php echo site_url('tips/detail/'.$row->id.'?kategori='.$kategori); ?>">Read More...</a>
                    </div>

                    <div style="clear:both;height:0px"></div>
                    <div class="item-separator"></div>
                </div>
                <span class="row-separator"></span>
            </div>
            <?php
                }
            ?>
            <?php
                echo $this->pagination->create_links();
            ?>
        </form>
    </div>
    
</div>
</div>
</div>
