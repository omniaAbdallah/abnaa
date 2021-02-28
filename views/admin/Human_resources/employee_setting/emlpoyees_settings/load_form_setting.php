<?php
if (isset($record) && !empty($record) && $record != null) {
    echo form_open_multipart('human_resources/Employee_settings/UpdateSitting/' . $id . '/' . $type);
} else {
    echo form_open_multipart('human_resources/Employee_settings/AddSitting/' . $type);
}
?>
    <div class="col-sm-12 col-xs-12 no-padding">
        <div class="form-group col-sm-8 col-xs-12">
            <label class="label "> الإسم</label>
            <input type="text" name="title_setting"
                   value="<?php if (isset($record)) echo $record['title_setting'] ?>"
                   class="form-control " autofocus data-validation="required">
            <input type="hidden" name="type_name" value=""/>
        </div>
        <div class="form-group col-sm-4 col-xs-12">
            <label class="label "> الترتيب</label>
            <input type="text" name="in_order"
                   value="<?php if (isset($record)) echo $record['in_order'] ?>"
                   onkeypress="validate_number(event);"
                   class="form-control " autofocus data-validation="required">
        </div>
    </div>
    <div class="form-group col-sm-12 col-xs-12 text-center">
        <button type="submit" name="add" value="حفظ" class="btn btn-purple btn-labeled"><span
                    class="btn-label">
<i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
        </button>
    </div>
    </form>
<?php if (isset($all) && !empty($all) && $all != null) { ?>
    <div class="no-dt-buttons">
        <table id="example" class="table table-bordered table-striped table-hover ">
            <thead>
            <tr class="info">
                <th>م</th>
                <th> الترتيب</th>
                <th>الإسم</th>
                <th>الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            if (isset($all) && !empty($all) && $all != null) {
                foreach ($all as $value) {
                    ?>
                    <tr>
                        <td><?= ($x++) ?></td>
                        <td><?php echo $value->in_order; ?></td>
                        <td><?= $value->title_setting ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'human_resources/Employee_settings/UpdateSitting/' . $value->id_setting . "/" . $type ?>"
                               title="تعديل">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <span> </span>
                            <a href="<?= base_url() . "human_resources/Employee_settings/DeleteSitting/" . $value->id_setting . "/" . $type ?>"
                               onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo '<tr>
                                                    <td colspan="3"> لايوجد بيانات </td>
                                                    </tr>';
            } ?>
            </tbody>
        </table>
    </div>
<?php } ?>