// Specify the normal table row background color
//   and the background color for when the mouse 
//   hovers over the table row.

var TableBackgroundNormalColor = "#ffffff";
var TableBackgroundMouseoverColor = "#9999ff";
var TextColor = "#fff";
var NormalTextColor = "#333";

// These two functions need no customization.
function ChangeBackgroundColor(row) {
    row.style.backgroundColor = TableBackgroundMouseoverColor;
    row.style.color = TextColor;
}

function wordwrap(str = "", width = "", brk = "", cut = "") {
    // alert(str);
    brk = brk || 'n';
    width = width || 75;
    cut = cut || false;

    if (!str) {
        return str;
    }

    var regex = '.{1,' + width + '}(\|$)' + (cut ? '|.{' + width + '}|.+$' : '|\S+?(\|$)');

    return str.match(RegExp(regex, 'g')).join(brk);

}

function RestoreBackgroundColor(row) {
    row.style.backgroundColor = TableBackgroundNormalColor;
    row.style.color = NormalTextColor;
}

function toaster(message_type = "", message_txt = "", message_icone = "") {
    //~ alert(message_type);
    //~ alert(message_txt);
    //~ alert(message_icone);
    $.toast({
        heading: message_type,
        text: message_txt,
        position: "top-right",
        loaderBg: "#3b98b5",
        icon: message_icone, // info, success, warning, error
        hideAfter: 3e3,
        stack: 1
    })
}

