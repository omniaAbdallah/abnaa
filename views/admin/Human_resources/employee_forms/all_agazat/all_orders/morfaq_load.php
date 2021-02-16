<?php if (isset($result) && (!empty($result))) {
    if (in_array($result->no3_agaza, array(3, 4))) {
        ?>
        <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/add_attach') ?>

        <input type="hidden" name="agaza_rkm" value="<?php echo $result->agaza_rkm; ?>">
        <?php
        if (isset($_POST['from_profile'])) {
            ?>
            <input type="hidden" name="from_profile" value="1">

        <?php } ?>

        <div class="col-md-12 no-padding">
            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label class="label "> اسم المرض </label>
                <input type="text" name="marad_name" data-validation="required"
                       id="marad_name" class="form-control " value="<?= $result->marad_name ?>">
            </div>
            <?php $taqrer_form_date_m = date('Y-m-d', strtotime($result->taqrer_form_date_m));
            $taqrer_to_date_m = date('Y-m-d', strtotime($result->taqrer_to_date_m)); ?>
            <div class="form-group col-md-3  col-sm-6 padding-4">
                <label class="label ">
                    بداية التقرير الطبي

                </label>


                <input class="form-control  " name="taqrer_form_date_m" id="taqrer_form_date_m"
                       value="<?php echo $taqrer_form_date_m; ?>" type="date"/>

            </div>
            <div class="form-group col-md-3  col-sm-6 padding-4">
                <label class="label ">
                    نهاية التقرير الطبي
                </label>


                <input class="form-control  " name="taqrer_to_date_m" id="taqrer_to_date_m"
                       value="<?php echo $taqrer_to_date_m; ?>" type="date"/>

            </div>


            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label class="label "> اسم المستشفى </label>
                <input type="text" name="hospital_name" data-validation="required"
                       id="hospital_name" class="form-control " value="<?= $result->hospital_name ?>">
            </div>
            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label class="label ">تقرير المستشفى </label>
                <input type="file" name="hospital_report" data-validation="required"
                       id="hospital_report" class="form-control" style="width:80%;float: right;">

                <?php if (!empty($result->hospital_report)) {
                    $display_report = 'block';
                    $type = pathinfo($result->hospital_report)['extension'];
                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                    if (in_array($type, $arry_images)) {
                        $type_doc = 1;
                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                        $type_doc = 2;
                    }
                } else {
                    $display_report = 'none';
                } ?>
                <a class="btn btn-success btn-next" style="float: right; display: <?= $display_report ?>"
                   href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $result->hospital_report . '/' . $type_doc . '/' . $type ?>"
                   target="_blank">
                    <i class=" fa fa-eye"></i></a>
            </div>

        </div>

        <br>
        <br>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>

        </div>
        <br>
        <br>
        <?php echo form_close() ?>

        <?php

    }
} ?>


