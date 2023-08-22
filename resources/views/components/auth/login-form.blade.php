<h4 class="text-uppercase text-muted pt-3 pb-2">sign in</h4>
<form>
    <div class="form-group mb-3">
        <input type="email" name="email" id="email" class="form-control py-1 px-4" placeholder="User Email">
    </div>
    <div class="form-group mb-3">
        <input type="password" name="password" id="password" class="form-control py-1 px-4" placeholder="User Password">
    </div>
    <button type="button" onclick="SubmitLogin()" class="btn w-100 text-uppercase text-light button">sign
        in</button>
    <hr>
    <div class="form-group text-end fs-6 fw-bloder">
        <span class="text-capitalize"><a href="{{ url('userRegistration') }}"
                class="text-muted text-decoration-none">sign up</a></span>
        <span class="text-muted">|</span>
        <span class="text-capitalize ms-2"><a href="{{ url('sendOTP') }}" class="text-muted text-decoration-none">forget
                password</a></span>
    </div>
</form>

<script>
    async function SubmitLogin()
    {
        let email = document.getElementById("email").value,
        password = document.getElementById("password").value;
        
        if (email.length === 0) {
            errorToast("Email is required");
        }else if (password.length === 0) {
            errorToast("Password is required");
        }else{
            showLoader();
            const res = await axios.post("/user-login", {email:email,password:password});
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                window.location.href = "/dashboard";
            }else {
                errorToast(res.data['message']);
            }
        }
    }
</script>
