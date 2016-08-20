<?php 
session_start();
require_once('db_function.php'); 

 $keys=""; 

 $values=""; 

 $table=sql_injection($_POST['table_name']); 

 $action=sql_injection($_POST['action']); 

if($action=="update"){ 

 $update_key=$_POST['update_key']; 

 $primary_key=$_POST['primary_key']; 

 $message="Record is updated"; 

 foreach($_POST['page'] as $x=>$x_value) 

 { 

 $keys= $x; 

 $filter_data=sql_injection($x_value); 

 $values.=$keys."="."'$filter_data',"; 

 } 

 $values=rtrim($values,','); 

 echo $sql = "update $table SET $values WHERE $primary_key=$update_key"; 

}else{ 

 /*used for inserting values into the*/ 

 $message="Record is Inserted"; 

 foreach($_POST['page'] as $x=>$x_value) 

 { 

 $keys .= $x.','; 

 $filter_data=sql_injection($x_value); 

 $values.='"'.$filter_data.'",'; 

 } 

 

 $values=rtrim($values,','); 

 $keys=rtrim($keys,','); 

 $sql = "INSERT INTO $table ($keys) VALUES ($values)"; 

 
if($table=="crm_leads"){
 $mobile=sql_injection($_POST['page']['lead_mobile']);
 $dublicate="SELECT * FROM crm_leads where lead_mobile='$mobile'";
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

             execute_sql_query($sql);
            if($_SESSION['login_userntype']=="master"){
                  page_redirection('../master/index.php',"Record Is Insertd");
              }else{
                 page_redirection('../employees/index.php',"Record Is Insertd");
              } 
           }

}


 if($table=="crm_employer"){ 
     $sql_login = "INSERT INTO crm_users (`user_id`,`user_name`,`user_email`,`user_password`,`user_type`,`status`) VALUES (null,$values,'emplyee','1')"; 
    execute_sql_query($sql_login); 
    page_redirection('../master/index.php',"Record is Inserted"); 
 
 } 

} 

 /*if (execute_sql_query($sql)) { 
 // echo $message; 
 page_redirection('../master/index.php',"Record is Inserted"); 
 } else { 
 echo "Error: " . $sql . "<br>" . mysqli_error($conn); 

 } 
*/
 



 ?>