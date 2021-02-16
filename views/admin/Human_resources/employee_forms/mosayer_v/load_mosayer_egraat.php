<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <?php echo $msg = $this->session->flashdata('msg'); ?>
        <div class="panel-body">
            <div class="col-md-12 no-padding">
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> تاريخ الاجراء </label>
                    <input type="date" name="egraa_date" id="egraa_date" value="<?= date('Y-m-d'); ?>"
                           class="form-control ">
                    <input type="hidden" name="row_id" id="row_id" value="<?= $row_id ?>"
                           class="form-control ">
                    <input type="hidden" name="badl_code" id="badl_code" value="<?= $badl_code ?>"
                           class="form-control ">
                    <input type="hidden" value="<?= $mosayer_rkm_fk ?>" name="mosayer_rkm_fk" id="mosayer_rkm_fk">

                    <?php if ($badl_code == 100) {
                        $badal_text= " الراتب الأساسي";
                    } ?>
                    <?php if ($badl_code == 101) {
                        $badal_text= " بدل السكن";
                    } ?>
                    <?php if ($badl_code == 102) {
                        $badal_text= " بدل مواصلات";
                    } ?>
                    <?php if ($badl_code == 103) {
                        $badal_text= " بدل طبيعة عمل";
                    } ?>
                    <?php if ($badl_code == 104) {
                        $badal_text= " بدل تكليف";
                    } ?>
                    <?php if ($badl_code == 105) {
                        $badal_text= " بدل إعاشة";
                    } ?>
                    <?php if ($badl_code == 106) {
                        $badal_text= " بدل إتصال";
                    } ?>
                    <?php if ($badl_code == 107) {
                        $badal_text= " العمل الإضافي";
                    } ?>
                    <?php if ($badl_code == 200) {
                        $badal_text= " التأمينات";
                    } ?>
                    <input type="hidden" value="<?= $badal_text ?>" name="badal_n" id="badal_n">

                </div>
                <div class="form-group col-md-2 padding-4">
                    <label class="label ">كود الموظف</label>
                    <input id="emp_code" readonly class="form-control" type="text" name="emp_code"
                           value="<?= $emp_code; ?>">
                </div>
                <div class="form-group col-md-2 padding-4">
                    <label class="label ">اسم الموظف</label>
                    <input id="emp_name" readonly class="form-control" type="text" name="emp_name"
                           value="<?= $emp_name; ?>">
                </div>
                <div class="form-group col-md-2 padding-4">
                    <label class="label ">المسمي الوظيفي</label>
                    <input id="mosma_wazefy_n" readonly class="form-control" type="text" name="mosma_wazefy_n"
                           value="<?= $mosma_wazefy_n; ?>">
                </div>
                <div class="form-group col-md-2 padding-4">
                    <label class="label "> قيمه <?=$badal_text?>

                    </label>
                    <input id="ancient_value" readonly class="form-control" type="text" name="ancient_value"
                           value="<?= $ancient_value; ?>">
                    <input type="hidden" id="anc_value"  name="anc_value"
                           value="<?= $ancient_value; ?>">
                </div>
                <div class="form-group col-md-2 padding-4">
                    <label class="label ">القيمه الجديده</label>
                    <input id="new_value" data-validation="required" class="form-control" type="text" name="new_value"
                           value="">
                </div>
                <div class="form-group col-md-2 padding-4">
                    <label class="label ">السبب</label>
                    <input id="reason" data-validation="required" class="form-control" type="text" name="reason"
                           value="">
                </div>
                <div class="form-group col-md-12 col-xs-12 text-center">
                    <div class="text-center">
                        <a onclick="save_mosayer_egraat()" name="add" value="add" class="btn btn-info">أضافه</a>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
