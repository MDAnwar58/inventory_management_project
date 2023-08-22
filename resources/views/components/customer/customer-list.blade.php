<div class="table-responsive">
    <table class="table table-bordered border-2 border-white" id="tableData">
        <thead class="">
            <tr class="">
                <th class="table-secondary border-2 border-white">No</th>
                <th class="table-secondary border-2 border-white">Name</th>
                <th class="table-secondary border-2 border-white">Email</th>
                <th class="table-secondary border-2 border-white">Mobile</th>
                <th class="table-secondary border-2 border-white">Action</th>
            </tr>
        </thead>
        <tbody class="text-muted" id="tablelist">

        </tbody>
    </table>
</div>

@section('script')
<script>
    async function getList() {
        showLoader();
        let res = await axios.get('/list-customer');
        hideLoader();

        let tablelist = $("#tablelist");
        let tableData = $("#tableData");

        // tableData.DataTable.destory();
        if ($.fn.DataTable.isDataTable(tableData)) {
            tableData.DataTable().destroy();
        }
        tablelist.empty();


        res.data.forEach(function(customer, index) {
            let row = `<tr>
            <td>${index + 1}</td>
            <td>${customer['name']}</td>
            <td>${customer['email']}</td>
            <td>${customer['mobile']}</td>
            <td>
                <button data-id="${customer['id']}" class="btn editBtn border border-1 border-success text-success btn-sm bg-transparent">Edit</button>    
                <button data-id="${customer['id']}" class="btn deleteBtn border border-1 border-danger text-danger btn-sm bg-transparent">Delete</button>    
            </td>
        </tr>`;

            tablelist.append(row);
        });


        $(".editBtn").on("click", function() {
            let id = $(this).attr("data-id");
            FillUpUpdateForm(id);
            $("#update-customer").modal("show");
        });

        $(".deleteBtn").on("click", function() {
            let id = $(this).data("id");
            $("#customer-delete").modal("show");
            $("#deleteId").val(id);
        });


        tableData.DataTable({
            order: [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20],
            responsive: true
        });

        // new DataTable('#tableData', {
        //     order: [
        //         [0, 'desc']
        //     ],
        //     lengthMenu: [5, 10, 15, 20],
        //     responsive: true
        // });
    }
    getList();
</script>
@endsection