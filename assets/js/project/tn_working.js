var title = 'TN Working ';
var controller = 'Tn';
var total_pieces = 0;
var gross_rate = 0;
$(document).ready(function() {
	getClothTable(true)
    getSizeTable(true)
    getPieceTable(true)
    getDiffTable(true)
});

$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type, true)
});

function CallTable(type,flag){
    if(flag == false){
        RemoveRow(type)
    }

    if(type == "cloth"){
        getClothTable(flag);
    }else if(type == "size"){
        getSizeTable(flag);
    }else if(type == "piece"){
       getPieceTable(flag);
    }
}

//***********************TN Cloth Table********************************************//

function getClothTable(flag){
    if(flag == true){
        DrawDataTable('#clothTable','cloth','TNCloth', 'Cloth Fabric Valuation List',[0,3,4,5,6,7,8,9],[0],[0,1,2],[3,4,5,6,7,8]);
    }
    getItemNo();
}

$(document).on("click", ".getclothdetail" , function(e) {
    var id      = $(this).data('id');
    var formId  = 'frm_cloth';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/cloth/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="item_no"]').val(data[0].item_no)
                $('#'+formId+' input[name="meter"]').val(data[0].meter)
                $('#'+formId+' input[name="shortage"]').val(data[0].shortage)
                $('#'+formId+' input[name="excess"]').val(data[0].excess)
                $('#'+formId+' input[name="final_meter"]').val(data[0].final_meter)
                $('#'+formId+' input[name="rate"]').val(data[0].rate)
                $('#'+formId+' input[name="valuation"]').val(data[0].valuation)
                showReset(formId)
            }else if(status == false){
                toastr.error(message);
                reset(formId);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});

//***********************TN Cloth Table********************************************//

function getSizeTable(flag){
    if(flag == true){
        DrawDataTable('#sizeTable','size','TNSize', 'Size Rate List',[0,2,3],[0],[0,1],[3]);
    }
    getSizes();
}

$(document).on("click", ".getsizedetail" , function(e) {
    var id      = $(this).data('id');
    var formId  = 'frm_size';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/size/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id);
                $('#'+formId+' input[name="size"]').val(data[0].size);
                $('#'+formId+' input[name="rate"]').val(data[0].rate);
                showReset(formId)
            }else if(status == false){
                toastr.error(message);
                reset(formId);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});

function getSizes(){
    $.ajax({    
        type    : "GET",
        url     : base_url+"Api/"+controller+"/size/0",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            $("#sizes").html('');
            var {status, data} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                var html = '';
                for( var i = 0; i<len; i++){

                    var id = data[i]['id'];
                    var size = data[i]['size'];
                    var rate = data[i]['rate'];
                    html = `<div class="col-md-2 col-xs-12">
                                <label for="size_${id}">Size : ${size}</label>
                                <input type="text" class="form-control size_rate" data-rate = "${rate}" data-sid = "${id}" name = "size_${id}" id="size_${id}" placeholder="Pieces" value="0">
                            </div>`;
                    $("#sizes").append(html);
                }                  
            }else if(status == false){
                toastr.error(message);
            }
        },error: function(){}
   });
}
//***********************Narsing Item Design********************************************//

function getPieceTable(flag){
    if(flag == true){
        DrawDataTable('#pieceTable','piece','PieceFabricValuation', 'PieceFabricValuation List',[0,3,4,5,6,7,8],[0],[1,2],[3,4,5,6,7,8],'2');
    }
    getDiffTable();
}

