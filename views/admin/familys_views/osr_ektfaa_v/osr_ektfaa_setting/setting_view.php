<style>
    .panel-body {
        padding: 15px;
    }
    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 10px;
        position: relative;
    }
    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }
    .nav > li > a:hover, .nav > li > a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }
    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff !important;
    }
    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 590px;
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
</style>
<section>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo $title ; ?></h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-2 padding-4">
                    <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
                        <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray != null ) {
                            $x = 0;
                            foreach ($this->myarray as $key => $value) {
                                ?>
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
                                } ?>">
                                    <a <?php if (isset($record)) {
                                    } else {
                                        echo 'href="#tab' . $key . '"';
                                    } ?> data-toggle="tab">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <?= $value ?></a></li>
                                <?php $x++;
                            }
                        } ?>
                    </ul>
                </div>
                <!-- Tab panels -->
                <div class="tab-content col-sm-10">
                    <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray != null) {
                        $x = 0;
                        foreach ($this->myarray as $key => $value) {
                            ?>
                            <?php if (isset($typee) && !empty($typee) && $typee) {
                                $active = "";
                                if ($typee == $key) {
                                    $active = 'active';
                                    $value = $value;
                                }
                            } ?>
                            <div class="tab-pane fade in <?php if (isset($typee) && !empty($typee)) {
                                echo $active;
                            } else {
                                echo ($x == 0) ? 'active' : '';
                            } ?>" id="tab<?= $key ?>">
                                <div class="panel-body">
                                    <a href="#" class="btn btn-add btndate" data-toggle="modal"
                                       data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            <?= $value ?>
                                        </strong></a>
                                    <div class="table-responsive">
                                        <?php
                                        if (isset($get_setting) && !empty($get_setting)) {
                                            $title = $get_setting->title;
                                            if($get_setting->from_code==501)
                                            {
                                       $band_type=$get_setting->band_type;
                                            }
                                           
                                      
                                            echo form_open_multipart('family_controllers/osr_ektfaa/Setting/UpdateSitting/'.$id . '/' . $key);
                                        } else {
                                            $title = '';
                                          $band_type='';
                                            echo form_open_multipart('family_controllers/osr_ektfaa/Setting/AddSitting/' . $key . '/' . $key);
                                        }
                                        ?>
                                         <?php if($key==501){?>
                                            <div class="form-group col-md-3">
                                <label class="label">  البند</label>
                                <select name="band_type" id="band_type" class="form-control "
                                        data-validation="required" aria-required="true">
                                    <option value="">إختر</option>
                                    <?php
                                  $arrxx = array(1 => 'السمات الشخصية ',
                                   2 => 'ما يخص المشروع ',
                                   );
                                    if (!empty($arrxx)):
                                        foreach ($arrxx as $keyy=>$value):
                                            $select="";
                                           if($band_type==$keyy)
                                           {
                                               $select="selected";
                                           }
                                            ?>
                                            <option
                                                 <?=$select?> value="<?php echo $keyy; ?>-<?php echo $value; ?>" ><?php echo $value; ?></option>
                                        <?php
                                        
                                        endforeach;
                                    endif;
                                    ?>
                                   
                                </select>
                                </div> 

                                            <?php }?>
                                        <div class="form-group col-md-3 col-xs-12">
                                            <label class="label ">الاسم</label>
                                            <input type="text" name="title"
                                                   value="<?= $title?>"
                                                   class="form-control " autofocus
                                                   data-validation="required">
                                        </div>

                                       
                                        
                                        <div class="form-group col-md-3 col-xs-12 text-center">
                                            <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add" style="margin-top: 23px;"  >
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>
                                        </form>
                                        <?php if (isset($all) && !empty($all) && $all != null) { ?>
                                            <table class=" example table  table-bordered table-striped table-hover">
                                                <thead>
                                                <tr class="greentd">
                                                    <th>م</th>
                                                    <th>الاسم</th>
                                                    <?php   if($key==501)
                                            {?>
                                            <th>البند</th>
                                     <?php }?>
                                                    <th>الإجراء</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $x = 1;
                                                if (isset($all[$key]) && !empty($all[$key]) && $all[$key] != null) {
                                                    foreach ($all[$key] as $value) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $x++ ?></td>
                                                         <?php   if($value->from_code==501)
                                            {?>
                                     
                                     <td>
                                       <?php
                                  $arrxx = array(1 => 'السمات الشخصية ',
                                   2 => 'ما يخص المشروع ',
                                   );
                                    if (!empty($arrxx)):
                                        foreach ($arrxx as $keyy=>$valuee):
                                           
                                           if($value->band_type==$keyy)
                                           {
                                           
                                            echo $valuee; 
                                           }
                                        
                                        
                                        endforeach;
                                    endif;
                                    ?>
                                       
                                       </td>
                                           <?php }?>
                                                            <td ><?= $value->title ?></td>
                                                            <td>
                                                                <a href="#" onclick='swal({
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
                                                                    window.location="<?php echo base_url().'family_controllers/osr_ektfaa/Setting/UpdateSitting/'.$value->id . "/" . $key ?>";
                                                                    });'>
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
                                                                    window.location="<?= base_url()."family_controllers/osr_ektfaa/Setting/DeleteSitting/" . $value->id . "/" . $key ?>";
                                                                    });'>
                                                                    <i class="fa fa-trash"> </i></a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } else {
                                                    echo '<tr>
                                                    <td style="text-align: center;" colspan="4"> لا يوجد بيانات </td>
                                                    </tr>';
                                                } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php $x++;
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>