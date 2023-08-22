<div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content modal-content_add_product" id="add-product-form">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <div class="form-group mb-2 text-secondary">
                    <label for="productId">Product ID *</label>
                    <input type="text" id="PId" class="form-control px-4 py-2 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-danger-rgb), .25)">
                </div>
                <div class="form-group mb-2 text-secondary">
                    <label for="product_name">Product Name *</label>
                    <input type="text" id="PName" class="form-control px-4 py-2 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-danger-rgb), .25)">
                </div>
                <div class="form-group mb-2 text-secondary">
                    <label for="product_price">Product Price *</label>
                    <input type="text" id="PPrice" class="form-control px-4 py-2 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-danger-rgb), .25)">
                </div>
                <div class="form-group mb-2 text-secondary">
                    <label for="product_qty">Product Qty *</label>
                    <input type="text" id="PQty" class="form-control px-4 py-2 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-danger-rgb), .25)">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm rounded-3 px-4 text-uppercase fw-semibold" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="add()" class="btn btn-success btn-sm rounded-3 px-4 text-uppercase fw-semibold">Add</button>
            </div>
        </form>
    </div>
</div>
