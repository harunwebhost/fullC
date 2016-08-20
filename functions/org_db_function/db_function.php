<?php 
// Create connection
function db_connection(){
$connection = mysqli_connect('localhost', 'crmglitzresearch', 'crmglitzresearch21');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysql_error());
}else{
  mysqli_select_db($connection,'stockglizsearch_db');

}
return $connection; 
}
	/*sql query functions*/
	function execute_sql_query($sql){
       
		$connection=db_connection();
		$result=mysqli_query($connection,$sql);
		
		if(!$result){
			sql_error($connection);
		}else{
			return $result;
		}
	}

	/*fetch from database*/
	function execute_fetch($result){
		
		$fetch=mysqli_fetch_array($result);
		if(!$fetch){
				//sql_comman_error();
		}else
		{
			return $fetch;
		}
	}

	/*sql error*/
	function sql_error($connection){
		echo "you have an error please check".mysqli_error($connection);
		die();
		
		
	}
/*
	function sql_comman_error(){
		die("your are doing some mistakes".mysqli_error());
	}*/
	function sql_fetch_num_rows($sql){
		return mysqli_num_rows($sql);
	}
function sql_injection($values){
	$connection=db_connection();
	$values=trim($values);
	return mysqli_real_escape_string($connection,$values);
}
function convert_spaces_into_underscore($title){
return str_replace(' ', '_', $title);
}
function convert_underscore_into_spaces($title){
	return str_replace('_', ' ', $title);
}
	/*get the main pages*/
	function select_emp($id){
		
			$sql="select * from crm_employer"; 
			$result=execute_sql_query($sql);
			while ($emp=execute_fetch($result)) {
			?>
			<option value="<?php echo $emp['emp_id'] ?>" <?php if($emp['emp_id']==$id){echo "selected"; } ?>><?php echo $emp['emp_name']?></option>
		<?php }
	}

function display_data($data){
	echo $data;
}

function shor_information($data,$limit){
	$words = preg_split('/\s+/', $data);
	 $words = array_slice($words, 0, $limit);
	 return implode(" ",$words);
}

function create_url($page,$menus_title){
$url =<<<EOD
<a href="{$page}">{$menus_title}</a>
EOD;
return $url;
}

function get_user_ip_address(){
	return $user_ip_address=$_SERVER['REMOTE_ADDR'];

}
function page_redirection($pagename,$message){
?>
<script type="text/javascript">
	alert("<?php echo $message?>");
	document.location="<?php echo $pagename ?>";
</script>
<?php }
	function check_user(){
		session_start();
		if(!isset($_SESSION['username']) && !isset($_SESSION['id'])){
			//page_redirection('../index.php','please login again');
		}
	}



