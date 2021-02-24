<style>
    .cke_toolbar_break {
        display: none;
        clear: left;
    }
</style>
<div class="container">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
        <div class="col-xs-12">
            <div class="personality">
               
               
              
                
                <div class="col-xs-12 no-padding">
                  
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr >
                                <th class="info">إسم  الأسرة</th>
                                <td class="text-center"><?php echo $file_num_data['father_full_name'] ?></td>
                                <th class="info">رقم الملف</th>
                                <td class="text-center"><?php echo $_POST['file_num'] ?></td>
                                <th class="info"> الفئة</th>
                                <td class="text-center"><?php echo $file_num_data['family_cat_name'] ?></td>
                           
                              
                            </tr>
                            <tr>

                            <th class="info">  الحي</th>
                            <td class="text-center"><?php echo $file_num_data['hai_name'] ?></td>

                            <th class="info">تاريخ التسجيل</th>
                            <td class="text-center"><?php echo $file_num_data['file_update_date'] ?></td>


                            <th class="info">عدد أفراد الأسرة</th>
                            <td class="text-center"><?php echo $family_members_num; ?></td>
                            </tr>

                            <tr>

<th class="info">  هاتف</th>
<td class="text-center"><?php echo $file_num_data['contact_mob'] ?></td>

</tr>




                            </thead>
                            <tbody>
                         
                            </tbody>
                        </table>
                        <input type="hidden" name="osra_name" value="<?php echo $file_num_data['father_full_name'] ?>">
                        <input type="hidden" name="fe2a_n" value="<?php echo $file_num_data['family_cat_name'] ?>">
                        <input type="hidden" name="hai_id" value="<?php echo $file_num_data['hai_id'] ?>">
                        <input type="hidden" name="hai_name" value="<?php echo $file_num_data['hai_name'] ?>">
                        <input type="hidden" name="tasgel_date" value="<?php echo $file_num_data['file_update_date'] ?>">
                        <input type="hidden" name="num_afrad" value="<?php echo $family_members_num; ?>">
                        <input type="hidden" name="contact_mob" value="<?php echo $file_num_data['contact_mob'] ?>">

                        
                    </div>
                    
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 form-group 4 text-center">
            <input type="hidden" name="save" id="save" value="save">

            <?php if (!empty($result)) {
                $onclick = '';
                $type = 'submit';
            } else {
                $type = 'button';
                $onclick = 'add()';
            } ?>
            <button type="<?php echo $type; ?>" onclick="<?php echo $onclick; ?>"
                    class="btn btn-labeled btn-success " name="save" value="save">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
        </div>
    </div>
</div>

<script>
 
    function add() {
      
                $('#save').val('save');
                $('#myform').submit();
          
    }
</script>