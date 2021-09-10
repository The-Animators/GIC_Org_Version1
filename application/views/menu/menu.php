<div class="page-content">
    <div class="page-title with-desc">
        <div class="ui right floated segment transparent page-actions">
            <button class="ui icon button positive" data-target="#policyFilter" data-toggle="slide">
                <i class="filter icon"></i>
            </button>
            <button class="ui labeled icon button primary" data-target="#newmenuModal" data-toggle="modal">
                <i class="ion-ios-plus-outline icon"></i>
                Add Menu
            </button>
        </div>
        <h2><?php echo $page_title; ?></h2>
        <p></p>
    </div>

    <div class="ui segment white" id="policyFilter" style="display:none;">
        <form action="https://insura.simcycreative.com/policies" method="GET">
            <div class="ui form">
                <div class="five fields">
                    <div class="field">
                        <label>Ref No.</label>
                        <input type="text" name="policy_ref" placeholder="Ref No." value="" />
                    </div>
                    <div class="field">
                        <label>Expiry date from</label>
                        <div class="ui labeled input">
                            <label for="expiryFrom" class="ui label"><i class="calendar icon"></i></label>
                            <input type="text" class="datepicker" id="expiryFrom" name="expiry_from" placeholder="Expiry Date" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Expiry date to</label>
                        <div class="ui labeled input">
                            <label for="expiryTo" class="ui label"><i class="calendar icon"></i></label>
                            <input type="text" class="datepicker" id="expiryTo" name="expiry_to" placeholder="Expiry Date" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Renewal date from</label>
                        <div class="ui labeled input">
                            <label for="renewalFrom" class="ui label"><i class="calendar icon"></i></label>
                            <input type="text" class="datepicker" id="renewalFrom" name="renewal_from" placeholder="Renewal Date" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Renewal date to</label>
                        <div class="ui labeled input">
                            <label for="renewalTo" class="ui label"><i class="calendar icon"></i></label>
                            <input type="text" class="datepicker" id="renewalTo" name="renewal_to" placeholder="Renewal Date" value="" />
                        </div>
                    </div>
                </div>
                <div class="five fields">
                    <div class="field">
                        <label>Product</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="product" />
                            <div class="default text text-ellipsis">Product</div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="140">
                                    <i class="angle right icon"></i>
                                    Accident Cover
                                </div>
                                <div class="item" data-value="141">
                                    <i class="angle right icon"></i>
                                    Medical
                                </div>
                                <div class="item" data-value="145">
                                    <i class="angle right icon"></i>
                                    DDDD
                                </div>
                                <div class="item" data-value="148">
                                    <i class="angle right icon"></i>
                                    P&amp;I
                                </div>
                                <div class="item" data-value="149">
                                    <i class="angle right icon"></i>
                                    Car
                                </div>
                                <div class="item" data-value="150">
                                    <i class="angle right icon"></i>
                                    LIC Poilcies
                                </div>
                                <div class="item" data-value="151">
                                    <i class="angle right icon"></i>
                                    AAA Dog Cover
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Premium Max</label>
                        <div class="ui labeled input">
                            <label for="premiumMax" class="ui label">Ksh</label>
                            <input type="text" id="premiumMax" name="premium_max" placeholder="Premium" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Premium Min</label>
                        <div class="ui labeled input">
                            <label for="premiumMin" class="ui label">Ksh</label>
                            <input type="text" id="premiumMin" name="premium_min" placeholder="Premium" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Due Max</label>
                        <div class="ui labeled input">
                            <label for="dueMax" class="ui label">Ksh</label>
                            <input type="text" id="dueMax" name="due_max" placeholder="Due" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <label>Due Min</label>
                        <div class="ui labeled input">
                            <label for="dueMin" class="ui label">Ksh</label>
                            <input type="text" id="dueMin" name="due_min" placeholder="Due" value="" / />
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="ui button" type="reset"> Clear </button>
                    <button class="ui labeled icon button black" name="filter" type="submit"> <i class="search icon"></i> Filter </button>
                </div>
            </div>
        </form>
    </div>
    <div class="ui segment white">
        <table class="ui table">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>Ref No.</th>
                    <th>Client</th>
                    <th>Product</th>
                    <th>Insurer</th>
                    <th>Premium</th>
                    <th>Due</th>
                    <th class="center aligned">Status</th>
                    <th class="center aligned">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="negative">
                    <td>1</td>
                    <td>LACZ6PSZ</td>
                    <td>amit dhakariya</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh50000.00</td>
                    <td>Ksh685</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/451" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>2</td>
                    <td>OMTYLZOO</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh11.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/452" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>3</td>
                    <td>GL4G3283</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh77.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/453" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>4</td>
                    <td>LQJCMRHH</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh400000.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/454" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="negative">
                    <td>5</td>
                    <td>PLP5SL4I</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh49000.00</td>
                    <td>Ksh48998</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/455" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>6</td>
                    <td>OBJ7LS5N</td>
                    <td>Sodais Nasir</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh12.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/456" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>7</td>
                    <td>WMH2KNKF</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh98.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/457" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>8</td>
                    <td>5SNUWCTA</td>
                    <td>amit dhakariya</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh100000.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/459" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>9</td>
                    <td>NMIICZ9T</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh8.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/460" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="positive">
                    <td>10</td>
                    <td>FE3DPANR</td>
                    <td>ttttttttttttttt tttttttttttttt</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh51.00</td>
                    <td>Ksh0</td>
                    <td class="center aligned">
                        <div class="ui green mini label"> Paid</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/462" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="warning">
                    <td>11</td>
                    <td>HEXHEA2L</td>
                    <td>Sady Luaxy</td>
                    <td class="text-ellipsis">Accident Cover</td>
                    <td>tebza</td>
                    <td>Ksh5000.00</td>
                    <td>Ksh3000</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/463" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="negative">
                    <td>12</td>
                    <td>TDXZ3GDM</td>
                    <td>elmakurdu sahya</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh4100.00</td>
                    <td>Ksh3900</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/464" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="negative">
                    <td>13</td>
                    <td>GCTU1QU2</td>
                    <td>Rahat Pappu</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh5222.00</td>
                    <td>Ksh3126</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/465" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="negative">
                    <td>14</td>
                    <td>RPQCJEQC</td>
                    <td>ROSE DIGGS</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh52200.00</td>
                    <td>Ksh49578</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/466" class="ui mini grey label"> View </a>
                    </td>
                </tr>
                <tr class="negative">
                    <td>15</td>
                    <td>TTGF3ILD</td>
                    <td>elmakurdu sahya</td>
                    <td class="text-ellipsis">Medical</td>
                    <td>kovit</td>
                    <td>Ksh5000.00</td>
                    <td>Ksh2000</td>
                    <td class="center aligned">
                        <div class="ui orange mini label"> Partial</div>
                    </td>
                    <td class="center aligned">
                        <a href="https://insura.simcycreative.com/policies/467" class="ui mini grey label"> View </a>
                    </td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th class="center aligned ui" colspan="3">
                        Showing 1 to 15 of 30
                    </th>
                    <th class="center aligned ui" colspan="6">
                        <div class="ui pagination menu"><a class="disabled item"><i class="left chevron icon"></i></a> <a class="active item">1</a><a class="item" href="https://insura.simcycreative.com/policies?page=2">2</a> <a class="item icon" href="https://insura.simcycreative.com/policies?page=2"><i class="right chevron icon"></i></a></div>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Start Page Modals -->
