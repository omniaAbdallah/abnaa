    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
    <div class="panel-title">
    <h4><?= $title ?></h4>
    </div>
    </div>
    <div class="panel-body">
    <?php
    if (isset($bnod_data) && !empty($bnod_data)) {
    echo form_open_multipart('st/settings/Bnod_setting/update_rabt_bnod/' . $bnod_data->id);
    } else {
    echo form_open_multipart('st/settings/Bnod_setting/rabt_bnod');
    }
    ?>
    <?php 
    /*
    echo '<pre>';
    print_r($all_bnods);*/
    $rkm_hesab = '';
    $hesab_name = '';
    ?>
    <div class="col-md-3 col-sm-6 padding-4">
    <h6 class="label_title_1 ">البنود </h6>
    <select type="text" name="band_fk"
    class="form-control  " data-validation-has-keyup-event="true">
    <option>إختر</option>
    <?php  if(isset($all_bnods) &&(!empty($all_bnods))) {
    foreach ($all_bnods as $band){
    ?>
    <option value="<?=$band->id?>|<?=$band->code?>"><?=$band->title?></option>
    <?php
    }
    }?>
    </select>
    </div>
    <div class="form-group col-sm-3 ">
    <label class=""> كود الحساب </label>
    <input type="hidden" name="modalID" id="modalID">
    <input type="text" class="form-control  testButton inputclass" name="rkm_hesab"
    id="rkm_hesab"
    readonly="readonly"
    onclick="$('#modalID').val(); "
    ondblclick="$('#myModal').modal('show');"
    style="cursor:pointer;float: right;width: 87%"
    data-validation="required"
    value="<?= $rkm_hesab ?>">
    <button type="button" onclick="$('#myModal').modal('show');"
    class="btn btn-success btn-next" style="float: left;">
    <i class="fa fa-plus"></i></button>
    </div>
    <div class="form-group col-sm-3 ">
    <label class=""> اسم الحساب </label>
    <input type="text" class="form-control  testButton inputclass" name="hesab_name"
    id="hesab_name"
    readonly="readonly"
    style="cursor:pointer;border: white;color: black"
    data-validation="required"
    value="<?= $hesab_name ?>">
    </div>
   
    <button style="margin-top: 32px;" type="submit" class="btn btn-labeled btn-success " name="save" value="save"
    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>
  
    <?php
    echo form_close();
    ?>
    <?php 
    if (!empty($rabted_bnods)) { ?>
    <div class="col-sm-12">
    <br><br>
    <table id="example" class="table  table-bordered table-striped table-hover">

    <thead>
    <tr class="info">
    <th class="text-center">م</th>
    <th class="text-center">إسم البند</th>
    <th class="text-center">رقم الحساب</th>
    <th class="text-center">إسم الحساب</th>
    <th class="text-center">الإجراء</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php $x = 1;
    foreach ($rabted_bnods as $band){
    ?>
    <td class="text-center"><?php echo $x; ?></td>
    <td class="text-center"><?php echo $band->band_name; ?></td>
    <td class="text-center"><?php echo $band->rkm_hesab; ?></td>
    <td class="text-center"><?php echo $band->hesab_name; ?></td>
    <td>
    <a href="#" onclick='swal({
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
    window.location="<?php echo base_url(); ?>st/settings/Bnod_setting/DeleteRabtedBand/<?php echo $band->id; ?>";
    });'>
    <i class="fa fa-trash"> </i></a>
    </td>
    </tr>
    <?php $x++;
    } ?>
    </tbody>
    </table>
    </div>
    <?php } ?>
    </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">الدليل المحاسبي </h4>
    </div>
    <div class="modal-body">
    <?php //if(!empty($tree)) {
    ?>
    <table id="" class="table table-bordered example" role="table">
    <thead>
    <tr class="info">
    <th style="font-size: 15px; width:88px !important; ">م</th>
    <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
    <th style="font-size: 15px;" class="text-left">إسم الحساب</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($tree) && $tree != null) {
    buildTreeTable($tree);
    }
    function buildTreeTable($tree, $count = 1)
    {
    $types = array(1 => 'رئيسي', 2 => 'فرعي');
    $nature = array('', 'مدين', 'دائن');
    $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
    $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
    foreach ($tree as $record) {
    if ($record->hesab_no3 == 2) {
    }
    ?>
    <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
    onclick="update_rkm_hesab(<?= $record->hesab_no3 ?>,<?= $record->code ?>,'<?= $record->name ?>')">
    <td class="forTd"><?= $count++ ?></td>
    <td class="forTd"><?= $record->code ?></td>
    <td class="forTd"><?= $record->name ?></td>
    </tr>
    <?php
    if (isset($record->subs)) {
    $count = buildTreeTable($record->subs, $count++);
    }
    }
    return $count;
    }
    ?>
    </tbody>
    </table>
    <?php // } ?>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
    </div>
    </div>
    </div>
    </div>
    <script>
    function update_rkm_hesab(hesab_no3, rkm_hesab, hesab_name) {
    if (hesab_no3 == 2) {
    $('#rkm_hesab').val(rkm_hesab);
    $('#hesab_name').val(hesab_name);
    $('#myModal').modal('hide');
    } else {
    alert('ليس حساب فرعي');
    }
    }
</script>