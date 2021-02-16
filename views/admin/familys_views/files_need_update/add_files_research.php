<style>
  	/**************************/
	/* 27-1-2019 */
	label.label-green {
	    height: auto;
    line-height: unset;
    font-size: 14px !important;
    font-weight: 600 !important;
    text-align: right !important;
    margin-bottom: 0;
    background-color: transparent;
    color: #002542;
    border: none;
    padding-bottom: 0;
    font-weight: bold;
    float: right;
    display: block;
    width: 100%;
	}
	.half {
		width: 100% !important;
		float: right !important;
	}
	.input-style {
		border-radius: 0px;
		border-right: 1px solid #eee;
	}
	.form-group {
		margin-bottom: 0px;
	}
	.bootstrap-select>.btn {
		width: 100%;
		padding-right: 5px;
	}
	.bootstrap-select.btn-group .dropdown-toggle .caret {
		right: auto !important; 
		left: 4px;
	}
	.bootstrap-select.btn-group .dropdown-toggle .filter-option {
		font-size: 15px;
	}
/*	.form-control{
		font-size: 15px;
		color: #000;
		border-radius: 4px;
		border: 2px solid #b6d089 !important;
	}*/
	.form-control:focus {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: 2px 2px 2px 1px #beffc3;
	}
	.has-success .form-control {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	}
	.has-success  .form-control:focus {
		border: 2px solid #b6d089;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: 2px 2px 2px 1px #beffc3;
	}
	.nav-tabs>li>a {
		color: #222;
		font-weight: 500;
		background-color: #e6e6e6;
		font-size: 15px;
	}
	.tab-content {
		margin-top: 15px;
	}  
    td { 
    border-color: #999 !important;
}
   tbody td { 
    background-color: #fff ;
}  
#check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }
    .check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }
    .check_large2 {
        width: 18px;
        height: 18px;
    }
    .check_large {
        width: 18px;
        height: 18px;
    }
    label.checktitle {
        margin-top: -24px;
        display: block;
        margin-right: 24px;
    }
</style>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">
           <?php if(!empty($record)){ ?>
                <form action="<?php echo base_url();?>family_controllers/files_need_update/File_research/update_file_research/<?php echo $path_method; ?>" method="post">
            <?php }else{ ?>
                    <form action="<?php echo base_url();?>family_controllers/files_need_update/File_research/add_file_research/<?php echo $this->uri->segment(5)."/".$this->uri->segment(6); ?>" method="post">
                <?php } ?>
                <div class="form-group col-md-2 padding-4">
                    <label class="label label-green  "> رقم الملف </label>
                    <input type="text" name="file_num"
                           data-validation="required" readonly="readonly" class="form-control  " 
                           value="<?php if(!empty($record)){ echo $record->file_num; }else{
                                  echo $this->uri->segment(6);
                                  } ?>" />
                                   <input type="hidden" name="num"
                           value="<?php if(!empty($record)){ echo $record->rkm; }else{ echo $last_id;} ?>" />
                </div>
                <div class="form-group col-md-3 padding-4">
                    <label class="label label-green  "> رقم الهوية </label>
                <input type="text" name="mother_national_num"
                data-validation="required" readonly="readonly"    class="form-control  " 
                           value="<?php if(!empty($record)){
                                   echo $record->mother_national_num_fk;
                                        }else{
                                  echo $this->uri->segment(5);
                                  }?>" />
  </div>
                <div class="form-group col-md-4 padding-4">
                    <label class="label label-green  half" > إختر الفرد  </label>
                      <select class="form-control half" 
                      name="option_select"
                      id="member_id" <?php if(!empty($record)){}else{ echo 'data-validation="required"';}?>   aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر</option>
                        <!----   ---------------------- ------------>
                        <?php  if(isset($mother) && !empty($mother)){
                            $selecet='';
                            ?>
                            <?php  if(isset($record) && !empty($record)){ 
                                  if($record->person_national_num==$mother->mother_national_card_new)
                                  {
                                      $selecet="selected";
                                  }
                                   ?>
                            <?php  } ?>
                            <option <?=$selecet?> value="1-<?php echo $mother->mother_national_card_new;?>-<?php echo $mother->full_name;?>"><?php echo $mother->full_name;?> (الأم)</option>      
                        <?php }?>
                        <!----   ---------------------- ------------>
                        <!----   ---------------------- ------------>
                        <?php if(isset($f_members)&&!empty($f_members) ){
                               foreach($f_members as $row){ 
                                $selecet='';
                                 if(isset($record) && !empty($record)){ 
                                    if($record->person_national_num==$row->member_card_num)
                                    {
                                        $selecet="selected";
                                    }
                                 } ?>
                        <option <?=$selecet?> value="2-<?php echo $row->member_card_num;?>-<?php echo $row->member_full_name;?>"><?php echo $row->member_full_name;?> (الأبناء)</option>
                        <?php }}?>
                        <!----   ---------------------- ------------>
                      </select>
               </div>
               </div>         
