<?php
    include("../../controller/DBConnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">Admin<i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li onclick="window.location.href = '/index.php';">
                                                <a href="#">    
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="padding-bottom:40px">Management Console<br></h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#page1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Repair Request</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#page2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Waiting for acceptance</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#page3" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Waiting for reparing</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#page4" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Under repair</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#page5" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Completed</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="page1" role="tabpanel">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <a href="add-repaircase.php"><button type="button" class="btn btn-primary m-b-10 m-l-5" style="margin-top:10px">Add</button></a>
                                            </div>
                                            <div class="row">
                                                <div class="card" style="width:100%">
                                                    <div class="card-title">
                                                        <h4>Repair Request</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive fluid">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Tel.</th>
                                                                        <th>Model</th>
                                                                        <th>Bad Condition</th>
                                                                        <th>Register date</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?PHP
                                                                        $RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Request');
                                                                        echo '<tr>';
                                                                       // var_dump(new RepairCase_Action()->procress());
                                                                        /*echo '<pre>';
                                                                        print_r($RepairCaseList);
                                                                        echo '</pre>';*/
                                                                        $numrow = 1;
                                                                        foreach ($RepairCaseList as $row){ 
                                                                        
                                                                        echo '<th scope="row">'.$numrow.'</th>';
                                                                        echo "<td>" .$row["customer_name"] .  "</td> "; 
                                                                        echo '<td><span class="badge badge-primary">' .$row["phone_number"] .  '</span></td> ';  
                                                                        echo "<td>" .$row["model"] .  "</td> ";
                                                                        echo "<td>" .$row["bad_condition"] .  "</td> ";
                                                                        echo '<td class="color-primary">' .$row["create_datetime"] . '</td>';
                                                                        echo '<td class="color-primary">';
                                                                    
                                                                        if($row['quotation_id'] == 0){
                                                                            echo '<a href="add-quotation.php?repaircase_id='.$row['id'].'">
                                                                            <button type="button" class="btn btn-pink">
                                                                                <i class="ti-file"></i>
                                                                            </button>
                                                                            </a>';
                                                                        }else{
                                                                            echo '<a href="edit-quotation.php?repaircase_id='.$row['id'].'">
                                                                            <button type="button" class="btn btn-pink">
                                                                                <i class="ti-file"></i>
                                                                            </button>
                                                                            </a>';
                                                                            echo '<a href=../../views/client/view-quotation.php?repaircase_id='.$row['id'].'"><button type="button" class="btn btn-warning"><i class="ti-email"></i></button></a>';
                                                                        }
                                                                        
                                                                        echo '
                                                                        <a href="edit-repaircase.php?id='.$row['id'].'"><button type="button" class="btn btn-warning"><i class="ti-pencil"></i></button></a>
                                                                        <a href="../../controller/RepairCaseDeleteAction.php?id='.$row['id'].'"><button type="button" class="btn btn-danger"><i class="ti-trash"></i></button></a>
                                                                        ';
                                                                        if($row['quotation_id'] != 0){
                                                                            echo '
                                                                            <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Waiting for customer">
                                                                            <button type="button" class="btn btn-success"><i class="ti-control-forward"></i>
                                                                            </button>
                                                                            </a>';
                                                                        }
                                                                        
                                                                    echo '</td>';
                                                                    echo '</tr>';
                                                                    $numrow++;
                                                                        }
                                                                        ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane  p-20" id="page2" role="tabpanel">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="card" style="width:100%">
                                                    <div class="card-title">
                                                        <h4>Waiting for customer</h4>

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive fluid">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Tel.</th>
                                                                        <th>Model</th>
                                                                        <th>Bad Condition</th>
                                                                        <th>Register date</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                    <?PHP
                                                                        $RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Waiting for customer');
                                                                        echo '<tr>';
                                                                       // var_dump(new RepairCase_Action()->procress());
                                                                        /*echo '<pre>';
                                                                        print_r($RepairCaseList);
                                                                        echo '</pre>';*/
                                                                        $numrow = 1;
                                                                        foreach ($RepairCaseList as $row){ 
                                                                        echo '<th scope="row">'.$numrow.'</th>';
                                                                        echo "<td>" .$row["customer_name"] .  "</td> "; 
                                                                        echo '<td><span class="badge badge-primary">' .$row["phone_number"] .  '</span></td> ';  
                                                                        echo "<td>" .$row["model"] .  "</td> ";
                                                                        echo "<td>" .$row["bad_condition"] .  "</td> ";
                                                                        echo '<td class="color-primary">' .$row["create_datetime"] . '</td>';
                                                                        echo '<td class="color-primary">
                                                                        <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Request"><button type="button" class="btn btn-success"><i class="ti-control-backward"></button></i></a>
                                                                       
                                                                        <a href="../../controller/RepairCaseDeleteAction.php?id='.$row['id'].'"><button type="button" class="btn btn-danger"><i class="ti-trash"></i></button>
                                                                        <a href="../client/view-quotation.php?repaircase_id='.$row['id'].'">
                                                                        <button type="button" class="btn btn-success"><i class="ti-receipt"></i></button></a>';
                                                                        echo '</td>';
                                                                        echo '</tr>';
                                                                    $numrow++;
                                                                        }
                                                                        ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane p-20" id="page3" role="tabpanel">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="card" style="width:100%">
                                                    <div class="card-title">
                                                        <h4>Waiting for repair</h4>

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive fluid">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Tel.</th>
                                                                        <th>Model</th>
                                                                        <th>Bad Condition</th>
                                                                        <th>Register date</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <?PHP
                                                                        $RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Waiting for repair');
                                                                        echo '<tr>';
                                                                       // var_dump(new RepairCase_Action()->procress());
                                                                        /*echo '<pre>';
                                                                        print_r($RepairCaseList);
                                                                        echo '</pre>';*/
                                                                        $numrow = 1;
                                                                        foreach ($RepairCaseList as $row){ 
                                                                        echo '<th scope="row">'.$numrow.'</th>';
                                                                        echo "<td>" .$row["customer_name"] .  "</td> "; 
                                                                        echo '<td><span class="badge badge-primary">' .$row["phone_number"] .  '</span></td> ';  
                                                                        echo "<td>" .$row["model"] .  "</td> ";
                                                                        echo "<td>" .$row["bad_condition"] .  "</td> ";
                                                                        echo '<td class="color-primary">' .$row["create_datetime"] . '</td>';
                                                                        echo '<td class="color-primary">
                                                                        <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Waiting for customer"><button type="button" class="btn btn-success"><i class="ti-control-backward"></button></i></a>
                                                                        <a href="view-quotation.php?repaircase_id='.$row['id'].'"><button type="button" class="btn btn-pink"><i class="ti-file"></i></button></a>
                                                                        <a href="../../controller/RepairCaseDeleteAction.php?id='.$row['id'].'"><button type="button" class="btn btn-danger"><i class="ti-trash"></i></button>
                                                                        <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Under repair"><button type="button" class="btn btn-success"><i class="ti-control-forward"></i></button></a>';
                                                                    echo '</td>';
                                                                    echo '</tr>';
                                                                    $numrow++;
                                                                        }
                                                                        ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="page4" role="tabpanel">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="card" style="width:100%">
                                                    <div class="card-title">
                                                        <h4>Under repair</h4>

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive fluid">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Tel.</th>
                                                                        <th>Model</th>
                                                                        <th>Bad Condition</th>
                                                                        <th>Register date</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <?PHP
                                                                        $RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Under repair');
                                                                        echo '<tr>';
                                                                       // var_dump(new RepairCase_Action()->procress());
                                                                        /*echo '<pre>';
                                                                        print_r($RepairCaseList);
                                                                        echo '</pre>';*/
                                                                        $numrow = 1;
                                                                        foreach ($RepairCaseList as $row){ 
                                                                        echo '<th scope="row">'.$numrow.'</th>';
                                                                        echo "<td>" .$row["customer_name"] .  "</td> "; 
                                                                        echo '<td><span class="badge badge-primary">' .$row["phone_number"] .  '</span></td> ';  
                                                                        echo "<td>" .$row["model"] .  "</td> ";
                                                                        echo "<td>" .$row["bad_condition"] .  "</td> ";
                                                                        echo '<td class="color-primary">' .$row["create_datetime"] . '</td>';
                                                                        echo '<td class="color-primary">
                                                                        <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Waiting for repair"><button type="button" class="btn btn-success"><i class="ti-control-backward"></button></i></a>
                                                                        <a href="view-quotation.php?repaircase_id='.$row['id'].'"><button type="button" class="btn btn-pink"><i class="ti-file"></i></button></a>
                                                                        <a href="../../controller/RepairCaseDeleteAction.php?id='.$row['id'].'"><button type="button" class="btn btn-danger"><i class="ti-trash"></i></button></a>
                                                                        <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Complete"><button type="button" class="btn btn-success"><i class="ti-control-forward"></i></button></a>';
                                                                    echo '</td>';
                                                                    echo '</tr>';
                                                                    $numrow++;
                                                                        }
                                                                        ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="page5" role="tabpanel">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="card" style="width:100%">
                                                    <div class="card-title">
                                                        <h4>Complete</h4>

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive fluid">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Tel.</th>
                                                                        <th>Model</th>
                                                                        <th>Bad Condition</th>
                                                                        <th>Register date</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <?PHP
                                                                        $RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Complete');
                                                                        echo '<tr>';
                                                                       // var_dump(new RepairCase_Action()->procress());
                                                                        /*echo '<pre>';
                                                                        print_r($RepairCaseList);
                                                                        echo '</pre>';*/
                                                                        $numrow = 1;
                                                                        foreach ($RepairCaseList as $row){ 
                                                                        echo '<th scope="row">'.$numrow.'</th>';
                                                                        echo "<td>" .$row["customer_name"] .  "</td> "; 
                                                                        echo '<td><span class="badge badge-primary">' .$row["phone_number"] .  '</span></td> ';  
                                                                        echo "<td>" .$row["model"] .  "</td> ";
                                                                        echo "<td>" .$row["bad_condition"] .  "</td> ";
                                                                        echo '<td class="color-primary">' .$row["create_datetime"] . '</td>';
                                                                        echo '<td class="color-primary">
                                                                        <a href="../../controller/RepairCaseStatusChangeAction.php?id='.$row['id'].'&status=Under repair"><button type="button" class="btn btn-success"><i class="ti-control-backward"></button></i></a>
                                                                        <a href="view-quotation.php?repaircase_id='.$row['id'].'"><button type="button" class="btn btn-pink"><i class="ti-file"></i></button></a>
                                                                        <a href="../../controller/RepairCaseDeleteAction.php?id='.$row['id'].'"><button type="button" class="btn btn-danger"><i class="ti-trash"></i></button></a>';
                                                                        echo '</td>';
                                                                        echo '</tr>';
                                                                        $numrow++;
                                                                            }
                                                                            ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
</body>

</html>