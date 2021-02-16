<div class="col-md-12 padding-4">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-plus-square"></i> إنشاء رسالة جديدة </h3>
        </div>
        <div class="panel-body " style="background-color: #fff;">
            <?php
            $need_replay = '';
            $important_degree = '';
            echo form_open_multipart('gam3ia_omomia/Messages_gam3ia/send_message',array('id'=>'send_message_form'));
            ?>
            <div class="col-sm-12 padding-4">
                <div class="form-group col-xs-3 no-padding">
                    <label class="label">مستقبل الرساله  </label>
                    <div class="radio-content">
                        <input type="radio" id="type_member1" name="data[member_type_to]"  class="type_members" onclick="get_members()" value="1" >
                        <label for="type_member1" class="radio-label">  جمعية العمومية</label>
                    </div>

                    <div class="radio-content">
                        <input type="radio" id="type_member2" name="data[member_type_to]" onclick="get_members()"  class="type_members" value="2">
                        <label for="type_member2" class="radio-label"> ادارة التنفذية </label>
                    </div>

                </div>
                <div class="form-group col-xs-4 no-padding">
                    <label class="label "> الي</label>
                    <select class="form-control selectpicker" id="select_members" name="data[send_to_id_fk]" data-live-search="true" data-validation="required">

                    </select>
                </div>
              <!--  <div class="form-group col-sm-2 padding-4">
                    <label class="label">تحتاج الرد</label>
                    <select name="need_replay" id="need_replay"
                            class="form-control  " data-validation="required">
                        <option value="">إختر</option>
                        <?php
/*                        $arr = array('1' => 'نعم', '2' => 'لا');
                        foreach ($arr as $key => $value) {
                            */?>
                            <option value="<?/*= $key */?>"
                                <?php
/*                                if ($need_replay == $key) {
                                    echo 'selected';
                                }
                                */?>
                            ><?/*= $value */?></option>
                            <?php
/*                        }
                        */?>
                    </select>
                </div>-->
                <div class="form-group col-sm-2 padding-4">
                    <label class="label ">نوع التواصل </label>
                    <select name="data[contact_type_fk]"  onchange = "($('#contact_type_n').val($('option:selected',this).text()))"
                            class="form-control  " data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($contact_types) && !empty($contact_types)) {
                            foreach ($contact_types as $item) {
                                ?>
                                <option value="<?= $item->id ?>"><?= $item->title ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="hidden" name="data[contact_type_n]" id="contact_type_n">
                </div>
                <div class="form-group col-sm-2 padding-4">
                    <label class="label">درجة الأهمية</label>
                    <select name="data[important_degree]" data-validation="required" id="important_degree"
                            class="form-control">
                        <option value="">إختر</option>
                        <?php
                        $arr = array(0 => 'عادي', 1 => 'هام', 2 => ' هام جدا');
                        foreach ($arr as $key => $value) { ?>
                            <option
                                value="<?php echo $key; ?>"> <?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-xs-12 no-padding">
                    <label class="label">عنوان الرسالة</label>
                    <input class="form-control" placeholder="" type="text" name="data[title]" id="title"
                           data-validation="required"/>
                </div>
            </div>
            <div class="col-xs-12 padding-4">
                <div class="form-group">
                    <label class="label">نص الرسالة</label>
                    <textarea class="form-control" placeholder="" id="editor_" name="data[content]"
                              data-validation="required"
                    ></textarea>
                </div>
            </div>
            <div class="col-xs-12 padding-4">
                <div class="form-group">
                    <label class="label"> رفع الوسائط</label>
                    <div>
                        <input type="file" name="file_attach_name" id="file_attach_name"  class="form-control">
                    </div>

                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="button" onclick="send_message()" class="btn btn-labeled btn-success" id="save" name="note_save" value="save">
                    <span class="btn-label"><i class="fa fa-envelope-o"></i></span>إرسال
                </button>
            </div>

            <?php echo form_close() ?>

        </div>
    </div>
</div>