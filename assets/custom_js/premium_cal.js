// var filter_counter = 0;
// var main_filter = [];
// var main_member_filter_Det = [];
// var main_age = [];
// var main_company_arr = [];
// var option_val_member_data = "";
// var option_val_data = option_val_member_data;

get_family_Size_sumInsure();
var option_val_member_data = "";

function GroupNameBasedMemberName(client) {
    client = parseInt(client);
    if (!isNaN(client)) {
        client = client;
    } else {
        client = 0;
    }
    if (client != 0)
        group_name = client;
    else
        var group_name = $("#group_name").val();

    var group_name_txt = $("#group_name option:selected").text();
    // $("#group_name_company").text(group_name_txt);
    option_val_member_data = "";
    var url = BaseURl + "master/policy/get_groupBased_membername";

    if (group_name != "") {
        $.ajax({
            url: url,
            data: {
                group_name: group_name
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    var val = data["userdata"];
                    $('.filter_member_name').html("<option value='null'>Select Member Name</option>");
                    var option_val = "";
                    for (var i = 0; i < val.length; i++) {
                        var member_id = val[i]["id"];
                        var member_name = val[i]["name"].charAt(0).toUpperCase() + val[i]["name"].slice(1);
                        option_val += '<option value="' + member_id + '">' + member_name + '</option>';
                    }
                } else {
                    $('.filter_member_name').html("<option value='null'>Select Member Name</option>");
                }
                option_val_member_data += option_val;
                $('.filter_member_name').append(option_val);
                // alert(option_val_member_data);
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {

            }
        });
    }
}

function RemoveFilter(filter_counter) {
    // console.log(main_age);
    // $.each(main_age,function(key,val){
    //     var age_val = main_age[key];
    //     alert(key+" age_key");
    //     alert(age_val+" age_val");
    // if(key==filter_counter){
    //     alert(filter_counter);
    //     alert(age_key);
    //     var age_key = main_age.indexOf(filter_counter);
    //     main_age.splice(age_key, 1);
    //     alert(main_age);
    // }

    // });
    var age_values = main_age[filter_counter];
    var age_key = main_age.indexOf(age_values);
    // alert(age_key);
    main_age.splice(age_key, 1);
    main_member_filter_Det.splice(age_key, 1);

    $("#remove_Filter_" + filter_counter).closest("tr").remove();
    var indexValue = main_filter.indexOf(filter_counter);
    main_filter.splice(indexValue, 1);
    // console.log(main_age);
    // console.log(main_member_filter_Det);

    // var age_key = main_age.indexOf(filter_counter);
    // main_age.splice(age_key, 1);
    // $.each(main_age,function(key,val){
    //     var age_val = main_age[key];
    //     alert(key+" age_key");
    //     alert(age_val+" age_val");

    // });


    // alert(filter_counter);
    // alert(age_key);
    // alert(main_age);
    if (main_filter.length == 0) {
        filter_counter = 0;
        main_filter = [];
        main_age = [];
        $("#Add_Filter").attr("onClick", "AddFilter(" + filter_counter + ")");
    }
}

function family_Size_Val() {
    var family_size = $("#family_size").val();
    if (family_size == "1A + 1C")
        var Family_size_count = 2;
    else if (family_size == "1A + 2C")
        var Family_size_count = 3;
    else if (family_size == "1A + 3C")
        var Family_size_count = 4;
    else if (family_size == "1A + 4C")
        var Family_size_count = 5;
    else if (family_size == "1A + 5C")
        var Family_size_count = 6;
    else if (family_size == "2A + 0C")
        var Family_size_count = 2;
    else if (family_size == "2A + 1C")
        var Family_size_count = 3;
    else if (family_size == "2A + 2C")
        var Family_size_count = 4;
    else if (family_size == "2A + 3C")
        var Family_size_count = 5;
    else if (family_size == "2A + 4C")
        var Family_size_count = 6;
    else if (family_size == "2A + 2P")
        var Family_size_count = 4;
    else if (family_size == "2A + 2P + 2C")
        var Family_size_count = 6;
    AddFilter_float(Family_size_count);
}



function GroupType_2(filter_counter = "") {
    var group_type = $("#group_type").val();
    if (group_type != "null") {
        if (group_type == "Group") {
            $("#filter_dob_" + filter_counter).attr("type", "text");
            $("#filter_member_name_select_" + filter_counter).show();
            $("#filter_member_name_input_" + filter_counter).hide();
        } else if (group_type == "Without Group") {
            $("#filter_dob_" + filter_counter).attr("type", "date");
            $("#filter_dob_" + filter_counter).attr("onchange", "get_AgeFromDatepicker(" + filter_counter + ")");
            // get_AgeFromDatepicker(filter_counter);
            $("#filter_member_name_input_" + filter_counter).show();
            $("#filter_member_name_select_" + filter_counter).hide();
        }
    }
}

function PolicyOption_family_Size() {
    var policy_option = $("#policy_option").val();
    if (policy_option != "null") {
        if (policy_option == "Individual") {
            $("#filter_table_ind").show();
            $("#filter_table_float").hide();
            $("#family_size_div").hide();
        } else if (policy_option == "Floater") {
            $("#family_size_div").show();
            $("#filter_table_ind").hide();
            $("#filter_table_float").show();
        } else {
            $("#family_size_div").hide();
        }
    } else {
        $("#family_size_div").hide();
    }
}

function get_family_Size_sumInsure() {
    var url = BaseURl + "master/premium_calculator/get_family_Size_sum_insure_dropdown";
    if (url != "") {
        $.ajax({
            url: url,
            data: {},
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    var val = data["userdata"];
                    // console.log(val);
                    $('#family_size').html('<option value="null">Select Family Size</option>');
                    $('#sum_insured').html('<option value="null">Select Sum Insured</option>');
                    var option_family_size_val = "";
                    var option_suminsured_val = "";
                    var sum_insured = "";
                    var family_size = "";
                    for (var i = 0; i < val.length; i++) {
                        var premium_calculator_addon_id = val[i]["premium_calculator_addon_id"];
                        var type = val[i]["type"];
                        var json = val[i]["json"];

                        if (type == "Sum Insured") {
                            sum_insured = JSON.parse(json);
                            // console.log(sum_insured);
                        }
                        if (type == "Family Size") {
                            family_size = JSON.parse(json);
                            // console.log(family_size);
                        }
                    }
                    sum_insured = sum_insured[0];
                    family_size = family_size[0];
                    $.each(sum_insured, function(key, val) {
                        sum_insured_id = sum_insured[key];
                        option_suminsured_val += '<option value="' + sum_insured_id + '">' + sum_insured_id + '</option>';
                    });
                    $.each(family_size, function(key, val) {
                        family_size_id = family_size[key];
                        option_family_size_val += '<option value="' + family_size_id + '">' + family_size_id + '</option>';
                    });
                } else {
                    $('#family_size').html('<option value="null">Select Family Size</option>');
                    $('#sum_insured').html('<option value="null">Select Sum Insured</option>');
                }
                $('#family_size').append(option_family_size_val);
                $('#sum_insured').append(option_suminsured_val);
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {

            }
        });
    }
}

var my_prem_arr = [];
var single_company_arr = [];

