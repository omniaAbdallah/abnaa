<style>
        fieldset {
            border: 1px solid #ddd !important;
            margin: 0;
            xmin-width: 0;
            padding: 10px;
            position: relative;
            border-radius: 4px;
            background-color: #f5f5f5;
            padding-left: 10px !important;
        }

        legend {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }
        .form-group .help-block.form-error {
            display: block !important;
        }
        /* .check-style {
            display: inline-block;
        } */
        .check-style {
    display: inline-block;
    width: 100px;
        }
        .help-block.form-error {
    /* display: none; */
}
    </style>
<style>
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
    }

    .box-footer {
        float: right;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff;
    }

    .mailbox-attachment-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        padding: 20px 10px;
    }

    .mailbox-attachment-icon, .mailbox-attachment-info, .mailbox-attachment-size {
        display: block;
    }

    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }

    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .mailbox-attachment-icon.has-img > img {
        max-width: 100%;
        height: 115px;
        width: -webkit-fill-available;
    }

    .cke_toolbar_break {
        display: none;
        clear: left;
    }

    .info {
        width: 10% !important;
        background-color: #e4e4e4 !important;
    }

    .table > thead > tr > td.info,
    .table > tbody > tr > td.info,
    .table > tfoot > tr > td.info,
    .table > thead > tr > th.info,
    .table > tbody > tr > th.info,
    .table > tfoot > tr > th.info,
    .table > thead > tr.info > td,
    .table > tbody > tr.info > td,
    .table > tfoot > tr.info > td,
    .table > thead > tr.info > th,
    .table > tbody > tr.info > th,
    .table > tfoot > tr.info > th {
        border-top: 1px solid #ffffff !important;
        border-right: 1px solid #ffffff !important;
        background-color: #e4e4e4 !important;
        color: black !important;
        font-size: 15px !important;
    }

    .infotd {
        width: 27%;
        background: #f7f7f7 !important;
    }

    .table-bordered.bor >
    thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered.bor > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered.bor > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: none !important;
    }
</style>
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
           
<div class="col-xs-8 no-padding  ">
<?php
                    if(isset($evaluations[0]) && !empty($evaluations[0])){
             
                        echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/updateEvaluation/'.$evaluations[0]->id.'/'.$evaluations[0]->file_num.'/'.$evaluations[0]->talb_id_fk);
                    }
                    else{
                       
                        echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/start_interview/'. $id.'/'.$file_num);
                    }
                    ?>
<table  class="table " cellspacing="0" width="100%">
<thead>
<tr class="info">
    <th>م</th>
    <th>التقييم</th>
    <th>بنود التقييم </th>
    <th>الدرجه </th>
 
</tr>
</thead>
<tbody>
<?php
$x = 1;

    ?>
<tr>
    <td  rowspan=" <?php echo sizeof($branch)?>" ><?php echo $x;?></td>
    <td rowspan=" <?php echo sizeof($branch)?>" class="info" >السمات الشخصية</td>
    
<?php

foreach($branch as $record){
    $x++;
    ?>
  
  
  
        <td><?php echo $record->title; ?></td>
        <input type="hidden" name="talb_id_fk" value="<?php echo $id;?>">
        <input type="hidden" id="file_num" name="file_num" value="<?php echo $file_num;?>">
        <input type="hidden" name="branch_id_fk[]" value="<?php echo $record->id;?>">
        <input type="hidden" name="branch_name[]" value="<?php echo $record->title;?>">
  
                   <td> <div class="check-style"  >
                                            <input type="checkbox" id="degree1<?php echo $record->id;?>" name="degree[]"
                                            data-id="degree<?php echo $record->id;?>"
                                            onclick="check_radio(this)"
                                             data-validation="" data-validation-qty="1-1"
                                            <?php   if(isset($details)&&!empty($details)) {
                                foreach($details as $row)
                                {
                                    if($record->id==$row->band_id_fk && $row->degree == "excellent")
                                    {
                                        echo "checked";
                                    }
                                }
                             
                            }else{
                                echo "checked"; 
                            }
                            
                            ?>
                                                   value="excellent">
                                            <label for="degree1<?php echo $record->id;?>" class="">ممتاز </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="degree2<?php echo $record->id;?>" name="degree[]"
                                            data-id="degree<?php echo $record->id;?>"
                                             data-validation="" data-validation-qty="1-1"
                                                   onclick="check_radio(this)"
                                                   <?php   if(isset($details)&&!empty($details)) {
                                foreach($details as $row)
                                {
                                    if($record->id==$row->band_id_fk && $row->degree == "verygood")
                                    {
                                        echo "checked";
                                    }
                                }
                             
                            } ?>
                                                   value="verygood">
                                            <label for="degree2<?php echo $record->id;?>" class="">جيد جدا </label>
                                        </div>
                                        <div class="check-style">
                                            <input type="checkbox" id="degree3<?php echo $record->id;?>" name="degree[]"
                                            data-id="degree<?php echo $record->id;?>"
                                            onclick="check_radio(this)"
                                             data-validation="" data-validation-qty="1-1"
                                            <?php   if(isset($details)&&!empty($details)) {
                                foreach($details as $row)
                                {
                                    if($record->id==$row->band_id_fk && $row->degree == "poor")
                                    {
                                        echo "checked";
                                    }
                                }
                             
                            } ?>
                                                   value="poor">
                                            <label for="degree3<?php echo $record->id;?>" class="">ضعيف </label>
                                        </div>
                                        </td>
        
        </tr>
    <?php    }?>
    <?php
$x = 2;

    ?>
