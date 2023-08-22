const linePreloader = document.getElementById("linePreloader");
const loaderLoadingOverlay = document.getElementById("loaderLoadingOverlay");
const navbar = document.getElementById("navbar");

function showLoader() {
    // console.log(linePreloader);
    linePreloader.classList.remove("d-none");
    loaderLoadingOverlay.classList.remove("d-none");
    navbar.classList.add("navbar_disable");
}
function hideLoader() {
    linePreloader.classList.add("d-none");
    loaderLoadingOverlay.classList.add("d-none");
    navbar.classList.remove("navbar_disable");
}

function successToast(msg) 
{
    Toastify({
        gravity: "bottom",
        position: "center",
        text: msg,
        className: "mb-5",
        style: {
            background: "green"
        },
        // duration: 3000

    }).showToast();
}

function errorToast(msg) 
{
    Toastify({
        gravity: "bottom",
        position: "center",
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        },
        // duration: 3000

    }).showToast();
}