function sum_insured_int_Converter(name_insured_sum_insured) {
    var sum_insured = "";
    if (name_insured_sum_insured == "1,00,000")
        var sum_insured = "100000";
    else if (name_insured_sum_insured == "1,25,000")
        var sum_insured = "125000";
    else if (name_insured_sum_insured == "1,50,000")
        var sum_insured = "150000";
    else if (name_insured_sum_insured == "1,75,000")
        var sum_insured = "175000";
    else if (name_insured_sum_insured == "2,00,000")
        var sum_insured = "200000";
    else if (name_insured_sum_insured == "2,25,000")
        var sum_insured = "225000";
    else if (name_insured_sum_insured == "2,50,000")
        var sum_insured = "250000";
    else if (name_insured_sum_insured == "2,75,000")
        var sum_insured = "275000";
    else if (name_insured_sum_insured == "3,00,000")
        var sum_insured = "300000";
    else if (name_insured_sum_insured == "3,25,000")
        var sum_insured = "325000";
    else if (name_insured_sum_insured == "3,50,000")
        var sum_insured = "350000";
    else if (name_insured_sum_insured == "3,75,000")
        var sum_insured = "375000";
    else if (name_insured_sum_insured == "4,00,000")
        var sum_insured = "400000";
    else if (name_insured_sum_insured == "4,25,000")
        var sum_insured = "425000";
    else if (name_insured_sum_insured == "4,50,000")
        var sum_insured = "450000";
    else if (name_insured_sum_insured == "4,75,000")
        var sum_insured = "475000";
    else if (name_insured_sum_insured == "5,00,000")
        var sum_insured = "500000";
    else if (name_insured_sum_insured == "5,25,000")
        var sum_insured = "525000";
    else if (name_insured_sum_insured == "5,50,000")
        var sum_insured = "550000";
    else if (name_insured_sum_insured == "5,75,000")
        var sum_insured = "575000";
    else if (name_insured_sum_insured == "6,00,000")
        var sum_insured = "600000";
    else if (name_insured_sum_insured == "6,25,000")
        var sum_insured = "625000";
    else if (name_insured_sum_insured == "6,50,000")
        var sum_insured = "650000";
    else if (name_insured_sum_insured == "6,75,000")
        var sum_insured = "675000";
    else if (name_insured_sum_insured == "7,00,000")
        var sum_insured = "700000";
    else if (name_insured_sum_insured == "7,25,000")
        var sum_insured = "725000";
    else if (name_insured_sum_insured == "7,50,000")
        var sum_insured = "750000";
    else if (name_insured_sum_insured == "7,75,000")
        var sum_insured = "775000";
    else if (name_insured_sum_insured == "8,00,000")
        var sum_insured = "800000";
    else if (name_insured_sum_insured == "8,50,000")
        var sum_insured = "850000";
    else if (name_insured_sum_insured == "9,00,000")
        var sum_insured = "900000";
    else if (name_insured_sum_insured == "9,50,000")
        var sum_insured = "950000";
    else if (name_insured_sum_insured == "10,00,000")
        var sum_insured = "1000000";
    else if (name_insured_sum_insured == "11,00,000")
        var sum_insured = "1100000";
    else if (name_insured_sum_insured == "12,00,000")
        var sum_insured = "1200000";
    else if (name_insured_sum_insured == "12,50,000")
        var sum_insured = "1250000";
    else if (name_insured_sum_insured == "15,00,000")
        var sum_insured = "1500000";
    else if (name_insured_sum_insured == "16,00,000")
        var sum_insured = "1600000";
    else if (name_insured_sum_insured == "17,00,000")
        var sum_insured = "1700000";
    else if (name_insured_sum_insured == "20,00,000")
        var sum_insured = "2000000";
    else if (name_insured_sum_insured == "22,00,000")
        var sum_insured = "2200000";
    else if (name_insured_sum_insured == "25,00,000")
        var sum_insured = "2500000";
    else if (name_insured_sum_insured == "50,00,000")
        var sum_insured = "5000000";
    else if (name_insured_sum_insured == "75,00,000")
        var sum_insured = "7500000";
    else if (name_insured_sum_insured == "1,00,00,000")
        var sum_insured = "10000000";

    sum_insured = parseInt(sum_insured);

    if (isNaN(sum_insured))
        sum_insured = 0;
    else
        sum_insured = sum_insured;

    return sum_insured;

}

var filter_sum_insured = "";
var filter_Family_size = "";
var filter_Total_premium = "";

