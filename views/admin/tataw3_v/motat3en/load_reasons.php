



 <option  value="">إختر</option>
<?php
                        if (isset($reason) && !empty($reason)) {
                            foreach ($reason as $row) {
                                ?>
                                <option value="<?php echo $row->id;?>"> <?php echo $row->title; ?></option>
                                <?php
                            }
                        }
                        ?>

