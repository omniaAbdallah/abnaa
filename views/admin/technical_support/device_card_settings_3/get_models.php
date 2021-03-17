<option value="">اختر</option>
                        <?php
                        if (isset($models) && !empty($models)) {
                            foreach ($models as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                   
                                ><?php echo $row->name; ?></option>
                            <?php }
                        } ?>