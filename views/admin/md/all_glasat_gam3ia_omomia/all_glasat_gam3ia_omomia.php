<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>
        <div class="panel-body">
         <div class="col-sm-12  ">  
            <?php
            if (isset($galsa_member)){
            ?>
            <form action="<?php echo base_url(); ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa/<?php echo $this->uri->segment(5); ?>/
            <?php echo $this->uri->segment(6); ?>" method="post" id="form1">
                <?php } else{ ?>
                <form action="<?php echo base_url(); ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia"
                      method="post" id="form1">
                    <?php } ?>
                    <div class="col-sm-12">
                        <!-- <div class="form-group col-sm-3">
                    <label class="label">كود المجلس</label>
                    <input type="text" class="form-control" data-validation="required" readonly name="mgls_code" value="
                    <?php if (isset($last_magls)) {
                            echo $last_magls->mg_code;
                        } else {
                            echo $last_magls_update->mgls_code;
                        } ?>"
                           class="form-control fe2a" id="">
                    <input type="hidden" readonly name="mgls_id_fk" value="<?php if (isset($last_magls)) {
                            echo $last_magls->id;
                        } else {
                            echo $last_magls_update->mgls_id_fk;
                        } ?>" class="form-control fe2a">
                </div> -->
                        <div class="form-group col-sm-1 padding-4">
                            <label class="label">رقم الجلسه</label>
                            <input type="text" class="form-control" data-validation="required" id="glsa_rkm_full"
                                   name="glsa_rkm_full"
                                   readonly value="<?php echo date("Y"); ?>/<?php echo $last_galsa; ?>"/>
                            <input type="hidden" name="glsa_rkm" id="glsa_rkm" readonly
                                   value="<?php echo $last_galsa; ?>"/>
                        </div>
                        <div class="col-sm-2  col-md-2 padding-4 ">
                            <label class="label   ">نوع الإجتماع </label>
                            <select name="no3_egtma3" id="no3_egtma3"
                                    class="form-control "  data-validation="required"
                                    data-show-subtext="true" data-live-search="true" aria-required="true">
                                <option value="">اختر</option>
                                <?php $type_metting = array(1 => ' عادية', 2 => ' غير عادية');
                                foreach ($type_metting as $key => $value) { ?>
                                    <option data-title="<?= $value ?>" value="<?= $key ?>"
                                        <?php
                                        if (isset($last_magls_update) && !empty($last_magls_update->no3_egtma3)){
                                            if ($last_magls_update->no3_egtma3 == $key) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>
                                    > <?= $value ?> </option>
                                    <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-3  col-md-2 padding-4 ">
                            <label class="label   "> تاريخ الجلسه </label>
                            <input type="date" name="glsa_date" id="glsa_date" class="form-control "  data-validation="required"
                                   onchange="get_glsa_day(this.value);"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_date_ar)) { echo $last_magls_update->glsa_date_ar; } ?>" >
                        </div>
                        <div class="col-sm-3  col-md-1 padding-4 ">
                            <label class="label   "> اليوم </label>
                            <input type="text" name="glsa_day" id="glsa_day" class="form-control "  data-validation="required"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_day)) { echo $last_magls_update->glsa_day; } ?>" readonly>
                        </div>
                        <div class="col-sm-3  col-md-2 padding-4 ">
                            <label class="label"> وقت الجلسه </label>
                            <input placeholder="الوقت" id="glsa_time" class="form-control " type="text"
                                   data-validation="required" name="glsa_time"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_time))
                                   { echo $last_magls_update->glsa_time; }
                                   ?>"
                                   style="float: right;text-align: center;">
                        </div>
                       <!-- <div class="col-sm-4  col-md-3 padding-4 ">
                            <label class="label   ">مكان الإنعقاد </label>
                            <input type="text" name="makn_en3qd" id="makn_en3qd" class="form-control " data-validation="required"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->makn_en3qd)) { echo $last_magls_update->makn_en3qd; } ?>" >
                        </div>-->
                                     <div class="col-sm-4  col-md-4 padding-4 ">

                            <label class="label   ">مكان الإنعقاد </label>

                            <!-- <input type="text" name="makn_en3qd" id="makn_en3qd" class="form-control " data-validation="required"

                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->makn_en3qd)) { echo $last_magls_update->makn_en3qd; } ?>" > -->

                                   <select id="makn_en3qd" name="makn_en3qd" data-validation="required"

