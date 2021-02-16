<div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-users"></i> الموارد البشرية </h5>
                    </div>
        <div class="cicleat-sec col-xs-12 no-padding ">
                        <div class="col-md-3 col-sm-4 col-xs-12 padding-4">
                            <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الموظفين <strong
                                                class="badge"><?= $emp_count ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow green-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الإدارات <strong
                                                class="badge"><?= $edara_count ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow red-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الأقسام <strong
                                                class="badge"><?= $qsm_count ?></strong></span></h5>
                            </div>

                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 padding-4">
                            <div class="charity-structure">
                                <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/hr.jpg">
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 no-padding">
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <h3 class="panel-title">الموظفين</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                if (isset($all_emp) && !empty($all_emp)) {
                                    $x = 1;
                                    ?>

                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap example"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr class="info">
                                            <th class="text-center">م</th>
                                            <th class="text-center"> كود الموظف</th>
                                            <th class="text-center">إسم الموظف</th>
                                            <th> المسمي الوظيفي</th>
                                            <th> الادارة</th>
                                            <th> القسم</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        foreach ($all_emp as $emp) {
                                            ?>
                                            <tr>
                                                <td><?= $x++ ?></td>
                                                <td><?= $emp->emp_code ?></td>
                                                <td><?= $emp->employee ?></td>
                                                <td><?= $emp->job_title ?></td>
                                                <td><?php if (!empty($emp->edara_name)) {
                                                        echo $emp->edara_name;
                                                    } else {
                                                        echo 'غير محدد';
                                                    } ?></td>
                                                <td><?php if (!empty($emp->qsm_name)) {
                                                        echo $emp->qsm_name;
                                                    } else {
                                                        echo 'غير محدد';
                                                    } ?></td>
                                            </tr>
                                            <?php

                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>


 </div>
