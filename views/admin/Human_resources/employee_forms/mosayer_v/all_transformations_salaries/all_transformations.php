<div class="col-sm-12 no-padding">
    <!-- <pre>
    <?php /*echo 'count ' . count($tab_id) */ ?>
    <?php /*print_r($tab_id) */ ?>
</pre>-->
    <?php if (isset($tab_id) && (count($tab_id) > 1)){ ?>

    <?php if (!isset($panel)){ ?>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <!--<div class="panel-body">
            <div class="col-sm-12">

            </div>
       </div>-->
        <div class="panel-body">
            <?php } ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#mine_1" aria-controls="mine_1" role="tab"
                                                          data-toggle="tab"><span>طلباتي</span></a></li>
                <li role="presentation" class=""><a href="#follow_1" aria-controls="follow_1" role="tab"
                                                    data-toggle="tab"><span>متابعة طلباتي</span></a></li>
                <li role="presentation" class=""><a href="#comming_1" aria-controls="comming_1" role="tab"
                                                    data-toggle="tab"><span>الوارد</span></a></li>
            </ul>

            <div class="tab-content" id="tab-content1">
                <br>
                <?php } ?>
                <?php 
        
                
                if ((isset($tab_id)) && (!empty($tab_id)) && (in_array('mine_1', $tab_id))) {
                    $class_active = 'active in';
                    ?>
                    <div role="tabpanel" class="tab-pane fade <?= $class_active ?>" id="mine_1">
                        <table class="table example table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th>رقم المسير</th>
                                <th>تاريخ المسير</th>
                                <th>عن شهر</th>
<!--                                <th>إسم الموظف</th>-->
                                <th>قيمة المسير</th>
                                <th>المسير الأن عند</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($user_orders)) {
                                $x = 1;
                                foreach ($user_orders as $row) {

                                    $halet_eltalab = 'جاري ';
                                    $halet_eltalab_class = 'warning';

                                    if ($row->suspend_direct_manager == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_direct_manager == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }

                                    if ($row->suspend_mohasb == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_mohasb == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    if ($row->suspend_moder_mali == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_moder_mali == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    if ($row->suspend_moder_3am == 'yes') {
                                        $halet_eltalab = 'تم اعتماد المسير بالموافقة ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_moder_3am == 'no') {
                                        $halet_eltalab = 'تم اعتماد المسير بالرفض ';
                                        $halet_eltalab_class = 'danger';
                                    }

                                    ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->mosayer_rkm; ?></td>
                                        <td><?php echo $row->mosayer_date_ar; ?></td>
                                        <td><?php echo $row->mosayer_month; ?></td>
<!--                                        <td>--><?php //echo $row->current_from_user_name; ?><!--</td>-->
                                        <td><?php echo $row->egmali_safi; ?></td>
                                        <td><?php echo $row->level_title; ?></td>
                                        <td>
                                            <!--<a class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                               data-toggle="modal" data-target="#mosayer_details"
                                               onclick="mosayer_details(<?php echo $row->mosayer_rkm; ?>)">تفاصيل المسير
                                            </a>
                                            -->
                                            <a target="_blank" 
                                            href="<?php echo base_url()?>human_resources/employee_forms/Employee_salaries/search_mosayer" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                               >تفاصيل المسير
                                            </a>
                                            <!------------------------------>
                                            <?php
                                            if ($row->suspend_moder_3am == 'yes') { ?>
                                                <span class="label label-success">
                                        تم اعتماد المسير بالموافقة
                                    </span>
                                            <?php } elseif ($row->suspend_moder_3am == 'no') { ?>
                                                <span class="label label-danger">
                                        تم اعتماد المسير بالرفض
                                    </span>
                                            <?php } else {
                                                ?>

                                                <a type="button" class="btn btn-primary btn-xs"
                                                   style="padding: 1px 6px;" data-toggle="modal"
                                                   data-target="#transform_details"
                                                   onclick="transformDetails(<?php echo $row->mosayer_rkm; ?>)">تحويلات المسير
                                                </a>

                                            <?php } ?>

                                        </td>


                                    </tr>

                                    <?php $x++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;color: red">لا توجد طلبات !</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
                <?php if ((isset($tab_id)) && (!empty($tab_id)) && (in_array('follow_1', $tab_id))) {
                    $class_active = 'active in';
                    if (count($tab_id) > 1) {
                        $class_active = '';
                    }
                    ?>

                    <div role="tabpanel" class="tab-pane fade <?= $class_active ?>" id="follow_1">

                        <table class="table example table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th> م</th>
                                <th>رقم المسير</th>
                                <th>تاريخ المسير</th>
                                <th>عن شهر</th>
<!--                                <th>إسم الموظف</th>-->
                                <th>قيمة المسير</th>
                                <th>المسير الأن عند</th>
                                <th>متابعة المسير</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($user_orders)) {
                                $x = 1;
                                foreach ($user_orders as $row) {
                                    $halet_eltalab = 'جاري ';
                                    $halet_eltalab_class = 'warning';

                                    if ($row->suspend_direct_manager == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_direct_manager == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }

                                    if ($row->suspend_mohasb == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_mohasb == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    if ($row->suspend_moder_mali == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_moder_mali == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    if ($row->suspend_moder_3am == 'yes') {
                                        $halet_eltalab = 'تم اعتماد المسير بالموافقة ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_moder_3am == 'no') {
                                        $halet_eltalab = 'تم اعتماد المسير بالرفض ';
                                        $halet_eltalab_class = 'danger';
                                    }

                                    ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->mosayer_rkm; ?></td>
                                        <td><?php echo $row->mosayer_date_ar; ?></td>
                                        <td><?php echo $row->mosayer_month; ?></td>
<!--                                        <td>--><?php //echo $row->current_from_user_name; ?><!--</td>-->
                                        <td><?php echo $row->egmali_safi; ?></td>
                                        <td><?php echo $row->level_title; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                    style="font-size: 16px;" data-toggle="modal"
                                                    data-target="#motab3a_details"
                                                    onclick="motab3a_details(<?php echo $row->mosayer_rkm; ?>)">الإطلاع
                                                علي تحويلات المسير
                                            </button>
                                        </td>
                                    </tr>

                                    <?php $x++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;color: red">لا توجد طلبات !</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>

                <?php if ((isset($tab_id)) && (!empty($tab_id)) && (in_array('comming_1', $tab_id))) {
                    $class_active = 'active in';
                    if (count($tab_id) > 1) {
                        $class_active = '';
                    }
                    ?>

                    <div role="tabpanel" class="tab-pane fade <?= $class_active ?>" id="comming_1">
                        <table class="table example table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">

                                <th>م</th>
                                <th>رقم المسير</th>
                                <th>تاريخ المسير</th>
                                <th>عن شهر</th>
<!--                                <th>إسم الموظف</th>-->
                                <th>قيمة المسير</th>
                                <th>حالة المسير</th>
                                <th>الإجراءات</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?php 
                            /*
                                    echo '<pre>';
                print_r($coming_records);*/
                            
                            if (!empty($coming_records)) {
                                $x = 1;
                                foreach ($coming_records as $row) {
                                    $halet_eltalab = 'جاري ';
                                    $halet_eltalab_class = 'warning';

                                    if ($row->suspend_direct_manager == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_direct_manager == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }

                                    if ($row->suspend_mohasb == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_mohasb == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    if ($row->suspend_moder_mali == 'yes') {
                                        $halet_eltalab = 'تم قبول المسير ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_moder_mali == 'no') {
                                        $halet_eltalab = 'تم رفض المسير ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    if ($row->suspend_moder_3am == 'yes') {
                                        $halet_eltalab = 'تم اعتماد المسير بالموافقة ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend_moder_3am == 'no') {
                                        $halet_eltalab = 'تم اعتماد المسير بالرفض ';
                                        $halet_eltalab_class = 'danger';
                                    }

                                    ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->mosayer_rkm; ?></td>
                                        <td><?php echo $row->mosayer_date_ar; ?></td>
                                        <td><?php echo $row->mosayer_month-1; ?></td>
                                      <!--  <td><?php echo $row->current_from_user_name; ?></td>-->
                                        <td><?php echo ($row->sum_all_sheeks + $row->sum_all_tahwel) ; ?></td>
                                        <td>
                                            <span class="label label-<?php echo $halet_eltalab_class ?>"><?php echo $halet_eltalab; ?></span>
                                        </td>
                                        <td>
                                            <!------------------ التفاصيل---------->
                                           <!-- <a class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                               data-toggle="modal" data-target="#mosayer_details"
                                               onclick="mosayer_details(<?php echo $row->mosayer_rkm; ?>)">تفاصيل المسير
                                            </a>-->
                                              <a target="_blank" 
                                     href="<?php echo base_url()?>human_resources/employee_forms/Employee_salaries/search_mosayer" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                               >تفاصيل المسير
                                            </a>
                                            <a type="button" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                               data-toggle="modal" data-target="#transform_details"
                                               onclick="transformDetails(<?php echo $row->mosayer_rkm; ?>)">تحويلات المسير
                                            </a>

                                            <!-----------------التفاصيل----------->

                                            <!-----------------omnia  الإجراء----------->
                                            <?php  if (($row->suspend_moder_3am == 'yes') || ($row->suspend_moder_3am == 'no')) { }else{?>
                                                <a type="button" class="btn btn-success btn-xs" title="الإجراء"
                                                   style="padding: 1px 6px;"
                                                   onclick="$('#transformLabel').html('<?php echo $row->level_title; ?>');
                                                           make_transformRequest(<?php echo $row->mosayer_rkm; ?>)"
                                                   data-toggle="modal" data-target="#transform">الإجراء
                                                </a>
                                            <?php } ?>
                                            <!------------------الإجراء---------->


                                        </td>


                                    </tr>

                                    <?php $x++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="11" style="text-align: center;color: red">لا توجد طلبات واردة !</td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                <?php } ?>

            </div>
        </div>
        <?php if (isset($tab_id) && (count($tab_id) > 1)){ ?>

        <?php if (!isset($panel)){ ?>
    </div>

</div>
<?php } ?>
<?php } ?>

<!-------------------------------modals--------------------------->

<div class="modal  modal-success  fade" id="transform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="transformLabel"></h4>
            </div>
            <div id="transformRequest"></div>
        </div>
    </div>
</div>


<div class="modal  modal-success  fade" id="transform_details" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="transform_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled"
                        onclick="$('#transform_details').modal('hide')"><span class="btn-label"><i
                                class="glyphicon glyphicon-remove"></i></span> إغلاق
                </button>

            </div>

        </div>
    </div>
</div>
<div class="modal  modal-success  fade" id="mosayer_details" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="mosayer_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled"
                        onclick="$('#mosayer_details').modal('hide')"><span class="btn-label"><i
                                class="glyphicon glyphicon-remove"></i></span> إغلاق
                </button>

            </div>

        </div>
    </div>
</div>


<div class="modal  modal-success  fade" id="motab3a_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="motab3a_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" onclick="$('#motab3a_details').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق
                </button>

            </div>

        </div>
    </div>
</div>


<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#detailsModal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">الطباعة</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" onclick="print_()" class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsModal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->
<script>
    /*function print_hidden(value) {

        $('#result').html('<input  type="hidden" name="agaza_rkm" id="agaza_rkm" value="'+value+'">');

    }*/
    function print_(value) {
        var mosayer_rkm = value;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/Employee_salaries/print_transformation/'?>",
            type: "POST",
            data: {
                mosayer_rkm: mosayer_rkm
            },
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>


<script type="text/javascript">
    function transformRequest(level, mosayer_rkm, fromUser, toUser) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/Get_load_page',
            data: {
                <?php if ((isset($tab_id)) && (!empty($tab_id)) ) {?>
                from_profile: 1,
                <?php }?>
                level: level,
                mosayer_rkm: mosayer_rkm,
                fromUser: fromUser,
                toUser: toUser
            },
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transformRequest").html(html);
            }
        });

    }

    function make_transformRequest(mosayer_rkm) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/Get_transformation_form',
            data: {
                <?php if ((isset($tab_id)) && (!empty($tab_id)) ) {?>
                from_profile: 1,
                <?php }?>
                mosayer_rkm: mosayer_rkm
            },
            cache: false,
            success: function (html) {
                $("#transformRequest").html(html);
            }
        });

    }
</script>


<script type="text/javascript">
    function transformDetails(value) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/Get_transformDetails',
            data: {
                mosayer_rkm: value
            },
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transform_details_div").html(html);
            }
        });

    } function mosayer_details(value) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/mosayer_details',
            data: {
                mosayer_rkm: value
            },
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#mosayer_details_div").html(html);
            }
        });

    }
</script>


<script type="text/javascript">
    function motab3a_details(value) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/motab3a_details',
            data: {
                mosayer_rkm: value
            },
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#motab3a_details_div").html(html);
            }
        });

    }
</script>
