<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
<div class="panel-heading">
            <div class="panel-title">
                <h4> سلم الرواتب   </h4>
            </div>

            <div class="panel-body">
        <span class="upChevron clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>  
<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
    <div class="tab-content">
    
                <?php
                if(isset($record) && !empty($record) && $record!=null){
                    echo form_open_multipart('human_resources/Salaries_setting/update_salaries/'.$record->id);
                }
                else{
                    echo form_open_multipart('human_resources/Salaries_setting/salaries_setting');
                }
                ?>
                 <div class="form-group col-md-2  padding-4">
                    <label class="label"> المؤهل العلمي  </label>
                    <select class="form-control " id="mo2hel" name="mo2hel" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        $mo2hel_types=array('1'=>'  فوق الجامعي',
                        '2'=>'   جامعي ',
                        '3'=>' دبلوم فوق الثانوي ',
                        '4'=>'  ثانوي ',
                        '5'=>'  متوسط ',
                        '6'=>'  إبتدائي ',
                        '7'=>'     المستخدمين والسائقين وما دون الابتدائي',
                        '8'=>'  العمال '
                    );
                        if (isset($mo2hel_types) && !empty($mo2hel_types)) {
                            foreach ($mo2hel_types as $row=>$valuee) {
                                ?>
                                <option value="<?php echo $valuee?>"
                                    <?php
                                    if (isset($record)&&$record->mo2hel == $valuee) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $valuee; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-2  padding-4">
                    <label class="label">المرتبه </label>
                    <select class="form-control " id="" name="martba" class="form-control"
                            
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        $martba_types=array('1'=>'الاولي',
                        '2'=>'   الثانيه ',
                        '3'=>'   الثالثة ',
                        '4'=>'  الرابعة ',
                        '5'=>' الخامسه ',
                        '6'=>'  السادسة ',
                        '7'=>'    السابعة'
                       
                    );
                        if (isset($martba_types) && !empty($martba_types)) {
                            foreach ($martba_types as $row=>$valuee) {
                                ?>
                                <option value="<?php echo $valuee?>"
                                    <?php
                                    if (isset($record)&&$record->martba == $valuee) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $valuee; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-3  padding-4">
                    <label class="label">نوع الدوام </label>
                    <select class="form-control " id="" name="dawam_type" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        $dawam_types=array('1'=>'جزئي',
                        '2'=>'   كامل '   
                    );
                        if (isset($dawam_types) && !empty($dawam_types)) {
                            foreach ($dawam_types as $row=>$valuee) {
                                ?>
                                <option value="<?php echo $valuee?>"
                                    <?php
                                    if (isset($record)&&$record->dawam_type == $valuee) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $valuee; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label ">الراتب بدايه من</label>
                    <input type="text" name="salary_start" placeholder="الراتب بدايه من" value="<?php if (isset($record->salary_start)){echo $record->salary_start;}?>" class="form-control " autofocus data-validation="required">
                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label ">مقدار العلاوة السنوية</label>
                    <input type="number" name="year_bonus_value" placeholder="مقدار العلاوة السنوية" value="<?php if (isset($record->year_bonus_value)){echo $record->year_bonus_value;}?>" class="form-control " autofocus data-validation="required">
                </div> 
                <div class="form-group col-sm-12 col-xs-12 text-center">
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>
</form>
                <?php if(isset($records) && $records!=null){?>
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd visible-md visible-lg">
                            
                            <th colspan="6"> المؤهل العلمي </th>
                          
                            <th colspan="15">الدرجه</th>
                            <th></th>
                        </tr>
                        <tr >
                            <th>م</th>
                            <th>المؤهل العلمي</th>
                            <th>المرتبة</th>
                            <th>نوع الدوام </th>
                            <th>الراتب بدايه من</th>
                            <th>مقدار العلاوة السنوية</th>
                            <th> 1 </th>
                            <th> 2 </th>
                            <th> 3 </th>
                            <th> 4 </th>
                            <th> 5 </th>
                            <th> 6 </th>
                            <th> 7 </th>
                            <th> 8 </th>
                            <th> 9 </th>
                            <th> 10 </th>
                            <th> 11 </th>
                            <th> 12 </th>
                            <th> 13 </th>
                            <th> 14 </th>
                            <th> 15 </th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->mo2hel;?></td>
                                <td><?php echo $row->martba;?></td>
                                <td><?php echo $row->dawam_type;?></td>
                                <td><?php echo $row->salary_start;?></td>
                                <td><?php echo $row->year_bonus_value;?></td>
                                <td><?php echo $row->x_1;?></td>
                                <td><?php echo $row->x_2;?></td>
                                <td><?php echo $row->x_3;?></td>
                                <td><?php echo $row->x_4;?></td>
                                <td><?php echo $row->x_5;?></td>
                                <td><?php echo $row->x_6;?></td>
                                <td><?php echo $row->x_7;?></td>
                                <td><?php echo $row->x_8;?></td>
                                <td><?php echo $row->x_9;?></td>
                                <td><?php echo $row->x_10;?></td>
                                <td><?php echo $row->x_11;?></td>
                                <td><?php echo $row->x_12;?></td>
                                <td><?php echo $row->x_13;?></td>
                                <td><?php echo $row->x_14;?></td>
                                <td><?php echo $row->x_15;?></td>
                            
                                <td>
                                    <a 
                         
                                    data-toggle="modal" data-target="#modalstartwork" 
                                    onclick="get_details_update(<?php echo $row->id;?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                   
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
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/Salaries_setting/delete_salaries/' . $row->id ?>";}, 500);
        });'>
        <i class="fa fa-trash"> </i></a>
   
                                </td>
                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } ?>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalstartwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_header">تعديل</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="myDiv_geha1111">

                  
                </div>

            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-labeled btn-danger "  data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function get_details_update(id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Salaries_setting/get_details_update",
            data:{id:id},
            
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>