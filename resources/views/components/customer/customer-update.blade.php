 <!-- Modal -->
 <div class="modal fade" id="update-customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Customer</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4">
                 <form id="update-form">
                     <div class="form-group">
                         <label for="name"><span class="h6">Customer Name</span><span
                                 class="text-danger">*</span></label>
                         <input type="text" name="name" id="customerNameUpdate" class="form-control px-4">
                     </div>
                     <div class="form-group">
                         <label for="email"><span class="h6">Customer Email</span><span
                                 class="text-danger">*</span></label>
                         <input type="email" name="email" id="customerEmailUpdate" class="form-control px-4">
                     </div>
                     <div class="form-group">
                         <label for="mobile"><span class="h6">Customer Mobile</span><span
                                 class="text-danger">*</span></label>
                         <input type="text" name="mobile" id="customerMobileUpdate" class="form-control px-4">
                     </div>

                     <input type="hidden" id="updateId">
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" id="update-modal-close" class="btn text-light bg-danger btn-sm px-4"
                     data-bs-dismiss="modal">Close</button>
                 <button type="button" id="update-btn" class="btn text-light bg-success btn-sm px-4">Update</button>
             </div>
         </div>
     </div>
 </div>


 <script>
     async function FillUpUpdateForm(id) {
         document.getElementById("updateId").value = id;
         let res = await axios.post('/customer-by-id', {
             id: id
         });
         if (res.status === 200) {
             document.getElementById("customerNameUpdate").value = res.data['name'];
             document.getElementById("customerEmailUpdate").value = res.data['email'];
             document.getElementById("customerMobileUpdate").value = res.data['mobile'];
         } else {
             errorToast("Category is not found")
         }
     }

     async function updateCategory() {
         let CustomerName = document.getElementById("customerNameUpdate").value,
             customerEmail = document.getElementById("customerEmailUpdate").value,
             customerMobile = document.getElementById("customerMobileUpdate").value,
             updateId = document.getElementById("updateId").value;
         if (CustomerName.length === 0) {
             errorToast("CustomerName is required!");
         } else if (customerEmail.length === 0) {
             errorToast("customerEmail is required!");
         } else if (customerMobile.length === 0) {
             errorToast("customerMobile is required!");
         } else {
             document.getElementById("update-modal-close").click();
             showLoader();
             let res = await axios.post('/update-customer', {
                 name: CustomerName,
                 email: customerEmail,
                 mobile: customerMobile,
                 id: updateId
             });
             hideLoader();

             if (res.status === 200 && res.data === 1) {
                 successToast("Request successfully!");
                 document.getElementById("update-form").reset();
                 await getList();
             } else {
                 errorToast("Request fail!");
             }
         }
     }
     document.getElementById("update-btn").addEventListener("click", updateCategory);
 </script>
