var base_url = $('meta[name=base_url]').attr("content");
var loader = `<img src="${base_url}assets/images/plugins/ajax-loader.gif">`;
var pageLength = 50;
var table;
var indexRow;
// $(function(){  // wait for the page to be ready
//    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//       var target = $(e.target).attr("data-type") // activated tab
//       console.log(target);
//       CallTable(target)
//     });
// });

function DrawDataTable(table_id,url,file_name ='kumar', title ='Kumar',show_columns = [],orderable= [],center_align= [], right_align = [],switches = false,select = '',orientation = 'portrait',pageSize = 'A4'){
    // console.log('DrawDataTable - '+table_id);
    $(table_id+' tfoot th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Status' && title != 'Sr No.')
            $(this).html( '<input type="text" class="form-control input-style" style="height:36px" placeholder="Search '+title+'" />' );
    });

    table = $(table_id).DataTable({
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
                    columns: show_columns
                },
                filename: file_name,
                title: title,
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: show_columns
                },
                text: 'PDF',
                titleAttr: 'PDF',
                extension: ".pdf",
                filename: file_name,
                title: title,
                orientation: orientation,
                pageSize : pageSize
            },
            'colvis'
        ],
        destroy:true,
        responsive: true,
        processing: true,
        "order": [],
        "pageLength": pageLength,
        language: {
            "processing": loader
        },
        "dom": 'Bfrtip',
        "sAjaxSource": base_url + 'Api/'+controller+'/'+url,
        "columnDefs": [
            { "orderable": false, "targets": orderable },
            { className: "align-center nowrap", "targets": center_align },
            { className: "align-right nowrap", "targets": right_align }
        ],
        "aoColumnDefs": [
          { "sType": "html", "aTargets": [ switches ] }
        ],
        mark: {
            element: 'span',
            className: 'highlight'
        },
        initComplete: function () {
            if(select != ''){
                // console.log('table ID:'+table_id);
                
                this.api().columns([select]).every( function () {
                    
                    var column = this;
                    // console.log(JSON.stringify(column,null,4));
                    var select = $('<select class="form-control input-style" style="height:36px"><option value="">All</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            // var val = $(this).val() 
                            // console.log('val:'+val);
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
     
                    column.data().unique().sort().each( function ( d, j ) {
                        // console.log('d:'+JSON.stringify(d));
                        // console.log('j:'+JSON.stringify(j));
                        // var t = $(d).val()
                        select.append( "<option value='"+d+"'>"+d+"</option>" )
                    } );
                } );
                
            }            
            // $('[data-plugin="switchery"]').each(function(a, n) {
            //     new Switchery($(this)[0], $(this).data())
            // })
        },
        "createdRow": function (row, data, index) {
            if(switches){
                var switchElem = Array.prototype.slice.call($(row).find('.verifyIt'));
                switchElem.forEach(function (html) {
                    var switchery = new Switchery(html, { size : 'small', color: '#1bb99a', secondaryColor: '#ff5d48' });
                });

            }
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

toastr.options.closeButton = true;
$('#back').click(function() {
    parent.history.back();
    return false;
});

$(".number").on("keypress", function(event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        $(this).val('');
        toastr.remove();
        toastr.error("Please Enter Number Only");
        $(this).focus();
        event.preventDefault();
    }
});

function getPP(n){
    // const arrayOfDigits = Array.from(String(numToSeparate), Number);
    var retval = '';
    var arrD = ['K','M','E','H','T','A','B','R','O','S'];
    var arr = n.toString().split('') ;
    
    for(i=0; i<arr.length; i++) {
        var vl  = arr[i];
        // console.log(vl);
        retval += arrD[vl];
    }
    return retval;
    // var arr = n.toString(10).split('').map(Number);
}

(function( $ ) {
 
   $.fn.startLoading = function() {
        return this.each(function() {
            $(this).attr("disabled", true).addClass("disabled");
            $icon = $(this).find('i');
            $icon.show();
            $icon.data('loader-icons', $icon.attr('class'))
            $icon.removeAttr('class');
            $icon.addClass("fa").addClass("fa-spin").addClass("fa-spinner");
        });
    }
 
    $.fn.stopLoading = function() {
        return this.each(function() {
            $(this).removeAttr("disabled").removeClass("disabled");
            $icon = $(this).find('i');
            $icon.hide();
            $icon.removeAttr('class');
            $icon.attr('class', $icon.data('loader-icons'));
        });
    }
 
}( jQuery ));

$(document).on("click", ".delete" , function(e) {
    indexRow        = this.parentNode.parentNode.rowIndex; 
    console.log('Delete Index:'+indexRow);
    var id              = $(this).data('id')
    var type            = $(this).data('type')
    var name            = $(this).data('name')
    var message         = 'Are you sure you want to delete this '+name+' ?'
    // showDialog(id, title, message, type, name)

    $("#did").val(id);
    $("#dname").val(name);
    $("#dtype").val(type);
    $("#DeleteMsg").html(message);
    $("#DeleteModal").modal('show');
    // $('#deletebtn').focus();

}); 
    
$("#DeleteModal").on("shown.bs.modal", function (event) {  
    // alert("focused!");
    $("#deletebtn").focus();
});

$(document).on("click", "#deletebtn" , function(e) { 
    var id              = $("#did").val();
    var name            = $("#dname").val();
    var type            = $("#dtype").val();
    // console.log(id, type, name);
    $("#DeleteModal").modal('hide');
    confirmdelete(id, type, name);
});

$(document).on("click", "#deleteallbtn" , function(e) { 
    var id              = $("#did_all").val();
    var name            = $("#dname_all").val();
    var type            = $("#dtype_all").val();
    // console.log(id, type, name);
    $("#DeleteAllModal").modal('hide');
    confirmalldelete(id, type, name);
});

function deleteAll(id, name, type){ 
    // indexRow        = this.parentNode.parentNode.rowIndex; 
    console.log('Delete All Index:'+indexRow);
    var message         = 'Are you sure you want to delete All Child Data Also for this '+name+' ?'
    // showDialog(id, title, message, type, name)

    $("#did_all").val(id);
    $("#dname_all").val(name);
    $("#dtype_all").val(type);
    $("#DeleteAllMsg").html(message);
    $("#DeleteAllModal").modal('show');
    // $('#deletebtn').focus();



}

// function showDialog(id, title, message, type, name) {

//     swal({
//         title: " Delete "+name+" ? ",
//         text: message,
//         html: true,
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//       })
//       .then((willDelete) => {
//         if (willDelete) {
//           confirmdelete(id, type, name);
//         }
//     });
// }

// function showConfirmMessage(id, title, message) {
//     swal({
//         title: title+" Deleted ? ",
//         text: message,
//         html: true,
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//       })
//       .then((willDelete) => {
//         // alert(`willDelete ${willDelete}`);
//         if (willDelete) {
//           confirmdelete(id);
//         }
//     });
// }

$(document).on('click', '.resetbtn', function(e){
    e.preventDefault()
    let formId = $(this).data('form')
    reset(formId)
})

function reset(formId){

    // If all form should get Reseted then unblock this code
    // $('.resetbtn').hide();
    // $('.frm').trigger("reset");
    // $('.frm input[name="id"]').val(0);

    // If only this form should get Reseted then unblock this code
    $('#'+formId+' .resetbtn').hide();
    $('#'+formId).trigger("reset");
    $('#'+formId+' input[name="id"]').val(0);


    if(formId == 'frm_mfdetail'){
        FillFund('');
    }
    if(formId == 'frm_fixeditems'){
        $(".editrow").hide();
        $(".addrow").show();
    }
    $('.selectpicker').val();
    $('.selectpicker').selectpicker('refresh');
    $('.'+formId).focus();
    // $('#id').val(0);
}

function showReset(formId){
    $('#'+formId+' button[name="resets"]').show();
    $("."+formId).focus();
    topFunction();
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

$("#light-mode-switch").on('change', function() {
    // alert()
    if (this.checked) {
        changeTheme('light')
    }
});

$("#dark-mode-switch").on('change', function() {
    // alert()
    if (this.checked) {
        changeTheme('dark')
    }

});


function changeTheme(theme){
    // alert();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/theme",
        data    : {theme},
        dataType: 'json',
        success : function(resData){
            // alert(JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        toastr.error(value);
                        return false;
                    }
                });
            }
        },error: function(err){
            // alert('err '+JSON.stringify(err))
        }
    });
    return false;  //stop the actual form post !important!
}

