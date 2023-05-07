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

function checkUserAccess() {
    let VIEW_PARD_TOURS = document.getElementById("VIEW_PARD_TOURS")
    let ADMIN_SITE_MANAGER = document.getElementById('ADMIN_SITE_MANAGER')
    let ADMIN_TOURIST = document.getElementById("ADMIN_TOURIST")
    let ADMIN_ACCOMMODATION_PROVIDER = document.getElementById('ADMIN_ACCOMMODATION_PROVIDER')
    let ADMIN_VEHICLE_PROVIDER = document.getElementById("ADMIN_VEHICLE_PROVIDER")
    let ADMIN_TOURIST_GUIDE = document.getElementById('ADMIN_TOURIST_GUIDE')
    let MANAGER_CREATE_NEW_PLAN = document.getElementById('MANAGER_CREATE_NEW_PLAN')
    let ACCOMADATION_PROVIDER_SERVICE = document.getElementById('ACCOMADATION_PROVIDER_SERVICE')
    let VIEW_VEHICLE_SERVICE = document.getElementById('VIEW_VEHICLE_SERVICE')
    let VIEW_GUIDE_SERVICE = document.getElementById('VIEW_GUIDE_SERVICE')
    let MANAGER_VIEW_ACCOMADATION = document.getElementById('MANAGER_VIEW_ACCOMADATION')
    let MANAGER_VIEW_VEHICLE = document.getElementById('MANAGER_VIEW_VEHICLE')
    let MANAGER_VIEW_GUIDE = document.getElementById('MANAGER_VIEW_GUIDE')
    let VIEW_AVAILABILITY = document.getElementById('VIEW_AVAILABILITY')



    let user = getCookie('user')
    if (user) {
        switch (Number(JSON.parse(user).user_type)) {
            case 1: //admin
                //! Admin tabs
                ADMIN_SITE_MANAGER.style.display = 'display'
                ADMIN_ACCOMMODATION_PROVIDER.style.display = 'display'
                ADMIN_TOURIST.style.display = 'display'
                ADMIN_VEHICLE_PROVIDER.style.display = 'display'
                ADMIN_TOURIST_GUIDE.style.display = 'display'

                //! Tourist tabs
                VIEW_PARD_TOURS.style.display = 'none'

                //! Manager tabs
                MANAGER_CREATE_NEW_PLAN.style.display = 'none'
                MANAGER_VIEW_ACCOMADATION.style.display = 'none'
                MANAGER_VIEW_VEHICLE.style.display = 'none'
                MANAGER_VIEW_GUIDE.style.display = 'none'

                //! Service Proiders tabs
                ACCOMADATION_PROVIDER_SERVICE.style.display = 'none'
                VIEW_VEHICLE_SERVICE.style.display = 'none'
                VIEW_GUIDE_SERVICE.style.display = 'none'
                VIEW_AVAILABILITY.style.display = 'none'

                break;
            case 2: //Manager
                //! Admin tabs
                ADMIN_SITE_MANAGER.style.display = 'none'
                ADMIN_ACCOMMODATION_PROVIDER.style.display = 'none'
                ADMIN_TOURIST.style.display = 'none'
                ADMIN_VEHICLE_PROVIDER.style.display = 'none'
                ADMIN_TOURIST_GUIDE.style.display = 'none'

                //! Tourist tabs
                VIEW_PARD_TOURS.style.display = 'none'

                //! Manager tabs
                MANAGER_CREATE_NEW_PLAN.style.display = 'display'
                MANAGER_VIEW_ACCOMADATION.style.display = 'display'
                MANAGER_VIEW_VEHICLE.style.display = 'display'
                MANAGER_VIEW_GUIDE.style.display = 'display'

                //! Service Proiders tabs
                ACCOMADATION_PROVIDER_SERVICE.style.display = 'none'
                VIEW_VEHICLE_SERVICE.style.display = 'none'
                VIEW_GUIDE_SERVICE.style.display = 'none'
                VIEW_AVAILABILITY.style.display = 'none'
                break;
            case 3: //Tourist
                //! Admin tabs
                ADMIN_SITE_MANAGER.style.display = 'none'
                ADMIN_ACCOMMODATION_PROVIDER.style.display = 'none'
                ADMIN_TOURIST.style.display = 'none'
                ADMIN_VEHICLE_PROVIDER.style.display = 'none'
                ADMIN_TOURIST_GUIDE.style.display = 'none'

                //! Tourist tabs
                VIEW_PARD_TOURS.style.display = 'display'

                //! Manager tabs
                MANAGER_CREATE_NEW_PLAN.style.display = 'none'
                MANAGER_VIEW_ACCOMADATION.style.display = 'none'
                MANAGER_VIEW_VEHICLE.style.display = 'none'
                MANAGER_VIEW_GUIDE.style.display = 'none'

                //! Service Proiders tabs
                ACCOMADATION_PROVIDER_SERVICE.style.display = 'none'
                VIEW_VEHICLE_SERVICE.style.display = 'none'
                VIEW_GUIDE_SERVICE.style.display = 'none'
                VIEW_AVAILABILITY.style.display = 'none'
                break;
            case 4: //Service Provider
                //! Admin tabs
                ADMIN_SITE_MANAGER.style.display = 'none'
                ADMIN_ACCOMMODATION_PROVIDER.style.display = 'none'
                ADMIN_TOURIST.style.display = 'none'
                ADMIN_VEHICLE_PROVIDER.style.display = 'none'
                ADMIN_TOURIST_GUIDE.style.display = 'none'

                //! Tourist tabs
                VIEW_PARD_TOURS.style.display = 'none'

                //! Manager tabs
                MANAGER_CREATE_NEW_PLAN.style.display = 'none'
                MANAGER_VIEW_ACCOMADATION.style.display = 'none'
                MANAGER_VIEW_VEHICLE.style.display = 'none'
                MANAGER_VIEW_GUIDE.style.display = 'none'

                //! Service Proiders tabs
                ACCOMADATION_PROVIDER_SERVICE.style.display = 'display'
                VIEW_VEHICLE_SERVICE.style.display = 'display'
                VIEW_GUIDE_SERVICE.style.display = 'display'
                VIEW_AVAILABILITY.style.display = 'display'
                break;
            default:
                ADMIN_SITE_MANAGER.style.display = 'none'
                VIEW_PARD_TOURS.style.display = 'none'
                break;
        }
    } else {
        window.location = "../../index.php"
    }
}


function onUpdateSuccess() {
    alert("Updated Successfully")
    window.location = './Profile.php'
}

function newPlanCreated() {
    alert("New Plan Created Successfully")
    window.location.replace('./ManagerNewPlan.php')
}

function onUpdate(user_Id) {
    if (user_Id !== undefined && user_Id !== null && String(user_Id).length > 0) {

        setCookie("UserID", user_Id)
        window.location = './UpdateManager.php'
    }
}

function setCookie(cname, cvalue) {
    const d = new Date();
    d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

