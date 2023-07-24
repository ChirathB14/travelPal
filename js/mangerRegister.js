function reFunction() {
    var x = document.getElementById("rePass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  
  function cheakpassword() {
    if (document.getElementById("Pass").value != document.getElementById("rePass").value) {
      swal.fire({
        title: "Passwords Are mismatched!",
        text: "Please try again",
        icon: "error",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
      });
      // alert("Passwords Are mismatched");
      return false;
    }
    else {
      return true;
    }
  }
  
  
  function success() {
    swal.fire({
      title: "Manager added Successfully!",
      text: "Welcome to TravelPal",
      icon: "success",
      confirmButtonText: "OK",
      confirmButtonColor: "var(--primarycolor)",
      footer: "TravelPal"
    });
    // alert("Manager added Successfully")
    window.location = './AdminViewManager.php'
  }

  function onUpdateSuccessManager () {
    swal.fire({
      title: "Updated Successfully!",
      text: "",
      icon: "success",
      confirmButtonText: "OK",
      confirmButtonColor: "var(--primarycolor)",
      footer: "TravelPal"
    });
    // alert("Updated Successfully")
    window.location = './AdminViewManager.php'

}