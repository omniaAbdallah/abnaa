<style>    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }

    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title"><h4> تعديل هدف استراتيجي</h4></div>
    </div>
    <div class="panel-body">
        <div class="col-md-12 col-sm-12 col-xs-12 padding-4">            <?php //$id =;
            $readonly = '';
            $disabled = '';
            $required = 'required';
            $submitEdit = 'button';
            $submitSave = 'button';
            if ($id != 0) {
                $submitEdit = '';
                echo form_open_multipart('gwd/Gawda_plans/update/' . $id, array('id' => 'MyFormDalil'));
                if (isset($details)) {
                   if ($details['level'] == 1) {
                        $disabled = '';
                        $required = '';
                    }
                    
                }
            } else {
                $submitSave = '';
                $display_markz_tklfa = "none";
                $disabled_markz_tklfa = 'disabled';
                echo form_open_multipart('gwd/Gawda_plans/addAccount', array('id' => 'MyFormDalil'));
            }
            $mainAccount = array(1 => 'الأصول', 2 => 'الخصومات', 3 => 'الإيرادات', 4 => 'المصروفات');
            $types = array(1 => 'رئيسي', 2 => 'فرعي');
            $nature = array('إختر', 'مدين', 'دائن');
            $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');            //14-1-om
            $markz_tklfa_arr = array(1 => 'نعم', 2 => 'لا'); ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding">                <!--14-1-om-->
                <fieldset>                    <?php if (!empty($parent['name'])) { ?>
                        <legend style="float: left;margin-top: -46px;"> 
                        الهدف الاستراتيجي : <?= $parent['name'] ?></legend>                    <?php } ?>
                 
                   
                        <input type="hidden" id="parent" name="parent"
                               value="<?php if (isset($details)) echo $details['parent'] ?>"></div>
                                    <!--14-1-om-->
                    <div class="col-md-2 col-sm-6 padding-4"><h6 class="label_title_2 "> الترتيب </h6><input
                                type="text" id="code" name="code"
                                value="<?php if (isset($details)) echo $details['code']  ?>"
                                class="form-control input_style_2 input-style" placeholder="الترتيب"
                                data-validation="required" <?= $readonly ?> <?= $disabled ?>></div>
                    <div class="col-md-5 col-sm-6 padding-4"><h6 class="label_title_2 "> الهدف الاستراتيجي </h6><input
                                type="text" id="name" name="name"
                                value="<?php if (isset($details)) echo $details['name'] ?>"
                                class="form-control input_style_2 input-style" placeholder="الهدف الاستراتيجي"
                                data-validation="required"></div>
                   
                   
                     <?php if (isset($details) && (!empty($details))) { ?>
                        <div class="col-xs-12 text-center">
                            <div class="col-md-9 col-sm-6 padding-4"></div>
                            <div class="col-md-3 col-sm-6 padding-4"><br>
                                <button type="button" class="btn btn-labeled btn-success " id="save_account_dalel"
                                        onclick="editAccounDalel_ajex(1)" name="add" value="حفظ"><span
                                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                     
                                </button>
                            </div>
                        </div>                    <?php } ?>                </fieldset>                <!--14-1-om-->
              
                <div class="col-xs-12 text-center"><br/> <input type="hidden" name="level" id="level"
                                                                value="<?php if (isset($details)) echo $details['level'] ?>"/>
                    <input type="hidden" name="id" id="id" value="<?php if ($id != 0) echo $id; else echo 0; ?>"> <input
                            type="hidden" name="ttype" id="ttype"
                            value="<?php if ($id != 0) echo $details['ttype']; ?>"> 
                            <input type="hidden" name="parent_code" id="parent_code" value="<?php if ($id != 0) echo $details['parent_code']; ?>">
                    <?php if (isset($method) && ($method == 1)) { ?>
                        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                                onclick="save_account(1)"><span class="btn-label"><i
                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        <!-- <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                                onclick="save_account(2)"><span class="btn-label"><i
                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ واستمرار
                        </button>                -->
                        
                             <?php } ?>                
                        </div> <?php echo form_close() ?></div>
        </div>
    </div>
</div>