var title = 'Mytex ';
var controller = 'Mytex';

$(document).ready(function() {
    getPackingType(true)
    getItemPacking(true)
    getItems(true)
    getPriceList(true)
    getCutList();
});
$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type, true)
});

function CallTable(type, flag){
     if(flag == false){
        RemoveRow(type)
    }

    if(type == "packing_type"){
        getPackingType(flag);
    }else if(type == "item_packing"){
        getItemPacking(flag);
    }else if(type == "items"){
        getItems(flag);
        getPriceList(true);
    }else if(type == 'price_list'){
        getPriceList(flag)
    }
}


//***********************Mytex Packing Type********************************************//

function getPackingType(flag){
    if(flag == true){
        DrawDataTable('#packing_typeTable','packing_type','MytexPackingType', 'Mytex Packing Type List',[0,2,3,4],[0,1],[0,1],[3,4]);
    }
    // DrawDataTable('#packing_typeTable','packing_type','MytexPackingType', 'Mytex Packing Type List',[0,1,2],[3],[0,3],[2]);
    getPackingTypeList();
}

$(document).on("click", ".getPackingTypeDetail" , function(e) {
    var id      = $(this).data('id');
    var formId  = 'frm_packing_type';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/packing_type/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="packing_name"]').val(data[0].packing_name)
                $('#'+formId+' input[name="cost"]').val(data[0].cost)
                $('#'+formId+' input[name="psc"]').val(data[0].psc)
                showReset(formId)
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});



//***********************Mytex Item Packing********************************************//

function getItemPacking(flag){
    if(flag == true){
        DrawDataTable('#item_packingTable','item_packing','MytexItemPacking', 'Mytex Item Packing List',[0,2,3],[0,1],[0,1],[3]);
    }
    getItemPackingList();
    getItemPackingType();
}

$(document).on("click", ".getItemPackingDetail" , function(e) {
    var id = $(this).data('id');
    var formId  = 'frm_item_packing';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/item_packing/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' select[name="packing_type_id"]').val(data[0].packing_type_id)
                $('#'+formId+' select[id="cut_id"]').val(data[0].cut_id)
                $('#cut_id').selectpicker('refresh');
                showReset(formId)
                
            }else if(status == false){
                $('#is_current').prop('checked',false);
                toastr.error(message);
                $(".resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})


//***********************Mytex Item Table********************************************//

function getItems(flag){
    if(flag == true){
        DrawDataTable('#itemsTable','items','MytexItems', 'Mytex Items List',[0,2,3],[0,1],[0,1]);
    }
    getItemsList();
}
    
$(document).on("click", ".getItemsDetails" , function(e) {
    var id = $(this).data('id');
    var formId  = 'frm_items';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/items/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="item_name"]').val(data[0].item_name)
                $('#'+formId+' input[name="per_meter_pp"]').val(data[0].per_meter_pp)
                showReset(formId)
                
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

//***********************Mytex Item Table********************************************//

function getPriceList(flag){
    if(flag == true){
        DrawDataTable('#price_listTable','price_list','MytexPricing', 'Mytex Pricing List',[0,3,4,5,6,7,8,9,10],[0,1,2],[0,1,2,3,4],[7,9],true,"3,6,7",'landscape');
    }
    // DrawDataTable(table_id,file_name, title,show_columns,url,orderable,center_align, right_align)
}


$(document).on("click", ".getPriceListDetails" , function(e) {
    // alert('getPriceListDetails');
    var id = $(this).data('id');
    var formId  = 'frm_price_list';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/price_list/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message } = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' select[name="items_id"]').val(data[0].items_id)
                $('#'+formId+' select[name="item_packing_id"]').val(data[0].item_packing_id)
                $('#'+formId+' input[name="pp"]').val(data[0].pp)
                $('#'+formId+' input[name="sp"]').val(data[0].sp)
                $('#'+formId+' [name="notes"]').val(data[0].notes)
               showReset(formId)
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

//***********************Drop Down Functions*******************************************//

function getPackingTypeList(){
    console.log('getPackingTypeList');
    $("#packing_type_id").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/packing_type/0",
        dataType: 'json',
        success : function(resData){
            console.log(resData);
            var {status, data, message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#packing_type_id").append("<option value=''>Select Mytex Packing Type</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['packing_name'];
                    // var name = data[i]['name'];
                    $("#packing_type_id").append("<option value='"+name+"'>"+value+"</option>");
                }                  
            }
        },error: function(){}
   });
}

