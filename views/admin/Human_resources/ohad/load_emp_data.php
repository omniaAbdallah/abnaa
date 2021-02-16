

<div class="col-md-3 padding-10">
    <div class="panel panel-default">

        <div class="panel-body" style=" ">
            <div>
            <span class="profile-picture">
                <?php
                if (isset($person_data->img) && !empty($person_data->img)) { ?>
                    <img id="profile-img-tag" class=" img-responsive" alt=""
                         src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $person_data->img ?>"/>
                <?php } else { ?>
                    <img id="profile-img-tag" class=" img-responsive" alt=""
                         src="<?php echo base_url()."asisst/fav/apple-icon-120x120.png" ?>"/>
                <?php }
                ?>
            </span>
            <div class="space-4"></div>
            <a href="#" class="btn btn-sm btn-block btn-success">
                <i class="ace-icon fa fa-user-circle bigger-120"></i>
                <span class="bigger-110">
     <?php
     if(!empty($person_data->name)) {
         echo $person_data->name;
     }
     ?>
    </span>
            </a>
            </div>
            <div class="space-6"></div>
            <div class="profile-contact-info">
                <div class="profile-contact-links align-right">

                        <a href="#" class="btn btn-link">
                            <i class="ace-icon fa fa-credit-card bigger-120 green"></i>
                            الرقم الوظيفي : <?php echo $person_data->emp_code; ?>
                        </a>
                        <a href="#" class="btn btn-link">
                            <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                            الإدارة : <?php echo $person_data->edara; ?>
                        </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                        القسم : <?php echo $person_data->department_n; ?>
                    </a>
                    <br>
                    <span>
                         <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                        المسمي الوظيفي : <?php echo $person_data->job; ?>
                    </a>
                    </span>






                </div>


            </div>

        </div>
    </div>

