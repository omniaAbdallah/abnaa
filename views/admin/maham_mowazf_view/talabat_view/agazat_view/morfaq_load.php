<?php if (isset($result)&&(!empty($result))) {
  if (in_array($result->no3_agaza,  array(3,4))) {
    ?>
    <?php echo form_open_multipart(base_url() . 'maham_mowazf/talabat/agazat/Vacation/add_attach') ?>

    <input type="hidden" name="agaza_rkm" value="<?php echo $result->agaza_rkm; ?>">


    <div class="form-group  padding-4">
        <label class="label ">تقرير المستشفى </label>
        <input type="file" name="hospital_report"
               id="hospital_report" class="form-control" style="width:80%;float: right;">

               <?php if (!empty($result->hospital_report)) {
               $display_report= 'block';
               $type = pathinfo($result->hospital_report)['extension'];
               $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
               $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
               if (in_array($type, $arry_images)) {
               $type_doc=1;
               } elseif (in_array(strtoupper($type), $arr_doc)) {
               $type_doc=2;
             }
               }else {
               $display_report='none';
               }?>
               <a class="btn btn-success btn-next"  style="float: right; display: <?=$display_report ?>"
                 href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $result->hospital_report .'/'.$type_doc.'/'.$type?>"
               target="_blank">
               <i class=" fa fa-eye"></i></a>
             </div>
             <br>
             <br>
             <div class="col-md-12 text-center">
               <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
                   <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
               </button>

             </div>
             <br>
             <br>
             <?php echo form_close() ?>

    <?php

  }
} ?>
