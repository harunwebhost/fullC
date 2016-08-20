<?php require_once('../functions/db_function.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="export_js/jquery.table2excel.js"></script>
<?php 
          $lead_status=sql_injection($_POST['lead_status']);
          $fromdate=sql_injection($_POST['fromdate']);
        $todate=sql_injection($_POST['todate']);

            if($lead_status=="Free trail"){

                 $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer, crm_demousers demouser 

                        WHERE

                        tbl_leads.lead_id=demouser.lead_id

                        AND

                        tble_employer.emp_id=demouser.emp_id  

                        AND

                     demostart>='$fromdate' AND demoend<='$todate'";

                $execute_leads=execute_sql_query($sql_lead);

              if(sql_fetch_num_rows($execute_leads)==0){

                    page_redirection("downloads.php","No Recordfound");

                }

 ?>

 <table width="100%" border="1" class="table2excel" data-tableName="Test Table 1">

                                    <thead>

                                        <tr>

                                         <!--<th></th>-->

                                            <th>Name</th>

                                            <th>Mobile</th>

                                            <th>Requested</th>

                                            <th>Contacted</th>

                                            <th>Start</th>

                                            <th>End</th>

                                            <th>Emp</th>

                                            

                                            <th>Comments</th>

                                        

                                        </tr>

                                    </thead>                                    <tbody> 

                    <?php  while ($get_rows=execute_fetch($execute_leads)) { ?>

                                        <tr>

                                            <td><?php echo $get_rows['lead_name'];?></td>

                                            <td><?php echo $get_rows['lead_mobile'];?></td>

                                            <td><?php echo $get_rows['requested_plan'];?></td>

                                            <td><?php echo $get_rows['contacat_date'];?></td>

                                            <td><?php echo $get_rows['demostart'];?></td>

                                             <td><?php echo $get_rows['demoend'];?></td>

                                             <td><?php echo $get_rows['emp_name']?></td>

                                          <td><?php echo   $get_rows['user_comments']?></td>

                                        </tr>

<?php }  ?>

</tbody>

</table>



<?php 

}else{



        $fromdate=convert_date($fromdate);

        $todate=convert_date($_POST['todate']);

        $sql_lead="SELECT * FROM crm_leads tbl_leads, crm_employer tble_employer, crm_leads_log log

                        WHERE

                        tbl_leads.lead_id=log.lead_id

                        AND

                        tble_employer.emp_id=log.emp_id  

                        AND

                        date(contacted_date)>='$fromdate' AND Date(contacted_date)<='$todate'

                       AND

                      log. respose='$lead_status' 

                     ";



        

                $execute_leads=execute_sql_query($sql_lead);



                if(sql_fetch_num_rows($execute_leads)==0){
                      page_redirection("downloads.php","No Recordfound");
                   
                }
                        

 ?>

 <table width="100%" border="1" class="table2excel" data-tableName="Test Table 1">

                                    <thead>

                                        <tr>

                                         <!--<th></th>-->

                                            <th>Name</th>

                                            <th>Mobile</th>

                                            <th>Contacted</th>

                                            <th>Response</th>

                                            <th>Comments</th>

                                            <th>Emp</th>

                                        </tr>

                                    </thead>                                    <tbody> 

                    <?php  while ($get_rows=execute_fetch($execute_leads)) { ?>

                                        <tr>

                                            <td><?php echo $get_rows['lead_name'];?></td>

                                            <td><?php echo $get_rows['lead_mobile'];?></td>

                                            <td><?php echo $get_rows['contacted_date'];?></td>

                                            <td><?php echo $get_rows['respose'];?></td>

                                            <td><?php echo   $get_rows['user_comments']?></td>

                                            <td><?php echo $get_rows['emp_name']?></td>

                                         

                                        </tr>

<?php }  ?>

</tbody>

</table>





<?php }
?>

<script>
            $(function() {
                $(".table2excel").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "myFileName",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
                document.location="downloads.php";
            });
        </script>















