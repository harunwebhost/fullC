

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="index.html">Customer Relationship Management</a>

            </div>

            <!-- /.navbar-header -->



            <ul class="nav navbar-top-links navbar-right">

           

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        

                        <li class="divider"></li>

                        <li><a href="../functions/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                        </li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->

<?php 

    if($_SESSION['login_userntype']=="master"){

    ?>

            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search">

                        </li>

                        

                          <li>

                            <a href="assign_form.php"><i class="fa fa-dashboard fa-fw"></i>Assign Lead</a>

                        </li>

                        <li>

                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Lead Information<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                            <li>

                                        </li>

                                <li> <a href="upload_lead.php">Upload</a> </li>
                                <li><a href="index.php?total=1">Total</a></li>
                                <li><a href="index.php?assigned=1">Assined</a></li>
                                <li><a href="index.php?un-assigned=1">Un-Assinded</a> </li>
                               
                            </ul>

                            <!-- /.nav-second-level -->

                        </li>

                        <li>

                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Frees Trail<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                            <li>
                             </li>
                                <li> <a href="free_trail.php?total=1">Total</a> </li>
                                <li><a href="free_trail.php?today=1">Today</a></li>
                            </ul>

                            <!-- /.nav-second-level -->

                        </li>

                           <li>

                            <a href="#"><i class="fa fa-download"> </i> Downloads<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                            <li>
                             </li>
                                <li> <a href="downloads.php">Reports</a> </li>
                                
                            </ul>

                            <!-- /.nav-second-level -->

                        </li>

                        <li>

                            <a href="#"><i class="fa fa-user"></i> Employees<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                

                                <li>

                                    <a href="show_employees.php">All</a>

                                </li>

                                

                            </ul>

                            <!-- /.nav-second-level -->

                        </li>

                        

                        <li><a href="../functions/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li> 

                    </ul>

                </div>

                <!-- /.sidebar-collapse -->

            </div>

    <?php } else{?>

 <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search">

                          

                        </li>

                      

                        <li>

                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Lead Information<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                            <li>

                                        </li>

                             

                                <li>

                                    <a href="index.php?total=1">Total</a>

                                </li>

                                <li>

                                    <a href="index.php?assigned=1">Assined</a>

                                </li>

                              

                            </ul>

                            <!-- /.nav-second-level -->

                        </li>
                <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Frees Trail<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                            <li>
                             </li>
                                <li> <a href="free_trail.php?total=1">Total</a> </li>
                                <li><a href="free_trail.php?today=1">Today</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                </li>
                     
                      <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Demo<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                            <li>
                             </li>
                                <li><a href="free_trail.php?demo_total=1">Total</a> </li>
                                <li><a href="free_trail.php?demo_today=1">Today</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                </li>
                     

                        

                        <li><a href="../functions/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li> 

                    </ul>

                </div>

                <!-- /.sidebar-collapse -->

            </div>

    <?php } ?>

            <!-- /.navbar-static-side -->

</nav>



