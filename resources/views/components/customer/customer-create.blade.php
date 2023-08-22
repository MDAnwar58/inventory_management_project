 <!-- Modal -->
 <div class="modal fade" id="create-customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Create Customer</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4">
                 <form action="" id="save-form">
                     <div class="form-group">
                         <label for="name"><span class="h6">Customer Name</span><span
                                 class="text-danger">*</span></label>
                         <input type="text" name="name" id="customerName" class="form-control px-4">
                     </div>
                     <div class="form-group">
                         <label for="email"><span class="h6">Customer Email</span><span
                                 class="text-danger">*</span></label>
                         <input type="email" name="email" id="customerEmail" class="form-control px-4">
                     </div>
                     <div class="form-group">
                         <label for="mobile"><span class="h6">Customer Mobile</span><span
                                 class="text-danger">*</span></label>
                         <input type="number" name="mobile" id="customerMobile" class="form-control px-4">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" id="modal-close" class="btn text-light bg-danger btn-sm px-4"
                     data-bs-dismiss="modal">Close</button>
                 <button type="button" id="save-btn" class="btn text-light bg-success btn-sm px-4">Save</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     async function createCategory() {
         let CustomerName = document.getElementById("customerName").value,
             customerEmail = document.getElementById("customerEmail").value,
             customerMobile = document.getElementById("customerMobile").value;
         if (CustomerName.length === 0) {
             errorToast("CustomerName is required!");
         } else if (customerEmail.length === 0) {
             errorToast("customerEmail is required!");
         } else if (customerMobile.length === 0) {
             errorToast("customerMobile is required!");
         } else {
             document.getElementById("modal-close").click();
             showLoader();
             let res = await axios.post('/create-customer', {
                 name: CustomerName,
                 email: customerEmail,
                 mobile: customerMobile,
             });
             hideLoader();

             if (res.status === 201) {
                 successToast("Customer added successfully!");
                 document.getElementById("save-form").reset();
                 await getList();
             } else {
                 errorToast("Request fail!");
             }
         }
     }
     document.getElementById("save-btn").addEventListener("click", createCategory);
 </script>
