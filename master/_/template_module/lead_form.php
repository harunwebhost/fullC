<?php require_once('../functions/db_function.php') ?>
<!-- <script type="text/javascript" src="js/library.js"></script>
<?php //require_once('../action_files/opreation.js') ?>
<script type="text/javascript">
	
</script>
 -->

<?php

//require_once('functions/db_function.php'); 
ini_set("display_errors",1);
 	if(isset($_POST['submit'])){
 		 	$fileName=strtotime("now").$_FILES['uplaod']['name'];
 		 	$templocation=$_FILES['uplaod']['tmp_name'];
 		 	$targetPath="../uploadedfiles/";
 		 	$targetPath=$targetPath.basename($fileName);
	 		move_uploaded_file($templocation,$targetPath); 
	 		 $fileName=$targetPath;
	 		
	 		$dublicateFile="";
 			if (!empty($fileName)) {

 				$fileExtention=explode('.',$fileName);
 						echo $fileExtention[1];
 				die();
 					if ($fileExtention[1]=="csv") {
 						echo $fileExtention[1];
 				
 							
 							$open_file=fopen($fileName, "r");
 							$skipHeading=0;
 							$count=0;
 							$failed = [];
 								$faild_leads="";
 							while($fileData=fgetcsv($open_file,30000,",")){
 								$skipHeading++;
 								$name=$fileData[0];
 								$email=$fileData[1];
 								$mobile=$fileData[2];
 								$city=$fileData[3];
 								$leadFrom=$fileData[4];
 								$employeeId=$fileData[5];
 								 $dublicateFile="../uploadfailed/".strtotime("now").".csv";
 								
 								$opendublicateFile=fopen($dublicateFile, "w");	
 								$lables="Name".",Email".",Mobile".",City,"."From Leaad,"."EmployeeId,"."\n";
 								if ($skipHeading!=1) {
 										$selectDublicate="SELECT * FROM leads where lead_mobile='$mobile'";
 										$getDublicate=execute_sql_query($selectDublicate);
 										$count=sql_fetch_num_rows($getDublicate);
 										if ($count>0) {
 											
 												$fetch_dublicate_leads=execute_fetch($getDublicate);
 												//echo mysqli_error($connection);
 												$emp_id=$fetch_dublicate_leads['emp_id'];
 												$selectEmp="select * from employer where emp_id='$emp_id'";
 												$execute_emp=execute_sql_query($selectEmp);
 												$fetchEmployerName=execute_fetch($execute_emp);
 												$getEmployerName=$fetchEmployerName['emp_name'];
 												if(empty($getEmployerName)){
 													$getEmployerName="lead is not assined";
 												}
	$faild_leads.=$fetch_dublicate_leads["lead_name"].",".$fetch_dublicate_leads["lead_email"].",".$fetch_dublicate_leads["lead_mobile"].",".$fetch_dublicate_leads["lead_city"].",".$fetch_dublicate_leads["lead_from"].",".$getEmployerName."\n";
 											
 										}else{
 											$count=0;
 												if (empty($employeeId)) {
 													$leadStatus="Not assined";
 												}else{
 													$leadStatus="Assiged";
 												}
 										 $sqlInsert="INSERT INTO  leads VALUES(NULL,'$name','$email','$mobile','$city','$leadFrom','$employeeId','$leadStatus')";
 											$execteInsert=execute_sql_query($sqlInsert);
 											
 										}	
 								}
 									
 							}
 							if($count>0) 
 									fputs($opendublicateFile,$lables.$faild_leads);
 								}

 					}else{
 				echo "...";
 				}
 				/*if ($count>0) {
 					upload_error('Uploaded failed Records','success');
 					echo "<a href=$dublicateFile>Download Faild</a>";
 				}*/
 				
 			}
 			else{
 							upload_error("Please upload CSV file","danger");
	}

?>

<?php function upload_error($printmsg,$color){
?>
<div class="alert alert-<?php echo $color ?>" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
 <?php echo $printmsg;?>
</div>

<?php 
} 
?>
 <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="uplaod">
    
  </div>
  <button type="submit" class="btn btn-primary"  name="submit" id="upload_leads">Submit</button>
</form>
