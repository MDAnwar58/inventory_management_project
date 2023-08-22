 <!-- Modal -->
 <div class="modal fade" id="invoice-details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4" id="invoice">
                 <div class="row billed_row px-3">
                     <div class="col-8">
                         <h5 class="text-uppercase">billed to</h5>
                         <div class="text-muted text-info">Name: <span id="CName"></span></div>
                         <div class="text-muted text-info">Email: <span id="CEmail"></span></div>
                         <div class="text-muted text-info">User Id: <span id="CId"></span></div>
                     </div>
                     <div class="col-4">
                         <div class="">
                             <img src="<?php echo e('images/logo.png') ?>" style="width: 80px; height: 33px;" alt="">
                             <div class="h6">Invoice</div>
                             <div class="text-muted text-info">Date: <span><?php echo e(date('Y-m-d')) ?></span></div>
                         </div>
                     </div>
                     <hr class="mt-3">
                     <div class="col-md-12">
                         <table class="table table-hover" id="billed_table">
                             <thead>
                                 <tr class="">
                                     <th class="text-muted fw-normal">Name</th>
                                     <th class="text-muted fw-normal">Qty</th>
                                     <th class="text-muted fw-normal">Total</th>
                                 </tr>
                             </thead>
                             <tbody id="invoiceList"></tbody>
                         </table>
                     </div>
                     <hr class="mt-3">
                     <div class="col-md-12">
                         <h6 class="text-uppercase text-amount">Total: $<span id="total"></span></h6>
                         <h6 class="text-uppercase text-amount">Payable: $<span id="payable"></span></h6>
                         <h6 class="text-uppercase text-amount">vat(5%): $<span id="vat"></span></h6>
                         <h6 class="text-uppercase text-amount">Discount: $<span id="discount"></span></h6>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" id="update-modal-close" class="btn text-light bg-danger btn-sm px-4 text-uppercase"
                     data-bs-dismiss="modal">Close</button>
                 <button type="button" onclick="PrintPage()" class="btn text-light bg-success btn-sm px-4 text-uppercase">Print</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     async function invoiceDetails(cus_id, inv_id) {
         showLoader();
         let res = await axios.post('/invoice-details', {
             cus_id: cus_id,
             inv_id: inv_id
         });
         hideLoader();

         document.getElementById('CName').innerText = res.data["customer"]["name"];
         document.getElementById('CId').innerText = res.data["customer"]["user_id"];
         document.getElementById('CEmail').innerText = res.data["customer"]["email"];
         document.getElementById('total').innerText = res.data["invoice"]["total"];
         document.getElementById('payable').innerText = res.data["invoice"]["payable"];
         document.getElementById('vat').innerText = res.data["invoice"]["vat"];
         document.getElementById('discount').innerText = res.data["invoice"]["discount"];

         let invoiceList = $('#invoiceList');
         invoiceList.empty();

         res.data['product'].forEach((item, index) => {
             let row = `<tr>
                                    <td>${item['product']['name']}</td>
                                    <td>${item['qty']}</td>
                                    <td>${item['sale_price']}</td>
                                </tr>`;
                                invoiceList.append(row);
         });
     }

     function PrintPage() {
        let printContents = document.getElementById("invoice");
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents.innerHTML;
        window.print();
        document.body.innerHTML = originalContents;
        setTimeout(() => {
            location.reload();
        }, 1000);
     }
 </script>
