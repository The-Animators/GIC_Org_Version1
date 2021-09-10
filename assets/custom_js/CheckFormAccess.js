function CheckFormAccess(submenu_permission, submenu_id, url) {
    var submenu_permission_data = submenu_permission.split(",");
    var url = url;
    // alert(submenu_permission_data);
    // alert(submenu_id);

    if (!submenu_permission_data.includes(submenu_id)) {
        // $(location).attr('href', url);
        // window.location.replace("AccessDenied.php");
    }

}

function check(role_permission, submenu_id) {

    var arr = JSON.parse(role_permission);
    var siz = arr.length;

    for (var i = 0; i < siz; i++) {

        var on = arr[i];
        var bb = on[4];

        if (submenu_id == bb) {
            var r = on[0];
            if (r == 0) {
                $("#AddForm").hide();
                // $("#AddForm").attr("style", "display:none;");
            }
            var c = on[1];
            if (c == 0) {
                $("#edit").hide();
                $(".edit").hide();

            }
            var u = on[2];
            if (u == 0) {
                $("#view").hide();
                $(".view").hide();
            }
            var d = on[3];
            if (d == 0) {
                $("#delete").hide();
                $(".delete").hide();
            }
            break;
        }

    }

}

function dateFormate(value) {
    // alert(value);
    var date = value.split("-");

    var day = (date[0]),
        month = (date[1]),
        year = (date[2]);

    year = year.length;
    // if ()
    //     alert(year);
    // if (year)

    if (year < 4) {
        year = (date[0]);
        day = (date[2]);
        if (!$.isNumeric(month)) {
            // alert(month);
            month = getMonthFromString(month);
            var new_date = new Date(year, month - 1, day).toLocaleDateString('en-CA');
            var date = new Date(new_date);
            var get_y = date.getFullYear();
            var get_m = ("0" + (date.getMonth() + 1)).slice(-2);
            var get_d = ("0" + date.getDate()).slice(-2);
        } else {
            var date = value.split("-");
            var day = (date[2]),
                month = (date[1]),
                year = (date[0]);
            if (!$.isNumeric(month)) {
                month = getMonthFromString(month);
            }
            var new_date = new Date(year, month, day).toLocaleDateString('en-CA');
            var date = new Date(new_date);
            var get_y = date.getFullYear();
            var get_m = ("0" + (date.getMonth())).slice(-2);
            var get_d = ("0" + date.getDate()).slice(-2);
            if (get_m == "00")
                get_m = "12";
            var org_date = get_d + "-" + get_m + "-" + get_y;
        }
        var org_date = get_d + "-" + get_m + "-" + get_y;
    } else {
        var date = value.split("-");
        var day = (date[2]),
            month = (date[1]),
            year = (date[0]);
        if (!$.isNumeric(month)) {
            month = getMonthFromString(month);
        }
        var new_date = new Date(year, month, day).toLocaleDateString('en-CA');
        var date = new Date(new_date);
        var get_y = date.getFullYear();
        var get_m = ("0" + (date.getMonth())).slice(-2);
        var get_d = ("0" + date.getDate()).slice(-2);
        if (get_m == "00")
            get_m = "12";
        var org_date = get_d + "-" + get_m + "-" + get_y;
    }



    return org_date;
}

$(document).ready(function() {
    var intervalId = window.setInterval(function() {
        // alert("Priyanshu Singh");
    }, 5000);
});