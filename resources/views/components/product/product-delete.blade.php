<div class="modal" tabindex="-1" id="product-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">Delete !</h3>
                <p class="md-3">Once delete, you can't get it back.</p>
                <input type="hidden" id="deleteId">
                <input type="hidden" id="deleteFilePath">
            </div>
            <div class="modal-footer">
                <button type="button" id="product-delete-modal-close" class="btn bg-secondary text-light"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="productDelete()" class="btn bg-danger text-light">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function productDelete() {
        let id = document.getElementById("deleteId").value;
        let deleteFilePath = document.getElementById("deleteFilePath").value;
        // document.getElementById("delete-modal-close").click();
        document.getElementById("product-delete-modal-close").click();
        showLoader();
        let res = await axios.post('/delete-product', {
            id: id,
            file_path: deleteFilePath,
        });
        hideLoader();
        if (res.data === 1) {
            successToast("Request completed!");
            await getList();
        } else {
            errorToast("Request failed!");
        }
    }
</script>
