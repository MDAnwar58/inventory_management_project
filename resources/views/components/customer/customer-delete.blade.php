<div class="modal" tabindex="-1" id="customer-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">Delete !</h3>
                <p class="md-3">Once delete, you can't get it back.</p>
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn bg-secondary text-light"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="customerDelete()" class="btn bg-danger text-light">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function customerDelete() {
        let id = document.getElementById("deleteId").value;
        document.getElementById("delete-modal-close").click();
        document.getElementById("modal-close").click();
        showLoader();
        let res = await axios.post('/delete-customer', {
            id: id
        });
        hideLoader();
        if (res.data === 1) {
            successToast("Request complete!");
            await getList();
        } else {
            errorToast("Request failed!");
        }
    }
</script>