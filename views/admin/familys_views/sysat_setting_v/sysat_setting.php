
<style>
.center {
  margin-left: auto;
  margin-right: auto;
}
.titletd{
    color: #0006c7 !important;
} 
</style>
    <form class="form-horizontal" action="<?=site_url('family_controllers/Sysat_setting/process')?>" method="post">
<?php
/*
echo $all_data->id;
echo'<pre>';
print_r($all_data);*/
 ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight center" style="width: 60%;">
           <!-- <thead>
                <th>Name</th>
                <th>Date</th>

            </thead>-->
            <tbody>
            <tr >
            <td colspan="3" style="background: #383838;
    color: white;">إعدادات السياسات العامة لإدارة الرعاية الإجتماعية </td>
            </tr>
                <tr>
                    <td class="titletd">سياسة التاريخ المستخدم لحساب الأعمار </td>
                    <td >  <select name="date_used" class="form-control">
                            <option value="medali" <?=$all_data->date_used == 'medali' ? "selected" : null ?>>الميلادي</option>
                            <option value="hijri" <?=$all_data->date_used == 'hijri' ? "selected" : null ?>>الهجري</option>

                        </select></td>
<td></td>
                   
                </tr>
                
                    <tr>
                    <td class="titletd">إشعار الملفات التي تحتاج لإعادة بحث قبل موعد التحديث </td>
                         <td><input name="alert_tahdeth" value="<?=$all_data->alert_tahdeth;?>"  type="number" class="form-control"  /></td>
                         <td>يوم</td>
                </tr>
                    <tr>
                    <td class="titletd">الفاصل الزمني بين مواعيد زيارات الباحث </td>
                     <td><input name="fasel_zeyara" value="<?=$all_data->fasel_zeyara;?>" type="number" class="form-control"  /></td>
                      <td>دقيقة</td>
                </tr>
                
                
            </tbody>
            
             <tfoot>
    <tr>
     <td></td> 
      <td colspan="2">

       <button type="submit" name="add" class="btn btn-success btn-flat"><i class="fa fa-floppy-o" aria-hidden="true"></i>
حفظ </button>
                      

      
      </td>
     
    </tr>
  </tfoot>
        </table>
    </div>
</form>