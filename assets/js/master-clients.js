$(document).ready(function() {
    $('.repeater').repeater({
        // (Optional)
        // start with an empty list of repeaters. Set your first (and only)
        // "data-repeater-item" with style="display:none;" and pass the
        // following configuration flag
        initEmpty: false,
        // (Optional)
        // "defaultValues" sets the values of added items.  The keys of
        // defaultValues refer to the value of the input's name attribute.
        // If a default value is not specified for an input, then it will
        // have its value cleared.
        // defaultValues: {
        //     'text-input': 'foo'
        // },
        // (Optional)
        // "show" is called just after an item is added.  The item is hidden
        // at this point.  If a show callback is not given the item will
        // have $(this).show() called on it.
        show: function() {
            $(this).slideDown();
        },
        // (Optional)
        // "hide" is called when a user clicks on a data-repeater-delete
        // element.  The item is still visible.  "hide" is passed a function
        // as its first argument which will properly remove the item.
        // "hide" allows for a confirmation step, to send a delete request
        // to the server, etc.  If a hide callback is not given the item
        // will be deleted.
        hide: function(deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        // (Optional)
        // You can use this if you need to manually re-index the list
        // for example if you are using a drag and drop library to reorder
        // list items.
        /*ready: function (setIndexes) {
            $dragAndDrop.on('drop', setIndexes);
        },*/
        // (Optional)
        // Removes the delete button from the first list item,
        // defaults to false.
        isFirstItemUndeletable: true
    })
});

$(document).on('click', '.checkbox', function() {
    let ischecked = $(this).is(":checked")
    if (ischecked) {
        $('#o_address1').val($('#r_address1').val())
        $('#o_address2').val($('#r_address2').val())
        $('#o_address3').val($('#r_address3').val())
        $('#o_state').val($('#r_state').val())
        $('#o_country').val($('#r_country').val())
        $('#o_city').val($('#r_city').val())
        $('#o_zip').val($('#r_zip').val())
        $('#o_office_contact1').val($('#r_office_contact1').val())
        $('#o_office_contact2').val($('#r_office_contact2').val())
    } else {
        $('.hblank').val('')
    }
})

$(document).on("click", "#save", function(e) {
    e.preventDefault();
    $('#memberDetail, #personalDetail').slideToggle('slow')
    var formname = $(this).data('form');
    var btnid = $(this).data('id');
    toastr.remove();
    $("#" + btnid).startLoading();
    // alert()
    // let myForm = document.getElementById('credit_form');
    let formData = $("#" + formname).serialize() + "&memberid=" + userId;
    // alert($("#"+formname).serialize());
    /*e.preventDefault();
    axios({
            method: 'post',
            url: apiUrl,
            data:formData,
    })
    .then(function(response) {
        // console.log(response);
        var { status, validate, message } = response.data;
        let html = ''
        if (validate === true) {
            if (status === true) {
                toastr.success(message);
                $("#"+formname).trigger('reset');
            } else if (status == false) {
                toastr.warning(message);
                return false;
            }
        } else {
            $.each(message, function(key, value) {
                if (value != '') {
                    // alert($("#"+formname+" #"+key))
                    $("#"+formname+" #"+key).focus();
                    toastr.error(value);
                    return false;
                }
            });
        }
    })
    .catch(function(error) {
        console.log(error);
    });*/
    return false
});

$(document).on("click", "#saveMemberDetail", function(e) {
    e.preventDefault();
    // alert(baseUrl);
    if ($('#grpname').val() == '') {
        alert('Please Enter Group Name');
        return false;
    } else if ($('#reffered_by').val() == '') {
        alert('Please Enter Reffered by Name');
        return false;
    } else if ($('#r_address1').val() == '') {
        alert('Please Enter Recidencial Address 1');
        return false;
    } else if ($('#r_state').val() == '') {
        alert('Please Enter Recidencial state');
        return false;
    } else if ($('#r_country').val() == '') {
        alert('Please Enter Recidencial Country');
        return false;
    } else if ($('#r_city').val() == '') {
        alert('Please Enter Recidencial city');
        return false;
    } else if ($('#r_zip').val() == '') {
        alert('Please Enter Recidencial zip');
        return false;
    } else if ($('#r_office_contact1').val() == '') {
        alert('Please Enter Recidencial contact 1');
        return false;
    } else if ($('#o_address1').val() == '') {
        alert('Please Enter Office Address 1');
        return false;
    } else if ($('#o_state').val() == '') {
        alert('Please Enter Office state');
        return false;
    } else if ($('#o_country').val() == '') {
        alert('Please Enter office Country');
        return false;
    } else if ($('#o_city').val() == '') {
        alert('Please Enter office city');
        return false;
    } else if ($('#o_zip').val() == '') {
        alert('Please Enter office zip');
        return false;
    } else if ($('#o_office_contact1').val() == '') {
        alert('Please Enter office contact 1');
        return false;
    } else {


        var formdata = new FormData($('#formData')[0]);
        // formdata.append('winner_data', 1);
        $.ajax({
            type: "POST",
            url: baseUrl + 'Clients/saveClientDetails',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {

                if (data.status == true) {
                    alert('Data Inserted Successfully');
                    document.location.href = baseUrl + 'Clients/member_details/' + data.id;
                }
            },
            error: function(response) {
                alert('Error posting feeds');
                return false;
            }
        });
    }
});

/// Priyanshu Singh member Start
$(document).on("click", "#AddClient", function(e) {
    e.preventDefault();

    var formdata = new FormData($('#formData')[0]);
    $.ajax({
        type: "POST",
        url: baseUrl + 'Clients/add_client',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
            if (data["status"] == true) {
                // alert(data["customer_id"]);
                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                $("#grpname").val("");
                $("#reffered_by").val("");
                $("#r_address1").val("");
                $("#r_state").val("");
                $("#r_country").val("");
                $("#r_city").val("");
                $("#r_zip").val("");
                $("#r_office_contact1").val("");
                $("#o_address1").val("");
                $("#o_state").val("");
                $("#o_country").val("");
                $("#o_city").val("");
                $("#o_zip").val("");
                $("#o_office_contact1").val("");

                $("#grpname").removeClass("parsley-error");
                $("#reffered_by").removeClass("parsley-error");
                $("#r_address1").removeClass("parsley-error");
                $("#r_state").removeClass("parsley-error");
                $("#r_country").removeClass("parsley-error");
                $("#r_city").removeClass("parsley-error");
                $("#r_zip").removeClass("parsley-error");
                $("#r_office_contact1").removeClass("parsley-error");
                $("#o_address1").removeClass("parsley-error");
                $("#o_state").removeClass("parsley-error");
                $("#o_country").removeClass("parsley-error");
                $("#o_city").removeClass("parsley-error");
                $("#o_zip").removeClass("parsley-error");
                $("#o_office_contact1").removeClass("parsley-error");
                setTimeout(function() {
                    // document.location.href = baseUrl + 'clients/client_list/';
                    document.location.href = baseUrl + 'clients/member_details/' +
                        data["customer_id"];
                    // location.reload();Clients/member_details/
                }, 1000);
            } else {

                if (data["message"]["grpname_err"] != "") {
                    $("#grpname").addClass("parsley-error");
                    $("#grpname").focus();
                } else
                    $("#grpname").removeClass("parsley-error");
                $("#grpname_err").addClass("text-danger").html(data["message"]["grpname_err"]);

                if (data["message"]["reffered_by_err"] != "") {
                    $("#reffered_by").addClass("parsley-error");
                    $("#reffered_by").focus();
                } else
                    $("#reffered_by").removeClass("parsley-error");
                $("#reffered_by_err").addClass("text-danger").html(data["message"]["reffered_by_err"]);

                if (data["message"]["r_address1_err"] != "") {
                    $("#r_address1").addClass("parsley-error");
                    $("#r_address1").focus();
                } else
                    $("#r_address1").removeClass("parsley-error");
                $("#r_address1_err").addClass("text-danger").html(data["message"]["r_address1_err"]);

                if (data["message"]["r_state_err"] != "") {
                    $("#r_state").addClass("parsley-error");
                    $("#r_state").focus();
                } else
                    $("#r_state").removeClass("parsley-error");
                $("#r_state_err").addClass("text-danger").html(data["message"]["r_state_err"]);

                if (data["message"]["r_country_err"] != "") {
                    $("#r_country").addClass("parsley-error");
                    $("#r_country").focus();
                } else
                    $("#r_country").removeClass("parsley-error");
                $("#r_country_err").addClass("text-danger").html(data["message"]["r_country_err"]);

                if (data["message"]["r_city_err"] != "") {
                    $("#r_city").addClass("parsley-error");
                    $("#r_city").focus();
                } else
                    $("#r_city").removeClass("parsley-error");
                $("#r_city_err").addClass("text-danger").html(data["message"]["r_city_err"]);

                if (data["message"]["r_zip_err"] != "") {
                    $("#r_zip").addClass("parsley-error");
                    $("#r_zip").focus();
                } else
                    $("#r_zip").removeClass("parsley-error");
                $("#r_zip_err").addClass("text-danger").html(data["message"]["r_zip_err"]);

                if (data["message"]["r_office_contact1_err"] != "") {
                    $("#r_office_contact1").addClass("parsley-error");
                    $("#r_office_contact1").focus();
                } else
                    $("#r_office_contact1").removeClass("parsley-error");
                $("#r_office_contact1_err").addClass("text-danger").html(data["message"]["r_office_contact1_err"]);

                if (data["message"]["o_address1_err"] != "") {
                    $("#o_address1").addClass("parsley-error");
                    $("#o_address1").focus();
                } else
                    $("#o_address1").removeClass("parsley-error");
                $("#o_address1_err").addClass("text-danger").html(data["message"]["o_address1_err"]);

                if (data["message"]["o_state_err"] != "") {
                    $("#o_state").addClass("parsley-error");
                    $("#o_state").focus();
                } else
                    $("#o_state").removeClass("parsley-error");
                $("#o_state_err").addClass("text-danger").html(data["message"]["o_state_err"]);

                if (data["message"]["o_country_err"] != "") {
                    $("#o_country").addClass("parsley-error");
                    $("#o_country").focus();
                } else
                    $("#o_country").removeClass("parsley-error");
                $("#o_country_err").addClass("text-danger").html(data["message"]["o_country_err"]);

                if (data["message"]["o_city_err"] != "") {
                    $("#o_city").addClass("parsley-error");
                    $("#o_city").focus();
                } else
                    $("#o_city").removeClass("parsley-error");
                $("#o_city_err").addClass("text-danger").html(data["message"]["o_city_err"]);

                if (data["message"]["o_zip_err"] != "") {
                    $("#o_zip").addClass("parsley-error");
                    $("#o_zip").focus();
                } else
                    $("#o_zip").removeClass("parsley-error");
                $("#o_zip_err").addClass("text-danger").html(data["message"]["o_zip_err"]);

                if (data["message"]["o_office_contact1_err"] != "") {
                    $("#o_office_contact1").addClass("parsley-error");
                    $("#o_office_contact1").focus();
                } else
                    $("#o_office_contact1").removeClass("parsley-error");
                $("#o_office_contact1_err").addClass("text-danger").html(data["message"]["o_office_contact1_err"]);

            }
            // if (data.status == true) {
            //     alert('Data Inserted Successfully');
            //     document.location.href = baseUrl + 'Clients/member_details/' + data.id;
            // }
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
});

$(document).on("click", "#AddMember", function(e) {
    e.preventDefault();
    var formdata = new FormData($('#formData')[0]);

    $.ajax({
        type: "POST",
        url: baseUrl + 'Clients/add_member',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(data) {
            if (data["status"] == true) {
                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                $("#title").val("");
                $("#name").val("");
                $("#contact").val("");
                $("#email").val("");
                $("#address").val("");
                $("#relation").val("");
                $("#gender").val("");
                $("#dob").val("");
                $("#education").val("");
                $("#proffession").val("");
                $("#martial_status").val("");
                $("#annual_income").val("");
                $("#pan_number").val("");
                $("#aadhar_card").val("");

                $("#title").removeClass("parsley-error");
                $("#name").removeClass("parsley-error");
                $("#contact").removeClass("parsley-error");
                $("#email").removeClass("parsley-error");
                $("#address").removeClass("parsley-error");
                $("#relation").removeClass("parsley-error");
                $("#gender").removeClass("parsley-error");
                $("#dob").removeClass("parsley-error");
                $("#education").removeClass("parsley-error");
                $("#proffession").removeClass("parsley-error");
                $("#martial_status").removeClass("parsley-error");
                $("#annual_income").removeClass("parsley-error");
                $("#pan_number").removeClass("parsley-error");
                $("#aadhar_card").removeClass("parsley-error");
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                if (data["messages"] != "") {

                    if (data["messages"]["pan_image_err"] != "")
                        toaster(message_type = "Error", message_txt = data["messages"]["pan_image_err"], message_icone = "error");
                    if (data["messages"]["pan_image_err"] != "") {
                        $("#pan_image").addClass("parsley-error");
                        $("#pan_image").focus();
                    } else
                        $("#pan_image").removeClass("parsley-error");
                    $("#pan_image_err").addClass("text-danger").html(data["messages"]["pan_image_err"]);

                    if (data["messages"]["aadhar_image_err"] != "")
                        toaster(message_type = "Error", message_txt = data["messages"]["aadhar_image_err"], message_icone = "error");
                    if (data["messages"]["aadhar_image_err"] != "") {
                        $("#aadhar_image").addClass("parsley-error");
                        $("#aadhar_image").focus();
                    } else
                        $("#aadhar_image").removeClass("parsley-error");
                    $("#aadhar_image_err").addClass("text-danger").html(data["messages"]["aadhar_image_err"]);

                    if (data["messages"]["passport_image_err"] != "")
                        toaster(message_type = "Error", message_txt = data["messages"]["passport_image_err"], message_icone = "error");
                    if (data["messages"]["passport_image_err"] != "") {
                        $("#passport_image").addClass("parsley-error");
                        $("#passport_image").focus();
                    } else
                        $("#passport_image").removeClass("parsley-error");
                    $("#passport_image_err").addClass("text-danger").html(data["messages"]["passport_image_err"]);

                    if (data["messages"]["gst_image_err"] != "")
                        toaster(message_type = "Error", message_txt = data["messages"]["gst_image_err"], message_icone = "error");
                    if (data["messages"]["gst_image_err"] != "") {
                        $("#gst_image").addClass("parsley-error");
                        $("#gst_image").focus();
                    } else
                        $("#gst_image").removeClass("parsley-error");
                    $("#gst_image_err").addClass("text-danger").html(data["messages"]["gst_image_err"]);

                    if (data["messages"]["birth_certificate_err"] != "")
                        toaster(message_type = "Error", message_txt = data["messages"]["birth_certificate_err"], message_icone = "error");
                    if (data["messages"]["birth_certificate_err"] != "") {
                        $("#birth_certificate").addClass("parsley-error");
                        $("#birth_certificate").focus();
                    } else
                        $("#birth_certificate").removeClass("parsley-error");
                    $("#birth_certificate_err").addClass("text-danger").html(data["messages"]["birth_certificate_err"]);

                    if (data["messages"]["photo_err"] != "")
                        toaster(message_type = "Error", message_txt = data["messages"]["photo_err"], message_icone = "error");
                    if (data["messages"]["photo_err"] != "") {
                        $("#photo").addClass("parsley-error");
                        $("#photo").focus();
                    } else
                        $("#photo").removeClass("parsley-error");
                    $("#photo_err").addClass("text-danger").html(data["messages"]["photo_err"]);

                } else {
                    if (data["message"]["title_err"] != "") {
                        $("#title").addClass("parsley-error");
                        $("#title").focus();
                    } else
                        $("#title").removeClass("parsley-error");
                    $("#title_err").addClass("text-danger").html(data["message"]["title_err"]);

                    if (data["message"]["name_err"] != "") {
                        $("#name").addClass("parsley-error");
                        $("#name").focus();
                    } else
                        $("#name").removeClass("parsley-error");
                    $("#name_err").addClass("text-danger").html(data["message"]["name_err"]);

                    if (data["message"]["contact_err"] != "") {
                        $("#contact").addClass("parsley-error");
                        $("#contact").focus();
                    } else
                        $("#contact").removeClass("parsley-error");
                    $("#contact_err").addClass("text-danger").html(data["message"]["contact_err"]);

                    if (data["message"]["email_err"] != "") {
                        $("#email").addClass("parsley-error");
                        $("#email").focus();
                    } else
                        $("#email").removeClass("parsley-error");
                    $("#email_err").addClass("text-danger").html(data["message"]["email_err"]);

                    if (data["message"]["address_err"] != "") {
                        $("#address").addClass("parsley-error");
                        $("#address").focus();
                    } else
                        $("#address").removeClass("parsley-error");
                    $("#address_err").addClass("text-danger").html(data["message"]["address_err"]);

                    if (data["message"]["relation_err"] != "") {
                        $("#relation").addClass("parsley-error");
                        $("#relation").focus();
                    } else
                        $("#relation").removeClass("parsley-error");
                    $("#relation_err").addClass("text-danger").html(data["message"]["relation_err"]);

                    if (data["message"]["gender_err"] != "") {
                        $("#gender").addClass("parsley-error");
                        $("#gender").focus();
                    } else
                        $("#gender").removeClass("parsley-error");
                    $("#gender_err").addClass("text-danger").html(data["message"]["gender_err"]);

                    if (data["message"]["dob_err"] != "") {
                        $("#dob").addClass("parsley-error");
                        $("#dob").focus();
                    } else
                        $("#dob").removeClass("parsley-error");
                    $("#dob_err").addClass("text-danger").html(data["message"]["dob_err"]);

                    if (data["message"]["education_err"] != "") {
                        $("#education").addClass("parsley-error");
                        $("#education").focus();
                    } else
                        $("#education").removeClass("parsley-error");
                    $("#education_err").addClass("text-danger").html(data["message"]["education_err"]);

                    if (data["message"]["proffession_err"] != "") {
                        $("#proffession").addClass("parsley-error");
                        $("#proffession").focus();
                    } else
                        $("#proffession").removeClass("parsley-error");
                    $("#proffession_err").addClass("text-danger").html(data["message"]["proffession_err"]);

                    if (data["message"]["martial_status_err"] != "") {
                        $("#martial_status").addClass("parsley-error");
                        $("#martial_status").focus();
                    } else
                        $("#martial_status").removeClass("parsley-error");
                    $("#martial_status_err").addClass("text-danger").html(data["message"]["martial_status_err"]);

                    if (data["message"]["annual_income_err"] != "") {
                        $("#annual_income").addClass("parsley-error");
                        $("#annual_income").focus();
                    } else
                        $("#annual_income").removeClass("parsley-error");
                    $("#annual_income_err").addClass("text-danger").html(data["message"]["annual_income_err"]);

                    if (data["message"]["pan_number_err"] != "") {
                        $("#pan_number").addClass("parsley-error");
                        $("#pan_number").focus();
                    } else
                        $("#pan_number").removeClass("parsley-error");
                    $("#pan_number_err").addClass("text-danger").html(data["message"]["pan_number_err"]);

                    if (data["message"]["aadhar_card_err"] != "") {
                        $("#aadhar_card").addClass("parsley-error");
                        $("#aadhar_card").focus();
                    } else
                        $("#aadhar_card").removeClass("parsley-error");
                    $("#aadhar_card_err").addClass("text-danger").html(data["message"]["aadhar_card_err"]);
                }
            }
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
});


// Priyanshu Singh Member End


$(document).on("click", "#saveMember", function(e) {
    e.preventDefault();
    // alert(baseUrl);

    if ($('#title').val() == '') {
        alert('Please Select title');
        return false;
    } else if ($('#name').val() == '') {
        alert('Please Enter Name');
        return false;
    } else if ($('#contact').val() == '') {
        alert('Please Enter contact');
        return false;
    } else if ($('#email').val() == '') {
        alert('Please Enter email');
        return false;
    } else if ($('#address').val() == '') {
        alert('Please enter address');
        return false;
    } else if ($('#relation').val() == '') {
        alert('Please enter relation');
        return false;
    } else if ($('#gender').val() == '') {
        alert('Please Select title');
        return false;
    } else if ($('#dob').val() == '') {
        alert('Please enter date of birth');
        return false;
    } else if ($('#education').val() == '') {
        alert('Please enter education');
        return false;
    } else if ($('#proffession').val() == '') {
        alert('Please enter proffession');
        return false;
    } else if ($('#martial_status').val() == '') {
        alert('Please select martial status');
        return false;
    } else if ($('#annual_income').val() == '') {
        alert('Please enter annual income');
        return false;
    } else if ($('#pan_number').val() == '') {
        alert('Please enter pan number');
        return false;
    } else if ($('#aadhar_card').val() == '') {
        alert('Please enter aadhar card');
        return false;
    } else {


        var formdata = new FormData($('#formData')[0]);
        // formdata.append('winner_data', 1);
        $.ajax({
            type: "POST",
            url: baseUrl + 'Clients/saveMember',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {

                if (data.status == true) {
                    alert('Data Inserted Successfully');
                    window.location.reload();
                }
            },
            error: function(response) {
                alert('Error posting feeds');
                return false;
            }
        });
    }
});


$(document).on("click", "#update_single_memb", function(e) {
    e.preventDefault();
    // alert(baseUrl);

    if ($('#title').val() == '') {
        alert('Please Select title');
        return false;
    } else if ($('#name').val() == '') {
        alert('Please Enter Name');
        return false;
    } else if ($('#contact').val() == '') {
        alert('Please Enter contact');
        return false;
    } else if ($('#email').val() == '') {
        alert('Please Enter email');
        return false;
    } else if ($('#address').val() == '') {
        alert('Please enter address');
        return false;
    } else if ($('#relation').val() == '') {
        alert('Please enter relation');
        return false;
    } else if ($('#gender').val() == '') {
        alert('Please Select title');
        return false;
    } else if ($('#dob').val() == '') {
        alert('Please enter date of birth');
        return false;
    } else if ($('#education').val() == '') {
        alert('Please enter education');
        return false;
    } else if ($('#proffession').val() == '') {
        alert('Please enter proffession');
        return false;
    } else if ($('#martial_status').val() == '') {
        alert('Please select martial status');
        return false;
    } else if ($('#annual_income').val() == '') {
        alert('Please enter annual income');
        return false;
    } else if ($('#pan_number').val() == '') {
        alert('Please enter pan number');
        return false;
    } else if ($('#aadhar_card').val() == '') {
        alert('Please enter aadhar card');
        return false;
    } else {


        var formdata = new FormData($('#formData')[0]);
        // formdata.append('winner_data', 1);
        $.ajax({
            type: "POST",
            url: baseUrl + 'Clients/saveMember',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {

                if (data.status == true) {
                    alert('Data Inserted Successfully');
                    window.location.reload();
                }
            },
            error: function(response) {
                alert('Error posting feeds');
                return false;
            }
        });
    }
});






// $("#dob,#dom").datepicker({autoclose:!0,todayHighlight:!0})