function Filter_Policy() {
    filter_sum_insured = "";
    filter_Family_size = "";
    filter_Total_premium = "";

    main_company_arr = [];
    var group_type = $("#group_type").val();
    if (group_type == "null") {
        $("#group_type").addClass("parsley-error");
        $("#group_type_err").addClass("text-danger").html("The Type Field is Required!");
        toaster(message_type = "Error", message_txt = "The Type Field is Required!", message_icone = "error");
        return false;
    } else {
        $("#group_type").removeClass("parsley-error");
        $("#group_type_err").removeClass("text-danger").html("");
    }
    var policy_option = $("#policy_option").val();
    group_id = $("#group_name").val();
    var type_of_policy = $("#type_of_policy").val();
    var family_size_option = $("#family_size").val();
    var sum_insured_option = $("#sum_insured").val();
    if (sum_insured_option == "null") {
        $("#sum_insured").addClass("parsley-error");
        $("#sum_insured_err").addClass("text-danger").html("The Sum Insured Field is Required!");
        toaster(message_type = "Error", message_txt = "The Sum Insured Field is Required!", message_icone = "error");
        return false;
    } else {
        $("#sum_insured").removeClass("parsley-error");
        $("#sum_insured_err").removeClass("text-danger").html("");
    }
    var sum_insured_option_nc = $("#sum_insured").val();
    sum_insured_option = sum_insured_int_Converter(sum_insured_option).toString();
    var policy_name_data = type_of_policy;
    var url = BaseURl + "master/premium_calculator/get_filtered_policy";
    if (url != "") {
        $.ajax({
            url: url,
            data: {
                policy_option: policy_option,
                type_of_policy: type_of_policy,
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {

                $("#search").attr("class", "");
                $("#search").attr("class", "btn btn-outline-danger waves-effect width-md waves-light btn-sm");
                $("#search").text("");
                $("#search").text("Filter On");
                if (data["status"] == true) {
                    var val = data["userdata"];
                    $('#append_premium_calculator').html('');
                    var filtered_policy_div = "";
                    var filtered_policy = "";
                    for (var i = 0; i < val.length; i++) {
                        var premium_calculator_addon_id = val[i]["premium_calculator_addon_id"];
                        var type = val[i]["type"];
                        var json = val[i]["json"];
                        filtered_policy = JSON.parse(json);
                    }
                    filtered_policy = filtered_policy[0];

                    $.each(filtered_policy, function(key, val) {
                        company_name = filtered_policy[key].company_name;
                        policy_option_type = filtered_policy[key].policy_option_type;
                        policy_name = filtered_policy[key].policy_name;
                        policy_view = filtered_policy[key].policy_view;
                        sum_insured = filtered_policy[key].sum_insured;
                        from_age = filtered_policy[key].from_age;
                        to_age = filtered_policy[key].to_age;
                        from_child_age = filtered_policy[key].from_child_age;
                        var sum_insured_array = sum_insured.split(", ");
                        if (policy_option == "Floater") {
                            family_size = filtered_policy[key].family_size;
                            var family_sizeStr = family_size.includes(family_size_option);
                            if (sum_insured_option != 0) {
                                if (sum_insured_array.includes(sum_insured_option)) {
                                    if (family_size_option != "null") {
                                        if (family_size.includes(family_size_option)) {
                                            filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                            main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                        }
                                        if (family_size == "") {
                                            filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                            main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                        }
                                    } else {
                                        filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                        main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                    }
                                }

                                if (sum_insured_array == "") {
                                    if (family_size_option != "null") {
                                        if (family_size.includes(family_size_option)) {
                                            filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                            main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                        }
                                        if (family_size == "") {
                                            filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                            main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                        }
                                    } else {
                                        filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                        main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                    }
                                }
                            }

                            if (sum_insured_option == 0) {
                                if (family_size_option != "null") {
                                    if (family_size.includes(family_size_option)) {
                                        filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                        main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                    }
                                    if (family_size == "") {
                                        filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                        main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                    }
                                } else {
                                    filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                    main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                }
                            }
                        } else if (policy_option == "Individual") {
                            family_size_option = "";
                            if (sum_insured_option != 0) {

                                if (sum_insured_array.includes(sum_insured_option)) {
                                    filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                    main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                }
                                if (sum_insured == "") {
                                    filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                    main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);
                                }
                            } else if (sum_insured_option == 0) {

                                filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box text-white bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6></div><div class="clearfix"></div> </div> </div>';
                                main_company_arr.push([key, company_name, policy_option_type, policy_name, policy_view, family_size_option, sum_insured_option, from_age, to_age, from_child_age, main_member_filter_Det]);

                            }
                        }
                    });
                    var total_age = 0;
                    // console.log(main_age);
                    if (policy_option == "Floater") {
                        $.each(main_age, function(a_key, a_val) {
                            var age_val = main_age[a_key];
                            age_val = age_val.split("_");
                            var adult_age = age_val[0];
                            var child_age = age_val[1];
                            var my_age = parseInt(adult_age);
                            if (total_age == 0) {
                                total_age = parseInt(my_age);
                            } else {
                                if (total_age < my_age) {
                                    total_age = parseInt(my_age);
                                }
                            }
                        });
                    }
                    // console.log(main_company_arr);
                    var member_tag = "";
                    var details = "";
                    if (main_age.length != 0) {
                        filtered_policy_div = "";
                        $.each(main_company_arr, function(c_key, c_val) {

                            index = main_company_arr[c_key][0];
                            company_name = main_company_arr[c_key][1];
                            policy_option_type = main_company_arr[c_key][2];
                            policy_name = main_company_arr[c_key][3];
                            policy_view = main_company_arr[c_key][4];
                            family_size = main_company_arr[c_key][5];
                            sum_insured = main_company_arr[c_key][6];
                            from_age = main_company_arr[c_key][7];
                            to_age = main_company_arr[c_key][8];
                            from_child_age = main_company_arr[c_key][9];
                            member_arr = main_company_arr[c_key][10];
                            main_company_arr[c_key][11] = 0;


                            // console.log(member_arr);

                            var member_tag_1 = '<div class="card mb-0" style="font-size:12px;"><div class="card-header" id="headingOne"><h5 class="m-0"><a href="#collapseOne" class="text-dark" onclick="toggle_member_data(' + index + ')">View Basic Premium Details</a></h5></div><div id="collapseOne_' + index + '" style="display:none;"><div class="card-body"><div class="row">';
                            var member_tag_2 = '</div></div></div></div>';
                            member_tag = "";
                            var details = "";
                            var sing_premium = "";
                            var my_prem = "";
                            my_prem_arr = [];

                            var family_size_tag = "";
                            if (family_size != "") {
                                family_size_tag = '<h6 class="mt-0 mb-1 text-overflow" title="' + family_size_option + '"><span>Family Size: ' + family_size_option + '</span></h6>';
                            } else if (family_size == "") {
                                family_size_tag = '';
                            }

                            if (policy_option == "Individual") {
                                if (policy_name_data == "Mediclaim") {
                                    my_prem = "";
                                } else if (policy_name_data == "Super Top UP") {
                                    my_prem = "";
                                }

                                $.each(main_age, function(a_key, a_val) {
                                    var age_val = main_age[a_key];
                                    age_val = age_val.split("_");
                                    var adult_age = age_val[0];
                                    var child_age = age_val[1];

                                    if (policy_name_data == "Mediclaim") {
                                        if (company_name == "Care Health Insurance Co. Ltd." && policy_option_type == "Individual") {
                                            if (policy_name == "Care Advantage") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var condition_value = getcolumnOnAge_care_adv_ind(my_age);
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_basic_premium_care_adv_ind(a_key, my_age, condition_value, sum_insured, BASE_URL);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_basic_premium_care_adv_ind(a_key, my_age, condition_value, sum_insured, BASE_URL);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            } else if (policy_name == "Care") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_care_health_care_ind_basic_prem';
                                                var condition_value = getcolumnOnAge_care_ind(my_age);
                                                var DATA = {
                                                    age: my_age,
                                                    condition_value: condition_value,
                                                    column_value: sum_insured,
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            }
                                        } else if (company_name == "Max Bupa Health Insurance Co. Ltd." && policy_option_type == "Individual") {
                                            if (policy_name == "Reassure") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var condition_value = getmax_bupa_reassure_columnOnage_ind(my_age);
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = getmax_bupa_reassure_basic_premium(a_key, my_age, condition_value, sum_insured, BASE_URL);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = getmax_bupa_reassure_basic_premium(a_key, my_age, condition_value, sum_insured, BASE_URL);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                                // var premium = getmax_bupa_reassure_basic_premium(a_key,my_age,condition_value,sum_insured,BASE_URL);
                                            }
                                        } else if (company_name == "Star Health & Allied Insurance Co Ltd" && policy_option_type == "Individual") {
                                            if (policy_name == "Comprehensive") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var condition_value = getcolumnOnage_1year_star_health_compresiv_ind(my_age);
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_basic_premium_star_health_compresiv_ind(a_key, my_age, condition_value, sum_insured, BASE_URL);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_basic_premium_star_health_compresiv_ind(a_key, my_age, condition_value, sum_insured, BASE_URL);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            } else if (policy_name == "Red Carpet") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_star_health_allied_ind_basic_prem';
                                                var DATA = {
                                                    years_of_premium: "1",
                                                    age: my_age,
                                                    condition_value: sum_insured,
                                                    column_value: "1_year",
                                                };
                                                if (my_age < 60 || my_age > 75) {
                                                    toaster(message_type = "Error", message_txt = "Only 60 to 75 Years People allowed For This Red Carpet Policy .", message_icone = "error");
                                                } else {
                                                    if (main_company_arr[c_key][11] == 0) {
                                                        if (my_age)
                                                            main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                        var sing_premium = main_company_arr[c_key][11];
                                                    } else {
                                                        var first_premium = main_company_arr[c_key][11];
                                                        var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);

                                                        if (isNaN(new_premium) || new_premium == "")
                                                            new_premium = 0;
                                                        else
                                                            new_premium = new_premium;
                                                        var sing_premium = new_premium;
                                                        main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                    }
                                                }
                                            }
                                        } else if (company_name == "United India Insurance Co Ltd" && policy_option_type == "Individual") {
                                            if (policy_name == "Individual Health Insurance Policy") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }

                                                if (my_age > 61) {
                                                    var policy_type = "Sr. Citizen";
                                                    var condition_value = get_Senior_Citizen_columnOnAge_individual_health_insurance_policy(my_age);
                                                } else if (my_age > 36) {
                                                    var policy_type = "Gold";
                                                    var condition_value = get_Gold_columnOnAge_individual_health_insurance_policy(my_age);
                                                } else if (my_age <= 36) {
                                                    var policy_type = "Platinum";
                                                    var condition_value = getcolumnOnAge_individual_health_insurance_policy(my_age);
                                                }

                                                var BASE_URL = BaseURl;
                                                // var condition_value = getcolumnOnAge_individual_health_insurance_policy(my_age);
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_basic_premium_individual_health_insurance_policy(a_key, my_age, condition_value, sum_insured_option_nc, BASE_URL);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_basic_premium_individual_health_insurance_policy(a_key, my_age, condition_value, sum_insured_option_nc, BASE_URL);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            } else if (policy_name == "Floater 2020(Individual)") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var condition_value = getcolumnOnAge_floater2020_ind(my_age);
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_basic_premium_floater2020_ind(a_key, my_age, condition_value, sum_insured_option_nc, BASE_URL);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_basic_premium_floater2020_ind(a_key, my_age, condition_value, sum_insured_option_nc, BASE_URL);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            }
                                        } else if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" && policy_option_type == "Individual") {
                                            if (policy_name == "Optima Restore") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_hdfc_ergo_health_insurance_basic_premium';
                                                var condition_value = getcolumnOnAge_hdfc_health_insu_optima_restore_ind(my_age);
                                                var condition_value = [condition_value];
                                                var DATA = {
                                                    region: 'National Capital Region and Mumbai Metropolitan Region',
                                                    age: my_age,
                                                    condition_value: condition_value,
                                                    column_value: sum_insured,
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            } else if (policy_name == "Energy") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_hdfc_ergo_health_insu_energy_basic_premium';
                                                var condition_value = getcolumnOnAge_hdfc_health_insu_energy_ind(my_age);
                                                var DATA = {
                                                    type_of_policy: "Silver No Co-Payment",
                                                    age: my_age,
                                                    condition_value: condition_value,
                                                    column_value: sum_insured,
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            } else if (policy_name == "Health Suraksha") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }

                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_hdfc_ergo_health_suraksha_basic_premium';
                                                var condition_value = getcolumnOnAge_hdfc_health_insu_health_suraksha_ind(my_age);
                                                var condition_value = [condition_value];
                                                var DATA = {
                                                    table_cond: sum_insured,
                                                    region: "Tier 1B (Mumbai, Pune, Surat, Varodara, Ahmedabad)",
                                                    type_of_policy: "Platinum Smart",
                                                    age: my_age,
                                                    condition_value: condition_value,
                                                    column_value: "individual",
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                        main_company_arr[c_key][11] = 0;
                                                    else
                                                        main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            } else if (policy_name == "Easy Health") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }

                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_hdfc_ergo_health_insu_easy_rate_card_basic_premium';
                                                var condition_value = getcolumnOnAge_hdfc_health_insu_easy_health_ind(my_age);
                                                var condition_value = [condition_value];
                                                var DATA = {
                                                    region: "National Capital Region and Mumbai Metropolitan Region",
                                                    type_of_policy: "Standard Plan",
                                                    age: my_age,
                                                    condition_value: condition_value,
                                                    column_value: sum_insured,
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            }
                                        } else if (company_name == "The New India Assurance Co Ltd" && policy_option_type == "Individual") {
                                            if (policy_name == "New India Mediclaim Policy 2017") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_the_new_india_assu_policy_2017_ind_limit_Of_basic_prem';
                                                var column_val = getcolumnOnAge_the_new_india_2017_ind(my_age);
                                                var DATA = {
                                                    age: my_age,
                                                    condition_value: sum_insured,
                                                    column_value: column_val,
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            }
                                        }
                                        if (my_prem == "")
                                            my_prem = sing_premium;
                                        else
                                            my_prem = my_prem + "," + sing_premium;
                                    }

                                    if (policy_name_data == "Super Top UP") {
                                        if (company_name == "United India Insurance Co Ltd" && policy_option_type == "Individual") {
                                            if (child_age == "na") {
                                                var my_age = parseInt(adult_age);
                                            } else {
                                                var my_age = parseInt(child_age);
                                            }
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_supertopup_ind_chart';
                                            var column_value = getcolumnOnAge_uiic_ind(my_age);
                                            var DATA = {
                                                age: my_age,
                                                column_value: column_value,
                                                condition_value: "A",
                                            };
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_premium_thresold_sum_insured_basedOn_Age_Policy_Option_uiic_supertopup_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, DATA);
                                                var sing_premium = main_company_arr[c_key][11];
                                            } else {
                                                var first_premium = main_company_arr[c_key][11];
                                                var new_premium = get_premium_thresold_sum_insured_basedOn_Age_Policy_Option_uiic_supertopup_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, DATA);
                                                if (isNaN(new_premium) || new_premium == "")
                                                    new_premium = 0;
                                                else
                                                    new_premium = new_premium;
                                                var sing_premium = new_premium;
                                                main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                            }
                                        } else if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" && policy_option_type == "Individual") {
                                            if (child_age == "na") {
                                                var my_age = parseInt(adult_age);
                                            } else {
                                                var my_age = parseInt(child_age);
                                            }
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_hdfc_ergo_health_supertopup_ind_basic_premium';
                                            var condition_value = getcolumnOnAge_hdfc_health_insu_supertopup_ind(my_age);
                                            var condition_value = [condition_value];
                                            var DATA = {
                                                age: my_age,
                                                table_cond: "500000",
                                                column_value: "individual",
                                                condition_value: condition_value,
                                                condition_value1: sum_insured,
                                            };
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                var sing_premium = main_company_arr[c_key][11];
                                            } else {
                                                var first_premium = main_company_arr[c_key][11];
                                                var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(new_premium) || new_premium == "")
                                                    new_premium = 0;
                                                else
                                                    new_premium = new_premium;
                                                var sing_premium = new_premium;
                                                main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                            }
                                        } else if (company_name == "The New India Assurance Co Ltd" && policy_option_type == "Individual") {
                                            if (child_age == "na") {
                                                var my_age = parseInt(adult_age);
                                            } else {
                                                var my_age = parseInt(child_age);
                                            }
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_the_new_india_assu_policy_super_topup_ind_single_basic_prem';
                                            var column_value = getcolumnOnAge_new_india_assu_supertopup_ind(my_age);
                                            var DATA = {
                                                age: my_age,
                                                column_value: column_value,
                                                condition_value: sum_insured,
                                            };
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                var sing_premium = main_company_arr[c_key][11];
                                            } else {
                                                var first_premium = main_company_arr[c_key][11];
                                                var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(new_premium) || new_premium == "")
                                                    new_premium = 0;
                                                else
                                                    new_premium = new_premium;
                                                // alert(new_premium);
                                                var sing_premium = new_premium;
                                                main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                            }
                                        } else if (company_name == "Star Health & Allied Insurance Co Ltd" && policy_option_type == "Individual") {
                                            if (child_age == "na") {
                                                var my_age = parseInt(adult_age);
                                            } else {
                                                var my_age = parseInt(child_age);
                                            }
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_star_health_allied_supertopup_ind_basic_prem';
                                            var condition_value = getcolumnOnage_star_health_supertopup_ind(my_age);
                                            var DATA = {
                                                age: my_age,
                                                column_value: sum_insured,
                                                condition_value: condition_value,
                                                type_of_policy: "Gold Plan",
                                                deductible_prem: "300000",
                                            };
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                var sing_premium = main_company_arr[c_key][11];
                                            } else {
                                                var first_premium = main_company_arr[c_key][11];
                                                var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(new_premium) || new_premium == "")
                                                    new_premium = 0;
                                                else
                                                    new_premium = new_premium;
                                                // alert(new_premium);
                                                var sing_premium = new_premium;
                                                main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                            }
                                        }

                                        if (my_prem == "")
                                            my_prem = sing_premium;
                                        else
                                            my_prem = my_prem + "," + sing_premium;
                                    }

                                    // alert(my_prem);
                                });
                                var prem_flag = false;
                                if (my_prem != 0 || my_prem != "")
                                    my_prem_arr = my_prem.split(",");
                                else {
                                    prem_flag = true;
                                    // member_arr.length
                                    // my_prem_arr =member_arr;
                                    // my_prem_arr[mp_key] = 0;
                                }

                                // console.log(my_prem_arr);
                                $.each(my_prem_arr, function(mp_key, mp_val) {

                                    $.each(member_arr, function(m_key, m_val) {
                                        my_prem = "";
                                        var member_name_det = "";
                                        if (group_type == "Group") {
                                            var filter_member_name = member_arr[m_key][0];
                                            var filter_member_name_txt = member_arr[m_key][1];
                                            var filter_dob = member_arr[m_key][2];
                                            var filter_age = member_arr[m_key][3];
                                            var filter_relation = member_arr[m_key][4];
                                            var filter_relation_txt = member_arr[m_key][5];
                                            var last_premium = member_arr[m_key][6];
                                            member_name_det = filter_member_name_txt;
                                        } else if (group_type == "Without Group") {
                                            var filter_member_name = member_arr[m_key][0];
                                            var filter_dob = member_arr[m_key][1];
                                            var filter_age = member_arr[m_key][2];
                                            var filter_relation = member_arr[m_key][3];
                                            var filter_relation_txt = member_arr[m_key][4];
                                            var last_premium = member_arr[m_key][5];
                                            member_name_det = filter_member_name;
                                        }
                                        if (mp_key == m_key)
                                            member_tag += '<div class="col-md-12">Member Name : ' + member_name_det + '</div><div class="col-md-12">Age : ' + filter_age + '</div><div class="col-md-12">Premium : ' + my_prem_arr[mp_key] + '</div>';
                                    });
                                });
                                single_company_arr.push([index, company_name, policy_option_type, policy_name, policy_view, family_size, sum_insured, from_age, to_age, from_child_age, member_arr, main_company_arr[c_key][11]]);
                            } else if (policy_option == "Floater") {

                                var flags = false;
                                var a_key = "";
                                if (policy_name_data == "Mediclaim") {
                                    if (company_name == "Care Health Insurance Co. Ltd." && policy_option_type == "Floater") {
                                        if (policy_name == "Care Advantage") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_care_health_care_advantage_float_basic_prem';
                                            var condition_value = getcolumnOnAge_care_adv_float(total_age);
                                            var DATA = {
                                                family_size: family_size_option,
                                                age: total_age,
                                                condition_value: condition_value,
                                                column_value: sum_insured,
                                            };
                                            var sing_premium = "";
                                            if (total_age < 18) {
                                                toaster(message_type = "Error", message_txt = "The Age " + total_age + " Years Old Peoples Premium is Not Available.", message_icone = "error");
                                            } else {
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                        main_company_arr[c_key][11] = 0;
                                                    else
                                                        main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                    var sing_premium = main_company_arr[c_key][11];
                                                }
                                            }
                                        } else if (policy_name == "Care") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_care_health_care_float_basic_prem';
                                            var condition_value = getcolumnOnAge_care_float(total_age);
                                            var DATA = {
                                                family_size: family_size_option,
                                                age: total_age,
                                                condition_value: condition_value,
                                                column_value: sum_insured,
                                            };
                                            var sing_premium = "";
                                            if (total_age < 18) {
                                                toaster(message_type = "Error", message_txt = "The Age " + total_age + " Years Old Peoples Premium is Not Available.", message_icone = "error");
                                            } else {
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                        main_company_arr[c_key][11] = 0;
                                                    else
                                                        main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                    var sing_premium = main_company_arr[c_key][11];
                                                }
                                            }
                                        }
                                    } else if (company_name == "Max Bupa Health Insurance Co. Ltd." && policy_option_type == "Floater") {
                                        if (policy_name == "Reassure") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_max_bupa_reassure_float_basic_prem';
                                            var condition_value = getmax_bupa_reassure_columnOnage_float(total_age);
                                            var condition_value = [condition_value];
                                            var DATA = {
                                                family_size: family_size,
                                                region: "Zone 1",
                                                age: total_age,
                                                condition_value: condition_value,
                                                column_value: sum_insured,
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }
                                        }

                                    } else if (company_name == "Star Health & Allied Insurance Co Ltd" && policy_option_type == "Floater") {
                                        if (policy_name == "Comprehensive") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_star_health_allied_comprehensive_float_basic_prem';
                                            var condition_value = getcolumnOnage_1year_star_health_compresiv_floater(total_age);
                                            var DATA = {
                                                family_size: family_size,
                                                years_of_premium: "1",
                                                age: total_age,
                                                condition_value: condition_value,
                                                column_value: sum_insured,
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }
                                        } else if (policy_name == "Red Carpet") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_star_health_allied_float_basic_prem';
                                            var condition_value = getcolumnOnyears_of_premium_star_health_redcarpet_ind(total_age);
                                            var DATA = {
                                                years_of_premium: "1_year",
                                                age: total_age,
                                                condition_value: sum_insured,
                                                column_value: "1_year",
                                                family_size: family_size
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }
                                        }
                                    } else if (company_name == "United India Insurance Co Ltd" && policy_option_type == "Floater") {
                                        if (policy_name == "Family Floater 2014") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_floater_2014_chart';
                                            var condition_value = getcolumnOnAge_uncci_family_floater_2014(total_age, family_size);
                                            var DATA = {
                                                max_age: total_age,
                                                column_value: sum_insured,
                                                condition_value: condition_value,
                                                family_size: family_size
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                var sing_premium = main_company_arr[c_key][11];
                                                if (total_age > 80) {
                                                    tot_premium = Math.round(parseInt(5) * parseInt(main_company_arr[c_key][11]) / 100);
                                                    var new_premium = parseInt(tot_premium) + parseInt(main_company_arr[c_key][11]);
                                                    main_company_arr[c_key][11] = new_premium;
                                                    if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                        main_company_arr[c_key][11] = 0;
                                                    else
                                                        main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    new_premium = parseInt(main_company_arr[c_key][11]);
                                                    main_company_arr[c_key][11] = new_premium;
                                                    if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                        main_company_arr[c_key][11] = 0;
                                                    else
                                                        main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                    var sing_premium = main_company_arr[c_key][11];
                                                }
                                            }
                                        } else if (policy_name == "Family Floater 2020") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_floater_2020_chart';
                                            var column_value = getcolumnOnAge_uncci_family_floater_2020(total_age, family_size);
                                            // alert(column_value);
                                            if (family_size == "2A + 0C")
                                                var family_size_txt = "2a_0c";
                                            else if (family_size == "2A + 1C")
                                                var family_size_txt = "2a_1c";
                                            else if (family_size == "2A + 2C")
                                                var family_size_txt = "2a_2c";
                                            else if (family_size == "1A+ 1C")
                                                var family_size_txt = "1a_1c";
                                            else if (family_size == "1A + 2C")
                                                var family_size_txt = "1a_2c";
                                            else if (family_size == "2A + 3C")
                                                var family_size_txt = "2a_3c";
                                            var DATA = {
                                                max_age: total_age,
                                                column_value: column_value,
                                                condition_value: sum_insured_option_nc,
                                                family_size_txt: family_size_txt,
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }
                                        }
                                    } else if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" && policy_option_type == "Floater") {
                                        if (policy_name == "Optima Restore") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_float_hdfc_ergo_health_insurance_basic_premium';
                                            var condition_value = getcolumnOnAge_hdfc_health_insu_optima_restore_float(total_age);
                                            // alert(condition_value);
                                            var condition_value = [condition_value];
                                            // alert(condition_value);
                                            var DATA = {
                                                hdfc_ergo_health_insu_family_size: family_size_option,
                                                region: "National Capital Region and Mumbai Metropolitan Region",
                                                age: total_age,
                                                condition_value: condition_value,
                                                column_value: sum_insured,
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }

                                        } else if (policy_name == "Health Suraksha") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_hdfc_ergo_health_suraksha_basic_premium';
                                            var condition_value = getcolumnOnAge_hdfc_health_insu_health_suraksha_float(total_age);
                                            var column_value = family_Size_coulumn_hdfc_health_insu_health_suraksha_float(family_size_option);
                                            var condition_value = [condition_value];
                                            var DATA = {
                                                table_cond: sum_insured,
                                                region: "Tier 1B (Mumbai, Pune, Surat, Varodara, Ahmedabad)",
                                                type_of_policy: "Platinum Smart",
                                                age: total_age,
                                                condition_value: condition_value,
                                                column_value: column_value,
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }
                                        } else if (policy_name == "Easy Health") {
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_float_easy_rate_card_hdfc_ergo_health_insu_basic_premium';
                                            var condition_value = getcolumnOnAge_hdfc_health_insu_easy_health_float(total_age);
                                            var condition_value = [condition_value];
                                            var DATA = {
                                                region: "National Capital Region and Mumbai Metropolitan Region",
                                                type_of_policy: "Standard Plan",
                                                age: total_age,
                                                hdfc_ergo_health_insu_family_size: family_size_option,
                                                condition_value: condition_value,
                                                column_value: sum_insured,
                                            };
                                            var sing_premium = "";
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(main_company_arr[c_key][11]) || main_company_arr[c_key][11] == "")
                                                    main_company_arr[c_key][11] = 0;
                                                else
                                                    main_company_arr[c_key][11] = main_company_arr[c_key][11];
                                                var sing_premium = main_company_arr[c_key][11];
                                            }
                                        }
                                    } else if (company_name == "The New India Assurance Co Ltd" && policy_option_type == "Floater") {
                                        main_company_arr[c_key][11] = "";
                                        $.each(main_age, function(a_key, a_val) {
                                            var age_val = main_age[a_key];
                                            age_val = age_val.split("_");
                                            var adult_age = age_val[0];
                                            var child_age = age_val[1];
                                            if (policy_name == "New India Floater Mediclaim") {
                                                if (child_age == "na") {
                                                    var my_age = parseInt(adult_age);
                                                } else {
                                                    var my_age = parseInt(child_age);
                                                }
                                                var BASE_URL = BaseURl;
                                                var URL = 'master/remote/get_the_new_india_assu_policy_floater_medi_basic_prem';
                                                var column_value = getcolumnOnAge_new_india_assu_float(my_age);
                                                var DATA = {
                                                    age: my_age,
                                                    condition_value: sum_insured,
                                                    column_value: column_value,
                                                };
                                                if (main_company_arr[c_key][11] == 0) {
                                                    main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    var sing_premium = main_company_arr[c_key][11];
                                                } else {
                                                    var first_premium = main_company_arr[c_key][11];
                                                    var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                    if (isNaN(new_premium) || new_premium == "")
                                                        new_premium = 0;
                                                    else
                                                        new_premium = new_premium;
                                                    var sing_premium = new_premium;
                                                    main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                                }
                                            }
                                            if (my_prem == "")
                                                my_prem = sing_premium;
                                            else
                                                my_prem = my_prem + "," + sing_premium;
                                        });
                                        my_prem_arr = my_prem.split(",");
                                        $.each(my_prem_arr, function(mp_key, mp_val) {
                                            $.each(member_arr, function(m_key, m_val) {
                                                my_prem = "";
                                                var member_name_det = "";
                                                if (group_type == "Group") {
                                                    var filter_member_name = member_arr[m_key][0];
                                                    var filter_member_name_txt = member_arr[m_key][1];
                                                    var filter_dob = member_arr[m_key][2];
                                                    var filter_age = member_arr[m_key][3];
                                                    var filter_relation = member_arr[m_key][4];
                                                    var filter_relation_txt = member_arr[m_key][5];
                                                    var last_premium = member_arr[m_key][6];
                                                    member_name_det = filter_member_name_txt;
                                                } else if (group_type == "Without Group") {
                                                    var filter_member_name = member_arr[m_key][0];
                                                    var filter_dob = member_arr[m_key][1];
                                                    var filter_age = member_arr[m_key][2];
                                                    var filter_relation = member_arr[m_key][3];
                                                    var filter_relation_txt = member_arr[m_key][4];
                                                    var last_premium = member_arr[m_key][5];
                                                    member_name_det = filter_member_name;
                                                }
                                                flags = true;
                                                if (mp_key == m_key)
                                                    member_tag += '<div class="col-md-12">Member Name : ' + member_name_det + '</div><div class="col-md-12">Age : ' + filter_age + '</div><div class="col-md-12">Premium : ' + my_prem_arr[mp_key] + '</div>';
                                            });
                                        });
                                    }
                                }

                                if (policy_name_data == "Super Top UP") {
                                    if (company_name == "United India Insurance Co Ltd" && policy_option_type == "Floater") {
                                        var BASE_URL = BaseURl;
                                        var URL = 'master/remote/get_super_top_up_floater_chart';
                                        var column_value = getcolumnOnAge_uiic_supertopup_float(total_age, family_size);
                                        var DATA = {
                                            max_age: total_age,
                                            column_value: column_value,
                                            condition_value: "A",
                                            family_size: family_size
                                        };
                                        var sing_premium = "";
                                        main_company_arr[c_key][11] = get_premium_thresold_sum_insured_basedOn_Age_Policy_Option_uiic_supertopup_float(a_key, total_age, condition_value = "A", sum_insured, BASE_URL, DATA);
                                        var sing_premium = main_company_arr[c_key][11];
                                        // if (total_age > 80) {
                                        //     tot_premium = Math.round(parseInt(5) * parseInt(main_company_arr[c_key][11]) / 100);
                                        //     var new_premium = parseInt(tot_premium) + parseInt(main_company_arr[c_key][11]);
                                        //     main_company_arr[c_key][11] = new_premium;
                                        //     var sing_premium = main_company_arr[c_key][11];
                                        // } else {
                                        //     new_premium = parseInt(main_company_arr[c_key][11]);
                                        //     main_company_arr[c_key][11] = new_premium;
                                        //     var sing_premium = main_company_arr[c_key][11];
                                        // } 
                                    } else if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" && policy_option_type == "Floater") {
                                        var BASE_URL = BaseURl;
                                        var URL = 'master/remote/get_hdfc_ergo_health_supertopup_ind_basic_premium';
                                        var column_value = family_Size_coulumn_hdfc_health_insu_supertopup_loat(family_size);
                                        var condition_value = getcolumnOnAge_hdfc_health_insu_supertopup_loat(total_age);
                                        var condition_value = [condition_value];
                                        // alert(family_size);

                                        // alert(column_value);
                                        var DATA = {
                                            max_age: total_age,
                                            table_cond: "500000",
                                            column_value: column_value,
                                            condition_value: condition_value,
                                            condition_value1: sum_insured,
                                            family_size: family_size
                                        };
                                        var sing_premium = "";
                                        main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value = "A", sum_insured, BASE_URL, URL, DATA);
                                        var sing_premium = main_company_arr[c_key][11];
                                    } else if (company_name == "The New India Assurance Co Ltd" && policy_option_type == "Floater") {

                                        main_company_arr[c_key][11] = "";
                                        $.each(main_age, function(a_key, a_val) {
                                            var age_val = main_age[a_key];
                                            age_val = age_val.split("_");
                                            var adult_age = age_val[0];
                                            var child_age = age_val[1];
                                            if (child_age == "na") {
                                                var my_age = parseInt(adult_age);
                                            } else {
                                                var my_age = parseInt(child_age);
                                            }
                                            var filter_relation = $("#filter_member_relation_" + a_key + " option:selected").text();
                                            var BASE_URL = BaseURl;
                                            var URL = 'master/remote/get_the_new_india_assu_policy_super_topup_ind_basic_prem';
                                            if (((filter_relation == "Self") && (my_age <= 17)) || ((filter_relation == "Self") && (my_age > 65))) {
                                                if ((filter_relation == "Self") && (my_age <= 17)) {
                                                    toaster(message_type = "Error", message_txt = "The Age Less than 18 Years Peoples is Not Found Basic Premium in Chart.", message_icone = "error");
                                                    // return false;
                                                }
                                                if ((filter_relation == "Self") && (my_age > 65)) {
                                                    toaster(message_type = "Error", message_txt = "The Age Greater than 6 Years or 60+ Peoples is Not Found Basic Premium in Chart.", message_icone = "error");
                                                    // return false;
                                                }
                                            }

                                            if ((filter_relation != "Self") && (my_age > 60)) {
                                                toaster(message_type = "Error", message_txt = "The Age Greater than 60 Years or 60+ Peoples is Not Found Basic Premium in Chart.", message_icone = "error");
                                                // return false;
                                            }
                                            var column_value = getcolumnOnAge_new_india_assu_supertopup_float(my_age);
                                            var DATA = {
                                                counter: a_key,
                                                name_insured_relation: filter_relation,
                                                age: my_age,
                                                column_value: column_value,
                                                condition_value: sum_insured,
                                            };
                                            if (main_company_arr[c_key][11] == 0) {
                                                main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                var sing_premium = main_company_arr[c_key][11];
                                            } else {
                                                var first_premium = main_company_arr[c_key][11];
                                                var new_premium = get_Common_basic_premium_Function_ind(a_key, my_age, condition_value, sum_insured, BASE_URL, URL, DATA);
                                                if (isNaN(new_premium) || new_premium == "")
                                                    new_premium = 0;
                                                else
                                                    new_premium = new_premium;
                                                // alert(new_premium);
                                                var sing_premium = new_premium;
                                                main_company_arr[c_key][11] = parseInt(first_premium) + parseInt(new_premium);
                                            }
                                            if (my_prem == "")
                                                my_prem = sing_premium;
                                            else
                                                my_prem = my_prem + "," + sing_premium;
                                        });
                                        my_prem_arr = my_prem.split(",");
                                        $.each(my_prem_arr, function(mp_key, mp_val) {
                                            $.each(member_arr, function(m_key, m_val) {
                                                my_prem = "";
                                                var member_name_det = "";
                                                if (group_type == "Group") {
                                                    var filter_member_name = member_arr[m_key][0];
                                                    var filter_member_name_txt = member_arr[m_key][1];
                                                    var filter_dob = member_arr[m_key][2];
                                                    var filter_age = member_arr[m_key][3];
                                                    var filter_relation = member_arr[m_key][4];
                                                    var filter_relation_txt = member_arr[m_key][5];
                                                    var last_premium = member_arr[m_key][6];
                                                    member_name_det = filter_member_name_txt;
                                                } else if (group_type == "Without Group") {
                                                    var filter_member_name = member_arr[m_key][0];
                                                    var filter_dob = member_arr[m_key][1];
                                                    var filter_age = member_arr[m_key][2];
                                                    var filter_relation = member_arr[m_key][3];
                                                    var filter_relation_txt = member_arr[m_key][4];
                                                    var last_premium = member_arr[m_key][5];
                                                    member_name_det = filter_member_name;
                                                }
                                                flags = true;
                                                if (mp_key == m_key)
                                                    member_tag += '<div class="col-md-12">Member Name : ' + member_name_det + '</div><div class="col-md-12">Age : ' + filter_age + '</div><div class="col-md-12">Premium : ' + my_prem_arr[mp_key] + '</div>';
                                            });
                                        });
                                    } else if (company_name == "Star Health & Allied Insurance Co Ltd" && policy_option_type == "Floater") {
                                        var BASE_URL = BaseURl;
                                        var URL = 'master/remote/get_star_health_allied_supertopup_float_basic_prem';
                                        var condition_value = getcolumnOnage_star_health_supertopup_float(total_age);
                                        var DATA = {
                                            max_age: total_age,
                                            type_of_policy: "Gold Plan",
                                            deductible_prem: "300000",
                                            column_value: sum_insured,
                                            condition_value: condition_value,
                                            family_size: family_size
                                        };
                                        var sing_premium = "";
                                        main_company_arr[c_key][11] = get_Common_basic_premium_Function_ind(a_key, total_age, condition_value = "A", sum_insured, BASE_URL, URL, DATA);
                                        var sing_premium = main_company_arr[c_key][11];
                                    }
                                }

                                if (!flags) {
                                    $.each(member_arr, function(m_key, m_val) {
                                        var member_name_det = "";
                                        if (group_type == "Group") {
                                            var filter_member_name = member_arr[m_key][0];
                                            var filter_member_name_txt = member_arr[m_key][1];
                                            var filter_dob = member_arr[m_key][2];
                                            var filter_age = member_arr[m_key][3];
                                            var filter_relation = member_arr[m_key][4];
                                            var filter_relation_txt = member_arr[m_key][5];
                                            var last_premium = member_arr[m_key][6];
                                            member_name_det = filter_member_name_txt;
                                        } else if (group_type == "Without Group") {
                                            var filter_member_name = member_arr[m_key][0];
                                            var filter_dob = member_arr[m_key][1];
                                            var filter_age = member_arr[m_key][2];
                                            var filter_relation = member_arr[m_key][3];
                                            var filter_relation_txt = member_arr[m_key][4];
                                            var last_premium = member_arr[m_key][5];
                                            member_name_det = filter_member_name;
                                        }
                                        // console.log(member_arr + " Floater");
                                        if (filter_age == total_age) {
                                            var floater_premium = main_company_arr[c_key][11];
                                        } else {
                                            var floater_premium = 0;
                                        }
                                        member_tag += '<div class="col-md-12">Member Name : ' + member_name_det + '</div><div class="col-md-12">Age : ' + filter_age + '</div><div class="col-md-12">Premium : ' + floater_premium + '</div>';
                                    });
                                }

                                single_company_arr.push([index, company_name, policy_option_type, policy_name, policy_view, family_size, sum_insured, from_age, to_age, from_child_age, member_arr, main_company_arr[c_key][11]]);
                            }
                            //// console.log(member_tag);
                            // console.log(member_arr);
                            var load_view_page = "";
                            var datas = company_name + "#" + policy_name + "#" + policy_option_type + "#" + policy_view;

                            load_view_page = '<button id="search" class="btn btn-danger btn-sm ml-1 mt-2" onclick="load_view(\'' + datas + '\')"><b>View More</b></button>';
                            details = member_tag_1 + member_tag + member_tag_2;

                            filter_sum_insured = sum_insured_option_nc + "_" + sum_insured_option;
                            filter_Family_size = family_size_option;
                            filter_Total_premium = main_company_arr[c_key][11];


                            filtered_policy_div += '<div class="col-xl-4 col-sm-6"><div class="card-box bg-info widget-box-four"><div class="float-left"> <h6 class="mt-0 mb-1 text-overflow" title="' + company_name + '"><span>Company : ' + company_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_name + '"  ><span>Policy : ' + policy_name + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + policy_option_type + '"><span>Policy Type: ' + policy_option_type + '</span></h6>' + family_size_tag + '<h6 class="mt-0 mb-1 text-overflow" title="' + sum_insured_option + '"><span>Sum Insured: ' + sum_insured_option + '</span></h6><h6 class="mt-0 mb-1 text-overflow" title="' + main_company_arr[c_key][11] + '"><span>Premium : ' + main_company_arr[c_key][11] + '</span></h6></div><div class="clearfix"></div>' + details + load_view_page + ' </div> </div>';

                        });
                    }
                    $('#append_premium_calculator').append('<div class="row">' + filtered_policy_div + '</div>').slideDown();
                    $('html, body').animate({
                        scrollTop: $("#append_premium_calculator").offset().top
                    }, 1000);
                    // console.log(main_company_arr);
                } else {
                    $('#append_premium_calculator').html('<center><b>Data Not found</b></center>').slideDown();
                }

            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {

            }
        });
    }
}
var not_converted_sum_insured = "";
var converted_sum_insured = "";

