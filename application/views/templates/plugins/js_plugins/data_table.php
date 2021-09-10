
<!-- Required datatable js -->
<script src="<?php echo base_url(); ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?php echo base_url(); ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables/buttons.colVis.js"></script>
<script>
    REINITIALIZETABLE();

    function REINITIALIZETABLE() {
        var a = $("#datatable").DataTable({
            dom: 'Bfrtip',
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"]
        });
        $("#key-table").DataTable({
            keys: !0
        }), $("#responsive-datatable").DataTable(), $("#selection-datatable").DataTable({
            select: {
                style: "multi"
            }
        }), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    }
</script>