$(document).on("click", ".verifyIt" , function(e) { 

    var id                  = $(this).attr('data-id');
    var table_name          = $(this).attr('data-table');
    var table_id            = $(this).attr('data-type');
    // var afterverified   = $(this).attr('data-checked');
    var verified        = 0;
    if (this.checked) {
        verified = 1;
    }
    alert('ffdfs');
    toastr.remove();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/user/verify",
        data    : {table:table_name,id,verified},
        dataType: 'json',
        success : function(resData){
            console.log('resData:'+JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                    $('[data-id='+id+']').attr("data-checked",verified);
                   // table.redraw();
                    // if(verified == 1){
                    //     $('[data-vid='+id+']').html('Yes');
                    //     $('[data-vid='+id+']').removeClass('badge-danger').addClass('badge-success');
                    // }else{
                    //     $('[data-vid='+id+']').html('No');
                    //     $('[data-vid='+id+']').removeClass('badge-success').addClass('badge-danger');
                    // }
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        toastr.error(value);
                        return false;
                    }
                });
            }
        },error: function(err){
            // alert('err '+JSON.stringify(err))
        }
    });
    return false;
});

$(document).on("click", ".verifyIt1" , function(e) { 

    var id              = $(this).attr('data-id');
    var table_name      = $(this).attr('data-table');
    var table_id        = $(this).attr('data-type');
    var afterverified   = $(this).attr('data-checked');
    var verified        = parseInt(1 - afterverified);
    // if (this.checked) {
    //     verified = 1;
    // }
    toastr.remove();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/user/verify",
        data    : {table:table_name,id,verified},
        dataType: 'json',
        success : function(resData){
            console.log('resData:'+JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                    $('[data-id='+id+']').attr("data-checked",verified);
                    if(verified == 1){
                        $('[data-vid='+id+']').html('Yes');
                        $('[data-vid='+id+']').removeClass('badge-danger').addClass('badge-success');
                    }else{
                        $('[data-vid='+id+']').html('No');
                        $('[data-vid='+id+']').removeClass('badge-success').addClass('badge-danger');
                    }
                    $('#'+table_id+'Table').DataTable().ajax.reload(false);
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        toastr.error(value);
                        return false;
                    }
                });
            }
        },error: function(err){
            // alert('err '+JSON.stringify(err))
        }
    });
    return false;
});

