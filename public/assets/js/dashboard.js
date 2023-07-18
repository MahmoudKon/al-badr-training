
$(function () {
    let table = $('#load-table');
    let run_ajax = {
        abort: function () { }
    };
    let active_page_link = window.location.href;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadTable(url = null) {
        if ($('#load-table').lenght == 0) return;
        run_ajax.abort();
        $('#load-table').parent().addClass('load');
        run_ajax = $.ajax({
            url: url ?? window.location.href,
            type: "GET",
            data: {
                limit: $('#limit').val(),
                search: $('#search').val()
            },
            success: function (response) {
                $('#load-table').empty().append(response.view).parent().removeClass('load');
                $('#show-count').text(response.count);
            },
            error: function (error) {
                $('#error-alert').removeClass('d-none').find('.show-alert-message').text(error
                    .responseJSON.message);
            }
        });
    }

    $('body').on('click', '.pagination a.page-link', function (e) {
        e.preventDefault();
        active_page_link = $(this).attr('href');
        loadTable(active_page_link);
    });

    $('body').on('keyup', '#search', function (e) {
        loadTable();
    });

    $('body').on('change', '#limit', function (e) {
        loadTable();
    });

    $('body').on('click', '.open-modal', function (e) {
        e.preventDefault();
        $('#modal').find('.modal-body').empty();
        $.ajax({
            url: $(this).attr('href'),
            type: "GET",
            success: function (response) {
                $('#modal').modal('show').find('.modal-body').append(response);
            },
            error: function (error) {
                $('#modal').modal('hide');
                $('#error-alert').removeClass('d-none').find('.show-alert-message')
                    .text(error.responseJSON.message);
            }
        })
    });


    $('body').on('submit', '.submit-form', function (e) {
        e.preventDefault();
        let form = $(this);
        form.closest('.card').addClass('load');

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: new FormData(form[0]),
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (response) {
                form.closest('.card').removeClass('load');
                $('#modal').modal('hide').find('.modal-body').empty();
                $('#success-alert').removeClass('d-none').find('.show-alert-message')
                    .text(response.message);
                loadTable(active_page_link);
            },
            error: function (error) {
                form.closest('.card').removeClass('load');
                $('#error-alert').removeClass('d-none').find('.show-alert-message')
                    .text(error.responseJSON.message);
            }
        })
    });

    $('body').on('click', '.delete-row, #delete-rows', function (e) {
        e.preventDefault();
        if (confirm('هل انت متاكد من عملية الحذف')) $(this).closest('form').submit();
    });

    //multidelete
    // <!--CHECKEDBOX-->
    $('body').on('submit', '#multi-delete', function (e) {
        e.preventDefault();
        let ids = [];

        $.each($('body').find('.row-checkbox:checked'), function () {
            ids.push($(this).val());
        });

        if (ids.length == 0) {
            alert('يرجي اختيار بيانات لحذفها');
            return;
        }

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: { ids: ids },
            success: function (response) {
                showAlert(success_alert, response.message);
                loadTable(active_page_link);
            },
            error: function (jqXHR) { handleErrors(jqXHR); },
        });
    });

    if (table.length > 0) loadTable();

});