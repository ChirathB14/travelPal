// function logOut() {
//   if (confirm("Are You Sure,\nDo You Want To Logout?")) {
//     delete_cookie("user");
//     window.location = "/travelPal/index.php";
//   }
// }

function logOut() {
  Swal.fire({
    title: "Are You Sure, Do You Want To Logout? ",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, Logout!",
    confirmButtonColor: "var(--primarycolor)",
    cancelButtonText: "No!",
    cancelButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
    }).then((result) => {
      if (result.isConfirmed) {
        delete_cookie("user");
        window.location = "/travelPal/index.php";
      }
    }
  )
}

function onResetSuccess() {
  Swal.fire({
    title: "Password Reset Successfully! ",
    text: "You will be redirected to login page.",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
    })
  // alert("Password Reset Successfully!");
  window.location = "../login.php";
}

function onError(msg, page) {
  alert(msg);
  window.location = page;
}

function onErrorBack(msg) {
  alert(msg);
  history.back();
}

function gotToPreviousPage() {
  history.back();
}

function delete_cookie(name) {
  document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;Path=/;";
}

function onDeleteSuccess() {
  Swal.fire({
    title: "Deleted Successfully! ",
    text: "You will be redirected to Home page.",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
    })
  // alert("Deleted Success");
  delete_cookie("user");
  window.location = "../../index.php";
}

