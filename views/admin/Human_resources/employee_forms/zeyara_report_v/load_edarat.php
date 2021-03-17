<label class=" label"> الادارة</label>
<select id="edara_id_fk" class="form-control " onchange="show_kafel(this.value);"
                                name="edara_id_fk" data-validation="required" >
                            <option value="">أختر</option>
                           <?php foreach($result as $row){?>

                                <option value="<?php  echo $row->id.'-'.$row->title; ?>"
                                    <?php
                                    if(!empty($edara_id_fk)){
                                        if(isset($edara_id_fk)&& ($row->id ==$edara_id_fk)){
                                            echo 'selected'; }}  ?>> 
                                            <?php echo $row->title ;  ?></option >
                           <?php }?>
                        </select>