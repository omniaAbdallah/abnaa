<style>
    .latest_notification .nav-tabs > li > a {
        margin-left: 10px;
    }

    .latest_notification .badge {
        position: absolute;
        top: 3px;
        left: -7px;
    }

    .latest_notification .btn-group > .btn {
        height: 22px;
        line-height: 10px;
    }

    .active .badge {
        color: #ffffff !important;
    }

    .panel-footer {
        display: inline-block;
        width: 100%;
    }

    .detailswork span.label {
        width: 100px;
    }

    .detailswork a {
        font-size: 16px;
    }

    .detailswork p {
        font-size: 16px;
    }

    .work-touchpoint-date .month {
        font-size: 10px;
        background-color: #fcb632;
    }

    .panel-body {
        border: 1px solid #eee;
    }
</style>
<?php
switch ($type) {
    case 1:
        $text_title = 'طلبات التطوع';
        $data_table = $newVolunteers;
        break;
    case 2:
        $text_title = ' طلبات التطوع المرفوضة';
        $data_table = $refusedVolunteers;

        break;

    default:
        $text_title = 'طلبات التطوع';


        break;

}
?>
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $text_title ?></h4>
            </div>
        </div>
        <div class="panel-body">


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-10">


                    <!-- Nav tabs
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#dash_tab1" aria-controls="home"
                                                                  role="dash_tab1" data-toggle="tab"><i
                                        class="fa fa-bell-o"></i> تنبيهات جديدة</a></li>
                        <li role="presentation"><a href="#dash_tab2" aria-controls="dash_tab2" role="tab"
                                                   data-toggle="tab"><i class="fa fa-thumb-tack"></i> طلبات موافق عليها
                            </a></li>
                        <li role="presentation"><a href="#dash_tab3" aria-controls="dash_tab3" role="tab"
                                                   data-toggle="tab"><i class="fa fa-retweet"></i> طلبات مرفوضة </a>
                        </li>

                    </ul>

                     Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="dash_tab1">

                            <div class="col-xs-12 no-padding">
                                <?php if (isset($data_table) && $data_table != null){ ?>
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th>رقم الطلب</th>
                                        <th>تاريخ الطلب</th>
                                        <th>الفئة</th>
                                        <th>الاسم</th>
                                        <th>رقم الهوية /السجل</th>
                                        <th>رقم الجوال</th>
                                        <th>تسجيل عبر</th>
                                        <th> القائم بالتسجيل</th>
                                        <th>الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $x = 1;
                                    foreach ($data_table as $value) { ?>
                                    <tr>
                                        <td><?= ($x++) ?></td>
                                        <td><?= $value->talb_num ?></td>
                                        <td><?= $value->talb_date ?></td>
                                        <td><?php if (isset($value->f2a_talab) && ($value->f2a_talab == 1)) {
                                                echo 'فرد';
                                            } elseif ($value->f2a_talab == 2) {
                                                echo 'جهه';
                                            } ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->id_card ?></td>
                                        <td><?= $value->mobile ?></td>

                                        <td><?php if (isset($value->web_registration) && ($value->web_registration == 1)) {
                                                echo 'البوابة';
                                            } elseif ($value->web_registration == 0) {
                                                echo 'البرنامج';
                                            } ?></td>
                                        <td><?= $value->publisher_name ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning">إجراءات</button>
                                                <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <?php if ($type == 1) { ?>

                                                        <li><a href="#" onclick='swal({
                                                                    title: "هل انت متأكد من التعديل ؟",
                                                                    text: "",
                                                                    type: "warning",
                                                                    showCancelButton: true,
                                                                    confirmButtonClass: "btn-warning",
                                                                    confirmButtonText: "تعديل",
                                                                    cancelButtonText: "إلغاء",
                                                                    closeOnConfirm: false
                                                                    },
                                                                    function(){
                                                                    window.location="<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/edit_volunteer/<?php echo $value->id; ?>";
                                                                    });'>
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a>
                                                        </li>
                                                        <li><a href="#" onclick='swal({
                                                                    title: "هل انت متأكد من الحذف ؟",
                                                                    text: "",
                                                                    type: "warning",
                                                                    showCancelButton: true,
                                                                    confirmButtonClass: "btn-danger",
                                                                    confirmButtonText: "حذف",
                                                                    cancelButtonText: "إلغاء",
                                                                    closeOnConfirm: false
                                                                    },
                                                                    function(){
                                                                    swal("تم الحذف!", "", "success");
                                                                    window.location="<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/delete/<?php echo $value->id; ?>";
                                                                    });'>
                                                                <i class="fa fa-trash"> </i>حذف</a></li>

                                                        <li>
                                                            <a aria-hidden="true"
                                                               data-toggle="modal"
                                                               data-target="#myModal_reason_end<?= $value->id ?>"><i
                                                                        class="fa fa-archive"> </i> اعتماد المتطوع</a>
                                                        </li>
                                                        <!--                                            Nagwa 23-3 -->
                                                        <!-- <li><a title="عرض المرفق" href="#" data-toggle="modal"
                                                               data-target="#Modal_attach"
                                                               onclick="load_all_attach(<?= $value->id; ?>)"> <i
                                                                        class="fa fa-upload" aria-hidden="true"></i>
                                                                اضافه
                                                                مرفقات</a>
                                                        </li> -->

                                                        <li><a title="عرض المرفق"
                           href="<?=base_url()?>human_resources/tataw3/Tataw3_c/add_attach/<?=$value->id ?>" >
                            <i class="fa fa-upload" aria-hidden="true"></i> اضافة مرفقات </a>
                    </li>
                                                    <?php } ?>
                                                    <li><a href="#modal_details" data-toggle="modal"
                                                           onclick="get_details(<?php echo $value->id; ?>)"> <i
                                                                    class=" fa fa-eye"></i>تفاصيل</a></li>

                                                                    <li><a href="<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/interview_volunteer/<?php echo $value->id; ?>"
                                                                   >
                                                                <i class="fa fa-list" aria-hidden="true"></i>المقابلة الشخصية</a>
                                                        </li>


                                                </ul>
                                            </div>


                                        </td>
                                    </tr>
                                    <!--  -->
                                    <div class="modal fade" id="myModal_reason_end<?= $value->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document" style="width: 80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title title "> اعتماد المتطوع </h4>
                                                </div>
                                                <div class="modal-body" style="
    height: 171px;
