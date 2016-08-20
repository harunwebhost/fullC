<?php require_once('../template_module/head_section.php'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('../template_module/top_nav.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Leads</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <?php //require_once('template_module/dash.php'); ?>


<?php 
	 $unassing="SELECT * FROM crm_leads WHERE lead_status='Not assined'";
	$result=execute_sql_query($unassing);
	$total_unassinged=sql_fetch_num_rows($result);
	
?>
			
			
			<div class="panel panel-default">
					<div class="panel-heading">
						<p class="alert alert-info"> Total Number of unassined="<?php echo sql_fetch_num_rows($result);?></p>
					</div>
					<div class="panel-body">
						 <form action="assined.php" method="post">
						 		

 								<div class="form-group">
											  <label for="comment">Enter Number of Leads</label>
									<input type="number" name="assined_number" class="form-control col-md-2"  min="1" max="<?php echo $total_unassinged;?>" required>
								</div>

 								<div class="form-group">
 									 <label for="sel1">Select list:</label>
 								<select name="employer_id"  class="form-control" id="sel1">
 									<?php select_emp(''); ?>
 		
 									</select>
									</div>
								<input type="submit" class="btn btn-primary <?php if($total_unassinged==0){echo "disabled";}?>">
 </form>

					</div>
						
			</div>



    <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php require_once('../template_module/footer.php'); ?>