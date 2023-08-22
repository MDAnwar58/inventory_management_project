<div class="table-responsive">
    <table class="table table-bordered border-2 border-white" id="tableData">
        <thead class="">
            <tr class="">
                <th class="table-secondary border-2 border-white">No</th>
                <th class="table-secondary border-2 border-white">Category</th>
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
            let res = await axios.get('/list-category');
            hideLoader();

            let tablelist = $("#tablelist");
            let tableData = $("#tableData");

            // tableData.DataTable.destory();
            if ($.fn.DataTable.isDataTable(tableData)) {
                tableData.DataTable().destroy();
            }
            tablelist.empty();


            res.data.forEach(function(category, index) {
                let row = `<tr>
                <td>${index + 1}</td>
                <td>${category['name']}</td>
                <td>
                    <button data-id="${category['id']}" class="btn editBtn border border-1 border-success text-success btn-sm bg-transparent">Edit</button>    
                    <button data-id="${category['id']}" class="btn deleteBtn border border-1 border-danger text-danger btn-sm bg-transparent">Delete</button>    
                </td>
            </tr>`;

                tablelist.append(row);
            });


            $(".editBtn").on("click", function() {
                let id = $(this).attr("data-id");
                FillUpUpdateForm(id);
                $("#updateCategory").modal("show");
            });

            $(".deleteBtn").on("click", function() {
                let id = $(this).data("id");
                $("#create-delete").modal("show");
                $("#deleteId").val(id);
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