">
                                                    <div class="form-group col-sm-12">

                                                        <?php echo form_open_multipart('human_resources/tataw3/Tataw3_c/add_confirm'); ?>
                                                        <div class="form-group col-md-12 col-sm-6 padding-4">
                                                            <label class="label"> 
                                                            :الاجراء</label>
                                                            <div class="form-group">
                                                                <div class="radio-content">
                                                                    <input type="radio" id="esnad1<?= $value->id ?>"
                                                                           onchange=" get_reason_end(<?= $value->id ?>);"
                                                                           name="esnad_to" class="f2a_types" value="1">
                                                                    <label for="esnad1<?= $value->id ?>"
                                                                           class="radio-label"> موافقة المتطوع بالفرصة</label>
                                                                </div>
                                                                <div class="radio-content">
                                                                    <input type="radio" id="esnad2<?= $value->id ?>"
                                                                           name="esnad_to"
                                                                           onchange=" get_reason_end(<?= $value->id ?>);"
                                                                           class="f2a_types" value="2">
                                                                    <label for="esnad2<?= $value->id ?>"
                                                                           class="radio-label"> رفض  المتطوع بالفرصة </label>
                                                                </div>

                                                                <div class="radio-content">
                                                                    <input type="radio" id="esnad3<?= $value->id ?>"
                                                                           name="esnad_to"
                                                                           onchange=" get_reason_end(<?= $value->id ?>);"
                                                                           class="f2a_types" value="3">
                                                                    <label for="esnad3<?= $value->id ?>"
                                                                           class="radio-label"> إعتماد  المتطوع </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-sm-6 padding-4"
                                                        >
                                                            <label class="label  ">: سبب اعتماد </label>
                                                            <input type="text" name="reason_name" id="reason_name<?= $value->id ?>" value=""
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:100%;float: right;" 
                          
                           >
                                                            <!-- <input type="text" name="reason_name" id="reason_name<?= $value->id ?>" value=""
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:80%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); get_reason_end(<?= $value->id ?>);"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>  -->
                                                            <!-- <select name="reason_name" id="reason_name<?= $value->id ?>"
                                                                    class="form-control "
                                                                    onchange="($('#reason_id_fk<?= $value->id ?>').val($('option:selected',this).text()))"
                                                            >


                                                            </select> -->
                                                            <!-- <input type="hidden" name="reason_id_fk"
                                                                   id="reason_id_fk<?= $value->id ?>" value=""> -->

                                                            <!-- <button type="button" data-toggle="modal" data-target="#myModal_end<?= $value->id ?>"
                    onclick="get_reason_end(<?= $value->id ?>);"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button> -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" id="id<?= $value->id ?>"
                                                           value="<?= $value->id ?>">

                                                    <button type="button" class="btn btn-labeled btn-success " onclick=" add_reason(<?= $value->id ?>) "
                                                            name="add" value="add" > <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
                                                            حفظ
                                                    </button>
                                                    <!-- 	<button type="submit" name="refuse" value="3" class="btn btn-danger">مرفوض</button> -->
                                                    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                    </button>
                                                    <!-- <button type="button"
                                class="btn btn-labeled btn-success "  onclick="add_reason(<?= $value->id ?>)"
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button> -->
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!--  -->
                                    <div class="modal fade" id="myModal_end<?= $value->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document" style="width: 80%">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title"> اسباب الاعتماد :
                                                    </h4>
                                                </div>
                                                <div class="modal-body">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>                                <!--  -->
                            <?php } ?>
                            </tbody>
                            </table>
                            <?php } else { ?>
                                <div class="alert alert-danger">لا توجد طلبات واردة</div>
                            <?php } ?>
                        </div>


                        <?php /* ?>
                    <div role="tabpanel" class="tab-pane" id="dash_tab2">

                        <div class="col-xs-12 no-padding">
                            <?php if (isset($acceptedVolunteers) && $acceptedVolunteers != null) { ?>
                                <table id="" class=" example table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الإسم</th>
                                        <th>الهاتف</th>
                                        <th>المدينه</th>
                                        <th>الحي</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>التفاصيل</th>
                                        <th>القائم بالموافقه</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($acceptedVolunteers as $value) {
                                        ?>
                                        <tr>
                                            <td><?= ($x++) ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->mobile ?></td>
                                            <td><?= $value->city_name ?></td>
                                            <td><?= $value->hai_name ?></td>
                                            <td><?= $value->email ?></td>
                                            <td>
                                                <a href="#modal_details" data-toggle="modal"
                                                   onclick="get_details(<?php echo $value->id; ?>)"> <i
                                                            class="btn fa fa-list"></i></a>
                                            </td>
                                            <td>
                                                <?= $value->suspend_publisher_name ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="alert alert-danger">لا توجد طلبات موافق عليها</div>
                            <?php } ?>

                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="dash_tab3">
                        <div class="col-xs-12 no-padding">
                            <?php if (isset($refusedVolunteers) && $refusedVolunteers != null) { ?>
                                <table id="exampleee" class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الإسم</th>
                                        <th>الهاتف</th>
                                        <th>المدينه</th>
                                        <th>الحي</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>التفاصيل</th>
                                        <th>القائم بالرفض</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($refusedVolunteers as $value) {
                                        ?>
                                        <tr>
                                            <td><?= ($x++) ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->mobile ?></td>
                                            <td><?= $value->city_name ?></td>
                                            <td><?= $value->hai_name ?></td>
                                            <td><?= $value->email ?></td>
                                            <td>
                                                <a href="#modal_details" data-toggle="modal"
                                                   onclick="get_details(<?php echo $value->id; ?>)"> <i
                                                            class="btn fa fa-list"></i></a>
                                            </td>
                                            <td>
                                                <?= $value->suspend_publisher_name ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="alert alert-danger">لا توجد طلبات مرفوضة</div>
                            <?php } ?>

                        </div>
                    </div>
<?php */ ?>


                </div>


            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">تفاصيل </h4>
                </div>
                <div class="modal-body" id="details"></div>
                <div class="modal-footer" style="display: inline-block;width: 100%">

                    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!--    Nagwa 23-3 -->
    <!--    Modal_attach -->
    <div class="modal fade" id="Modal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title "> المرفقات </h4>
                </div>
                <div class="modal-body" id="attach_result">
                    <div class="container-fluid">
                        <div id="morfq_show">
                            <div class="col-sm-12 form-group">
                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-3  col-md-3 padding-4 ">
                                        <input type="hidden" class="form-control" id="tat_id_fk" value="">

                                        <button type="button" class="btn btn-labeled btn-success "
                                                onclick="$('#morfaq_input').show(); "
                                                style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                            <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                            اضافه مرفق جديد
                                        </button>

                                    </div>
                                </div>
                                <div class="col-sm-12 no-padding form-group">

                                    <div id="morfaq_input" style="display: none">
                                        <div class="col-sm-3  col-md-3 padding-2 ">

                                            <label class="label   ">اسم المرفق </label>

                                            <input type="text" class="form-control  testButton inputclass"
                                                   name="title_m" id="title_m"
                                                   readonly="readonly"
                                                   onclick="$('#settingModal').modal('show');"
                                                   style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                                                   value="">
                                            <!--                                    <input type="hidden" name="title_m_id" id="title_m_id" value="">-->

                                            <button type="button"
                                                    onclick="$('#settingModal').modal('show');"
                                                    class="btn btn-success btn-next">
                                                <i class="fa fa-plus"></i></button>

                                        </div>
                                        <div class="col-sm-3  col-md-3 padding-2 ">
                                            <label class="label   "> المرفق </label>
                                            <input type="file" name="file_attached[]" id="file_attached"
                                                   data-validation="required"
                                                   value=""
                                                   class="form-control ">

                                        </div>
                                        <div class="col-sm-3  col-md-3 padding-4" id="div_add_morfq"
                                             style="display: block;">
                                            <button type="button" onclick="upload_img($('#tat_id_fk').val())"
                                                    style="    margin-top: 27px;"
                                                    class="btn btn-labeled btn-success" name="save" value="save">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>

                                    </div>

                                </div>
                                <br>
                                <br>
                            </div>

                            <div id="myDiv_morfq">


                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--    Modal_attach -->

    <!-- settingModal  -->

    <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title title ">المرفقات</h4>
                </div>
                <div class="modal-body">

                    <?php
                    if (isset($morfaq_names) && !empty($morfaq_names)) {
                        ?>

                        <table id="" class="table example  table-bordered table-striped table-hover">
                            <thead>
                            <tr class="greentd">
                                <th>#</th>
                                <th>اسم المرفق</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($morfaq_names as $item) {
                                ?>
                                <tr>

                                    <td><input style="width: 90px;height: 20px;" type="radio" name="check_m"
                                               id="check_id<?= $item->id ?>"
                                               ondblclick="GetName(<?= $item->id ?>,'<?= $item->title ?>')">
                                    </td>
                                    <td><?= $item->title ?></td>

                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>

                        </table>

                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger">عفوا... لا توجد بيانات !</div>
                        <?php
                    }
                    ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- settingModal  -->
    <!-- modal view -->
    <div class="modal fade" id="myModal-view" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                </div>
                <div class="modal-body">
                    <img id="imagee" src=""
                         width="100%" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal view -->
    <div class="modal fade" id="myModal-pdf" tabindex="-1"

         role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal"

                            aria-label="Close"><span aria-hidden="true">&times;</span>

                    </button>

                    <h4 class="modal-title" id="myModalLabel">الملف</h4>

                </div>

                <div class="modal-body">

                    <iframe id="m_pdf" src="" style="width: 100%; height:  640px;" frameborder="0"></iframe>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">

                        إغلاق

                    </button>

                </div>

            </div>

        </div>

    </div>
    <script>
        function get_image(url) {
            var path = "<?= base_url() . 'uploads/human_resources/tato3/morfqat/'?>" + url;
            $('#imagee').attr('src', path);

        }
    </script>
    <script>
        function get_pdf(url) {
            var path = "<?= base_url() . 'human_resources/tataw3/Tataw3_c/read_morfq/'?>" + url;
            $('#m_pdf').attr('src', path);

        }
    </script>

    <script>
        function GetName(id, name) {
            $('#title_m').val(name);

            $('#settingModal').modal('hide');

        }
    </script>

    <script>
        function load_all_attach(tat_id_fk) {
            $('#tat_id_fk').val(tat_id_fk);

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/tataw3/Tataw3_c/load',
                data: {id: tat_id_fk},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#myDiv_morfq').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (html) {

                    //    $('#attach_result').html(html);
                    $('#myDiv_morfq').html(html);


                }
            });

        }
    </script>
    <script>

        function upload_img(tat_id_fk) {

            var files = $('#file_attached')[0].files;
            //  console.log(files);
            var title = $('#title_m').val();

            // alert(title);
            // var tat_id_fk = $('#row').val();
            var error = '';
            var form_data = new FormData();

            for (var count = 0; count < files.length; count++) {
                var name = files[count].name;

                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'PNG', 'jpeg', 'pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt']) == -1) {
                    error += "Invalid " + count + " Image File"
                } else {
                    form_data.append("files[]", files[count]);
                    form_data.append("title", title);
                    form_data.append("tat_id_fk", tat_id_fk);
                }
            }

            if (title != '' && files.length != 0) {
                if (error == '') {

                    $.ajax({
                        url: "<?php echo base_url(); ?>human_resources/tataw3/Tataw3_c/upload_morfaq",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#myDiv_morfq').html(
                                '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                            );
                            swal({
                                title: "جاري الحفظ ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (data) {


                            $('#title_m').val('');
                            $('#file_attached').val('');
                            $("input:radio").removeAttr("checked");
                            $('#myDiv_morfq').html(data);
                            //  swal("تم الاضافه بنجاح !");
                            swal({
                                title: 'تم اضافة  بنجاح',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });

                        }
                    });


                }
            } else {
                // alert('من فضلك تأكد الحقول الناقصه ! ');
                swal({
                    title: "من فضلك تأكد من الحقول الناقصه ! ",
                    type: "warning",
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "تم"
                });
            }


        }


    </script>
    <!--Nagwa 23-3 -->

    <script>
        function get_reason_end(id) {
            // $('#pop_rkm').text(rkm);
            var type = $('input[name=esnad_to]:checked').val();
            $.ajax({
                type: 'post',
                data: {type: type, id: id},
                url: "<?php echo base_url();?>human_resources/tataw3/Tataw3_c/load_reason",
                beforeSend: function () {
                    $('#reason_name' + id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#reason_name' + id).html(d);
                }
            });
        }
    </script>
    <script>
        function getTitle_reason(id, tat_id, value) {
            $('#reason_id_fk' + tat_id).val(id);
            $('#reason_name' + tat_id).val(value);
            $('#myModal_end' + tat_id).modal('hide');
        }
    </script>
    <script>
        function get_details(valu) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/tataw3/Tataw3_c/get_details",
                data: {rkm: valu},
                beforeSend: function () {
                    $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {

                    $('#details').html(d);

                }
            });
        }
    </script>
    <script>
        $('#exampleee').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true
        });

    </script>

    <script>
        function add_reason(id) {
            var id = id;
           // var reason_id_fk = $('#reason_name' + id).val();
            var reason_name = $('#reason_name' + id).val();
            var esnad_to = $('input[name=esnad_to]:checked').val();
            if ( reason_name != 0 && reason_name != '') {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>human_resources/tataw3/Tataw3_c/add_confirm',
                    data: {id: id, reason_name: reason_name, esnad_to: esnad_to},
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $('#myModal_reason_end' + id).modal('hide');
                        swal({
                                title: "تم انهاء المعامله بنجاح!",
                            }
                        );
                        window.location.reload();
                    }
                });
            } else {
                swal({
                        title: "برجاء ادخال البيانات!",
                    }
                );
            }
        }
    </script>