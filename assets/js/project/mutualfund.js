var title = 'Mutual Fund ';
var controller = 'mutualfund';

$(document).ready(function() {
    $("#5_date_investment").datepicker({
        autoclose:!0,
        todayHighlight:!0,
        format: "dd/mm/yyyy"
    })

    $("#5_date_allotment").datepicker({
        autoclose:!0,
        todayHighlight:!0,
        format: "dd/mm/yyyy"
    })
    getPersons(true);
    getBank(true);
    getPersonBank(true);
    getInvestment(true);
    getHouse(true);
    getFund(true);
    getDetails(true);
});

$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type, true)
});

function CallTable(type, flag){
     if(flag == false){
        RemoveRow(type)
    }

    if(type == "person"){
        getPersons(flag);
    }else if(type == "bank"){
        getBank(flag)
    }else if(type == "personbank"){
        getPersonBank(flag)
    }else if(type == "investment"){
        getInvestment(flag)
    }else if(type == "house"){
        getHouse(flag);
    }else if(type == "fund"){
        getFund(flag);
    }else if(type == "detail"){
        getDetails(flag);
    }
}


    //***********************Location Table********************************************//

    function getPersons(flag){
        if(flag == true){
            DrawDataTable('#personTable','person','MutualFundPerson', 'Mutual Fund Person List',[0,1],[2],[0,2]);  
        }
        FillPersons();      
    }

    $(document).on("click", ".getPerson" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/person/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#1_id').val(data[0].id)
                    $('#1_person_name').val(data[0].person_name)
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


    //***********************Location Table********************************************//

    function getBank(flag){
        if(flag == true){
            DrawDataTable('#bankTable','bank','MutualFundBank', 'Mutual Fund Bank List',[0,1],[2],[0,2]);  
        }
        FillBank();      
    }

    $(document).on("click", ".getBank" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/bank/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' input[name="bank_name"]').val(data[0].bank_name)
                    $('#'+formId+' input[name="account_number"]').val(data[0].account_number)
                    showReset(formId)
                    // $('#1_id').val(data[0].id)
                    // $('#2_bank_name').val(data[0].bank_name)
                    // $('#'+formId+' button[name="resets"]').show();
                    // $("."+formId).focus();
                    // topFunction();
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


    //***********************Location Table********************************************//

    function getPersonBank(flag){
        if(flag == true){
            DrawDataTable('#personbankTable','personbank','MutualFundPersonBank', 'Mutual Fund Person Bank List',[0,1,2],[3],[0,3]);  
        }
    }

    $(document).on("click", ".getPersonBank" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/personbank/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#'+formId+' input[name="id"]').val(data[0].id)
                    $('#'+formId+' [name="bank_id"]').val(data[0].bank_id)
                    $('#'+formId+' [name="person_id"]').val(data[0].person_id)
                    showReset(formId)
                    // $('#1_id').val(data[0].id)
                    // $('#2_bank_name').val(data[0].bank_name)
                    // $('#'+formId+' button[name="resets"]').show();
                    // $("."+formId).focus();
                    // topFunction();
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


    //***********************Location Table********************************************//

    function getInvestment(flag){
        if(flag == true){
            DrawDataTable('#investmentTable','investment','MutualFundInvestmentAgent', 'Mutual Fund Investment Agents List',[0,1],[2],[0,2]);  
        }
        FillInvestment();      
    }

    $(document).on("click", ".getInvestment" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/investment/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#2_id').val(data[0].id)
                    $('#2_agent_name').val(data[0].agent_name)
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


    //***********************Location Table********************************************//

    function getHouse(flag){
        if(flag == true){
            DrawDataTable('#houseTable','house','MutualFundHouse', 'Mutual Fund House List',[0,1],[2],[0,2]);  
        }
        FillHouse();      
    }

    $(document).on("click", ".getHouse" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/house/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#3_id').val(data[0].id)
                    $('#3_house_name').val(data[0].house_name)
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

    //***********************Location Table********************************************//

    function getFund(flag){
        if(flag == true){
            DrawDataTable('#fundTable','fund','MutualFundName', 'Mutual Fund Name List',[0,1,2],[3],[0,3]);  
        }
        // FillHouse();      
    }

    $(document).on("click", ".getFund" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/fund/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#4_id').val(data[0].id)
                    $('#4_house_id').val(data[0].house_id)
                    $('#4_fund_name').val(data[0].fund_name)
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

    //***********************Transport Table********************************************//

    function getDetails(flag){
        if(flag == true){
            DrawDataTable('#detailTable','detail','MutualFundDetails', 'Mutual Fund Details List',[0,2,3,4,5,6,7,8,9],[1,10],[0,1,10],[],true,'5,6','landscape');        
        }
    }

    $(document).on("click", ".getDetails" , function(e) {

        var id      = $(this).data('id');
        var formId  = $(this).data('form');
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/detail/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#5_id').val(data[0].id)
                    $('#5_person_id').val(data[0].person_id);
                    $('#5_house_id').val(data[0].house_id);
                    FillFund(data[0].house_id,data[0].fund_id);
                    $('#5_agent_id').val(data[0].agent_id);
                    $('#5_folio_no').val(data[0].folio_no);
                    date = data[0].date_allotment;
                    date = date.split("-").reverse().join("/");
                    $('#5_date_allotment').val(date);

                    date = data[0].date_investment;
                    date = date.split("-").reverse().join("/");
                    $('#5_date_investment').val(date);

                    $('#5_transaction_nature').val(data[0].transaction_nature);
                    $('#5_amount').val(data[0].amount);
                    $('#5_number_units').val(data[0].number_units);
                    $('#5_nav').val(data[0].nav);
                    // $('#5_fund_id').val(data[0].fund_id);
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

    //***********************Drop Down Functions*******************************************//

    function FillPersons(){
        $('.person_id').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/person/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('.person_id').append("<option value=''>Select Investor</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['person_name'];
                        $('.person_id').append("<option value='"+name+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    }
    function FillBank(){
        $('.bank_id').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/bank/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('.bank_id').append("<option value=''>Select Bank</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['bank_name'];
                        var accnumber = data[i]['account_number'];
                        $('.bank_id').append("<option value='"+name+"'>"+value+" ("+accnumber+")</option>");
                    }                  
                }
            },error: function(){}
       });
    }

    function FillInvestment(){
        $('#5_agent_id').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/investment/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('#5_agent_id').append("<option value=''>Select Agent</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['agent_name'];
                        $('#5_agent_id').append("<option value='"+name+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    }

    function FillHouse(){
        $('#4_house_id').empty();
        $('#5_house_id').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/house/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('#4_house_id').append("<option value=''>Select Fund House</option>");
                    $('#5_house_id').append("<option value=''>Select Fund House</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['house_name'];
                        $('#4_house_id').append("<option value='"+name+"'>"+value+"</option>");
                        $('#5_house_id').append("<option value='"+name+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    }    

    function FillFund(id,fund_id = ''){
        $('#5_fund_id').empty();
        $('#5_fund_id').append("<option value=''>Select Fund Name</option>");
        if(id != ''){
            $.ajax({
                type    : "GET",
                url     : base_url+"Api/"+controller+"/fund/"+id+"/1",
                dataType: 'json',
                success : function(resData){
                    console.log(resData);
                    var {status, data, message} = resData;
                    // console.log('data:'+data)
                    if(status === true){
                        var len = data.length;
                        for( var i = 0; i<len; i++){
                            var name = data[i]['id'];
                            var sel = '';
                            if(fund_id == name){
                                sel = 'selected';
                            }
                            var value = data[i]['fund_name'];
                            $('#5_fund_id').append("<option "+sel+" value='"+name+"'>"+value+"</option>");
                        }                  
                    }
                },error: function(){}
           });

        }
    }    

    $(document).on('change', '#5_house_id', function(){
        var id = $(this).val();
        console.log('house_id'+id);
        FillFund(id);
    });

    //***********************Common Functions*******************************************//


    $(document).on("click", ".saveData" , function(e) {
        e.preventDefault();
        toastr.remove();
        var btnid       = $(this).attr('id');
        var mytype      = $(this).data('type');
        formId          = $(this).data('form');
        $("#toaster").remove();
        // var formdata = $("#"+formId).serialize();
        var form = $("#"+formId)[0];
        var formdata = new FormData(form);//,$().serialize();
        // console.log(formdata)
        // alert(formId);
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/"+controller+"/"+mytype,
            data    : formdata,
            dataType: 'json',
            processData:false,
            contentType:false,
            cache:false,
            beforeSend: function() {
                $("#"+btnid).startLoading();
            },
            success : function(resData){
                // alert(JSON.stringify(resData));
                var {status,validate,message} = resData;
                if (validate === true) {
                    if(status === true){
                        toastr.success(message);
                        reset(formId);
                        CallTable(mytype,true)
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
