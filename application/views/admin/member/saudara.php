<script type="text/javascript">
	$(document).ready(function() {
	
		$('#tambah_saudara').bind('click', function(e) {
			var lastOrderingSaudara = parseInt($(this).parent().parent().parent().find('#saudara_last_ordering').val());
			if (isNaN(lastOrderingSaudara)) {
				lastOrderingSaudara = 0;
			}
			var ordering = lastOrderingSaudara + 1;
            $(this).parent().parent().parent().find('#saudara_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#saudara_panel').clone();
			cln.attr('id', '')
				.addClass('saudara_panel');
            
            cln.find('#jform_saudara_id').attr('id', 'jform_saudara_id_' + ordering)
                .attr('name', 'jform[saudara_id][]')
                .val('new_saudara_id_' + ordering);
            cln.find('#jform_option_saudara').attr('id', 'jform_option_saudara_' + ordering)
                .attr('name', 'jform[option_saudara][]')
                .attr('onclick', '$.Toggle(this, \'jform_nama_saudara_' + ordering + '\', \'jform_relation_saudara_id_' + ordering + '\');')
                .addClass('option_saudara');
			cln.find('#jform_nama_saudara').attr('id', 'jform_nama_saudara_' + ordering)
                .attr('name', 'jform[nama_saudara][]');
			cln.find('#jform_relation_saudara_id').attr('id', 'jform_relation_saudara_id_' + ordering)
                .attr('name', 'jform[relation_saudara_id][]')
                .hide();
            cln.find('#jform_status_saudara').attr('id', 'jform_status_saudara_' + ordering)
                .attr('name', 'jform[status_saudara][]');

			cln.appendTo('#saudara_container')
				.slideDown(500);
			
            var member_id = $('jform_id').val();
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("admin/member/get_member"); ?>' + '/' + member_id,
                dataType: 'html',
                success: function(html, textStatus) {
                    $('#jform_relation_saudara_id_' + ordering).append(html);
                    //$('body').append(html);
                    //alert(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred! ' + errorThrown);
                }
            });
            
		});
		
		$('#saudara_canvas').on('click', '.hapus_saudara', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.saudara_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        var oSaudara = $('.option_saudara');
		$.each(oSaudara, function(index, value) {
			if (this.checked) {
				$('#jform_nama_saudara_' + index).hide();
				$('#jform_relation_saudara_id_' + index).show();
			}
			else {
				$('#jform_nama_saudara_' + index).show();
				$('#jform_relation_saudara_id_' + index).hide();
			}
		});
        
    });
</script>
<label id="jform_saudara-lbl" for="jform_saudara" class="hasTip" title="">Saudara</label>
<div id="saudara_canvas" style="margin-left: 150px;">
    <div id="saudara_container" style="">
        <input type="hidden" id="saudara_last_ordering" name="saudara_last_ordering" value="0" />

        <div style="float: left; width: 322px; background: #999; color: #fff; margin-right: 1px; margin-bottom: 4px; text-align: center;">Nama</div>
        <div style="float: left; width: 125px; background: #999; color: #fff; margin-right: 1px; margin-bottom: 4px; text-align: center;">Status</div>
        <div style="float: left; width: 49px; background: #999; color: #fff; margin-bottom: 4px; text-align: center;">Hapus</div>

        <div id="saudara_panel" style="display: none;">

            <div style="float: left; width: 25px; margin-right: 1px; text-align: center;">
                <input type="hidden" id="jform_saudara_id" value="" />
                <input type="checkbox" id="jform_option_saudara" value="0" onclick="$.Toggle(this, 'jform_nama_saudara', 'jform_relation_saudara_id');" >
            </div>
            <div style="float: left; width: 297px;">
                <input type="text" id="jform_nama_saudara" value="" class="inputbox" style="width: 95%;" />
                <select class="combobox" id="jform_relation_saudara_id" style="width: 100%;" >
                    <option value="-1" selected="selected"></option>
                </select>
            </div>
            <div style="float: left; width: 124px; text-align: center;">
                <select class="combobox" id="jform_status_saudara">
                    <?php
                        foreach ($member_status_saudara AS $key => $value) {
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                        }
                    ?>
                </select>
            </div>
            <div style="float: left; width: 47px; margin-left: 2px;">
                <div class="button2-left">
                    <div class="blank">
                        <a class="hapus_saudara" title="Hapus" href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <hr />
        </div>

    </div>
    <div class="saudara_button button2-left">
        <div class="blank">
            <a id="tambah_saudara" title="Tambah Saudara" href="#">Tambah Saudara</a>
        </div>
    </div>
    <div class="clr"></div>
</div>