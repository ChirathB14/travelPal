function checkAccess(isIndex) {
  var profile = document.getElementById("profile");
  var login = document.getElementById("login");
  var register = document.getElementById("register");
  var logout = document.getElementById("logout");

  // y.style.display = 'none'
  // z.style.display = 'none'
  // x.style.display = 'none'
  // j.style.display = 'none'

  let user = getCookie('user')
  if (user !== undefined && user !== null && user.length > 0) {
    profile.style.display = 'display'
    login.style.display = 'display'
    register.style.display = 'none'
    logout.style.display = 'none'
    
    // checkUserType()
  }
  else {
    profile.style.display = 'none'
    login.style.display = 'none'
    register.style.display = 'display'
    logout.style.display = 'display'
    if (!isIndex) {
      swal.fire ({
        title: "Please Login To Continue!",
        text: "",
        icon: "error",
        confirmButtonText: "OK",
        confirmButtonColor: "var(--primarycolor)",
        footer: "TravelPal"
      });
      // alert("Please Login To Continue")
      window.location = "../index.php"

    }
  }

}

function loginRegisterAccess() {
  let user = getCookie('user')
  if(user){
    window.location = "../../index.php"
  }
}

function checkTypeAccess() {
  var x = document.getElementById("noAccess");
  var y = document.getElementById("login");
  var z = document.getElementById("portal");

  let user = getCookie('user')
  if (user !== undefined && user !== null && user.length > 0 && JSON.parse(user).user_type === "2") {
    y.style.display = 'display'
    x.style.display = 'none'
    z.style.display = 'display'
    // checkUserType()
  }
  else {
    y.style.display = 'none'
    x.style.display = 'display'
    z.style.display = 'none'
    window.location = '../../index.php'
  }

}

// function logOut() {
//     var txt;
//     if (confirm("Are You Sure,\nDo You Want To Logout?")) {
//         delete_cookie('user')
//         window.location.reload()
//     }
// }

function logOut() {
  swal.fire ({
    title: "Are You Sure, Do You Want To Logout?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    confirmButtonColor: "var(--primarycolor)",
    cancelButtonText: "No",
    cancelButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
  }).then((result) => {
    if (result.isConfirmed) {
      delete_cookie('user')
      window.location.reload()
    }
  })
}

function delete_cookie(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;Path=/;';
}

function onDeleteSuccess() {
  swal.fire ({
    title: "Deleted Successfully! ",
    text: "You will be redirected to Home page.",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
  });
    // alert("Deleted Success")
    delete_cookie('user')
    window.location = "../../index.php"
}

function onItemDelete() {
  swal.fire ({
    title: "Deleted Successfully! ",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
  });
    // alert("Deleted Success")
    window.location.reload()
}

function getCookie(name) {
  // Split cookie string and get all individual name=value pairs in an array
  var cookieArr = document.cookie.split(";");

  // Loop through the array elements
  for (var i = 0; i < cookieArr.length; i++) {
    var cookiePair = cookieArr[i].split("=");

    /* Removing whitespace at the beginning of the cookie name
    and compare it with the given string */
    if (name == cookiePair[0].trim()) {
      // Decode the cookie value and return
      return decodeURIComponent(cookiePair[1]);
    }
  }

  // Return null if not found
  return null;
}

function showPw() {
  var x = document.getElementById("Pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}