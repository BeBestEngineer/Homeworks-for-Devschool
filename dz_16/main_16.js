$(document).ready(function () {

    function show_message_for_empty_list() {
        if (!$('tr').is('.ad')) {
            $('#for-empty-table').show();
        } else {
            $('#for-empty-table').hide();
        }
    }

    function clear_form() {
        $('form input:not([type = hidden])').val('');
        $('form textarea').val('');
        $("form option").removeAttr("selected");
        $("form option[value='']").prop("selected", "selected");
    }

    function prepare_form_for_add_new_ad() {
        $('div#rowAdd').show();
        $('div#rowEdit').hide();
        $('input[name=id]').val('');    // обнуляем id, чтобы можно было добавлять новые объявления        
    }

    function del_ad(but) {
        var trx = $(but).closest('tr');
        var id = trx.children('td:last').html();
        var id_ob = {"del_id": id};

        $.getJSON('control_JS_16.php?action=delete', id_ob, function (response) {
            console.log(response);
            $(trx).fadeOut('slow', function () {
                $(this).remove();
                show_message_for_empty_list();
            });
            clear_form();                   
            prepare_form_for_add_new_ad();
        });
    }

    function show_ad(but) {
        $('div#rowAdd').hide();
        $('div#rowEdit').show();

        var trx = $(but).closest('tr');
        var id = trx.children('td:last').html();
        var id_ob = {"edit_id": id};

        $.getJSON('control_JS_16.php?action=edit', id_ob, function (response) {
            
            if ( response.seller_type == 'Company' ) {
                $('#Individual-fields').hide();
                $('#Company-fields').show();                
            } else if ( response.seller_type == 'Individual' ) {
                $('#Company-fields').hide();
                $('#Individual-fields').show();                
            }
            
            $('input[name=id]').val(response.id);

            $('input[name=company_name]').val(response.company_name);
            $('input[name=company_address]').val(response.company_address);
            $('input[name=website]').val(response.website);
            $('input[name=seller_name]').val(response.seller_name);
            $('input[name=vk_account]').val(response.vk_account);
            $('input[name=e_mail]').val(response.e_mail);
            $('input[name=phone_number]').val(response.phone_number);

            $("form option").removeAttr("selected");
            $("form select[name=city_id] option[value="+ response.city_id +"]").prop("selected", "selected");
            $("form select[name=category_id] option[value="+ response.category_id +"]").prop("selected", "selected");
            
            $('input[name=title]').val(response.title);
            $('textarea[name=description]').val(response.description);
            $('input[name=price]').val(response.price);
            $('input[name=seller_type]').val(response.seller_type);
        });
    }

    // проверяем базу на наличие объявлений ( при перезагрузке страницы )
    show_message_for_empty_list();
    // готовим форму ( при перезагрузке страницы )
    clear_form();
    prepare_form_for_add_new_ad();
    // инициализируем тип продавца (компания или частное лицо)
    $('input[name=seller_type]').val('Company');

    $('a.btn-seller-type').on('click', function () {

            if ($(this).is('#seller-type-Company')) {
                $('#Individual-fields').hide();
                $('#Company-fields').show();
                $('input[name=seller_type]').val('Company');

            } else if ($(this).is('#seller-type-Individual')) {
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

    // нажимаем на кнопку "Добавления нового объявления в БД"
    $('a#Add').on('click', function () {
        var data_from_form = $('form#adsform').serialize();
        var id = $('input[name=id]').val();

        $.post('control_JS_16.php?action=add&id=' + id, data_from_form, function ( last_ad_with_status ) {
            $('.for-clone').clone().appendTo('tbody#tbody-id').removeClass('for-clone').addClass('ad').removeAttr('style');
            
            console.log( last_ad_with_status.st );
            last_ad = last_ad_with_status.ad;
            
            $('tbody#tbody-id tr:last td:eq(0) a').text(last_ad.title);
            $('tbody#tbody-id tr:last td:eq(1)').text(last_ad.price);
            $('tbody#tbody-id tr:last td:eq(2)').text(last_ad.company_name);
            $('tbody#tbody-id tr:last td:eq(3)').text(last_ad.seller_name);
            $('tbody#tbody-id tr:last td:eq(5)').text(last_ad.id);

            show_message_for_empty_list();
        }, 'json');
    });

    // нажимаем на кнопку "Отправления отредактированного объявления в БД"
    $('a#Edit').on('click', function () {
        var data_from_form = $('form#adsform').serialize();
        var id = $('input[name=id]').val();

        $.post('control_JS_16.php?action=add&id=' + id, data_from_form, function ( edit_ad_with_status ) {
            var adress_in_DOM = "tbody tr:has(td:contains('" + id + "'))";
            console.log( edit_ad_with_status.st );
            edit_ad = edit_ad_with_status.ad;
            
            $(adress_in_DOM + " td:eq(0) a").text(edit_ad.title);
            $(adress_in_DOM + " td:eq(1)").text(edit_ad.price);
            $(adress_in_DOM + " td:eq(2)").text(edit_ad.company_name);
            $(adress_in_DOM + " td:eq(3)").text(edit_ad.seller_name);

            clear_form();
            prepare_form_for_add_new_ad();
        }, 'json');
    });

    // нажимаем на кнопку "Удалить все объявления"
    $('a.btn-del-all').on('click', function () {
        var trall = $('tr.ad');

        $.getJSON('control_JS_16.php?action=delete_all', function (response) {
            console.log(response);
            trall.fadeOut('fast');
            trall.remove();

            clear_form();
            prepare_form_for_add_new_ad();
            show_message_for_empty_list();
        });
    });


});