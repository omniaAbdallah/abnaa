

<div class="col-xs-12 no-padding">
    <div >
       
        <div >
        
        <div class="col-sm-12 no-padding" >
            <!-- Nav tabs -->
           
            <!-- Tab panels -->
            <div >
                


                <div >
              

                <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr class="info">
                                            <th colspan="4" class="text-center"> نموذج المقابلة الشخصية</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                          <tr>
                                            <th class="info"> الفرصة التطوعية:</th>
                                            <td width="15%">
                                            <input type="hidden" name="forsa_id_fk"
                                                           value="<?php echo $volunteer['current_forsa_fk']; ?>">
                                                           <?php
                                            
                                            if(isset($foras)&&!empty($foras))
                                            {
                                                echo $foras->forsa_name;
                                            }
                                            
                                            ?>
                                            </td>
                                            <th class="info"> اسم المتقدم:</th>
                                            <th width="20%">
                                            <input type="hidden" name="motatw3_id_fk"
                                                           value="<?php echo $volunteer['id']; ?>">
                                                          
                                            <?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['name'];
                                            }
                                            
                                            ?>
                                            </th>

                                        </tr>

                                        </table>
                                </div>
                </div>


              
                                <div class="col-md-12">
                                    <table class=" table table-bordered" style="table-layout: fixed">
                                    
                                        <thead>

                                        <tr class=greentd">
                                            <th> المعيار</th>
                                            <th width="15%"> عالي</th>
                                            <th width="15%">متوسط</th>
                                            <th width="15%">ضعيف</th>
                                        </tr>
                                        </thead>

                                      
                    
                
                                        <tbody>
                          
                                        <?php if (isset($interview_bnod) && !empty($interview_bnod)) {
                                            $x = 0;
                                           
                                            foreach ($interview_bnod as $row) {      
                                        ?>

                                        <!-- yara -->
                                        <tr class="open_green  closed_green">
                                                   
                                                         
                                                    <td><?php echo $x + 1; ?>-<?php echo $row->band_n; ?></td>
                                                    <td><input type="radio" data-validation="required"
                                                               class="form-control" disabled
                                                               name="taqyim_band<?php echo $row->band_id_fk; ?>"
                                                               id="low_degree<?php echo $row->band_id_fk; ?>"
                                                               width="45px;" value="1"

                                                               <?php if (isset($row->taqyim_band) && !empty($row->taqyim_band) && $row->taqyim_band == "high") {
                                            echo 'checked';
                                       } else {
                                           echo '';
                                       } ?>    
                                                              ></td>
                                                    <td>
                                                    <input type="radio" data-validation="required"
                                                               class="form-control"disabled
                                                               name="taqyim_band<?php echo $row->band_id_fk; ?>"
                                                               id="avarage_degree<?php echo $row->band_id_fk; ?>"
                                                               width="45px;" value="2"
                                                               <?php if (isset($row->taqyim_band) && !empty($row->taqyim_band) && $row->taqyim_band == "mid") {
                                            echo 'checked';
                                       } else {
                                           echo '';
                                       } ?>    
                                                               >
                                                    </td>
                                                                 <td>
                                                                 <input type="radio" data-validation="required"
                                                               class="form-control"disabled
                                                               name="taqyim_band<?php echo $row->band_id_fk; ?>"
                                                               id="high_degree<?php echo $row->band_id_fk; ?>"
                                                               width="45px;" value="3"
                                                               <?php if (isset($row->taqyim_band) && !empty($row->taqyim_band) && $row->taqyim_band == "weak") {
                                            echo 'checked';
                                       } else {
                                           echo '';
                                       } ?>    
                                                             >
                                                                 
                                                                 </td>
                                                </tr>
                                        <!-- yara -->
                                       <?php $x++; }}?>

                                        </tbody>


                                    </table>

                                </div>
                               

              
               


