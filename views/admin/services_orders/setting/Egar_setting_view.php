<style>
    .panel-body {
        padding: 15px;
    }

    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 5px;
        position: relative;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #09704e;
        border-right-color: #09704e;
        background-color: #09704e;
        color: #fff !important;
    }

    .nav > li > a:hover, .nav > li > a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #09704e;
        border-right-color: #09704e;
        background-color: #09704e;
        color: #fff;
    }

    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 400px;
        overflow: scroll;
    }

    .nav-tabs > li > a:hover {
        border-color: #eee #eee #ddd;
    }

    ul.nav-tabs.holiday-month > li > a {
        color: #222;
        font-weight: 600;
        padding: 5px 5px;
        font-size: 13px;
    }

    .no-dt-buttons div.dt-buttons {
        display: none !important;
    }

    .no-dt-buttons .dataTables_filter {
        width: 100% !important;

    }

    .no-dt-buttons .dataTables_paginate {

        width: 60%;

    }

    .no-dt-buttons .dataTables_wrapper .dataTables_info {
        width: 40%;
    }
</style>

<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/stylecrm.css" />-->

<!-- Main content -->

<div class="col-sm-12 padding-4">


    <div class="col-sm-2 padding-4">
        <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
            <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray != null) {
                $x = 0;
                foreach ($this->myarray as $key => $value) {?>

                    <?php if (isset($typee) && !empty($typee) && $typee) {
                        $active = "";
                        if ($typee == $key) {
                            $active = 'active';
                            $value = $value;
                        }
                    } ?>
                    <li class="<?php if (isset($typee) && !empty($typee) && $typee) {
                        echo $active;
                    } else {
                        echo ($x == 0) ? 'active' : '';
                    } ?>"  style="float: right; width: 100%;">

                        <a <?php  echo 'href="#tab' . $key . '"'; ?>
                                data-toggle="tab"> <i class="fa fa-cog" aria-hidden="true"></i> <?= $value ?>
                        </a>
                    </li>

                    <?php $x++;
                }
            } ?>


        </ul>
    </div>
    <!-- Tab panels -->
    <div class="tab-content col-sm-10 padding-4">
        <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
            $x = 0;
            foreach ($this->myarray as $key=>$value){?>
                <?php if(isset($typee) && !empty($typee) && $typee) {
                    $active ="";
                    if($typee == $key ){
                        $active = 'active';
                        $value = $value;
                    }

                }
                ?>
                <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)) {echo $active; }else {echo ($x == 0)? 'active':''; }  ?>" id="tab<?= $key ?>">
                    <div class="panel-body">
                        <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                <i class="fa fa-cog" aria-hidden="true"></i>

                                <?=$value?>
                            </strong></a>
                        <div class="table-responsive">
                            <?php
                            if(isset($record) && !empty($record) && $record!=null){
                                echo form_open_multipart('services_orders/setting/Egar_setting/UpdateSetting/'.$id.'/'. $key);

                                echo '<input type="hidden" name="from_code" value="'.$record['from_code'].'" >';

                            }
                            else{
                                echo form_open_multipart('services_orders/setting/Egar_setting/AddSetting/'.$key);
                            }
                            ?>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label class="label"> العنوان</label>
                                <input type="text" name="title" value="<?php if(isset($record)) echo $record['title'] ?>" class="form-control" autofocus data-validation="required">

                            </div>

                            <?php if ($key == 501){?>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label class="label"> عدد الايام </label>
                                    <input type="number" name="num_days" id="num_days" value="<?php if(isset($record)) echo $record['num_days'] ?>"
                                           data-validation="required" class="form-control "
                                           data-validation-has-keyup-event="true">
                                </div>

                            <?php } ?>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label class="label"> اللون</label>
                                <input type="color" name="color" id="color" value="<?php if(isset($record)) echo $record['color'] ?>"
                                       data-validation="required" class="form-control "

                                       data-validation-has-keyup-event="true">
                            </div>


                            <div class="form-group col-sm-12 col-xs-12 text-center">

                                <button type="submit" name="add" value="حفظ" class="btn btn-sm btn-success btn-labeled "><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
                                </button>

                            </div>
                            </form>
                            <?php if (isset($all) && !empty($all) && $all !=null){ ?>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th>العنوان</th>
                                        <?php if ($key == 501){?>
                                            <th>عدد الايام</th>
                                        <?php }?>
                                        <th>الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x = 1;
                                    if (isset($all[$key]) && !empty($all[$key]) && $all[$key] !=null){
                                        foreach ($all[$key] as $value) {
                                            ?>
                                            <tr>
                                                <td><?=($x++)?></td>
                                                <td style="background-color:<?=$value->color?>" ><?=$value->title?></td>
                                                <?php if ($key == 501){?>
                                                    <td ><?=$value->num_days?></td>
                                                <?php }?>

                                                <td>
                                                    <a href="<?php echo base_url().'services_orders/setting/Egar_setting/UpdateSetting/'.$value->id."/".$key  ?>" title="تعديل">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                    <span> </span>
                                                    <a href="<?=base_url()."services_orders/setting/Egar_setting/DeleteSetting/".$value->id."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }else{
                                        echo '<tr>
                                                    <td colspan="5"> لايوجد بيانات </td>
                                                    </tr>';
                                    } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php  $x++; } } ?>
    </div>


</div>





