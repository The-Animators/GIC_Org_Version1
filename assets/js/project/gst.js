var title = 'Gst ';
var controller = 'gst';
var progressBar = $('#progress-bar');
var file_size = 0;
var MAXSIZE = 10 * 1024 * 1024;
$(document).ready(function() {
	getGST()
    getStakeholder();
    getTransport();
});

$(document).on("click", ".refresh" , function(e) {
    var type = $(this).data('type');
    CallTable(type)
});


function CallTable(type){
    if(type == "gst"){
        getGST()
    }else if(type == "stakeholder"){
        getStakeholder();
    }else if(type == "transport"){
        getTransport();
    }

}
    //***********************GST Details Table********************************************//

    function getGST(){
        DrawDataTable('#table_gst','gst','GSTDetails', 'GST Details List',[0,1,2,3,5,6,7,8],[9],[0,4,9],[],false,'4,5,6');        
        FillDetails();
    }

    $(document).on("click", ".getGSTDetails" , function(e) {
        var id          = $(this).data('id');
        // alert('id'+id);
        var formId      = $(this).data('form');
        // var formId  = 'mainFormData';
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/gst/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#1_id').val(data[0].id)
                    $('#1_trade_name').val(data[0].trade_name)
                    $('#1_firm_name').val(data[0].firm_name)
                    $('#1_gstin').val(data[0].gstin)
                    $('#1_party_type').val(data[0].party_type)
                    $('#1_status').val(data[0].status)
                    $('#1_address').val(data[0].address)
                    $('#1_additional_address').val(data[0].additional_address)
                    $('#1_gst_certificate').val(data[0].gst_certificate)
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

    //***********************GST Stakeholder Table********************************************//

    function getStakeholder(){
        DrawDataTable('#table_stakeholder','stakeholder','GSTStakeholder', 'GST Stakeholder List',[0,1],[2],[0,2]);        
        FillStakeholder()
    }

    $(document).on("click", ".getStakeholder" , function(e) {
        var id      = $(this).data('id');
        var formId  = $(this).data('form');
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/stakeholder/"+id,
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
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
                    return false;
                }
            },error: function(){}
       });
       return false;  //stop the actual form post !important!
    })

    

    //***********************Transport Table********************************************//

    function getTransport(){
        DrawDataTable('#table_transport','transport','Transport', 'Transport List',[0,2,3,4,5,6,7,8,9,10,11],[1,12],[0],[],true,6,'landscape');        
    }

    $(document).on("click", ".getTransport" , function(e) {

        var id      = $(this).data('id');
        var formId  = $(this).data('form');
        e.preventDefault();
        $("#toaster").remove();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/transport/"+id,
            dataType: 'json',
            success : function(resData){
                console.log(resData);
                var {status, data, message} = resData;
                if(status === true){
                    // $.toaster(message, 'Success', 'success');
                    $('#3_id').val(data[0].id)
                    $('#3_transport_from').val(data[0].transport_from_id);
                    $('#3_transport_to').val(data[0].transport_to_id);
                    $('#3_dispatched_by').val(data[0].dispatched_by_id);
                    $('#3_transporter_id').val(data[0].transporter_id);
                    $('#3_status').val(data[0].status);
                    $('#3_distance').val(data[0].distance);
                    $('#3_transporter_address').val(data[0].transporter_address);
                    $('#3_transporter_gstin').val(data[0].transporter_gstin);
                    $('#3_dispatched_from').val(data[0].dispatched_from);
                    var relevant_for = data[0].relevant_for.split(',');
                    $('#3_relevant_for').val(relevant_for);
                    $('#3_relevant_for').selectpicker('refresh');
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

    $(document).on('change', '#3_transporter_id', function(){
        let formId = 'frm_transport';
        var val  = $(this).val();
        if(val){
            $('#'+formId+' input[name="transporter_id"]').val(val);
            $('#3_transporter_gstin').val($('option:selected', this).data('gstin'));
            $('#3_transporter_address').val($('option:selected', this).data('address'));
        }else{
            // $('#'+formId+' input[type="text"]:not(".transporter_id")').val('');
            $('#3_transporter_gstin').val('');
            $('#3_transporter_address').val('');
        }
    })

    $(document).on('change', '#3_dispatched_by', function(){
        let formId = 'frm_transport';
        var val  = $(this).val();
        if(val){
            $('#3_dispatched_by').val(val);
            $('#3_dispatched_from').val($('option:selected', this).data('address'));
        }else{
            $('#3_dispatched_from').val('');
            // $('#'+formId+' input[type="text"]:not(".sp_22")').val('');
        }
    })

    //***********************Drop Down Functions*******************************************//

    function FillDetails(){
        $('#3_transport_from').empty();
        $('#3_transport_to').empty();
        $('#3_dispatched_by').empty();
        $('#3_transporter_id').empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/gst/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    $('#3_transport_from').append("<option value=''>Select From</option>");
                    $('#3_transport_to').append("<option value=''>Select To</option>");
                    $('#3_dispatched_by').append("<option value=''>Select Dispatched By</option>");
                    $('#3_transporter_id').append("<option value=''>Select Transporter</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var party_type = data[i]['party_type'];
                        var value = data[i]['trade_name'];
                        var address = data[i]['address'];
                        var gstin = data[i]['gstin'];
                        if(party_type == 'Transporter'){
                            $('#3_transporter_id').append("<option data-address='"+address+"' data-gstin='"+gstin+"' value='"+name+"'>"+value+"</option>");
                        }else{
                            $('#3_transport_from').append("<option data-address='"+address+"' value='"+name+"'>"+value+"</option>");
                            $('#3_transport_to').append("<option data-address='"+address+"' value='"+name+"'>"+value+"</option>");
                            $('#3_dispatched_by').append("<option data-address='"+address+"' value='"+name+"'>"+value+"</option>");
                        }
                    }                  
                }
            },error: function(){}
       });
    }

    function FillStakeholder(){
        $("#3_relevant_for").empty();
        $.ajax({
            type    : "GET",
            url     : base_url+"Api/"+controller+"/stakeholder/0",
            dataType: 'json',
            success : function(resData){
                // console.log(resData);
                var {status, data, message} = resData;
                // console.log('data:'+data)
                if(status === true){
                    var len = data.length;
                    // $("#3_relevant_for").append("<option value=''>Select Vishnu cut</option>");
                    for( var i = 0; i<len; i++){
                        var name = data[i]['id'];
                        var value = data[i]['person_name'];
                        // var name = data[i]['name'];
                        $("#3_relevant_for").append("<option value='"+name+"'>"+value+"</option>");
                    }
                    $('#3_relevant_for').selectpicker('refresh');
                    // $('#cut_id').selectpicker();                  
                }
            },error: function(){}
       });
    }

    //***********************Common Functions*******************************************//

    // Delete PDF file
    $(document).on("click", ".deletefile" , function(e) {
        var id       = $(this).attr('id');
        var filename = $(this).attr('filename');
        $.ajax({
            type    : "POST",
            url     : base_url+"Api/"+controller+"/deletefile",
            data    : {id,filename},
            dataType: 'json',
            success : function(resData){
                var {status, message} = resData;
                if(status === true){
                   toastr.success(message);
                    CallTable('gst')
                }else if(status == false){
                    // $.toaster(message, 'Error', 'danger');
                    toastr.error(message);
                    return false;
                }
            },error: function(){}
       });

    });


    $(document).on("click", ".saveData" , function(e) {
        e.preventDefault();
        toastr.remove();
        var btnid       = $(this).attr('id');
        var neepaType   = $(this).data('type');
        if(neepaType == "gst"){
            // var size = $('#gst_certificate').files[0].size
            // alert(file_size);
            if(file_size > MAXSIZE){
                 toastr.error('File Size should not Exceed 10MB');
                return false;
            }
        }
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
                        $('.progress').hide();
                    }else if(status == false){
                        toastr.warning(message);
                        $('.progress').hide();
                        return false;
                    }
                }else{
                    $.each(message, function(key, value) {
                        if(value != ''){
                            toastr.error(value);
                            $("#"+formId+" input[name="+key+"]").val('').focus();
                            // $("input[name="+key+"]").focus();
                            $('.progress').hide();
                            return false;
                        }
                    });
                }
                
            },
            xhr: function() {
                console.log('Type : '+neepaType+' File Size : '+file_size);
                // if(file_size > 0){
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(event) {
                        if (event.lengthComputable) {
                            var percentComplete = Math.round( (event.loaded / event.total) * 100 );
                            // console.log(percentComplete);
                            $('.progress').show();
                            progressBar.css({width: percentComplete + "%"});
                            progressBar.text(percentComplete + '%');
                        };
                    }, false);
                // }
                return xhr;
                // if(neepaType == 'gst1'){
                // }
            },
            error: function(){
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

    $('#gst_certificate').bind('change', function() {
      //this.files[0].size gets the size of your file.
      file_size = this.files[0].size;
      alert(file_size);
    });
