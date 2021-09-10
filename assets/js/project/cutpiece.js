var title = 'Cutpiece ';
var controller = 'cutpiece';
$(document).ready(function() {
	getBookList(true)
    getQuotaHead(true);
    getSuppliers(true);
    getItemType(true);
    getBoxPacking(true);
    getPurchasePrice(true);
    getSalesPrice(true);
    getFixedItems(true);
});

$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type, true)
});

function CallTable(type,flag){
    if(flag == false){
        RemoveRow(type)
    }
    if(type == "booklist"){
        getBookList(flag)
    }else if(type == "quotahead"){
        getQuotaHead(flag);
    }else if(type == "suppliers"){
        getSuppliers(flag);
    }else if(type == "itemtype"){
        getItemType(flag);
    }else if(type == "boxpacking"){
        getBoxPacking(flag);
    }else if(type == "purchaseprice"){
        getPurchasePrice(flag);
    }else if(type == "salesprice"){
        getSalesPrice(flag);
    }else if(type == "fixeditems"){
        getFixedItems(flag);
    }
}

    //***********************Book List Table********************************************//

    function getBookList(flag){
        if(flag == true){
            DrawDataTable('#booklistTable','booklist','CutPieceBookList', 'Cut Piece Shirting Book List',[0,2,3,4,5,6],[1],[0,1,2,3]);        
        }
    }

    $(document).on("click", ".getBookList" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/booklist/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="start_no"]').val(data[0].start_no)
                    $('#'+formId+' input[name="end_no"]').val(data[0].end_no)
                    $('#'+formId+' input[name="items"]').val(data[0].items)
                    $('#'+formId+' input[name="category"]').val(data[0].category)
                    $('#'+formId+' [name="notes"]').val(data[0].notes)
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


    //***********************Quota Head Table********************************************//

    function getQuotaHead(flag){
        if(flag == true){
            DrawDataTable('#quotaheadTable','quotahead','CutPieceQuotaHeads', 'Cut Piece Quota Heads List',[0,2,3,4,5],[1],[0,1],[],false,4);        
        }
        // getItemPP()
    }

    $(document).on("click", ".getQuotaHead" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/quotahead/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="our_head"]').val(data[0].our_head)
                    $('#'+formId+' input[name="branch_head"]').val(data[0].branch_head)
                    $('#'+formId+' select[name="status"]').val(data[0].status)
                    $('#'+formId+' [name="notes"]').val(data[0].notes)
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
    

    //***********************Suppliers Table********************************************//

    function getSuppliers(flag){
        if(flag == true){
            DrawDataTable('#suppliersTable','suppliers','CutPieceSuppliers', 'Cut Piece suppliers List',[0,2,3,4],[1],[0,1]);        
        }
        FillSuppliers();
    }

    $(document).on("click", ".getSuppliers" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/suppliers/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="trade_name"]').val(data[0].trade_name)
                    $('#'+formId+' input[name="firm_name"]').val(data[0].firm_name)
                    $('#'+formId+' [name="notes"]').val(data[0].notes)
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
    
    //***********************Suppliers Table********************************************//

    function getItemType(flag){
        if(flag == true){
            DrawDataTable('#itemtypeTable','itemtype','CutPieceItemType', 'Cut Piece Item Type List',[0,2],[1],[0,1]);        
        }
        FillItemType();
    }

    $(document).on("click", ".getItemType" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/itemtype/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="item_type"]').val(data[0].item_type)
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
    

    //***********************Box Packing********************************************//
    
    function getBoxPacking(flag){
        if(flag == true){
            DrawDataTable('#boxpackingTable','boxpacking','CutPieceBoxPacking', 'Cut Piece Box Packing List',[0,3,4,5,6,7,8,9,10,11,12],[1],[0,1,2],[6,7,8],true,'5,9,10','landscape');
        }
    }

    $(document).on("click", ".getBoxPacking" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/boxpacking/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="item_name"]').val(data[0].item_name)
                    // $('#i_pp_12').val(data[0].pp_12)
                    $('#'+formId+' select[name="supplier_id"]').val(data[0].supplier_id)
                    var itemtypes       = data[0].item_type_id;
                    var trainindIdArray = itemtypes.split(',');
                    $('#item_type_1').selectpicker('val', trainindIdArray);
                    // $.each(trainindIdArray, function(index, value) { 
                        // $('#item_type_1').val(value);
                        // console.log(index + ': ' + value);   // alerts 0:[1 ,  and  1:2]
                    // });
                    $('#item_type_1').selectpicker('refresh');
                    $('#'+formId+' select[name="instruction"]').val(data[0].instruction)
                    $('#'+formId+' select[name="status"]').val(data[0].status)
                    $('#'+formId+' select[name="report"]').val(data[0].report)
                    $('#'+formId+' input[name="cut"]').val(data[0].cut)
                    $('#'+formId+' input[name="pp"]').val(data[0].pp)
                    $('#'+formId+' input[name="sp"]').val(data[0].sp)
                    $("#notes").val(data[0].notes)
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

    //***********************Purchase Price********************************************//
    
    function getPurchasePrice(flag){
        if(flag == true){
            DrawDataTable('#purchasepriceTable','purchaseprice','CutPiecePurchasePrice', 'Cut Piece Purchase Price List',[0,2,3,4,5,6,7,8],[1],[0,1],[2,3,4,5,6,7,8]);
        }
        FillPP();
    }

    $(document).on("click", ".getPurchasePrice" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/purchaseprice/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="pm"]').val(data[0].pm)
                    $('#'+formId+' input[name="pp_22"]').val(data[0].pp_22)
                    $('#'+formId+' input[name="pp_20"]').val(data[0].pp_20)
                    $('#'+formId+' input[name="pp_25"]').val(data[0].pp_25)
                    $('#'+formId+' input[name="pp_30"]').val(data[0].pp_30)
                    $('#'+formId+' input[name="pp_50"]').val(data[0].pp_50)
                    $('#'+formId+' input[name="pp_60"]').val(data[0].pp_60)
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

    //***********************Sales Price********************************************//

    function getSalesPrice(flag){
        if(flag == true){
            DrawDataTable('#salespriceTable','salesprice','CutPieceSalesPrice', 'Cut Piece Sales Price List',[0,2,3,4,5,6,7,8],[1],[0,1],[2,3,4,5,6,7,8]);
        }
        FillSP();
    }

    $(document).on("click", ".getSalesPrice" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/salesprice/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="pm"]').val(data[0].pm)
                    $('#'+formId+' input[name="sp_22"]').val(data[0].sp_22)
                    $('#'+formId+' input[name="sp_20"]').val(data[0].sp_20)
                    $('#'+formId+' input[name="sp_25"]').val(data[0].sp_25)
                    $('#'+formId+' input[name="sp_30"]').val(data[0].sp_30)
                    $('#'+formId+' input[name="sp_50"]').val(data[0].sp_50)
                    $('#'+formId+' input[name="sp_60"]').val(data[0].sp_60)
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

    //***********************Fixed Itmes********************************************//

    function getFixedItems(flag){
        if(flag == true){
            DrawDataTable('#fixeditemsTable','fixeditems','CutPieceFixedItems', 'Cut Piece Fixed Items List',[0,3,4,5,6,7,8,9,10,11],[1],[0,1,2],[],true,'6,8','landscape');
        }
        // FillPP();
        // FillSP();
    }

    $(document).on("click", ".getFixedItem" , function(e) {
        var id          = $(this).attr('data-id');
        var formId      = $(this).attr('data-type');
        var formId      = 'frm_'+formId;
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/fixeditems/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="item_no"]').val(data[0].item_no)
                    $('#'+formId+' input[name="item_name"]').val(data[0].item_name)
                    $('#'+formId+' select[name="supplier_id"]').val(data[0].supplier_id)
                    $('#'+formId+' select[name="poster"]').val(data[0].poster)
                    $('#'+formId+' select[name="status"]').val(data[0].status)
                    $('#'+formId+' input[name="cut"]').val(data[0].cut)
                    $('#'+formId+' input[name="pp"]').val(data[0].pp)
                    $('#'+formId+' input[name="sp"]').val(data[0].sp)
                    $('#'+formId+' [name="notes"]').val(data[0].notes)
                        
                    // reset(formId);
                    $(".editrow").show();
                    $(".addrow").hide();
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

    $(document).on('change', '#pp_22s', function(){
        let formId = 'frm_fixeditems';
        var pp_22  = $(this).val();
        if(pp_22){
            $('#'+formId+' input[name="pp_22"]').val(pp_22);
            $('#'+formId+' input[name="pp_20"]').val($('option:selected', this).data('pp20'));
            $('#'+formId+' input[name="pp_25"]').val($('option:selected', this).data('pp25'));
            $('#'+formId+' input[name="pp_30"]').val($('option:selected', this).data('pp30'));
            $('#'+formId+' input[name="pp_50"]').val($('option:selected', this).data('pp50'));
            $('#'+formId+' input[name="pp_60"]').val($('option:selected', this).data('pp60'));
        }else{
            $('#'+formId+' input[type="text"]:not(".pp_22")').val('');
        }
    })

    $(document).on('change', '#sp_22s', function(){
        let formId = 'frm_fixeditems';
        var sp_22  = $(this).val();
        if(sp_22){
            $('#'+formId+' input[name="sp_22"]').val(sp_22);
            $('#'+formId+' input[name="sp_20"]').val($('option:selected', this).data('sp20'));
            $('#'+formId+' input[name="sp_25"]').val($('option:selected', this).data('sp25'));
            $('#'+formId+' input[name="sp_30"]').val($('option:selected', this).data('sp30'));
            $('#'+formId+' input[name="sp_50"]').val($('option:selected', this).data('sp50'));
            $('#'+formId+' input[name="sp_60"]').val($('option:selected', this).data('sp60'));

        }else{
            $('#'+formId+' input[type="text"]:not(".sp_22")').val('');
        }
    })

    //***********************Drop Down Functions*******************************************//

    function FillSuppliers(){
        // console.log('FillSuppliers');
        $('select[name="supplier_id"]').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/suppliers/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('select[name="supplier_id"]').append("<option value=''>Select Suppliers</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['trade_name'];
                        // var name = data[i]['name'];
                        $('select[name="supplier_id"]').append("<option value='"+name+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    }

    function FillItemType(){
        // console.log('FillSuppliers');
        $('#item_type_1').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/itemtype/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    // $('#item_type_1').append("<option value=''>Select Item Type</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['item_type'];
                        // var name = data[i]['name'];
                        $('#item_type_1').append("<option value='"+name+"'>"+value+"</option>");
                    }
                    $('#item_type_1').selectpicker('refresh');                  
                }
            },error: function(){}
       });
    }

    function FillPP(){
        // console.log('FillSuppliers');
        $('#pp_22s').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/pp/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('#pp_22s').append("<option value=''>Select 2.20 PP</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['pp_22'];
                        $("#pp_22s").append("<option data-pp20='"+data[i]['pp_20']+"' data-pp25='"+data[i]['pp_25']+"' data-pp30='"+data[i]['pp_30']+"' data-pp50='"+data[i]['pp_50']+"' data-pp60='"+data[i]['pp_60']+"' value='"+name+"'>"+name+"</option>");
                        // $('#pp_22').append("<option value='"+value+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    } 

    function FillSP(){
        // console.log('FillSuppliers');
        $('#sp_22s').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/sp/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('#sp_22s').append("<option value=''>Select 2.20 SP</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['sp_22'];
                        $("#sp_22s").append("<option data-sp20='"+data[i]['sp_20']+"' data-sp25='"+data[i]['sp_25']+"' data-sp30='"+data[i]['sp_30']+"' data-sp50='"+data[i]['sp_50']+"' data-sp60='"+data[i]['sp_60']+"' value='"+name+"'>"+name+"</option>");
                    }                  
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
