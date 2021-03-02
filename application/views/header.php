
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url('access/bootstrap-3.3.5/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('access/DataTables-1.10.13/css/jquery.dataTables.min.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('access/js/html5shiv.min.js')?>"></script>
    <script src="<?php echo base_url('access/js/respond.min.js')?>"></script>
    <link href="<?php echo base_url('access/DataTables-1.10.13/css/jquery.dataTables.min.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('access/js/jquery-1.11.3.min.js')?>"></script>
    <script src="<?php echo base_url('access/DataTables-1.10.13/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('access/bootstrap-3.3.5/dist/js/bootstrap.min.js')?>"></script>



<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.8.0/jquery.modal.css" rel="stylesheet">-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.8.0/jquery.modal.js"></script>-->
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.8.0/jquery.modal.min.css" rel="stylesheet">-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.8.0/jquery.modal.min.js"></script>-->


    <style>
        li{
            display: inline;
        }
    </style>
    <style>

        /* Style the tab */
        div.tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #5cb85c;
            text-align: center;
        }

        /* Style the buttons inside the tab */
        div.tab button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        div.tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        div.tab button.active {
            background-color: #ccc;
        }

    </style>
</head>
<body>

<div class="container"  style="margin-bottom: 20px">
    <div class="row" style="text-align: right">
        <div class="col-lg-1 col-sm-3">
            <ul class="nav nav-pills">
                <li><a href="<?php echo site_url('login/logout') ?>">Logout</a></li>
            </ul>
        </div>
<!--        <div class="col-lg-6 col-sm-3">-->
<!--            <h3>Sale Page</h3>-->
<!--        </div>-->
    </div>
    <div class="tab">
        <a href="<?php echo site_url('clients') ?>"><button class="tablinks" style="color: black">Clients</button></a>
        <a href="<?php echo site_url('staff') ?>"><button class="tablinks" style="color: black">Staffs</button></a>
        <a href="<?php echo site_url('sales') ?>"><button class="tablinks" style="color: black">Sales</button></a>
        <a href="<?php echo site_url('messages') ?>"><button class="tablinks" style="color: black">Messages</button></a>
    </div>

</div>