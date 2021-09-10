var title = 'Narsing ';
var controller = 'Narsing';
$(document).ready(function() {
	getItemTable(true)
    getDesignTable(true)
    getPriceTable(true)
});

$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type, true)
});

function CallTable(type,flag){

    if(flag == false){
        RemoveRow(type)
    }
    if(type == "main"){
        getItemTable(flag);
        getDesignTable(true);
        getPriceTable(true);
    }else if(type == "design"){
        getDesignTable(flag);
    }else if(type == "price"){
        getPriceTable(flag);
    }
}

//***********************Narsing Item Table********************************************//

function getItemTable(flag){
    if(flag == true){
        DrawDataTable('#mainTable','main','NarsingItems', 'Narsing Items List',[0,1],[0,1],[0,2]);
    }
    getItemDesign();
    getPriceList();
}

$(document).on("click", ".getMaindetail" , function(e) {
    var id      = $(this).data('id');
    var formId  = 'frm_main';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/main/"+id,
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="item_name"]').val(data[0].item_name)
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();
                $("."+formId).focus();
                topFunction();
            }else if(status == false){
                toastr.error(message);
                reset(formId);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});

//***********************Narsing Item Design********************************************//

function getDesignTable(flag){
    if(flag == true){
        DrawDataTable('#designTable','design','NarsingItemDesign', 'Narsing Item Design List',[0,2,3,4],[0,1],[1]);
    }
    getPriceList();
}

$(document).on("click", ".getDesigndetail" , function(e) {
    var id = $(this).data('id');
    var formId  = 'frm_design';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/design/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' select[name="item_id"]').val(data[0].item_id)
                $('#'+formId+' input[name="design_number"]').val(data[0].design_number)
                $('#'+formId+' input[name="kumar_item_no"]').val(data[0].kumar_item_no)
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();
                $("."+formId).focus();
                topFunction();
                
            }else if(status == false){
                toastr.error(message);
                reset(formId);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

function getItemDesign(){
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/main/0",
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, data} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#item_id").empty();
                $("#item_id").append("<option value=''>Select Narsing Item</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['item_name'];
                    // var name = data[i]['name'];
                    $("#item_id").append("<option value='"+name+"'>"+value+"</option>");
                }                  
            }else if(status == false){
                toastr.error(message);
            }
        },error: function(){}
   });
}
//***********************Neep Item Table********************************************//

function getPriceTable(flag){
    if(flag == true){
        DrawDataTable('#priceTable','price','NarsingPriceList', 'Narsing Price List',[0,3,4,5,6,7,8,9,10,11,12,13,14],[0,1,2,3,4],[0,1,2,3,4],[10,11,12,13],true,'3','landscape');
    }
}

$(document).on("click", ".getPriceDetail" , function(e) {
    var id = $(this).data('id');
    var formId  = 'frm_price';
    e.preventDefault();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/price/"+id,
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' select[name="item_design_id"]').val(data[0].item_design_id)
                $('#'+formId+' input[name="pp_12"]').val(data[0].pp_12)
                $('#'+formId+' input[name="pp_13"]').val(data[0].pp_13)
                $('#'+formId+' input[name="pp_26"]').val(data[0].pp_26)
                $('#'+formId+' input[name="pp_36"]').val(data[0].pp_36)

                $('#'+formId+' input[name="sp_12"]').val(data[0].sp_12)
                $('#'+formId+' input[name="sp_13"]').val(data[0].sp_13)
                $('#'+formId+' input[name="sp_26"]').val(data[0].sp_26)
                $('#'+formId+' input[name="sp_36"]').val(data[0].sp_36)
                $('#'+formId+' [name="notes"]').val(data[0].notes)
                if(data[0].is_current ==1){
                    $('#is_current').prop('checked',true);
                }else{
                    $('#is_current').prop('checked',false);
                }
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();
                $("."+formId).focus();
                topFunction();
                
            }else if(status == false){
                // $('#is_current').prop('checked',false);
                toastr.error(message);
                reset(formId);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

function getPriceList(){
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/main/0",
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, data} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#item_design_id").empty();
                $("#item_design_id").append("<option value=''>Select Narsing Item Design</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['item_name'];
                    // var design_number = data[i]['design_number'];
                    // var name = data[i]['name'];
                    // $("#item_design_id").append("<option value='"+name+"'>"+value+"  D.No. "+design_number+"</option>");
                    $("#item_design_id").append("<option value='"+name+"'>"+value+"  </option>");
                }                  
            }else if(status == false){
                toastr.error(message);
            }
        },error: function(){}
   });
}

//***********************Common Functions*******************************************//


$(document).on("click", ".saveData" , function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid         = $(this).attr('id');
    var narsingType     = $(this).data('type');
    formId = $(this).data('form');
    $("#toaster").remove();
    var formdata = $("#"+formId).serialize();
    console.log(formdata)
    // alert(formId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/"+controller+"/"+narsingType,
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#"+btnid).startLoading();
        },
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            // console.log(message)
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                    reset(formId);
                    CallTable(narsingType, true);
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value != ''){
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
    toastr.remove();
    $.ajax({
        type    : "DELETE",
        url     : base_url+"Api/"+controller+"/"+id+"/"+mytype,
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                toastr.success(message);
                CallTable(mytype, false);
                $('input[name="id"]').val(0);
            }else if(status == false){
                if(mytype=="main"){
                    deleteAll(id, name, mytype);
                }else{
                    toastr.error(message);
                }
                return false;
            }
        },error: function(){}
   });
}

function confirmalldelete(id, mytype, name){
    toastr.remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/delete/"+id+"/"+mytype,
        dataType: 'json',
        success : function(resData){
            var {status, message} = resData;
            if(status === true){
                console.log('status:'+status);
                toastr.success(message);
                CallTable(mytype, false);
                $('input[name="id"]').val(0);
            }else if(status == false){
                toastr.error(message);
                return false;
            }
        },error: function(){}
   });
}