<div class="table-responsive">
    <table class="table table-bordered border-2 border-white" id="tableData">
        <thead class="">
            <tr class="">
                <th class="table-secondary border-2 border-white">No</th>
                <th class="table-secondary border-2 border-white">Name</th>
                <th class="table-secondary border-2 border-white">Phone</th>
                <th class="table-secondary border-2 border-white">Total</th>
                <th class="table-secondary border-2 border-white">Vat</th>
                <th class="table-secondary border-2 border-white">Discount</th>
                <th class="table-secondary border-2 border-white">Payable</th>
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
            let res = await axios.get('/invoice-select');
            hideLoader();

            let tablelist = $("#tablelist");
            let tableData = $("#tableData");

            // tableData.DataTable.destory();
            if ($.fn.DataTable.isDataTable(tableData)) {
                tableData.DataTable().destroy();
            }
            tablelist.empty();


            res.data.forEach(function(item, index) {
                let row = `<tr>
             <td class="text-center">${index + 1}</td>
             <td>${item['customer']['name']}</td>
             <td>${item['customer']['mobile']}</td>
             <td>${item['total']}</td>
             <td>${item['vat']}</td>
             <td>${item['discount']}</td>
             <td>${item['payable']}</td>
             <td>
                 <button type="button" data-id="${item['id']}" data-cus="${item['customer']['id']}" class="btn viewBtn border border-1 border-muted text-secondary btn-sm bg-transparent" data-bs-toggle="modal" data-bs-target="#invoice-details">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                     </button>    
                 <button data-id="${item['id']}" data-cus="${item['customer']['id']}" class="btn deleteBtn border border-1 border-danger text-danger btn-sm bg-transparent">
                     <i class="fa fa-trash" aria-hidden="true"></i>
                     </button>    
             </td>
         </tr>`;

                tablelist.append(row);
            });


            $(".viewBtn").on("click", function() {
                let id = $(this).attr("data-id");
                let cus = $(this).attr("data-cus");
                invoiceDetails(cus, id);
            });

            $(".deleteBtn").on("click", function() {
                let id = $(this).data("id");
                $("#deleteId").val(id);
                $("#invoice-delete").modal("show");
            });


            tableData.DataTable({
                order: [
                    [0, 'desc']
                ],
                lengthMenu: [5, 10, 15, 20],
                responsive: true
            });

           
        }
        
    </script>
@endsection
