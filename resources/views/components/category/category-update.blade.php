 <!-- Modal -->
 <div class="modal fade" id="updateCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4">
                 <form action="" id="update-form">
                     <div class="form-group">
                         <label for="name"><span class="h6">Category Name</span><span
                                 class="text-danger">*</span></label>
                         <input type="text" name="name" id="nameUpdate" class="form-control px-4">
                         <input type="hidden" id="updateId">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" id="update-modal-close" class="btn text-light bg-danger btn-sm px-4"
                     data-bs-dismiss="modal">Cancel</button>
                 <button type="button" id="update-btn" class="btn text-light bg-success btn-sm px-4">Update</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     async function FillUpUpdateForm(id) {
         document.getElementById("updateId").value = id;
        //  showLoader();
         let res = await axios.post('/category-by-id', {id: id});
        //  hideLoader();
         if (res.status === 200) {
              document.getElementById("nameUpdate").value = res.data['name'];
         }else{
            errorToast("Category is not found")
         }
     }

     async function updateCategory() {
         let CategoryName = document.getElementById("nameUpdate").value;
         let updateId = document.getElementById("updateId").value;
         if (CategoryName.length === 0) {
             errorToast("Category name is required!");
         } else {
             document.getElementById("update-modal-close").click();
             showLoader();
             let res = await axios.post('/update-category', {
                 name: CategoryName,
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
