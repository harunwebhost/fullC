<?php session_start(); ?>

<?php  require_once('../functions/db_function.php'); ?>

<?php 

		$lead_name=sql_injection($_POST['lead_name']);
		$lead_email=sql_injection($_POST['lead_email']);
		$lead_mobile=sql_injection($_POST['lead_mobile']);
		$lead_city=sql_injection($_POST['lead_city']);
		$user_comments=sql_injection($_POST['user_comments']);
		$logged_user_id=logged_user_id();
		if(empty($logged_user_id)){
			$logged_user_id="0";
			$logged_user="master";

		}else{
					$logged_user_id=logged_user_id();
					$logged_user=$_SESSION['login_username'];

		}
		

		$ip=get_user_ip_address();

 $dublicate="SELECT * FROM crm_leads where lead_mobile='$lead_mobile'";
 $run_dublicate=execute_sql_query($dublicate);
$count=sql_fetch_num_rows($run_dublicate);
 
    if($count>0) 
    {
      
             if($_SESSION['login_userntype']=="master"){
                  page_redirection('../master/index.php',"Enterd Mobile Number Alredy Present");
              }else{
                 page_redirection('../employees/index.php',"Enterd Mobile Number Alredy Present");
              }
     }else
            {

     	$sql_crm_lead="INSERT INTO crm_leads VALUES(NULL,'$lead_name','$lead_email','$lead_mobile','$lead_city','call','$logged_user_id','Free trail','$logged_user',now(),'$ip')"; 	
          
				$get_latest_lead_id=get_inserted_id($sql_crm_lead);
				$requested_plan=sql_injection($_POST['requested_plan']);

			$demostart=sql_injection($_POST['start']);

			$demoend=sql_injection($_POST['end']);

			echo $crm_demousers="INSERT INTO crm_demousers VALUES (null,'$get_latest_lead_id','$requested_plan',now(),'$demostart','$demoend','$logged_user_id','$user_comments')";
			execute_sql_query($crm_demousers);

			

            if($_SESSION['login_userntype']=="master"){
                 // page_redirection('../master/index.php',"Record Is Insertd");
              }else{
               //  page_redirection('../employees/index.php',"Record Is Insertd");
              } 
           }
   ?>