function show_leads($emp_id,$user_type){
              
                if($user_type=="master" && $emp_id="master"){
                    if(isset($_GET['assigned'])){
                      echo $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer 
                        WHERE 
                        tbl_leads.lead_status='assined'
                            AND 
                        tbl_leads.emp_id=tble_employer.emp_id";
                        $label="Total Assigned";
                       
                        }
                    elseif (isset($_GET['un-assigned'])) {
                               // echo "un-assigned".$unsinded=$_GET['un-assigned'];
                             $sql_lead="SELECT * FROM crm_leads WHERE lead_status='Not assined'";
                             $label="Total Un-Assiged Leads";
                             
                    }elseif (isset($_GET['uploaded'])) {
                           echo "uploaded".$uploaded=$_GET['uploaded'];
                            $sql_lead="SELECT * FROM crm_leads tbl_leads  ";
                            $label="New Uploaded Leads";         
                            
                     }else
                
                     {
                            $sql_lead="SELECT * FROM crm_leads tbl_leads  ";
                            $label="Total Leads";
                            
                    }
            }
			else
            {
                $emp_id=sql_injection($emp_id);
               if(isset($_GET['assigned'])){
                    //echo "assigned".$assined=$_GET['assigned'];
              
                  $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer 
                        WHERE 
                        tbl_leads.emp_id='$emp_id'
                        AND 
                        tbl_leads.lead_status='assined'
                        AND
                        tble_employer.emp_id='$emp_id'  
                        ";

                 $label="Total Assigned";
                }else{
                  $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer 
                        WHERE 
                        tbl_leads.emp_id='$emp_id'
                        AND
                        tble_employer.emp_id='$emp_id'  
                        ";
                     $label="Total";
                } 
            }

?>
	 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $label;?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
	 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $label;?>
                            <?php
                                if($user_type=="master"){
                                    ?>
                                        <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li class="divider"></li>
                                        <li><a href="#" data-toggle="modal" data-target="#lead_modal" data-whatever="@mdo"></i> Add New</a>
                                        </li>
                                       
                                        <li class="divider"></li>
                                      
                                    </ul>
                                </div>
                            </div>
                                <?php 
                            }
                             ?>
                        </div>
                        <!-- /.panel-heading -->
                           <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                         <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>City</th>
                                            <th>From</th>
                                            <th>Employee</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>	
					<?php 
						 $sql_query=execute_sql_query($sql_lead);
						while($fetch_lead=execute_fetch($sql_query)){
					?>

                                        <tr class="odd gradeX">
                                         <td><input type="checkbox"></td>
                                            <td><?php echo $fetch_lead['lead_name'];?></td>
                                            <td><?php echo $fetch_lead['lead_email'];?></td>
                                            <td><?php echo $fetch_lead['lead_mobile'];?></td>
                                            <td class="center"><?php echo $fetch_lead['lead_city'];?></td>
                                            <td class="center"><?php echo $fetch_lead['lead_from'];?></td>
                                            <td class="center">

                                            <?php 
                                            	if(isset($fetch_lead['emp_name'])){
                                            	echo $fetch_lead['emp_name'];
                                            } else{
                                            	echo "--";
                                            }
                                            ?>
                                            	

                                            </td>
                                            <td class="center"><?php echo $fetch_lead['lead_status'];?></td>
                                            <td class="center">
                                                <?php
                                                    if($user_type=="master"){
                                                        ?>
                                                    <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                    Masteroption
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li><a href="#">Action</a>
                                                                    </li>
                                                                    <li><a href="#">Another action</a>
                                                                    </li>
                                                                    <li><a href="#">Something else here</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#">Separated link</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                    <?php 
                                                        }else{?>

                                                        <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Employee option
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="openlead.php?lead_id=<?php echo $fetch_lead['lead_id'];?>"><i class="fa fa-user"></i> Open</a>
                                        </li>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>        
                                                   <?php 
                                                    }
                                                 ?>

                                            </td>
                                        </tr>
                                    
<?php } } ?>

  </tbody>
                                </table>
                            </div>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  
                 
                </div>
               
            </div>


  <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php function employee($emp_id){
echo $sql_lead="SELECT * FROM crm_employer";

$label="Employee";
?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $label;?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user"></i> <?php echo $label;?>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo"><i class="fa fa-user"></i> Add New</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                           <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                         <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                           </tr>
                                    </thead>
                                    <tbody> 
                    <?php 
                        $sql_query=execute_sql_query($sql_lead);
                        while($fetch_lead=execute_fetch($sql_query)){
                    ?>

                                        <tr class="odd gradeX">
                                         <td><input type="checkbox"></td>
                                            <td><?php echo $fetch_lead['emp_name'];?></td>
                                            <td><?php echo $fetch_lead['emp_email'];?></td>
                                            <td><?php echo $fetch_lead['emp_mobile'];?></td>
                                            <td class="center"><div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href=""><i class="fa fa-trash"></i></a>
                                        </li>
                                        <!--<li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>-->
                                    </ul>
                                </div></td>
                                        </tr>
                                    
<?php } ?>

  </tbody>
                                </table>
                            </div>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  
                 
                </div>
               
            </div>


  <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php } ?>

<?php function check_session(){
        if(!isset($_SESSION['login_username']) && !isset($_SESSION['login_userntype'])){
            page_redirection("../index.php",'Login Once Again');
        }
} 

function logged_user_id(){
    if(isset($_SESSION['login_username'])){
        $login_email=sql_injection($_SESSION['login_email']);
        $get_select_user="SELECT * FROM crm_employer WHERE emp_email='$login_email'";
        $get_select_user_execute=execute_sql_query($get_select_user);
        $get_logged_user_array=execute_fetch($get_select_user_execute);
       return $get_logged_user_id=$get_logged_user_array['emp_id'];
    }

}    

function check_empty($value){
    if(empty($value)){
        $value="";
    }else{
        $value=$value;
    }
    return $value;
}

?>

<?php 


