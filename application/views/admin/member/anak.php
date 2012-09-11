<script type="text/javascript">
	$(document).ready(function() {
	
		$('#tambah_anak').bind('click', function(e) {
			var lastOrderingAnak = parseInt($(this).parent().parent().parent().find('#anak_last_ordering').val());
			if (isNaN(lastOrderingAnak)) {
				lastOrderingAnak = 0;
			}
			var ordering = lastOrderingAnak + 1;
            $(this).parent().parent().parent().find('#anak_last_ordering').val(ordering);
			
			e.preventDefault();
			
			var cln = $('#anak_panel').clone();
			cln.attr('id', '')
				.addClass('anak_panel');
            
            cln.find('#jform_anak_id').attr('id', 'jform_anak_id_' + ordering)
                .attr('name', 'jform[anak_id][]')
                .val('new_anak_id_' + ordering);
            cln.find('#jform_option_anak').attr('id', 'jform_option_anak_' + ordering)
                .attr('name', 'jform[option_anak][]')
                .attr('onclick', '$.Toggle(this, \'jform_nama_anak_' + ordering + '\', \'jform_relation_anak_id_' + ordering + '\');')
                .addClass('option_anak');
			cln.find('#jform_nama_anak').attr('id', 'jform_nama_anak_' + ordering)
                .attr('name', 'jform[nama_anak][]');
			cln.find('#jform_relation_anak_id').attr('id', 'jform_relation_anak_id_' + ordering)
                .attr('name', 'jform[relation_anak_id][]')
                .hide();
            cln.find('#jform_status_anak').attr('id', 'jform_status_anak_' + ordering)
                .attr('name', 'jform[status_anak][]');

			cln.appendTo('#anak_container')
				.slideDown(500);
            
            var member_id = $('jform_id').val();
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("admin/member/get_member"); ?>' + '/' + member_id,
                dataType: 'html',
                success: function(html, textStatus) {
                    $('#jform_relation_anak_id_' + ordering).append(html);
                    //$('body').append(html);
                    //alert(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred! ' + errorThrown);
                }
            });
            
		});
		
		$('#anak_canvas').on('click', '.hapus_anak', function(e) {
			var $this = $(this);
			e.preventDefault();
			$this.parents('.anak_panel').slideUp(500, function() {
				$(this).remove();
			});
		});
        
        var oAnak = $('.option_anak');
		$.each(oAnak, function(index, value) {
                alert(index);
			if (this.checked) {
				$('#jform_nama_anak_' + index).hide();
				$('#jform_relation_anak_id_' + index).show();
			}
			else {
				$('#jform_nama_anak_' + index).show();
				$('#jform_relation_anak_id_' + index).hide();
			}
		});
        
    });
</script>
<label id="jform_anak-lbl" for="jform_anak" class="hasTip" title="">Anak</label>
<div id="anak_canvas" style="margin-left: 150px;">
    <div id="anak_container" style="">
        <input type="hidden" id="anak_last_ordering" name="anak_last_ordering" value="0" />

        <div style="float: left; width: 322px; background: #999; color: #fff; margin-right: 1px; margin-bottom: 4px; text-align: center;">Nama</div>
        <div style="float: left; width: 125px; background: #999; color: #fff; margin-right: 1px; margin-bottom: 4px; text-align: center;">Status</div>
        <div style="float: left; width: 49px; background: #999; color: #fff; margin-bottom: 4px; text-align: center;">Hapus</div>

        <div id="anak_panel" style="display: none;">

            <div style="float: left; width: 25px; margin-right: 1px; text-align: center;">
                <input type="hidden" id="jform_anak_id" value="" />
                <input type="checkbox" id="jform_option_anak" value="0" onclick="$.Toggle(this, 'jform_nama_anak', 'jform_relation_anak_id');" >
            </div>
            <div style="float: left; width: 297px;">
                <input type="text" id="jform_nama_anak" value="" class="inputbox" style="width: 95%;"/>
                <select id="jform_relation_anak_id" class="combobox" style="width: 100%;">
                </select>
            </div>
            <div style="float: left; width: 125px; text-align: center;">
                <select class="combobox" id="jform_status_anak">
                    <?php
                        foreach ($member_status_anak AS $key => $value) {
                            echo "<option value='$key'>$value&nbsp;&nbsp;</option>";
                        }
                    ?>
                </select>
            </div>
            <div style="float: left; width: 47px; margin-left: 2px;">
                <div class="button2-left">
                    <div class="blank">
                        <a class="hapus_anak" title="Hapus" href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <hr />
        </div>

    </div>
    <div class="anak_button button2-left">
        <div class="blank">
            <a id="tambah_anak" title="Tambah Anak" href="#">Tambah Anak</a>
        </div>
    </div>
    <div class="clr"></div>
</div>