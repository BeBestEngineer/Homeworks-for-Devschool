$(document).ready(function () {

    function show_message_for_empty_list() {
        if (!$('tr').is('.ad')) {
            $('#for-empty-table').delay( 600 ).fadeIn('slow');
        } else {
            $('#for-empty-table').delay( 1600 ).fadeOut('slow');
        }
    }

    function show_message_box_1() {
        $('#message-box-1').delay( 600 ).fadeIn('slow').delay( 2000 ).fadeOut('slow');
    }

    function clear_form() {
        $('form input:not([type = hidden])').val('');
        $('form textarea').val('');
        $("form option").removeAttr("selected");
        $("form option[value='']").prop("selected", "selected");
    }

    function prepare_form_for_add_new_ad() {
        $('div#rowEdit').fadeOut('slow');
        $('div#rowAdd').delay( 600 ).fadeIn('slow');
        $('input[name=id]').val('');    // обнуляем id, чтобы можно было добавлять новые объявления        
    }

    function del_ad(but) {
        var trx = $(but).closest('tr');
        var id = trx.children('td:last').html();
        var id_ob = {"del_id": id};

        $.getJSON('control_JS_17.php?action=delete', id_ob, function (response) {
            if ( response ) {
                console.log( 'Ad no. ' + id + ' have been removed' );
                $(trx).fadeOut('slow', function () {
                    $(this).remove();
                    $('#message-box-1').removeClass("alert-warning alert-danger").addClass('alert-success');
                    $('#message-box-1-text-header').text('Request successful.');
                    $('#message-box-1-text').text( 'Ad no. ' + id + ' have been removed' );
                    show_message_for_empty_list();
                });
            } else {
                console.log( 'Ad no. ' + id + ' was not removed' );
                    $('#message-box-1').removeClass("alert-success alert-warning").addClass('alert-danger');
                    $('#message-box-1-text-header').text('A request is failed.');
                    $('#message-box-1-text').text( 'Ad no. ' + id + ' was not removed' );
            }
            show_message_box_1();
            clear_form();                   
            prepare_form_for_add_new_ad();
        });
    }

    function show_ad(but) {
        $('input').removeAttr('disabled');
        $('div#rowAdd').fadeOut('slow');
        $('div#rowEdit').delay( 600 ).fadeIn('slow');
        //$('.rowAddEditToggle').delay( 600 ).fadeToggle( 300 ); 
        //$('#seller-type-links').hide('slow');
        $('#seller-type-links').delay( 600 ).fadeOut('slow');

        var trx = $(but).closest('tr');
        var id = trx.children('td:last').html();
        var id_ob = {"edit_id": id};

        $.getJSON('control_JS_17.php?action=edit', id_ob, function (response) {
            
            if ( response.seller_type == 'Company' ) {
                $('#Individual-fields').hide();
                $('#Company-fields').show();                
            } else if ( response.seller_type == 'Individual' ) {
                $('#Company-fields').hide();
                $('#Individual-fields').show();                
            }
            $("#adsform").autofill( response );
        });
    }

    function put_ad_to_list( adress_in_DOM, res ) {
        $(adress_in_DOM + " td:eq(0) a").text(res.title);
        $(adress_in_DOM + " td:eq(1)").text(res.price);
        $(adress_in_DOM + " td:eq(2)").text(res.company_name);
        $(adress_in_DOM + " td:eq(3)").text(res.seller_name);
        $(adress_in_DOM + " td:eq(5)").text(res.id);        
    }
    
    // функция которая вызывается при нажатии на button Add или button Edit, где button  - тип элемента DOM
    function showResponse( res ) {        
                    //$('#seller-type-links').show('slow');
        if ( $('input[name=id]').val() ) {
            if ( res.write ) {
                console.log( 'Ad no. '+ res.get_write.id +' has been updated' );
                    $('#message-box-1').removeClass("alert-warning alert-danger").addClass('alert-success');
                    $('#message-box-1-text-header').text('Request successful.');
                    $('#message-box-1-text').text( 'Ad no. '+ res.get_write.id +' has been updated' );
            } else {
                console.log( 'Ad no. '+ res.get_write.id +' was not changed' );
                    $('#message-box-1').removeClass("alert-success alert-danger").addClass('alert-warning');
                    $('#message-box-1-text-header').text('A request is made without changes.');
                    $('#message-box-1-text').text( 'Ad no. '+ res.get_write.id +' was not changed' );
            }                                
            var adress_in_DOM = "tbody tr:has(td:contains('" + res.get_write.id + "'))";
            
        } else {
            if ( res.write ) {
                console.log( 'Ad no. ' + res.write + ' successfully added to the base' );
                    $('#message-box-1').removeClass("alert-warning alert-danger").addClass('alert-success');
                    $('#message-box-1-text-header').text('Request successful.');
                    $('#message-box-1-text').text( 'Ad no. ' + res.write + ' successfully added to the base' );                
            } else {
                console.log( 'Ad was not added to the base' );
                    $('#message-box-1').removeClass("alert-success alert-warning").addClass('alert-danger');
                    $('#message-box-1-text-header').text('A request is failed.');
                    $('#message-box-1-text').text( 'Ad was not added to the base' );                
            }                
                    $('.for-clone').clone().appendTo('tbody#tbody-id').removeClass('for-clone').addClass('ad').removeAttr('style');    
            var adress_in_DOM = "tbody#tbody-id tr:last";            
            show_message_for_empty_list();
        }
        $('#seller-type-links').delay( 600 ).fadeIn('slow');
        show_message_box_1();
        put_ad_to_list( adress_in_DOM, res.get_write );
        prepare_form_for_add_new_ad();
    }
    
    // проверяем базу на наличие объявлений ( при перезагрузке страницы )
    show_message_for_empty_list();
    // готовим форму ( при перезагрузке страницы )
    clear_form();
    prepare_form_for_add_new_ad();
    // инициализируем тип продавца (компания или частное лицо)
    $('input[name=seller_type]').val('Company');
    // устанавиливаем событие на кнопку #message-box-1
    $('#mb1b').on('click',function(){ $('#message-box-1').hide(); });
    
    // подключаем валидацию полей
    $.validate({
        lang: 'en',
        form : '#adsform'        
    });

    // настраиваем AJAXForm
    var options = { 
        success:    showResponse,  // post-submit callback б
        url:       'control_JS_17.php?action=add',         // override for form's 'action' attribute 
        dataType:  'json',        // 'xml', 'script', or 'json' (expected server response type) 
        resetForm: true        // reset the form after successful submit 
    }; 
    // подключаем 'ajaxForm' к форме
    $('#adsform').ajaxForm( options );       

    // ссылки дял выбора добавления объяления для компании или для частного лица
    $('a.btn-seller-type').on('click', function () {

            if ($(this).is('#seller-type-Company')) {
                $('#Company-fields input').removeAttr('disabled');
                $('#Individual-fields input').val('').attr('disabled', '');
            
                $('#Individual-fields').hide();
                $('#Company-fields').show();
                
                $('input[name=seller_type]').val('Company');

            } else if ($(this).is('#seller-type-Individual')) {
                $('#Individual-fields input').removeAttr('disabled');
                $('#Company-fields input').val('').attr('disabled', '');
            
                $('#Company-fields').hide();
                $('#Individual-fields').show();
            
                $('input[name=seller_type]').val('Individual');
            }
    });

    // устанавливаем события на кнопки редактирования и удаления объявлений списка
    $('table#list-of-ads > tbody').on('click', 'a', function () {
        if ($(this).hasClass('btn-show')) {
            show_ad(this);
        } else if ($(this).hasClass('btn-del')) {
            del_ad(this);
        }
    });

    // нажимаем на кнопку очистки формы
    $('a.clear-button').on('click', function () {
        clear_form();
    });

    // нажимаем на кнопку "Удалить все объявления"
    $('a.btn-del-all').on('click', function () {
        var trall = $('tr.ad');

        $.getJSON('control_JS_17.php?action=delete_all', function (response) {
            if ( response ) {
                console.log( 'All ads have been removed from database' );
                trall.fadeOut('fast');
                trall.remove();
                    $('#message-box-1').removeClass("alert-warning alert-danger").addClass('alert-success');
                    $('#message-box-1-text-header').text('Request successful.');
                    $('#message-box-1-text').text( 'All ads have been removed from database' );
                show_message_for_empty_list();
            } else {
                console.log( 'Some ads was not removed. Please reload the page to reflect the changes' );
                    $('#message-box-1').removeClass("alert-success alert-danger").addClass('alert-warning');
                    $('#message-box-1-text-header').text('Attention.');
                    $('#message-box-1-text').text( 'Some ads was not removed. Please reload the page to reflect the changes' );
            }
            show_message_box_1();
        });
    });


});