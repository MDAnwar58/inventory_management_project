<h4 class="text-uppercase text-muted pt-3 pb-2">Email Address</h4>
<form>
    <div class="form-group mb-3">
        <label for="email">Your email address</label>
        <input type="email" name="email" id="email" class="form-control py-1 px-4" placeholder="User Email">
    </div>
    <button type="button" onclick="VerifyEmail()" class="btn w-100 text-uppercase text-light button">send</button>
</form>

<script>
    async function VerifyEmail()
    {
        let email = document.getElementById("email").value;
        
        if (email.length === 0) {
            errorToast("Email is required");
        }else{
            showLoader();
            const res = await axios.post("/send-otp", {email:email});
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                sessionStorage.setItem('email', email);
                setTimeout(() => {
                    window.location.href = "/verifyOTP";
                }, 1000);
            }else {
                errorToast(res.data['message']);
            }
        }
    }
</script>