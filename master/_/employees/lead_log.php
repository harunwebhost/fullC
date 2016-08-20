<?php 
	require_once('../functions/db_function.php');
	$lead_id=sql_injection($_POST['lead_id']);
	$emp_id=sql_injection($_POST['emp_id']);
	$lead_name=sql_injection($_POST['lead_name']);
	$lead_email=sql_injection($_POST['lead_email']);
	$lead_mobile=sql_injection($_POST['lead_mobile']);
	$lead_city=sql_injection($_POST['lead_city']);


	$contacted_date=sql_injection($_POST['contacted_date']);
	$next_contacted_date=sql_injection($_POST['next_contacted_date']);
	$requested=sql_injection($_POST['requested']);
	$requested_date=sql_injection($_POST['requested_date']);
	$sql_insert_log="INSERT INTO leads_log (lead_id,emp_id,contacted_date,next_contacted_date,requested,requested_date) 
	VALUES ('$lead_id','$emp_id','$contacted_date','$next_contacted_date','$requested','$requested_date')";

 ?>