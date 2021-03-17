<style>
    .panel-body {
        padding: 15px;
    }
    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 20px;
        position: relative;
    }
    .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }
    .nav>li>a:hover, .nav>li>a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }
    .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }
    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 400px;
        overflow: scroll;
    }
    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
    }
    ul.nav-tabs.holiday-month>li>a {
        color: #222;
        font-weight: 600;
        padding: 5px 5px;
        font-size: 13px;
    }
</style>
<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/stylecrm.css" />-->
<!-- Main content -->
<section>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                <h3 class="panel-title">     التعريفات </h3>
                       
                        
                     
                    
                </div>
                <div class="panel-body">
                    <div class="col-sm-2">
                        <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
                            <li  role="presentation" >
                                <a <?php if(isset($disabled)){}else{echo 'href="#tab_device"';} ?>  aria-controls="tab_device" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>نوع الجهاز</a>
                            </li>
                            <li  role="presentation">
                                <a <?php if(isset($disabled)){}else{echo 'href="#tab_brands"';} ?> aria-controls="tab_brands" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الماركات</a>
                            </li>
                            <li  role="presentation" >
                                <a <?php if(isset($disabled)){}else{echo 'href="#tab_modals"';} ?>  aria-controls="tab_modals" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الموديلات</a>
                            </li>
                           
                        </ul>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content col-sm-10">
                    <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_device") {echo  'active'; }else if(isset($typee) && empty($typee)&& $typee !== "tab_modals" && $typee !== "tab_brands"){echo  'active';}  ?>" id="tab_device">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>نوع الجهاز</strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($brand) && !empty($brand) && $brand!=null){
                                        echo form_open_multipart('technical_support/device_card/Settings/UpdateSittingbrands/'.$brand['id'].'/tab_device');
                                    }
                                    else{
                                        echo form_open_multipart('technical_support/device_card/Settings/AddSittingbrands/'.'tab_device/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label "> نوع الجهاز </label>
                                        <input type="text" name="name" value="<?php if(isset($brand)) echo $brand['name'] ?>" class="form-control modals" autofocus data-validation="required">
                                    </div>
                                   
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_brand" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($devices) && !empty($devices) && $devices !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th> نوع الجهاز</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($devices as $key=>$value) {
                                                ?>
                                                <tr>
                                                    <td><?=($x++)?></td>
                                                    <td><?=$value->name?></td>
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
                                                            window.location="<?php echo base_url().'technical_support/device_card/Settings/UpdateSittingbrands/'.$key.'/tab_brands' ?>";
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
                                                            setTimeout(function(){window.location="<?=base_url()."technical_support/device_card/Settings/DeleteSittingbrands/tab_brands/".$key?>";}, 500);
                                                            });'>
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!----------------------------------------------------------------------->
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_brands") {echo  'active'; } ?>" id="tab_brands">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الماركة</strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($brand) && !empty($brand) && $brand!=null){
                                        echo form_open_multipart('technical_support/device_card/Settings/UpdateSittingbrands/'.$brand['id'].'/tab_brands');
                                    }
                                    else{
                                        echo form_open_multipart('technical_support/device_card/Settings/AddSittingbrands/'.'tab_brands/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label "> الاسم </label>
                                        <input type="text" name="name" value="<?php if(isset($brand)) echo $brand['name'] ?>" class="form-control modals" autofocus data-validation="required">
                                    </div>
                                   
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_brand" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($brands) && !empty($brands) && $brands !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th>الإسم</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($brands as $key=>$value) {
                                                ?>
                                                <tr>
                                                    <td><?=($x++)?></td>
                                                    <td><?=$value?></td>
                                                    <td>
                                                      <!--  <a href="<?php echo base_url().'technical_support/device_card/Settings/UpdateSittingbrands/'.$key.'/tab_brands' ?>" title="تعديل">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <span> </span>
                                                        <a href="<?=base_url()."technical_support/device_card/Settings/DeleteSittingbrands/tab_brands/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a> -->
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
                                                            window.location="<?php echo base_url().'technical_support/device_card/Settings/UpdateSittingbrands/'.$key.'/tab_brands' ?>";
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
                                                            setTimeout(function(){window.location="<?=base_url()."technical_support/device_card/Settings/DeleteSittingbrands/tab_brands/".$key?>";}, 500);
                                                            });'>
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_modals") {echo  'active'; }  ?>" id="tab_modals">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الموديل </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($brand) && !empty($brand) && $brand!=null){
                                        echo form_open_multipart('technical_support/device_card/Settings/UpdateSittingbrands/'.$brand['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('technical_support/device_card/Settings/AddSittingbrands/'.'tab_modals');
                                    }
                                    ?>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">الماركة</label>
                                        <select  name="from_id_fk" id="from_id_fk"   class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر الماركة </option>
                                            <?php foreach ($brands as $key=>$stage){
                                                $select=''; if(!empty($brand)){ if($brand['from_id_fk'] == $key){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $key; ?>"<?= $select?> <?php ?>><?php echo $stage ;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">الموديل</label>
                                        <input type="text" name="name" value="<?php if(isset($brand)) echo $brand['name'] ?>" class="form-control modals" autofocus data-validation="required">
                                    </div>
                                  
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_brand" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($modals) && !empty($modals) && $modals !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                            
                                                <th>الإسم</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($modals as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                 
                                                    <td><?=$value->name?></td>
                                                    <td>
                                                        <!--<a href="<?php echo base_url().'technical_support/device_card/Settings/UpdateSittingbrands/'.$value->id."/tab_modals"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."technical_support/device_card/Settings/DeleteSittingbrands/tab_modals/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a> -->
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
                                                            window.location="<?php echo base_url().'technical_support/device_card/Settings/UpdateSittingbrands/'.$value->id."/tab_modals"  ?>";
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
                                                            setTimeout(function(){window.location="<?=base_url()."technical_support/device_card/Settings/DeleteSittingbrands/tab_modals/".$value->id?>";}, 500);
                                                            });'>
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
<!-- yara -->
<script>
    function add_row(){
        $('#notfound').remove();
        var x= document.getElementById('tbody_insert').rows.length;
        var len = x +1;
        $("#tbody_insert").append('<tr id="'+ len +'">'
            +'</td><td><input type="input" name="reason['+ len +']" id="reason"  class="form-control" data-validation="reuqired"></td><td>' +
            '<a href="#"' +
            '  onclick="DeleteRow('+len+')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }
    function DeleteRow(value) {
        $('#notfound').remove();
        $('#' + value).remove();
        var len = value-1 ;
        if( len == 0){
            $("#tbody_insert").html('<tr id="notfound"></tr>');
        }
    }
</script>
<script>
function add_row1(){
    $('#mgls_notfound').remove();
    var x= document.getElementById('mgls_tbody_insert').rows.length;
    var len = x +1;
    $("#mgls_tbody_insert").append('<tr id="'+ len +'">'
        +'</td><td><input type="input" name="reason['+ len +']" id="reason"  class="form-control" data-validation="reuqired"></td><td>' +
        '<a href="#"' +
        '  onclick="DeleteRow('+len+')"> <i class="fa fa-trash" ></i> </a></td></tr>');
}
function DeleteRow(value) {
    $('#mgls_notfound').remove();
    $('#' + value).remove();
    var len = value-1 ;
    if( len == 0){
        $("#mgls_tbody_insert").html('<tr id="mgls_notfound"></tr>');
    }
}
</script>