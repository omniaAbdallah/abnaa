 <?php
                foreach ($sub as $key) {
                    $select = '';
                    if($qsm != '') {
                        if ($key->id == $qsm) {
                            $select = 'selected';
                        }} ?>
                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                    <?php } ?> 