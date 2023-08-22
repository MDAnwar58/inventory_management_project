<h4 class="text-uppercase text-muted pt-3 pb-2">set new password</h4>
<form>
    <div class="form-group mb-3">
        <label for="new-password">New Password</label>
        <input type="password" name="password" id="password" class="form-control py-1 px-4" placeholder="New Password">
    </div>
    <div class="form-group mb-3">
        <label for="confirmation-password">Confirm Password</label>
        <input type="password" name="confirmation-password" id="Cpassword" class="form-control py-1 px-4"
            placeholder="User Password">
    </div>
    <button type="button" onclick="ResetPass()" class="btn w-100 text-uppercase text-light button">Reset</button>
</form>
<script>
    async function ResetPass()
    {
        let password = document.getElementById("password").value,
        Cpassword = document.getElementById("Cpassword").value;
        
        if (password.length === 0) {
            errorToast("Password is required");
        }else if (Cpassword.length === 0) {
            errorToast("Confirm Password is required");
        }else if (password !== Cpassword) {
            errorToast("Password and confirm password must be same");
        }else{
            showLoader();
            const res = await axios.post("/reset-password", {password:password});
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                
                setTimeout(() => {
                    window.location.href = "/userLogin";
                }, 1000);
            }else {
                errorToast(res.data['message']);
            }
        }
    }
</script>