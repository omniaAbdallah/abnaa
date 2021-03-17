<style type="text/css">
    .pdd{
        margin: 0;padding: 0
        }
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 140px;
        height: 140px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    input[type=radio] {
        height: 20px;
        width: 20px;
    }
label.label-green {
    display: inline-block;
    width: 100%;
}
label.label-green {
    height: auto;
    line-height: unset;
    font-size: 16px !important;
    font-weight: 600 !important;
    text-align: right !important;
    margin-bottom: 0;
    background-color: transparent;
    color: #002542;
    border: none;
    padding-bottom: 0;
    font-weight: bold;
}
.half {
    width: 100% !important;
    float: right !important;
}
</style>
<?php
            $this->load->model("familys_models/Register");
            $data_load["basic_data_family"] = $basic_data_family;
            $data_load["mother_num"] = $mother_national_num;
            $data_load["person_account"] = $basic_data_family["person_account"];
            $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
            $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
            $data_load["file_num"] = $basic_data_family["file_num"];
           $data_load["employees"] = $employees;
            $this->load->view('admin/familys_views/drop_down_button', $data_load); ?>

            
            <?php  if(isset($all_data) && !empty($all_data)){ ?>
                <div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
                <table id="example" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>

                        <th  class="text-center">تاريخ الزيارة  </th>
                        <th  class="text-center"> وقت الزيارة </th>
                        <th   class="text-center"> وسيلة الاتصال </th>
                        <th class="text-center">نتيجة المكالمة</th>
                        <th class="text-center"> القائم بالزيارة </th>
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->visit_date; ?></td>
                <td><?php echo $record->visit_time; ?></td>
                <td><?php foreach ($method_etsal as $row){
            if(isset($record->wasela_etsal)){
                if($record->wasela_etsal== $row->conf_id ){ echo $row->title;}
            }}?>
         </td>
         <td><?php foreach ($natega_etsal as $row){
            if(isset($record->contact_result)){
                if($record->contact_result== $row->conf_id ){ echo $row->title;}
            }}?>
         </td>
              
                <td><?php echo $record->emp_name; ?></td>
              
                <td>


<a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/Update/' .$record->id.'/'.$record->mother_national_num	 ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
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
        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/delete/' .$record->id .'/'.$record->mother_national_num ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>

</td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>
            <?php }else{ ?>
                <div class="alert alert-danger"> <strong>لا يوجد بيانات !</strong> .

</div>
            <?php }?>
            <!-------------------------------------------------------------------------------------->
       
<!----------------------------------------------------------------->

<!---------------------------------------------->



