<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
    <div class="panel-body">
<!---form------>
<span id="message">
<?php
if(isset($_SESSION['message']))
echo $_SESSION['message'];
unset($_SESSION['message']);
?>



</span>
<?php
$membership_jobtitle_arr =array(1=>'رئيس مجلس الإدارة',2=>'نائب رئيس مجلس الإدارة',3=>'أمين الصندوق',4=>'عضو مجلس إدارة');
?>
 <?php if(isset($results)): ?>

 <?php echo form_open_multipart('Directors/Directors/update_magls/'.$results['id'],array('class'=>"",'role'=>"form" )); ?>
     <?php
     if(empty($magls)){
         ?>
         <div class="alert alert-danger col-md-12">

             تنبيه!.... لايوجد اي مجلس نشط من فضلك تنشيط مجلس اولا
         </div>
     <?php } ?>
     <div class="col-xs-12">
                <div class="details-resorce">
                        <div class="col-sm-12 col-xs-12 no-padding" >
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label">اختر كود المجلس  </label>
                                <select name="council_id_fk" onchange="get_data($(this).val());"  class="form-control bottom-input selectpicker" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                    <option value="">-اختر-</option>
                                    <?php foreach ($magls as $mag): ?>
                                        <?php
                                        $selected='';
                                        if($results['council_id_fk']== $mag->id){
                                            $selected='selected';
                                        }
                                        ?>
                                        <option value="<?php echo $mag->id ?>" <?php echo $selected ?> ><?php echo $mag->id ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label"> رقم العضو <strong></strong> </label>
                                <input type="text" class="form-control bottom-input" value="<?php echo $results['member_code']?>" name="member_code" readonly=""/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label">إسم العضو </label>
                                <select name="member_name" class=" selectpicker form-control bottom-input " onchange="get_data_emp($(this).val());" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                    <option value="">-اختر-</option>
                                    <?php
                                    if(isset($emps)&&!empty($emps)) {

                                        foreach ($emps as $emps){

                                            ?>

                                            <option value="<?php echo $emps->id ?>" <?php  if($results['member_name']==$emps->id)echo "selected";?>>
                                                <?php echo $emps->name ?> </option>
                                        <?php }
                                    }; ?>
                                </select>

                            </div>
                        </div>



                        <div class="col-sm-12 col-xs-12  no-padding" >
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label">اختر نوع العضوية  </label>
                                <select name="member_type_id_fk" class=" form-control bottom-input" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="">-إختر-</option>
                                    <?php
                                   foreach($member_type as $row){


                                        $selected3='';
                                        if($results['member_type_id_fk']== $row->id_setting){
                                            $selected3='selected';
                                        }
                                        ?>
                                        <option value="<?php echo $row->id_setting; ?>" <?= $selected3;?> ><?php echo $row->title_setting; ?> </option>
                                    <?php } ?>


                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label">منصب العضو  </label>
                                <select name="job_title_id_fk" id="job_title_id_fk" class="form-control bottom-input"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                    <option value=""> - اختر - </option>
                                    <?php foreach ($membership_jobtitle_arr as $key=>$value): ?>
                                        <?php
                                        $selected2='';
                                        if($results['job_title_id_fk']==$key){
                                            $selected2='selected';
                                        }?>

                                        <option value="<?php echo $key ?>" <?php echo $selected2 ?> ><?php echo $value ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label"> رقم الهوية <strong></strong> </label>
                                <input type="text" id="num1" readonly onkeyup="chek_length('num1')" onkeypress="validate_number(event)" class=" form-control bottom-input" value="<?= $results['member_national_num']?>" name="member_national_num"/>
                                <span id="num1_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                            </div>
                        </div>

                        <div class="col-md-12  no-padding">

                            <div class="form-group col-md-3 col-sm-6 padding-4">
                                <label class="label top-label">
                                    <img style="width: 18px;float: right;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon3.png" />
                                    تاريخ الميلاد
                                    <img style="width: 18px;float: left;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon6.png" />
                                </label>
                                <div id="cal-2" style="width: 50%;float: right;">
                                    <input id="date-Hijri" name="member_birth_date_h" class="form-control bottom-input "
                                           type="text"  onfocus="showCal2();" value="<?php echo $results['member_birth_date_h'] ?>"
                                           style=" width: 100%;float: right"/>
                                </div>
                                <div id="cal-1" style="width: 50%;float: left;">
                                    <input id="date-Miladi" name="member_birth_date_m" class="form-control bottom-input  "
                                           value="<?php echo $results['member_birth_date_m'] ?>"
                                           type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
                                </div>

                            </div>
                            


                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label top-label">العمر<strong class="astric">*</strong><strong></strong> </label>
                                <input type="text" name="age"  id="age" value=""
                                       class="form-control bottom-input"
                                       data-validation-has-keyup-event="true" readonly>

                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label"> رقم الجوال <strong></strong> </label>
                                <input type="text"id="mob1" readonly onkeyup="chek_length('mob1')" onkeypress="validate_number(event)" class="form-control bottom-input" value="<?= $results['member_phone']?>" name="member_phone"/>
                                <span id="mob1_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                            </div>

                        </div>
                        <div class="col-sm-12 col-xs-12  no-padding" >

                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label"> تاريخ التعيين<strong></strong> </label>
                                <input type="text" id="appointment_date" readonly class="form-control bottom-input"
                                       value="<?php echo $results['appointment_date_ar'] ?>" name="appointment_date"  data-validation="required" >
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" >
                                <label class="label top-label"> تاريخ الانتهاء<strong></strong> </label>
                                <input type="text" id="expired_date" readonly class="form-control bottom-input"
                                       value="<?php echo $results['expired_date_ar'] ?>" name="expired_date"  data-validation="required" >
                            </div>
                        </div>

                          <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit"<?php if(empty($magls)){ ?> style="display: none" <?php } ?> class="btn center-block r-manage-btn2 "   name="update" value="تعديل" />
                        </div>
                          <div class="col-xs-5"></div>
                    </div>

     </div>
            <?php echo form_close()?>

            <?php else: ?>

            <?php echo form_open_multipart('Directors/Directors/add_magls',array('class'=>"",'role'=>"form" ))?>
     <?php
     if(empty($magls)){
     ?>
     <div class="alert alert-danger col-md-12">

         تنبيه!.... لايوجد اي مجلس نشط من فضلك تنشيط مجلس اولا
     </div>
        <?php } ?>
        <div class="details-resorce">

                <div class="col-sm-12 col-xs-12" >
                    <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                        <label class="label top-label">اختر كود المجلس  </label>
                        <select name="council_id_fk" class="form-control bottom-input selectpicker" onchange="get_data($(this).val());" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value="">-اختر-</option>

                            <?php
                            if(isset($magls)&&!empty($magls)) {
                                foreach ($magls as $mag): ?>

                                    <option value="<?php echo $mag->id ?>"><?php echo $mag->id ?> </option>
                                <?php endforeach;
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label top-label"> رقم العضو <strong></strong> </label>
                        <input type="text" readonly class="form-control bottom-input" value="<?php echo ($last_member+1)?>" name="member_code" readonly=""/>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label top-label">إسم العضو </label>
                        <select name="member_name" class="form-control bottom-input selectpicker" onchange="get_data_emp($(this).val());" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value="">-اختر-</option>
                            <?php
                            if(isset($emps)&&!empty($emps)) {

                                foreach ($emps as $emps){ ?>

                                    <option value="<?php echo $emps->id ?>"><?php echo $emps->name ?> </option>
                                <?php }
                            }; ?>
                        </select>

                    </div>
                </div>



                <div class="col-sm-12 col-xs-12" >
                    <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                        <label class="label top-label">اختر نوع العضوية  </label>
                        <select name="member_type_id_fk" class="selectpicker form-control bottom-input" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                            <option value="">-إختر-</option>
                            <?php
                            if(isset($member_type)&&!empty($member_type)){
                            foreach($member_type as $row){?>



                                <option value="<?php echo $row->id_setting; ?>"  ><?php echo $row->title_setting; ?> </option>
                            <?php }   } ?>


                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label top-label">منصب العضو</label>
                        <select name="job_title_id_fk" id="job_title_id_fk" class="form-control bottom-input"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value=""> - اختر - </option>
                            <?php foreach ($membership_jobtitle_arr as $key=>$value): ?>


                                <option value="<?php echo $key ?>"><?php echo $value ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label top-label"> رقم الهوية <strong></strong> </label>
                        <input type="text" readonly  id="num" onkeyup="chek_length('num')"  onkeypress="validate_number(event)" class="form-control bottom-input " value="" name="member_national_num"/>
                        <span id="num_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">
                            <img style="width: 18px;float: right;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon3.png" />
                            تاريخ الميلاد
                            <img style="width: 18px;float: left;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon6.png" />
                        </label>
                        <div id="cal-2" style="width: 50%;float: right;">
                            <input id="date-Hijri" name="member_birth_date_h" class="form-control bottom-input "
                                   type="text"  onfocus="showCal2();"
                                   onblur="getAge2($(this).val());"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-1" style="width: 50%;float: left;">
                            <input id="date-Miladi" name="member_birth_date_m" class="form-control bottom-input  "

                                   type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
                        </div>

                    </div>


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label top-label">العمر<strong class="astric">*</strong><strong></strong> </label>
                        <input type="text" name="age"  id="age" value=""
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true" readonly>

                    </div>
                    <div class="form-group col-sm-4 col-xs-12" style="padding-left: 30px;">
                        <label class="label top-label"> رقم الجوال <strong></strong> </label>
                        <input type="text" readonly id="mob"  onkeypress="validate_number(event)" class="form-control bottom-input" value=""  onkeyup="chek_length('mob')"name="member_phone"/>
                        <span id="mob_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                    </div>

                </div>

                <div class="col-sm-12 col-xs-12" >

                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label top-label"> تاريخ التعيين<strong></strong> </label>
                        <input type="text" readonly id="appointment_date" class="form-control bottom-input " value="" name="appointment_date" placeholder="تاريخ التعيين" data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" >
                        <label class="label top-label"> تاريخ الانتهاء<strong></strong> </label>
                        <input type="text" readonly id="expired_date" class="form-control bottom-input " value="" name="expired_date" placeholder=" تاريخ الانتهاء"  >
                    </div>
                </div>





            <div class="col-xs-4"></div>
            <div class="col-xs-3">
                <input type="submit"  <?php if(empty($magls)){ ?> style="display: none" <?php } ?> class="btn center-block r-manage-btn2 " id=""  name="add" value="حفظ" />
            </div>
            <div class="col-xs-5"></div>
        </div>



 <?php endif; ?>
        <input type="hidden" value="<?php echo $current_year;?>" id="current_year">


        </div>

        </div>
        </div>



    <div class="col-sm-3 no-padding">
        <div class="load">
            <?php
            $data["result"]=$personal_data;
            $this->load->view('admin/directors/general_assembly/load_page_sidebar/general_assembly_person_data',$data);
            ?>

        </div>
    </div>
</div>


<div class="col-sm-12 no-padding " >
    <div class="col-md-12">
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab0default" data-toggle="tab">المجلس الحالى</a></li>
                    <li class=""><a href="#tab1default" data-toggle="tab">المجالس الاخرى</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab0default">
                        <!--  srart 1   ------------------------------------------------------------------------------------------------>
                        <?php if(isset($on_magls)&&$on_magls!=null):?>
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">كود العضوية</th>
                                    <th class="text-center">أسم العضو </th>
                                    <th class="text-center">تاريخ التعيين</th>
                                    <th class="text-center">تاريخ الانتهاء </th>
                                    <th class="text-center">الاجراء</th>
                                    <th class="text-center">الحالة</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a=1; foreach ($on_magls as $key=>$value):
                                    foreach ($value as $record):
                                        if($record->expired_date < time()){
                                            $state='danger';
                                            $title='عضوية منتهية';
                                        }elseif($record->expired_date > time()){
                                            $state='primary';
                                            $title='عضوية سارية';

                                        }?>

                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo $record->member_code ?></td>
                                            <td><?php echo $record->emp_name ?></td>
                                            <td><?php echo $record->appointment_date_ar ?></td>
                                            <td><?php echo $record->expired_date_ar ?></td>
                                            <td><a href="<?php echo base_url().'Directors/Directors/update_magls/'.$record->id?>">
                                                    <i class="fa fa-pencil " aria-hidden="true"></i> </a>

                                                <a href="<?php echo base_url().'Directors/Directors/delete_magls/'.$record->id?>"
                                                   onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-<?php echo $state?>"> <?php echo $title?></button>
                                            </td>
                                        </tr>

                                        <?php $a++;  endforeach; endforeach; ?>

                                </tbody>
                            </table>
                        <?php else:?>
                            <div class="alert alert-danger" >
                                لم يتم اضافة اعضاء للمجاس الحالى
                            </div>
                        <?php endif;?>
                        <!---  end  1   ------------------------------------------------------------------------------------------------>
                    </div>
                    <!--------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------->
                    <div class="tab-pane fade" id="tab1default">
                        <!--  srart 2   ------------------------------------------------------------------------------------------------>
                        <?php if(isset($off_magls)&&$off_magls!=null):?>
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                <tbody class="text-center">
                                <?php $a=1; foreach ($off_magls as $key=>$value):?>
                                    <tr> <td colspan="2">كود المجلس :</td>
                                        <td colspan="1"><?php echo $all_magls[$key]->id?></td>
                                        <td colspan="2">رقم قرار التعين : </td>
                                        <td colspan="2"><?php echo $all_magls[$key]->appointment_decison_number?></td>
                                    </tr>

                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">كود العضوية</th>
                                        <th class="text-center">أسم العضو </th>
                                        <th class="text-center">تاريخ التعيين</th>
                                        <th class="text-center">تاريخ الانتهاء </th>
                                        <th class="text-center">الاجراء</th>
                                        <th class="text-center">الحالة</th>
                                    </tr>

                                    <?php foreach ($value as $record): if($record->expired_date < time()){
                                        $state='danger';
                                        $title='عضوية منتهية';
                                    }elseif($record->expired_date > time()){
                                        $state='primary';
                                        $title='عضوية سارية';
                                    }?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo $record->member_code ?></td>
                                            <td><?php echo $record->member_name ?></td>
                                            <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
                                            <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
                                            <td><a href="<?php echo base_url().'Directors/Directors/update_magls/'.$record->id?>">
                                                    <i class="fa fa-pencil " aria-hidden="true"></i> </a>

                                                <a href="<?php echo base_url().'Directors/Directors/delete_magls/'.$record->id?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
                                            </td>
                                        </tr>

                                        <?php $a++;  endforeach; endforeach; ?>

                                </tbody>
                            </table>
                        <?php else:?>
                            <div class="alert alert-danger" >
                                لا يوجد اعضاء
                            </div>
                        <?php endif;?>

                        <!---  end  2   ------------------------------------------------------------------------------------------------>
                    </div>
                    <!--------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------->
                    <!---  end Tabs ----------------------------------------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>




<!---  end All ----------------------------------------------------------------------------------------------------->
 <?php  //endif; ?>

<script>


    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
        $('#myage').val(myAge)
    }


    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
          //  document.getElementById("buttons").setAttribute("disabled", "disabled");
        }

        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '';
            $("#"+ inp_id +"_span").val('');
              //document.getElementById("").setAttribute("disabled", "disabled");
              var inchek_out= inchek.substring(0,10);
             $(inchek_id).val(inchek_out);
        }


    }

