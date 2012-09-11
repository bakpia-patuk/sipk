<div id="s5_right_wrap" class="s5_float_left" style="width:238px">
											
    <div class="module_round_box_outer">
    <div class="module_round_box">

        <div class="s5_module_box_1">
            <div class="s5_module_box_2">
                <div class="s5_mod_h3_outer">
                    <h3 class="s5_mod_h3"><span class="s5_h3_first">Kategori </span> Artikel</h3>
                </div>

                <ul class="menu">
                    <?php
                        $kategori = $this->Kategori_Model->getAll();
                        foreach ($kategori['data'] as $kategori) {
                    ?>
                    <li class="item-102">
                        <a href="<?php echo site_url('artikel?kategori='.$kategori->kategori); ?>"><?php echo $kategori->kategori; ?></a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
                <div style="clear:both; height:0px"></div>
            </div>
        </div>

    </div>
    </div>
    
    <div class="module_round_box_outer">
    <div class="module_round_box">

        <div class="s5_module_box_1">
            <div class="s5_module_box_2">
                <div class="s5_mod_h3_outer">
                    <h3 class="s5_mod_h3"><span class="s5_h3_first">Visitor </span> Counter</h3>
                </div>
                <div class="custom">
                    <p><span style="line-height: 158%;">Because there are so many module 
                    positions available in so many different areas, the number of layouts 
                    you can create with this template are limitless! <a href="http://www.shape5.com/demo/vertex/index.php/features-mainmenu-47/template-features/94-module-positions">Learn More...</a></span></p>
                </div>
                <div style="clear:both; height:0px"></div>
            </div>
        </div>

    </div>
    </div>

</div>