'use strict';
var title       = 'KDM';
var controller  = 'kdm';
var formId      = '';
// var table       = $('#kdmTable').DataTable();

$(document).ready(function () {
    callList();
     $("#item_name").focus();
});

$(document).on("click", ".refresh" , function(e) {
    callList();
    // table.ajax.reload(null,true);
});

function callList(){
    DrawDataTable('#kdmTable','','KDMList', 'KDM List',[0,3,4,5,6,7],[0],[0,1,2,4,6],[5],true,6);
}

function UpdateTable(){
    var type = 'kdm';
    RemoveRow(type)
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
        url     : base_url+"Api/kdm",
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
                    // $('#'+formId)[0].reset();
                    callList();
                    reset('frm_kdm');
                    // $("#item_name").focus();
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

function confirmdelete(id, mytype, name){
    $.ajax({
        type    : "DELETE",
        url     : base_url+"Api/kdm/"+id,
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                toastr.success(message);
                reset('frm_kdm');
                UpdateTable()
            }else if(status == false){
                toastr.error(message);
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
        url     : base_url+"Api/kdm/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $("#id").val(data[0].id);
                $("#item_name").val(data[0].item_name);
                $("#purchase_price").val(data[0].purchase_price);
                $("#selling_price").val(data[0].selling_price);
                $("#item_report").val(data[0].item_report);
                $("#notes").val(data[0].notes);
                $('button[name="resets"]').show();
                $("#item_name").focus();
                topFunction();
            }else if(status == false){
                $.toaster(message, 'Error', 'danger');
                $('button[name="resets"]').hide()
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});