function onItemDelete() {
  Swal.fire({
    title: "Deleted Successfully! ",
    text: "You will be redirected to Home page.",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
    })
  // alert("Deleted Success");
  window.location.reload();
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

function checkUserAccess() {
  let VIEW_PARD_TOURS = document.getElementById("VIEW_PARD_TOURS");
  let ADMIN_SITE_MANAGER = document.getElementById("ADMIN_SITE_MANAGER");
  let ADMIN_USER = document.getElementById("ADMIN_USER");
  let ADMIN_TOURIST = document.getElementById("ADMIN_TOURIST");
  let ADMIN_ACCOMMODATION_PROVIDER = document.getElementById("ADMIN_ACCOMMODATION_PROVIDER");
  let ADMIN_VEHICLE_PROVIDER = document.getElementById("ADMIN_VEHICLE_PROVIDER");
  let ADMIN_TOURIST_GUIDE = document.getElementById("ADMIN_TOURIST_GUIDE");
  let MANAGER_CREATE_NEW_PLAN = document.getElementById("MANAGER_CREATE_NEW_PLAN");
  let ACCOMADATION_PROVIDER_SERVICE = document.getElementById("ACCOMADATION_PROVIDER_SERVICE");
  let VIEW_VEHICLE_SERVICE = document.getElementById("VIEW_VEHICLE_SERVICE");
  let VIEW_GUIDE_SERVICE = document.getElementById("VIEW_GUIDE_SERVICE");
  let MANAGER_VIEW_ACCOMADATION = document.getElementById("MANAGER_VIEW_ACCOMADATION");
  let MANAGER_VIEW_VEHICLE = document.getElementById("MANAGER_VIEW_VEHICLE");
  let MANAGER_VIEW_GUIDE = document.getElementById("MANAGER_VIEW_GUIDE");
  let VIEW_AVAILABILITY = document.getElementById("VIEW_AVAILABILITY");
  let VIEW_BOOKINGS = document.getElementById("VIEW_BOOKINGS");
  let DASHBOARD = document.getElementById("DASHBOARD");

  let user = getCookie("user");
  if (user) {
    switch (Number(JSON.parse(user).user_type)) {
      case 1: //admin
        //! Admin tabs
        ADMIN_SITE_MANAGER.style.display = "display";
        ADMIN_USER.style.display = "display";
        ADMIN_ACCOMMODATION_PROVIDER.style.display = "display";
        ADMIN_TOURIST.style.display = "display";
        ADMIN_VEHICLE_PROVIDER.style.display = "display";
        ADMIN_TOURIST_GUIDE.style.display = "display";

        //! Tourist tabs
        VIEW_PARD_TOURS.style.display = "none";

        //! Manager tabs
        MANAGER_CREATE_NEW_PLAN.style.display = "none";
        MANAGER_VIEW_ACCOMADATION.style.display = "none";
        MANAGER_VIEW_VEHICLE.style.display = "none";
        MANAGER_VIEW_GUIDE.style.display = "none";
        DASHBOARD.style.display = "none";

        //! Service Proiders tabs
        ACCOMADATION_PROVIDER_SERVICE.style.display = "none";
        VIEW_VEHICLE_SERVICE.style.display = "none";
        VIEW_GUIDE_SERVICE.style.display = "none";
        VIEW_AVAILABILITY.style.display = "none";
        VIEW_BOOKINGS.style.display = "none";
        break;

      case 2: //Manager
        //! Admin tabs
        ADMIN_SITE_MANAGER.style.display = "none";
        ADMIN_USER.style.display = "none";
        ADMIN_ACCOMMODATION_PROVIDER.style.display = "none";
        ADMIN_TOURIST.style.display = "none";
        ADMIN_VEHICLE_PROVIDER.style.display = "none";
        ADMIN_TOURIST_GUIDE.style.display = "none";

        //! Tourist tabs
        VIEW_PARD_TOURS.style.display = "none";

        //! Manager tabs
        MANAGER_CREATE_NEW_PLAN.style.display = "display";
        MANAGER_VIEW_ACCOMADATION.style.display = "display";
        MANAGER_VIEW_VEHICLE.style.display = "display";
        MANAGER_VIEW_GUIDE.style.display = "display";
        DASHBOARD.style.display = "display";

        //! Service Proiders tabs
        ACCOMADATION_PROVIDER_SERVICE.style.display = "none";
        VIEW_VEHICLE_SERVICE.style.display = "none";
        VIEW_GUIDE_SERVICE.style.display = "none";
        VIEW_AVAILABILITY.style.display = "none";
        VIEW_BOOKINGS.style.display = "none";
        break;

      case 3: //Tourist
        //! Admin tabs
        ADMIN_SITE_MANAGER.style.display = "none";
        ADMIN_USER.style.display = "none";
        ADMIN_ACCOMMODATION_PROVIDER.style.display = "none";
        ADMIN_TOURIST.style.display = "none";
        ADMIN_VEHICLE_PROVIDER.style.display = "none";
        ADMIN_TOURIST_GUIDE.style.display = "none";

        //! Tourist tabs
        VIEW_PARD_TOURS.style.display = "display";

        //! Manager tabs
        MANAGER_CREATE_NEW_PLAN.style.display = "none";
        MANAGER_VIEW_ACCOMADATION.style.display = "none";
        MANAGER_VIEW_VEHICLE.style.display = "none";
        MANAGER_VIEW_GUIDE.style.display = "none";
        DASHBOARD.style.display = "none";

        //! Service Proiders tabs
        ACCOMADATION_PROVIDER_SERVICE.style.display = "none";
        VIEW_VEHICLE_SERVICE.style.display = "none";
        VIEW_GUIDE_SERVICE.style.display = "none";
        VIEW_AVAILABILITY.style.display = "none";
        VIEW_BOOKINGS.style.display = "none";
        break;

      case 4: //Service Provider
        //! Admin tabs
        ADMIN_SITE_MANAGER.style.display = "none";
        ADMIN_USER.style.display = "none";
        ADMIN_ACCOMMODATION_PROVIDER.style.display = "none";
        ADMIN_TOURIST.style.display = "none";
        ADMIN_VEHICLE_PROVIDER.style.display = "none";
        ADMIN_TOURIST_GUIDE.style.display = "none";

        //! Tourist tabs
        VIEW_PARD_TOURS.style.display = "none";

        //! Manager tabs
        MANAGER_CREATE_NEW_PLAN.style.display = "none";
        MANAGER_VIEW_ACCOMADATION.style.display = "none";
        MANAGER_VIEW_VEHICLE.style.display = "none";
        MANAGER_VIEW_GUIDE.style.display = "none";
        DASHBOARD.style.display = "none";

        //! Service Proiders tabs
        ACCOMADATION_PROVIDER_SERVICE.style.display = "display";
        VIEW_VEHICLE_SERVICE.style.display = "display";
        VIEW_GUIDE_SERVICE.style.display = "display";
        VIEW_AVAILABILITY.style.display = "display";
        VIEW_BOOKINGS.style.display = "display";
        break;
      default:
        ADMIN_SITE_MANAGER.style.display = "none";
        VIEW_PARD_TOURS.style.display = "none";
        break;
    }
  } else {
    window.location = "../../index.php";
  }
}

function onUpdateSuccess() {
  // alert("User Details updated!");
  // Swal.fire({
  //   title: "Success!",
  //   text: "User Details updated!",
  //   icon: "success",
  //   confirmButtonText: "Ok",
  //   confirmButtonColor: "var(--primarycolor)",
  //   footer: "TravelPal"  
  // })
window.location = "./Profile.php";
};
    
//  swal({
//    title: "User Details updated!",
//    text: "User details updated successfully!!",
//    icon: "success",
//    buttons: ["No, cancel it!", "Yes, I am sure!"],
//  }).then(function (isConfirm) {
//    if (isConfirm) {
//      swal({
//        title: "Shortlisted!",
//        text: "Candidates are successfully shortlisted!",
//        icon: "success",
//      }).then(function () {
//        navigateToPage("./Profile.php");
//      });
//    } else {
//      swal("Cancelled", "Your imaginary file is safe :)", "error");
//    }
//  });


function newPlanCreated() {
  Swal.fire({
    title: "Success!",
    text: "New Plan Created Successfully! ",
    icon: "success",
    confirmButtonText: "OK",
    confirmButtonColor: "var(--primarycolor)",
    footer: "TravelPal"
    })
  // alert("New Plan Created Successfully");
  window.location.replace("./ManagerNewPlan.php");
}

function onUpdate(user_Id) {
  if (user_Id !== undefined && user_Id !== null && String(user_Id).length > 0) {
    setCookie("UserID", user_Id);
    window.location = "./UpdateManager.php";
  }
}

function setCookie(cname, cvalue) {
  const d = new Date();
  d.setTime(d.getTime() + 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
