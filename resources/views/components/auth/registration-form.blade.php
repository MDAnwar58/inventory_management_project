<h4 class="text-uppercase text-muted pt-3 pb-1">sign up</h4>
<hr>
<form>
    <div class="row">
        <div class="col-lg-4">
            <label for="email">Email Address</label>
            <div class="form-group mb-3">
                <input type="email" name="email" id="email" class="form-control py-1 px-4" placeholder="User Email">
            </div>
        </div>
        <div class="col-lg-4">
            <label for="firstName">First Name</label>
            <div class="form-group mb-3">
                <input type="text" name="firstName" id="firstName" class="form-control py-1 px-4"
                    placeholder="First Name">
            </div>
        </div>
        <div class="col-lg-4">
            <label for="lastName">Last Name</label>
            <div class="form-group mb-3">
                <input type="text" name="lastName" id="lastName" class="form-control py-1 px-4"
                    placeholder="Last Name">
            </div>
        </div>
        <div class="col-lg-4">
            <label for="mobile">Moblie</label>
            <div class="form-group mb-3">
                <input type="number" name="phone" id="phone" class="form-control py-1 px-4" placeholder="Moblie">
            </div>
        </div>
        <div class="col-lg-4">
            <label for="password">Password</label>
            <div class="form-group mb-3">
                <input type="password" name="password" id="password" class="form-control py-1 px-4"
                    placeholder="User Password">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <button type="button" onclick="SubmitRegistration()"
                class="btn w-100 text-uppercase text-light button">sign up</button>
        </div>
    </div>
</form>

<script>
    async function SubmitRegistration() {
        let firstName = document.getElementById("firstName").value,
            lastName = document.getElementById("lastName").value,
            email = document.getElementById("email").value,
            phone = document.getElementById("phone").value,
            password = document.getElementById("password").value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (firstName.length === 0) {
            errorToast("Frist Name is required");
        } else if (lastName.length === 0) {
            errorToast("Last Name is required");
        } else if (phone.length === 0) {
            errorToast("Mobile is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            showLoader();
            const res = await axios.post("/user-registration", {
                email: email,
                firstName: firstName,
                lastName: lastName,
                phone: phone,
                password: password
            });
            hideLoader();
            console.log(res);
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/userLogin";
                }, 2000);
            }else {
                errorToast("Registration Failed!");
            }
        }
    }
</script>
