

<?php require_once('../template_module/head_section.php'); ?>

<body>
    <div id="wrapper">
        <!-- Navigation -->

        <?php require_once('../template_module/top_nav.php'); ?>

       

          <?php //require_once('../template_module/dash.php'); ?>

            <!-- /.row -->

            <?php //require_once('../template_module/show_lead.php'); ?>


             <?php 
                if(isset($_GET['lead_history_id'])){
                  $lead_history_id=$_GET['lead_history_id'];
                }
              log_history("master",$lead_history_id);

             ?>

            

                  

                <!-- closed div -->
                  </div>

                 </div>

 

   <?php require_once('../template_module/footer.php'); ?>