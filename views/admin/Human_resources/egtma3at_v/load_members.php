
<?php if (isset($members) && !empty($members)) {
    ?>
    <div class="container col-md-12">
        <table id="mem" class="  display table table-bordered   responsive nowrap"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th scope="col">م</th>
                <th scope="col"> كود الموظف</th>
                <th scope="col">إسم الموظف</th>
                <th scope="col">حالة الحضور</th>
                <th scope="col">طبيعة الحضور</th>
                <th scope="col">النائب</th>
                <th scope="col">الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($members as $row) {
                ?>
                <tr id="member_row<?php echo $row->id; ?>">
                    <td><?php echo $x++; ?></td>
                    <td><?php echo $row->emp_code;; ?></td>
                    <td><?php echo  $row->emp_name; ?></td>
                    <input type="hidden" class="emp_id_fk"
                           name="emp_id_fk<?php echo $row->emp_id_fk; ?>"
                           id="emp_id_fk<?php echo $row->emp_id_fk; ?>"
                           value="<?php echo $row->id; ?> "/>
                    <td><input type="radio" <?php if ($row->hdoor_satus == 1) echo 'checked'; ?>
                               class="attend" name="hdoor_satus<?php echo $row->emp_id_fk; ?>"
                               onclick="$('input[name=\'hodoor_status<?php echo $row->emp_id_fk; ?>\']').removeAttr('disabled')"
                               value="1">حضر
                        <input type="radio" <?php if ($row->hdoor_satus == 0) echo 'checked'; ?>
                               class="attend" name="hdoor_satus<?php echo $row->emp_id_fk; ?>"
                               onclick="$('input[name=\'hodoor_status<?php echo $row->emp_id_fk; ?>\']').attr('disabled','disabled')"
                               value="0">لم يحضر
                    </td>
                    <td>
                        <input type="radio" <?php if ($row->hodoor_status == 'himself') echo 'checked'; ?>
                               class="attend" name="hodoor_status<?php echo $row->emp_id_fk; ?>"
                               onclick="$('#member_id<?php echo $row->emp_id_fk; ?>').attr('disabled','disabled');
                                   $('.selectpicker').selectpicker('refresh'); "
                               value="himself" disabled>بنفسه
                        <input type="radio" <?php if ($row->hodoor_status == 'naeb') echo 'checked'; ?>
                               class="attend" disabled
                               name="hodoor_status<?php echo $row->emp_id_fk; ?>"
                               onclick="$('#member_id<?php echo $row->emp_id_fk; ?>').removeAttr('disabled');
                                   $('.selectpicker').selectpicker('refresh'); "
                               value="naeb">
                        نائب عنه
                    </td>
                    <td>
                        <select name="member_id<?php echo $row->emp_id_fk; ?>" disabled
                                class="form-control selectpicker" data-show-subtext="true"
                                data-live-search="true"
                                onclick="$('#member_name<?php echo $row->emp_id_fk; ?>').val($('option:selected',$('#member_id<?php echo $row->emp_id_fk; ?>')).text())"
                                id="member_id<?php echo $row->emp_id_fk; ?>">
                            <option value=""> - اختر -</option>
                            <?php foreach ($members as $member) {
                                if ($member->emp_id_fk == $row->emp_id_fk) {
                                    continue;
                                } ?>
                                <option value="<?= $member->emp_id_fk ?>" <?php if ($member->emp_id_fk == $row->emp_id_fk) echo 'selected'; ?> ><?php echo  $member->emp_name; ?> </option>
                            <?php } ?>
                        </select>
                        <input type="hidden" value="" name="member_name<?php echo $row->emp_id_fk; ?>"
                               id="member_name<?php echo $row->emp_id_fk; ?>">


                    </td>
                    <td>
                        <button type="button"
                                class="btn btn-success btn-sm" <?php if ($row->hdoor_satus == 1) echo 'disabled'; ?>
                                onclick="save_member(<?php echo $row->id; ?>,<?php echo $row->emp_id_fk; ?>)"
                                value=""> حفظ
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    ?>
    <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء</div>
    <?php
}
?>