function confirmation_alert(id = "", url = "", title = "", type = "") {
    swal.fire({
        title: "Are you sure to " + type + "e " + title + " ",
        text: "Would you like to proceed ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).
    then(function(t) {
        // alert(t.value);
        if (t.value == true) {
            $.ajax({
                url: url,
                data: { id: id },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        swal.fire(title + " " + type + "ed Successfully! ", {
                            icon: "success",
                            type: "success",
                            timer: 2000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1800);
                    } else {
                        swal.fire("Error On Deleteing " + title + "!", {
                            icon: "danger",
                            type: "warning",
                            timer: 2000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        } else {
            swal.fire("Cancelled", "", "error");
        }

    })
}

function verification_alert(id = "", ver_id = "", url = "", method = "", title = "", type = "") {
    swal.fire({
        title: "Are you sure to " + type + " " + title + " ",
        text: "Would you like to proceed ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).
    then(function(t) {
        // alert(t.value);
        if (t.value == true) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    method: method,
                    id: id,
                    verified: ver_id,
                },
                success: function(data) {
                    if (data.includes("Successful")) {
                        swal.fire(title + " " + type + " Successfully! ", {
                            icon: "success",
                            type: "success",
                            timer: 2000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1800);
                    } else {
                        swal.fire("Error On " + type + "ing " + title + "!", {
                            icon: "danger",
                            type: "warning",
                            timer: 2000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        } else {
            swal.fire("Cancelled", "", "error");
        }

    })
}

function document_confirmation_alert(id = "", doc_type = "", doc_name = "", url = "", title = "", type = "") {
    swal.fire({
        title: "Are you sure to " + type + "e " + title + " ",
        text: "Would you like to proceed ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).
    then(function(t) {
        // alert(url);
        if (t.value == true) {
            $.ajax({
                url: url,
                data: {
                    id: id,
                    doc_type: doc_type,
                    doc_name: doc_name,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        swal.fire(title + " " + type + "ed Successfully! ", {
                            icon: "success",
                            type: "success",
                            timer: 2000,
                        });
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1800);
                    } else {
                        swal.fire("Error On Deleteing " + title + "!", {
                            icon: "danger",
                            type: "warning",
                            timer: 2000,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        } else {
            swal.fire("Cancelled", "", "error");
        }

    })
}

$('document').ready(function() {
    createTable();
    SwitchStatus();
    // alert("Hi");
    // var SwitchStatus = false;
    // $("#light-mode-switch").on("change",function(){
    // 	if($(this).is(":checked")){
    // 		SwitchStatus = $(this).is(":checked");
    // 		alert(SwitchStatus);
    // 	}else{
    // 		SwitchStatus = $(this).is(":checked");
    // 		alert(SwitchStatus);
    // 	}
    // });
});
// var SwitchStatus = false;
function SwitchStatus() {
    if ($("#light-mode-switch").is(":checked")) {
        SwitchStatus = $("#light-mode-switch").is(":checked");
        $("#mode_text").text("Light Mode");
        // alert(SwitchStatus);
    } else {
        SwitchStatus = $("#light-mode-switch").is(":checked");
        $("#mode_text").text("Dark Mode");
        // alert(SwitchStatus);
    }


    $("#light-mode-switch").on("change", function() {
        if ($(this).is(":checked")) {
            SwitchStatus = $(this).is(":checked");
            $("#mode_text").text("Light Mode");
            // alert(SwitchStatus);
        } else {
            SwitchStatus = $(this).is(":checked");
            $("#mode_text").text("Dark Mode");
            // alert(SwitchStatus);
        }
    });
}

function createTable() {
    var title = "";
    // var data = $("#datatable tbody tr td").attr("class");

    // alert(data);

    table = $('#datatable').DataTable({
        //dom: 'Bfrtip',
        // buttons: [{
        // 	extend: 'copy',
        // 	exportOptions: {
        // 		columns: ':visible'
        // 	}
        // },
        // 	{
        // 		extend: 'excelHtml5',
        // 		exportOptions: {
        // 			// columns: ':visible'
        // 			columns: ':visible'
        // 		},
        // 		filename: 'kumar',
        // 		title: 'kumar',
        // 	},
        // 	{
        // 		extend: 'pdfHtml5',
        // 		exportOptions: {
        // 			columns: ':visible'
        // 		},
        // 		text: 'PDF',
        // 		titleAttr: 'PDF',
        // 		extension: ".pdf",
        // 		filename: 'kumar',
        // 		title: 'kumar',
        // 		orientation: 'orientation',
        // 		pageSize: 'A4'
        // 	},'colvis'
        // ],
        buttons: ['copy', 'excelHtml5', 'pdfHtml5', 'colvis'],
        destroy: true,
        responsive: true,
        processing: true,
        orderCellsTop: true,
        fixedHeader: true,
        searchPanes: {
            viewTotal: true
        },
        "paging": false,
        dom: 'Bfrtip',
        "order": [],
        // "pageLength": '10',
        language: {
            // "processing": `<img src="../assets/images/loading.gif">`
        },

    });

    $('#datatable tfoot th').each(function() {
        title = $(this).text();
        if (title == "Dispatched")
            $(this).html('<select class="form-control input-style classTag1"><option value="">Select</option><option value="Not Created">Not Created</option><option value="Created">Created</option></select>');
        else if (title == "Verified")
            $(this).html('<select class="form-control input-style classTag1"><option value="">Select</option><option value="yes">yes</option><option value="no">no</option></select>');
        else if (title == "Is Active")
            $(this).html('<select class="form-control input-style classTag1"><option value="">Select</option><option value="yes">yes</option><option value="no">no</option></select>');
        else if (title != 'Edit' && title != 'Show Difference' && title != 'Status' && title != 'Sr No.' && title != ' ')
            $(this).html('<input type="text" class="form-control input-style" style="height:36px" placeholder="Search ' + title + '" />');

    });

    table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
        $('select ', this.footer()).on('change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });

    });
}

// This All Function Only For Test Purpose
function confirmation(type = "", type_icone = "") {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to " + type + " it!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, " + type + " it!"
            //~ title: "Are you sure?", text: "You won't be able to revert this!",
            // title: "Are you sure?", 
            // text: "You want to Delete it!",
            // type: "warning", 
            // showCancelButton: !0,
            // confirmButtonColor: "#3085d6",
            // cancelButtonColor: "#d33",
            // confirmButtonText: "Yes, delete it!"
    }).
    then(function(t) { t.value && Swal.fire(type + "!", "Your data has been " + type + ".", "success") })
}

function confirm_Delete(id, url, method, title) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            method: method,
            id: id,
        },

        success: function(data) {
            if (data.includes("Updated Successful") || data.includes("Deleted Successful") || data.includes("Recovered Successful") || data.includes("Inserted Successful")) {
                swal.fire(title + " Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
                setTimeout(function() {
                    location.reload();
                }, 2000);
            } else {
                swal.fire("Error On Deleteing " + title + "!", {
                    icon: "danger",
                    timer: 2000,
                });
            }
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}

function confirm_Recover(id, url, method, title) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            method: method,
            id: id,
        },

        success: function(data) {
            if (data.includes("Updated Successful") || data.includes("Deleted Successful") || data.includes("Recovered Successful") || data.includes("Inserted Successful")) {
                swal.fire(title + " Successfully Recovered! ", {
                    icon: "success",
                    timer: 2000,
                });
                setTimeout(function() {
                    location.reload();
                }, 2000);
            } else {
                swal.fire("Error On Recovering " + title + "!", {
                    icon: "danger",
                    timer: 2000,
                });
            }
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
}