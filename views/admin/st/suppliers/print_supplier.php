




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
            /*margin-bottom: 12px;*/

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
            border-bottom: 4px solid #9bbb59;
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
            margin-bottom: 0;
            font-size: 17px;
        }

        .piece-box table th,
        .piece-box table td {
            padding: 2px 8px !important;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 6px;
            margin-top: 6px;
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

        .main-title {
            display: table;
            text-align: center;
            position: relative;
            height: 120px;
            width: 100%;
        }

        .main-title h4 {
            display: table-cell;
            vertical-align: bottom;
            text-align: center;
            width: 100%;
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

        @media print {
            .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
            .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
            .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
                border: 2px solid #000 !important;
            }

        }

        @page {
            size: A4;
            margin: 20px 0 0;
        }

        .open_green {
            background-color: #e6eed5;
        }

        .closed_green {
            background-color: #cdddac;
        }

        .table-bordered {
            border: 5px double #000;
        }

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000;
        }

        .under-line {
            /*	border-top: 1px solid #abc572;*/
            padding-left: 0;
            padding-right: 0;
        }

        span.valu {
            padding-right: 10px;
            font-weight: 600;
            font-family: sans-serif;
        }

        .under-line .col-xs-3,
        .under-line .col-xs-4,
        .under-line .col-xs-6,
        .under-line .col-xs-8 {
            /*border-left: 1px solid #abc572;*/
            padding-right: 5px;
            padding-left: 5px;

        }

        .bond-header {
            height: 100px;
            margin-bottom: 20px;
        }

        .bond-header .right-img img,
        .bond-header .left-img img {
            width: 100%;
            height: 100px;
        }

        .main-bond-title {
            display: table;
            height: 100px;
            text-align: center;
            width: 100%;
        }

        .main-bond-title h3 {
            display: table-cell;
            vertical-align: bottom;
            color: #d89529;
        }

        .main-bond-title h3 span {
            border-bottom: 2px solid #006a3a;
        }

        .green-border span {
            border: 3px solid #cdddac;
            padding: 4px;
            border-radius: 10px;
            font-size: 16px;
        }

        @media all {
            .page-break {
                display: none;
            }
        }

        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }
        .vat_view{
        <?php if (isset($this->statuse_vat) && ($this->statuse_vat == 0) ){?>

            display: none;
        <?php } else{
       ?>
            display: block;

        <?php
       } ?>
        }

    </style>

<!-- 
    <div id = "printdiv" > -->
    
<body onload="printDiv('printDiv')" id="printDiv">


<div class="bond-header">
    <div class="col-xs-4 pad-2">
        <div class="right-img" >
         <!--   <img src="<?php echo base_url() ?>asisst/admin_asset/img/logo-rectangle1.png"> -->
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class="">  كارتة المورد :<?=$get_all->name ?> </span></h3>
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="left-img">

        </div>
    </div>
</div>

        <section class="main-body">
    <div class="print_forma  col-xs-12 ">



        <div class="col-xs-9">

        <?php
        if (isset($get_all)&& !empty($get_all)){
            ?>
            <table class="table " style="table-layout: fixed">
                <tbody>
                <tr>
                    <td style="width: 230px;"><input type="hidden" id="sanf_id" value="<?=$get_all->id ?>">
                        <strong> كود المورد </strong>
                    </td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td><?=$get_all->code ?></td>
                </tr>
                <tr>
                    <td><strong>  اسم المورد</strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->name ?></td>
                </tr>
                <tr>
                    <td><strong> النشاط </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->nashat_name ?></td>
                </tr>
                <tr>
                    <td><strong> رقم التليفون </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->tele ?></td>
                </tr>
                <tr>
                    <td><strong>  فاكس رقم </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->fax ?></td>
                </tr>
                <tr>
                    <td><strong>   اسم المسئول </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->resp_name ?></td>
                </tr>
                <tr>
                    <td> <strong> رقم جوال المسئول </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->resp_jwal ?></td>
                </tr>
                <tr>
                    <td>  <strong>طريقة الشراء </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php
                        if($get_all->method_shera==0){
                            echo "نقدي";
                        } elseif ($get_all->method_shera==1){
                            echo "آجل";
                        } elseif ($get_all->method_shera==2){
                            echo "الكل";
                        } else{
                            echo'لا يوجد';
                        }
                        ?></td>
                </tr>
                <tr>
                    <td><strong>ارقام تواصل أخري </strong></td>
                    <td><strong>:</strong></td>
                    <td><?php
                        if (isset($tele_other) && !empty($tele_other)){
                            foreach ($tele_other as $tele){
                                echo $tele;
                                echo "<br>";

                            }
                        }else{
                            echo "لا يوجد";
                        }
                        ?></td>

                </tr>
                <tr>
                    <td><strong> رقم الحساب </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->rkm_hesab ?></td>
                </tr>
                <tr>
                    <td><strong>اسم الحساب     </strong></td>
                    <td><strong>:</strong></td>
                    <td><?=$get_all->hesab_name ?></td>
                </tr>

                </tbody>
            </table>


            <?php
        }
        ?>
        </div>

        <div class="col-xs-3">
            <?php
            if (isset($get_all->img) && !empty($get_all->img)){
                ?>
                <div class="left-img">
                    <img src="<?= base_url()."uploads/st/asnaf/".$get_all->img?>" width="100%"  >
                </div>
                <?php
            }
            ?>
        </div>



    </div>
        </section>

    </div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>
<!-- <script>
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('st/asnaf/Asnaf/add_asnaf') ?>";
    }, 1000);
</script> -->



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

