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
    alert("Passwords Are mismatched");
    return false;
  }
  else {
    return true;
  }
}


function success() {
  alert("Register Successfully")
  window.location = './login.php'
}