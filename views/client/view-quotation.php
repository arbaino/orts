<?php include("../../controller/DBConnect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: JS Grid Table</title>

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
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="assets/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
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
                    <!--div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div-->
                    <div class="float-right">


                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">Admin
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>

                                            <li>
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
                            <div class="card-title">
                                <h4>Quatation</h4>
                                <!-- <a href="../admin/index.php"><button type="button" class="btn btn-danger" style="float:right"><i class="ti-close"></i></button></a> -->

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <?php
                                        $row=DBConnect::getInstance()->getRepairCaseById($_GET['repaircase_id']);
                                        $lineItem = DBConnect::getInstance()->getQuotationLineItemListByQuotationId($row['quotation_id']); 
                                    ?>
                                    <form action="../../controller/QuotationSaveAction.php" method="POST">
                                        <input type="hidden" name="id" value="<?=$row['quotation_id']?>" />
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Quatation No.</p>
                                            <input type="text" class="form-control input-default " value="<?=$row['id']?>" placeholder="Quatation No." readonly/>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Date Time</p>
                                            <input type="text" class="form-control input-default " value="<?=$row['create_datetime']?>" placeholder="Date Time" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Phone No.</p>
                                            <input type="text" class="form-control input-default " value="<?=$row['phone_number']?>"  placeholder="Phone No." readonly/>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Bad Condition</p>
                                            <input type="text" class="form-control input-default " value="<?=$row['bad_condition']?>"  placeholder="Bad Condition" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Model</p>
                                            <input type="text" class="form-control input-default " value="<?=$row['model']?>"  placeholder="Model" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">IMEI</p>
                                            <input type="text" class="form-control input-default " value="<?=$row['IMEI']?>" placeholder="EMEI" readonly/>
                                        </div>
                                        <div class="card">
                                        <table class="table">
                                            <thead>
                                                <tr >
                                                <th scope="col"><div align="center">Spare part</div></th>
                                                <th scope="col"><div align="center">Price</div></th>
                                                <!-- <th scope="col">&nbsp;</th>
                                                <th scope="col">&nbsp;</th> -->
                                                </div>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $totalPrice = 0;
                                                    foreach($lineItem as $item){
                                                        echo '
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control input-default " value="'.$item['sparepart'].'" placeholder="sparepart" readonly/>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control input-default " value="'.$item['price'].'" placeholder="price" readonly/>
                                                                </div>
                                                            </td>
                                               
                                                        </tr>
                                                        ';
                                                        $totalPrice += $item['price'];
                                                    }
                                               
                                                ?>
                                                <td>
                                                    <p class="text-muted m-b-15 f-s-1">Total Price </p><input type="text" class="form-control input-default " value="<?=$totalPrice?>"  placeholder="Model" readonly/></p>
                                                </td>
                                               
                                            </tbody>
                                            </table>
                                            <br/>
                                            
                                        </div>
                                            <a href="../../controller/RepairCaseStatusChangeAction.php?id=<?=$_GET['repaircase_id']?>&status=Waiting for repair">
                                                <button type="button" style="width:100%" class="btn btn-fluid btn-primary m-b-10 m-l-5 " >Accept</button>
                                            </a>
                                            <a href="../../controller/RepairCaseStatusChangeAction.php?id=<?=$_GET['repaircase_id']?>&status=Complete&description=Cancel">
                                                <button type="button" style="width:100%" class="btn btn-fluid btn-primary m-b-10 m-l-5 " >Cancel</button>
                                            </a>   
                                            
                                    </form>
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

    <!-- bootstrap -->



    <!-- JS Grid Scripts Start-->
    <script src="assets/js/lib/jsgrid/db.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.core.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.load-indicator.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.load-strategies.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid.field.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
    <script src="assets/js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
    <script src="assets/js/lib/jsgrid/jsgrid-init.js"></script>
    <!-- JS Grid Scripts End-->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
</body>

</html>