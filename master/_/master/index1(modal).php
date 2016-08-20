
<?php require_once('../template_module/head_section.php'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('../template_module/top_nav.php'); ?>
       
          <?php //require_once('../template_module/dash.php'); ?>
            <!-- /.row -->
            <?php //require_once('../template_module/show_lead.php'); ?>

            <?php 
                show_leads("master",$_SESSION['login_userntype']);
              
             ?>
             <div class="modal" id="lead_modal">
  
                           
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Create New Lead</h4>
      </div>
      <div class="modal-body">
        <form action="../functions/insert.php" method="POST">
        <input type="hidden" class="form-control" id="recipient-name" name="table_name" value="leads">
         <input type="hidden" class="form-control" id="recipient-name" name="action" value="add">

            <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="page[lead_name]">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name" name="page[lead_email]">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Mobile</label>
            <input type="text" class="form-control" id="recipient-name" name="page[lead_mobile]">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">City</label>
            <input type="text" class="form-control" id="recipient-name" name="page[lead_city]">
          </div>
           <div class="form-group">
        <label for="sel1">Assign</label>
              <select class="form-control" id="sel1" name="page[emp_id]">
                  <?php select_emp(''); ?>
        </select>
</div>

            <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-name" name="page[lead_status]" value="assigned">
          </div>
           <div class="form-group">
            <input type="hidden" class="form-control" id="recipient-name" name="page[lead_from]" value="master">
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
                        </div>
                 </div>
 
   <?php require_once('../template_module/footer.php'); ?>