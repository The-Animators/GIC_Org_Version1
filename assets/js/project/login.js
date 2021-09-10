
$(document).on("click", "#login" , function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid = 'login';
    var formId = $(this).data('form');
    $("#toaster").remove();
    var formdata = $("#"+formId+" :input").serialize();
    // alert(base_url+"Api/login/signin");
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/login",
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
                    $('#'+formId+' input[type=text]').val('');
                    window.setTimeout(function() {
                        window.location.href = base_url+'dashboard';
                    }, 1500);
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value!=''){
                        toastr.error(value);
                        $("#"+formId+"input[name="+key+"]").val('');
                        $("input[name="+key+"]").focus();
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