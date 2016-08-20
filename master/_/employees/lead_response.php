<?php session_start(); ?>

<?php  require_once('../functions/db_function.php'); ?>

<?php 

		$lead_id=sql_injection($_POST['lead_id']);

		$lead_name=sql_injection($_POST['lead_name']);

		$lead_email=sql_injection($_POST['lead_email']);

		$lead_mobile=sql_injection($_POST['lead_mobile']);

		$lead_city=sql_injection($_POST['lead_city']);

		$lead_status=sql_injection($_POST['lead_status']);

		 $nextcall=sql_injection($_POST['nextcall']);

	

		$user_comments=sql_injection($_POST['user_comments']);

		$logged_user_id=logged_user_id();

		

		if($lead_status!="Free trail"){

			$sql_lead_log="INSERT INTO crm_leads_log VALUES (null,'$lead_id','$logged_user_id',now(),'$nextcall','$lead_status','$user_comments')";
			$sql_insert_lead_log=execute_sql_query($sql_lead_log);
			$sql_update_lead="UPDATE crm_leads SET lead_status='$lead_status', lead_name='$lead_name',lead_email='$lead_email',lead_mobile='$lead_mobile'  WHERE lead_id='$lead_id'";
			execute_sql_query($sql_update_lead);
			
			 $selectgetNext="SELECT `lead_id` FROM crm_leads WHERE lead_status='assigned' AND emp_id='$logged_user_id' AND lead_id!='$lead_id'";
			$execute_next_lead=execute_sql_query($selectgetNext);
			$is_next_lead=sql_fetch_num_rows($execute_next_lead);
			if($is_next_lead==0){
					page_redirection("index.php?free_trail=1","Record Updated");
			}else{
				$get_next_lead=execute_fetch($execute_next_lead);
				$next_lead=$get_next_lead['lead_id'];
				page_redirection("openlead.php?lead_id=".$next_lead, "Record Updated");

			}
		}else{

			$requested_plan=sql_injection($_POST['requested_plan']);

			$demostart=sql_injection($_POST['start']);

			$demoend=sql_injection($_POST['end']);

			$sql_lead_log="INSERT INTO crm_demousers VALUES (null,'$lead_id','$requested_plan',now(),'$demostart','$demoend','$logged_user_id','$user_comments')";

			$sql_insert_lead_log=execute_sql_query($sql_lead_log);

			$sql_update_lead="UPDATE crm_leads SET lead_status='$lead_status', lead_name='$lead_name',lead_email='$lead_email',lead_mobile='$lead_mobile'  WHERE lead_id='$lead_id'";

					execute_sql_query($sql_update_lead);

						 $selectgetNext="SELECT `lead_id` FROM crm_leads WHERE lead_status='assigned' AND emp_id='$logged_user_id' AND lead_id!='$lead_id'";
						$execute_next_lead=execute_sql_query($selectgetNext);
						$is_next_lead=sql_fetch_num_rows($execute_next_lead);
						if($is_next_lead==0){
							page_redirection("index.php?free_trail=1","Record Updated");
						}else{
							$get_next_lead=execute_fetch($execute_next_lead);
							$next_lead=$get_next_lead['lead_id'];
							page_redirection("openlead.php?lead_id=".$next_lead, "Record Updated");

			}

					
			}

		



 ?>