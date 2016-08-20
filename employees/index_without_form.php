

<?php require_once('../template_module/head_section.php'); ?>

<body>



    <div id="wrapper">



        <!-- Navigation -->

        <?php require_once('../template_module/top_nav.php'); ?>

       

          <?php //require_once('../template_module/dash.php'); ?>

            <!-- /.row -->

            <?php //require_once('../template_module/show_lead.php'); ?>



            <?php 



                show_leads(logged_user_id(),$_SESSION['login_userntype']);

               

             ?>

             

</div>

                        </div>

                 </div>

 

   <?php require_once('../template_module/footer.php'); ?>

   

   <script type="text/javascript">

  $(document).ready(function(){

    $("#sel1").change(function(){

      $selected=$("#sel1").val();

      if($selected=="1"){

        $("#demolead").show();

        $("#nextcontact").hide();

      }else{

        $("#demolead").hide();

        $("#nextcontact").show();

      }

    });

  });



</script>