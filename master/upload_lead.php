
<?php require_once('../template_module/head_section.php'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('../template_module/top_nav.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Leads</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <?php //require_once('template_module/dash.php'); ?>
            <!-- /.row -->
            <?php require_once('lead_form.php'); ?>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php require_once('../template_module/footer.php'); ?>