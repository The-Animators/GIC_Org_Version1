var title = 'Mytex ';
var controller = 'Mytex';

$(document).ready(function() {
    getPackingType()
    getCut()
    getItemPacking()
    getItems()
    getPriceList()
});

//***********************Vishnu Packing Type********************************************//

function getPackingType(){
    // alert(base_url + 'Api/'+controller+'/main')
    $('#vishnuPackingItem_table tfoot th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Sr No.')
            $(this).html( '<input type="text" class="form-control input-style" style="height:36px" placeholder="Search '+title+'" />' );
    });

    table = $('#vishnuPackingItem_table').DataTable({
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    // columns: ':visible'
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                },
                text: 'PDF',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "VishnulenePackingType",
                title: "Vishnulene Packing Type List",
                orientation: 'portrait',
            },
            'colvis'
        ],
        destroy:true,
        responsive: false,
        processing: true,
        language: {
            "processing": `<img src="${base_url}/assets/images/plugins/ajax-loader.gif">`
        },
        "dom": 'Bfrtip',
        'ajax': {
            "type": "GET",
            cache: true,
            "url": base_url + 'Api/'+controller+'/packing_type',
        },
        "columnDefs": [
            { "orderable": false, "targets": [0,3] },
            { className: "align-center nowrap", "targets": [ 3 ] }
        ],
        'columns': [
            { 'data': 'id' ,
                render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { 'data': 'packing_name' },
            { 'data': 'cost' },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = '';
                    if(admin_type == 1){
                        action = `
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-info nowrap getPackingTypeDetail" data-type="packing_type"> <i class="fa fa-edit" title="Edit"></i> Edit </button>
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-danger nowrap delete" data-name="Vishnu Packing Type" data-type="packing_type"> <i class="fa fa-close pad-left-5" title="Delete"></i> Delete</button>
                        `;
                    }
                    return action;
                }
            }
        ], // columns        
        mark: {
            element: 'span',
            className: 'highlight'
        },
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
           var index = iDisplayIndex +1;
            $('td:eq(0)',nRow).html(index);
            return nRow;
        }
    });

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    getPackingTypeList();
}

$(document).on("click", ".getPackingTypeDetail" , function(e) {
    var id      = $(this).data('id');
    var formId  = 'vishnuPackingItem';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/packing_type/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="packing_name"]').val(data[0].packing_name)
                $('#'+formId+' input[name="cost"]').val(data[0].cost)
                $(".resetMain").hide()
                $('#'+formId+' button[name="resets"]').show()
                topFunction();
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
});


//***********************Vishnu Cut********************************************//

function getCut(){
    $('#vishnuCut_Table tfoot th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Sr No.')
            $(this).html( '<input type="text" class="form-control input-style" style="height:36px" placeholder="Search '+title+'" />' );
    });

    table = $('#vishnuCut_Table').DataTable({
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    // columns: ':visible'
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                },
                text: 'PDF',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "VishnulenePackingType",
                title: "Vishnulene Packing Type List",
                orientation: 'portrait',
            },
            'colvis'
        ],
        destroy:true,
        responsive: false,
        processing: true,
        language: {
            "processing": `<img src="${base_url}/assets/images/plugins/ajax-loader.gif">`
        },
        "dom": 'Bfrtip',
        'ajax': {
            "type": "GET",
            cache: true,
            "url": base_url + 'Api/'+controller+'/cut',
        },
        "columnDefs": [
            { className: "align-center nowrap", "targets": [ 1 ] }
        ],

        'columns': [
            { 'data': 'cut' },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = '';
                    if(admin_type == 1){
                        action = `
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-info nowrap getCutDetails" data-type="cut"> <i class="fa fa-edit" title="Edit"></i> Edit </button>
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-danger nowrap delete" data-name="Vishnu Cut" data-type="cut"> <i class="fa fa-close pad-left-5" title="Delete"></i> Delete</button>
                        `;
                    }
                    return action;
                }
            }
        ], // columns
        mark: {
            element: 'span',
            className: 'highlight'
        }
    
    });

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    getCutList();
}