<tr>
    <td  rowspan=" <?php echo sizeof($branch2)?>" ><?php echo $x;?></td>
    <td rowspan=" <?php echo sizeof($branch2)?>" class="info" >ما يخص المشروع</td>
    
<?php

$degree=0;
foreach($branch2 as $record){
    $x++;
  
    ?>
  
  <input type="hidden" name="branch_id_fk[]" value="<?php echo $record->id;?>">
        <input type="hidden" name="branch_name[]" value="<?php echo $record->title;?>">
 
   
        <td><?php echo $record->title; ?></td>

  
                   <td> <div class="check-style">
                                            <input type="checkbox" id="degree1<?php echo $record->id;?>" name="degree[]"
                                            data-id="degree<?php echo $record->id;?>"
                                            onclick="check_radio(this)"
                                            data-validation="required " data-validation-qty="1-1"
                                                   <?php   if(isset($details)&&!empty($details)) {
                                foreach($details as $row)
                                {
                                    if($record->id==$row->band_id_fk && $row->degree == "excellent")
                                    {
                                        echo "checked";
                                    }
                                }
                             
                            }else{
                                echo "checked"; 
                            } ?>
                                                   value="excellent">
                                            <label for="degree1<?php echo $record->id;?>" class="">ممتاز </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="degree2<?php echo $record->id;?>" name="degree[]"
                                            data-id="degree<?php echo $record->id;?>"
                                            onclick="check_radio(this)"
                                            data-validation=" required" data-validation-qty="1-1"
                                                   <?php   if(isset($details)&&!empty($details)) {
                                foreach($details as $row)
                                {
                                    if($record->id==$row->band_id_fk && $row->degree == "verygood")
                                    {
                                        echo "checked";
                                    }
                                }
                             
                            } ?>
                                                   value="verygood">
                                            <label for="degree2<?php echo $record->id;?>" class="">جيد جدا </label>
                                        </div>
                                        <div class="check-style">
                                            <input type="checkbox" id="degree3<?php echo $record->id;?>" name="degree[]"
                                            data-id="degree<?php echo $record->id;?>"
                                            onclick="check_radio(this)"
                                            data-validation="required" data-validation-qty="1-1"
                                            <?php   if(isset($details)&&!empty($details)) {
                                foreach($details as $row)
                                {
                                    if($record->id==$row->band_id_fk && $row->degree == "poor")
                                    {
                                        echo "checked";
                                    }
                                }
                             
                            } ?>
                                                   value="poor">
                                            <label for="degree3<?php echo $record->id;?>" class="">ضعيف </label>
                                        </div>

                                        
                                        </td>
        
        </tr>
    <?php    }?>
 
</tbody>
</table>
<div class="col-md-12 text-center">
                <button type="submit" id="buttons"  value="حفظ" class="btn btn-success btn-labeled"  name="add"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
            </div>
 </div>   
<?php
echo form_close();
?>     


             

               
<!-- </div> -->

<div class="col-md-4 text-center" id="">
<!--  -->
<div class="col-xs-12">

    <table class="table table-bordered ">
        <tbody>
        <tr>
            <td style="background-color: #e4e4e4 !important;" colspan="6">
                <i class="fa fa-info-circle" aria-hidden="true"></i>

                بيانات الأسرة
            </td>
        </tr>
        <tr>
            <th class="info"><i class="fa fa-id-card-o" aria-hidden="true"></i> إسم الأسرة</th>
            <td class="infotd text-center">
                <?php echo $file_num_data['father_full_name'] ?>
                <input type="hidden" class="form-control" name="osra_name"
                       value="<?php echo $file_num_data['father_full_name'] ?>">

            </td>


        </tr>
        <tr>
            <th class="info">
                <i class="fa fa-file-o" aria-hidden="true"></i> رقم الملف
            </th>
            <td class="infotd text-center">
                <?php echo $file_num_data['file_num'] ?>
                <!-- <input type="text" class="form-control" readonly  value="<?php echo $_POST['file_num'] ?>"> -->
            </td>

        </tr>

        <tr>

            <th class="info"><i class="fa fa-phone-square" aria-hidden="true"></i> جوال التواصل</th>
            <td class="infotd text-center">

                <?php echo $file_num_data['contact_mob'] ?>
                <!-- <input type="text" readonly class="form-control" name="contact_mob" value="<?php echo $file_num_data['contact_mob'] ?>"> -->
            </td>

        </tr>
        <tr>
            <th class="info"> الفئة</th>
            <td class=" infotd text-center">

                <?php echo $file_num_data['family_cat_name'] ?>
            </td>
        </tr>
        <tr>
            <th class="info"><i class="fa fa-calendar-o" aria-hidden="true"></i> تاريخ التسجيل</th>
            <td class="infotd text-center">
                <?php echo $file_num_data['file_update_date'] ?>

            </td>
        </tr>
        <tr>
            <th class="info"><i class="fa fa-users" aria-hidden="true"></i> عدد أفراد الأسرة</th>
            <td class="infotd text-center">

                <?php echo $file_num_data['mother_num'] + $file_num_data['member_num']; ?>

            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td>
                <button type="button" class="btn btn-sm btn-primary">تفاصيل وشروط الخدمة</button>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-success">تفاصيل ملف الأسرة</button>
            </td>
        </tr>
        </tfoot>
    </table>

</div>
<!--  -->
 </div>

 </div>
</div>
</div>
</div>




<script type="text/javascript">
    
function check_radio(data)
{
   
        
            var input_name = $(data).attr('data-id');
            console.log(input_name);
            $('input[data-id=' + input_name + ']').prop('checked', false);

            $(data).prop('checked', true);
     
}
        
   
</script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
