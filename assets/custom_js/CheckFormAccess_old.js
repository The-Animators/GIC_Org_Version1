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

    if (!$.isNumeric(month)) {
        // alert(month);
        month = getMonthFromString(month);
        var new_date = new Date(year, month - 1, day).toLocaleDateString('en-CA');
        var date = new Date(new_date),
            get_y = date.getFullYear(),
            get_m = ("0" + (date.getMonth() + 1)).slice(-2);
        get_d = ("0" + date.getDate()).slice(-2);
    } else {
        var date = value.split("-");
        var day = (date[2]),
            month = (date[1]),
            year = (date[0]);
        var new_date = new Date(year, month, day).toLocaleDateString('en-CA');
        var date = new Date(new_date),
            get_y = date.getFullYear(),
            get_m = ("0" + (date.getMonth())).slice(-2);
        get_d = ("0" + date.getDate()).slice(-2);
    }

    var org_date = get_d + "-" + get_m + "-" + get_y;

    return org_date;
}