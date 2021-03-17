<style>
    .footer_state {
        /*border-left: 1px solid #3E4142;*/
        display: -webkit-box;
    }

</style>
<style>

    .list-group-flush .list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group-flush:last-child .list-group-item:last-child {

        border-bottom-width: 0;

    }

    .list-group-flush .list-group-item {
        border-right-width: 0;
        border-left-width: 0;
        border-radius: 0;
    }
</style>
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h4><?= $title ?></h4>
            </div>
        </div>

        <div class="panel-body">
            <?php
            if (isset($data) && !empty($data)) {
                ?>

                <div class="col-md-4 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title text-center"> الأم</h5>

                        </div>
                        <div class="panel-body" style="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>الإسم
                                        :</strong><?php
                                    if (!empty($data->mother_name)) {
                                        echo $data->mother_name;
                                    }
                                    ?>
                                </li>
                                <li class="list-group-item"><strong> تاريخ الميلاد
                                        :</strong>
                                    <?php
                                    if (!empty($data->m_birth_date_hijri)) {

                                        $data->m_birth_date_hijri = explode('/', $data->m_birth_date_hijri)[2] . '/' . explode('/', $data->m_birth_date_hijri)[1] . '/' . explode('/', $data->m_birth_date_hijri)[0];
                                        echo $data->m_birth_date_hijri;
                                    }
                                    ?>
                                </li>

                                <li class="list-group-item"><strong> العمر
                                        :</strong>
                                    <?php
                                    if (!empty($data->m_birth_date_hijri_year) && !empty($current_year)) {
                                        echo $current_year - $data->m_birth_date_hijri_year;
                                    }
                                    ?>

                                </li>
                                <li class="list-group-item"><strong> رقم الهوية
                                        :</strong>
                                    <?php
                                    if (!empty($data->mother_national_num_fk)) {
                                        echo $data->mother_national_num_fk;
                                    }
                                    ?>

                                </li>


                            </ul>

                        </div>
                        <div class="panel-footer">
                            <div class="footer_state">
                                <div class="col-md-12 no-padding">
                                    <div class=" col-md-7">
                                        <strong>نوع الكفالة :</strong>
                                        <span> <?php
                                            if (isset($data->m_kafala[0]->kafala_name) && !empty($data->m_kafala[0]->kafala_name)) {
                                                echo $data->m_kafala[0]->kafala_name;
                                            } else {
                                                echo 'لا يوجد';
                                            }

                                            ?> </span>
                                    </div>

                                    <div class=" col-md-5">
                                        <strong> حالة :</strong>

                                        <?php
                                        if (isset($data->m_kafala) && !empty($data->m_kafala)) {
                                            ?>
                                            <button type="button" class="btn btn-success btn-sm"
                                                    onclick="LoadTable(<?php echo $data->mother_id; ?>)"
                                                    data-toggle="modal"
                                                    data-target="#kafala_details_modal">
                                                مكفول
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button type="button" class="btn btn-warning btn-sm">
                                                غير مكفول
                                            </button>

                                            <?php
                                        }
                                        ?>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php
                if (isset($data->members) && !empty($data->members)) {
                    foreach ($data->members as $member) {
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 padding-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title text-center"> المستفيد (<?= $member->relation_name ?>)</h5>

                                </div>
                                <div class="panel-body" style=" ">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>الإسم
                                                :</strong><?php
                                            if (!empty($member->member_full_name)) {
                                                echo $member->member_full_name;
                                            }
                                            ?>
                                        </li>
                                        <li class="list-group-item"><strong> تاريخ الميلاد
                                                :</strong>
                                            <?php
                                            if (!empty($member->member_birth_date_hijri)) {
                                                $member->member_birth_date_hijri = explode('/', $member->member_birth_date_hijri)[2] . '/' . explode('/', $member->member_birth_date_hijri)[1] . '/' . explode('/', $member->member_birth_date_hijri)[0];

                                                echo $member->member_birth_date_hijri;
                                            }
                                            ?>
                                        </li>

                                        <li class="list-group-item"><strong> العمر
                                                :</strong>
                                            <?php
                                            if (!empty($member->member_birth_date_hijri_year) && !empty($current_year)) {
                                                echo $current_year - $member->member_birth_date_hijri_year;
                                            }
                                            ?>

                                        </li>
                                        <li class="list-group-item"><strong> رقم الهوية
                                                :</strong>
                                            <?php
                                            if (!empty($member->member_card_num)) {
                                                echo $member->member_card_num;
                                            }
                                            ?>

                                        </li>


                                    </ul>


                                </div>
                                <div class="panel-footer" id="">
                                    <div class="footer_state">
                                        <div class="col-md-12 no-padding">
                                            <div class=" col-md-7">
                                                <strong>نوع الكفالة :</strong>
                                                <span> <?php
                                                    if (isset($member->kafala[0]->kafala_name) && !empty($member->kafala[0]->kafala_name)) {
                                                        echo $member->kafala[0]->kafala_name;
                                                    } else {
                                                        echo 'لا يوجد';
                                                    }

                                                    ?> </span>
                                            </div>

                                            <div class="col-md-5">
                                                <strong> حالة :</strong>

                                                <?php
                                                if (isset($member->kafala) && !empty($member->kafala)) {
                                                    ?>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                            onclick="LoadTable(<?php echo $member->id; ?>)"
                                                            data-toggle="modal"
                                                            data-target="#kafala_details_modal">
                                                        مكفول
                                                    </button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button type="button" class="btn btn-warning btn-sm">
                                                        غير مكفول
                                                    </button>

                                                    <?php
                                                }
                                                ?>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
                <?php
            }
            ?>


        </div>
    </div>

</div>

<div class="modal" id="kafala_details_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"> التفاصيل</h4>
            </div>
            <div class="modal-body" id="load_kafala_div">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-defualt" data-dismiss="modal" aria-label="Close">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

