<div id="s5_center_column_wrap_inner" style="margin-left:0px; margin-right:238px;">
<div id="s5_component_wrap">
<div id="s5_component_wrap_inner">
    
    <div id="system-message-container"></div>
    <div class="item-page">
        <h2><?php echo $data->judul; ?></h2>
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
        <dl class="article-info">
            <dt class="article-info-term"></dt>
            <dd class="category-name">Kategori: <a href="<?php echo site_url('sekolah'); ?>">Sekolah</a></dd>
            <?php
                setlocale(LC_TIME, 'INDONESIA');
                $dt = strftime( "%A, %d %B %Y %H:%M", strtotime($data->modified));
            ?>
            <dd class="published">Update terakhir pada <?php echo $dt; ?></dd>
        </dl>
		<p><?php echo $data->deskripsi; ?></p>
    </div>

</div>
</div>
</div>