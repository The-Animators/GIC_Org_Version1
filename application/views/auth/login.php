<div class="home-btn d-none d-sm-block">
    <a href="index.html"><i class="fas fa-home h2 text-white"></i></a>
</div>

<div class="account-pages w-100 mt-5 mb-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mb-0">

                    <div class="card-body p-4">

                        <div class="account-box">
                            <div class="account-logo-box">
                                <div class="text-center">
                                    <a href="<?php echo base_url(); ?>/login">
                                        <img src="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" alt="" height="140" width="200">
										<!------
										<img src="<?php //echo base_url(); ?>assets/gic_img/gic_logo.jpeg" alt="" height="120" width="150">
										---->
                                    </a>
                                </div>
                                <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
                                <p class="mb-0">Login to your Admin account</p>
                                <span id="task_login_det"></span>
                               
                            </div>

                            <div class="account-content mt-4">

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="user_name">User Name</label>
                                        <input class="form-control" type="text" name="user_name" id="user_name" placeholder="Enter Your User Name">
                                        <span id="user_name_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <a href="<?php echo base_url(); ?>login/forgrt_pass" class="text-muted float-right"><small>Forgot your password?</small></a>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password">
                                        <span id="password_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center mt-2">
                                    <div class="col-12">
                                        <button onclick="onLogin()" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>


                                <div class="row mt-4 pt-2">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted mb-0">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<script>
    function onLogin() {
        var user_name = $("#user_name").val();
        var password = $("#password").val();

        var url = "<?php echo $base_url; ?>login/auth";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                user_name: user_name,
                password: password,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                // alert(data["status"]);
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#user_name").val("");
                    $("#user_name").removeClass("parsley-error");
                    $("#password").val("");
                    $("#password").removeClass("parsley-error");

                    setTimeout(function() {
                        // location.reload();
                        if(data['role']=='_2'){
                            window.location.href = '<?php echo base_url(); ?>clients/view_client/'+data['client_id'];
                        }
                        else{
                            window.location.href = '<?php echo base_url(); ?>master/insurance_company_details';
                        }
                        
                    }, 1000);
                } else {
                    if(data["messages"] !=""){
                        toaster(message_type = "Error", message_txt = data["messages"], message_icone = "error");
                        // alert(data["task_title"]);
                        if(data["messages"] != "User Name & Password doesn't Matches."){
                            $("#task_login_det").empty();
                            $("#task_login_details").text("");
                            $("#task_login_det").append('<div id="" class="alert alert-icon alert-danger text-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><i class="mdi mdi-block-helper mr-2"></i><strong id="task_login_details"></strong><br/><b><span id="task_title_det" class="text-secondary mt-1"></span></b></div>');
                            $("#task_login_details").text(data["messages"]);
                            
                            if(data["ip_based"]==1)
                                $("#task_title_det").hide();

                            $("#task_title_det").text("");
                            if(data["task_title"] != "undefined" || data["task_title"] != undefined || data["task_title"] != "" || data["task_title"] != "null" || data["task_title"] != null)
                                $("#task_title_det").text("Task Title : "+data["task_title"]);
                        }
                    }
                    else {
                        // alert("Err");
                        if (data["message"]["user_name_err"] != "")
                            $("#user_name").addClass("parsley-error");
                        else
                            $("#user_name").removeClass("parsley-error");
                        $("#user_name_err").addClass("text-danger").html(data["message"]["user_name_err"]);

                        if (data["message"]["password_err"] != "")
                            $("#password").addClass("parsley-error");
                        else
                            $("#password").removeClass("parsley-error");
                        $("#password_err").addClass("text-danger").html(data["message"]["password_err"]);
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
</script>