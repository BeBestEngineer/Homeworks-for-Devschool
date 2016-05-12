$( document ).ready( function(){ 
    $( 'a.btn-del' ).on( 'click', function(){
        var tr = $(this).closest('tr');
        var id = tr.children('td:last').html();  

        $('#storage_for_JQ').load('control_JS.php?action=delete&del_id='+id, function(){
            tr.fadeOut('fast', function(){
                $(this).remove();
            });
        });
    });
});

