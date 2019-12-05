<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>HMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $_SESSION['admin'];?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="display_doctor_info.php"><i class="fa fa-home"></i>All Doctor Info<span class="fa fa-chevron-down"></span></a>

                            </li>

                            <li><a href="add_patient.php"><i class="fa fa-home"></i>Add Patient<span class="fa fa-chevron-down"></span></a>

                            </li>

                            <li><a href="room_display.php"><i class="fa fa-edit"></i>Display Rooms<span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="display_patient_info.php"><i class="fa fa-desktop"></i>Display Patients<span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="dischargepatient.php"><i class="fa fa-table"></i> Discharge Patient <span class="fa fa-chevron-down"></span></a>

                            </li>

                            <li><a href="updatedoc.php"><i class="fa fa-table"></i> Update Doctor <span class="fa fa-chevron-down"></span></a>
                            </li>
                            
                            <li><a href="display_report.php"><i class="fa fa-table"></i> Display Report <span class="fa fa-chevron-down"></span></a>
                            </li>

                            <li><a href="display_patienthistory_info.php"><i class="fa fa-table"></i> Display Discharged Patient Records <span class="fa fa-chevron-down"></span></a>
                            </li>
                            
                            
                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?php echo $_SESSION['admin'];?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->