function show_free_trail($emp_id,$user_type){
              
                if($user_type=="master" && $emp_id="master"){ 

                    if (isset($_GET['total'])) {
                             
                       $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer, crm_demousers demouser 
                        WHERE
                        tbl_leads.lead_id=demouser.lead_id
                        AND
                        demouser.emp_id=tble_employer.emp_id  
                        ";
                      $label="Total Free Trail";       
                    }

                   
                    if (isset($_GET['today'])) {
                        $today=todays_date();
                           $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer, crm_demousers demouser 
                        WHERE
                        tbl_leads.lead_id=demouser.lead_id
                        AND
                        demouser.emp_id=tble_employer.emp_id  
                       AND 
                       date(demouser.contacat_date)='$today'
                    ";
                     $label="Today Free Trails";
                    }
            }
            else
            {
                 $emp_id=sql_injection($emp_id);
               if(isset($_GET['total'])){
                    //echo "assigned".$assined=$_GET['assigned'];
              
                  $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer, crm_demousers demouser 
                        WHERE
                        tbl_leads.lead_id=demouser.lead_id
                        AND
                        tble_employer.emp_id='$emp_id'  
                        ";

                 $label="Total Free Trail";
                }if(isset($_GET['today'])){
                    $today=todays_date();
                   $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer, crm_demousers demouser 
                        WHERE
                        tbl_leads.lead_id=demouser.lead_id
                        AND
                        tble_employer.emp_id='$emp_id'
                        AND 
                       date(demouser.contacat_date)='$today'
                    ";
                     $label="Today Free Trails";
                } 
            }

?>
     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $label;?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $label;?>
                            <?php
                                if($user_type=="master"){
                                    ?>
                                        <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li class="divider"></li>
                                        <li><a href="#" data-toggle="modal" data-target="#lead_modal" data-whatever="@mdo"></i> Add New</a>
                                        </li>
                                       
                                        <li class="divider"></li>
                                      
                                    </ul>
                                </div>
                            </div>
                                <?php 
                            }
                             ?>
                        </div>
                        <!-- /.panel-heading -->
                           <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                         <!--<th></th>-->
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Requested</th>
                                            <th>Contacted</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <?php if($user_type=="master"){
                                                echo "<th>EMP</th>";
                                            }?>
                                            <th>Comments</th>
                                         <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody> 
                    <?php 
                         $sql_query=execute_sql_query($sql_lead);
                        while($fetch_lead=execute_fetch($sql_query)){
                    ?>

                                        <tr class="odd gradeX">
                                         <!--<td><input type="checkbox"></td>-->
                                            <td><?php echo $fetch_lead['lead_name'];?></td>
                                           
                                            <td><?php echo $fetch_lead['lead_mobile'];?></td>
                                            <td class="center"><?php echo $fetch_lead['requested_plan'];?></td>
                                            <td class="center"><?php echo $fetch_lead['contacat_date'];?></td>
                                            <td class="center"><?php echo $fetch_lead['demostart'];?></td>
                                             <td class="center"><?php echo $fetch_lead['demoend'];?></td>
                                              <?php if($user_type=="master"){
                                                echo "<td class='center'>".$fetch_lead['emp_name']."</td>";
                                            }?>
                                            <td class="center"><?php echo   $fetch_lead['user_comments']?></td>
                                            
                                            
                                            <td class="center">
                                                <?php
                                                    if($user_type=="master"){
                                                        ?>
                                                    <div class="btn-group">
                                                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                    Masteroption
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li><a href="#">Action</a>
                                                                    </li>
                                                                    <li><a href="#">Another action</a>
                                                                    </li>
                                                                    <li><a href="#">Something else here</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#">Separated link</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                    <?php 
                                                        }else{?>

                                                        <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Employee option
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="openlead.php?lead_id=<?php echo $fetch_lead['lead_id'];?>"><i class="fa fa-user"></i> Open</a>
                                        </li>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>        
                                                   <?php 
                                                    }
                                                 ?>

                                            </td>
                                        </tr>
                                    
<?php } } ?>

  </tbody>
                                </table>
                            </div>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  
                 
                </div>
               
            </div>


  <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



<?php 
     function todays_date(){
             $date=current_data_time();
            return $today=substr($date, 0,10);
        }
         function current_data_time(){
           date_default_timezone_set('Asia/calcutta');
          return date('Y-m-d h:i:s');
    }

    function convert_date($date){
        /*converting date into yy-mm-dd*/
        $date_to_convert=explode('-', $date);
        return  $date_to_convert['2']."-".$date_to_convert[1]."-".$date_to_convert[0];
    }
    




 ?>