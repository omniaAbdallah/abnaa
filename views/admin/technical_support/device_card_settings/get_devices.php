<option value="">اختر</option>
                        <?php
                        if (isset($devices_rkm_fk) && !empty($devices_rkm_fk)) {
                            foreach ($devices_rkm_fk as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                   
                                ><?php echo $row->id; ?></option>
                            <?php }
                        } ?>