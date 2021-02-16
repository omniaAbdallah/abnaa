    
 <?php
if (isset($result) && !empty($result)) {
  
   
    $total_hours = 0;
    if (isset($result->details) && !empty($result->details)) {
        foreach ($result->details as $item) {
            $total_hours += $item->num_hours;
        }
    }
} else {
    $total_hours = '';
}

if (isset($data) && !empty($data)) {
  
   $date=$data->date_ar;
   $from_hour=$data->from_hour;
   $to_hour=$data->to_hour;
   $num_hours=$data->num_hours;
   $bdal_type_fk=$data->bdal_type_fk;
   $work_assigned=$data->work_assigned;
 

} else {

    $date=date('Y-m-d');
 
    $from_hour = '';
    
    $to_hour = '';
    $num_hours = '';
    $bdal_type_fk = '';
    $from_hour = '';
    $from_hour = '';
    $work_assigned='';

}
?>   
   <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">

                <?php if(isset($data)&& !empty($data)){?>
                <form action="<?php echo base_url(); ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_edit_overtime_hours_orders/<?php echo $data->id; ?>/<?php echo $result->id; ?>"
                      method="post">
                    <?php }else{ ?>
                        <form action="<?php echo base_url(); ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders_deatils/<?php echo $result->id; ?>"
                  method="post">

                    <?php }?> 
                    
    




     <div class="col-xs-12 no-padding">

     <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label "> التاريخ </label>
    <input type="date" class="form-control" name="date[]" id="date"
                                                           data-validation="required"
                                                           value="<?php echo $date;?>">
    </div>

    <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
    <label class="label "> من الساعة </label>
    <input type="time" class="form-control" data-validation="required"
                              name="from_hour[]" id="from_time"
                              value="<?=$from_hour?>"
                              onchange="get_time();"
                             />           

    </div>

    <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
    <label class="label "> إلى الساعة </label>
    <input type="time" class="form-control" data-validation="required"
                              name="to_hour[]" id="to_time"
                              value="<?=$to_hour?>"
                              onchange="get_time();"
                             />            

    </div>
    <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
    <label class="label "> المدة  </label>
