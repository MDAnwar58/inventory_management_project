<div class="table-responsive">
    <table class="table table-bordered border-2 border-white" id="tableData">
        <thead class="">
            <tr class="">
                {{-- <th class="table-secondary border-2 border-white">No</th> --}}
                <th class="table-secondary border-2 border-white">Image</th>
                <th class="table-secondary border-2 border-white">Name</th>
                <th class="table-secondary border-2 border-white">Price</th>
                <th class="table-secondary border-2 border-white">Unit</th>
                <th class="table-secondary border-2 border-white">Action</th>
            </tr>
        </thead>
        <tbody id="tablelist">

        </tbody>
    </table>
</div>
@section('script')
    <script>
        getList();
        async function getList() {
            showLoader();
            let res = await axios.get('/list-product');
            hideLoader();

            let tablelist = $("#tablelist");
            let tableData = $("#tableData");

            // tableData.DataTable.destory();
            if ($.fn.DataTable.isDataTable(tableData)) {
                tableData.DataTable().destroy();
            }
            tablelist.empty();


            res.data.forEach(function(product, index) {
                let row = `<tr>
                <td class="text-center"><img style="width: 30px; height: auto;" src="${product['img_url']}" alt="Product Image" /></td>
                <td>${product['name']}</td>
                <td>${product['price']}</td>
                <td>${product['unit']}</td>
                <td>
                    <button data-path="${product['img_url']}" data-id="${product['id']}" class="btn editBtn border border-1 border-success text-success btn-sm bg-transparent">Edit</button>    
                    <button data-path="${product['img_url']}" data-id="${product['id']}" class="btn deleteBtn border border-1 border-danger text-danger btn-sm bg-transparent">Delete</button>    
                </td>
            </tr>`;

                tablelist.append(row);
            });


            $(".editBtn").on("click", function() {
                let id = $(this).attr("data-id");
                let path = $(this).attr("data-path");
                FillUpUpdateForm(id, path);
                $("#update-product").modal("show");
            });

            $(".deleteBtn").on("click", function() {
                let id = $(this).data("id");
                let path = $(this).data("path");
                $("#product-delete").modal("show");
                $("#deleteId").val(id);
                $("#deleteFilePath").val(path);
            });


            tableData.DataTable({
                order: [
                    [0, 'desc']
                ],
                lengthMenu: [5, 10, 15, 20],
                responsive: true
            });

            // let table = new DataTable('#myTable');
        }
    </script>
@endsection
