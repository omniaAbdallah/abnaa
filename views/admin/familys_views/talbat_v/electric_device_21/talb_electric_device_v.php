<style>
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
    }
    .box-footer {
        float:right;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff;
    }
    .mailbox-attachment-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        padding: 20px 10px;
    }
    .mailbox-attachment-icon, .mailbox-attachment-info, .mailbox-attachment-size {
        display: block;
    }
    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }
    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .mailbox-attachment-icon.has-img > img {
        max-width: 100%;
        height: 115px;
        width: -webkit-fill-available;
    }
    
        .cke_toolbar_break {
        display: none;
        clear: left;
    }
    .info{
        width: 10% !important;
        background-color: #e4e4e4 !important;
    }
    .table>thead>tr>td.info, 
    .table>tbody>tr>td.info,
     .table>tfoot>tr>td.info, 
     .table>thead>tr>th.info, 
     .table>tbody>tr>th.info, 
     .table>tfoot>tr>th.info,
      .table>thead>tr.info>td,
       .table>tbody>tr.info>td,
        .table>tfoot>tr.info>td,
         .table>thead>tr.info>th, 
         .table>tbody>tr.info>th, 
         .table>tfoot>tr.info>th{
                border-top: 1px solid #ffffff !important;
    border-right: 1px solid #ffffff !important;
    background-color: #e4e4e4 !important;
    color: black !important;
    font-size: 15px !important;
         }
        .infotd{
            width: 27%;
                background: #f7f7f7 !important;
        } 
        .table-bordered.bor >
         thead > tr > th, 
         .table-bordered > tbody > tr > th,
          .table-bordered.bor > tfoot > tr > th,
           .table-bordered > thead > tr > td,
            .table-bordered.bor > tbody > tr > td,
             .table-bordered > tfoot > tr > td{
                border: none !important;
             }
</style>

