<script type="text/javascript">
	$(document).ready(function() {
	
		$('#tambah_orang_tua').bind('click', function(e) {
			var lastOrderingOrangTua = parseInt($(this).parent().parent().parent().find('#orang_tua_last_ordering').val());
			if (isNaN(lastOrderingOrangTua)) {
				lastOrderingOrangTua = 0;
			}
			var ordering = lastOrderingOrangTua + 1;
            $(this).parent().parent().parent().find('#orang_tua_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#orang_tua_panel').clone();
			cln.attr('id', '')
				.addClass('orang_tua_panel');
            
            cln.find('#jform_orang_tua_id').attr('id', 'jform_orang_tua_id_' + ordering)
                .attr('name', 'jform[orang_tua_id][]')
                .val('new_orang_tua_id_' + ordering);
            cln.find('#jform_option_orang_tua').attr('id', 'jform_option_orang_tua_' + ordering)
                .attr('name', 'jform[option_orang_tua][]')
                .attr('onclick', '$.Toggle(this, \'jform_nama_orang_tua_' + ordering + '\', \'jform_relation_orang_tua_id_' + ordering + '\');')
                .addClass('option_orang_tua');
			cln.find('#jform_nama_orang_tua').attr('id', 'jform_nama_orang_tua_' + ordering)
                .attr('name', 'jform[nama_orang_tua][]');
			cln.find('#jform_relation_orang_tua_id').attr('id', 'jform_relation_orang_tua_id_' + ordering)
                .attr('name', 'jform[relation_orang_tua_id][]')
                .hide();
            cln.find('#jform_status_orang_tua').attr('id', 'jform_status_orang_tua_' + ordering)
                .attr('name', 'jform[status_orang_tua][]');

			cln.appendTo('#orang_tua_container')
				.slideDown(500);
                
            var member_id = $('jform_id').val();
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("admin/member/get_member"); ?>' + '/' + member_id,
                dataType: 'html',
                success: function(html, textStatus) {
                    $('#jform_relation_orang_tua_id_' + ordering).append(html);
                    //$('body').append(html);
                    //alert(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred! ' + errorThrown);
                }
            });
			
		});
        
		$('#orang_tua_canvas').on('click', '.hapus_orang_tua', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.orang_tua_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        var oOrangTua = $('.option_orang_tua');
		$.each(oOrangTua, function(index, value) {
			if (this.checked) {
				$('#jform_nama_orang_tua_' + index).hide();
				$('#jform_relation_orang_tua_id_' + index).show();
			}
			else {
				$('#jform_nama_orang_tua_' + index).show();
				$('#jform_relation_orang_tua_id_' + index).hide();
			}
		});
        
    });
</script>
<label id="jform_orang_tua-lbl" for="jform_orang_tua" class="hasTip" title="">Orang Tua</label>
<div id="orang_tua_canvas" style="margin-left: 150px;">
    <div id="orang_tua_container" style="">
        <input type="hidden" id="orang_tua_last_ordering" name="orang_tua_last_ordering" value="0" />
        
        <div style="float: left; width: 322px; background: #999; color: #fff; margin-right: 1px; margin-bottom: 4px; text-align: center;">Nama</div>
        <div style="float: left; width: 125px; background: #999; color: #fff; margin-right: 1px; margin-bottom: 4px; text-align: center;">Status</div>
        <div style="float: left; width: 49px; background: #999; color: #fff; margin-bottom: 4px; text-align: center;">Hapus</div>
        
        <?php
            $idxOrangTua = 0;
            foreach ($member_orangtuas as $orangtua) {
        ?>
        <div id="orang_tua_panel" style="display: none;">
            <div style="float: left; width: 25px; margin-right: 1px; text-align: center;">
                <input type="hidden" id="jform_orang_tua_id_<?php echo $idxOrangTua; ?>" name="jform[orang_tua_id][]" value="<?php echo $orangtua->id; ?>" />
                <input type="checkbox" id="jform_option_orang_tua_<?php echo $idxOrangTua; ?>" name="jform[option_orang_tua][]" value="<?php echo $orangtua->option_nama; ?>" onclick="$.Toggle(this, 'jform_nama_orang_tua', 'jform_relation_orang_tua_id');" >
            </div>
            <div style="float: left; width: 297px;">
                <input type="text" id="jform_nama_orang_tua_<?php echo $idxOrangTua; ?>" value="<?php echo $orangtua->nama; ?>" class="inputbox" style="width: 95%;"/>
                <select id="jform_relation_orang_tua_id_<?php echo $idxOrangTua; ?>" name="jform[relation_orang_tua_id][]" class="combobox" style="width: 100%;">
                    <option value="0" selected="selected"></option>
                </select>
            </div>
            <div style="float: left; width: 125px; text-align: center;">
                <select class="combobox" id="jform_status_orang_tua_<?php echo $idxOrangTua; ?>" name="jform[status_orang_tua][]">
                    <?php
                        foreach ($member_status_orang_tua AS $key => $value) {
                            if ($key == $orangtua->status)
                                echo "<option value='$key' selected='selected'>$value&nbsp;&nbsp;</option>";
                            else
                                echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                        }
                    ?>
                </select>
            </div>
            <div style="float: left; width: 47px; margin-left: 2px;">
                <div class="button2-left">
                    <div class="blank">
                        <a class="hapus_orang_tua" title="Hapus" href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <hr />
        </div>
        <?php
                $idxOrangTua++;
            }
        ?>

        <div id="orang_tua_panel" style="display: none;">
            <div style="float: left; width: 25px; margin-right: 1px; text-align: center;">
                <input type="hidden" id="jform_orang_tua_id" value="" />
                <input type="checkbox" id="jform_option_orang_tua" value="0" onclick="$.Toggle(this, 'jform_nama_orang_tua', 'jform_relation_orang_tua_id');" >
            </div>
            <div style="float: left; width: 297px;">
                <input type="text" id="jform_nama_orang_tua" value="" class="inputbox" style="width: 95%;"/>
                <select id="jform_relation_orang_tua_id" class="combobox" style="width: 100%;">
                    <option value="0" selected="selected"></option>
                </select>
            </div>
            <div style="float: left; width: 125px; text-align: center;">
                <select class="combobox" id="jform_status_orang_tua">
                    <?php
                        foreach ($member_status_orang_tua AS $key => $value) {
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                        }
                    ?>
                </select>
            </div>
            <div style="float: left; width: 47px; margin-left: 2px;">
                <div class="button2-left">
                    <div class="blank">
                        <a class="hapus_orang_tua" title="Hapus" href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <hr />
        </div>

    </div>
    <div class="orang_tua_button button2-left">
        <div class="blank">
            <a id="tambah_orang_tua" title="Tambah Orang Tua" href="#">Tambah Orang Tua</a>
        </div>
    </div>
    <div class="clr"></div>
</div>