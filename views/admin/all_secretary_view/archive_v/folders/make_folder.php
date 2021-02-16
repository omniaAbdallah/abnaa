<style xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"> .loader-img {
margin: 0 auto;
width: 60px;
height: 50px;
text-align: center;
font-size: 10px; /* position: absolute; position: relative; top: 50%; left: 50%; -webkit-transform: translateY(-50%) translateX(-50%);*/
}

.loader-img > div {
height: 100%;
width: 8px;
display: inline-block;
float: left;
margin-left: 2px;
-webkit-animation: delay 0.8s infinite ease-in-out;
animation: delay 0.8s infinite ease-in-out;
}

.loader-img .bar1 {
background-color: #754fa0;
}

.loader-img .bar2 {
background-color: #09b7bf;
-webkit-animation-delay: -0.7s;
animation-delay: -0.7s;
}

.loader-img .bar3 {
background-color: #90d36b;
-webkit-animation-delay: -0.6s;
animation-delay: -0.6s;
}

.loader-img .bar4 {
background-color: #f2d40d;
-webkit-animation-delay: -0.5s;
animation-delay: -0.5s;
}

.loader-img .bar5 {
background-color: #fcb12b;
-webkit-animation-delay: -0.4s;
animation-delay: -0.4s;
}

.loader-img .bar6 {
background-color: #ed1b72;
-webkit-animation-delay: -0.3s;
animation-delay: -0.3s;
}</style><?php if (isset($one_row) && !empty($one_row)) {
$ar_title = $one_row->ar_title;
$en_title = $one_row->en_title;
$type = $one_row->type;
$from_id_fk = $one_row->from_id_fk;
$from_name = $one_row->from_name;
$action = base_url() . 'all_secretary/archeive/Archieve/update_archeive/' . base64_encode($one_row->id);
} else {
$ar_title = '';
$en_title = '';
$type = '';
$from_id_fk = '';
$from_name = '';
$action = '#';
} ?>
<div class="col-xs-12">
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
<div class="panel-heading"><h3 class="panel-title"><?php echo $title; ?></h3></div>
<div class="panel-body ">
<form action="" method="post" id="folder_form"/>
<div class="col-md-9 padding-4">
<div class="col-md-2"><label class="label "> نوع المعامله</label> <select name="type_moamla"
id="type_moamla"
data-validation="required"
onchange="get_tabe2a_moamla(this);get_select(this.value)"
class="form-control">
<option value="">إختر</option> <?php $arrx = array(1 => 'صادر', 2 => 'وارد');
foreach ($arrx as $key => $value) { ?>
<option value="<?php echo $key; ?>">                                <?php echo $value; ?></option>                        <?php } ?>
</select></div>
<div class="col-md-2"><label class="label "> طبيعة المعامله</label> <select name="tabe2a_moamla"
id="tabe2a_moamla"
data-validation="required"
class="form-control"
onchange="$('#from_id_fk').val($('option:selected',this).val());             
$('#from_name').val($('option:selected',this).text());get_select(this.value)">
<option value="">إختر</option> <?php $arrx = array(1 => 'خارجي', 2 => 'داخلي');
foreach ($arrx as $key => $value) { ?>
<option value="<?php echo $key; ?>">                                <?php echo $value; ?></option>                        <?php } ?>
</select></div>
<div class="col-md-4"><label class="">اسم المجلد عربي </label> <input type="text" name="ar_title"
id="ar_title" class="form-control"
data-validation="required"
value="<?php echo $ar_title; ?>">
<span class="ar_title" style="display:none; color: red;"> هذا الحقل مطلوب</span></div>
<div class="col-md-4"><label class="">اسم المجلد انجليزي </label> <input type="text" name="en_title"
id="en_title"
class="form-control"
onkeypress="return (event.charCode == 38)||(event.charCode == 95) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)"
data-validation="required"
value="<?php echo $en_title; ?>">
<span class="en_title" style="display:none; color: red;"> هذا الحقل مطلوب</span></div>
<div class="col-md-4" style="padding-top: 30px;">
<div class="radio-content"><input type="radio"
id="type_sarf1" <?php if ($type == 0) echo 'checked'; ?>
onclick="make_dis($(this).val());" name="type" class="types"
value="1"> <label for="type_sarf1" class="radio-label">
رئيسي</label></div>
<div class="radio-content"><input type="radio"
id="type_sarf2" <?php if ($type == 1) echo 'checked'; ?>
onclick="make_dis($(this).val());" name="type" class="types"
value="2"> <label for="type_sarf2"
class="radio-label">فرعي </label></div>
</div>
<div class="col-md-6"><label class="radio-content">متفرع من </label> <select
class="form-control" <?php if ($type != 1) echo 'disabled'; ?> id="from_id_select"
onchange="$('#from_id_fk').val($('option:selected',this).val());                
$('#from_name').val($('option:selected',this).text())">
<option value=""> اختر</option> <?php if (isset($folders) && !empty($folders)) {
$x = 0;
$from_id_fk = 0;
foreach ($folders as $row) {
$x++; ?>
<option value="<?php echo $row->id; ?>" <?php if ($row->id == $from_id_fk) {
echo 'selected';
} ?> ><?php echo $row->ar_title; ?>                                </option>    
<?php if (!empty($row->sub)) {
get_array2($row->sub, '&nbsp &nbsp', $from_id_fk);
} ?><?php }
} ?>                    </select> <input type="hidden" name="from_id_fk" id="from_id_fk"
value="<?= $from_id_fk ?>"> <input type="hidden"
name="from_name"
id="from_name"
value="<?= $from_name ?>">
<span class="from_id_fk" style="display:none; color: red;"> هذا الحقل مطلوب</span></div>
<div class="col-md-9 text-center" style="padding-top: 20px;">
<button <?php if (isset($one_row) && !empty($one_row)) { ?> type="submit" <?php } else { ?>
type="button" onclick="save_data();" <?php } ?>style="font-size: 17px !important;"
class="btn btn-labeled btn-success " name="save" value="save"><span class="btn-label"><i
class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
</button>
</div>
</div>
</form>
<div class="col-md-3 padding-4 tree2">
<div style="overflow: auto;height: 350px">
<ul id="tree1"><?php if (isset($folders) && !empty($folders)) {
foreach ($folders as $row) { ?>
<li><?php echo $row->ar_title; ?>
<div class="pull-right"></div><?php get_li($row->sub); ?> </li> <?php }
} ?></ul>
</div>
</div>
</div> <?php function get_li($arr)
{
if (isset($arr) && !empty($arr)) { ?>
<ul> <?php foreach ($arr as $row) { ?>
<li><?php echo $row->ar_title; ?>
<div class="pull-right"></div><?php get_li($row->sub); ?> </li> <?php } ?> </ul> <?php }
} ?>        <?php function get_array2($array_aa, $l, $from_id_fk)
{
foreach ($array_aa as $key => $value) { ?>
<option value="<?php echo $value->id; ?>" <?php if ($value->id == $from_id_fk) echo 'selected'; ?>>                    <?php echo '&nbsp &nbsp &nbsp &nbsp' . $value->ar_title; ?></option>                <?php if (!empty($value->sub)) {
get_array2($value->sub, '&nbsp &nbsp &nbsp &nbsp', $from_id_fk);
}
}
} ?>
<div id="res"><?php if (isset($records) && !empty($records)) { ?>
<div class="col-xs-12">
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
<div class="panel-heading"><h3 class="panel-title"><?php echo $title ?> </h3></div>
<div class="panel-body"><?php if (isset($records) && (!empty($records))) { ?>
<table class="example table table-responsive table-bordered">
<thead>
<tr>
<th>م</th>
<th> اسم المجلد</th>
<th> التصنيف الرئيسي</th>
<!--                                        <th> المسار</th>-->
<th> الاجراء</th>
</tr>
</thead>
<tbody><?php $x = 1;
foreach ($records as $row) {
if (in_array($row->id, array(1, 2, 3, 4, 5, 6))) {
continue;
} ?>
<tr>
<td><?= $x ?></td>
<td><?= $row->ar_title ?></td>
<td><?php if (isset($row->main_folder_name) && !empty($row->main_folder_name)) {
echo $row->main_folder_name;
} else {
echo "تصنيف رئيسي";
} ?></td><!--                                            <td>-->
<? //= $row->path ?><!--</td>-->
<td>
<!-- <a href="<?= base_url() . 'main_data/Aktam/download_file/' . $row->id ?>" download=""> <i class="fa fa-download" title="تحميل"></i> </a> -->
<!-- <a onclick='swal({ title: "هل انت متأكد من التعديل ؟", text: "", type: "warning", showCancelButton: true, confirmButtonClass: "btn-warning", confirmButtonText: "تعديل", cancelButtonText: "إلغاء", closeOnConfirm: true }, function(){ window.location="<?= base_url() . 'all_secretary/archeive/Archieve/update_archeive/' . base64_encode($row->id) ?>"; });'> <i class="fa fa-pencil"> </i> </a> --><?php if ($row->type != 0) { ?>
<a data-toggle="modal" data-target="#myModal"
onclick="$('#ar_title_update').val('<?= $row->ar_title ?>');$('#id_update').val('<?= $row->id ?>')"
<i class="fa fa-pencil"> </i> </a><a
onclick='swal({title: "هل انت متأكد من الحذف ؟",                                                            text: " الملف رئيسي ويوجد به ملفات داخليه اذا قمت بالحذف ستحذف جميع الملفات الداخليه",                                                            type: "warning",showCancelButton: true,                                                            confirmButtonClass: "btn-warning",                                                            confirmButtonText: "حذف",                                                            cancelButtonText: "إلغاء",                                                            closeOnConfirm: true},                                                            function(){                                                            window.location="<?= base_url() . 'all_secretary/archive/folders/Folder/delete_folder/' . base64_encode($row->id) ?>";});'>
<i class="fa fa-trash"> </i> </a> <?php } else { ?><a
onclick='swal({title: "هل انت متأكد من الحذف ؟",                                                            text: " الملف رئيسي ويوجد به ملفات داخليه اذا قمت بالحذف ستحذف جميع الملفات الداخليه",                                                            type: "warning",showCancelButton: true,                                                            confirmButtonClass: "btn-warning",                                                            confirmButtonText: "حذف",cancelButtonText: "إلغاء",                                                            closeOnConfirm: true},function(){                                                            window.location="<?= base_url() . 'all_secretary/archive/folders/Folder/delete_folder/' . base64_encode($row->id) ?>";});'>
<i class="fa fa-trash"> </i> </a> <?php } ?></td>
</tr> <?php $x++;
} ?></tbody>
</table> <?php } else { ?>
<div class="alert-danger col-md-12 text-center "><h4> لا توجد بيانات ......</h4>
</div><?php } ?></div>
</div>
</div> <?php } ?></div>
</div>
</div><!-- myModal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title title "></h4></div>
<div class="modal-body">
<div class="container-fluid">
<div class="col-md-12 ">
<form type="post" action=" " id="update_form">
<div class="col-md-4"><label class="">اسم المجلد عربي </label> <input type="text"
name="ar_title_update"
id="ar_title_update"
class="form-control"
data-validation="required"
value=""> <input
type="hidden" name="id_update" id="id_update" value=""> <span class="ar_title"
style="display:none; color: red;"> هذا الحقل مطلوب</span>
</div>
</form>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" onclick="update_data();" style="font-size: 17px !important;"
class="btn btn-labeled btn-success " name="save" value="save"><span class="btn-label"><i
class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
</button>
<button type="button" data-dismiss="modal" style="font-size: 17px !important;"
class="btn btn-labeled btn-danger " name="save" value="save"><span class="btn-label"><i
class="glyphicon glyphicon-remove"></i></span>إغلاق
</button>
</div>
</div>
</div>
</div><!-- myModal Modal -->
<script>    function get_tabe2a_moamla(elem) {
var options = '';
if (elem.value == 1) {
options = '<option value="">اختر   </option>' + '<option value="5">خارجي   </option>' + '<option value="6">داخلي   </option>';
} else if (elem.value == 2) {
options = '<option value="">اختر   </option>' + '<option value="3">خارجي   </option>' + '<option value="4">داخلي   </option>';
}
$('#tabe2a_moamla').html(options);
}