<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (!empty($result)) {
                echo form_open_multipart('family_controllers/talbat/Talb_electric_device/update/' . $id, array('id' => 'myform'));
                $talab_date = $result['talab_date_ar'];
                $file_num = $result['file_num'];
                $mokadem_name = $result['mokadem_name'];
                $type_device_id_fk=$result['type_device_id_fk'];
                $mobrerat_id_fk=$result['mobrerat_id_fk'];
                $num=$result['num'];
                $wasf=$result['wasf'];
            } else {
                echo form_open_multipart('family_controllers/talbat/Talb_electric_device/insert', array('id' => 'myform'));
                $talab_date = date('Y-m-d');
                $file_num = "";
                $mokadem_name = "";
              
               
                $type_device_id_fk="";
                $mobrerat_id_fk="";
                $num="";
                $wasf="";
            }
            ?>
            <div class="col-sm-8 form-group">
            <div class="col-sm-12">
           
                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label  "> رقم الطلب </label>
                    <input type="text" name="" class="form-control" disabled="">
                </div>

                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label  "> تاريخ الطلب </label>
                    <input type="date" name="talab_date" class="form-control "
                           value="<?php echo $talab_date; ?>">
                </div>
                
                     <div class="col-sm-3  col-md-4 padding-4 ">
                    <label class="label  "> فئة الخدمة </label>
                    <select type="text" class="form-control " name="type_device_id_fk"
                            data-validation="required">
                        <option value=""> إختر </option>
                          <option value=""> إختر </option>
                            <option value=""> إختر </option>
                    
                    </select>
                </div>
                
                
                     <div class="col-sm-4  col-md-4 padding-4 ">
                    <label class="label  "> نوع الخدمة  </label>
                    <select type="text" class="form-control " name="type_device_id_fk"
                            data-validation="required">
                        <option value=""> إختر </option>
                          <option value=""> إختر </option>
                            <option value=""> إختر </option>
                    
                    </select>
                </div>
                 </div>
                <div class="col-sm-12">
                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label  ">رقم الملف </label>
                    <input type="text" name="file_num" id="file_num" value="<?php echo $file_num; ?>"
                           ondblclick="$('#myModal').modal();load_table()" data-validation="required"
                           readonly
                           style="width: 74%;float: right"
                           class="form-control " value="" onblur="GetFamilyNum($(this).val());">
                    <button type="button" data-toggle="modal" data-target="#myModal"
                            onclick="load_table()"
                            class="btn btn-success btn-next" style="float: left;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="mother_national_num" id="mother_national_num" value="">
                    <input type="hidden" name="father_card" id="father_card" value="">
                </div>
                <div class="col-sm-3  col-md-5 padding-4 ">
                    <label class="label  "> مقدم الطلب </label>
                    <!-- <input type="text" name="mokadem_name" id="mokadem_name" value="<?php echo $mokadem_name; ?>"
                           class="form-control "> -->
                          

                           <input type="text"  name="mokadem_name" id="mokadem_name" list="cityname" data-validation="required" 
                           
                           class="form-control " value="<?php echo $mokadem_name; ?>">
  
                </div>
                



                  <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label  "> النوع </label>
                    <select type="text" class="form-control " name="type_device_id_fk"
                            data-validation="required">
                        <option value=""> إختر </option>
                        <?php foreach ($type_device as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                                <?php if ($type_device_id_fk == $cat->id) echo 'selected' ?>
                            ><?= $cat->title ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label  "> العدد </label>
                   
                          

                           <input type="number"  name="num" id="num"data-validation="required" 
                           
                           class="form-control " value="<?php echo $num; ?>">
  
                </div>
                </div>
                    <div class="col-sm-12">
                <div class="col-sm-3  col-md-8 padding-4 ">
                    <label class="label  "> الوصف </label>
                   
                          

                           <input type="text"  name="wasf" id="wasf" data-validation="required" 
                           
                           class="form-control " value="<?php echo $wasf; ?>">
  
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label  "> مبررات الطلب </label>
                    <select type="text" class="form-control " name="mobrerat_id_fk"
                            data-validation="required">
                        <option value=""> إختر </option>
                        <?php foreach ($mobrerat as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                                <?php if ($mobrerat_id_fk == $cat->id) echo 'selected' ?>
                            ><?= $cat->title ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                </div>
                   <div class="col-sm-12">
                                <div class="col-md-12 col-sm-12 padding-4">
                  <label class="label"> المرفقات</label>
                  <input type="file" name="file[]" id="file" multiple class="form-control" >

<span class="label label-danger">يمكنك رفع هنا أكثر من مرفق </span>

 </div></div>
                <!-- date -->
                <div id="get_osra_last_date">
                </div>

            



            </div>

            
           
            <div class="col-md-4 form-group" id="Details">
        <table class="table table-bordered ">
                            <tbody>
                            <tr>
                            <td style="background-color: #e4e4e4 !important;" colspan="6">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>

                            بيانات الأسرة </td>
                            </tr>
                            <tr >
                                <th class="info"><i class="fa fa-id-card-o" aria-hidden="true"></i> إسم  الأسرة</th>
                                <td class="infotd text-center">
                               <?php ?> 
                                <input type="hidden" class="form-control"  name="osra_name" value="<?php  ?>">
                                
                                </td>
                               
                              
                            </tr>
                            <tr>
                            <th class="info">
                                <i class="fa fa-file-o" aria-hidden="true"></i> رقم الملف</th>
                                <td class="infotd text-center">
                                <?php  ?>
                                <!-- <input type="text" class="form-control" readonly  value="<?php  ?>"> -->
                                </td>
                               
                            </tr>

                            <tr>

<th class="info"><i class="fa fa-phone-square" aria-hidden="true"></i> جوال التواصل</th>
<td class="infotd text-center">

 <?php  ?> 
<!-- <input type="text" readonly class="form-control" name="contact_mob" value="<?php ?>"> -->
</td>

</tr>
<tr>
<th class="info"> <i class="fa fa-file-o" aria-hidden="true"></i> الفئة</th>
                                <td class=" infotd text-center">
                            
                                <?php  ?>
                                </td>
                                </tr>
                                <tr>
                            <th class="info"><i class="fa fa-calendar-o" aria-hidden="true"></i> تاريخ التسجيل</th>
                            <td class="infotd text-center">
                                                    
                            </td>
                            </tr>
                            <tr>
                            <th class="info"> <i class="fa fa-users" aria-hidden="true"></i> عدد أفراد الأسرة</th>
                            <td class="infotd text-center">
                          
                          
                           
                            </td>
                            </tr>
</tbody>
      <tfoot>
    <tr>
      <td><button type="button" class="btn btn-sm btn-primary">تفاصيل وشروط الخدمة </button></td>
      <td><button type="button" class="btn btn-sm btn-success">تفاصيل ملف الأسرة </button></td>
    </tr>
  </tfoot>                    
                         
                      
                        </table>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- yara -->
<?php
                    if (isset($morfqat) && !empty($morfqat)) {?>
<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title">المرفقات</h3>
        </div>
        <div class="panel-body" id="morfaq_result">
<div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                    <?php
                    if (isset($morfqat) && !empty($morfqat)) {
                    $z = 1;
                    foreach ($morfqat as $row) { ?>
                        <li id="row_<?= $z ?>" >
                            <?php
                            $ext = pathinfo($row->file, PATHINFO_EXTENSION);
                            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                            if (in_array($ext, $img)) {
                                ?>
                                <span class="mailbox-attachment-icon has-img" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                    <img
                                            src="<?php if (file_exists('uploads/family_attached/osr_talbat_electric_device_files/'.$row->file)) {
                                                echo base_url() .'uploads/family_attached/osr_talbat_electric_device_files/'.$row->file;
                                            } ?> " alt="Attachment">
                                </span>
                                <div class="mailbox-attachment-info">
                                   
                                    <span class="mailbox-attachment-size">
                                       
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                        <i class=" fa fa-eye"></i></a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"
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
                                                        <img src="<?= base_url().'uploads/family_attached/osr_talbat_electric_device_files/'.$row->file?>"
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
                                        <a href="<?php echo base_url() . 'family_controllers/talbat/Talb_electric_device/download_file/' . $row->file.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                            <a href="#" onclick='
                                                    delete_morfq(<?= $row->id ?>,<?= $row->talab_rkm_fk ?>);' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                            <?php } elseif (in_array($ext, $file_exe)) {
                                $viewpdf = 0;
                                switch ($ext) {
                                    case 'doc':
                                    case 'docx':
                                        $extin = 'word';
                                        break;
                                    case 'xls':
                                    case 'xlsx':
                                        $extin = 'excel';
                                        break;
                                    case 'PDF':
                                    case 'pdf':
                                        $extin = 'pdf';
                                        $viewpdf = 1;
                                        break;
                                    case 'txt':
                                        $extin = 'text';
                                        break;
                                    case 'rar':
                                    case 'zip':
                                    case 'tar.gz':
                                    case 'gz':
                                        $extin = 'archive';
                                        break;
                                    default:
                                        $extin = '';
                                        break;
                                } ?>
                                <span class="mailbox-attachment-icon">
                                    <i class="fa fa-file-<?= $extin ?>-o"></i>
                                </span>
                                <div class="mailbox-attachment-info">
                                   
                                    <span class="mailbox-attachment-size">
                                       
                                        <?php if($viewpdf == 1){ ?>
                                            <a data-toggle="modal" data-target="#myModal-pdf-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                            <i class=" fa fa-eye"></i></a>
                                            <!-- start modal view pdf -->
                                            <div class="modal fade" id="myModal-pdf-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="<?php echo base_url() . 'family_controllers/talbat/Talb_electric_device/read_file/' . $row->file ?>" style="width: 100%; height:  640px;" frameborder="0"> </iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal view pdf -->
                                        <?php } ?>
                                        <a href="<?php echo base_url() . 'family_controllers/talbat/Talb_electric_device/download_file/' . $row->file.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                        <a href="#" onclick='
                                                    delete_morfq(<?= $row->id ?>,<?= $row->talab_rkm_fk ?>);' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                                <?php
                            } ?>
                        </li>
                    <?php $z++; } } ?>
                </ul>
            </div>

            </div>
            </div>
            </div>
            <?php }?>
            <!--  -->
<div class="modal fade" id="myModalInfo_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">افراد الاسرة</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <table class="table ">
                        <tbody id="family_member_body">
                        <tr>
                            <td><input type="radio" name="member" onclick="$('#responsable_name').val()"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<?php
/*
echo'<pre>';
print_r($records);*/
if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> طلبات الاجهزة الكهربائية</h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th width="2%">م</th>
                        <th class="text-center">رقم الطلب</th>
                        <th class="text-center"> تاريخ الطلب</th>
                        <th class="text-center">وقت الطلب</th>
                        <th class="text-center">رقم الملف</th>
                        <th class="text-center">إسم الأب</th>
                        <th class="text-center">الطلب مقدم بإسم</th>
                        <th class="text-center">مستقبل الطلب</th>
                        <th class="text-center">حالة الطلب</th>

                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        if ($value->suspend == 1) {
                            $halet_talab = 'تم القبول ';
                            $halet_talab_color = '#75f5a2';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-check-circle-o" aria-hidden="true"></i>';
                        } elseif ($value->suspend == 2) {
                            $halet_talab = 'تم الرفض ';
                            $halet_talab_color = '#f15858';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-thumbs-o-down" aria-hidden="true"></i>';
                        } elseif ($value->suspend == 4) {
                            $halet_talab = 'تم الإعتماد ';
                            $halet_talab_color = '#6ec015';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-thumbs-o-up" aria-hidden="true"></i>';

                        } else {
                            $halet_talab = 'جاري';
                            $halet_talab_color = '#c2c4c5';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-circle-o-notch" aria-hidden="true"></i>';
                        }

                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?= $value->rkm_talab ?></td>
                            <td><?= $value->talab_date_ar ?></td>
                            <td style="background: #e691b8;color: #000000;font-weight: bold;"><?= $value->talab_time ?></td>

                            <td style="background: #74b9b1;"><?= $value->file_num ?></td>
                            <td style="background: #74b9b1;"><?= $value->osra_name ?></td>

                            <td style="background: #74b9b1;"><?php echo $value->mokadem_name; ?></td>

                            <td style="background: khaki;"><?= $value->emp_add_n ?></td>
                            <td style="background:<?= $halet_talab_color ?>;"> <?= $halet_talab_icon ?> <?= $halet_talab ?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <!-- <a type="button"
                                       class="btn btn-sm btn-info" data-toggle="modal"
                                       data-target="#detailsModal" onclick="GetTransferPage(<?= $value->id ?>)"
                                       style="padding: 3px 5px;line-height: 1;">
                                        <i class="glyphicon glyphicon-list"></i>
                                    </a> -->
                                    <a onclick='swal({
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
                                            window.location="<?= base_url() . 'family_controllers/talbat/Talb_electric_device/edit/' . $value->id ?>";
                                            });'>
                                        <i class="fa fa-pencil"> </i></a>
                                    <?php if ($_SESSION['role_id_fk'] == 1) { ?>
                                        <a onclick=' swal({
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
                                                setTimeout(function(){window.location="<?= base_url() . 'family_controllers/talbat/Talb_electric_device/Delete/' . $value->id ?>";}, 500);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>

                                    <?php } else { ?>
                                    <?php } ?>
                                    <a target="_blank" onclick="print_contrat(<?=$value->id?>)"
                                       title="طباعه"><i class="fa fa-print"></i></a>
                                    <!-- attached -->
                                    <a onclick="get_attach_data(<?= $value->id ?>);"
                                        data-toggle="modal" data-target="#myModal_attache">
                                        <i class="fa fa-cloud-upload"></i>
                                    </a>

                                    <!-- attached -->

                                </div>
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
<!-- myModal_attache -->
<div class="modal" id="myModal_attache" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    أضافة مرفقات
                </h4>
            </div>
            <div class="modal-body">
                <div id="result_attach"></div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i
                                class="fa fa-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- myModal_attache -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body col-sm-12" id="detail_div">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ملفات الأسر </h4>
            </div>
            <div class="modal-body" id="json_table">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<?php if(isset($result) &&!empty($result))
{?>
<script>
 $(document).ready(function () {
        console.log('document ready');
       GetNamozegDiv();
        console.log('document ready');
    });
</script>
<?php }?>
<script>
    function load_table() {
        var html;
        html = '<div class="col-md-12"><table id="my_table" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 30px;">م</th><th style="width: 50px;"> رقم الملف </th><th style="width: 80px;"> إسم رب الأسرة </th><th style="width: 50px;" >رقم الهوية</th>' +
            '<th style="width: 80px;"> إسم الأم </th><th style="width: 50px;"> رقم الهوية </th></tr></thead><table><div id="dataMember"></div></div>';
        $("#json_table").html(html);
        $('#my_table').show();
        var oTable_usergroup = $('#my_table').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/talbat/Talb_electric_device/getFamilyTable',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],
            buttons: [
                'pageLength',
                'copy',
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
            colReorder: true,
            destroy: true
        });
    }