</div>
<div class=" col-md-9 padding-10">

    <div class="col-xs-12">
        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-default" style="background-color: #85b558;color: #fff;"
                        title=" البيانات الأساسيه" data-toggle="tab" href="#main_data" role="tab"
                        aria-controls="main_data">
                    <i class="ace-icon fa fa-file-o faa-horizontal animated"></i>  البيانات الأساسيه
                </button>
                <button class="btn btn-default" style="background-color: #0088b1;color: #fff;"
                        title="البيانات الوظيفيه " data-toggle="tab" href="#job_data" role="tab"
                        aria-controls="job_data">
                    <i class="ace-icon fa fa-address-card-o faa-vertical animated"></i>
                    البيانات الوظيفيه
                </button>
                <button class="btn btn-default" style="background-color: #E5343D;color: #fff;"
                        title="البيانات المالية " data-toggle="tab" href="#Finance_data" role="tab"
                        aria-controls="Finance_data">
                    <i class="ace-icon fa fa-cogs faa-passing animated"></i> البيانات المالية
                </button>

                <button class="btn btn-default" style="background-color: #da9300;color: #fff;"
                        title="بيانات التعاقد" data-toggle="tab" href="#contract_data" role="tab"
                        aria-controls="contract_data">
                    <i class="ace-icon fa fa-id-badge faa-shake animated"></i> بيانات التعاقد
                </button>


                <button class="btn btn-default" style="background-color: #d54c7e;color: #fff;"
                        title="بيانات الدوام " data-toggle="tab" href="#work_data" role="tab"
                        aria-controls="work_data">
                    <i class="ace-icon fa fa-clock-o faa-burst animated"></i> بيانات الدوام
                </button>
                <button class="btn btn-default" style="background-color: #d54c7e;color: #fff;"
                        title=" بيانات المستندات والبطاقات والمهارات  " data-toggle="tab" href="#files_data" role="tab"
                        aria-controls="work_data">
                    <i class="ace-icon fa fa-file-o faa-burst animated"></i> بيانات المستندات
                </button>


            </div>


        </div>
    </div>
    <br>

    <div class="tab-content tab-content-vertical">
        <div class="tab-pane active" id="main_data" role="tabpanel">
            <div class="space-12"></div>

            <div class="profile-user-info profile-user-info-striped">
                <table class="table " style="">
                    <tbody>
                    <tr>
                        <td style="width: 105px;">
                            <strong>   الرقم الوظيفي  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?=$person_data->emp_code ?></td>
                        <td style="width: 122px;"><strong> إسم الموظف</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 250px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->name ?></span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>  النوع</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->gender_n ?></span>
                            <?php } ?></td>

                    </tr>
                    <tr>
                        <td style="width: 105px;">
                            <strong>    الجنسيه  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->nationality_n ?></span>
                            <?php } ?></td>
                        <td style="width: 122px;"><strong>  الديانه</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->deyana_n ?></span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>  الحاله الاجتماعيه</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->status_n ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td style="width: 122px;">
                            <strong>    تاريخ الميلاد  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data->birth_date_h))) {
                                $person_data->birth_date_m = explode('/', $person_data->birth_date_m)[2] . '/' . explode('/', $person_data->birth_date_m)[0] . '/' . explode('/', $person_data->birth_date_m)[1];
                                $person_data->birth_date_h = explode('/', $person_data->birth_date_h)[2] . '/' . explode('/', $person_data->birth_date_h)[1] . '/' . explode('/', $person_data->birth_date_h)[0];


                                ?>

                                <span class="editable" id="username">
                                    <?=  $person_data->birth_date_m .' '.'↔'.' '.$person_data->birth_date_h ?>
                                </span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>  رقم الجوال</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 135px"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->phone ?></span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>   رقم جوال أخر</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 135px"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->another_phone ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td style="width: 105px;">
                            <strong>    رقم التحويلة  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->tahwela_rkm ?></span>
                            <?php } ?></td>
                        <td style="width: 122px;"><strong>  نوع الهوية</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->type_card_n ?></span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>   رقم الهويه </strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->card_num ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td style="width: 105px;">
                            <strong>     جهه الاصدار  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->dest_card_n ?></span>
                            <?php } ?></td>
                        <td style="width: 122px;"><strong>   تاريخ الاصدار</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>

                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data->esdar_date_h))) {
                                $person_data->esdar_date_m = explode('/', $person_data->esdar_date_m)[2] . '/' . explode('/', $person_data->esdar_date_m)[0] . '/' . explode('/', $person_data->esdar_date_m)[1];
                                $person_data->esdar_date_h = explode('/', $person_data->esdar_date_h)[2] . '/' . explode('/', $person_data->esdar_date_h)[1] . '/' . explode('/', $person_data->esdar_date_h)[0];

                                ?>

                                <span class="editable" id="username">
                                    <?=  $person_data->esdar_date_m .' '.'↔'.' '.$person_data->esdar_date_h ?>
                                </span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>    تاريخ الانتهاء </strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data->end_date_h))) {
                                $person_data->end_date_h = explode('/', $person_data->end_date_h)[2] . '/' . explode('/', $person_data->end_date_h)[1] . '/' . explode('/', $person_data->end_date_h)[0];
                                $person_data->end_date_m = explode('/', $person_data->end_date_m)[2] . '/' . explode('/', $person_data->end_date_m)[0] . '/' . explode('/', $person_data->end_date_m)[1];

                                ?>

                                <span class="editable" id="username">  <?=  $person_data->end_date_m .' '.'↔'.' '.$person_data->end_date_h ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td style="width: 105px;">
                            <strong>    المدينه  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->city_n ?></span>
                            <?php } ?></td>
                        <td style="width: 122px;"><strong>  الحي</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->hai_n ?></span>
                            <?php } ?></td>
                        <td style="width: 135px;"><strong>   اسم الشارع</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->street_name ?></span>
                            <?php } ?></td>
                    </tr>
                    <tr>
                        <td style="width: 105px;">
                            <strong>    العنوان الوطني  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td colspan="2"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->adress ?></span>
                            <?php } ?></td>
                        <td style="width: 122px;"><strong>  العنوان في بلد المقيم</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->adress_other ?></span>
                            <?php } ?></td>

                    </tr>
                    <tr>
                        <td style="width: 135px;"><strong>    البريد الإلكتروني</strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->email ?></span>
                            <?php } ?></td>
                        <td style="width: 105px;">
                            <strong>     سناب شات  </strong>
                        </td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->snap_chat ?></span>
                            <?php } ?></td>
                        <td style="width: 122px;"><strong>   تويتر  </strong></td>
                        <td style="width: 10px;"><strong>:</strong></td>
                        <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                <span class="editable" id="username"><?= $person_data->twiter ?></span>
                            <?php } ?></td>

                    </tr>


                    </tbody>
                </table>



            </div>

            <div class="space-20"></div>
        </div>

            <div class="tab-pane " id="job_data" role="tabpanel">
                <div class="space-12"></div>
                <?php if (isset($person_data) && (!empty($person_data)) && (($person_data->employee_type !=0))) { ?>

                    <div class="profile-user-info profile-user-info-striped">
                        <table class="table " style="">
                            <tbody>

                            <tr>
                                <td style="width: 105px;">
                                    <strong>    حاله الموظف  </strong>
                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->employee_type_title ?></span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>  الدرجه العلميه</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->employee_degree_title ?></span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>   المؤهلات العلمية</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->employee_qualification_title ?></span>
                                    <?php } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 105px;">
                                    <strong>     الفئه الوظيفيه  </strong>
                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->cat_manager_title ?></span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>   الاداره</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->edara ?></span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>    القسم</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->department_n ?></span>
                                    <?php } ?></td>
                            </tr>

                            <tr>
                                <td style="width: 105px;">
                                    <strong>
                                        المسمي الوظيفي  </strong>
                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->job ?></span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>   المدير المباشر</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->manager_name ?></span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>    نوع العقد</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                            <?php
                                            if ($person_data->contract ==1){
                                                echo 'عقد محدد المدة';
                                            } elseif ($person_data->contract==0){
                                                echo 'عقد غير محدد المدة';
                                            }
                                             ?>
                                        </span>
                                    <?php } ?></td>
                            </tr>

                            <tr>
                                <td style="width: 105px;">
                                    <strong>
                                        تاريخ التعيين  </strong>
                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data->start_work_date_h))) {
                                        $person_data->start_work_date_h = explode('/', $person_data->start_work_date_h)[2] . '/' . explode('/', $person_data->start_work_date_h)[1] . '/' . explode('/', $person_data->start_work_date_h)[0];
                                        $person_data->start_work_date_m = explode('/', $person_data->start_work_date_m)[2] . '/' . explode('/', $person_data->start_work_date_m)[0] . '/' . explode('/', $person_data->start_work_date_m)[1];

                                        ?>

                                        <span class="editable" id="username">
                                           <?=  $person_data->start_work_date_m .' '.'↔'.' '.$person_data->start_work_date_h ?>
                                        </span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>    تاريخ انتهاء العقد</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data->end_contract_date_h))) {
                                        $person_data->end_contract_date_h = explode('/', $person_data->end_contract_date_h)[2] . '/' . explode('/', $person_data->end_contract_date_h)[1] . '/' . explode('/', $person_data->end_contract_date_h)[0];

                                       $person_data->end_contract_date_m = explode('/',$person_data->end_contract_date_m)[2] . '/' . explode('/',$person_data->end_contract_date_m)[0] . '/' . explode('/',$person_data->end_contract_date_m)[1];

                                        ?>

                                        <span class="editable" id="username">
                                               <?=  $person_data->end_contract_date_m .' '.'↔'.' '.$person_data->end_contract_date_h ?>
                                        </span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>     تاريخ انتهاء الخدمه</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data->end_service_date_h))) {
                                        $person_data->end_service_date_h = explode('/', $person_data->end_service_date_h)[2] . '/' . explode('/', $person_data->end_service_date_h)[1] . '/' . explode('/', $person_data->end_service_date_h)[0];

                                        $person_data->end_service_date_m = explode('/', $person_data->end_service_date_m)[2] . '/' . explode('/', $person_data->end_service_date_m)[0] . '/' . explode('/', $person_data->end_service_date_m)[1];

                                        ?>

                                        <span class="editable" id="username">
                                               <?=  $person_data->end_service_date_m .' '.'↔'.' '.$person_data->end_service_date_h ?>

                                        </span>
                                    <?php } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 105px;">
                                    <strong>
                                        التامينات الاجتماعيه  </strong>

                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                              <?php
                                              if ($person_data->type_tamin ==1){
                                                  echo '  مؤمن';
                                              } elseif ($person_data->type_tamin==2){
                                                  echo ' غير  مؤمن';
                                              }
                                              ?>

                                        </span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>    مكتب العمل</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username"><?= $person_data->work_maktb_title ?></span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>     رقم الإشتراك</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                            <?php
                                             echo $person_data->insurance_number;
                                            ?>
                                        </span>
                                    <?php } ?></td>
                            </tr>

                            <tr>
                                <td style="width: 105px;">
                                    <strong>
                                        تاريخ الإشتراك  </strong>

                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data->start_tamin_date_h))) {
                                        $person_data->start_tamin_date_h = explode('/', $person_data->start_tamin_date_h)[2] . '/' . explode('/', $person_data->start_tamin_date_h)[1] . '/' . explode('/', $person_data->start_tamin_date_h)[0];

                                        $person_data->start_tamin_date_m = explode('/', $person_data->start_tamin_date_m)[2] . '/' . explode('/', $person_data->start_tamin_date_m)[0] . '/' . explode('/', $person_data->start_tamin_date_m)[1];

                                        ?>

                                        <span class="editable" id="username">
                                            <?=  $person_data->start_tamin_date_m .' '.'↔'.' '.$person_data->start_tamin_date_h ?>


                                        </span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>     التأمين الطبي</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                        <?php
                                        if ($person_data->type_tamin__medicine ==1){
                                            echo '  مؤمن';
                                        } elseif ($person_data->type_tamin__medicine==2){
                                            echo ' غير  مؤمن';
                                        }
                                        ?></span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>      شركه التأمين</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                            <?php
                                            echo $person_data->tamin_company_title;
                                            ?>
                                        </span>
                                    <?php } ?></td>
                            </tr>

                            <tr>
                                <td style="width: 105px;">
                                    <strong>
                                        رقم التأمين  </strong>

                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) {

                                        ?>

                                        <span class="editable" id="username">
                                            <?=  $person_data->tamin_medicine_num ?>


                                        </span>
                                    <?php } ?></td>
                                <td style="width: 122px;"><strong>      رقم البوليصه</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td style="width: 212px;"><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                            <?= $person_data->polica_num?>
                                       </span>
                                    <?php } ?></td>
                                <td style="width: 135px;"><strong>       فئه التأمين</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <span class="editable" id="username">
                                            <?php
                                            echo $person_data->tamin_type_title;
                                            ?>
                                        </span>
                                    <?php } ?></td>
                            </tr>
                            <tr>
                                <td style="width: 105px;">
                                    <strong>
                                        تاريخ الانتهاء  </strong>

                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td colspan="3"><?php if (isset($person_data) && (!empty($person_data->tamin_date_h))) {
                                       $person_data->tamin_date_h = explode('/',$person_data->tamin_date_h)[2] . '/' . explode('/',$person_data->tamin_date_h)[1] . '/' . explode('/',$person_data->tamin_date_h)[0];

                                        $person_data->tamin_date_m = explode('/', $person_data->tamin_date_m)[2] . '/' . explode('/', $person_data->tamin_date_m)[0] . '/' . explode('/', $person_data->tamin_date_m)[1];

                                        ?>

                                        <span class="editable" id="username">
                                            <?=  $person_data->tamin_date_m .' '.'↔'.' '.$person_data->tamin_date_h ?>


                                        </span>
                                    <?php } ?></td>

                            </tr>


                            </tbody>
                        </table>



                    </div>

                    <div class="space-20"></div>
                <?php } else { ?>
                    <div class="col-md-12 center alert alert-danger">
                        <h4>لا يوجد بيانات </h4>
                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane " id="contract_data" role="tabpanel">
                <?php if (isset($person_data->contract_employe) && (!empty($person_data->contract_employe))) { ?>

                    <div class="col-md-12 center">
                        <br>

                        <div class="panel panel-default">

                            <div class="panel-body">
                                <table class="table ">
                                    <tr>
                                        <th>طبيعة العقد</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_nature_title ?></td>
                                        <th>طبيعة العمل</th>
                                        <th>:</th>
                                        <td><?= $person_data->job_type_title ?></td>
                                        <th>أيام العمل خلال الشهر</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->num_days_in_month ?></td>
                                    </tr>
                                    <tr>
                                        <th>ساعات العمل</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->hours_work ?></td>
                                        <th>أجر الساعة</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->hour_value ?></td>
                                        <th>فترات العمل</th>
                                        <th>:</th>
                                        <td><?= $person_data->work_period_title ?></td>
                                    </tr>
                                    <tr>
                                        <th>الأجازة السنوية</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->year_vacation_num ?></td>
                                        <th> المدة المستحقة عنها</th>
                                        <th>:</th>
                                        <td>
                                            <?php

                                            if ($person_data->contract_employe->year_vacation_period==360){
                                                echo 'سنة';

                                            } elseif ($person_data->contract_employe->year_vacation_period==720){
                                                echo 'سنتين';
                                            }
                                            ?>
                                        </td>
                                        <th>رصيد الاجازة السنوية السابقة</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->vacation_previous_balance ?></td>

                                    </tr>
                                    <tr>
                                        <th>   بداية حساب الاجازة</th>
                                        <th>:</th>
                                        <td>
                                            

                                            <?php
                                            if (!empty($person_data->contract_employe->vacation_start_h)){
                                                $person_data->contract_employe->vacation_start_h = explode('/', $person_data->contract_employe->vacation_start_h)[2] . '/' . explode('/', $person_data->contract_employe->vacation_start_h)[1] . '/' . explode('/', $person_data->contract_employe->vacation_start_h)[0];

                                                $person_data->contract_employe->vacation_start_m = explode('/', $person_data->contract_employe->vacation_start_m)[2] . '/' . explode('/', $person_data->contract_employe->vacation_start_m)[0] . '/' . explode('/', $person_data->contract_employe->vacation_start_m)[1];
                                                echo  $person_data->contract_employe->vacation_start_m.' '.'↔'.' '.$person_data->contract_employe->vacation_start_h ;

                                            }

                                             ?>


                                        </td>
                                        <th>الأجازة الاضطرارية</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->casual_vacation_num ?></td>
                                        <th> تذاكر سفر</th>
                                        <th>:</th>
                                        <td><?php
                                            if ($person_data->contract_employe->travel_ticket==1){
                                                echo 'نعم';
                                            }elseif ($person_data->contract_employe->travel_ticket==2){
                                                echo 'لا';
                                            }
                                            ?></td>


                                    </tr>
                                    <tr>
                                        <th>  نوع التذكرة</th>
                                        <th>:</th>
                                        <td><?= $person_data->contract_employe->travel_type_name ?></td>

                                        <th>   تحديد المدة</th>
                                        <th>:</th>
                                        <td>
                                            <?php
                                            $full_due_period = array('180'=>'6 أشهر','360'=>'سنة','720'=>'سنتين');
                                            if (!empty($person_data->contract_employe->travel_period) && key_exists($person_data->contract_employe->travel_period,$full_due_period)){
                                                echo $full_due_period[$person_data->contract_employe->travel_period];
                                            }
                                            ?>

                                        </td>
                                        <th>طريقة دفع الراتب</th>
                                        <th>:</th>
                                        <td><?= $person_data->pay_method_title ?></td>


                                    </tr>
                                    <tr>
                                        <th>  مكافأة نهاية الخدمة</th>
                                        <th>:</th>
                                        <td><?php
                                            if ($person_data->contract_employe->reward_end_work==1){
                                                echo 'نعم';
                                            }elseif ($person_data->contract_employe->reward_end_work==2){
                                                echo 'لا';
                                            }
                                            ?></td>

                                    </tr>
                                </table>

                            </div>

                        </div>


                    </div>
                <?php } else { ?>
                    <div class="col-md-12 center alert alert-danger">
                        <h4>لا يوجد بيانات </h4>
                    </div>
                <?php } ?>

            </div>

            <div class="tab-pane " id="Finance_data" role="tabpanel">
                <?php if (isset($person_data->finance_Data['badlat']) && (!empty($person_data->finance_Data['badlat']))) { ?>

                    <div class="col-md-12 center">
                        <br>
                        <div class="col-md-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">بيانات الاستحقاقات</h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive" id="finance_Data_1"
                                           >
                                        <thead>
                                        <tr>
                                            <th style="color: red;" class="">إسم
                                                البند
                                            </th>
                                            <th style="color: red;" class="">القيمه
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($person_data->finance_Data['badlat'] as $badel) {
                                            $count1 = 0;
                                            if ($badel->type == 1) {
                                                $count1++;
                                                ?>
                                                <tr>
                                                    <td><?= $badel->title ?></td>
                                                    <td><?= $badel->badalat->value ?></td>
                                                </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style="color: red;">الإجمالي</th>
                                            <td style="color: red;"><?= $person_data->finance_Data['get_having_value'] ?></td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <div class="alert alert-danger" id="no_data_1"
                                         style="display: none">
                                        <h4>لا يوجد بيانات </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">بيانات الاستقطاعات</h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive " id="finance_Data_2"
                                          >
                                        <thead>
                                        <tr>
                                            <th style="color: red;" class="">إسم
                                                البند
                                            </th>
                                            <th style="color: red;" class="">القيمه
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($person_data->finance_Data['badlat'] as $badel) {
                                            $count2 = 0;

                                            if ($badel->type == 2) {
                                                $count2++;

                                                ?>
                                                <tr>
                                                    <td><?= $badel->title ?></td>
                                                    <td><?= $badel->badalat->value ?></td>
                                                </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style="color: red;">الإجمالي</th>
                                            <td style="color: red;"><?= $person_data->finance_Data['get_discut_value'] ?></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="alert alert-danger" id="no_data_2"
                                         style="display: none">
                                        <h4>لا يوجد بيانات </h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <?php
                    if (isset($person_data->banks) && !empty($person_data->banks)){
                        $x=1;
                        ?>


                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"> بيانات الحسابات البنكية  </h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive " id="">
                                        <thead>
                                        <tr>
                                            <th style="color: red;" class="">م</th>
                                            <th style="color: red;" class="">اسم البنك</th>
                                            <th style="color: red;" class="">كود البنك</th>
                                            <th style="color: red;" class=""> رقم الحساب</th>
                                            <th style="color: red;" class=""> صوره الحساب </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($person_data->banks as $row) {
                                            ?>
                                            <tr>
                                                <td><?= $x++?></td>
                                                <td><?= $row->title?></td>
                                                <td><?= $row->bank_code?></td>
                                                <td><?= $row->bank_account_num?></td>
                                                <td>
                                                    <a data-toggle="modal"
                                                       onclick="$('#img_pop_view').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_banks/". $row->bank_id_fk_image ?>');"
                                                       data-target="#myModal-view">
                                                        <i class="fa fa-eye" title=" قراءة"></i>
                                                    </a>

                                                </td>
                                            </tr>

                                            <?php
                                        } ?>
                                        </tbody>

                                    </table>
                                    <div class="alert alert-danger" id="no_data_2"
                                         style="display: none">
                                        <h4>لا يوجد بيانات </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                <?php }else { ?>
                    <div class="col-md-12 center alert alert-danger">
                        <h4>لا يوجد بيانات </h4>
                    </div>
                <?php } ?>

            </div>

            <div class="tab-pane" id="work_data" role="tabpanel">
                <div class="col-md-12 text-center">
                    <br>

                    <?php if (isset($person_data->my_always) && (!empty($person_data->my_always))) { ?>
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center"> إسم الدوام</th>
                                        <th class="text-center">وقت الحضور</th>
                                        <th class="text-center"> وقت الانصراف</th>
                                        <th class="text-center">من تاريخ</th>
                                        <th class="text-center"> الى تاريخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1;
                                    foreach ($person_data->my_always as $record) { ?>
                                        <tr>
                                        <td rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $count++; ?></td>
                                        <td rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $record->name; ?></td>
                                        <?php if (!empty($record->period_num)) {
                                            $a = 1;
                                            foreach ($record->period_num as $row) { ?>
                                                <td><?= $row->attend_time ?></td>
                                                <td><?= $row->leave_time ?></td>
                                                <td><?= $row->from_date_ar ?></td>
                                                <td><?= $row->to_date_ar ?></td>
                                                </tr>
                                                <?php $a++;
                                            }
                                        } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    <?php } else { ?>
                        <div class=" alert alert-danger">
                            <h4>لا يوجد بيانات </h4>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <div class="tab-pane" id="files_data" role="tabpanel">
                <div class="col-md-12 text-center">
                    <br>

                    <?php if (isset($person_data->files) && (!empty($person_data->files))) { ?>
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <table class=" table">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> م</th>
                                        <th class="text-center">إسم المرفق</th>
                                        <th class="text-center"> المستند</th>
                                        <th class="text-center">هل يوجد تاريخ</th>
                                        <th class="text-center">من تاريخ</th>
                                        <th class="text-center">إلي تاريخ</th>
                                        <th class="text-center"> هل يوجد تنبيه</th>
                                        <th class="text-center">   المدة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($person_data->files as $data_file) {
                                        $x = 1;
                                        ?>
                                        <tr>
                                            <td><?= $x++ ?></td>
                                            <td><?= $data_file->title ?></td>
                                            <td>
                                                <?php
                                                $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                $file = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'pdf', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT', 'pdf', 'xls', 'xlsx', 'doc', 'docx', 'txt');
                                                $ext = pathinfo($data_file->emp_file, PATHINFO_EXTENSION);
                                                if (in_array($ext, $image)) {
                                                    ?>
                                                    <a data-toggle="modal"
                                                       onclick="$('#img_pop_view').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_mostnad_files/" . $data_file->emp_file ?>');"
                                                       data-target="#myModal-view">
                                                        <i class="fa fa-eye" title=" قراءة"></i>
                                                    </a>
                                                    <?php

                                                } elseif (in_array($ext, $file)) {
                                                    ?>
                                                    <a target="_blank"
                                                       href="<?= base_url() . "human_resources/Human_resources/read_emp_file/" . $data_file->emp_file ?>">
                                                        <i class="fa fa-eye" title=" قراءة"></i>
                                                    </a>

                                                    <?php
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                if ($data_file->have_date == 1) {
                                                    echo "نعم";
                                                } elseif ($data_file->have_date == 2) {
                                                    echo "لا";
                                                }

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($data_file->from_date_h) && !empty($data_file->from_date)){

                                                    $data_file->from_date_h = explode('/', $data_file->from_date_h)[2] . '/' . explode('/', $data_file->from_date_h)[1] . '/' . explode('/', $data_file->from_date_h)[0];

                                                   $data_file->from_date = explode('/',$data_file->from_date)[2] . '/' . explode('/',$data_file->from_date)[0] . '/' . explode('/',$data_file->from_date)[1];

                                                    echo  $data_file->from_date.' '.'↔'.' '.$data_file->from_date_h ;

                                                } else{
                                                    echo 'لا يوجد' ;
                                                }
                                                 ?>
                                            </td>
                                            <td>

                                                <?php
                                                if (!empty($data_file->to_date) && !empty($data_file->to_date_h)){
                                                    $data_file->to_date_h = explode('/', $data_file->to_date_h)[2] . '/' . explode('/', $data_file->to_date_h)[1] . '/' . explode('/', $data_file->to_date_h)[0];

                                                    $data_file->to_date = explode('/', $data_file->to_date)[2] . '/' . explode('/', $data_file->to_date)[0] . '/' . explode('/', $data_file->to_date)[1];
                                                    echo  $data_file->to_date.' '.'↔'.' '.$data_file->to_date_h ;

                                                } else{
                                                    echo 'لا يوجد' ;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                  if ($data_file->tanbih_fk==1){
                                                      echo 'نعم';
                                                  } elseif ($data_file->tanbih_fk==2){
                                                      echo 'لا';
                                                  }
                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                $period_arr= array('1'=>'يوم','7'=>'اسبوع','15'=>'اسبوعين','30'=>'شهر');
                                                if (!empty($data_file->period) && key_exists($data_file->period,$period_arr)){
                                                    echo $period_arr[$data_file->period];
                                                }

                                                ?>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>

                                </table>

                            </div>

                        </div>




                    <?php } else { ?>
                        <div class="alert alert-danger">
                            <h4>لا يوجد بيانات </h4>
                        </div>
                    <?php } ?>
                </div>

            </div>

    </div>

</div>