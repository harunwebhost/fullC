 
 <div class="modal" id="free_trail">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                     <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="exampleModalLabel">Create New Free Trail</h4>

                        </div>

      <div class="modal-body">

      <form action="submit_free_trail.php" method="POST">
          <div class="row">

                                <div class="col-lg-6">

                                    <form role="form" action="lead_response.php" method="POST">


                                        <div class="form-group">

                                            <label>Name</label>

                                    <input class="form-control" placeholder="Enter Name" name="lead_name">

                                        </div>

                                       <div class="form-group">

                                          <label>Email</label>
                                            <input class="form-control" placeholder="Enter Name" name="lead_email">
                                          </div>

                                  </div>

                      <div class="col-lg-6">

                                       <div class="form-group">

                                          <label>Mobile</label>

                                          <input class="form-control" placeholder="Enter Name" name="lead_mobile">

                                         

                                      </div>

                                       <div class="form-group">

                                          <label>City</label>

                                          <input class="form-control" placeholder="Enter Name" name="lead_city">

                                       </div>

                    </div>   
                     <div class="col-lg-6">
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
                                
      </form>
      </div>

  </div>

</div>

</div>

                        </div>