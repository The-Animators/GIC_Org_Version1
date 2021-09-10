'use strict';
var title = 'User';
var controller= 'user';
var formId = '';
var table = $('#datatable-buttons').DataTable();

$(document).ready(function () {
    callList();
});

$(document).on("click", ".refresh" , function(e) {
    callList();
    // table.ajax.reload(null,true);
});

function callList(){
    DrawDataTable('#table_users','','UserList', 'Users List',[0,1,2,3,4,5,6],[7],[0,5,6,7]);        
}

function callList1(){
    // alert(base_url+'Api/area/list');
    table = $('#datatable-buttons').DataTable({
        destroy:true,
        "processing": true,
        "language": {
            "processing": loader
        },
        aaSorting: [],
        'ajax': {
            "type": "GET",
            "url": base_url + 'Api/user',
        },

        'columns': [
            { 'data': 'full_name' },
            { 'data': 'username' },
            { 'data': 'email' },
            { 'data': 'mobile' },
            {
                // 'data': 'admin_type',
                'render': function(data, type, row, meta) {
                	let admin_type;
                	if(row.admin_type==1){
                		status = `<span class="badge badge-info">Admin</span>`;
                	}else{
                		status = `<span class="badge badge-warning">Normal</span>`;
                	}
                    
                    return status;
                }
            },
            {
                // 'data': 'status',
                'render': function(data, type, row, meta) {
                    let status;
                    if(row.activated==1){
                        status = `<span class="badge badge-success">Active</span>`;
                    }else{
                        status = `<span class="badge badge-warning">In active</span>`;
                    }
                    
                    return status;
                }
            },
            {
                // 'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = `
                    <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-info nowrap getdetail"  data-type="user"> <i class="fa fa-edit" title="Edit"></i> Edit </button>
                    <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-danger nowrap delete" data-name="User" data-type="user"> <i class="fa fa-close pad-left-5" title="Delete"></i> Delete</button>

                    `;
                    return action;
                }
            }
        ], // columns
         mark: {
                element: 'span',
                className: 'highlight'
            },
    });
}

$(document).on("click", "#add" , function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = 'add';
    formId = $(this).data('form');
    $("#toaster").remove();
    var formdata = $("#"+formId+" :input").serialize();
    // alert(base_url+"Api/login/signin");
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/User",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                    $('#'+formId)[0].reset();
                    callList();
                    reset('formData');
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        toastr.error(value);
                        $("#"+formId+" input[name="+key+"]").val('').focus();
                        // $("input[name="+key+"]").focus();
                        return false;
                    }
                });
            }
        }, error: function(){
            $("#"+btnid).stopLoading();
        }, complete:function(data){
            $("#"+btnid).stopLoading();
        }
   });
   return false;  //stop the actual form post !important!
});

function confirmdelete(id){
    $.ajax({
        type    : "DELETE",
        url     : base_url+"Api/user/"+id,
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                callList();
                reset('formData');
                $("#id").val(0);
                swal(modaltitle+" Successfully Deleted! ", {
                    icon: "success",
                    timer: 2000,
                });
            }else if(status == false){
                // $.toaster(message, 'Error', 'danger');
                swal("Eroror On Deleteing "+modaltitle+"!", {
                    icon: "danger",
                    timer: 2000,
                });
                return false;
            }
        },error: function(){}
   });
}

$(document).on("click", ".getdetail" , function(e) {
    
    var id = $(this).data('id');
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/user/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
                $("#full_name").val(data[0].full_name);
                $("#mobile").val(data[0].mobile);
                $("#username").val(data[0].username);
                $("#email").val(data[0].email);
                $("#activated").val(data[0].activated);
                $("#admin_type").val(data[0].admin_type);
                $("#id").val(data[0].id);
                // $("#pswdWrap").hide();
                // $("#resetbtn").show();
                $('#formData button[name="resets"]').show()
                $("#password, #confirm-password").prop('disable',true);
                topFunction();
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                // $("#pswdWrap").show();
                 $('#formData button[name="resets"]').hide()
                // $("#resetbtn").hide();
                $("#password, #confirm-password").prop('disable',false);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});