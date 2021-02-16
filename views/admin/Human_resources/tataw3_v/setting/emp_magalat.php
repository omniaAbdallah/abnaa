
<?php
/*
echo  $result->edara_id;
echo '<pre>';
print_r($result);*/
if (isset($result) && !empty($result)) {
    $edara_id = $result->edara_id;
    $emp_magal_name = $result->emp_magal_name;
/*    $emp_code = $result->emp_code;
    $card_num = $result->card_num;
    $job_title_id_fk = $result->job_title_id_fk;
    $edara_id_fk = $result->edara_id_fk;
    $qsm_id_fk = $result->qsm_id_fk;
    $mostafed_type_fk = $result->mostafed_type_fk;
    $mostafed_edara_id = $result->mostafed_edara_id;
    $mostafed_direction_id = $result->mostafed_direction_id;
    $responsible = $result->responsible;
    $job = $result->job;
    $tele = $result->tele;
    $mob = $result->mob;
    $email = $result->email;
    $volunteer_date = date('Y-m-d', $result->volunteer_date);
    $to_time = $result->to_time;
    $from_time = $result->from_time;
    $num_hours = $result->num_hours;
    $place = $result->place;
    $place_id_fk=$result->place_id_fk;
    $activities = $result->activities;
    $volunteer_description = $result->volunteer_description;
    $volunteer_description_id_fk=$result->volunteer_description_id_fk;
    $emp_code = $result->emp_code;
    $job_title = $result->job_title;
    // $emp_code_fk = $result->emp_code_fk;
    $edara_id_fk = $result->edara_id_fk;
    $emp_name = $result->emp_name;
    $edara_n = $result->edara_name;
    $qsm_id_fk = $result->qsm_id_fk;
    $qsm_n = $result->qsm_name;
    // $marad_name = $item->marad_name;
$direct_manager_id_fk = $result->direct_manager_id_fk;
*/
} else {

   // $emp_id_fk = '';
     $edara_id = '';
     $emp_magal_name = '';
  /*  $emp_code = '';
    $emp_name = '';
    $card_num = '';
    $job_title_id_fk = '';
    $edara_id_fk = '';
    $qsm_id_fk = '';
    $mostafed_type_fk = '';
    $mostafed_edara_id = '';
    $mostafed_direction_id = '';
    $responsible = '';
    $job = '';
    $tele = '';
    $mob = '';
    $email = '';
    $volunteer_date = date('Y-m-d');
    $to_time = '';
    $from_time = '';
    $num_hours = '';
    $place = '';
    $place_id_fk='';
    $activities = '';
    $volunteer_description = '';
    $volunteer_description_id_fk='';
    $emp_code = '';
    $emp_id_fk = '';
    $emp_code_fk = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $job_title = '';
    $direct_manager_id_fk = '';*/
}
?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
        <?php //echo $this->uri->segment(6);
         ?>
                   <?php
    if (isset($result) && !empty($result)){ ?>
    <form action="<?php echo base_url(); ?>human_resources/tataw3/setting/Main_setting/edit_emp_magalat/<?php echo $this->uri->segment(6); ?>"
    method="post">
    <?php } else{ ?>
    <form action="<?php echo base_url(); ?>human_resources/tataw3/setting/Main_setting/add_emp_magalat"
      method="post">
    <?php } ?>
        
        
        <div class="row">
        
         <div class="col-md-3 ">
                            <label class="label ">الجهة/الإدارة</label>
<select name="edara_id" id="edara_id"
            class="form-control  " 
            data-show-subtext="false" data-live-search="false"
            data-validation="required" aria-required="true">
        <option value="">إختر</option>
        <?php
        if (!empty($edarat)):
            foreach ($edarat as $record):
                $select = '';
                if ($edara_id == $record->id) {
                    $select = 'selected';
                } ?>
                <option
                        value="<?php echo $record->id; ?>" <?= $select ?>>
                    <?php echo $record->title; ?></option>
            <?php
            endforeach;
        endif;
        ?>
    </select>
    </div>
    
    
            
         <div class="col-md-3 ">
                            <label class="label ">مسمي المجال التطوعي </label>

<input type="text" class="form-control" name="emp_magal_name" value="<?=$emp_magal_name?>" />
    </div>
        
        
             <div class="col-xs-3 text-center" style="margin-top: 25px">
                        <input type="hidden" name="add" value="add">
                        <button type="submit"
                                class="btn btn-labeled btn-success " id="save" name="add" value="حفظ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                       
                        <span style="color: red" id="span_id"></span><br>

                    </div>
        </div>
        
        
 
            
                </form>
        </div>
        </div>

       </div>
<?php
/*
echo '<pre>';
print_r($all_emp_magalat);*/
if (isset($all_emp_magalat) && !empty($all_emp_magalat)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> ساعات التطوع</h3>
            </div>
            <div class="panel-body">

                <!-----------------------------------------table------------------------------------->

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                        <th>م</th>
                        <th>الإدارة</th>
                        <th>إسم المجال</th>
                        <th> الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $x = 1;
                    foreach ($all_emp_magalat as $row) {

                      $link_update = 'window.location="' . base_url() . 'human_resources/tataw3/setting/Main_setting/edit_emp_magalat/' . $row->id . '";';
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->edara_name; ?></td>
                            <td><?php echo $row->emp_magal_name; ?></td>
                            
                            <td>
                  


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
                                        window.location="<?php echo base_url(); ?>human_resources/tataw3/setting/Main_setting/delete_emp_magalat/<?php echo $row->id  ?>";
                                        });'><i class="fa fa-trash"
                                                aria-hidden="true"></i> </a>
                                          
                            </td>
                         
                        </tr>
                        <?php
                         $x++;
                    } ?>
                    </tbody>
                </table>


                <!--------------------------------------------table---------------------------------->


            </div>
        </div>

    </div>


<?php } ?>