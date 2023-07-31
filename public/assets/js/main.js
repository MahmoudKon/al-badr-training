const { Button } = require("bootstrap");

$(function() {
    let run_ajax = {abort: function() {}};
    let active_page_link = window.location.href;
    let table = $('#load-table');
    let counter = $('#show-count');
    let error_alert = $("#error-alert");
    let success_alert = $("#success-alert");
    let modal = $('#modal');

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }); // TO SEND THE CSRF TOKEN WITH AJAX REQUEST

    $(document).ajaxError(function(response, jqXHR) {
        if (jqXHR.status === 419 || jqXHR.status === 401) { location.reload(true); }
    }); // WHEN MAKE REQUEST AND THE RESPONSE IS ERROR THEN MAKE REFRESH THE PAGE

    // This Function To Load Table Data
    function loadTable(url = null) {
        if (table.length == 0) return ;

        run_ajax.abort();

        run_ajax = $.ajax({
            url: url ?? window.location.href,
            type: "GET",
            data: {limit: $('#limit').val(), search: $('#search').val()},
            beforeSend: function (jqHXR) { table.closest('.card').addClass('load'); },
            success: function(response) {
                table.empty().append(response.view);
                counter.text(response.count);
            },
            error: function(jqXHR) { handleErrors(jqXHR); },
            complete: function (jqXHR, textStatus) { table.closest('.card').removeClass('load') }
        });
    }

    // This Event To Call Function When Click On Any Pagination Link
    $('body').on('click', '.pagination a.page-link', function(e) {
        e.preventDefault();
        active_page_link = $(this).attr('href');
        loadTable(active_page_link);
    });

    // This Event To Call Function After Make Any Change On 'Search' Input
    $('body').on('keyup', '#search', function(e) { loadTable(); });

    // This Event To Call Function After Make Any Change On 'Limit' Input
    $('body').on('change', '#limit', function(e) { loadTable(); });

    // This Event To Open Bootstrab-Model Using Any Anchor Tag Has Class 'open-modal' And Make Append To The Response
    $('body').on('click', '.open-modal', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('href'),
            type: "GET",
            beforeSend: function (jqHXR) { modal.find('.modal-body').empty(); },
            success: function(response) {
                modal.modal('show').find('.modal-body').append(response);
                modal.find('.select2').select2();
                console.log(modal.find('.select2'));
            },
            error: function(jqXHR) { handleErrors(jqXHR); },
            complete: function (jqXHR, textStatus) { modal.modal('hide'); }
        });
    });

    // This Event Show Confirm Message To Approve To Delete Row And Must Button Has Class 'delete-row'
    $('body').on('click', '.delete-row, #delete-rows', function(e) {
        e.preventDefault();
        if (confirm('هل انت متاكد من عملية الحذف')) $(this).closest('form').submit();
    });

    // This Event To Make Submit Any Form Has Class 'submit-form'
    $('body').on('submit', '.submit-form', function(e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: new FormData(form[0]),
            dataType: 'JSON',
            processData: false,
            contentType: false,
            beforeSend: function (jqHXR) { form.closest('.card').addClass('load').find('.error').empty(); },
            success: function(response) {
                modal.modal('hide').find('.modal-body').empty();
                showAlert(success_alert, response.message);
                loadTable(active_page_link);
            },
            error: function(jqXHR) { handleErrors(jqXHR, form); },
            complete: function (jqXHR, textStatus) { form.closest('.card').removeClass('load'); }
        });
    });

    $('body').on('change', '#check-all-rows', function() {
        table.find('.row-checkbox').prop('checked', $(this).is(':checked'));
    });

    // This Event To Make Submit Any Form Has Class 'submit-form'
    $('body').on('submit', '#multi-delete', function(e) {
        e.preventDefault();
        let ids = [];

        $.each($('body').find('.row-checkbox:checked'), function() {
            ids.push($(this).val());
        });

        if (ids.length == 0) {
            alert('يرجي اختيار بيانات لحذفها');
            return ;
        }

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: {ids: ids},
            success: function(response) {
                showAlert(success_alert, response.message);
                loadTable(active_page_link);
            },
            error: function(jqXHR) { handleErrors(jqXHR); },
        });
    });
    // This Event To Handel invoice Data by class invoice-form
    $('body').on('change', '.invoice-form', function(e){
        e.preventDefault();
        let form = $(this);
        $.ajax({
            //
        });
    });
    // this Event To Add more input when click
    // $('body').on('click', '.more-store', function(e){
    //     e.preventDefault();
    //     var maxItem = 0; //At frist There is No inputs of store
    //     if(maxItem<5){
    //         // we need for two inputs for store name && qty
    //         maxItem+=1;
    //         var label = document.createElement('label');
    //         label.id = "store-name";
    //         label.innerHTML="StoreName-num"+maxItem+": ";
    //         var input = document.createElement('input');
    //         input.type = "text";
    //         input.name = "stores[maxItem]['store_id']";
    //         input.value= document.getElementsByClassName('more-store').val();

    //         var label2 = document.createElement("label");
    //         label2.id = "Quantity";
    //         label2.innerHTML = "Quantity of"+document.getElementsByClassName('more-store').val()+": ";
    //         var input2 = document.createElement("input");
    //         input2.type="text";
    //         input2.name="stores[maxItem]['qty']";
    //         // $($(label)).insertBefore($(select.after-me));
    //         // $($(input)).insertBefore($(select.after-me));
    //         // $($(label2)).insertBefore($(select.after-me));
    //         // $($(input2)).insertBefore($(select.after-me));
    //         // $('<br/>').insertBefore($(select.after-me));
    //     }
    // });

    // This Function To Handle Any Response Error And Show It
    function handleErrors(jqXHR, form = null)
    {
        if (jqXHR.readyState == 0) return true;

        if ([401,402,403,404].includes(jqXHR.status))
            showAlert(error_alert, jqXHR.responseJSON.message);

        else if (jqXHR.status == 422) { // List Validation Error
            $.each(jqXHR.responseJSON.errors, function (key, val) {
                val = Array.isArray(val) ? val[0] : val;
                form.find(`#${key.replaceAll('.', '-')}_error`).text(val).fadeIn(300);
            });
        } else if (typeof jqXHR.responseJSON !== 'undefined' && typeof jqXHR.responseJSON.line !== 'undefined') {
            showAlert(error_alert, jqXHR.responseJSON.message + ' - File: ' + jqXHR.responseJSON.file + ' (Line: ' + jqXHR.responseJSON.line + ')');
        } else {
            showAlert(error_alert, jqXHR.responseJSON || jqXHR.statusText);
            $('#load-backend-info').modal("show").find('.modal-body').empty().append(jqXHR.responseText);
        }
    }

    let timeOut = 0;
    function showAlert(ele, message)
    {
        clearTimeout(timeOut);
        ele.removeClass('d-none').slideDown(500).find('.show-alert-message').text(message);

        timeOut = setTimeout(() => {
            ele.slideUp(500, function() {
                $(this).addClass('d-none').find('.show-alert-message').text('');
            });
        }, 5000);
    }

    // Call Function
    if (table.length > 0) loadTable();
});