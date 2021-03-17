    
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
    id="work_assigned"
                                                     data-validation="required" 
                                                     value="<?=$work_assigned?>"
                                                     />
    </div>

    <div class="col-xs-12 text-center">
                        <input type="hidden" name="add" value="add">
                        <!-- <button type="button"
                        onclick="add(<?php echo $result->id; ?>)"
                                class="btn btn-labeled btn-success " id="buttons" name="add" value="حفظ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button> -->
                        <div  id="div_add_travel_type" style="display: block;">
                                    <button type="button" onclick="add_data(<?php echo $result->id; ?>)"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div  id="div_update_travel_type" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_travel_type">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>


                        <span style="color: red" id="span_id"></span><br>


                    </div>
                    </form>
                    </div>
                    <br/>
                    <br/>
                    <!-- </div> -->
                    <!--  -->
             <div id="myDiv">
             
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
                                                    <a onclick="update(<?= $item->id  ?>,<?= $item->order_id_fk  ?>)"
                                        >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a 
                                                                
                                                                onclick="delete_item(<?= $item->id  ?>,<?= $item->order_id_fk  ?>)"
                                                                >
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        
                                            ?>
                                           

                                        </tbody>

                                       
                                    </table>

                                    <?php }?>
                                    </div>
                                    <!--  -->
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
<!-- yara9-12-2020 -->
<script>
  
  function add_data(from_id) {

      var date=$('#date').val();
      var from_hour=$('#from_time').val();
      var to_hour=$('#to_time').val();
      var num_hours=$('#num_hours').val();
      var bdal_type=$('#bdal_type').val();
    var work_assigned=$('#work_assigned').val();
     
      if (from_id != 0 && from_id != '' && to_hour != '' && from_hour != ''  && bdal_type !='' && work_assigned!='' ) {
       //   var dataString = 'travel_type=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders_deatils',
              data: {from_id:from_id,date:date,from_hour:from_hour,to_hour:to_hour,num_hours:num_hours,bdal_type:bdal_type,work_assigned:work_assigned},
              dataType: 'html',
              cache: false,
              success: function (html) {

               $('#date').val('');
 $('#from_time').val('');
   $('#to_time').val('');
    $('#num_hours').val(0);
    $('#bdal_type').val('');
 $('#work_assigned').val('');
                  swal({
                      title: "تم الاضافة بنجاح!",


      }
      );
      get_details(from_id);

              }
          });
      }else{
        swal(" ادخل البيانات","", "error");
      }

  }


</script>
<script>
    function get_details(from_id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{from_id:from_id},
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/load_data",
            success: function (d) {
                $('#myDiv').html(d);

            }

        });
    }
</script>
<script>
    function update(id,from_id) {
        var id = id;
        $('#div_update_travel_type').show();
                    $('#div_add_travel_type').hide();

        $.ajax({
            url: "<?php echo base_url() ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj);

                $('#date').val(obj.date_ar);
 $('#from_time').val(obj.from_hour);
   $('#to_time').val(obj.to_hour);
    $('#num_hours').val(obj.num_hours);
    $('#bdal_type').val(obj.bdal_type_fk);
 $('#work_assigned').val(obj.work_assigned);
            }

        });

        $('#update_travel_type').on('click', function () {
            var date=$('#date').val();
      var from_hour=$('#from_time').val();
      var to_hour=$('#to_time').val();
      var num_hours=$('#num_hours').val();
      var bdal_type=$('#bdal_type').val();
    var work_assigned=$('#work_assigned').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_edit_overtime_hours_orders",
                type: "Post",
                dataType: "html",
                data: {id:id,from_id:from_id,date:date,from_hour:from_hour,to_hour:to_hour,num_hours:num_hours,bdal_type:bdal_type,work_assigned:work_assigned},
                success: function (html) {
                    //  alert('hh');
                   
                    $('#div_update_travel_type').hide();
                    $('#div_add_travel_type').show();
                    $('#date').val('');
 $('#from_time').val('');
   $('#to_time').val('');
    $('#num_hours').val(0);
    $('#bdal_type').val('');
 $('#work_assigned').val('');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details(from_id);

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_item(id,from_id) {
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
                url: '<?php echo base_url() ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/delete_item',
                data: {id: id},
                dataType: 'html',
                cache: false,
                beforeSend: function()
                {
                    swal({
    title: "جاري الحذف ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {
                   
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details(from_id);

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});

    }
</script>
<!-- yara9-12-2020 -->