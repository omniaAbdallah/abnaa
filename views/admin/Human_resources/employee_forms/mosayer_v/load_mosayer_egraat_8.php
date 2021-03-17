
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
          <?php echo $msg=$this->session->flashdata('msg');?>

        <div class="panel-body">



         <!--   ////////////////////////////////////////////////////////////////////-->


          <div class="col-md-12 no-padding">

                      <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> تاريخ الاجراء </label>
                        <input type="date" name="egraa_date" id="egraa_date" value="<?= date('Y-m-d'); ?>"
                               class="form-control ">
                               <input type="hidden" name="row_id" id="row_id" value="<?= $row_id ?>"
                               class="form-control ">
                               <input type="hidden" name="badl_code" id="badl_code" value="<?= $badl_code ?>"
                               class="form-control ">
                    </div>


                    <div class="form-group col-md-2 padding-4" >
                        <label class="label ">كود الموظف</label>
                        <input id="emp_code" readonly  class="form-control" type="text" name="emp_code" value="<?=$emp_code;?>" >

                    </div>

                    <div class="form-group col-md-2 padding-4" >
                        <label class="label ">اسم الموظف</label>
                        <input id="emp_name" readonly  class="form-control" type="text" name="emp_name" value="<?=$emp_name;?>" >

                    </div>


                    <div class="form-group col-md-2 padding-4" >
                        <label class="label ">المسمي الوظيفي</label>
                        <input id="mosma_wazefy_n" readonly  class="form-control" type="text" name="mosma_wazefy_n" value="<?=$mosma_wazefy_n;?>" >

                    </div>



                    <div class="form-group col-md-2 padding-4" >
                        <label class="label ">

                        <?php if($badl_code==100){echo"قيمه الراتب الأساسي";} ?>
                            <?php  if($badl_code==101){echo"قيمه بدل السكن";} ?>
                            <?php if($badl_code==102){echo"قيمه بدل مواصلات";} ?>
                            <?php if($badl_code==103){echo"قيمه بدل طبيعة عمل";} ?>
                            <?php if($badl_code==104){echo"قيمه بدل تكليف";} ?>
                            <?php if($badl_code==105){echo"قيمه بدل إعاشة";} ?>
                            <?php if($badl_code==106){echo"قيمه بدل إتصال";} ?>
                            <?php if($badl_code==107){echo"قيمه العمل الإضافي";} ?>
                            <?php if($badl_code==0){echo"قيمه التأمينات";} ?>
                    </label>
                        <input id="ancient_value" readonly  class="form-control" type="text" name="ancient_value" value="<?=$ancient_value;?>" >
  <input type="hidden" id="anc_value"   class="form-control"  name="anc_value" value="<?=$ancient_value;?>" >

                    </div>



                    <div class="form-group col-md-2 padding-4" >
                        <label class="label ">القيمه الجديده</label>
                        <input id="new_value" data-validation="required"  class="form-control" type="text" name="new_value" value="" >

                    </div>


                    <div class="form-group col-md-2 padding-4" >
                        <label class="label ">السبب</label>
                        <input id="reason" data-validation="required"  class="form-control" type="text" name="reason" value="" >

                    </div>




                    <div  class="form-group col-md-12 col-xs-12 text-center">


							<div class="text-center">
								<a onclick="save_mosayer_egraat()" name="add" value="add" class="btn btn-info">أضافه</a>

							</div>

            </div>



            </div>

            <?php echo form_close(); ?>




        </div>
    </div>
</div>










    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>







<script>

function save_mosayer_egraat() {
        var egraa_date=$('#egraa_date').val();
        var emp_code=$('#emp_code').val();
        var emp_name=$('#emp_name').val();
        var mosma_wazefy_n=$('#mosma_wazefy_n').val();
        var ancient_value=$('#anc_value').val();
        var new_value=$('#new_value').val();
        var reason=$('#reason').val();
        var row_id=$('#row_id').val();
        var badl_code=$('#badl_code').val();
        if(new_value !="" ){
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Employee_salaries/insert_mosayer_egraat",
            data: {egraa_date:egraa_date,emp_code:emp_code,emp_name:emp_name,mosma_wazefy_n:mosma_wazefy_n,ancient_value:ancient_value,
                new_value:new_value,reason:reason,badl_code:badl_code,row_id:row_id
            },
            success: function (d) {
              //  $('#result').html(d);
               swal("تم الاضافه!", "", "success");
               load_page(emp_code,row_id,emp_name,mosma_wazefy_n,badl_code,ancient_value);
            }
        });
        }else{
            swal("برجاء تكمله البيانات", "", "warning");

        }

    }











</script>

















