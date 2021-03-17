

<?php 
if($from_date != null){
    $from_date = $from_date;
}else{
  $from_date = date('Y-m-d');  
}

if($to_date != null){
$to_date = $to_date;
}else{
  $to_date = date('Y-m-d');  
}
?>
 <div class="col-sm-12 form-group">
                <?php echo form_open_multipart('human_resources/employee_forms/namazegs/Namazeg/process');  ?>
          <input type="hidden" name="rkm_id" value="<?=$rkm_id?>" />        
                <div class="col-sm-12  col-md-6 padding-4 ">
                    <label class="label label-green  ">من تاريخ</label>
                    <input type="date" name="from_date" class="form-control "
                           id="from_date"value="<?=$from_date?>" />
          
                </div>
                
                
                <div class="col-sm-12  col-md-6 padding-4 ">
                    <label class="label label-green  ">إلي تاريخ</label>
                    <input type="date" name="to_date" class="form-control "
                           id="to_date"value="<?=$to_date?>" />
        
                </div>
                  
                



 







         <div class="col-sm-12  col-md-12 padding-4 ">
          <button type="submit" style="float: left; margin-top: 10px;" class="btn btn-labeled btn-sm btn-success " name="add_days" value="add_days">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
       </div>
                        <?php echo form_close(); ?>
            <!-- /.row -->
          </div>