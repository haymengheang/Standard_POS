$(document).ready(function () {

    let timer;

    function loadData() {
        let search = $('#search').val();

        $.ajax({
            url: productUrl,
            type: "GET",
            data: { search: search },
            success: function (res) {
                $('#UnitOfmeasureTable').html(res.table);
                $('#paginationArea').html(res.pagination);
            },
            error: function (err) {
                console.log('AJAX Error:', err);
            }
        });
    }

    $('#search').on('input', function () {
        clearTimeout(timer);
        timer = setTimeout(loadData, 300);
    });

});