function update_data() {
$.ajax({
type: 'post',
url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/update_data",
data: $('#update_form').serialize(),
beforeSend: function () {
$('#res').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
},
success: function (d) {/*alert(d);*/
swal({title: "تم التعديل بنجاح ", type: "success", confirmButtonText: "تم"});
$('#myModal').modal('hide');
$('#res').html(d);
make_tree();
get_select();
}
});
}</script>
<script> function save_data() {
var ar_title = $('#ar_title').val();
var en_title = $('#en_title').val();    
// var from_id_fk = $('#from_id_select').val();  
var from_id_fk = $('#from_id_fk').val(); 
var from_name = $("#from_id_select option:selected").text();  
var from = $("input[name='type']:checked").val();
if (ar_title == '') {     
$('.ar_title').show();     
return;  
}    
if (en_title == '') {    
$('.en_title').show();  
return;
}    
if (from == 2) { 
if (from_id_fk == '') {     
$('.from_id_fk').show();  
return;   
} 
}
$.ajax({       
type: 'post',      
url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/create_folder",       
data: $('#folder_form').serialize(),      
beforeSend: function () {     
$('#res').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },        
success: function (d) {/*alert(d);*/   
swal({          
title: "تم الاضافة بنجاح ",    

type: "success",
confirmButtonText: "تم"    
});     
$('#res').html(d);    
$('input').val('');     
$('select').val('');        
make_tree();            
get_select();  
}      
});    }</script>
<script> function get_select(from) {
$.ajax({
type: 'post',
url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/fill_select",
data: {from: from},
beforeSend: function () {
$('#from_id_select').attr('disabled', true);
},
success: function (d) {
$('#from_id_select').html(d);
$('#from_id_select').removeAttr('disabled');   
// $('#from_id_select').attr('disabled', true); 
$('#type_sarf1').val(1);  
$('#type_sarf2').val(2);  
}     
});    }
function make_tree() {    
$.ajax({        
type: 'post',     
url: "<?php echo base_url();?>all_secretary/archive/folders/Folder/make_tree",   
data: {}, 
beforeSend: function () {       

$('.tree').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');    
},         
success: function (d) {/*alert(d);*/     
$('.tree2').html(d);           
}        });
}  
function make_dis(v) {  
var valu = $("input[name='type']:checked").val();    
/* alert(valu);*/  
if (valu == 2) {    
$('#from_id_select').removeAttr('disabled');    
} else {            $('#from_id_select').attr('disabled', 'disabled');   
/*  $('#from_id_select').val('');*/  
}    }</script>
