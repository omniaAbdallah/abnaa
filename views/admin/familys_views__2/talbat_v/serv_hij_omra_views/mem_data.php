<?php if (isset($member_data) && $member_data != null) { ?>
                    <table class="  table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>الإسم</th>
                            <th>رقم الهوية</th>
                            <th>الصلة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="check-style">
                                    <input type="checkbox" name="mother_id" class="checkbox"
                                           id="checkbox_m<?= $family_data->id ?>"
                                           value=" <?= $family_data->id ?>" >
                                    <label for="checkbox_m<?= $family_data->id ?>"> </label>
                                </div>
                            </td>
                            <td><?php echo $family_data->mother_name; ?></td>
                            <td><?php echo $family_data->mother_national_num_fk; ?></td>
                            <td><?php echo "أم"; ?></td>
                        </tr>
                        <?php
                        $x = 2;
                        foreach ($member_data as $row) { ?>
                            <tr>
                                <td>
                                    <div class="check-style">
                                        <input type="checkbox" name="member_id[]" class="checkbox"
                                               id="checkbox<?= $row->id ?>"
                                               value=" <?= $row->id ?>" >
                                        <label for="checkbox<?= $row->id ?>"> </label>
                                    </div>
                                </td>
                                <td><?php echo $row->member_full_name; ?></td>
                                <td><?php echo $row->member_card_num; ?></td>
                                <td><?php echo $row->relation_name; ?></td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } ?>