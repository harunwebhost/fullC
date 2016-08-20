  <div class="modal" id="lead_modal">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                     <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="exampleModalLabel">Create New Lead</h4>

                        </div>

                              <div class="modal-body">

                                <form action="../functions/insert.php" method="POST">

                                <input type="hidden" class="form-control" id="recipient-name" name="table_name" value="crm_leads">

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
                                  <input type="hidden" class="form-control"  name="page[emp_id]" value="<?php echo logged_user_id(); ?>">       

                                 <input type="hidden" class="form-control"  name="page[created_by]" value="<?php echo $_SESSION['login_username'] ?>">
                                 <input type="hidden" class="form-control"  name="page[created_date]" value="<?php echo current_data_time();?>">
                                <input type="hidden" class="form-control"  name="page[created_ip_address]" value="<?php echo get_user_ip_address();?>">        


                                  <div class="form-group">

                                    <input type="hidden" class="form-control" id="recipient-name" name="page[lead_status]" value="assigned">

                                  </div>

                                   <div class="form-group">

                                    <input type="hidden" class="form-control" id="recipient-name" name="page[lead_from]" value="call">

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