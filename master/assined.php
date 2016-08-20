<?php require_once('../functions/db_function.php');  ?>
<?php 
	 $assined_number=$_POST['assined_number'];
	 $employer_id=$_POST['employer_id'];
	//echo $sql="update leads set emp_id = $employer_id where status  (select status from leads where status='unassigned');";
	 $sql="Update crm_leads set emp_id = '$employer_id', lead_status='assigned' where lead_status='Not assined' LIMIT $assined_number ";
	$restult=execute_sql_query($sql);
	if($restult){
		page_redirection('assign_form.php','lead assined');

	}
 ?>