$(document).on("click", ".getCutDetails" , function(e) {
    var id = $(this).data('id');
    var formId  = 'vishnuCut';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/cut/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="cut"]').val(data[0].cut)
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();
                topFunction();
                
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

//***********************Vishnu Item Packing********************************************//

function getItemPacking(){
    $('#vishnuItemPacking_Table tfoot th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Sr No.')
            $(this).html( '<input type="text" class="form-control input-style" style="height:36px" placeholder="Search '+title+'" />' );
    });

    table = $('#vishnuItemPacking_Table').DataTable({
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    // columns: ':visible'
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                },
                text: 'PDF',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "VishnulenePackingType",
                title: "Vishnulene Packing Type List",
                orientation: 'portrait',
            },
            'colvis'
        ],
        destroy:true,
        responsive: false,
        processing: true,
        language: {
            "processing": `<img src="${base_url}/assets/images/plugins/ajax-loader.gif">`
        },
        "dom": 'Bfrtip',
        'ajax': {
            "type": "GET",
            cache: true,
            "url": base_url + 'Api/'+controller+'/item_packing',
        },
        "columnDefs": [
            { "orderable": false, "targets": [0,3] },
            { className: "align-center nowrap", "targets": [ 3 ] }
        ],
        'columns': [
            { 'data': 'id' ,
                render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { 'data': 'packing_name' },
            { 'data': 'cut' },
            { 'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = '';
                    if(admin_type == 1){
                        action = `
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-info nowrap getItemPackingDetail" data-type="item_packing"> <i class="fa fa-edit" title="Edit"></i> Edit </button>
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-danger nowrap delete" data-name="Vishnu Item Packing" data-type="item_packing"> <i class="fa fa-close pad-left-5" title="Delete"></i> Delete</button>
                        `;
                    }
                    return action;
                }
            }
        ], // columns
        mark: {
            element: 'span',
            className: 'highlight'
        },
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
           var index = iDisplayIndex +1;
            $('td:eq(0)',nRow).html(index);
            return nRow;
        }
    });

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    getItemPackingList();
    getItemPackingType()
}

$(document).on("click", ".getItemPackingDetail" , function(e) {
    var id = $(this).data('id');
    var formId  = 'vishnuItemPacking';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/item_packing/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' select[name="packing_type_id"]').val(data[0].packing_type_id)
                $('#'+formId+' select[id="cut_id"]').val(data[0].cut_id)
                $('#cut_id').selectpicker('refresh');
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();
                topFunction();
                
            }else if(status == false){
                $('#is_current').prop('checked',false);
                toastr.error(message);
                $(".resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})


//***********************Vishnu Item Table********************************************//

function getItems(){
    $('#vishnuItems_Table tfoot th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Sr No.')
            $(this).html( '<input type="text" class="form-control input-style" style="height:36px" placeholder="Search '+title+'" />' );
    });

    table = $('#vishnuItems_Table').DataTable({
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    // columns: ':visible'
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                },
                text: 'PDF',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "VishnulenePackingType",
                title: "Vishnulene Packing Type List",
                orientation: 'portrait',
            },
            'colvis'
        ],
        destroy:true,
        responsive: false,
        processing: true,
        language: {
            "processing": `<img src="${base_url}/assets/images/plugins/ajax-loader.gif">`
        },
        "dom": 'Bfrtip',
        'ajax': {
            "type": "GET",
            cache: true,
            "url": base_url + 'Api/'+controller+'/items',
        },
        "columnDefs": [
            { "orderable": false, "targets": [0,2] },
            { className: "align-center nowrap", "targets": [ 2 ] }
        ],

        'columns': [
            { 'data': 'id' ,
                render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { 'data': 'item_name' },
            { 'data': 'per_meter_pp' },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = '';
                    if(admin_type == 1){
                        action = `
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-info nowrap getItemsDetails" data-type="items"> <i class="fa fa-edit" title="Edit"></i> Edit </button>
                        <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-danger nowrap delete" data-name="Vishnu Items" data-type="items"> <i class="fa fa-close pad-left-5" title="Delete"></i> Delete</button>
                        `;
                    }
                    return action;
                }
            }
        ], // columns
        mark: {
            element: 'span',
            className: 'highlight'
        },
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
           var index = iDisplayIndex +1;
            $('td:eq(0)',nRow).html(index);
            return nRow;
        }
    
    });

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    getItemsList();
}

