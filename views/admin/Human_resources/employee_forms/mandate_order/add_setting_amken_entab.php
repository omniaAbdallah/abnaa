
<?php
//print_r($result);
if(isset($result)&&!empty($result))
{
    $mkan = $result->mkan;
    $distance=$result->distance;
 
    $out['form'] = 'human_resources/employee_forms/Mandate_orders/setting_amken_entab/'.$result->id;
}else{
    $mkan ='';
    $distance='';
 
    $out['form'] = 'human_resources/employee_forms/Mandate_orders/setting_amken_entab';
}

?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                          
                    <div class="col-md-4 col-sm-6  padding-4 ">
                        <label class=" label"> اسم المكان</label>
                        <input type="text" name="mkan" id="mkan" 
                               value="<?php echo $mkan;?>"  data-validation="required"
                               class="form-control ">
                    </div>

                    <div class="col-md-2 col-sm-6  padding-4 ">
                        <label class=" label">  

المسافه (كيلو متر):</label>
                        <input type="number" name="distance" id="distance" 
                               value="<?php echo $distance;?>"  data-validation="required"
                               class="form-control ">
                    </div>
                        <!-- yaraa22-9 -->
                     
            <div class="col-md-12 text-center">
            <span style="color: red" id="span_id"></span><br>
                <button type="submit"  class="btn btn-labeled btn-success " id="save" name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            <?php echo form_close();?>
                <div class="clearfix"></div><br>
                <?php
                if(isset($records)&&!empty($records)){
                    ?>
                    <table id="example" class=" display table table-bordered    responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg info">
                            <th>م</th>
                            <th> اسم المكان</th>
                            <th>   المسافة  </th>
                         
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->mkan;?></td>
                                <td><?php echo $row->distance ;?></td>
                              
<td>
    <!--***********/////////////////////////////********* 11 *****************//////////////-->
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
        window.location="<?= base_url() . 'human_resources/employee_forms/Mandate_orders/setting_amken_entab/' .$row->id ?>";
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
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/Mandate_orders/delete_settings/' . $row->id ?>";}, 500);
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
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

   