<br>
                 <div class="form-group col-xs-12 text-center">
              <!-- yara -->
              <?php if (isset($main_attach_files) && !empty($main_attach_files)) { ?>
                                                <table id=""
                                                       class="table table-striped table-bordered dt-responsive nowrap table-pd"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td><input class="check_all_not"
                                                                   id="check_all_not<?php echo $mother_num; ?>"
                                                                   type="checkbox"
                                                                   onclick="check_all(<?php echo $mother_num; ?>);"><label
                                                                    class="checktitle">
                                                               </label>
                                                        </td>
                                                        <td>نوع الطلب</td>
                                                        <td>حالة الطلب</td>
                                                        <td>ملاحظات</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $status = array('غير محدد', 'تحت الطلب', 'تم التسلم');
                                                    $y = 1;
                                                    foreach ($main_attach_files as $file_row) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input class="check_large2 check_large<?php echo $mother_num; ?> check_large2"
                                                                       type="checkbox"
                                                                    <?php
                                                                    if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                        if ($record->required_files[$file_row->id_setting]->doc_id_fk == $file_row->id_setting) {
                                                                            echo 'checked';
                                                                        }
                                                                    }
                                                                    ?>
                                                                       name="doc_id_fk[]"
                                                                       value="<?= $file_row->id_setting ?>"/>
                                                            </td>
                                                            <td><?= $file_row->title_setting ?></td>
                                                            <td>
                                                                <select name="doc_status_fk[]"
                                                                        class=" no-padding form-control"
                                                                        aria-required="true">
                                                                    <option value="">اختر
                                                                    </option>
                                                                    <?php foreach ($status as $key => $value) { ?>
                                                                        <option value="<?= $key ?>"
                                                                            <?php
                                                                            if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                                if ($record->required_files[$file_row->id_setting]->doc_status_fk == $key) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        ><?= $value ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?php
                                                                if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                    echo $record->required_files[$file_row->id_setting]->doc_notes;
                                                                }
                                                                ?>" name="doc_notes[]"
                                                                       class="form-control half"/>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
              <!-- yara -->
                 <button type="submit" id="saveBtn" class="btn btn-labeled btn-success " name="submit" value="حفظ" >
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ       </button>
                </div>
            </form>
            <div class="clearfix"></div>
            <?php
            if(isset($letters)&&!empty($letters)){
                ?>
         <br />
                <table id="example" class="table table-bordered table-devices">
                    <thead>
                    <tr class="greentd">
                        <th class="">رقم الطلب </th>
                          <th class="">اسم المسؤول</th>
                          <th class=""> رقم الهوية</th>
                        <th class="">التاريخ</th>
                        <th class="">الإجراء</th>
                        <!-- <th class="">إرفاق صورة</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($letters as $row){  
                        $link= $row->mother_national_num_fk."/".$row->file_num; 
                        $title='';
                        ?>
                        <tr >
                           <td><?php echo $row->rkm;?>  </td>
                            <td> <?php echo $row->person_name;?></td>
                            <td> <?php echo $row->mother_national_num_fk;?></td>
                            <td> <?php echo $row->date;?></td>
                            <td>
                                   
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
        window.location="<?php echo base_url().'family_controllers/files_need_update/File_research/update_file_research/'.$row->mother_national_num_fk.'/'.$row->rkm.'/'.$row->file_num?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
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
        setTimeout(function(){window.location="<?php echo base_url().'family_controllers/files_need_update/File_research/delete_file_research/'.$row->rkm.'/'.$link?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
<!-- yara -->
                            </td>
                        </tr>
                    <?php   } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function check_all(id) {
        var inputs = document.querySelectorAll('.check_large' + id);
        var input = document.getElementById('check_all_not' + id).checked;
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;
        }
    }
</script>