$(document).on("click", ".getItemsDetails" , function(e) {
    var id = $(this).data('id');
    var formId  = 'vishnuItems';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/items/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' input[name="item_name"]').val(data[0].item_name)
                $('#'+formId+' input[name="per_meter_pp"]').val(data[0].per_meter_pp)
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();

                topFunction();
                
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

//***********************Vishnu Item Table********************************************//

function getPriceList(){
    $('#vishnuPricingTable_Table tfoot th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Verified' && title != 'Sr No.')
            $(this).html( '<input type="text" class="form-control input-style" style="height:36px" placeholder="Search '+title+'" />' );
    });

    table = $('#vishnuPricingTable_Table').DataTable({
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    // columns: ':visible'
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                },
                text: 'PDF',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: "VishnulenePackingType",
                title: "Vishnulene Packing Type List",
                orientation: 'portrait',
            },
            'colvis'
        ],
        destroy:true,
        responsive: false,
        processing: true,
        language: {
            "processing": `<img src="${base_url}/assets/images/plugins/ajax-loader.gif">`
        },
        "dom": 'Bfrtip',
        'ajax': {
            "type": "GET",
            cache: true,
            "url": base_url + 'Api/'+controller+'/price_list',
        },
        "columnDefs": [
            { "orderable": false, "targets": [0,6,7] },
            { className: "align-center nowrap", "targets": [ 6,7 ] }
        ],

        'columns': [
            { 'data': 'id' ,
                render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { 'data': 'item_name' },
            // { 'data': 'per_meter_pp' },
            { 'data': 'packing_name' },
            { 'data': 'cut' },
            { 'data': 'pp',
                'render' : function(data,type,row,meta){
                    let action = '';
                    action = getPP(row.pp);
                    return action;
                }
            },
            { 'data': 'sp' },
            {
                'render': function(data, type, row, meta) {
                    let action = '';
                    if(admin_type == 1){
                        let check = '';
                        if(row.verified == 1){
                            check = "checked";
                        }
                        action = `<input data-id="${row.id}" data-table="mytex_5_price_list" class="verifyIt" data-size="small" type="checkbox" ${check} data-plugin="switchery" data-color="#1bb99a" data-secondary-color="#ff5d48" />`;
                    }else{
                        if(row.verified == 1){
                            action = `<span class="badge badge-success">Yes</span>`;
                        }else{
                            action = `<span class="badge badge-danger">No</span>`;
                        }
                        // status = `<span class="badge badge-warning">Normal</span>`;
                    }
                    return action;
                }
            },
            {
                'data': 'status',
                'render': function(data, type, row, meta) {
                    let action = `
                    <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-info nowrap getPriceListDetails" data-type="price_list"> <i class="fa fa-edit" title="Edit"></i> Edit </button>
                    <button type="button" data-id='${row.id}' class="btn btn-sm btn-outline-danger nowrap delete" data-name="Vishnu Price List" data-type="price_list"> <i class="fa fa-close pad-left-5" title="Delete"></i> Delete</button>
                    `;
                    return action;
                }
            }
        ], // columns
        mark: {
            element: 'span',
            className: 'highlight'
        },
        initComplete: function () {
            $('[data-plugin="switchery"]').each(function(a, n) {
                new Switchery($(this)[0], $(this).data())
            })
        },
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
           var index = iDisplayIndex +1;
            $('td:eq(0)',nRow).html(index);
            return nRow;
        }
    
    });

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    // getItemsList();
}

