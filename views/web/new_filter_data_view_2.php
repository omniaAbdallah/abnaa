<style>
    .form-group .help-block.form-error {
        display: block !important;
        font-size: medium;
    }
</style>

<section class="banner_page" style=" background: url(<?= base_url() . 'asisst/web_asset/' ?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>web">الرئيسية</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">خدمات أسرة</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">تسجيل أسرة</a></li>
        </ol>
    </div>
</section>
<?php

if (($this->session->flashdata('message'))) {
    ?>
    <div class="col-md-12 alert alert-success alert-dismissable"> نجاح !...تمت اضافة البيانات بنجاح</div>
    <?= $this->session->flashdata('message') ?>
    <?php
}
?>
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="col-xs-12 no-padding">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading" style="background-color: #96c73e;">
                    <h3 class="panel-title" style="font-size: 18px;"> ملفات الاسر </h3>
                </div>
                <div class="panel-body">
                    <div class="well">
                        <form action="<?= base_url() . 'web/loadRecord_filter' ?>" method="GET">
                            <input type="hidden" name="per_page" id="per_page" value="1">
                            <div class="col-md-3 form-group">
                                <label>حالة الملف</label>
                                <select class="form-control" name="file_statse" id="file_statse">
                                    <option value="">اختر</option>
                                    <option value="1"> نشط كليا</option>
                                    <option value="2">نشط جزئيا</option>
                                    <option value="3">موقوف جزئياً</option>
                                    <option value="4">موقوف نهائياً</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>فئة الملف</label>
                                <select class="form-control" id="family_cat" name="family_cat">
                                    <option value="">اختر</option>
                                    <option value="4"> ا</option>
                                    <option value="5">ب</option>
                                    <option value="6">ج</option>
                                    <option value="7">د</option>
                                    <option value="8">هـ</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-info" type="submit"> بحث</button>
                            </div>


                            <div class="col-md-12" id='dataload'>
                                <div class="row">
                                    <?php if (isset($result) && (!empty($result))) {
                                        foreach ($result as $row) { ?>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail">
                                                    <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.pavilionweb.com%2Fwp-content%2Fuploads%2F2017%2F03%2Fman-300x300.png&imgrefurl=https%3A%2F%2Fwww.pavilionweb.com%2Fuser-experience-cro%2F&tbnid=pazR_F4xhTyuXM&vet=12ahUKEwi7_6b41vnvAhXEwoUKHbf7DxkQMygCegUIARC4AQ..i&docid=mcVm5xQ5phBMCM&w=300&h=300&q=user&client=opera&ved=2ahUKEwi7_6b41vnvAhXEwoUKHbf7DxkQMygCegUIARC4AQ"
                                                         alt="...">
                                                    <div class="caption">
                                                        <h3><?= $row['file_num'] ?></h3>
                                                        <p><?= $row['mother_national_num'] ?></p>
                                                        <p><a href="#" class="btn btn-primary" role="button">Button</a>
                                                            <a href="#"
                                                               class="btn btn-default"
                                                               role="button">Button</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                    <div class="col-md-12">
                                        <?php echo $pagination; ?>
                                    </div>

                                </div>
                            </div>

                            <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#file_statse').val(<?=$this->input->get('file_statse')?>);
        $('#family_cat').val(<?=$this->input->get('family_cat')?>);


    });
</script>



