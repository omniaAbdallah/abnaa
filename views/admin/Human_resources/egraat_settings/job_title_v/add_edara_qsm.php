<div class="col-sm-12 no-padding " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
         <div class="panel-heading">
            <h3 class="panel-title"><?=$title?> </h3>
         </div> 
        <div class="panel-body" >
           <div class="vertical-tabs">
           <div class="col-sm-12 no-padding ">
<?php
if (isset($item) && !empty($item)) {
    $title=$item->title ;
    $main_type=$item->main_type;
$marg3_mobasher=$item->marg3_mobasher;
$job_number=$item->job_number;
$edara=$item->edara;
$qsm=$item->qsm;
} else {
    $title="";
    $job_number="";
    $marg3_mobasher="";
    $qsm="";
    $edara="";
    $main_type="";
}
?>
				  <div class="col-xs-12 no-padding">
          <?php
                    if (isset($item) && !empty($item)){
                    ?>
                    <div class="panel ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?>  </h3>
            <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
<span class=""> المسمي الوظيفي</span>
</button>
<button class="btn btn-success  btn-sm progress-button ">
<span class=""><?= $item->title ?> </span>
</button>
<button id="cornerExpand" class="btn btn-warning   btn-sm progress-button ">
<span class=""> كود المسمي الوظيفي</span>
</button>
<button class="btn btn-warning  btn-sm progress-button ">
<span class=""><?= $item->code ?> </span>
</button>
            <div class="btn-group">
<button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="<?php echo base_url();?>/human_resources/egraat_settings/Jobtitle/add_edara_qsm/<?php echo $item->id;?>"><i class="fa fa-archive" aria-hidden="true"></i>     ربط المسمي الوظيفي الاداره والقسم</a></li>
<li><a  href="<?php echo base_url();?>/human_resources/egraat_settings/Jobtitle/add_picture/<?php echo $item->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>   إضافة مهام وظيفية</a></li>
<li><a onclick="get_details_title(<?= $item->id ?>)"
aria-hidden="true"
data-toggle="modal"
data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i>التفاصيل</a></li>
<li>
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
window.location="<?= base_url() . 'human_resources/egraat_settings/Jobtitle/update/' .$item->id  ?>";
});'>
<i class="fa fa-pencil"> </i>تعديل</a>
</li>
<li>
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
setTimeout(function(){window.location="<?= base_url() . 'human_resources/egraat_settings/Jobtitle/delete/' . $item->id ?>";}, 500);
});'>
<i class="fa fa-trash"> </i>حذف</a>
</li>
</ul>
</div>
</div>
</div>
                    <form action="<?php echo base_url() . 'human_resources/egraat_settings/Jobtitle/update_edara_qsm/' . $item->id; ?>"
                          method="post" id="form1">
                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>human_resources/egraat_settings/Jobtitle/add"
                              method="post" id="form1">
                            <?php } ?>
    <?php
              $types = array(1 => 'مدير تنفيذي ( إدارة عليا )',
                             2 => 'مساعدين (إدارة عليا )',
                             3 => 'مدير إدارة (إدارة وسطى )',
                             4 => 'رئيس قسم (إدارة إشرافية )',
                             5 => 'موظف (إدارة تنفيذية )');  
                ?>
       <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label"> الفئة الوظيفية  </label>
                            <select name="main_type" id="main_type" class="form-control "
                            disabled
                                    data-validation="required" >
                                <option value=""> - إختر -</option>
                                <?php
                                foreach ($types as $key => $value) {
                                    $selected="";
                                    if($main_type==$key)
                                    {
                                        $selected="selected";
                                    }
                                    ?>
                                    <option <?=$selected?> value="<?= $key ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
<div class="form-group col-md-3 col-sm-4 col-xs-12 padding-4">
<label class="label">المسمي الوظيفي</label>
<input type="text" class="form-control" placeholder="" name="title" data-validation="required" 
disabled
value="<?=$title?>"
/>
</div> 
                    <div class="form-group col-md-3 col-sm-4 col-xs-12 padding-4">
<label class="label"> الاداره</label>
<select name="edara" id="edara" data-validation="required"  class="form-control"
onchange="get_qsm()"
>
                <option value="">إختر</option>
                <?php foreach ($mainDepartments as $value){
$select=''; if(!empty($edara)){ if($edara == $value->id){$select='selected';} }
?>
<option value="<?php echo $value->id; ?>"<?= $select?> <?php ?>><?php echo  $value->title;?> </option>
<?php }?>
                    </select>
</div>
<div class="form-group col-md-3 col-sm-4 col-xs-12 padding-4">
<label class="label"> القسم</label>
<select name="qsm" id="qsm"  class="form-control">
                <option value="">إختر</option>
                <?php
                if(isset($qsm)&&!empty($qsm))
                {
                foreach ($sub as $key) {
                    $select = '';
                    if($qsm != '') {
                        if ($key->id == $qsm) {
                            $select = 'selected';
                        }} ?>
                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                  <?php  } 
                }
?>
                    </select>
</div>
<div class="form-group col-md-1 col-sm-4 col-xs-12 padding-4">
<label class="label"> عدد الوظائف</label>
<input type="number" class="form-control" placeholder="" name="job_number" data-validation="required" 
value="<?=$job_number?>"
/>
</div>
<div class="form-group col-md-3 col-sm-4 col-xs-12 padding-4">
<label class="label">  المرجع المباشر</label>
<select name="marg3_mobasher" id="marg3_mobasher" data-validation="required"  class="form-control">
                <option value="">إختر</option>
                <?php
                foreach ($mosma_wazefy as $key) {
                    $select = '';
                    if($marg3_mobasher != '') {
                        if ($key->id == $marg3_mobasher) {
                            $select = 'selected';
                        }} ?>
                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                    <?php } ?>
                    </select>
</div>
                    </div>
                  </div>
                  <div class="col-xs-12 text-center" style="margin-top: 15px;">
                  <button type="submit"
                                class="btn btn-labeled btn-success "  name="add" value="اضافه"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                </div>
				</div>
                </div>
        </div>
    </div>
</div>

<!-- new -->
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>
            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- new -->
<script src="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.js"></script>
<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.css">

<script>
    function get_qsm() {
        // $('#pop_rkm').text(rkm);
var edara=$('#edara').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/egraat_settings/Jobtitle/get_qsm",
            data: {edara: edara},
            success: function (d) {
                $('#qsm').html(d);
            }
        });
    }
</script>
<script>
    function get_details_title(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/egraat_settings/Jobtitle/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>