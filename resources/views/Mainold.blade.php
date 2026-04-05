@include('LayoutHeader')
<style>
    .Containerlayout{
        height: 200px;
        margin-top: 20px;
        border-radius: 14px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
    .BtnAddNew{
        background-color: #388ff9;
        color: white;
        border: 1px solid #388ff9;
        margin: 20px 0px 0px 0px;
        border-radius: 8px;
        width: 90px;
        height: 35px;
        font-family: "Poppins", sans-serif;
        font-size: 15px;
    }
    .BtnAddNew:hover{
        /* background-color: #91cdff; 
        border: 1px solid #91cdff; */
        color: white;
        transition: 0.3s;
        opacity: 0.6;
    }
    .TableItem{
        /* margin: 20px 0px 0px 10px; */
        margin-top: 15px;
        width: 100%;
        font-family: "Poppins", sans-serif;
        font-size: 14px;
    }
    .TableItem thead{
        background-color: #388ff9;
        color: white;
        height: 35px;
    }
    .TableItem th:nth-child(1){
        /* border-radius: 10px 0px 0px 0px; */
        border-top-left-radius: 12px;
    }
     .TableItem th:nth-child(9){
        border-top-right-radius: 12px;
     }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 Containerlayout">
                <a href="{{ route('Save.Information') }}">
                <button class="BtnAddNew">Add New</button>
                </a>
                <div class="col-12">
                    <table class="TableItem">
                        <thead>
                            <tr>
                                <th style="text-align: center">Product ID</th>
                                <th>Description</th>
                                <th>Description2</th>
                                <th>Unit Price</th>
                                <th>Other Price</th>
                                <th>Unit of Measure Code</th>
                                <th>Product Line</th>
                                <th>Photo</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                    </table>
               </div>
            </div>
        </div>
    </div>
</body>
</html>