</script>


<script>

    function get_data(valu)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Directors/Directors/get_data",
            data:{valu:valu},
            success:function(d){

               var obj=JSON.parse(d);
               


                 $('#appointment_date').val(obj['appointment_date']);
                $('#expired_date').val(obj['expiration_date']);



            }

        });
    }
</script>
<script>
    function get_data_emp(valu)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Directors/Directors/get_side_bar",
            data:{valu:valu},
            success:function(d){


                $('.load').html(d);


            }

        });
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Directors/Directors/get_data_emp",
            data:{valu:valu},
            success:function(d){


                var obj=JSON.parse(d);

                $('#mob').val(obj['mob']);
                 var dat=obj['birth_date'];

                $('#job_title_id_fk').val(obj['job_name_fk']);
                 var res=dat.split("/");


                //CDay CMonth CYear

                $('#CDay').val(res[0]);
                $('#CMonth').val(res[1]);
                $('#CYear').val(res[2]);
                var nowYear =$('#current_year').val();
                var myAge = ( nowYear- res[2] );
                $('#myage').val(myAge);
                $('#num').val(obj['card_num']);







            }

        });
    }

</script>
<!--
<script>
if($('#CYear').val()>0){
    setInterval(function(){


        var nowYear =$('#current_year').val();

        var myAge = (nowYear- $('#CYear').val());

        $('#myage').val(myAge);



    }, 1000) } ;


</script>
-->

<script>

       setInterval(function() {

            if ($('#current_year').val() != '' && $('#CYear').val() !='') {
                var nowYear = parseInt($('#current_year').val());


                var myAge = (nowYear - $('#CYear').val());

                $('#myage').val(myAge);


            }
        }, 1000) ;


</script>

<script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>
<script>




    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();

    <?php
    if(!isset($results)&& empty($results))
    { ?>
    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());



    cal1.show();
    cal2.show();
    <?php
    if(!isset($results)&& empty($results))
    { ?>
    setDateFields1();


    <?php }?>

    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function() {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function() {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
        date1.setAttribute("value",cal1.getDate().getDateString());
        date2.setAttribute("value",cal2.getDate().getDateString());
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }




</script>

<script>
    function getAge2(birth) { 1/13/2019
        var birth_date=birth;
        var res = birth_date.split("/");
        var year_birth=res[2];
        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year)  -parseFloat(year_birth);
        $('#age').val(ageYear+'سنه');

    }
</script>