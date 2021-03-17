<div class="container-fluid">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
        <div class="col-xs-12">
            <div class="personality">

                <div class="col-xs-1"></div>
                <div class="col-xs-7 ahwal_style">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php if(!empty($titles[$result['start_laqb']])){ echo $titles[$result['start_laqb']]['title_setting'] .'/'; } ?><?php echo $result['geha_name'];?>  </h4>
                </div>
                <div class="col-xs-3">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php if(!empty($greetings[$result['end_laqb']])){ echo $greetings[$result['end_laqb']]['title_setting']; } ?> </h4>
                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br>

                    <h5 style="font-weight: normal !important;"><?php echo $result['header_name'];?></h5>
                </div>



                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo $result['namozg_head'];?></h4>

                    </div>
                    <?php if ($result['namozag_type_fk'] == 1) {?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">الاسم</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">الوظيفة</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $result['emp_name'] ?></td>
                                <td class="text-center"><?php echo $result['card_national_num'] ?></td>
                                <td class="text-center"><?php echo $result['mosma_wazefy_n'] ?></td>
                               
                            </tr>
                            </tbody>
                        </table>
                       
                    </div>
                   

                    <?php }else if ($result['namozag_type_fk']== 2) {?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="">
                                <th class="text-center">اسم الموظف</th>
                                <td class="text-center"><?php echo $result['emp_name'] ?></td>
                                <th class="text-center">رقم السجل المدني </th>
                                <td class="text-center"><?php echo $result['card_national_num'] ?></td>
                              
                               
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                            <th class="text-center">بداية العمل  </th>
                               
                               <td class="text-center"><?php echo $result['start_work_date'] ?></td>
                            <th class="text-center">المسمى الوظيفي </th>
                               
                                <td class="text-center"><?php echo $result['mosma_wazefy_n'] ?></td>
                               
                            </tr>
                            <tr>

<th class="text-center">الراتب الأساسي</th>
   
   <td class="text-center">0</td>
<th class="text-center">البدلات</th>
   
    <td class="text-center">0</td>
   
</tr>
                            </tbody>
                        </table>
                       
                    </div>
                  
                    <?php }else if ($result['namozag_type_fk'] == 3) {?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">الاسم</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">يوم وتاريخ الغياب</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $result['emp_name'] ?></td>
                                <td class="text-center"><?php echo $result['card_national_num'] ?></td>
                                <td class="text-center"></td>
                               
                            </tr>
                            </tbody>
                        </table>
                       
                    </div>
                    <?php }?>
                   

                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo$result['namozg_footer'];?></h4>

                    </div>


                </div>
            </div>

            <div class="special col-xs-12 ">


                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center ">

                </div>
                <br><br>

            </div>
        </div>



    </div>
</div>