<!-- new policy modal -->
<div class="ui tiny modal" id="newmenuModal">
    <div class="header">Menu</div>
    <div class="scrolling content">
        
            <label id="menu_id" hidden>1</label>
            <div class="ui form">

                <div class="two fields">
                    <div class="field required">
                        <label>Menu Name</label>
                        <input type="text" name="menu_name" id="menu_name" placeholder="Enter Menu Name" value="">
                        <span id="menu_name_err"></span>
                    </div>

                    <div class="field required">
                        <label>Menu Url</label>
                        <input type="text" name="menu_url" id="menu_url" placeholder="Enter Menu Url" value="">
                        <span id="menu_url_err"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui buttons">
            <button class="ui cancel button">Cancel</button>
            <div class="or" data-text="OR"></div>
            <button class="ui positive primary button" id="update" onclick='onUpdate()' style="display: none;">Update</button>
            <button class="ui positive primary button" id="delete" onclick='OnDelete()' style="display: none;">Delete</button>
            <button class="ui positive primary button" id="recover" onclick='OnRecover()' style="display: none;">Recover</button>
            <button class="ui positive primary button" id="submit">Create</button>
        </div>
    </div>
</div>
<!-- End Page Modals -->
<script>
    $('#menu_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#menu_url').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function OnRecover() {
        var menu_id = $("#menu_id").text();

        if (confirm("Are You Sure You Want To Recover This MAC Address ?")) {
            $.ajax({
                type: "POST",
                url: '../function/MacAddressMaster.php',
                data: {
                    method: 'recoverMac',
                    id: menu_id,
                },

                success: function(data) {
                    if (data.includes("Updated Successful") || data.includes("Deleted Successful") || data.includes("Recovered Successful") || data.includes("Inserted Successful")) {
                        toaster(message_type = "Success", message_txt = data, message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        toaster(message_type = "Error", message_txt = data, message_icone = "error");
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function OnDelete() {
        var menu_id = $("#menu_id").text();

        if (confirm("Are You Sure You Want To Delete This MAC Address ?")) {
            $.ajax({
                type: "POST",
                url: '../function/MacAddressMaster.php',
                data: {
                    method: 'deleteMac',
                    id: menu_id,
                },

                success: function(data) {
                    if (data.includes("Updated Successful") || data.includes("Deleted Successful") || data.includes("Recovered Successful") || data.includes("Inserted Successful")) {
                        toaster(message_type = "Success", message_txt = data, message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        toaster(message_type = "Error", message_txt = data, message_icone = "error");
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        $("#menu_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();

        $.ajax({
            type: "POST",
            url: '../function/MacAddressMaster.php',
            data: {
                method: 'getSingleMac',
                id: val,
            },

            success: function(data) {
                var myObj = JSON.parse(data);
                $("#menu_id").text(myObj[0].id);
                $("#MacAddress").val(myObj[0].menu_id);

                var isActive = myObj[0].isActive;

                if (isActive == 'no') {
                    $("#recover").show();
                    $("#update").hide();
                    $("#delete").hide();
                    //$("#clearform").hide();
                } else {
                    $("#recover").hide();
                    $("#update").show();
                    $("#delete").show();
                    //$("#clearform").show();
                }
                document.getElementById("update").disabled = true;

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });

    }

    function onUpdate() {
        var menu_id = $("#menu_id").text();
        var MacAddress = $("#MacAddress").val();

        if (!$("#MacAddress").val()) {
            alert("Please Enter Mac Address.");
            $("#MacAddress").focus();
            return;
        }

        var user_id = '1';
        $.ajax({
            type: "POST",
            url: '../function/MacAddressMaster.php',
            data: {
                method: 'updateSingleMac',
                id: menu_id,
                menu_id: MacAddress
            },

            success: function(data) {
                if (data.includes("Updated Successful") || data.includes("Deleted Successful") || data.includes("Recovered Successful") || data.includes("Inserted Successful")) {
                    toaster(message_type = "Success", message_txt = data, message_icone = "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    toaster(message_type = "Error", message_txt = data, message_icone = "error");
                }
                // alert(data);
                // if (data == "Updated Successful") {
                //     location.reload();
                // }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var menu_name = $("#menu_name").val();
        var menu_url = $("#menu_url").val();

        var url = "<?php echo $base_url; ?>sup_admin/menu/add_menu";
        $.ajax({
            url: url,
            data: {
                menu_name: menu_name,
                menu_url: menu_url,
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },

            success: function(data) {
                // alert(data["status"]);
                if (data["status"] == true) {
                    // toastr.success(data["message"]);
                    $("#message").text(data["message"]);
                    $("#menu_name").val("");
                    $("#menu_url").val("");
                    $('#newmenuModal').modal('hide');
                } else {
                    $('#newmenuModal').modal('hide');
                    $("#menu_name_err").addClass("text-danger").html(data["message"]["menu_name_err"]);
                    $("#menu_url_err").addClass("text-danger").html(data["message"]["menu_url_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });
</script>