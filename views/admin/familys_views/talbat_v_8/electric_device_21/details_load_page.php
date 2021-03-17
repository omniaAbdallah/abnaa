<style>
    .cke_toolbar_break {
        display: none;
        clear: left;
    }
    .info{
        width: 10% !important;
        background-color: #e4e4e4 !important;
    }
    .table>thead>tr>td.info, 
    .table>tbody>tr>td.info,
     .table>tfoot>tr>td.info, 
     .table>thead>tr>th.info, 
     .table>tbody>tr>th.info, 
     .table>tfoot>tr>th.info,
      .table>thead>tr.info>td,
       .table>tbody>tr.info>td,
        .table>tfoot>tr.info>td,
         .table>thead>tr.info>th, 
         .table>tbody>tr.info>th, 
         .table>tfoot>tr.info>th{
                border-top: 1px solid #ffffff !important;
    border-right: 1px solid #ffffff !important;
    background-color: #e4e4e4 !important;
    color: black !important;
    font-size: 15px !important;
         }
        .infotd{
            width: 27%;
                background: #f7f7f7 !important;
        } 
        .table-bordered.bor >
         thead > tr > th, 
         .table-bordered > tbody > tr > th,
          .table-bordered.bor > tfoot > tr > th,
           .table-bordered > thead > tr > td,
            .table-bordered.bor > tbody > tr > td,
             .table-bordered > tfoot > tr > td{
                border: none !important;
             }
</style>


        <div class="col-xs-12">
      
        <table class="table table-bordered ">
                            <thead>
                            <tr>
                            <td style="background-color: #e4e4e4 !important;" colspan="6">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>

                            بيانات الأسرة </td>
                            </tr>
                            <tr >
                                <th class="info"><i class="fa fa-id-card-o" aria-hidden="true"></i> إسم  الأسرة</th>
                                <td class="infotd text-center">
                               <?php echo $file_num_data['father_full_name'] ?> 
                                <input type="hidden" class="form-control"  name="osra_name" value="<?php echo $file_num_data['father_full_name'] ?>">
                                
                                </td>
                               
                              
                            </tr>
                            <tr>
                            <th class="info">
                                <i class="fa fa-file-o" aria-hidden="true"></i> رقم الملف</th>
                                <td class="infotd text-center">
                                <?php echo $_POST['file_num'] ?>
                                <!-- <input type="text" class="form-control" readonly  value="<?php echo $_POST['file_num'] ?>"> -->
                                </td>
                               
                            </tr>

                            <tr>

<th class="info"><i class="fa fa-phone-square" aria-hidden="true"></i>   جوال التواصل</th>
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
                            <th class="info"> <i class="fa fa-users" aria-hidden="true"></i> عدد أفراد الأسرة</th>
                            <td class="infotd text-center">
                          
                           <?php echo $family_members_num; ?> 
                           
                            </td>
                            </tr>
</thead>
                            <tbody>
                         
                            </tbody>
                        </table>
                      
            </div>
      
        <div class="col-sm-12 form-group 4 text-center" style="margin-top: 291px;
    margin-right: -647px;">
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

<script>
 
    function add() {
      
                
        $('#save').val('save');
                   
                    $('#myform').submit();
               
    }
</script>