$(document).on("click", ".getPriceListDetails" , function(e) {
    var id = $(this).data('id');
    var formId  = 'vishnuPricingTable';
    e.preventDefault();
    $("#toaster").remove();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/price_list/"+id,
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message } = resData;
            if(status === true){
                // $.toaster(message, 'Success', 'success');
                $('#'+formId+' input[name="id"]').val(data[0].id)
                $('#'+formId+' select[name="items_id"]').val(data[0].items_id)
                $('#'+formId+' select[name="item_packing_id"]').val(data[0].item_packing_id)
                $('#'+formId+' input[name="pp"]').val(data[0].pp)
                $('#'+formId+' input[name="sp"]').val(data[0].sp)
                $(".resetMain").hide();
                $('#'+formId+' button[name="resets"]').show();
                topFunction();
                
            }else if(status == false){
                toastr.error(message);
                $("#resetMain").hide();
                return false;
            }
        },error: function(){}
   });
   return false;  //stop the actual form post !important!
})

//***********************Common Functions*******************************************//

function getPackingTypeList(){
    $("#packing_type_id").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/packing_type",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#packing_type_id").append("<option value=''>Select Vishnu Packing Type</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['packing_name'];
                    // var name = data[i]['name'];
                    $("#packing_type_id").append("<option value='"+name+"'>"+value+"</option>");
                }                  
            }
        },error: function(){}
   });
}

function getCutList(){
    $("#cut_id").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/cut",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                // $("#cut_id").append("<option value=''>Select Vishnu cut</option>");
                for( var i = 0; i<len; i++){
                    var name = data[i]['id'];
                    var value = data[i]['cut'];
                    // var name = data[i]['name'];
                    $("#cut_id").append("<option value='"+name+"'>"+value+"</option>");
                }
                $('#cut_id').selectpicker('refresh');
                // $('#cut_id').selectpicker();                  
            }
        },error: function(){}
   });
}

function getItemsList(){
    $("#items_id").empty();
    $("#c_item_name").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/items",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data, message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#items_id").append("<option selected data-pp='a'  value=''>Select Vishnu Items</option>");
                $("#c_item_name").append("<option selected data-pp='a'  value=''>Select Item </option>");
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var item_name = data[i]['item_name'];
                    var pp = data[i]['per_meter_pp'];
                    // var name = data[i]['name'];
                    $("#items_id").append("<option data-pp='"+pp+"' data-item_name='"+item_name+"' value='"+id+"'>"+item_name+"</option>");
                    $("#c_item_name").append("<option data-pp='"+pp+"' data-item_name='"+item_name+"' value='"+id+"'>"+item_name+"</option>");
                }                  
            }
        },error: function(){}
   });
}

function getItemPackingList(){
    $("#item_packing_id").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/item_packing",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                $("#item_packing_id").append("<option selected data-cost='a' data-cut='a' value=''>Select Vishnu Item Packing</option>");
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var packing_name = data[i]['packing_name'];
                    var cost = data[i]['cost'];
                    var cut = data[i]['cut'];
                    var packing_type_id = data[i]['packing_type_id'];
                    var cut_id = data[i]['cut_id'];
                    $("#item_packing_id").append("<option data-cost='"+cost+"' data-cut='"+cut+"' value='"+id+"'>"+packing_name+" - "+cut+"</option>");
                }                  
            }
        },error: function(){}
   });
}

function getItemPackingType(){
    $("#packing_types").empty();
    $.ajax({
        type    : "GET",
        url     : base_url+"Api/"+controller+"/packing_types",
        dataType: 'json',
        success : function(resData){
            // console.log(resData);
            var {status, data,message} = resData;
            // console.log('data:'+data)
            if(status === true){
                var len = data.length;
                // $("#packing_types").append("<option selected data-cost='a' data-cut='a' value=''>Select Vishnu Item Packing</option>");
                for( var i = 0; i<len; i++){
                    // var id = data[i]['id'];
                    var packing_name = data[i]['packing_name'];
                    var cost = data[i]['cost'];
                    var cut = data[i]['cuts'];
                    var packing_type_id = data[i]['packing_type_id'];
                    var cut_id = data[i]['cut_id'];
                    $("#packing_types").append("<option data-cost='"+cost+"' data-cut='"+cut+"' value='"+packing_type_id+"'>"+packing_name+" - "+cut+"</option>");
                } 
                $('#packing_types').selectpicker('refresh');                 
            }
        },error: function(){}
   });
}


