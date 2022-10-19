<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.js"></script>
<!-- Toastr -->
<script src="../public/plugins/toastr/toastr.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="../public/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../public/plugins/raphael/raphael.min.js"></script>
<script src="../public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../public/plugins/chart.js/Chart.min.js"></script>
<!-- Load Data Tables Plug Ins -->
<!-- Data Tables CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../public/js/pages/dashboard2.js"></script>
<!-- Init  Alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
        toastr.success('<?php echo $success; ?>')
    </script>

<?php }
if (isset($err)) { ?>
    <script>
        toastr.error('<?php echo $err; ?>')
    </script>
<?php }
if (isset($info)) { ?>
    <script>
        toastr.warning('<?php echo $info; ?>')
    </script>
<?php }
?>
<script>
    // Prevent Double Resubmission
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script>
    /* Init Tool Tip Js */
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    /* Init Data Tables */
    $(document).ready(function() {
        $('.table').DataTable();
    });

    $(document).ready(function() {
        $('.report_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    /* Print Contents Inside Div Tag */
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }

    /* Only Add Active To Active Class */
    jQuery(function($) {
        var path = window.location.href;
        $('ul a').each(function() {
            if (this.href === path) {
                $(this).addClass('active');
            }
        });
    });
</script>