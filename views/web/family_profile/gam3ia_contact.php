<style type="text/css">
    .bs-callout {
        display: inline-block;
        width: 100%;
        padding: 0 5px 5px 0;
    }

    .bs-callout label {
        font-size: 16px;
        margin-bottom: 0px;
        color: #002542;
        display: block;
        text-align: right;
    }

    .bs-callout .title {
        margin: 23px 0 0 0;
        padding: 8px 5px 8px 0;
        background-color: #95c11f;
        font-size: 18px;
        color: #002542;
        border-radius: 4px;
    }

    .bs-callout .sidebar .panel-success > .panel-heading {
        background-color: #95c11f;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
        margin: 0;
    }

    .bs-callout .sidebar .panel-success > .panel-heading h5 {
        margin: 0
    }

    .bs-callout .sidebar ul li {
        padding: 7px 5px;
    }

    .bs-callout .sidebar ul li a {
        color: #002542;
        font-size: 16px;

    }

    hr {
        margin-top: 5px;
        margin-bottom: 7px;
        border: 0;
        border-top: 1px solid #eee;
    }

    .panel-success > .panel-heading {
        color: #3c763d;
        background-color: #96c73e;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
    }

    .panel-success > .panel-heading h5 {
        margin: 0
    }

    .panel-group .panel-heading .panel-title a {
        font-size: 18px;
        color: #002542;
    }

    .md-content h3 {
        background: #96c73e;
    }

    .btn-rounded {
        border-radius: 2em;
    }

    .btn-warning:after {
        content: "";
        position: absolute;
        left: 0;
        width: 0;
        transition: 0.3s all ease-in;

    }

    .btn-warning:hover:after {
        width: 100%;
        background-color: #96c73e;

    }


    .button8 {
        color: rgba(255, 255, 255, 1);
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        border: 1px solid rgba(255, 255, 255, 0.5);
        position: relative;
        border-radius: 2em:
    }

    .button8 a {
        color: rgba(51, 51, 51, 1);
        text-decoration: none;
        display: block;
    }

    .button8 span {
        z-index: 2;
        /* display: block; */
        /* position: absolute; */
        width: 100%;
        height: 100%;
        color: #fff;
        position: relative;
    }

    .button8::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0%;
        height: 100%;
        z-index: 1;
        opacity: 0;
        background-color: rgba(150, 199, 62, 0.9);
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        border-radius: 30px;


    }

    .button8:hover::before {
        opacity: 1;
        width: 100%;

    }

    .profile-sidebar {
        background-color: #fff;
        border: 1px solid #eee;
        padding: 5px;
        border-radius: 6px;
        box-shadow: -2px 2px 8px #999;
    }

    .profile-sidebar .nav > li > a {

        padding: 10px 4px;
    }

    .profile-sidebar .panel-body {
        padding: 5px;
    }

    .profile-sidebar .btn-compose-email {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .profile-sidebar .nav-pills > li.active > a,
    .profile-sidebar .nav-pills > li.active > a:hover,
    .profile-sidebar .nav-pills > li.active > a:focus {
        color: #fff;
        background-color: #96c73e;
    }

    .panel-default .panel-heading {
        background: rgba(226, 226, 226, 1);
        background: -moz-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226, 226, 226, 1)), color-stop(35%, rgba(219, 219, 219, 1)), color-stop(60%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(254, 254, 254, 1)));
        background: -webkit-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -o-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -ms-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: linear-gradient(to bottom, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0);

    }

</style>
<section class="main_content" style="margin-top: 150px !important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php
               /* $data['id_page'] = $id_page;
                $data['name_page'] = $name_page;
                $this->load->view('web/registration_views/profile_sidebar', $data);**/ ?>
            </div>
            <div class="col-sm-9 padding-4">
                <?php if ((isset($data)) && (!empty($data))) { ?>

                    <!-- resumt -->
                    <?php if($this->session->flashdata('message')) { ?>

                        <?php echo $this->session->flashdata('message'); ?>

                    <?php } ?>
                    <div class="panel panel-success ">

                        <div class="panel-heading resume-heading">
                            <h5> التواصل مع الجمعية</h5>
                        </div>
                        <?php echo form_open_multipart(base_url().'Web/gam3ia_contact') ?>
                        <div class="bs-callout bs-callout-danger">


                            <div class="clearfix"></div> <br>
                            <div class="col-xs-12 col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>   اسم الأب : </strong> <?=$data[0]->father_name?>
                                    </li>
                                    <li class="list-group-item"><strong>رقم سجل الأب : </strong> <?=$data[0]->f_national_id?></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong> اسم الأم : </strong> <?=$data[0]->mother_name?>
                                    </li>
                                    <li class="list-group-item"><strong>رقم سجل الأم : </strong> <?=$data[0]->mother_national_num_fk?></li>
                                    </li>
<!--                                    <li class="list-group-item"><i class="fa fa-phone"></i> --><?//=$data[0]->m_mob?><!--</li>-->

                                </ul>
                            </div>

                            <div class="col-lg-12 col-xs-12 no-padding">
                                <div class="col-md-4 col-sm-5 col-xs-12 padding-4">
                                    <input type="hidden" name="mother_name" value="<?=$data[0]->mother_name?>">
                                    <input type="hidden" name="mother_num" value="<?=$data[0]->mother_national_num_fk?>">
                                    <label class="label label-green">نوع التواصل </label>
                                    <select  name="contact_type_fk"
                                             class="form-control  "  data-validation="required">
                                        <option value="">اختر</option>
                                        <?php
                                        if (isset($contact_types)&& !empty($contact_types)){
                                            foreach ($contact_types as $item){
                                                ?>
                                                <option value="<?= $item->id?>-<?= $item->title?>"> <?= $item->title?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class=" col-md-8 col-sm-6 col-xs-12 padding-4">
                                    <label class="label label-green"> نص التواصل </label>
                                    <textarea  name="content"
                                               value="" style="height: 90px"
                                               class="form-control "  data-validation="required"></textarea>
                                </div>

                            </div>
                            <div class="clearfix"></div><br>
                            <div class="col-xs-12 text-center no-padding">
                                <button type="submit" id="" name="add" value="add"
                                        class="btn btn-warning btn-rounded button8"
                                        style="font-size: 16px;width: 150px;">
                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i> ارسال </span></button>

                            </div>
                             <input type="hidden" name="mother_mob" value="<?=$data[0]->m_mob?>">
                            <?php echo form_close() ?>

                        </div>
                        <hr>



                    </div>
                <?php } ?>
            </div>
            <!-- resume -->

        </div>
    </div>

</section>

<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>


