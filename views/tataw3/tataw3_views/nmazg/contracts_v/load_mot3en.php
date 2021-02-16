<select id="motatw3_id_fk" name="motatw3_id_fk"  
                            class="form-control selectpicker" data-validation="required"
                            onchange="get_moto3();"
                            data-show-subtext="true" data-live-search="true">
                            <option value="">اختر</option>
                            <?php
                        if (isset($mot3en) && (!empty($mot3en))) {
                            foreach ($mot3en as $key) {
                                $select = '';
                               
                                ?>
                                <option value="<?php echo $key->id; ?>-<?php echo $key->name; ?>" <?= $select ?>> <?php echo $key->name; ?></option>
                            <?php }
                        } ?>
						</select>

                        <script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>