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

            <div class="row card-box" id="import_section">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="header-title"><?php echo $title; ?> Master <span id="total_gst_data">( Count : <?php echo count($download_arr); ?> )</span></h4>
                        </div>
                        <div class="col-md-6 text-right"></div>
                    </div>

                    <div class="form-row">
                        <?php $i = 0;
                        if (!empty($download_arr)) : for ($i = 0; $i < count($download_arr); $i++) : ?>
                                <div class="col-md-3 card">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width=""><a href='<?php echo base_url() . "master/export/" . $download_arr[$i]; ?>' class='btn btn-facebook btn-sm export_btn' id='download_policy' data-toggle="tooltip" data-original-title='Download <?php echo ucwords(str_replace("_", " ", $download_arr[$i])); ?>' type='button'>Download <?php echo ucwords(str_replace("_", " ", $download_arr[$i])); ?></a></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                        <?php endfor;
                        endif; ?>
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
