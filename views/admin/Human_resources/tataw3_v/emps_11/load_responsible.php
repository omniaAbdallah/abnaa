<option value="">إختر</option>

<?php
                                        if (!empty($responsibles)):
                                            foreach ($responsibles as $record):
                                                $select = '';
                                                ?>
                                                <option value="<?php echo $record->employee; ?>" <?= $select ?>><?php echo $record->employee; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>