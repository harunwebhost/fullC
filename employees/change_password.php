


<?php require_once('../template_module/head_section.php'); ?>
 <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">


<!-- https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
 -->
<?php 
    
  echo "looged user".$logged_user_id=logged_user_id();
      if(isset($logged_user_id) && isset($_GET['lead_id'])){
        $lead_id=sql_injection($_GET['lead_id']);
        $open_lead_select="Select * from crm_leads WHERE lead_id='$lead_id'";
        $open_lead_execute=execute_sql_query($open_lead_select);
        $fetch_lead=execute_fetch($open_lead_execute);
      }
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('../template_module/top_nav.php'); ?>
       
          <?php //require_once('../template_module/dash.php'); ?>
            <!-- /.row -->
            <?php //require_once('../template_module/show_lead.php'); ?>

            <div id="page-wrapper">
            <div class="row">
           <hr>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Lead Infomation
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               
                                    

   
                  
                                    
                                     
               
                           

                                      
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                              
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

             
</div>
                        </div>
                 </div>
 
   <?php require_once('../template_module/footer.php'); ?>
   
  


      