$(document).on("click", ".ValidateIt" , function(e) { 

    var id              = $(this).attr('data-id');
    var table_name      = $(this).attr('data-table');
    var table_id        = $(this).attr('data-type');
    var afterverified   = $(this).attr('data-checked');
    var item            = $(this).attr('data-item');
    var cut             = $(this).attr('data-cut');
    var fld             = $(this).attr('data-fld');
    var vl              = $(this).attr('data-vl');
    var verified        = parseInt(1 - afterverified);
    // if (this.checked) {
    //     verified = 1;
    // }
    toastr.remove();
    $.ajax({
        type    : "POST",
        url     : base_url+"Api/user/validate",
        data    : {table:table_name,id,verified, item, cut,fld},
        dataType: 'json',
        success : function(resData){
            console.log('resData:'+JSON.stringify(resData));
            var {status,validate,message} = resData;
            if (validate === true) {
                if(status === true){
                    toastr.success(message);
                    $('[data-id='+id+']').attr("data-checked",verified);
                    if(verified == 1){
                        $('[data-sid='+id+']').html(vl);
                        $('[data-sid='+id+']').removeClass('badge-danger').addClass('badge-success');
                    }else{
                        $('[data-sid='+id+']').html(vl);
                        $('[data-sid='+id+']').removeClass('badge-success').addClass('badge-danger');
                    }
                    $('#'+table_id+'Table').DataTable().ajax.reload(false);
                }else if(status == false){
                    toastr.warning(message);
                    return false;
                }
            }else{
                $.each(message, function(key, value) {
                    if(value != ''){
                        toastr.error(value);
                        return false;
                    }
                });
            }
        },error: function(err){
            // alert('err '+JSON.stringify(err))
        }
    });
    return false;
});

function RemoveRow(type){
    indexRow = indexRow + 1;
    $("#"+type+"Table tr").eq(indexRow).remove();
    // $('#'+type+'Table').DataTable().ajax.reload();
    //reset('frm_'+type)
}
//Vishulene and Mytex Modal Windows

$(document).on("click", "#pricelistbtn" , function(e) {
    $("#con-close-modal").modal('show');
});


$('#con-close-modal').on('show.bs.modal', function (e) {
    $("#msg").hide();
    reset("createpricelist");
    $("#frm").show();
    $("#createpricelist").show();
    $('#packing_types').selectpicker('refresh');  
})


$("#msg-modal").on("shown.bs.modal", function (event) {  
    $('#closebtn2').focus();
})