title="    اختر    مكان الإنعقاد   "

class="form-control selectpicker"

data-show-subtext="true"

data-live-search="true">
<option value="" >اختر   </option>
<?php

if (isset($all_places) && (!empty($all_places))) {

foreach ($all_places as $key) {

$select = '';

if (isset($last_magls_update->makn_en3qd) && (!empty($last_magls_update->makn_en3qd))) {

if ($key->id_setting == $last_magls_update->makn_en3qd) {

$select = 'selected';

}

}

?>

<option value="<?php echo $key->id_setting; ?>" <?= $select ?>> <?php echo $key->title_setting; ?></option>

<?php }

} ?>

</select>

                        </div>
                        

 
 </div>
 <div class="col-sm-12  ">  
 
                         <div class="col-sm-3  col-md-1 padding-4 ">
                            <label class="label   "> رقم قرار المجلس </label>
                            <input type="text" name="magls_rkm" id="magls_rkm" class="form-control "  data-validation="required"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->magls_rkm)) { echo $last_magls_update->magls_rkm; } ?>" >
                        </div>
                        
 
<div class="col-sm-3  col-md-2 padding-4 ">
<label class="label   "> تاريخ القرار </label>
<input type="date" name="magls_rkm_date" id="magls_rkm_date" class="form-control "  data-validation="required"
       value="<?php if (isset($last_magls_update) && !empty($last_magls_update->magls_rkm_date)) {
        echo $last_magls_update->magls_rkm_date;
         }else{
            echo date('Y-m-d');
         } ?>" >
