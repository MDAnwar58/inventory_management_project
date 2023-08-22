 <!-- Modal -->
 <div class="modal fade" id="create-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Create Product</h1>
                 <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body px-5 pb-4">
                 <form action="" id="save-form">
                     <div class="form-group">
                         <label for="name">Category</label>
                         <select type="text" id="ProductCategory" class="form-control px-4 mt-1">
                             <option value="">(Select Category)</option>
                         </select>
                     </div>
                     <div class="form-group mt-2">
                         <label for="name">Name</label>
                         <input type="text" id="ProductName" class="form-control px-4 mt-1">
                     </div>
                     <div class="form-group mt-2">
                         <label for="price">Price</label>
                         <input type="number" id="ProductPrice" class="form-control px-4 mt-1">
                     </div>
                     <div class="form-group mt-2">
                         <label for="unit">Unit</label>
                         <input type="number" id="ProductUnit" class="form-control px-4 mt-1">
                     </div>
                     <div class="d-block mt-4">
                         <img id="imgOutput" src="{{ url('images/file.png') }}" style="width: 150px; height: 150px;"
                             alt="">
                         <div class="form-group">
                             <label for="image">Image</label>
                             <input type="file" oninput="imgOutput.src=window.URL.createObjectURL(this.files[0])"
                                 id="Image" class="form-control img">
                         </div>
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
     //  function ImgPreveiw() {
     //      let imgInput = document.querySelector(".img");
     //      let imgOutput = document.getElementById("imgOutput");
     //      const [file] = imgInput.files
     //      console.log(file);
     //      if (file) {
     //          imgOutput.src = URL.createObjectURL(file)
     //      }
     //  }
     FillCategoryDropDown();
     async function FillCategoryDropDown() {
         let res = await axios.get('/list-category');
         res.data.forEach((category, i) => {
             let option = `<option value="${category['id']}">${category['name']}</option>`;
             $('#ProductCategory').append(option);
         });
     }

     async function productCategory() {
         let ProductCategory = document.getElementById("ProductCategory").value;
         let ProductName = document.getElementById("ProductName").value;
         let ProductPrice = document.getElementById("ProductPrice").value;
         let ProductUnit = document.getElementById("ProductUnit").value;
         let ProductImage = document.getElementById("Image").files[0];


         if (ProductCategory.length === 0) {
             errorToast("Product category is required!");
         } else if (ProductName.length === 0) {
             errorToast("Product name is required!");
         } else if (ProductPrice.length === 0) {
             errorToast("Product price is required!");
         } else if (ProductUnit.length === 0) {
             errorToast("Product unit is required!");
         } else if (!ProductImage) {
             errorToast("Product image is required!");
         } else {
             document.getElementById("modal-close").click();
             let formData = new FormData();
             formData.append('name', ProductName);
             formData.append('price', ProductPrice);
             formData.append('unit', ProductUnit);
             formData.append('category_id', ProductCategory);
             formData.append('img', ProductImage);

              const config = {
                  headers: {
                      'content-type': 'multipart/form-data'
                  }
              }

             showLoader();
             let res = await axios.post('/create-product', formData, config);
             hideLoader();
             //  console.log(ProductImage.name);
             console.log(res);
             if (res.status === 201) {
                 successToast("Product added successfully!");
                 document.getElementById("save-form").reset();
                 document.getElementById("imgOutput").src = "{{ url('images/file.png') }}";
                 await getList();
             } else {
                 errorToast("Request fail!");
             }
         }
     }
     document.getElementById("save-btn").addEventListener("click", productCategory);
 </script>
