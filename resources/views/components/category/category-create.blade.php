 <!-- Modal -->
 <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4">
                 <form action="" id="save-form">
                     <div class="form-group">
                         <label for="name"><span class="h6">Category Name</span><span
                                 class="text-danger">*</span></label>
                         <input type="text" name="name" id="name" class="form-control px-4">
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
         let CategoryName = document.getElementById("name").value;
         if (CategoryName.length === 0) {
             errorToast("Category name is required!");
         } else {
             document.getElementById("modal-close").click();
             showLoader();
             let res = await axios.post('/create-category', {
                name: CategoryName
             });
             hideLoader();

             if (res.status === 201) {
                 successToast("Category added successfully!");
                 document.getElementById("save-form").reset();
                 await getList();
             }else{
                errorToast("Request fail!");
             }
         }
     }
     document.getElementById("save-btn").addEventListener("click", createCategory);
 </script>
