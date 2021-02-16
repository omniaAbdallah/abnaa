<?php
if (isset($my_email) && !empty($my_email)) {
    foreach ($my_email as $row) {
        if ($row->readed == 0) {
            $unread = 'unread';
        } else {
            $unread = '';
        }
        ?>
        <tr class="<?= $unread ?>" title="<?= $row->email_from_n; ?> - <?= $row->title; ?>"
            data-id="<?= $row->id ?>">
            <td class="inbox-small-cells"><input type="checkbox" class="mail-checkbox"></td>
            <td class="inbox-small-cells" onclick="make_star(<?= $row->id ?>)"><i
                        id="satr_<?= $row->id ?>"
                        class="fa fa-star inbox-unstarted"></i>
            </td>
            <td onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"
                class="view-message  dont-show">
                <?php if (isset($row->employee_photo) && !empty($row->employee_photo)) { ?>
                    <img style=" padding: 2px; border-radius: 100px; border: 2px solid #eee;  height: 35px; width: 36px;"
                         src="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $row->employee_photo ?>"
                         class="border-green hidden-xs hidden-sm" alt="">
                <?php } else { ?>
                    <img style=" padding: 2px;  border-radius: 100px; border: 2px solid #eee;height: 35px; width: 36px;"
                         src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/avatar.png"
                         class="border-green hidden-xs hidden-sm" alt="">
                <?php } ?>
                <?= $row->email_from_n; ?>
                <span class="label label-danger pull-right">عاجل</span>
            </td>
            <td onclick="get_my_emails('page_content','message_details',<?= $row->id ?>)"
                class="view-message "><?= $row->title; ?></td>
            <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
            <td class="view-message  text-right">
                <span class="label label-warning pull-right" style="color: black;"><i class="fa fa-calendar"
                                                                                      aria-hidden="true"></i><?= date('d-m-Y', $row->ttime); ?></span>
                <span class="label label-warning pull-right" style="color: black;"><i
                            class="fa fa-clock-o"
                            aria-hidden="true"></i><?= date('g:ia', $row->ttime); ?></span>
            </td>
        </tr>
        <?php
    }
    ?>
<?php } else { ?>
    <div class="alert alert-danger" id="text111" style="display:none; color: #BD000A; display:block;">
        لا يوجد رسائل واردة
    </div>
<?php } ?>


