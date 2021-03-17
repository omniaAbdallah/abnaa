




<div class="panel panel-default">
<div class="panel-heading">
        <h3 class="panel-title"> طلبات احتياج فرصة تطوعية</h3>
        </div>
        <div class="panel-body">
       
                <table class="table" style="table-layout: fixed">
                    <tbody>
                    <tr>
                    
                        <td  class="">رقم الطلب</td>
                        
                        <td><?php echo $result->rkm_talb ;?></span></td>
                        <td  class="">تاريخ الطلب</td>
                        
                        <td ><?php echo $result->date_talab ;?></td>
                        <td  class="">الإدارة</td>
                        
                        <td> <?php
                             if (!empty($admin)):
                                 foreach ($admin as $record):
                                 
                             if ($result->edara_id == $record->id) {
                               echo $record->title;
                             }
                            endforeach;
                        endif;
                                     ?></td>
                    </tr>
                   
                    <tr>
                        <td  class="">مقدم الطلب</td>
                        
                        <td><?php echo $result->mokdm_talab ;?></span></td>
                        <td  class="">اسم المشرف</td>
                        
                        <td style=" "><?php echo $result->moshrf_name ;?></td>
                        <td  class="">رقم جوال المشرف</td>
                        
                        <td><?php echo $result->moshrf_jwal ;?></td>
                    </tr>


                    <tr>
                        <td  class="">طبيعة العمل التطوعي</td>
                        
                        <td><?php echo $result->volunteer_description ;?></span></td>
                        <td  class=""> 
مجال العمل التطوعي</td>
                        <td style=" "><?php
                             if (!empty($magalat)):
                                 foreach ($magalat as $record):
                                 
                             if ($result->magal_tatw3 == $record->id) {
                               echo $record->emp_magal_name;
                             }
                            endforeach;
                        endif;
                                     ?></td>
                        <td  class="">اسم الفرصة التطوعية</td>
                        
                        <td><?php echo $result->forsa_name ;?></td>
                    </tr>

                    <tr>
                        <td  class="">وصف الفرصة التطوعية</td>
                        
                        <td><?php echo $result->wasf ;?></span></td>
                        <td  class="">المكان  </td>
                        
                        <td style=" "><?php echo $result->makan ;?></td>
                        <td  class="">بداية الفرصة</td>
                        
                        <td><?php echo $result->from_date ;?></td>
                    </tr>

                    <tr>
                        <td  class="">نهاية الفرصة</td>
                        
                        <td><?php echo $result->to_date ;?></span></td>
                        <td  class="">المدة  </td>
                        
                        <td style=" "><?php echo $result->moda ;?></td>
                        <td  class="">من الساعة</td>
                        
                        <td><?php echo $result->from_time ;?></td>
                    </tr>


                    <tr>
                        <td  class="">إلى الساعة</td>
                        
                        <td><?php echo $result->to_time ;?></span></td>
                        <td  class="">عدد ساعات التطوع  </td>
                        
                        <td style=" "><?php echo $result->tataw3_hours ;?></td>
                        <td  class="">الجنس</td>
                        
                        <td>
                        
                        <?php
                          $genders = array('1'=>'نساء فقط','2'=>'رجال فقط','3'=>'نساء ورجال');
                            foreach ($genders as $key=>$value){
                                ?>
                                
                                    <?php
                                    if ($result->gender==$key){
                                        echo $value;
                                    }
                                    ?>
                               
                                <?php
                            }
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td  class="">العدد المستهدف  </td>
                       
                        <td><?php echo $result->num_motakdm ;?></span></td>
                        <td  class="">الأنشطة - المهام </td>
                        
                        <td style=" "><?php echo $result->activities ;?></td>
                        <td  class="">شروط الفرصة</td>
                        
                        <td><?php echo $result->shroot ;?></td>
                    </tr>

                    <tr>
                        <td  class=""> العائد</td>
                        
                        <td><?php echo $result->outcome ;?></span></td>
                        
                    </tr>
                    

                    </tbody>
                </table>




            </div>
        </div>

    </div>
