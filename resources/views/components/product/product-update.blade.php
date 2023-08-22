 <!-- Modal -->
 <div class="modal fade" id="update-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4">
                 <form action="" id="update-form">
                    <input type="hidden" id="updateId">
                    <input type="hidden" id="filePath">
                     <div class="form-group">
                         <label for="updateProductCategory">Category</label>
                         <select type="text" id="updateProductCategory" class="form-control px-4 mt-1">
                             <option value="">(Select Category)</option>
                         </select>
                     </div>
                     <div class="form-group mt-2">
                         <label for="name">Name</label>
                         <input type="text" id="updateProductName" class="form-control px-4 mt-1">
                     </div>
                     <div class="form-group mt-2">
                         <label for="price">Price</label>
                         <input type="number" id="updateProductPrice" class="form-control px-4 mt-1">
                     </div>
                     <div class="form-group mt-2">
                         <label for="unit">Unit</label>
                         <input type="number" id="updateProductUnit" class="form-control px-4 mt-1">
                     </div>
                     <div class="d-block mt-4">
                         <img id="updateImgOutput" src="{{ url('images/file.png') }}" style="width: 150px; height: 150px;"
                             alt="">
                         <div class="form-group">
                             <label for="image">Image</label>
                             <input type="file" oninput="updateImgOutput.src=window.URL.createObjectURL(this.files[0])"
                                 id="updateImage" class="form-control img">
                         </div>
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
     async function SelectFillCategoryDropDown() {
         let res = await axios.get('/list-category');
         res.data.forEach((category, i) => {
             let option = `<option value="${category['id']}">${category['name']}</option>`;
             $('#updateProductCategory').append(option);
         });
     }
     async function FillUpUpdateForm(id, path) {
         let updateProductCategory = document.getElementById("updateProductCategory");
         let updateProductName = document.getElementById("updateProductName");
         let updateProductPrice = document.getElementById("updateProductPrice");
         let updateProductUnit = document.getElementById("updateProductUnit");

         document.getElementById("updateId").value = id;
         document.getElementById("filePath").value = path;
         document.getElementById("updateImgOutput").src = path;
         //  showLoader();
         await SelectFillCategoryDropDown();
         let res = await axios.post('/product-by-id', {
             id: id
         });
         //  hideLoader();
         if (res.status === 200) {
         updateProductName.value = res.data['name'];
         updateProductPrice.value = res.data['price'];
         updateProductUnit.value = res.data['unit'];
         updateProductCategory.value = res.data['category_id'];
         } else {
             errorToast("Category is not found");
         }
     }

     async function productUpdate() {
         let updateProductCategory = document.getElementById("updateProductCategory").value;
         let updateProductName = document.getElementById("updateProductName").value;
         let updateProductPrice = document.getElementById("updateProductPrice").value;
         let updateProductUnit = document.getElementById("updateProductUnit").value;
         let updateProductImage = document.getElementById("updateImage").files[0];
         let updateId = document.getElementById("updateId").value;
         let filePath = document.getElementById("filePath").value;


         if (updateProductCategory.length === 0) {
             errorToast("Product category is required!");
         } else if (updateProductName.length === 0) {
             errorToast("Product name is required!");
         } else if (updateProductPrice.length === 0) {
             errorToast("Product price is required!");
         } else if (updateProductUnit.length === 0) {
             errorToast("Product unit is required!");
         } else {
             document.getElementById("update-modal-close").click();

             let formData = new FormData();
             formData.append('id', updateId);
             formData.append('name', updateProductName);
             formData.append('price', updateProductPrice);
             formData.append('unit', updateProductUnit);
             formData.append('category_id', updateProductCategory);
             formData.append('img', updateProductImage);
             formData.append('file_path', filePath);

              const config = {
                  headers: {
                      'content-type': 'multipart/form-data'
                  }
              }


             showLoader();
             let res = await axios.post('/update-product', formData, config);
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
     document.getElementById("update-btn").addEventListener("click", productUpdate);
 </script>