</script>
<script>
    function getFile_num(value) {
        $('#file_num').val(value);
        console.log($('#radio' + value).attr('data-father'));
       $('#mokadem_name').val();
       getselect();
       get_osra_last_date();
        $('#mother_national_num').val($('#radio' + value).attr('data-mother'));
        $('#father_card').val($('#radio' + value).attr('data-father-card'));
        $('#myModal').modal('hide');
        GetNamozegDiv();
    }
</script>
<!-- get_osra_last_date -->
<script>
    function get_osra_last_date() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/get_osra_last_date',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    console.log(html);
                    //$("#mokadem_name").html(html);
                    $('#get_osra_last_date').html(html);
                   
                }
            });
        }
    }
</script>
<script>
    function getselect() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/getselect',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    console.log(html);
                    //$("#mokadem_name").html(html);
                    $('#mokadem_name').append(html);
                   
                }
            });
        }
    }
</script>

<script>
    function GetNamozegDiv() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/getDetails',
                data: $('#myform').serialize() + "&" + dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#Details").html(html);
                    /* function replaceMulti(haystack, needle, replacement)
                      {
                          return haystack.split(needle).join(replacement);
                      }
                      someString = $('.content_view').text();
                    //  console.log(replaceMulti(someString, 'أبنـاء', 'dog'));
                      $('.content_view').text(replaceMulti($('.content_view').text(), 'X', $('#father_name').val()));
                      $('.content_view').text(replaceMulti($('.content_view').text(), 'B', $('#file_num').val()));
                       $('.content_view').text( replaceMulti($('.content_view').text(), 'C', $('#father_card').val()));
  */
                }
            });
        }
    }