$(document).on("click", ".getPiecedetail" , function(e) {
    var id = $(this).data('id');
    var formId  = 'frm_piece';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/piece/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data['main'][0].id)
                $('#'+formId+' select[name="item_id"]').val(data['main'][0].item_id)
                $('#'+formId+' input[name="base_rate"]').val(data['main'][0].base_rate)
                $('#'+formId+' input[name="gross_rate"]').val(data['main'][0].gross_rate)
                $('#'+formId+' input[name="jw_rate"]').val(data['main'][0].jw_rate)
                $('#'+formId+' input[name="total_pieces"]').val(data['main'][0].total_pieces)
                $('#'+formId+' input[name="jw_value"]').val(data['main'][0].jw_value)
                $('#'+formId+' input[name="valuation_pieces"]').val(data['main'][0].valuation_pieces)
                var length = data['sizes'].length;
                // console.log(`length : ${length}`);
                for(i=0; i<length ; i++){
                    $('#'+formId+' input[name="size_'+data['sizes'][i].size_id+'"]').val(data['sizes'][i].piece);
                }
                showReset(formId)
                
            }else if(status == false){
                toastr.error(message);
                reset(formId);
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

function getItemNo(){
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/cloth/0",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#item_id").empty();
                $("#item_id").append("<option value=''>Select Item No</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['item_no'];
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

function getDiffTable(){
    DrawDataTable('#differenceTable','difference','DifferenceInValuation', 'Difference In Valuation',[0,1,2,3,4],[0],[0,1],[2,3,4]);
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
    // console.log(formdata)
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
                // $.toaster(message, 'Success', 'success');
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

$(document).on('click', '#setjwrate', function(){
    var jw_rate = $("#jw_rate_set").val();
    var btnid         = $(this).attr('id');
    if(jw_rate != ''){
         $.ajax({
            type    : "POST",
            url     : base_url+"Api/"+controller+"/setjw",
            data    : {jw_rate_set : jw_rate},
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
                        $("#jw_rate").val(jw_rate);
                        $("#ChangeModal").modal('hide');
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
    }
   return false;
})

$(document).on('change', '#meter, #shortage, #excess', function(){
    CalculateFinalMeter()
})

$(document).on('change', '#rate, #final_meter', function(){
    CalculateValuation();
})

$(document).on('change', '.size_rate, #base_rate', function(){
    GetSizeRate();
})

$(document).on('change', '#jw_value', function(){
    GetPieceValuation();
})

$(document).on('change', '#jw_rate', function(){
    GetJWValue();
})

function GetSizeRate(){
    var size_rate_array = [];
    var base_rate = $("#base_rate").val();
     if(base_rate != ''){
        if(!$.isNumeric(base_rate)){
            toastr.warning('Base Rate should be a number');
            $("#base_rate").val('');
            $("#base_rate").focus();
            return false;
        }
        gross_rate  = 0;
        total_pieces    = 0;
        $(".size_rate").each(function(){
            var piece       = $(this).val();
            var rate        = $(this).attr('data-rate');
            var size_id     = $(this).attr('data-sid');
            // Test if the div element is empty
            if(piece != '' && piece != 0 ){
                var total   = parseInt(piece) * (parseInt(rate) + parseInt(base_rate));
                gross_rate = gross_rate + total;
                total_pieces  = total_pieces + parseInt(piece);
                var inner_array = {
                    size_id   ,
                    piece,
                    rate 
                };
                size_rate_array.push(inner_array);
            }
        });
        $("#total_pieces").val(Math.round(total_pieces));
        $("#gross_rate").val(Math.round(gross_rate));
        $("#size_rate_array").val(JSON.stringify(size_rate_array));
        GetJWValue();

    }
    // console.log(` size_rate_array : ${JSON.stringify(size_rate_array)}`);
}

function GetJWValue(){
    var jw_rate     = $("#jw_rate").val();
    if(jw_rate != ''){
        if(!$.isNumeric(jw_rate)){
            toastr.warning('Job Worker Rate should be a number');
            $("#jw_rate").val(0);
            $("#jw_rate").focus();
            return false;
        }
        var jw_value            = parseInt(total_pieces) * parseInt(jw_rate);
        $("#jw_value").val(jw_value);
        GetPieceValuation();
        // var valuation_pieces    = parseInt(gross_rate) - parseInt(jw_value);
        // $("#valuation_pieces").val(valuation_pieces);
    }
}

function GetPieceValuation(){
    var jw_value     = $("#jw_value").val();
    if(jw_value != ''){
        if(!$.isNumeric(jw_value)){
            toastr.warning('Job Worker Value should be a number');
            $("#jw_value").val(0);
            $("#jw_value").focus();
            return false;
        }
        var valuation_pieces    = parseInt(gross_rate) - parseInt(jw_value);
        $("#valuation_pieces").val(valuation_pieces);
    }
}

function CalculateFinalMeter(){
    var meters      = $("#meter").val();
    var shortage    = $("#shortage").val();
    var excess      = $("#excess").val();
    var final_meter = 0;
    // console.log('Meters : '+meters);
    if(meters != ''){
        if(!$.isNumeric(meters)){
            toastr.warning('Meters should be a number');
            $("#meter").val('');
            $("#meter").focus();
            return false;
        }
        final_meter = meters;
        if(shortage != ''){
            if(!$.isNumeric(shortage)){
                toastr.warning('Shortage should be a number');
                $("#shortage").val('');
                $("#shortage").focus();
                return false;
            }
            final_meter = parseFloat(final_meter) - parseFloat(shortage); 
        }
        if(excess != ''){
            if(!$.isNumeric(excess)){
                toastr.warning('Excess should be a number');
                $("#excess").val('');
                $("#excess").focus();
                return false;
            }
            final_meter = parseFloat(final_meter) + parseFloat(excess); 
        }
        final_meter = parseFloat(final_meter);
        $("#final_meter").val(final_meter);
        CalculateValuation();
    }
}

function CalculateValuation(){

    var rate            = $("#rate").val();
    var final_meter     = $("#final_meter").val();
    var valuation       = 0;

    if(rate != ''){
        if(!$.isNumeric(rate)){
            toastr.warning('Rate should be a number');
            $("#rate").val('');
            $("#rate").focus();
            return false;
        }
        if(final_meter != ''){
            valuation = final_meter * rate; 
        }
        valuation = Math.round(valuation);
        $("#valuation").val(valuation);
    }
}