function getCutList(){
    $("#cut_id").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/cut/0",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                // $("#cut_id").append("<option value=''>Select Mytex cut</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['cut'];
                    // var name = data[i]['name'];
                    $("#cut_id").append("<option value='"+name+"'>"+value+"</option>");
                }
                $('#cut_id').selectpicker('refresh');
                // $('#cut_id').selectpicker();                  
            }
        },error: function(){}
   });
}

function getItemsList(){
    $("#items_id").empty();
    $("#c_item_name").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/items/0",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#items_id").append("<option selected data-pp='a'  value=''>Select Mytex Items</option>");
                $("#c_item_name").append("<option selected data-pp='a'  value=''>Select Item </option>");
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var item_name = data[i]['item_name'];
                    var pp = data[i]['per_meter_pp'];
                    // var name = data[i]['name'];
                    $("#items_id").append("<option data-pp='"+pp+"' data-item_name='"+item_name+"' value='"+id+"'>"+item_name+"</option>");
                    $("#c_item_name").append("<option data-pp='"+pp+"' data-item_name='"+item_name+"' value='"+id+"'>"+item_name+"</option>");
                }                  
            }
        },error: function(){}
   });
}

function getItemPackingList(){
    $("#item_packing_id").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/item_packing/0",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#item_packing_id").append("<option selected data-cost='a' data-psc='a' data-cut='a' value=''>Select Mytex Item Packing</option>");
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var packing_name = data[i]['packing_name'];
                    var cost = data[i]['cost'];
                    var psc = data[i]['psc'];
                    var cut = data[i]['cut'];
                    var packing_type_id = data[i]['packing_type_id'];
                    var cut_id = data[i]['cut_id'];
                    $("#item_packing_id").append("<option data-cost='"+cost+"' data-psc='"+psc+"' data-cut='"+cut+"' value='"+id+"'>"+packing_name+" - "+cut+"</option>");
                }                  
            }
        },error: function(){}
   });
}

function getItemPackingType(){
    $("#packing_types").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/packing_types/0",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                // $("#packing_types").append("<option selected data-cost='a' data-cut='a' value=''>Select Mytex Item Packing</option>");
                for( var i = 0; i<len; i++){
                    // var id = data[i]['id'];
                    var packing_name = data[i]['packing_name'];
                    var cost = data[i]['cost'];
                    var cut = data[i]['cuts'];
                    var packing_type_id = data[i]['packing_type_id'];
                    var cut_id = data[i]['cut_id'];
                    $("#packing_types").append("<option data-cost='"+cost+"' data-cut='"+cut+"' value='"+packing_type_id+"'>"+packing_name+" - "+cut+"</option>");
                } 
                $('#packing_types').selectpicker('refresh');                 
            }
        },error: function(){}
   });
}

//***********************Common Functions*******************************************//

