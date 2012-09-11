<script type="text/javascript">
    document.switcher = null;
    window.addEvent('domready', function(){
        toggler = document.id('submenu');
        element = document.id('config-document');
        if (element) {
            document.switcher = new JSwitcher(toggler, element, {cookieName: toggler.getProperty('class')});
        }
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

</script>
<div class="mc-wrapper">
    <div id="system-message-container"></div>
    <div id="mc-title">
        
        <?php
            echo $module_title;
            echo $help->render();
        ?>
        <div class="mc-toolbar" id="toolbar"><ul></ul></div>
        <div class="mc-clr"></div>
    </div>
    <div id="mc-submenu">
        <?php echo $this->load->view('admin/sysinfo/navigation'); ?>
    </div>
    <div id="mc-component">
        <?php $this->load->view('admin/sysinfo/sysinfo'); ?>
    </div>
    <div class="mc-clr"></div>
</div>