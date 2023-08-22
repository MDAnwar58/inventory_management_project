const linePreloader = document.getElementById("linePreloader");
const loaderLoadingOverlay = document.getElementById("loaderLoadingOverlay");

function showLoader() {
    linePreloader.classList.remove("d-none");
    loaderLoadingOverlay.classList.remove("d-none");
}
function hideLoader() {
    linePreloader.classList.add("d-none");
    loaderLoadingOverlay.classList.add("d-none");
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
