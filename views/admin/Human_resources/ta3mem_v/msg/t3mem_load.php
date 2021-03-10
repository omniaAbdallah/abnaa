<?php if (isset($records) && $records != null && !empty($records)) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> إدارة الرسائل</h3>
            </div>
            <div class="panel-body">
                <table id="example" class=" table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center">تاريخ الرسالة</th>
                        <th class="text-center">عنوان الرسالة</th>
                        <!-- <th class="text-center">  ارسال الي</th> -->
                        <th class="text-center"> صوره الرسالة</th>
                        <!-- <th class="text-center"> مرفق التعميم</th> -->
                        <th class="text-center">المشاهدة</th>
                        <th class="text-center">وقت المشاهدة</th>
                        <th class="text-center">تاريخ المشاهدة</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?= $value->msg_date ?></td>
                            <td><?= $value->msg_title ?></td>
                            <td>
                                <?php
                                $file = $value->img;
                                if (!empty($file)) {
                                    ?>
                                    <?php
                                    $type = pathinfo($file)['extension'];
                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                    if (in_array($type, $arry_images)) {
                                        ?>
                                        <?php if (!empty($file)) {
                                            $url = base_url() . 'uploads/human_resources/ta3mem/' . $file;
                                        } else {
                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                        } ?>
                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                            <i class=" fa fa-eye"></i>
                                        </a>
                                        <?php
                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                        ?>
                                        <?php if (!empty($file)) {
                                            $url = base_url() . 'human_resources/ta3mem/Ta3mem_c/read_file/' . $file;
                                        } else {
                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                        } ?>
                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                            <i class=" fa fa-eye"></i>
                                        </a>
                                        <?php
                                    }
                                } else {
                                    echo 'لا يوجد';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($value->seen !=0) {
                                    echo "
                                    <span style='
                                    background-color: green;
                                    '>
                                    تمت المشاهدة <i class='fa fa-wrong'> </i></span>";
                                } else {
                                    echo " <span style='
                                    background-color: red;
                                    '>لم تتم المشاهدة</span>";
                                }
                                ?></td>
                            <td><?php
                                if (!empty($value->seen_date)) {
                                    echo $value->seen_date;
                                } else {
                                    echo 'غير محدد';
                                } ?></td>
                            <td>
                                <?php
                                if (!empty($value->seen_time)) {
                                    echo $value->seen_time;
                                } else {
                                    echo 'غير محدد';
                                } ?></td>
                            <td style="width: 200px">
                                <a onclick="get_all_data(<?= $value->id; ?>)">
                                    <i class="fa fa-search"> </i>الاجراء </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<div class="modal fade" id="modalmsg_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#modalmsg_data').modal('hide')" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_header"></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="print_forma  col-xs-12 no-padding" id="result">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button"
                        class="btn btn-labeled btn-danger " onclick="$('#modalmsg_data').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_all_data(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/ta3mem/Ta3mem_msg_c_request/get_msg",
            data: {id: id},
            success: function (data) {
                if (data != '') {
                    $("#result").html(data);
                    $("#modalmsg_data").modal('show');
                }
            }
        });
    }
</script>

<script>
    function confirm_msg(id, action) {
        if (action == 'refuse') {
            //  $('#refuse_d3wa').show();
            swal({
                    title: "هل انت متاكد من العملية?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>human_resources/ta3mem/Ta3mem_msg_c_request/reply_dawa',
                            data: {id: id, action: action},
                            dataType: 'html',
                            cache: false,
                            beforeSend: function () {
                                swal({
                                    title: "جاري  ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            },
                            success: function (html) {
                                //   alert(html);
                                $('#dawa').modal('hide');
                                swal({
                                        title: "تم !",
                                    }
                                );
                                location.reload();
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
        } else {
            swal({
                    title: "هل انت متاكد من العملية?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>human_resources/ta3mem/Ta3mem_msg_c_request/reply_dawa',
                            data: {id: id, action: action},
                            dataType: 'html',
                            cache: false,
                            beforeSend: function () {
                                swal({
                                    title: "جاري  ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            },
                            success: function (html) {
                                //   alert(html);
                                $('#dawa').modal('hide');
                                swal({
                                        title: "تم !",
                                    }
                                );
                                location.reload();
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
        }
    }
</script>