function load_view(datas) {
    $("#append_premium_calculator_2").html("");
    var details = datas.split("#");
    var company = details[0];
    var policy_name = details[1];
    var policy_type = details[2];
    var policy_view = details[3];
    var sum_insured = filter_sum_insured;
    sum_insured = sum_insured.split("_");
    not_converted_sum_insured = sum_insured[0];
    converted_sum_insured = sum_insured[1];
    var Family_size = filter_Family_size;
    var total_premium = filter_Total_premium;

    var datas = company + "#" + policy_name + "#" + policy_type + "#" + policy_view + "#" + not_converted_sum_insured + "#" + converted_sum_insured;
    var save_Calculation = '<button id="save_calculation_submit" class="btn btn-danger btn-sm ml-1 mt-2" onclick="save_Calculation(\'' + datas + '\')"><b>Save</b></button>';
    // alert(company+" company");
    // alert(policy_name+" policy_name");
    // alert(policy_type+" policy_type");
    // alert(sum_insured+" sum_insured");
    // alert(not_converted_sum_insured+" not_converted_sum_insured");
    // alert(converted_sum_insured+" converted_sum_insured");
    // alert(Family_size+" Family_size");
    // alert(total_premium+" total_premium");
    // alert(policy_view+" policy_view");
    //alert(main_company_arr);
    //// console.log(main_company_arr);
    var company_array = main_company_arr;
    var prem_array = my_prem_arr;
    var member_array = member_arr;
    var url = BaseURl + "master/premium_calculator/load_premium_calculator_view";

    if (policy_view != "") {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            async: false,
            cache: false,
            data: {
                policy_view: policy_view,
                company_array: company_array,
                prem_array: prem_array,
                member_array: member_array,
                not_converted_sum_insured: not_converted_sum_insured,
                converted_sum_insured: converted_sum_insured,
            },
            beforeSend: function() {},
            success: function(data) {
                if (data == '{"userdata":[],"status":false}') {
                    $("#append_premium_calculator_2").html("");
                    $("#save_calculation").hide();
                    $("#save_calculation").empty();
                } else {
                    $("#append_premium_calculator_2").html(data);
                    $("#save_calculation").show();
                    $("#save_calculation").empty();
                    $("#save_calculation").append("<center>" + save_Calculation + "</center>");
                    // save_Calculation('\'" + datas + "'\')
                    // $("#save_calculation_submit").attr("onclick","load_view(\'' + datas + '\')");
                    $("#append_premium_calculator_2").focus();
                    $("#cgst_fire_per").val(9);
                    $("#sgst_fire_per").val(9);
                    $("#cgst_term_plan").val(9);
                    $("#sgst_term_plan").val(9);
                    $("#shopkeeper_cgst_fire_per").val(9);
                    $("#shopkeeper_sgst_fire_per").val(9);
                    $("#tot_owd_cgst_rate").val(9);
                    $("#tot_owd_sgst_rate").val(9);
                    $("#tot_owd_addon_cgst_rate").val(9);
                    $("#tot_owd_addon_sgst_rate").val(9);
                    $("#tot_btp_cgst_rate").val(9);
                    $("#tot_btp_sgst_rate").val(9);
                    $('html, body').animate({
                        scrollTop: $("#append_premium_calculator_2").offset().top
                    }, 1000);
                }
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {}
        });
    }
}

