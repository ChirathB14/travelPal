function contactSubmitSuccess() {
    swal({
        title: "Your message successfully saved!",
        icon: "success",
        button: "Ok",
    }).then(function () {
        window.location = "./ContactUS.php";
    });
}