<div class="panel-body" style="height: 400px; overflow-y: scroll;margin-top: 56px;">
                <div class="col-sm-12 col-xs-12 no-padding">                    <?php function buildTree($tree)
                    {
                        $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
                        ?>
                        <ul id="tree3">  
                                                  <?php foreach ($tree as $record) { ?>
                                                  <div>
                                <li>
                                    <?php
                                      $types_ways = array(1 => 'تجميعي', 2 => 'متوسط', 3 => 'اعلي رقم', 4 => 'اقل رقم'); 
                                            if ($record->level == 3) { ?>
                                           المؤشر <a data-toggle="modal" data-target="#add_editAccounDalel"
                                       onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());">
                                        <span class="dalel-num" style="background-color: <?= $color[$record->level] ?>">                                   
                                         <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                         <span>[<?php foreach ($types_ways as $key => $value) {
                                        $select = '';
                                        if($types_ways != '') {
                                            if ($key == $record->tareket_hesab) {
                                               echo $value;
                                            }} }?>
                                         -
                                         <?php
                                         $types = array(1 => 'رقم', 2 => 'نسبه');
                                         foreach ($types as $key => $value) {
                                        $select = '';
                                        if($types != '') {
                                            if ($key == $record->no3_wehda_quas) {
                                               echo $value;
                                            }} }?>
                                         -<?=$record->want_value?>  <?=$record->wehda_quas?>]</span>
                                    </a>
                                            <?php }elseif($record->level == 2){?>
                                               السياسه <a data-toggle="modal" data-target="#add_editAccounDalel"
                                       onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());"> <span class="dalel-num"
                                                                                                       style="background-color: <?= $color[$record->level] ?>">                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                    </a>
                                            <?php }elseif($record->level == 1){?>
                                               الهدف الاستراتيجي <a data-toggle="modal" data-target="#add_editAccounDalel"
                                       onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());"> 
                                       <span class="dalel-num"
                                                                                                       style="background-color: <?= $color[$record->level] ?>">                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                    </a>
                                            <?php }?>
                                    <div class="pull-right">                                         <?php if ($record->parent != 0) {
                                                    if ($record->level == 3) { ?>
                                                    
                                                         <!--yara  -->
                                                        
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
        setTimeout(function(){window.location="<?= base_url() . 'gwd/Gawda_plans/deleteAccount/' .$record->id . '/' . $record->plan_rkm ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
                                                        <!-- yara -->
                                                        
                                                        
                                                                                             <?php }
                                                } ?>
                                            <?php 
                                            if ($record->level == 1) { ?>
                                         <a title="إضافة" id="add_account" data-toggle="modal"
                                                data-target="#add_editAccounDalel" data-parent="<?= $record->id ?>"
                                                data-parent_name="<?= $record->code . '--' . $record->name ?>"
                                                data-parent_code="<?= $record->code ?>"
                                                data-ttype="<?= $record->ttype ?>" data-level="<?= $record->level ?>"
                                                onclick="add_editAccounDalel(0,1,this,<?= $record->code ?>,<?= $record->level ?>,$('#plan_rkm').val());"><i
                                                    class="fa fa-plus-square" style="
">
                                                   اضافه سياسه
                                                    </i></a> 
                                            <?php }elseif ($record->level == 2){?>
                                                <a title="إضافة" id="add_account" data-toggle="modal"
                                                data-target="#add_editAccounDalel" data-parent="<?= $record->id ?>"
                                                data-parent_name="<?= $record->code . '--' . $record->name ?>"
                                                data-parent_code="<?= $record->code ?>"
                                                data-ttype="<?= $record->ttype ?>" data-level="<?= $record->level ?>"
                                                onclick="add_editAccounDalel(0,1,this,<?= $record->code ?>,<?= $record->level ?>,$('#plan_rkm').val());"><i
                                                    class="fa fa-plus-square">
                                                    اضافه مؤشر
                                                    </i></a> 
                                            <?php }?>
                                                    <a data-toggle="modal"
                                                                                          data-target="#add_editAccounDalel"
                                                                                          onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());"
                                                                                          title="تعديل "><i
                                                    class="fa fa-pencil-square"></i>
                                                    </a>
                                    </div> <?php if (isset($record->subs)) {
                                        buildTree($record->subs);
                                    } ?>                              
                                      </li>        </div>                         <?php } ?>
                        </ul>                        <?php }
                    if (isset($tree) && $tree != null) {
                        buildTree($tree);
                    } ?>                </div>
            </div>