function save_Calculation(datas) {
    // alert(datas);?
    var details = datas.split("#");
    var company = details[0];
    var policy_name = details[1];
    var policy_type = details[2];
    var policy_view = details[3];
    var not_converted_sum_insured_data = not_converted_sum_insured;
    var converted_sum_insured_data = converted_sum_insured;
    // alert(not_converted_sum_insured_data);
    // alert(converted_sum_insured_data);


    // if (company == "United India Insurance Co Ltd") {
    //     if (policy_name == "Individual Health Insurance Policy" && policy_type == "Individual") {
    //         policy_view2 = "master/premium_calculator/policy_view/mediclaim/view_mediclaim";
    //         var individual_health_insurance_policy_ind = JSON.stringify(Total_Mediclaim_Individual_Health_Insurance_Policy_ind());
    //         var Individual_Health_Insurance_Policy_ind_cal = JSON.stringify(Total_calculation_table_Individual_Health_Insurance_Policy_ind());
    //     }
    // }
    var company_array = main_company_arr;
    var prem_array = my_prem_arr;
    var member_array = member_arr;
    var Family_size = filter_Family_size;
    var total_premium = filter_Total_premium;
    var group_id_val = group_id;


    var datas = company + "#" + policy_name + "#" + policy_type + "#" + policy_view + "#" + not_converted_sum_insured + "#" + converted_sum_insured;
    // var clone = $("#append_premium_calculator_2").clone();
    // var htmlForm = $('#append_premium_calculator_2').html();
    // var textForm = $('#append_premium_calculator_2').text();
    // alert(clone);$("#test").text());
    // $("#append_premium_calculator_3").append(clone);
    // alert(individual_health_insurance_policy_ind);
    // alert(Individual_Health_Insurance_Policy_ind_cal);
    // // console.log(clone);
    // // console.log(htmlForm);

    var url = BaseURl + "master/premium_calculator/save_raw_data";

    if (datas != "" && company != "") {
        $.ajax({
            url: url,
            data: {
                // htmlForm: htmlForm,
                // textForm: textForm,
                details: datas,
                company: company,
                policy_name: policy_name,
                policy_type: policy_type,
                not_converted_sum_insured_data: not_converted_sum_insured_data,
                converted_sum_insured_data: converted_sum_insured_data,
                policy_view: policy_view,
                // policy_view2: policy_view2,
                company_array: company_array,
                prem_array: prem_array,
                member_array: member_array,
                family_size: Family_size,
                total_premium: total_premium,
                group_id_val: group_id_val,
                // first_json: individual_health_insurance_policy_ind,
                // second_json: Individual_Health_Insurance_Policy_ind_cal,
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    setTimeout(function() {
                        window.location.href = BaseURl + 'master/premium_calculator/';
                    }, 1000);

                } else {
                    toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                }
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {

            }
        });
    }

}