<!--  -->


                <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        
                                        <tbody>
                                        
                                          <tr>
                                            <th class="info">  التفضيل العمل مع الجماعه او العمل بشكل فردي:</th>
                                            <td width="67%">
                                         <?php 
                                                                if(isset( $interview)&&!empty($interview))
                                                                {echo  $interview->prefer_gama4i_fardi;}
                                                                ?> 
                                                             
                                            </td>
                                           

                                        </tr>
                                        <tr>
                                            <th class="info">  دوافع المتطوع المتقدم للفرصة:</th>
                                            <td width="67%">
                                            <?php  if(isset( $interview)&&!empty($interview))
                                                               {echo  $interview->dwaf3_tatw3;}?>
                                                             
                                            
                                            </td>
                                            

                                        </tr>
                                        <tr>
                                            <th class="info">  وجود دوافع غير واضحه للمتطوع:</th>
                                            <td width="67%">
                                            
                                            <?php
                                            $period = array('نعم ' ,'نوعا ما','ابدا');
                     
                       
                        foreach ($period as $key => $value) {
                            $checked = '';
                            if (isset($interview->dwaf3_tatw3_hidden_id)&&($interview->dwaf3_tatw3_hidden_id!='')) {
                                $allPeriods = $interview->dwaf3_tatw3_hidden_id;
                                if ($key==$allPeriods) {
                                    $checked = 'checked';
                                }
                            }
                            
                            ?>
                            <!-- <div class="col-xs-4 check-style"> -->
                            <div class="radio-content">
                                <!-- <input class="check_large" type="checkbox" id="gridcv<?= $key ?>" name="dwaf3_tatw3_hidden_id[]"
                                       value="<?= $key ?>" data-validation="validate_checkbox_group"
                                       data-validation-qty="1-<?= sizeof($period) ?>" <?= $checked ?>> -->
                                

                                <input type="radio"   data-validation="required" disabled
                                                               class="form-control"
                                                               name="dwaf3_tatw3_hidden_id"
                                                               id="gridcv<?= $key ?>"
                                                               value="<?= $key ?>"
                                                               width="45px;" <?= $checked ?>
                                                              
                                                               >
                                <label   class="radio-label" for="gridcv<?= $key ?>">             <?= $value ?>         </label>
                            </div>
                        <? } ?>
                                            </td>
                                            

                                        </tr>
                                        <tr>
                                            <th class="info">  التفضيل لانواع معينة من الاعمال:</th>
                                            <td width="67%">
                                           <?php 
                                                                if(isset( $interview)&&!empty($interview))
                                                                {echo  $interview->prefer_soecific_a3mal;}?>

                                                              
                                            
                                            </td>
                                            

                                        </tr>
                                        <tr>
                                            <th class="info">  المستوي العام للمتقدم ومناسبته للفرص التطوعية:</th>
                                            <td width="67%">
                                            <?php
                                            $proper_for_forsa = array('مناسب جدا ' ,'نوعا ما','غير مناسب ابدا');
                      
                        
                        foreach ($proper_for_forsa as $key => $value) {
                            $checked = '';
                            if (isset($interview->proper_for_forsa)&&($interview->proper_for_forsa!='')) {
                                $allproper_for_forsa = $interview->proper_for_forsa;
                                if ($key== $allproper_for_forsa) {
                                    $checked = 'checked';
                                }
                            }
                            
                            ?>
                          <div class="radio-content">
                                <!-- <input class="check_large" type="checkbox" id="grid<?= $key ?>" name="proper_for_forsa[]"
                                       value="<?= $key ?>" data-validation="validate_checkbox_group"
                                       data-validation-qty="1-<?= sizeof($proper_for_forsa) ?>" <?= $checked ?>> -->

                                       <input type="radio"   data-validation="required"
                                                               class="form-control"disabled
                                                               id="grid<?= $key ?>" 
                                                               name="proper_for_forsa"
                                                               value="<?= $key ?>"
                                                               width="45px;" <?= $checked ?>
                                                              
                                                               >
                                <label class="radio-label" for="grid<?= $key ?>"><?= $value ?></label>
                            </div>
                        <? } ?>
                                            
                                            
                                            
                                            </td>
                                            

                                        </tr>
                                        </table>
                                </div>
                </div>
                

             
                <!--  -->


                                        <!-- <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        <tr>
                                            <th class="info">  مدير التطوع:</th>
                                            <td width="15%"></td>
                                            <th class="info">  التوقيع:</th>
                                            <th width="20%"></th>

                                        </tr>
                                        <tr>
                                            <th class="info">  المدير الفني:</th>
                                            <td width="15%"></td>
                                            <th class="info">  التوقيع:</th>
                                            <th width="20%"></th>

                                        </tr>

                                        </table>
                                </div>
                </div>  -->
                <!--  -->





              
                </body>







                </div>


                

            </div>
            </div>
            <!--  -->
          
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>







