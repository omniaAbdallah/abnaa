<style>
/*********** upload malti img ****/
.block {
    background-color: rgba(255, 255, 255, 0.5);
    margin: 0 auto;
    margin-bottom: 30px;
    text-align: center;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
label.button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background-color: #c72530;
    border: 1px solid #eee;
    color: #fff;
    padding: 7px 15px;
    margin: 5px 0;
    display: inline-block;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}
label.button:hover {
    color: #c72530;
    background-color: #fff;
    border: 1px solid #ccc;
    cursor: pointer;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}
input#images {
    display: none;
}
#multiple-file-preview {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}
#files1 {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}
#sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    min-height: 110px;
}
#sortable li {
    margin: 3px 3px 3px 0;
    float: left;
    width: 100px;
    height: 104px;
    text-align: center;
    position: relative;
    background-color: #FFFFFF;
}
#sortable li,
#sortable li img {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
#sortable img {
    height: 104px;
}
.closebtn {   
    color: #c72530;
    font-weight: bold;
    position: absolute;
    right: -1px;
    border-radius: 4px;
    padding: 0px 5px 0px 5px;
    background-color: #fff;
}
.closebtn h6{
    font-size: 20px;
    margin: 0;
}
.r-img-message h2 {
    padding-top: 4px;
}
.r-img-message img {
    width: 100%;
    height: 75px;
    border-radius: 5px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:last-child>.btn-group:not(:last-child)>.btn {
border-top-left-radius: 0;
border-bottom-left-radius: 0;
display: none;
}
</style> 
<div class="col-xs-12 no-padding">
    <div class="col-md-2 padding-4">
        <?php //main_page
            $this->load->view('admin/all_secretary_view/email/main_tabs');
        ?>
    </div>
<?php 
  $need_replay='' ;
  $important_degree='';
//$this->load->view('admin/all_secretary_view/email/main_tabs'); 
echo form_open_multipart('all_secretary/email/Emails/add_forward/'.$message->id);
?>
<div class="col-md-10 padding-4" id="page_content">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> رسالة جديدة </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
                    <div class="col-sm-8 padding-4">
                       <div class="form-group col-xs-4 no-padding">
                         <label class="label">إلى</label>
                         <input type="text" class="form-control"
                         placeholder=" حدد المستخدم أو القسم" type="text" style="width: 82%;float: right;"
                                   name="to_user_n" id="to_user_n"  
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "
                                   value="">
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">
                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                       </div>
                       <div class="form-group col-sm-4 padding-4">
                         <label class="label">نسخة للمتابعة</label>
                         <input type="text" class="form-control  testButton inputclass"
                                   readonly="readonly"
                                   onclick="$('#motb3aModal').modal('show'); "
                                   style="width: 82%;float: right;"
                                   value="">
                            <input type="hidden"  value="">
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">
                            <button type="button"
                                    onclick="$('#motb3aModal').modal('show');"
                                    class="btn btn-success " >
                                <i class="fa fa-plus"></i></button>
                       </div>
                       <div class="form-group col-sm-4 padding-4">
                         <label class="label">نسخة للإطلاع</label>
                         <input type="text" class="form-control  testButton inputclass"
                                   readonly="readonly"
                                   onclick="$('#etlaaModal').modal('show'); " 
                                   style="width: 82%;float: right;"
                                   value="">
                            <input type="hidden"  value="">
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">
                            <button type="button"
                                    onclick="$('#etlaaModal').modal('show');"
                                    class="btn btn-success" >
                                <i class="fa fa-plus"></i></button>
                       </div>
                       <div class="form-group col-sm-2 padding-4">
                         <label class="label">تحتاج الرد</label>
                         <select  name="need_replay"
                             class="form-control  " data-validation="required" >
                             <option value="">إختر</option>
                        <?php
                             $arr = array('1'=>'نعم','2'=>'لا');
                        foreach ($arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($message->need_replay==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }
                        ?>
                    </select>
                       </div>
                       <div class="form-group col-sm-2 padding-4">
                         <label class="label">درجة الأهمية</label>
                         <select  name="important_degree"  data-validation="required"  
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'عادي',1 => 'هام', 0 => ' هام جدا');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($message->important_degree != '') {
                                    if ($key == $message->important_degree) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                       </div>
                       <div class="form-group col-xs-8 no-padding">
                         <label class="label">عنوان الرسالة</label>
                         <input class="form-control" placeholder="" type="text" name="title"  data-validation="required" value="<?= $message->title;?>"/>
                       </div>
                    </div>
                    <div class="col-sm-4 padding-4" style="height: 150px; overflow-y: scroll;">
                       <h5>قائمة المستلمين</h5>
                       <div class="alert alert-danger"  id="text111" style="display:none; color: #BD000A; display:block;"
                       >
                       قم بإضافة قسم أو إدارة أو شخص لإستلام رسالتك <br /> يمكنك إضافة أكثر من شخص أو قسم
                       </div>
                       <div  class="recived-names">
                         <ol >
                         </ol>
                       </div>
                    </div>
                    <div class="col-xs-8 padding-4">
                        <div class="form-group">
                        <label class="label">نص الرسالة</label>
                         <textarea class="form-control" placeholder="" id="editor_" name="content"
                         data-validation="required"
                         >
                         <?= $message->content;?>
                         </textarea>
                       </div>
                    </div>
                    <div class="col-md-12 ">
                        <h4><i class="fa fa-paperclip"></i> المرفقات</h4>
                        <div class="row">
                            <?php foreach ($files as $files) { ?>
                                <div class="  col-sm-2 col-xs-4">
                                    <div class="card">
                                        <img class="img-thumbnail img-responsive card-img-top" alt="attachment"
                                             style="width: 300px;height: 150px;"
                                             src="<?php echo base_url() ?>/uploads/images/<?= $files->file; ?>">
                                        <div class="card-body">
                                            <div class="card-footer ">
                                                <div class="col-md-12">
                                                    <?php
                                                    if (!empty($files->file) || $files->file != 0) {
                                                        $ext = pathinfo($files->file, PATHINFO_EXTENSION);
                                                        $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        if (in_array($ext, $img)) {
                                                            ?>
                                                            <div class="col-md-2">
                                                                <a onclick="$('#email_img').attr('src','<?= base_url() . "uploads/images/emails/" . $files->file ?>')"
                                                                   data-toggle="modal" data-target="#exampleModal"
                                                                   class="btn btn-info btn-xs">
                                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="col-md-2">
                                                            <a href="<?= base_url() . "all_secretary/email/Emails/download_file/" . $files->file ?>"
                                                               class="btn btn-info btn-xs" download>
                                                                <i class="fa fa-download " aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                        <?php
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                            <div class="col-xs-2">
                                <button type="submit" style="height: 35px;width: 78px;" id="add"  name="add" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> إرسال</button>
                            </div>
                </div>
             </div>   
         </div>
         </form>
     </div>
</div>
</div>
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
<input type="radio" id="esnad3" name="esnad_to"  class="sarf_types" value="3" onclick="load_tahwel()">
<label for="esnad3" class="radio-label"> اداره</label>
</div>
                <div class="radio-content">
                    <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                    <label for="esnad2" class="radio-label"> قسم</label>
                </div>
                <div class="radio-content">
<input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel()">
<label for="esnad1" class="radio-label"> موظف</label>
</div>
                </div>
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="motb3aModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
<input type="radio" id="esnad_motbaa3" name="esnad_motbaa_to"  class="sarf_types" value="3" onclick="load_tahwel()">
<label for="esnad_motbaa3" class="radio-label"> اداره</label>
</div>
<div class="radio-content">
<input type="radio" id="esnad_motbaa2" name="esnad_motbaa_to"  class="sarf_types" value="2" onclick="load_motbaa()">
<label for="esnad_motbaa2" class="radio-label"> قسم</label>
</div>
                <div class="radio-content">
                    <input type="radio" id="esnad_motbaa1" name="esnad_motbaa_to"  class="sarf_types" value="1" onclick="load_motbaa()">
                    <label for="esnad_motbaa1" class="radio-label"> موظف</label>
                </div>
                </div>
                <div class="col-xs-12" id="motb3a_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="etlaaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
<input type="radio" id="esnad_etlaa3" name="esnad_etlaa_to"  class="sarf_types" value="3" onclick="load_etlaa()">
<label for="esnad_etlaa3" class="radio-label"> اداره</label>
</div>
<div class="radio-content">
                    <input type="radio" id="esnad_etlaa2" name="esnad_etlaa_to"  class="sarf_types" value="2" onclick="load_etlaa()">
                    <label for="esnad_etlaa2" class="radio-label"> قسم</label>
                </div>
                <div class="radio-content">
                    <input type="radio" id="esnad_etlaa1" name="esnad_etlaa_to"  class="sarf_types" value="1" onclick="load_etlaa()">
                    <label for="esnad_etlaa1" class="radio-label"> موظف</label>
                </div>
                </div>
                <div class="col-xs-12" id="etlaa_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id, name,type) {
        var checkBox = document.getElementById("myCheck"+id+type);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
  if (checkBox.checked == true){
    $('#text111').hide();
   $("ol").append("<li id='"+id+"'>"+name+"</li>");
 $('#to_user_n').append("<input type='hidden' id='id"+id+"'  name='to_user_fk[]' value='"+id+"'/>"+
 "<input type='hidden'  data-validation='required' id='n"+id+"' name='to_user_fk_name[]' value='"+name+"'/><input type='hidden'  data-validation='required' id='type"+id+"' name='type[]' value='"+type+"'/>");
    //$('#to_user_fk').val(id);
   //  $('#to_user_n').append(name);
  } else {
    $("#"+id).remove();
    $("#id"+id).remove();
    $("#n"+id).remove();
    $("#type"+id).remove();
    if(checkBox=='')
    {
    $('#text111').show();}
  }
      //  $('#to_user_id').val(id);
        //$('#to_user_n').val(name);
       // $('#tahwelModal').modal('hide');
    }
</script>
<script>
    function load_motbaa() {
        $('#motb3a_result').show();
        var type = $('input[name=esnad_motbaa_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/load_motbaa' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#motb3a_result").html(html);
            }
        });
    }
</script>
<script>
    function GetmotbaaName(id, name) {
        $('#motb3a_user_id').val(id);
        $('#motb3a_user_n').val(name);
        $('#motb3aModal').modal('hide');
    }
</script>
<script>
    function load_etlaa() {
        $('#etlaa_result').show();
        var type = $('input[name=esnad_etlaa_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/load_etlaa' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#etlaa_result").html(html);
            }
        });
    }
</script>
<script>
    function GetetlaaName(id, name) {
        $('#etlaa_user_id').val(id);
        $('#etlaa_user_n').val(name);
        $('#etlaaModal').modal('hide');
    }
</script>
<script>
$(document).ready(function() {
    var url1 = '',
        url2 = '';
    $("#input-24").fileinput({
        initialPreview: [ ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
        ],
        deleteUrl: "/site/file-delete",
        overwriteInitial: false,
        maxFileSize: 2000,
        initialCaption: " اختر ملف"
    });
});
</script>