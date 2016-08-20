





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

                                <div class="col-lg-6">

                                    <form role="form" action="lead_response.php" method="POST">



                                    <input class="form-control" placeholder="Enter Name" name="lead_id"  type="hidden"

                                          value="<?php echo  check_empty($lead_id); ?>">

                                        <div class="form-group">

                                            <label>Name</label>

                                    <input class="form-control" placeholder="Enter Name" name="lead_name" 

                                          value="<?php echo  check_empty($fetch_lead['lead_name']); ?>">

                                         

                                      </div>

                                       <div class="form-group">

                                          <label>Email</label>

                                          <input class="form-control" placeholder="Enter Name" name="lead_email" 

                                           value="<?php echo  check_empty($fetch_lead['lead_email']); ?>">

                                         

                                      </div>

                                  </div>

                                    





                   <div class="col-lg-6">

                                       <div class="form-group">

                                          <label>Mobile</label>

                                          <input class="form-control" placeholder="Enter Name" name="lead_mobile"

                                           value="<?php echo  check_empty($fetch_lead['lead_mobile']); ?>">

                                         

                                      </div>

                                       <div class="form-group">

                                          <label>City</label>

                                          <input class="form-control" placeholder="Enter Name" name="lead_city"

                                           value="<?php echo  check_empty($fetch_lead['lead_city']); ?>">

                                         

                                      </div>

                    </div>                

                                     

                  

                                      <div class="col-lg-6">

                                  

                                      <div class="form-group">

                                          <label>Select Response</label>

                                          <select class="form-control" name="lead_status" id="sel1" required="">
                                               <option value="Call After Some Time">Call After Some Time</option>
                                             

                                              <option value="Free trail">Free trail</option>

                                             

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

                                      </div>  

                                     

                <div class="col-lg-6">

                                          <div class="form-group" id="nextcalling">

                                          <label>Next Calling Date</label>

                                          <input class="form-control" placeholder="Enter Name" id="nextdate" type="datetime" name="nextcall">

                                         

                                      </div>



                                        <div id="demolead">

                                          <div class="form-group">

                                          <label>Select Requested Services</label>

                                          <select class="form-control" name="requested_plan" id="sel1">

                                               <option>Stock cash </option>

                                               <option>Stock Cash Elite</option>

                                               <option>Stock Future</option>

                                                <option>Stock Future Elite</option>

                                                 <option>Stock Future Dynamite</option>

                                                <option>Nifty &amp; Bank Nifty</option>

                                                <option>Nifty &amp; Bank Nifty Elite</option>

                                                <option>Options</option>

                                                <option>Options Elite</option>

                                                <option>MCX</option>

                                                <option>MCX Elite</option>

                                                <option>MCX  Dynamite</option>

                                          </select>

                                      </div>

                                      

                                      <div class="form-group">

                                          <label>Start Date</label>

                                          <input class="form-control" placeholder="Enter Name" id="start"  name="start" >

                                         

                                      </div>

                                      <div class="form-group">

                                          <label>End Date</label>

                                          <input class="form-control" placeholder="Enter Name" id="end" name="end" >

                                         

                                      </div>

                                      </div>

                    </div>

                           



                                       <div class="col-lg-6">

                                    <div class="form-group">

                                          <label>Comments</label>

                                          <textarea class="form-control" rows="3" name="user_comments"></textarea>

                                      </div>

                                             

                                     </div>

                                       <div class="col-lg-12">

                                        <input type="submit" class="btn btn-default btn-success"/ value="Update Lead">

                                       </div>

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

   

   <script type="text/javascript">

  $(document).ready(function(){



    $("#demolead").hide();





    $("#sel1").change(function(){

      $selected=$("#sel1").val();

      if($selected=="Free trail"){
          $("#start").prop('required',true);
        $("#end").prop('required',true);
        $("#demolead").show();

        $("#nextcalling").hide();

      }else{
         $("#start").prop('required',false);
        $("#end").prop('required',false);

        $("#demolead").hide();

        $("#nextcalling").show();

      }

    });

  });



</script>

 <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>



<script>

         $(function() {

            $( "#start" ).datepicker({

               showWeek:true,

               yearSuffix:"-CE",

               showAnim: "slide",

                dateFormat: "mm-dd-yy",

              minDate: '0', 

            });



            $( "#end" ).datepicker({

               showWeek:true,

               yearSuffix:"-CE",

               showAnim: "slide",

               dateFormat: "mm-dd-yy",

                minDate: '0', 

            });

            $( "#nextdate" ).datepicker({

               showWeek:true,

               yearSuffix:"-CE",

               showAnim: "slide",

              dateFormat: "mm-dd-yy",

                minDate: '0', 

            });

         });

      </script>











      



