
    function PreviewFile(event){
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('previewImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
$(document).ready(function () {

    let timer;

    function loadData() {
        let search = $('#search').val();
        let category = $('#category').val();

        $.ajax({
            url: productUrl,
            type: "GET",
            data: {
                search: search,
                category: category
            },
            success: function (res) {
                $('#productTable').html(res.table);
                $('#paginationArea').html(res.pagination);
            }
        });
    }

    $('#search').on('input', function () {
        clearTimeout(timer);
        timer = setTimeout(loadData, 300);
    });

    $('#category').on('change', function () {
        loadData();
    });

});