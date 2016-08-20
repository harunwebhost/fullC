


<?php require_once('../template_module/head_section.php'); ?>

 <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

<!-- https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
 -->


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
                                <div class="col-lg-6 col-lg-offset-2">

                                    <form role="form" action="file_download.php" method="POST">
                                      <div class="form-group">
                                          <label>Select Response Type</label>
                                          <select class="form-control" name="lead_status" id="sel1">
                                              <option value="Select">Select</option>
                                               <option value="Free trail">Free trail</option>
                                              <option value="Call After Some Time">Call After Some Time</option>
                                               <option value="Switched Off">Switched Off</option>
                                                <option value="Did Not Pick My Phone">Did Not Pick My Phone</option>
                                                <option value="Call On Discount Offer">Call On Discount Offer</option>
                                                <option value="Subscribed">Subscribed</option>
                                                <option value="Get Back to us">Get Back to us</option>
                                                <option value="Language Issues">Language Issues</option>
                                                <option value="Not Intersted">Not Intersted</option>
                                                  <option value="Intersted">Intersted</option>
                                                    <option value="Not Satisfied">Not Satisfied</option>
                                                      <option value="Satisfied">Satisfied</option>
                                                       <option value="Make Payment">Make Payment</option>
                                                        <option value="Call Back">Call Back</option>
                                                        <option value="Does Not Trade">Does Not Trade</option>
                                             
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>From Date</label>
                                          <input class="form-control" placeholder="Enter Date" name="fromdate" id="fromdate">
                                         
                                      </div>
                                       <div class="form-group">
                                          <label>To Date</label>
                                          <input class="form-control" placeholder="Enter Date" name="todate" id="todate">
                                         
                                      </div>
                                        <input type="submit" class="btn btn-default btn-success"/ value="Update Lead">
                                       
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
   
 <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 <script>
         $(function() {
            $( "#fromdate" ).datepicker({
               showWeek:true,
               yearSuffix:"-CE",
               showAnim: "slide",
                dateFormat: "mm-dd-yy",
            
            });

            $( "#todate" ).datepicker({
               showWeek:true,
               yearSuffix:"-CE",
               showAnim: "slide",
                dateFormat: "mm-dd-yy",
            
            });


          
         });
      </script>





      

