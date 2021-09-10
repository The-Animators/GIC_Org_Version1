var title = 'Neepa ';
var controller = 'Neepa';
$(document).ready(function() {
	getMainTable(true)
    getRateTable(true)
    getItemTable(true)
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
        getMainTable(flag)
    }else if(type == "rate"){
        getRateTable(flag);
    }else if(type == "item"){
        getItemTable(flag);
    }
}


    //***********************Neep Main Table********************************************//

    function getMainTable(flag){
        if(flag == true){
            DrawDataTable('#mainTable','main','NeepaPricingScheme', 'Neepa Pricing Scheme List',[0,2,3,4],[0,1],[0,4],[3],'',4);        
        }
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
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="selling_price"]').val(data[0].selling_price)
                    $('#'+formId+' input[name="purchase_price"]').val(data[0].purchase_price)
                    $('#'+formId+' select[name="instruction"]').val(data[0].instruction)
                    // reset(formId);
                    $('#'+formId+' button[name="resets"]').show();
                    $("."+formId).focus();
                    topFunction();
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    reset(formId);
                    // $("#resetMain").hide();
                    return false;
                }
            },error: function(){}
       });
       return false;  //stop the actual form post !important!
    });


    //***********************Neep Rate Table********************************************//

    function getRateTable(flag){
        if(flag == true){
            DrawDataTable('#rateTable','rate','NeepaRateWorking', 'Neepa Rate Working List',[0,2,3,4,5,6,7,8,9,10,11,12,13],[0,1],[0,1],[], '', '', 'landscape');        
        }
        getItemPP()
    }

    $(document).on("click", ".getRatedetail" , function(e) {
        var id = $(this).data('id');
        var formId  = 'frm_rate';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/rate/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="pp_12"]').val(data[0].pp_12)
                    $('#'+formId+' input[name="pp_13"]').val(data[0].pp_13)
                    $('#'+formId+' input[name="pp_26"]').val(data[0].pp_26)
                    $('#'+formId+' input[name="pp_28"]').val(data[0].pp_28)
                    $('#'+formId+' input[name="pp_30"]').val(data[0].pp_30)
                    $('#'+formId+' input[name="pp_36"]').val(data[0].pp_36)

                    $('#'+formId+' input[name="sp_12"]').val(data[0].sp_12)
                    $('#'+formId+' input[name="sp_13"]').val(data[0].sp_13)
                    $('#'+formId+' input[name="sp_26"]').val(data[0].sp_26)
                    $('#'+formId+' input[name="sp_28"]').val(data[0].sp_28)
                    $('#'+formId+' input[name="sp_30"]').val(data[0].sp_30)
                    $('#'+formId+' input[name="sp_36"]').val(data[0].sp_36)
                    // reset(formId);
                    $('#'+formId+' button[name="resets"]').show();
                    $("."+formId).focus();
                    topFunction();
                    
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                    reset(formId);
                    return false;
                }
            },error: function(){}
       });
       return false;  //stop the actual form post !important!
    })
    

    //***********************Neep Item Table********************************************//
    
    function getItemTable(flag){
        if(flag == true){
            DrawDataTable('#itemTable','item','NeepaItems', 'Neepa Items List',[0,3,4,5,6,7,8,9,10,11,12,13,14,15,16],[1],[0,1,2],[10,11,12,13,14,15],2,'','landscape','LEGAL');//landscape        
        }
    }

    $(document).on("click", ".getItemdetail" , function(e) {
        var id = $(this).data('id');
        var formId  = 'frm_item';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/item/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="item_name"]').val(data[0].item_name)
                    $('#i_pp_12').val(data[0].pp_12)
                    $('#'+formId+' input[name="pp_13"]').val(data[0].pp_13)
                    $('#'+formId+' input[name="pp_26"]').val(data[0].pp_26)
                    $('#'+formId+' input[name="pp_28"]').val(data[0].pp_28)
                    $('#'+formId+' input[name="pp_30"]').val(data[0].pp_30)
                    $('#'+formId+' input[name="pp_36"]').val(data[0].pp_36)

                    $('#'+formId+' input[name="sp_12"]').val(data[0].sp_12)
                    $('#'+formId+' input[name="sp_13"]').val(data[0].sp_13)
                    $('#'+formId+' input[name="sp_26"]').val(data[0].sp_26)
                    $('#'+formId+' input[name="sp_28"]').val(data[0].sp_28)
                    $('#'+formId+' input[name="sp_30"]').val(data[0].sp_30)
                    $('#'+formId+' input[name="sp_36"]').val(data[0].sp_36)
                    $('#'+formId+' [name="notes"]').val(data[0].notes)
                    // reset(formId);
                    $('#'+formId+' button[name="resets"]').show();
                    $("."+formId).focus();
                    topFunction();
                    
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                   reset(formId);
                    return false;
                }
            },error: function(){}
       });
       return false;  //stop the actual form post !important!
    })

    $(document).on('change', '.pp_12', function(){
        let formId = 'frm_item';
        var pp_12  = $(this).val();
        if(pp_12){

            $('#'+formId+' input[name="pp_12"]').val(pp_12)
            $('#'+formId+' input[name="pp_13"]').val($('option:selected', this).data('pp13'))
            $('#'+formId+' input[name="pp_26"]').val($('option:selected', this).data('pp26'))
            $('#'+formId+' input[name="pp_28"]').val($('option:selected', this).data('pp28'))
            $('#'+formId+' input[name="pp_30"]').val($('option:selected', this).data('pp30'))
            $('#'+formId+' input[name="pp_36"]').val($('option:selected', this).data('pp36'))

            $('#'+formId+' input[name="sp_12"]').val($('option:selected', this).data('sp12'))
            $('#'+formId+' input[name="sp_13"]').val($('option:selected', this).data('sp13'))
            $('#'+formId+' input[name="sp_26"]').val($('option:selected', this).data('sp26'))
            $('#'+formId+' input[name="sp_28"]').val($('option:selected', this).data('sp28'))
            $('#'+formId+' input[name="sp_30"]').val($('option:selected', this).data('sp30'))
            $('#'+formId+' input[name="sp_36"]').val($('option:selected', this).data('sp36'))

        }else{
            $('#'+formId+' input[type="text"]:not(".pp_12")').val('');
        }
    })

    function getItemPP(){

        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/rate/0",
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data} = resData;
                if(status === true){
                    var len = data.length;
                    $("#i_pp_12").empty();
                    $("#i_pp_12").append("<option value=''>Select PP 1.2</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['pp_12'];
                        // var pp_13 = data[i]['pp_13'];
                        // var name = data[i]['name'];
                        $("#i_pp_12").append("<option data-pp13='"+data[i]['pp_13']+"' data-pp26='"+data[i]['pp_26']+"' data-pp28='"+data[i]['pp_28']+"' data-pp30='"+data[i]['pp_30']+"' data-pp36='"+data[i]['pp_36']+"' data-sp12='"+data[i]['sp_12']+"' data-sp13='"+data[i]['sp_13']+"' data-sp26='"+data[i]['sp_26']+"' data-sp28='"+data[i]['sp_28']+"' data-sp30='"+data[i]['sp_30']+"' data-sp36='"+data[i]['sp_36']+"' value='"+name+"'>"+name+"</option>");
                    }                  
                }else if(status == false){
                    $.toaster(message, 'Error', 'danger');
                }
            },error: function(){}
       });
    }

    //***********************Common Functions*******************************************//


    $(document).on("click", ".saveData" , function(e) {
        e.preventDefault();
        toastr.remove();
        var btnid   = $(this).attr('id');
        var mytype  = $(this).data('type');
        formId = $(this).data('form');
        $("#toaster").remove();
        var formdata = $("#"+formId).serialize();
        // console.log(formdata)
        // alert(formId);
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/"+controller+"/"+mytype,
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
                        CallTable(mytype, true);
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
                    // $.toaster(message, 'Error', 'danger');
                    toastr.error(message);
                    return false;
                }
            },error: function(){}
       });
    }

 