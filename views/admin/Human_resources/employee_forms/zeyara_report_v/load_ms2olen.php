<label class=" label"> الجهه</label>

<select id="edara_id_fk" class="form-control " 

                                name="edara_id_fk" data-validation="required" >

                            <option value="">أختر</option>

                           <?php foreach($ms2olen as $row){?>



                                <option value="<?php  echo $row->id.'-'.$row->title; ?>"

                                   

                                           > <?php echo $row->title ;  ?></option >

                           <?php }?>

                        </select>