</div>                     
<div class="col-sm-3  col-md-3 padding-4 ">
        <label class="label">    مقرر الجلسة </label>
        <select id="glsa_reviser_id" name="glsa_reviser_id" 
        title="    اختر   مقرر الجلسة   "
        class="form-control selectpicker"
        data-show-subtext="true"
        data-live-search="true">
        <option value="" >اختر   </option>
        <?php
        if (isset($all_Emps) && (!empty($all_Emps))) {
        foreach ($all_Emps as $key) {
        $select = '';
        if (isset($last_magls_update->glsa_reviser_id) && (!empty($last_magls_update->glsa_reviser_id))) {
        if ($key->id == $last_magls_update->glsa_reviser_id) {
        $select = 'selected';
        
        }
        }
        ?>
        <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
        
        <?php }
        
        } ?>
        </select>
    </div>
                        
                        
                        <?php 
                        /*
                        if (isset($members) && !empty($members)) {
                            if (isset($galsa_member) && !empty($galsa_member)) {
                                $title_collapse = "تعديل اختيارات الاعضاء  المرسل لهم الدعوات";
                            } else {
                                $title_collapse = "اختيار الاعضاء لإرسال الدعوات";
                            }
                            ?>
                            <div class="container col-md-12">
                                <button type="button" class="btn btn-info" data-toggle="collapse"
                                        data-target="#demo"><?= $title_collapse ?></button>
                                <div id="demo" class="collapse">
                                <!--
                                    <table id=" " class="example display table table-bordered   responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th style="background-color: #2d2b2b;color: white;" scope="col">#
                                                <input type="checkbox" onclick="check_all(this,'example')"/>
                                            </th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">رقم العضوية</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">إسم العضو</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">رقم هويته</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">رقم جوال</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">بداية الاشتراك</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">نهاية الاشتراك</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">حالة العضوية</th>
                                            <th style="background-color: #2d2b2b;color: white;"  scope="col">مدة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($members as $row) {
                                        
                                                $rkm_odwia_full = $row->rkm_odwia_full;
                                                $odwia_status_title = $row->odwia_status_title;
                                                if (!empty($row->subs_from_date_m)) {
                                                    $subs_from_date_m = explode('/', $row->subs_from_date_m)[2] . '/' . explode('/', $row->subs_from_date_m)[0] . '/' . explode('/', $row->subs_from_date_m)[1];
                                                } else {
                                                    $subs_from_date_m = 'غير محدد';
                                                }
                                                if (!empty($row->subs_to_date_m)) {
                                                    $subs_to_date_m = explode('/', $row->subs_to_date_m)[2] . '/' . explode('/', $row->subs_to_date_m)[0] . '/' . explode('/', $row->subs_to_date_m)[1];
                                                } else {
                                                    $subs_to_date_m = 'غير محدد';
                                                }
                                                $bday = new DateTime(date('d-m-Y', $row->from_date)); // Your date of birth
                                                if ($row->to_date <= strtotime(date('d-m-Y'))) {
                                                    $today = new Datetime(date('d-m-Y', $row->to_date));
                                                } else {
                                                    $today = new Datetime(date('d-m-Y'));
                                                }
                                                $diff = $today->diff($bday);
                                                $diff = $diff->y . " سنة  " . $diff->m . " شهر " . $diff->d . " يوم ";
                                      
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="member_id[]" value="<?= $row->id ?>"
                                                        <?php
                                                        if (isset($galsa_member) && !empty($galsa_member) && in_array($row->id, $galsa_member)) {
                                                            echo 'checked';
                                                        }
                                                        ?>
                                                           class="checkbox  member_id"/>
                                                </td>
                                                <td><?php echo $rkm_odwia_full; ?></td>
                                                <td><?php echo $row->laqb_title . '/' . $row->name; ?></td>
                                                <td><?php echo $row->card_num; ?></td>
                                                <td><?php echo $row->jwal; ?></td>
                                                <td><?php echo $subs_from_date_m; ?></td>
                                                <td><?php echo $subs_to_date_m; ?></td>
                                                <td><?php echo $odwia_status_title; ?></td>
                                                <td><?php echo $diff; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    -->
                                    <div class="col-md-12 text-center">
                                        <!--<button type="submit"
                                                class="btn btn-labeled btn-success " name="add" value="ADD" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>-->
                                        <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {
                                            $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة بالمجلس </span>';
                                            $disabled = 'disabled';
                                        } else {
                                            $span = '';
                                            $disabled = '';
                                        } ?>
                                        <button type="button" <?= $disabled ?>
                                                class="btn btn-labeled btn-success " onclick="save_galsa()" name="add"
                                                value="ADD"
                                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>
                                        <input type="hidden" name="add" value="ADD"/>
                                        <?= $span ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء باللجنة</div>
                            <?php
                           
                        } */
                        ?>
                        
                        
                         <div class="col-md-6 text-center" style=" padding-top: 16px;">
                                        <!--<button type="submit"
                                                class="btn btn-labeled btn-success " name="add" value="ADD" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>-->
                                        <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {
                                            $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة بالمجلس </span>';
                                            $disabled = 'disabled';
                                        } else {
                                            $span = '';
                                            $disabled = '';
                                        } ?>
                                        <button type="button" <?= $disabled ?>
                                                class="btn btn-labeled btn-success " onclick="save_galsa()" name="add"
                                                value="ADD"
                                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>
                                        <input type="hidden" name="add" value="ADD"/>
                                        <?= $span ?>
                                    </div> 
                    </div> </div>
                </form>
        </div>
    </div>
    <?php if (isset($records) && !empty($records)){ ?>
    <div class="col-xs-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <table id="" class=" example display table table-bordered   responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th>مسلسل</th>
                            <th>رقم الجلسة</th>
                            <th>تاريخ الجلسة</th>
                            <th>وقت الجلسه</th>
                            <th>حالة الجلسة</th>
                            <th>الأعضاء</th>
                            <th>عرض علي الموقع</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 0;
                        foreach ($records as $row) {
                            $x++;
                            if ($row->glsa_finshed == 0) {
                                $Halet_galsa = 'جلسة نشطة';
                                $Halet_galsa_color = '#98c73e';
                            } elseif ($row->glsa_finshed == 1) {
                                $Halet_galsa = 'جلسة إنتهت ';
                                $Halet_galsa_color = '#e65656';
                            }
                            ?>
                            <tr>
                                <td><?= $x ?></td>
                                <td><?= $row->glsa_rkm_full ?></td>
                                <td ><?=$row->glsa_date_ar?></td>
                                <td ><?=$row->glsa_time?></td>
                                <td style="background-color:<?php echo $Halet_galsa_color; ?>;">
                                    <?php echo $Halet_galsa; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-add" data-toggle="modal"
                                            onclick="det_datiles(<?= $row->glsa_rkm ?>)"
                                            data-target="#myModal"><span class="fa fa-list"></span>
                                        التفاصيل
                                    </button>
                                    
                                     <a onclick="print_hdoor(<?=$row->glsa_rkm?>)" ><i class="fa fa-print" aria-hidden="true"></i></a>
                               
                              
                                </td>
                                <td>
                                    <?php
                                    if ($row->status == 1) {
                                        $status_checked= "checked";
                                    }else {
                                        $status_checked="";
                                    }
                                    ?>
                                    <div class="toggle-example">
                                        <input id="status_hidden<?=$row->id?>" type="hidden" value="<?=$row->status?>"/>
                                        <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" <?=$status_checked?> data-toggle="toggle"
                                               onchange="change_status($('#status_hidden<?=$row->id?>').val(),<?=$row->id?>);"
                                               data-onstyle="success" data-offstyle="danger" data-size="mini">
                                    </div>
                                </td>
                                <td>
<div class="btn-group">
<button type="button" class="btn btn-danger">اضافه</button>
<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<?php  if ($row->glsa_finshed == 0) { ?>
<li><a target="_blank"
href="<?= base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa' . '/' . $row->glsa_rkm ?>">
تعديل بيانات الجلسة </a></li>

<?php } ?>
<li><a target="_blank"
href="<?= base_url()?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/a3da_glsa/<?=$row->glsa_rkm ?>">
أعضاء الجلسة </a></li>
<li><a target="_blank"
href="<?= base_url()?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/mehwr_glsa/<?=$row->glsa_rkm ?>">
محاور الجلسة </a></li>

<!--
<li><a href="<?= base_url()?>md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia/add_galsat_mon24a/<?= $row->glsa_rkm ?>">

القرارات </a></li>-->
<li><a href="<?= base_url()?>md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia">

القرارات </a></li>


<li><a target="_blank"
href="<?= base_url()?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/add_attach/<?=$row->id ?>">
إضافة مرفقات </a></li>
<li><a target="_blank"
href="<?= base_url()?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/add_video/<?=$row->id?>">
مكتبة الفيديوهات </a></li>
<li><a href="<?= base_url()?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/add_image/<?=$row->id ?>">
مكتبة الصور </a></li>



</ul>
</div>
                                    <?php
                                    if ($row->glsa_finshed == 0) { ?>
<!--
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
        window.location="<?= base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa' . '/' . $row->glsa_rkm ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>-->
                                            

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
                                                setTimeout(function(){window.location="<?= base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/delete_galsa/' . $row->id . '/' . $row->glsa_rkm ?>";}, 500);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>
                                        <?php
                                        if($row->send_da3wat == 0 ){ $style = ""; $style1 = "display: none;";}
                                        else{ $style = "display: none;";  $style1 = ""; }
                                        ?>
                                        <a id="send_da3wat" class="btn btn-sm btn-info"
                                           style=" <?=$style?>" onclick='swal({
                                                title: "هل تريد إنشاء الدعوات",
                                                text: "",
                                                icon: "question",
                                                iconHtml: "؟",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "نعم",
                                                cancelButtonText: "لا",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                window.location="<?= base_url() . 'md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia/galsa_send_da3wat/'. $row->glsa_rkm ?>";
                                                });'
                                           title="إنشاء الدعوات">إنشاء الدعوات </a>
                                        <a id="trag3_send_da3wat" class="btn btn-sm btn-success"
                                           style="<?=$style1?>" > تم إنشاء الدعوات  </a>
                                    <?php } elseif ($row->glsa_finshed == 1) { ?>
                                        <span style="font-weight: normal !important;"
                                              class="label-danger label label-default">لايمكن التعديل والحذف</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <!----------------------------------------------------------------->
                            <!----------------------------------------------------->
                        <?php } ?>
                        </tbody>
                    </table>
                    <!--25-7-om-->
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل الأعضاء</h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script>
    timePickerInput({
        inputElement: document.getElementById("glsa_time"),
        mode: 12,
        // time: new Date()
    });
