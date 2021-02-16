
<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
         
<?php
            if (isset($f2at) && !empty($f2at)) {
                echo form_open_multipart('services_orders/family_serv_setting/Serv_setting/wasf_service_setting_uptate/' .$f2at->id . '', array('class' => 'wasf_form'));
                $wasf_fe2a_title = $f2at->wasf_fe2a_title;
                $ser = $f2at->no3_khdma_id_fk;
                $f2a=$f2at->fe2a_khdma_id_fk;
                $button = 'update';
                $action = " تعديل    ";
                $onclick = "update_wasf(" . $f2at->id . ");";
                echo '<input type="hidden"  name="id"  id="id" value="' .$f2at->id . '">';
                echo '<input type="hidden"  name="update"  id="update" value="update">';
            } else {
                $action = "حفظ";
                $wasf_fe2a_title = '';
                $ser = '';
                $f2a='';
                $button = 'add';
                $onclick = "save_wasf();";
                echo form_open_multipart('services_orders/family_serv_setting/Serv_setting/wasf_service_setting', array('class' => 'wasf_form'));
                echo '<input type="hidden"  name="add"  id="add" value="add">';
            }
            ?>
            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label>نوع الخدمة </label>
                    <select type="text" class="form-control " name="service"
                            data-validation="required">
                        <option value=""> إختر </option>
                        <?php foreach ($service as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                                <?php if ($ser == $cat->id) echo 'selected' ?>
                            ><?= $cat->khdma_name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label>الفئات </label>
                    <select type="text" class="form-control " name="f2a"
                            data-validation="required">
                        <option value=""> إختر </option>
                        <?php foreach ($f2att as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                                <?php if ($f2a == $cat->id) echo 'selected' ?>
                            ><?= $cat->wasf_fe2a_title ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label>وصف الخدمة  </label>
                    <input type="text" class="form-control " name="wasf_serv"
                           value="<?= $wasf_fe2a_title ?>" data-validation="required">

                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4" style="
    margin-top: 32px;
">
                    <button type="button" id="buttons" 
                                class="btn btn-labeled btn-success
                                            "
                                onclick="<?= $onclick ?>"
                                name="<?php echo $button; ?>"
                                value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span><?= $action ?>
                        </button>

                </div>
            </div>

            <!-- <div class="col-md-12">
                <button type="submit" class="btn btn-success" value="1" name="save">حفظ</button>
            </div> -->
           
            <?php echo form_close() ?>
        </div>
    </div>
</div>