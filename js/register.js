<script src="sweetalert2.all.min.js"></script>

function showPw() {
  var x = document.getElementById("Pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function cheakpassword() {
  if (document.getElementById("Pass").value != document.getElementById("rePass").value) {
    Swal.fire({
      title: "Passwords Are mismatched!",
      text: "Please try again",
      icon: "error",
      confirmButtonText: "OK"
      })
    // alert("Passwords Are mismatched");
    return false;
  }
  else {
    return true;
  }
}


function success() {
  Swal.fire({
    title: "Register Successfully!",
    text: "Welcome to TravelPal",
    icon: "success",
    confirmButtonText: "OK"
    })
  // alert("Register Successfully")
  window.location = './login.php'
}