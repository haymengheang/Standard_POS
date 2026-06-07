
    function PreviewFile(event){
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('previewImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    // document.getElementById('exportOption').addEventListener('change',function (){
    //     if(this.value){
    //         window.location.href = this.value;
    //     }
    // });


    document.getElementById('exportOption').addEventListener('change', function () {

    // EXPORT PDF OR EXCEL
    if(this.value === 'pdf' || this.value === 'excel')
    {
        window.location.href = this.options[this.selectedIndex].dataset.url;
    }

    // OPEN MODAL
    if(this.value === 'upload')
    {
        let myModal = new bootstrap.Modal(
            document.getElementById('uploadExcelModal')
        );

        myModal.show();
    }

    // RESET SELECT
    this.value = '';

});

document.querySelector('.upload-excel-btn')
.addEventListener('click', function (e) {

    e.preventDefault();

    let myModal = new bootstrap.Modal(
        document.getElementById('uploadExcelModal')
    );

    myModal.show();

});

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
