<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<body onload="printDiv('printDiv')" id="printDiv">
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نموذج تقييم متطوع</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 no-padding" >
                <!-- Nav tabs -->
                <!-- Tab panels -->
                <div >
                    <div >
                        <div class="col-md-12">
                            <div class="piece-box">
                                <table class="table table-bordered" style="table-layout: fixed">
                                    <thead>
                                    <tr class="info">
                                        <th colspan="3" class="text-center">نموذج تقييم متطوع</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="info"> اسم المتطوع:</th>
                                        <td width="15%" colspan="2">
                                            <?=$result->motatw3_name?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">  عنوان الفرصة التطوعية:</th>
                                        <td width="20%" colspan="2">
                                            <?php
                                            echo $result->forsa_data->forsa_name;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">  وصف الفرصة التطوعية:</th>
                                        <td width="20%" colspan="2">
                                            <?php
                                            echo $result->forsa_data->wasf;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">  تاريخ تنفيذ الفرصه:</th>
                                        <td width="20%" colspan="2">
                                            <?php
                                            echo $result->forsa_data->start_date;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">  مكان تنفيذ الفرصه:</th>
                                        <td width="20%" colspan="2">
                                            <?php
                                            echo $result->forsa_data->makan;
                                            ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class=" table table-bordered" style="table-layout: fixed">
                                <thead>
                                <tr class=greentd">
                                    <th> اسم البند</th>
                                    <th width="15%"> الدرجه العظمي</th>
                                    <th width="15%">الدرجه المستحقه</th>
                                    <th width="15%">ملاحظات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($result->taqeem_bnods) && !empty($result->taqeem_bnods)) {
                                    $x = 0;
                                    foreach ($result->taqeem_bnods as $row) {
                                        ?>
                                        <tr class="open_green  closed_green">
                                            <td><?php echo $x + 1; ?>-<?php echo $row->band_title; ?></td>
                                            <td>
                                                <?php echo $row->max_degree; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->had_degree; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->notes; ?>
                                            </td>
                                        </tr>
                                        <?php $x++; }}?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?=$result->total_max_degree?>
                                    </td>
                                    <td>
                                        <?=$result->total_had_degree?>
                                    </td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="piece-box">
                                <table class="table table-bordered" style="table-layout: fixed">
                                    <tr>
                                        <th class="info">  متطوع:</th>
                                        <td width="15%"></td>
                                        <th class="info">  التوقيع:</th>
                                        <th width="20%"></th>
                                        <th class="info">  التاريخ:</th>
                                        <th width="15%"></th>
                                    </tr>
                                    <tr>
                                        <th class="info">  معد التقييم:</th>
                                        <td width="15%"></td>
                                        <th class="info">  التوقيع:</th>
                                        <th width="20%"></th>
                                        <th class="info">  التاريخ:</th>
                                        <th width="15%"></th>
                                    </tr>
                                    <tr>
                                        <th class="info">  المعتمد:</th>
                                        <td width="15%"></td>
                                        <th class="info">  التوقيع:</th>
                                        <th width="20%"></th>
                                        <th class="info">  التاريخ:</th>
                                        <th width="15%"></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--  -->
</body>
</div>
</div>
</div>
<!--  -->
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
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