<input type="text" class="num_hours calc form-control"
    name="num_hours[]" id="num_hours" readonly
    value="<?=$num_hours?>"
    >
    </div>


    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
    <label class="label "> البدل الأضافي  </label>
    <select name="bdal_type_fk[]" id="bdal_type" class="form-control "
                                                            data-validation="required" aria-required="true">
                                                        <option value="">إختر</option>
                                                        <?php $bdal_type_arr = array(1 => 'بدل نقدي'
                                                        , 2 => 'بدل أيام الراحة'); ?>
                                                        <?php foreach ($bdal_type_arr as $a=>$value) {
                                                            $select='';
                                                            if(!empty($bdal_type_fk)&&$bdal_type_fk==$a )
                                                            {
                                                                $select="selected";
                                                            }
                                                            
                                                            ?>
                                                            <option <?=$select?> value="<?= $a ?>"><?= $value ?></option>
                                                        <?php } ?>
                                                    </select>
    </div>

    
    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
    <label class="label "> العمل المكلف بإنجازه </label>
    <input type="text" class="form-control"  name="work_assigned[]"  
                                                     data-validation="required" 
                                                     value="<?=$work_assigned?>"
                                                     />
    </div>

    <div class="col-xs-12 text-center">
                        <input type="hidden" name="add" value="add">
                        <button type="submit"
                                class="btn btn-labeled btn-success " id="buttons" name="add" value="حفظ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>



                        <span style="color: red" id="span_id"></span><br>


                    </div>
                    </form>
                    </div>
                    <br/>
                    <br/>
                    <!-- </div> -->
             
                    <?php
                                        if (isset($result->details) && !empty($result->details)) {
                                            ?>
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                                        <thead>
                                        <tr class="greentd">
                                        <th >م</th>
                                            <th >التاريخ</th>
                                            <th >من الساعة</th>
                                            <th >إلى الساعة</th>
                                            <th >المدة</th>
                                            <th >البدل الأضافي</th>
                                            <th >العمل المكلف بإنجازه</th>
                                            <th>الاجراء</th>
                                        </tr>
                                        </thead>

                                        <tbody id="result_pageTable">
                                        <?php
                                   //     if (isset($result->details) && !empty($result->details)) {
                                            $z = 0;
                                            foreach ($result->details as $item) {
                                                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                                    $link_delete = 1;
                                                } else {
                                                    $link_delete = 0;
                                                }
                                                $z++;
                                                ?>
                                                <tr class="open_green" id="tr<?= $z ?>">
                                                <td><?= $z ?></td>
                                                    <td><?= $item->date_ar ?></td>
                                                    <td>
                                               
                                                    
                          <?= $item->from_hour ?>
                                                    </td>
                                                    <td><?= $item->to_hour ?>
                                                    </td>
                                                    <td><?= $item->num_hours ?>
                                                        
                                                    </td>
                                                    <td>
                                                           
                                                                  
                                                                  <?php  echo  $item->dbal_type_name;?>
                                                                
                                                          
                                                       </td>
                                                    <td>
                                                    
                                                    <?= $item->work_assigned ?>
                                                   
                                                                  </td>
                                                    <td class="text-center">
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
                                 window.location="<?php echo base_url() ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_edit_overtime_hours_orders/<?= $item->id  ?>/<?= $item->order_id_fk  ?>";
                                        });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="#" onclick='swal({
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
                                                                window.location="<?= base_url() . "human_resources/employee_forms/overtime_hours/Overtime_hours_orders/delete_item/" . $item->id . '/' . $item->order_id_fk . '/' . $link_delete ?>";
                                                                });count(<?= $z ?>);'>
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        
                                            ?>
                                           

                                        </tbody>

                                        <!-- <tfoot>
                                        <tr>
                                            <th colspan="6" style="background-color: #fff;">
                                                <input type="hidden" readonly name="total_hours" id="total_hours"
                                                       value="<?= $total_hours ?>">
                                                <input type="hidden" class="" name="" id="total_minutes" readonly
                                                       style="width: 107px">
                                            </th>

                                            <th colspan="1" class="text-center" style="background-color: #fff;">
                                                <button type="button" onclick="add_row()" class="btn-success btn"
                                                        style="font-size: 16px;"><i class="fa fa-plus"></i>
                                                </button>
                                            </th>


                                        </tr>

                                        </tfoot> -->
                                    </table>

                                    <?php }?>
                               </div>
                             

                </div>
                </div>
                </div>

                <script>
    function RemoveMe(valu) {
        $('#' + valu).remove();
        count(1);
    }

</script>


<!-- yara25-10-2020 -->
<script>
        function get_time() {
            var start = $('#from_time').val();
            var end = $('#to_time').val();
            //  alert(start);
            //  return;
            if (start != '' && end != '') {
                s = start.split(':');
                e = end.split(':');
                var ss = s[s.length - 1].split(' ');
                var ee = e[e.length - 1].split(' ');
                if (ss[ss.length - 1] === 'PM') {
                    if (parseInt(s[0]) === 12) {
                    } else {
                        s[0] = parseInt(s[0]) + 12;
                    }
                }
                if (ee[ee.length - 1] === 'PM') {
                    if (parseInt(e[0]) === 12) {
                    } else {
                        e[0] = parseInt(e[0]) + 12;
                    }
                }
                min = parseInt(e[1]) - parseInt(s[1]);
                console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
                hour_carry = 0;
                if (min < 0) {
                    min += 60;
                    hour_carry += 1;
                }
                console.log('min :' + min);
                hour = e[0] - s[0] - hour_carry;
                diff = hour + "." + min;
                console.log('min :' + min + " hours :" + hour + " diff :" + diff);
                diff_munites = (diff* 60);
                $('#num_hours').val(diff_munites);
                if (diff_munites <= 0) {
                    $('#num_hours').val(0);
                    document.getElementById("save").disabled = true;
                    document.getElementById("span_id").style.display = 'block';
                    document.getElementById("span_id").innerText = 'من فضلك ادخل فترة زمنية صحيحة';
                } else {
                    document.getElementById("save").disabled = false;
                    document.getElementById("span_id").style.display = 'none';
                  
                }
            }
        }
    </script>