function load_view_normal(policy_view) {
    $("#append_premium_calculator").html("");
    var url = BaseURl + "master/premium_calculator/load_premium_calculator_view";

    if (policy_view != "") {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            async: false,
            cache: false,
            data: {
                policy_view: policy_view,
            },
            beforeSend: function() {},
            success: function(data) {
                if (data == '{"userdata":[],"status":false}') {
                    $("#append_premium_calculator").html("");
                } else {
                    $("#append_premium_calculator").html(data);
                    $("#append_premium_calculator").focus();
                    $("#cgst_fire_per").text(9);
                    $("#sgst_fire_per").text(9);
                    $("#cgst_term_plan").text(9);
                    $("#sgst_term_plan").text(9);
                    $("#shopkeeper_cgst_fire_per").text(9);
                    $("#shopkeeper_sgst_fire_per").text(9);
                    $("#tot_owd_cgst_rate").text(9);
                    $("#tot_owd_sgst_rate").text(9);
                    $("#tot_owd_addon_cgst_rate").val(9);
                    $("#tot_owd_addon_sgst_rate").text(9);
                    $("#tot_btp_cgst_rate").text(9);
                    $("#tot_btp_sgst_rate").text(9);
                    $('html, body').animate({
                        scrollTop: $("#append_premium_calculator").offset().top
                    }, 1000);
                }
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {}
        });
    }
}


