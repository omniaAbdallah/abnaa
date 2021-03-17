

<div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-users"></i> أعضاء الجمعية العمومية </h5>
                    </div>
            
        <div class="cicleat-sec col-xs-12 no-padding ">
                        <div class="col-md-3 col-sm-4 col-xs-12 padding-4">
                            <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الأعضاء <strong
                                                class="badge"><?= $gam3ia_omomia ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow green-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو نشط <strong
                                                class="badge"><?= $gam3ia_omomia_active ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow red-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو غير نشط <strong
                                                class="badge"><?= $gam3ia_omomia_not_active ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow yellow-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو عامل <strong
                                                class="badge"><?= $gam3ia_omomia_1 ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو شرف <strong
                                                class="badge">1</strong></span></h5>
                            </div>

                            <div class="circle-arrow labni-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو منتسب <strong
                                                class="badge"><?= $gam3ia_omomia_2 ?></strong></span></h5>
                            </div>
                            <div class="circle-arrow labni-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو فخري <strong
                                                class="badge"><?= $gam3ia_omomia_3 ?></strong></span></h5>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 padding-4">
                            <div class="charity-structure">
                                <img  style="width:100%;"src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/structure.jpg">
                            </div>
                        </div>

                    </div>


 </div>



<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
        الملف الشخصي

        </div>
        <div class="panel-body" >

        <table id="" class="table table-striped table-bordered dt-responsive nowrap example"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th class="text-center">رقم العضوية</th>
                                        <th class="text-center">إسم العضو</th>
                                        <th>رقم الهوية</th>
                                        <th>رقم الجول</th>
                                        <th>نوع العضوية</th>
                                        <th>حالة العضوية</th>

                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a = 1;

                                    if (isset($records) && !empty($records)) {

                                        foreach ($records as $record) {
                                            ?>
                                            <tr>
                                                <td><?php echo $a ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full) != NULL) {
                                                        echo $record->odwiat->rkm_odwia_full;
                                                    } else {
                                                        echo "غير محدد";
                                                    }


                                                    ?>
                                                </td>
                                                <td><?php echo $record->laqb_title . '/' . $record->name; ?></td>
                                                <td><?php echo $record->card_num; ?></td>
                                                <td><?php echo $record->jwal; ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($record->odwiat->no3_odwia_title) && !empty($record->odwiat->no3_odwia_title)) {
                                                        echo $record->odwiat->no3_odwia_title;
                                                    } else {
                                                        echo "غير محدد";
                                                    }

                                                    ?>
                                                </td>

                                                <td>
                                                    <?php


                                                    if (isset($record->odwiat->odwia_status_title) && !empty($record->odwiat->odwia_status_title)) {
                                                        echo $record->odwiat->odwia_status_title;
                                                    } else {
                                                        echo "غير محدد";
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;

                                        }
                                    } else { ?>
                                        <td colspan="6">
                                            <div style="color: red; font-size: large;">لم يتم اضافه أعضاء الي الان</div>
                                        </td>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>

 </div>
</div>
</div>