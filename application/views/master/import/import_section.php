<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <?php
                                if (!empty($breadcrumbs)) {
                                    foreach ($breadcrumbs as $row) {
                                        if ($row["breadcrumb_active"] == true) {
                                            echo "<li class=\"breadcrumb-item active\" >";
                                            echo $row["breadcrumb_label"];
                                            echo "</li>";
                                        } else {
                                            echo "<li class=\"breadcrumb-item\" >";
                                            echo "<a href=\"" . $row["breadcrumb_url"] . "\">";
                                            echo $row["breadcrumb_label"];
                                            echo "</a></li>";
                                        }
                                    }
                                }
                                ?>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo $title; ?> </h4>
                    </div>
                </div>
            </div>

            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Import <span id="title_txt"></span> Section <span class='text-danger font-weight-bold'>(Only csv and xls file Allowed)</span></h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-9">
                                            <div class="form-group row">
                                                <label for="dummy_file" class="col-form-label col-md-2 text-right">File <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="file" name="dummy_file" id="dummy_file" value="" placeholder="Enter File" class="form-control">
                                                    <span id="dummy_file_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="test" class="col-form-label col-md-4 text-right"></label>
                                                <div class="col-md-8">
                                                    <input type="hidden" name="test" id="test" value="test" placeholder="Enter text" class="form-control">
                                                    <input type="hidden" name="import_btn_txt" id="import_btn_txt" value="" placeholder="Enter text" class="form-control">
                                                    <span id="test_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <center>
                                                <button id="update" onclick='on_Import()' class="btn btn-primary btn-xs">Import</button>
                                            </center>
                                        </div>
                                        <div class="form-group col-md-4"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card-box" id="import_section">
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="col-md-3 card">
                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                <thead>
                                    <tr>
                                        <td width=""><button class='btn btn-facebook btn-xs import_btn mr-2' data-toggle="tooltip" id='policy_import' onclick='on_Import_BTNTXT("spreadsheet_policy_import")' value='spreadsheet_policy_import' data-original-title='Policy Import' type='button'>Policy Import</button><a href='<?php echo base_url(); ?>master/export/download/1' class='btn btn-facebook btn-sm export_btn' id='download_policy' onclick='on_download("policy_csv_formate")' value='policy_csv_formate' data-toggle="tooltip" data-original-title='Download Policy CSV Formate' type='button'>Download Policy</a></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-3 card">
                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                <thead>
                                    <tr>
                                        <td width=""><button class='btn btn-facebook btn-xs import_btn mr-2' data-toggle="tooltip" id='agency_import' onclick='on_Import_BTNTXT("spreadsheet_agency_import")' value='spreadsheet_agency_import' title='Agency Import' type='button'>Agency Import</button><a href='<?php echo base_url(); ?>master/export/download/2' class='btn btn-facebook btn-sm export_btn' id='download_agency' onclick='on_download("agency_csv_formate")' value='agency_csv_formate' data-toggle="tooltip" data-original-title='Download Agency CSV Formate' type='button'>Download Agency</a></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Animator</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    $("#policy_import,#agency_import").click(function() {
        var import_btn = $(".import_btn").val();
        if (import_btn == "spreadsheet_policy_import")
            $('#title_txt').text("Policy");
        else if (import_btn == "spreadsheet_agency_import")
            $('#title_txt').text("Agency");
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    function clearError() {
        $("#dummy_file").removeClass("parsley-error");
        $("#dummy_file_err").removeClass("text-danger").text("");

        $("#test").removeClass("parsley-error");
        $("#test_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#dummy_file").val("");
    }

    function on_Import_BTNTXT(import_btn_txt) {
        $(".import_btn").val(import_btn_txt);
    }

    // function on_download(export_btn_txt) {
    //     var form_data = new FormData();
    //     form_data.append('export_btn_txt', export_btn_txt);
    //     var url = "<?php //echo $base_url; ?>master/export/download";
    //     $.ajax({
    //         url: url,
    //         data: form_data,
    //         type: 'POST',
    //         dataType: 'json',
    //         async: false,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function() {},
    //         success: function(data) {
    //             if (data["status"] == true) {
    //                 toaster(message_type = "Success", message_txt = data["messages"], message_icone = "success");
    //             } else {
    //                 toaster(message_type = "Error", message_txt = data["messages"], message_icone = "error");
    //             }
    //         },
    //         error: function(request, status, error) {
    //             alert(request.responseText);
    //         }
    //     });
    // }

    function on_Import() {
        var test = $("#test").val();
        var import_btn = $(".import_btn").val();
        // alert(import_btn);return false;
        var dummy_file = $('#dummy_file').prop('files')[0];

        var form_data = new FormData();
        form_data.append('test', test);
        form_data.append('dummy_file', dummy_file);

        var url = "<?php echo $base_url; ?>master/import/" + import_btn;

        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["messages"], message_icone = "success");
                    $("#dummy_file").val("");
                    $("#dummy_file").removeClass("parsley-error");
                    $("#dummy_file_err").removeClass("text-danger");

                    $('#form_modal').modal('toggle');

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["dummy_file_err"])
                            toaster(message_type = "Error", message_txt = data["messages"]["dummy_file_err"], message_icone = "error");
                        else
                            toaster(message_type = "Error", message_txt = data["messages"], message_icone = "error");
                        // } else {
                        if (data["messages"]["dummy_file_err"] != "")
                            $("#dummy_file").addClass("parsley-error");
                        else
                            $("#dummy_file").removeClass("parsley-error");
                        $("#dummy_file_err").addClass("text-danger").html(data["messages"]["dummy_file_err"]);

                        if (data["message"]["dummy_file_err"] != "")
                            $("#dummy_file").addClass("parsley-error");
                        else
                            $("#dummy_file").removeClass("parsley-error");
                        $("#dummy_file_err").addClass("text-danger").html(data["message"]["dummy_file_err"]);
                    }

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
</script>