</script>
<script>
    function get_glsa_day(day_date) {
        /*var day_date = new Date(day_date);
        console.log("day_date??????? : " + day_date);
        var glsa_day = day_date.getDay();
        console.log("glsa_day??????? : " + glsa_day);
        $('#glsa_day').val(glsa_day);*/
        var event = new Date(day_date);
        var options = { weekday: 'long' };
        $('#glsa_day').val(event.toLocaleDateString('ar-EG', options));
    }
</script>
<!------------------------------------------------------->
<script>
    function save_galsa() {
        var members = [];
        var glsa_rkm = $('#glsa_rkm').val();
        var glsa_rkm_full = $('#glsa_rkm_full').val();
        var glsa_date = $('#glsa_date').val();
        var glsa_time = $('#glsa_time').val();
        var glsa_day = $('#glsa_day').val();
        var no3_egtma3 = $('#no3_egtma3').val();
        var magls_rkm = $('#magls_rkm').val();
        var makn_en3qd = $('#makn_en3qd').val();
          var glsa_reviser_id = $('#glsa_reviser_id').val();
        var oTable = $('.example').dataTable();
        var rowcollection = oTable.$(".member_id:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            members.push($(elem).val());
        });
        // alert(members);
        //  return ;
        var members_num = document.getElementsByName('member_id[]').length;
        console.log('glsa_date : ' + glsa_date + '\n members_num : ' + members_num);
        if (glsa_date != ' ') {
            if (members.length == '') {
                // md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia
                // $('#form1').submit();
                <?php  if (isset($galsa_member)) {
                $url = base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa/' . $this->uri->segment(5) . '/' . $this->uri->segment(6);
                $alert_swal =2;
            } else {
                $url = base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
                $alert_swal =1;
            } ?>
                $.ajax({
                    type: 'post',
                    url: "<?=$url?>",
                    data: {
                        member_id: members,
                        glsa_rkm: glsa_rkm,
                        glsa_rkm_full: glsa_rkm_full,
                        glsa_date: glsa_date,
                        glsa_time: glsa_time,
                        glsa_day: glsa_day,
                        no3_egtma3: no3_egtma3,
                        magls_rkm: magls_rkm,
                        makn_en3qd: makn_en3qd,
                        glsa_reviser_id: glsa_reviser_id, 
                        add: 'add'
                    },
                    dataType: 'html',
                    cache: false,
                    success: function (d) {
                        <?php if ($alert_swal == 1){ ?>
                        swal({
                            title: "تم الحفظ بنجاح!",
                        });
                        <?php }else{ ?>
                        swal({
                            title: "تم التعديل بنجاح!",
                        });
                        <?php }?>
                        window.location.href ="<?php echo base_url();?>md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia";
                    }
                });
            } else {
                swal({
                    title: "من فضلك اختر اعضاء للجلسة ",
                    type: 'warning',
                    confirmButtonText: "تم"
                });
            }
        } else {
            $('#glsa_date').css('border', '2px solid #ff0000 ');
        }
    }
