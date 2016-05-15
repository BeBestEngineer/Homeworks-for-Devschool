$( document ).ready( function(){ 
    
    $( 'a.clear-button' ).on( 'click', function(){
        $('form input:not([type = hidden])').val('');
        $('form textarea').val('');
        $("form option").removeAttr("selected");
        $("form select [value='']").attr("selected", "selected");
    });
    
    $('#for-empty-table').hide();

    function show_tr () {
          if ( !$('tr').is('.ad') ) {
            $('#for-empty-table').show();
        }
    }

    $( 'a.btn-del' ).on( 'click', function(){
        var tr = $(this).closest('tr');
        var id = tr.children('td:last').html();  

        $('#storage_for_JQ').load('control_JS.php?action=delete&del_id='+id, function(){
            tr.fadeOut('fast', function(){
                $(this).remove();
                show_tr();
            });
        });
    });


    $('a.btn-del-all').on('click', function () {
        $('#storage_for_JQ').load('control_JS.php?action=delete_all', function () {
            var trall = $('tr.ad');
            trall.fadeOut('fast');
            trall.remove();
            show_tr();
        });
    });
});


