var title = 'Location ';
var controller = 'location';

$(document).ready(function() {
    $("#3_loaned_on").datepicker({
        autoclose:!0,
        todayHighlight:!0,
        format: "dd/mm/yyyy"
    })
	getLocations()
    getPersons();
    getDetails();
});

$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type)
});


function CallTable(type){
    if(type == "main"){
        getLocations()
    }else if(type == "person"){
        getPersons();
    }else if(type == "detail"){
        getDetails();
    }

}
    //***********************Location Table********************************************//

    function getLocations(){
        DrawDataTable('#table_main','main','Locations', 'Locations List',[0,1],[2],[0,2]);   
        FillLocation();     
    }

    $(document).on("click", ".getLocation" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/main/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#1_id').val(data[0].id)
                    $('#1_location').val(data[0].location)
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

    function getPersons(){
        DrawDataTable('#table_person','person','LocationPerson', 'Location Person List',[0,1],[2],[0,2]);  
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
                    $('#2_id').val(data[0].id)
                    $('#2_person_name').val(data[0].person_name)
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

    function getDetails(){
        DrawDataTable('#table_detail','detail','LocationDetails', 'Location Details List',[0,1,2,3,4,5,6,7,8],[9],[0,9],[],true,'4,5','landscape');        
    }

    $(document).on("click", ".getLocationDetail" , function(e) {

        var id      = $(this).data('id');
        var formId  = $(this).data('form');
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/detail/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#3_id').val(data[0].id)
                    $('#3_item_name').val(data[0].item_name);
                    $('#3_person_id').val(data[0].person_id);
                    $('#3_location_id').val(data[0].location_id);
                    $('#3_scannable').val(data[0].scannable);
                    $('#3_scanned').val(data[0].scanned);
                    $('#3_details').val(data[0].details);
                    $('#3_loaned_to').val(data[0].loaned_to);
                    
                    date = data[0].loaned_on;
                    if(date){
                        // console.log('found');
                        date = date.split("-").reverse().join("/");
                    }
                    $('#3_loaned_on').val(date);
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

    function FillLocation(){
        $('#3_location_id').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/main/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('#3_location_id').append("<option value=''>Select Location</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['location'];
                        $('#3_location_id').append("<option value='"+name+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    }
    function FillPersons(){
        $('#3_person_id').empty();
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
                    $('#3_person_id').append("<option value=''>Select In-Charge</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['person_name'];
                        $('#3_person_id').append("<option value='"+name+"'>"+value+"</option>");
                    }                  
                }
            },error: function(){}
       });
    }

    //***********************Common Functions*******************************************//


    $(document).on("click", ".saveData" , function(e) {
        e.preventDefault();
        toastr.remove();
        var btnid       = $(this).attr('id');
        var neepaType   = $(this).data('type');
        formId          = $(this).data('form');
        $("#toaster").remove();
        // var formdata = $("#"+formId).serialize();
        var form = $("#"+formId)[0];
        var formdata = new FormData(form);//,$().serialize();
        // console.log(formdata)
        // alert(formId);
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/"+controller+"/"+neepaType,
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
                console.log(validate)
                console.log(status)
                console.log(message)
                if (validate === true) {
                    if(status === true){
                        toastr.success(message);
                        CallTable(neepaType)
                        reset(formId);
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
                    CallTable(mytype)
                    $('input[name="id"]').val(0)
                }else if(status == false){
                    // $.toaster(message, 'Error', 'danger');
                    toastr.error(message);
                    return false;
                }
            },error: function(){}
       });
    }