</script>
<script>
    function det_datiles(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/det_datiles'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {
                $('#members_data').html(d);
            }
        });
    }
</script>
<script>
    var start_time = 1;
    function change_time(td_el, arr) {
        var time_s = ['هـ', ' م '];
        $(td_el).fadeOut(500, function () {
            $(this).text(arr[start_time] + time_s[start_time]).fadeIn(500);
        });
        start_time = 1 - start_time;
    }
</script>
<script>
    function check_all(elem,table_id) {
        var oTable = $('.'+table_id).dataTable();
        var rowcollection = oTable.$(".checkbox", {"page": "all"});
        rowcollection.each(function (index, obj) {
            obj.checked = elem.checked;
        });
    }
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<!--<script src="--><?php //echo base_url() ?><!--asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"-->
<!--        type="text/javascript"></script>-->
<script>
    $('.checkbox_toggle').bootstrapToggle({
        on: 'نشط',
        off: 'غير نشط'
    });
</script>
<script>
    function change_status(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/change_status",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden'+id).val(status);
                if (status == 1) {
                    $('.show_status'+id).show();
                    console.log("????"+status);
                    // $('.checkbox_toggle').attr('Checked','Checked');
                    // $('.checkbox_toggle').bootstrapToggle('on');
                }else {
                    $('.show_status'+id).hide();
                    console.log("hhhhhh"+status);
                    // $('.checkbox_toggle').bootstrapToggle('off');
                    // $('.checkbox_toggle').removeAttr('Checked');
                }
            }
        });
    }
</script>



<script>

    function print_hdoor(galsa_rkm){

        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'md/all_glasat_gam3ia_omomia/Start_galsa_gam3ia_omomia/print_hdoor_mem'?>" ,
            type: "POST",
            
            data: {galsa_rkm: galsa_rkm}
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
           WinPrint.document.write(msg);
          
           // WinPrint.document.close();
          //  WinPrint.focus();
           // WinPrint.print();
            //WinPrint.close();
            //    end code
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>