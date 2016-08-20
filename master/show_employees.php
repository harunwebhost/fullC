

<?php require_once('../template_module/head_section.php'); ?>

<body>



    <div id="wrapper">



        <!-- Navigation -->

        <?php require_once('../template_module/top_nav.php'); ?>

       

          <?php //require_once('template_module/dash.php'); ?>

            <!-- /.row -->

            <?php //require_once('template_module/show_lead.php'); ?>



            <?php 

                employee(logged_user_id());

            ?>





<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">New Account</h4>

      </div>

      <div class="modal-body">

        <form action="../functions/insert.php" method="POST">

        <input type="hidden" class="form-control" id="recipient-name" name="table_name" value="crm_employer">

         <input type="hidden" class="form-control" id="recipient-name" name="action" value="employer">



            <div class="form-group">

            <label for="recipient-name" class="control-label">Name:</label>

            <input type="text" class="form-control" id="recipient-name" name="page[emp_name]">

          </div>

          <div class="form-group">

            <label for="recipient-name" class="control-label">Email:</label>

            <input type="text" class="form-control" id="recipient-name" name="page[emp_email]">

          </div>

          <div class="form-group">

            <label for="recipient-name" class="control-label">Mobile</label>

            <input type="text" class="form-control" id="recipient-name" name="page[emp_mobile]">

          </div>

            

            <div class="form-group">

            <div class="checkbox">

            <label><input type="checkbox" value="">Is Active</label>

    </div>

            </div>

          

         

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Create</button>

      </div>

      </form>

      

    </div>

  </div>

</div>





   <?php require_once('../template_module/footer.php'); ?>