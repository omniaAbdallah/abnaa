<?php if (isset($record) && !empty($record)) { ?>
    <form type="POST" action="<?php echo base_url() ?>family_controllers/Family/update_talb_mostandat"
          id="edite_file_form">
        <input type="hidden" name="save" value="1"/>

        <table id="" class="table table-striped table-bordered dt-responsive nowrap table-pd" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <td>نوع الطلب</td>
                <td>حالة الطلب</td>
                <td>ملاحظات</td>
            </tr>
            </thead>
            <tbody>
            <?php $status = array('no' => 'تحت الطلب', 'yes' => 'تم التسلم');
            $y = 1;
            foreach ($record->required_files as $file_row) {
                ?>
                <tr>
                    <td><?= $file_row['mostand_name'] ?>
                        <input type="hidden" name="talb_mostand_id_fk[]"
                               value="<?= $file_row['talb_mostand_id_fk'] ?>"/>
                        <input type="hidden" name="mostand_id[]" value="<?= $file_row['mostand_id'] ?>"/>
                    </td>
                    <td>
                        <select name="taslem[]" class=" no-padding form-control" aria-required="true">
                            <?php foreach ($status as $key => $value) { ?>
                                <option value="<?= $key ?>" <?php if ($file_row['taslem'] == $key) {
                                    echo 'selected';
                                } ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" value="<?= $file_row['doc_notes'] ?>" name="doc_notes[]"
                               class="form-control "/>
                    </td>
                </tr>
            <?php } ?>
            <tr>
            </tbody>
        </table>
    </form>
<?php } ?>