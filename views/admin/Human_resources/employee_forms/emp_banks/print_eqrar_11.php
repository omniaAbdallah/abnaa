<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">


    <style type="text/css">
        .print_forma {
            /*border:1px solid #73b300;*/
            padding: 15px;
        }

        .piece-box {
            margin-bottom: 12px;
            border: 1px solid #73b300;
            display: inline-block;
            width: 100%;
        }

        .piece-heading {
            background-color: #9bbb59;
            display: inline-block;
            float: right;
            width: 100%;
        }

        .piece-body {

            width: 100%;
            float: right;
        }

        .bordered-bottom {
            border-bottom: 4px solid #9bbb59 !important;
        }

        .piece-footer {
            display: inline-block;
            float: right;
            width: 100%;
            border-top: 1px solid #73b300;
        }

        .piece-heading h5 {
            margin: 4px 0;
        }

        .piece-box table {
            margin-bottom: 0
        }

        .piece-box table th,
        .piece-box table td {
            padding: 2px 8px !important;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 3px;
            margin-top: 3px;
        }

        .print_forma table th {
            text-align: right;
        }

        .print_forma table tr th {
            vertical-align: middle;
        }

        .no-padding {
            padding: 0;
        }

        .print_forma hr {
            border-top: 1px solid #73b300;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .no-border {
            border: 0 !important;
        }

        .gray_background {
            background-color: #eee;

        }

        @page {
            size: A4;
            margin: 100px 20px 0 20px;
        }

        .open_green {
            background-color: #e6eed5;
        }

        .closed_green {
            background-color: #cdddac;
        }

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 1px solid #abc572;
        }

        .inp-control {
            width: auto;
            height: 32px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

        }
    </style>


</head>
<body>


<body onload="printDiv('printDiv')" id="printDiv">

    <section class="main-body">
        <div class="print_forma  col-xs-12 no-padding">
        <div class="col-xs-4 col-xs-offset-8 text-center">
        <br><br>
<p style="">التاريخ : <?php echo date("d-m-Y")  ?></p><br><br>
</div>
            <div class="piece-box no-border">
                
                <h5 class="text-center">إقرار</h5><br><br>

<?php
//echo 'asdsadsadsadasdsad';

?>
                <div class="col-xs-12 form-group no-padding">
                    <h6 style="line-height: 50px; text-align: center;"> أقر
                        أنا/<?php if (!empty($allData->new_emp_bank_name)) {
                            echo $allData->new_emp_bank_name;
                        } ?>
                       &nbsp;  كود الموظف/ <?php if (!empty($allData->emp_code)) {
                            echo $allData->emp_code;
                        } ?>
                        &nbsp; المسمي الوظيفي/ <?php if (!empty($allData->mosma_wazefy_n)) {
                            echo $allData->mosma_wazefy_n;
                        } ?>
                        <br />
                        &nbsp;  الادارة ( <?php if (!empty($allData->edara_n)) {
                            echo $allData->edara_n;
                        } ?> )
                          &nbsp;
                       بأنه ليس لدي مانع من تغيير بيانات  الحساب البنكي الحالي لديكم
                       &nbsp;
                         <br />
                         التابع  للموظف 
                       
                        
                           &nbsp;
                           <br>
                        من حساب
                        <br>
                        <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $valuee) {
                                            if($valuee->id ==$allData->current_bank_id_fk){
                                                echo $valuee->ar_name ;
                                            }
                                        }
                                    }
                                            ?>


                        
                         رقم <?php if (!empty($allData->current_bank_account_num)) {
                            echo $allData->current_bank_account_num;
                        } ?>

 كود<?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $valuee) {
                                            if($valuee->id ==$allData->current_bank_id_fk){
                                                echo $valuee->bank_code ;
                                            }
                                        }
                                    }
                                            ?>
                       &nbsp;
                       <br>
                       إلى حساب/ <br>
                         <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $valuee) {
                                            if($valuee->id ==$allData->new_bank_id_fk){
                                                echo $valuee->ar_name ;
                                            }
                                        }
                                    }
                                            ?>


                        
                         رقم <?php if (!empty($allData->new_bank_account_num)) {
                            echo $allData->new_bank_account_num;
                        } ?>

 كود<?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $valuee) {
                                            if($valuee->id ==$allData->new_bank_id_fk){
                                                echo $valuee->bank_code ;
                                            }
                                        }
                                    }
                                            ?>
                        
                      
                        
                        
                  
                       
                    </h6>
                    <br><br>
                    <div class="col-xs-6 form-group text-center">
                        <h5>توقيع المحول منه </h5>
                    </div>
                    <div class="col-xs-6 form-group text-center">
                        <h5>توقيع المحول إليه </h5>
                    </div>
                </div>


            </div>

        </div>
    </section>


    </body >

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 

