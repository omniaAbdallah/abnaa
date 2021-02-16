



<input type="hidden" id="volunter_id" value="<?=$result->id ?>">
<div class="print_forma  col-xs-12 no-padding">
    <div class="piece-box">
     
        <div class="piece-body" style="padding-bottom: 0">
            <div class="col-xs-12 no-padding">
                <table class="table table-bordered" style="table-layout: fixed">
                    <tbody>
                    <tr>
                     <td style="background: #32a6ca;color: white;text-align: center;" colspan="6">بيانات الموظف</td>
                    </tr>
                    <tr>
                   
                        <td style="width: 120px " class="green-bg">اسم الموظف</td>
                        <td><?php echo $result->emp_name ;?></span></td>
                        <td style="width: 120px " class="green-bg">الرقم الوظيفي</td>
                        <td style="width: 200px "><?php echo $result->emp_code ;?></td>
                        <td style="width: 120px " class="green-bg">رقم الهوية</td>
                        <td><?php echo $result->card_num ;?></td>
                  </tr>
                  <tr>
                   <td style="width: 120px " class="green-bg">المسمى الوظيفي</td>
                        <td><?php echo $emp_data->mosma_wazefy_n ;?></span></td>
                        <td style="width: 200px " class="green-bg">الإدارة</td>
                        <td style=" "><?php echo $emp_data->edara_n ;?></td>
                        <td style="width: 200px " class="green-bg">القسم</td>
                        <td><?php echo $emp_data->qsm_n ;?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="piece-box">
        <div class="piece-heading  ">
   
   <div class="col-xs-12 no-padding">
                <table class="table table-bordered" style="table-layout: fixed">
                    <tbody>
                     <tr>
                     <td style="background: #32a6ca;color: white;text-align: center;" colspan="6">المستفيد من خدمة التطوع</td>
                    </tr>
                    <tr>
                        <td style="width: 120px " class="green-bg">نوع التطوع</td>
                        <td style="width: 220px;"><?php if ($result->mostafed_type_fk ==0){echo "داخلى";}else{ echo "خارجى";}?></span></td>


                       <td style="width: 120px " class="green-bg">الجهة/الإدارة</td>
                        <td><?php echo $result->mostafed_edara_name ;?></span></td>
                        <td style="width: 80px " class="green-bg">المسئول</td>
                        <td style=" "><?php echo $result->responsible ;?></td>
            
                  </tr>
                 
                  <tr>
                  <td style="width: 80px " class="green-bg">الوظيفة</td>
                        <td><?php echo $result->job ;?></td>
                          <td style="width: 80px " class="green-bg">الهاتف</td>
                        <td><?php echo $result->tele ;?></span></td>
                        <td style="width: 80px " class="green-bg">الجوال</td>
                        <td style=" "><?php echo $result->mob ;?></td>
                     
                  </tr>
                  
                  <tr>
                     <td style="width: 120px " class="green-bg">البريد الألكتروني</td>
                        <td><?php echo $result->email ;?></td>
                                   <?php

$from_time = strtotime($result->from_time);
$to_time = strtotime($result->to_time);
?>
                <td style="width: 80px " class="green-bg">التاريخ</td>
                <td><?php echo $result->volunteer_date_ar ;?></td>
                <td style="width: 80px " class="green-bg">من الساعة</td>
                <td><?php  if(!empty($from_time)){ echo date('h:ia',$from_time) ;}?></td>
       
                        
                        
                        
                  </tr>
                 <tr>
                 
                            <td style="width: 80px " class="green-bg">إلى الساعة</td>
                <td><?php if(!empty($to_time)){  echo date('h:ia',$to_time); }?></td>   
                 
                  <td style="width: 80px " class="green-bg">المدة</td>
                <td><?php echo $result->num_hours ;?></td>   
                 <td style="width: 30px " class="green-bg">المكان</td>
                       <td><?php echo $result->place ;?></td>
                 </tr>
                 
                 
                 <tr>
                 <td style="background: #00c3ff;" colspan="2">طبيعة العمل التطوعي</td>
                   
                    <td colspan="4"> <?php echo $result->volunteer_description ;?></td>
                 
                 </tr>
                 
                 
                  <tr>
                 <td style="background: #9ee8ff;" colspan="2">الأنشطة</td>
                   
                    <td colspan="4"> <?php echo $result->activities ;?></td>
                 
                 </tr>                                                   
                 
                    </tbody>
                </table>
            </div>
      

        </div>

    

    </div>