function Filter_Policy_Reset() {
    $("#search").attr("class", "");
    $("#search").attr("class", "btn btn-outline-secondary waves-effect width-md waves-light btn-sm");
    $("#search").text("");
    $("#search").text("Filter Off");
    $('#append_premium_calculator').html('').slideDown();
}

function getMonthFromString(mon) {
    return new Date(Date.parse(mon + " 1, 2012")).getMonth() + 1
}

function get_dob(filter_counter) {
    var rowCount = $('#first_table_filter tbody tr').length;

    if (filter_counter == 0) {
        var filter_member_relation = $('#filter_member_relation_' + filter_counter + ' option').filter(function() {
            return $(this).html() == "Self";
        }).val();
        $('#filter_member_relation_' + filter_counter).val("22");
    }

    var filter_member_name = $("#filter_member_name_" + filter_counter).val();
    var url = BaseURl + "master/policy/get_membernameBased_details";

    if (filter_member_name != "") {
        $.ajax({
            url: url,
            data: {
                member_name: filter_member_name
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    $('#filter_dob_' + filter_counter).val("");
                    var dob = data["userdata"].dob;
                    // alert(dob);
                    if (dob == "null") {
                        dob = "";
                        toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                    } else {
                        dob = dateFormate(dob);
                    }
                    // alert(dob);
                    $('#filter_dob_' + filter_counter).val(dob);
                    get_age(filter_counter);
                } else {
                    $('#filter_dob_' + filter_counter).val("");
                }
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {

            }
        });
    }
}

