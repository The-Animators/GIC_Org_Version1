<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <?php $menu_list = menu_permission();
                // print_r(($menu_list));
                // die("Test"); 
                if (!empty($menu_list)) :
                    foreach ($menu_list as $row) :
                        if ($row["menu_url"] == "#")
                            $url = "javascript:void(0);";
                        else
                            $url = base_url() . $row['menu_url'];
                        // $url = $row['menu_url'];

                ?>
                        <li class="has-submenu">
                            <a href="<?php echo $url; ?>"> <i class="<?php echo $row["menu_icon"]; ?>"></i><?php echo $row["menu_name"]; ?><span id="<?php if($row["menu_name"] == "Work"): echo "work_id"; endif; ?>"> </span>
                            <?php 
                            $submenu_list = sub_menu_permission($row["menu_id"]);
                            $task_counter = task_counter();
                            if (!empty($submenu_list)){
                                foreach ($submenu_list as $row1){
                                $bell_flag = false;
                                if($row1["submenu_name"] == "Task Management"){ 
                                    if($task_counter != 0){
                                    $child_submenu_list = child_submenu_permission($row["menu_id"],$row1["submenu_id"]);
                                    if (!empty($child_submenu_list)){
                                    foreach ($child_submenu_list as $row4){
                                        if($row4["child_submenu_name"] == "My Task"){
                                            $bell_flag = true;
                                    ?>
                                <span class="badge badge-pink rounded-circle noti-icon-badgeml-1" style="<?php if($this->session->userdata("@_user_role_id")==1 || $this->session->userdata("@_user_role_id") == 2): echo "display:none;"; endif; ?>" ><?php echo $task_counter; ?></span>
                                <?php }}}}}}} ?>
                        </a>
                            <?php $submenu_list = sub_menu_permission($row["menu_id"]);
                            // $task_counter = task_counter();
                            // print_r(($task_counter));
                            // die("Test"); 
                            if (!empty($submenu_list)) : ?>
                                <ul class="submenu">
                                    <?php foreach ($submenu_list as $row1) : 
                                            if ($row1["submenu_url"] == "#"){
                                                $arrow_down ='<div class="arrow-down"></div>';
                                                $submenu_url = "javascript:void(0);";
                                            }else{
                                                $arrow_down ='';
                                                $submenu_url = base_url() . $row1['submenu_url'];
                                            }
                                        ?>
                                        <li class="has-submenu"><a href="<?php echo $submenu_url; ?>" data-value="<?php echo $row1["submenu_id"]; ?>" onclick="GetSubmenu_Id(<?php echo $row1['submenu_id']; ?>)" id="submenu"> <?php echo $row1["submenu_name"]; ?><?php echo $arrow_down; ?><span id="<?php if($row1["submenu_name"] == "Task Management"): echo "task_manage_id"; endif; ?>"> </span>
                                        <?php 
                                        $bell_flag = false;
                                        if($row1["submenu_name"] == "Task Management"){ 
                                            if($task_counter != 0){
                                            $child_submenu_list = child_submenu_permission($row["menu_id"],$row1["submenu_id"]);
                                            if (!empty($child_submenu_list)){
                                            foreach ($child_submenu_list as $row4){
                                                if($row4["child_submenu_name"] == "My Task"){
                                                    $bell_flag = true;
                                            ?>
                                        <span class="badge badge-pink rounded-circle noti-icon-badgeml-1" style="<?php if($this->session->userdata("@_user_role_id")==1 || $this->session->userdata("@_user_role_id") == 2): echo "display:none;"; endif; ?>"><?php echo $task_counter; ?></span>
                                        <?php }}}}} ?>
                                    </a>
                                       

                                        <?php $child_submenu_list = child_submenu_permission($row["menu_id"],$row1["submenu_id"]); 
                                        if (!empty($child_submenu_list)) : //print_r($child_submenu_list);die(); ?>
                                       
                                        <ul class="submenu">
                                        <?php foreach ($child_submenu_list as $row3) : ?>
                                            <li><a href="<?php echo base_url().$row3['child_submenu_url']; ?>" data-value="<?php echo $row3["child_submenu_id"]; ?>" onclick="" id="child_submenu"><?php echo $row3['child_submenu_name']; ?><span id="<?php if($row3["child_submenu_name"] == "My Task"): echo "my_task_id"; endif; ?>"> </span>
                                            <?php 
                                        $bell_flag = false;
                                        if($row1["submenu_name"] == "Task Management"){ 
                                            if($task_counter != 0){
                                            
                                                if($row3["child_submenu_name"] == "My Task"){
                                                    $bell_flag = true;
                                            ?>
                                        <span class="badge badge-pink rounded-circle noti-icon-badgeml-1" style="<?php if($this->session->userdata("@_user_role_id")==1 || $this->session->userdata("@_user_role_id") == 2): echo "display:none;"; endif; ?>"><?php echo $task_counter; ?></span>
                                        <?php }}} ?>
                                        </a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                            <?php endif; ?>
                        </li>
                    <?php endforeach;
                else : ?>
                <?php endif; ?>

                <?php if (($this->session->userdata("@_user_role_id") == 1) || ($this->session->userdata("@_user_role_id") == 2)) : ?>
                    <li class="has-submenu">
                        <a href="#"> <i class="fe-airplay"></i>Menus</a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url(); ?>sup_admin/menu"> Menu</a></li>
                            <li><a href="<?php echo base_url(); ?>sup_admin/menu/submenu_list"> Sub-Menu</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<script>
    function GetSubmenu_Id(submenu_id) {
        // var submenu_id = submenu_id;
        // alert(submenu_id);
        // var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
        // var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
        // var url = '<?php echo base_url(); ?>login/logout';
        // CheckFormAccess(submenu_permission, submenu_id,url);
        // check(role_permission, submenu_id);
    }

    function onLogOut() {

        var url = "<?php echo $base_url; ?>login/logout";
        var staff_id = '<?php $this->session->userdata("@_staff_id"); ?>';
        var user_role_id = '<?php $this->session->userdata("@_user_role_id"); ?>';
        if (user_role_id != "" || staff_id != "" || url != "") {
            // alert("hi");
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    staff_id: staff_id,
                    user_role_id: user_role_id,
                },
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            // location.reload();
                            window.location.href = '<?php echo base_url(); ?>login';
                        }, 1000);
                    } else {
                        toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    // $(document).ready(function() {
    //     var path = window.location.pathname;
    //     var page = path.split("/").pop();
    //     var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
    //     var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
    //     var url = '<?php echo base_url(); ?>login/logout';

        // if (page == "insurance_company_details") {
            // alert("hi)");
            // var id = $("#submenu").data("value");
            // if (id != "") {
            //     CheckFormAccess(submenu_permission, 1,url);
            //     check(role_permission, 1);
            // }
        // }
    // });
</script>