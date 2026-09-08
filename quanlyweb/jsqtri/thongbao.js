function showSuccessMessage(message, redirectUrl = null) {
    Swal.fire({
        title: "Thành công!",
        text: message,
        icon: "success",
        confirmButtonText: "OK"
    }).then((result) => {
        if (result.isConfirmed && redirectUrl) {
            window.location = redirectUrl;
        }
    });
}

function showErrorMessage(message) {
    Swal.fire({
        title: "Lỗi!",
        text: message,
        icon: "error",
        confirmButtonText: "OK"
    });
}
