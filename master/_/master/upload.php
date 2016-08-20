<?php

/*require_once('functions/db_function.php'); 
ini_set("display_errors",1);
*//* 	if(isset($_POST['submit'])){
 		 	$fileName=strtotime("now").$_FILES['uplaod']['name'];
 		 	$templocation=$_FILES['uplaod']['tmp_name'];
 		 	$targetPath="uploadedfiles/";
 		 	$targetPath=$targetPath.basename($fileName);
	 		move_uploaded_file($templocation,$targetPath); 
	 		 $fileName=$targetPath;
	 		
	 		$dublicateFile="";
 			if (!empty($fileName)) {
 				$fileExtention=explode('.',$fileName);
 					if ($fileExtention[1]=="csv") {
 							
 							$open_file=fopen($fileName, "r");
 							$skipHeading=0;
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
 								$dublicateFile="uploadfailed/".strtotime("now").".csv";
 								$opendublicateFile=fopen($dublicateFile, "w");	
 								$lables="Name".",Email".",Mobile".",City,"."From Leaad,"."EmployeeId,"."\n";
 								if ($skipHeading!=1) {
 										$selectDublicate="SELECT * FROM leads where mobile='$mobile'";
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
	$faild_leads.=$fetch_dublicate_leads["name"].",".$fetch_dublicate_leads["email"].",".$fetch_dublicate_leads["mobile"].",".$fetch_dublicate_leads["city"].",".$fetch_dublicate_leads["lead_from"].",".$getEmployerName."\n";
 											
 										}else{
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
 				if ($count>0) {
 					echo "<a href=$dublicateFile>Download Faild</a>";
 				}
 				
 			}
 			else{
 		echo "Must select file";
 	
 	}
*/
?>
 

 <form action="load_show.php" method="post" enctype="multipart/form-data">
 		<input type="file" name="uplaod">
 		<input type="submit" name="submit">
 </form>