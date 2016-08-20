

<?php require_once('../template_module/head_section.php'); ?>
 <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<body>



    <div id="wrapper">



        <!-- Navigation -->

        <?php require_once('../template_module/top_nav.php'); ?>

       

          <?php //require_once('../template_module/dash.php'); ?>

            <!-- /.row -->

            <?php //require_once('../template_module/show_lead.php'); ?>



            <?php show_leads(logged_user_id(),$_SESSION['login_userntype']); ?>
              <?php require_once('new_lead_form.php'); ?> 
               <?php require_once('free_tail_form.php'); ?>
                 </div>

 

   <?php require_once('../template_module/footer.php'); ?>

   

   <script type="text/javascript">
/*
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
*/




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