$(document).on("click", ".saveData" , function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid         = $(this).attr('id');
    var mytype     = $(this).data('type');
    formId = $(this).data('form');
    $("#toaster").remove();
    var formdata = $("#"+formId).serialize();
    console.log(formdata)
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
                    reset(formId);
                    CallTable(mytype, true);
                    if(mytype == 'items'){
                        $("#ResponseMsg").html(message);
                        $("#msg-modal").modal('show');
                    }else{
                        toastr.success(message);
                    }
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

$(document).on("click", "#createpricelist" , function(e) {
    e.preventDefault();
    var pp = $("#c_item_name :selected").data('pp');
    var item_name = $("#c_item_name :selected").data('item_name');
    $("#npp").val(pp); 
    $("#item_name").val(item_name); 
    toastr.remove();
    formId = $(this).data('form');
    var formdata = $("#"+formId).serialize();
    console.log(formdata)
    // alert(formId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/"+controller+"/createpricelist",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#createpricelist").startLoading();
        },
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            console.log(message)
            if (validate === true) {
                if(status === true){
                    $("#myMsg").html(message);
                    $("#msg").show();
                    $("#frm").hide();
                    $("#createpricelist").hide();
                    getPriceList();
                    reset(formId);
                    $('#packing_types').selectpicker('refresh'); 
                    $('#closebtn1').focus();
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
            $("#createpricelist").stopLoading();
        }, complete:function(data){
            $("#createpricelist").stopLoading();
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
                 if(mytype=="items"){
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

var pp      = 0;
var cut     = 0;
var cost    = 0;
var psc     = 0;

$(document).on("change", "#item_packing_id, #items_id" , function(e) {
    pp = $("#items_id :selected").data('pp');
    cost = $("#item_packing_id :selected").data('cost');
    cut = $("#item_packing_id :selected").data('cut');
    psc = $("#item_packing_id :selected").data('psc');
    // console.log('pp:'+pp+' cost: '+cost+'  cut: '+cut);
    if(pp == 'a' || cost == 'a' || cut == 'a'){
        $("#pp").val('');
        $("#sp").val('');
        // console.log('dont calculate');
    }else{
        // console.log('calculate');
        calculatePP();
    }
});

function calculatePP(){

    // 1.2, 1.3, 2.8, 3.0

    // 2.6, 3.6

    var multiplier = 0;
    if(cut == '1.20' || cut == '1.30' || cut == '2.80' || cut == '3.00'){
        multiplier = 1;
        mcut = cut;
    }else if(cut == '2.60'){
        multiplier = 2;
        mcut = 1.30;

    }else if(cut == '3.60'){
        multiplier = 3;
        mcut = 1.20;
    }
    pp         = parseFloat(pp) - parseFloat(2);
    // var pp_cut = parseFloat(pp) * parseFloat(mcut);
    var pp_cut = Number(pp * (Number(mcut) * 10)) / 10;
    if(cut != '3.00'){
        var mod = parseFloat(pp_cut) % 5 ;
        if(mod <= 3){
            pp_cut = parseFloat(pp_cut) - parseFloat(mod);
        }else{
            pp_cut = parseInt(pp_cut);
        }
    }
    ppp = (parseFloat(pp_cut)  * multiplier) + parseFloat(cost);
    $("#pp").val(ppp);


// Calculate SP
    var pp_cut12 = parseFloat(pp) * parseFloat(1.20);
    var mod = parseFloat(pp_cut12) % 5 ;
    if(mod <= 3){
        pp_cut12 = parseFloat(pp_cut12) - parseFloat(mod);
    }else{
        pp_cut12 = parseInt(pp_cut12);
    }
    pp_12   = parseFloat(pp_cut12);
    mpp_12  = parseFloat(pp_12) + parseFloat(10);
    modsp   = parseFloat(mpp_12) % 5;
    if(modsp > 0 ){
        sp_12   = parseFloat(mpp_12) + (5 - parseFloat(modsp));
    }else{
        sp_12   = parseFloat(mpp_12);
    }

    spp = Math.round((parseFloat(sp_12) / parseFloat(1.20)) * parseFloat(mcut)) ;
    spp = (parseFloat(spp) * multiplier) + psc;
    $("#sp").val(spp);


}


$("#con-close-modal").on('hidden.bs.modal', function (e) {
    // console.log('createpricelist');
    // reset('vishnuPricingTable');
    $(".frm_price_list").focus();
  // do something…
})

$('#msg-modal').on('hidden.bs.modal', function (e) {
    $(".frm_items").focus();
  // do something…
})

