<option value="">إختر</option>

<?php
                                        if (!empty($magalat)):
                                            foreach ($magalat as $record):
                                                $select = '';
                                                ?>
                                                <option value="<?php echo $record->id; ?>" <?= $select ?>><?php echo $record->emp_magal_name; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>