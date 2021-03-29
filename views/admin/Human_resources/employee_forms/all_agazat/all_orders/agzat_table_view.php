<?php
/*
echo '<pre>';
print_r($items);*/
if (isset($items) && !empty($items)) {
    ?>
    <div class="col-sm-12 no-padding ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>رقم الطلب</th>
                    <th>تاريخ الطلب</th>
                    <th>مقدم الطلب</th>
                    <th>نوع الاجازه</th>
                    <th>بدايه الاجازه</th>
                    <th>نهايه الاجازه</th>
                    <th>عدد الايام المطلوبه</th>
                    <th> الاجراء</th>
                    <th> الطلب الان عند</th>
                    <th>حاله الطلب</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($items) && !empty($items)) {
                    $x = 1;
                    foreach ($items as $row) {
                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edite_agaza(' . $row->id . ')';
                            $link_delete = 1;
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/edit_vacation/' . $row->id . '";';
                            $link_delete = 0;
                        }
                        if ($row->suspend == 0) {
                            $halet_eltalab = 'جاري ';
                            $halet_eltalab_class = 'warning';
                        } elseif ($row->suspend == 1) {
                            // $halet_eltalab = ' تم قبول الطلب من ' . $row->current_from_user_name;
                            $halet_eltalab = 'تم القبول';
                            $halet_eltalab_class = 'success';
                        } elseif ($row->suspend == 2) {
                            //  $halet_eltalab = ' تم رفض الطلب من ' . $row->current_from_user_name;
                            $halet_eltalab = ' تم الرفض ';
                            $halet_eltalab_class = 'danger';
                        } elseif ($row->suspend == 4) {
                            //    $halet_eltalab = ' تم اعتماد الطلب بالموافقة من  ' . $row->current_from_user_name;
                            $halet_eltalab = ' تم الإعتماد  ';
                            $halet_eltalab_class = 'success';
                        } elseif ($row->suspend == 5) {
                            // $halet_eltalab = ' تم اعتماد الطلب بالرفض  من ' . $row->current_from_user_name;
                            $halet_eltalab = ' تم الرفض ';
                            $halet_eltalab_class = 'danger';
                        } else {
                            $halet_eltalab = ' غير محدد ';
                            $halet_eltalab_class = 'danger';
                        }
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->agaza_rkm; ?></td>
                            <td><?php echo $row->agaza_date_ar; ?></td>
                            <td><?php echo $row->employee; ?></td>
                            <td><?php echo $row->name->name;
                                if (!empty($row->f2a_agaza)) {
                                    $vacations_f2a = array('1' => 'طارئة', "2" => "عادية");
                                    echo '-' . $vacations_f2a[$row->f2a_agaza];
                                } ?></td>
                            <td><?php echo $row->agaza_from_date_m; //explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1]; ?></td>
                            <td><?php echo $row->agaza_to_date_m //explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1]; ?></td>
                            <td><?php echo $row->num_days; ?></td>
                            <td>
                                <a type="button" class="btn btn-info btn-xs" style="padding: 1px 6px;"
                                   data-toggle="modal" title="التفاصيل"
                                   onclick="get_details_agaza(<?= $row->id ?>,'<?php echo $row->employee; ?>');"
                                   data-target="#myModal"> <i class="fa fa-list"></i>
                                </a>
                                <a title="طباعة الطلب" style="padding:1px 5px;"
                                   onclick="print_(<?= $row->agaza_rkm ?>)"><i class="fa fa-print "></i>
                                </a>
                                <?php
                                if (in_array($row->no3_agaza, array(3, 4))) {
                                    ?>
                                    <a title="عرض المرفق"
                                       onclick="load_add_morfaq(<?= $row->agaza_rkm ?>);$('#esal_id_morfaq').val(<?= $row->agaza_rkm ?>)"
                                       data-toggle="modal" data-target="#modal-add_morfaq">
                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>
                                <?php } ?>
                                <?php
                                if ($row->suspend == 0 and $_SESSION['user_id'] == 85) { ?>
                                    <a onclick='swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                    <?= $link_update ?>
                                            });'><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="<?= base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/delete_vacation/' . $row->id . '/' . $link_delete ?>";
                                            });'><i
                                                class="fa fa-trash"
                                                aria-hidden="true"></i>
                                    </a>
                                <?php } else { ?>
                                    <span class="label label-danger"> عذرا لا يمكنك التعديل والحذف</span>
                                <?php } ?>
                            </td>
                            <td><?php echo $row->current_to_user_name; ?></td>
                            <td>
                                <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                                <?php echo $halet_eltalab; ?>
                                 </span>
                            </td>
                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
<!--------------------------------------------------------modal------------------------------------>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 90%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModal').modal('hide')"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_h"></h4>
            </div>
            <div class="modal-body" id="details_agaza">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="float: left"
                        onclick="$('#myModal').modal('hide')">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModalInfo').modal('hide')"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الموظف البديل </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" onclick="$('#myModalInfo').modal('hide')">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------->
<div class="modal fade" id="modal-add_morfaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#modal-add_morfaq').modal('hide')"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة مرفقات</h4>
            </div>
            <div class="modal-body" id="my_morfaq_add">
            </div>
            <div class="modal-footer" style="display:inline-block; width:100%">
                <button type="button" class="btn btn-default" onclick="$('#modal-add_morfaq').modal('hide')">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_details_agaza(id, name) {
        $('#myModalLabel_h').text(name);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_details_agaza",
            data: {id: id},
            beforeSend: function () {
                $('#details_agaza').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_agaza').html(d);
            }
        });
    }
</script>
<script>
    function load_add_morfaq(agaza_rkm) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_orders/Vacation/add_attach',
            data: {
                agaza_rkm: agaza_rkm
                <?php
                if (isset($_POST['from_profile'])) {
                ?>
                , from_profile: 1
                <?php } ?>
            },
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#my_morfaq_add').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#my_morfaq_add").html(html);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<script>
    function print_(value) {
        var agaza_rkm = value;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/print_transformation/'?>",
            type: "POST",
            data: {
                agaza_rkm: agaza_rkm
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
