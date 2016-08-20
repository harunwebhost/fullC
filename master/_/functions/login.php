<?php 
session_start();
require_once('db_function.php');
$mypassword=sql_injection($_POST['password']); 
$myusername=sql_injection($_POST['username']); 
$sql="SELECT * FROM crm_users WHERE user_email='$myusername' and user_password='$mypassword' AND status='1'";
$result=execute_sql_query($sql);
$count=sql_fetch_num_rows($result);
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"get
$get_login_detais=execute_fetch($result);
$login_username=$get_login_detais['user_name'];
$login_userntype=$get_login_detais['user_type'];


$_SESSION['login_username']=$login_username;
 $_SESSION['login_userntype']=$login_userntype;
 $_SESSION['login_email']=$_POST['username'];

if($login_userntype=="master"){
//header("location:../master");
page_redirection("../master/index.php","Logged In");
}else{
//header("location:../employees");
page_redirection("../employees/index.php","Logged In");

}
}
else {
page_redirection("../index.php","Invalid User Name Password");
}
?>