function get_age(filter_counter) {
    var filter_member_name = $("#filter_member_name_" + filter_counter).val();
    var filter_member_name_txt = $("#filter_member_name_" + filter_counter + " option:selected").text();
    var filter_dob = $("#filter_dob_" + filter_counter).val();
    var filter_relation = $("#filter_member_relation_" + filter_counter).val();
    var filter_relation_txt = $("#filter_member_relation_" + filter_counter + " option:selected").text();
    // alert(filter_dob);
    var url = BaseURl + "master/policy/get_age_calculation_basedon_dob";

    if (filter_member_name != "") {
        $.ajax({
            url: url,
            data: {
                member_id: filter_member_name,
                dob: filter_dob
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    $('#adult_age_' + filter_counter).val("");
                    var age = data["age"];
                    $('#adult_age_' + filter_counter).val(age);
                } else {
                    $('#adult_age_' + filter_counter).val("");
                }
                var age_cal = age + "_na";
                main_age[filter_counter] = age_cal;
                main_member_filter_Det[filter_counter] = [filter_member_name, filter_member_name_txt, filter_dob, age, filter_relation, filter_relation_txt];
                // main_age.push(age_cal);
                //// console.log(main_member_filter_Det);
                // alert(main_age);
            },
            error: function(xhr, status) {
                alert('Sorry, there was a problem!');
            },
            complete: function(xhr, status) {

            }
        });
    }
}

function get_AgeFromDatepicker(filter_counter) {
    // var hidden = $("#filter_member_name_input_" + filter_counter).is(":visible");
    // if(hidden == true){

    // }
    var filter_member_name = $("#filter_member_name_inp_" + filter_counter).val();
    var filter_dob = $("#filter_dob_" + filter_counter).val();
    var filter_relation = $("#filter_member_relation_" + filter_counter).val();
    var filter_relation_txt = $("#filter_member_relation_" + filter_counter + " option:selected").text();

    $("#child_age_div_" + filter_counter).hide();
    var dob = $("#filter_dob_" + filter_counter).val();
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
    // alert(age);
    $('#adult_age_' + filter_counter).val(age);

    var child_age = "na";
    var Difference_In_Time = today.getTime() - dob.getTime();
    age_in_days = Math.floor((Difference_In_Time) / (1000 * 3600 * 24));
    if (age_in_days <= 91) {
        child_age = age_in_days;
        // alert(age_in_days);
        $("#child_age_div_" + filter_counter).show();
        $("#child_age_" + filter_counter).val(age_in_days);

    }
    var age_cal = age + "_" + child_age;
    main_age[filter_counter] = age_cal;
    if (age == 0) {
        age = child_age;
    }
    main_member_filter_Det[filter_counter] = [filter_member_name, filter_dob, age, filter_relation, filter_relation_txt];
    //// console.log(main_member_filter_Det);
    main_age.push(age_cal);
}

function toggle_member_data(counter) {
    $("#collapseOne_" + counter).toggle();
}