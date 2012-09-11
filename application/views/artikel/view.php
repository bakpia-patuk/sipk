<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
											
	<div id="s5_component_wrap">
	<div id="s5_component_wrap_inner">
						
		<div id="system-message-container"></div>
		
		<div class="blog-featured">
            <h1>Daftar Artikel <?php echo ucwords($kategori); ?></h1>
            
            <?php
                foreach ($data as $artikel) {
            ?>
            <div class="items-row cols-1 row-0">
				<div class="item column-1">
			
					<h2><?php echo $artikel->title; ?></h2>
                    
                    <div style="float: left;">
                        <?php
                            if (empty($artikel->image)) {
                                $image = 'images/empty_image.png';
                            }
                            else {
                                if (file_exists($artikel->image)) {
                                    $image = $artikel->image;
                                }
                                else {
                                    $image = 'images/empty_image.png';
                                }
                            }
                        ?>
                        <img class="padded s5_lazyload" style="margin-bottom: 10px; opacity: 1;" alt="" src="<?php echo base_url($image); ?>" width="70">
                    </div>
                    <div style="float: right;">
                         <ul class="actions">
                            <li class="print-icon">
                                <a href="<?php echo site_url('about_us'); ?>" title="Print" onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;" rel="nofollow">
                                    <img src="<?php echo base_url('images/system/printButton.png'); ?>" alt="Print" />
                                </a>
                            </li>
                            <li class="email-icon">
                                <a href="<?php echo site_url('about_us'); ?>'); return false;">
                                    <img src="<?php echo base_url('images/system/emailButton.png'); ?>" alt="Email" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div style="float: left; width: 82%;">
                        <?php echo strip_tags(abstract_html_contents($artikel->fulltext, 300)); ?>... <a href="<?php echo site_url('artikel/detail/'.$artikel->id); ?>">Read More...</a>
                    </div>
                    
                    <div style="clear:both;height:0px"></div>
					<div class="item-separator"></div>
				</div>
				<span class="row-separator"></span>
			</div>
            <?php
                }
            ?>

		</div>

		<div style="clear:both;height:0px"></div>

	</div>
	</div>
	
</div>