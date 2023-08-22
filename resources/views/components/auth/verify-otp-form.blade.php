<h4 class="text-uppercase text-muted pt-3 pb-2">Enter Your OTP</h4>
<form>
    <div class="form-group mb-3">
        <label for="code">4 Digit code enter here</label>
        <input type="number" name="otp" id="otp" class="form-control py-1 px-4" placeholder="Code">
    </div>
    <button type="button" onclick="VerifyEmail()" class="btn w-100 text-uppercase text-light button">send</button>
</form>

<script>
    async function VerifyEmail() {
        let otp = document.getElementById("otp").value;

        if (otp.length !== 4) {
            errorToast("Invalid OTP");
        } else {
            showLoader();
            const res = await axios.post("/verify-otp", {
                otp: otp,
                email: sessionStorage.getItem('email')
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = "/resetPassword";
                }, 1000);
            } else {
                errorToast(res.data['message']);
            }
        }
    }
</script>
