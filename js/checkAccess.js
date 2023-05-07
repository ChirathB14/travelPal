function checkAccess(isIndex) {
  var x = document.getElementById("profile");
  var y = document.getElementById("login");
  var z = document.getElementById("register");
  var j = document.getElementById("logout");

  // y.style.display = 'none'
  // z.style.display = 'none'
  // x.style.display = 'none'
  // j.style.display = 'none'

  let user = getCookie('user')
  if (user !== undefined && user !== null && user.length > 0) {
    y.style.display = 'none'
    z.style.display = 'none'
    x.style.display = 'display'
    j.style.display = 'display'

    // checkUserType()
  }
  else {
    y.style.display = 'display'
    z.style.display = 'display'
    x.style.display = 'none'
    j.style.display = 'none'
    if (!isIndex) {
      window.location = "../../index.php"

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

function logOut() {
    var txt;
    if (confirm("Are You Sure, \n Do You Want To Logout?")) {
        delete_cookie('user')
        window.location.reload()

    }
}

function delete_cookie(name) {
    document.cookie = name + '=; Path=/;';
}

function onDeleteSuccess() {
    alert("Deleted Success")
    delete_cookie('user')
    window.location = "../../index.php"
}

function onItemDelete() {
    alert("Deleted Success")
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