</script>
<script>
    function GetFamilyNum(code) {
        var dataString = 'file_num=' + code;
        if (code != '') {
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>family_controllers/namazegs/Namazeg/getFamilyNum',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject['final_suspend']);
                    /* if( parseInt(JSONObject['final_suspend'])!== 4  &&
                         parseInt(JSONObject['file_status'])!== 1&&
                         parseInt(JSONObject['final_suspend']) !==' '){*/
                    //  setTimeout(function(){
                    if (
                        code != ' ' &&
                        parseInt(JSONObject['file_status']) == 4
                    ) {
                        Swal.fire({
                            type: 'error',
                            title: 'عفواً',
                            text: 'هذا الملف غير نشط !!',
                            footer: ''
                        }).then((result) => {
                            if (result.value) {
                                $('#father_name').val("");
                                $('#file_num').val("");
                                $('#mother_national_num').val("");
                                $('#father_card').val("");
                            }
                        });
                    } else {
                        $('#father_name').val(JSONObject['father_full_name']);
                        $('#mother_national_num').val(JSONObject['mother_national_num']);
                        $('#father_card').val(JSONObject['father_national_num']);
                    }
                    // }, 100);
                }
            });
        }
    }
</script>
<script>
    function details(value) {
        if (value != 0 && value != '') {
            var dataString = 'rkm=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/getDetailsDiv',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }
</script>
<!-- myModal_attache -->
<script>
    function get_attach_data(id) {
        var dataString = "id=" + id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/add_picture',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#result_attach").html(html);
            }
        });
    }
</script>
<script>
    function GetTransferPage(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/GetTransferPage',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }
</script>
<script>
    function print_contrat(id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'family_controllers/talbat/Talb_electric_device/print/'?>" + id,
            type: "get",
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.focus();

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<script>
  function delete_morfq(id,row) {
    swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم!",
  cancelButtonText: "لا!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/delete_morfq',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
             // $('#Modal_esdar').modal('hide');
              swal({
                  title: "تم الحذف بنجاح!",
  }
  );
  console.log(row);
  get_details(row);
          }
      });
    } else {
    swal("تم الالغاء","", "error");
  }
});
  }
</script>
<script>
    function get_details(id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>family_controllers/talbat/Talb_electric_device/load",
            beforeSend: function () {
                $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#morfaq_result').html(d);
            }
        });
    }
</script>