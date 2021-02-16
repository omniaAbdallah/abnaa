<div class="panel panel-default">
    <div class="panel-heading" style="/*background: #7e55d2; color: white; background-image: none;*/">

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#work_team" aria-controls="main-detailsfa" role="tab" data-toggle="tab">فريق العمل</a>
            </li>
            <li role="presentation"><a href="#employees" aria-controls="general-detailsfa" role="tab"
                                       data-toggle="tab"> موظفي الجمعية</a></li>
        </ul>
    </div>
</div>
<div class="panel-body" style="height: 295px;overflow: hidden;">
    <div class="box-body">
        <div class="widget-box transparent">
            <div class="widget-body">
                <div class="widget-main padding-8">
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="work_team">

                            <div id="profile-feed-1" class="profile-feed">
                                <?php
                                if (isset($my_employee_edara) and $my_employee_edara != null) {
                                    foreach ($my_employee_edara as $my_emp_edara) {
                                        ?>
                                        <div class="profile-activity clearfix">
                                            <div>
                                                <img class="pull-left"
                                                     src="<?= base_url() ?>/uploads/human_resources/emp_photo/thumbs/<?= $my_emp_edara->personal_photo ?>">
                                                <p class="user" href="#">  <?= $my_emp_edara->employee ?></p>
                                                <p class="pargraph">
                                                    <small style="color: #0705a2;font-weight: bold;font-size: 11px;"><?= $my_emp_edara->mosma_wazefy_n ?></small>
                                                </p>
                                                <p style="color: #840404;" class="pargraph"><i
                                                        class="fa fa-phone"
                                                        aria-hidden="true"></i> <?= $my_emp_edara->tahwela_rkm ?>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                                    <?= $my_emp_edara->phone ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="employees">

                            <div id="profile-feed-1" class="profile-feed">
                                <?php
                                if (isset($all_employees) and $all_employees != null) {
                                    foreach ($all_employees as $one_emp) {
                                        ?>
                                        <div class="profile-activity clearfix">
                                            <div style="">
                                                <img class="pull-left"
                                                     src="<?= base_url() ?>/uploads/human_resources/emp_photo/thumbs/<?= $one_emp->personal_photo ?>">
                                                <p class="user" href="#">  <?= $one_emp->employee ?></p>
                                                <p class="pargraph">
                                                    <small style="color: #0705a2;font-weight: bold;font-size: 11px;"><?= $one_emp->mosma_wazefy_n ?></small>
                                                </p>
                                                <p style="color: #840404;" class="pargraph"><i
                                                        class="fa fa-phone"
                                                        aria-hidden="true"></i> <?= $one_emp->tahwela_rkm ?>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                                    <?= $one_emp->phone ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