$(document).on("click", ".saveData" , function(e) {
    e.preventDefault();
    toastr.remove();
    var btnid         = $(this).attr('id');
    var mytype     = $(this).data('type');
    formId = $(this).data('form');
    $("#toaster").remove();
    var formdata = $("#"+formId).serialize();
    console.log(formdata)
    // alert(formId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/"+controller+"/"+mytype,
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
                    $('#'+formId)[0].reset();
                    $('#'+formId+' button[name="resets"]').hide()
                    if(mytype == 'packing_type'){
                        getPackingType()
                    }else if(mytype == 'cut'){
                        getCut();
                    }else if(mytype == 'item_packing'){
                        getItemPacking()
                    }else if(mytype == 'items'){
                        getItems()
                    }else if(mytype == 'price_list'){
                        getPriceList()
                    }
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

$(document).on("click", "#createpricelist" , function(e) {
    e.preventDefault();
    var pp = $("#c_item_name :selected").data('pp');
    var item_name = $("#c_item_name :selected").data('item_name');
    $("#pp").val(pp); 
    $("#item_name").val(item_name); 
    toastr.remove();
    formId = $(this).data('form');
    var formdata = $("#"+formId).serialize();
    console.log(formdata)
    // alert(formId);
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/"+controller+"/createpricelist",
        data    : formdata,
        dataType: 'json',
        beforeSend: function() {
            $("#createpricelist").startLoading();
        },
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            // console.log(message)
            if (validate === true) {
                if(status === true){
                    $("#myMsg").html(message);
                    $("#msg").show();
                    $("#frm").hide();
                    $("#createpricelist").hide();
                    getPriceList();
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
            $("#createpricelist").stopLoading();
        }, complete:function(data){
            $("#createpricelist").stopLoading();
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
                // $.toaster(message, 'Success', 'success');
                if(mytype == 'packing_type'){
                    getPackingType()
                }else if(mytype == 'cut'){
                    getCut();
                }else if(mytype == 'item_packing'){
                    getItemPacking()
                }else if(mytype == 'items'){
                    getItems()
                }else if(mytype == 'price_list'){
                    getPriceList()
                }
                // $('input[name="id"]').val(0)
                toastr.success(message);
            }else if(status == false){
                // toastr.error(message);
                toastr.error(message);
                return false;
            }
        },error: function(){}
   });
}

var pp = 0;
var cut = 0;
var cost = 0;

$(document).on("change", "#item_packing_id, #items_id" , function(e) {
    pp = $("#items_id :selected").data('pp');
    cost = $("#item_packing_id :selected").data('cost');
    cut = $("#item_packing_id :selected").data('cut');
    // console.log('pp:'+pp+' cost: '+cost+'  cut: '+cut);
    if(pp == 'a' || cost == 'a' || cut == 'a'){
        $("#pp").val('');
        // console.log('dont calculate');
    }else{
        // console.log('calculate');
        calculatePP();
    }
});

function calculatePP(){

    // 1.2, 1.3, 2.8, 3.0

    // 2.6, 3.6
    var multiplier = 0;
    if(cut == '1.20' || cut == '1.30' || cut == '2.80' || cut == '3.00'){
        multiplier = 1;
    }else if(cut == '2.60'){
        multiplier = 2;
        cut = 1.3;

    }else if(cut == '2.80'){
        multiplier = 3;
        cut = 1.2;
    }
    pp = parseFloat(pp) - parseFloat(3);
    var pp_cut = parseFloat(pp) * parseFloat(cut);
    var mod = parseFloat(pp_cut) % 5 ;
    if(mod < 3){
        pp = parseFloat(pp_cut) - parseFloat(mod);
    }else{
        pp = parseInt(pp_cut);
    }
    pp = (parseFloat(pp) + parseFloat(cost)) * multiplier;
    $("#pp").val(pp);
}

$('#con-close-modal').on('show.bs.modal', function (e) {
    $("#msg").hide();
    reset("createpricelist");
    $("#frm").show();
    $("#createpricelist").show();
    $('#packing_types').selectpicker('refresh');  
})