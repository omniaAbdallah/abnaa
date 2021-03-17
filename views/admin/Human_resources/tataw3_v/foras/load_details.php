<?php
if (isset($result) && !empty($result)){
    ?>
    <div class="col-xs-12 no-padding" >
        <div class="col-xs-3 no-padding" >

            <div class="card">
                <div class="card-header" style="padding: 10px 15px; border-bottom: solid 1px #e2d8d8">
                    <strong>المنظم </strong>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <?php if(!empty($result->mnazm_logo)) {
                            ?>
                            <img id="output" src="<?= base_url()."uploads/human_resources/tato3/foras/".$result->mnazm_logo ?>" width="100%"
                            >
                            <?php
                        } else{
                            ?>
                            <img id="output" src="" width="100%">
                            <?php
                        }
                        ?>
                        <strong> اسم المشرف :</strong>
                        <span>  <?= $result->moshrf_name?></span>
                        <br>
                        <strong >  رقم هاتف المشرف :</strong>
                        <span>  <?= $result->moshrf_jwal?></span>


                    </blockquote>
                </div>
            </div>
        </div>


        <div class="col-xs-6 no-padding" >

            <div class="card">
                <div class="card-header" style="padding: 10px 15px; border-bottom: solid 1px #e2d8d8">
                    <strong>وصف الفرص التطوعية </strong>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">

                        <strong>  اسم الفرصة التطوعية </strong>
                        <br>
                        <span>  <?= $result->forsa_name?></span>
                        <br>
                        <strong >    الاسم المختصر </strong>
                        <br>
                        <span>  <?= $result->forsa_name_abbr?></span>
                        <br>
                        <strong >     وصف الفرصة التطوعية </strong>
                        <br>
                        <span>
                            <?php
                            if (!empty( $result->wasf)){
                                echo  $result->wasf ;
                            } else{
                                echo 'غير محدد' ;
                            }
                           ?>
                        </span>
                        <br>
                        <strong >       الأنشطة الرئيسية </strong>
                        <br>
                        <span>
                            <?php
                            if (!empty( $result->anshta)){
                                echo  nl2br($result->anshta) ;
                            } else{
                                echo 'غير محدد' ;
                            }
                            ?>
                        </span>
                        <br>
                        <strong >        وصف المكان </strong>
                        <br>
                        <span>  <?php
                            if (!empty( $result->makan)){
                                echo  $result->makan ;
                            } else{
                                echo 'غير محدد' ;
                            }
                            ?></span>
                        <br>
                        <strong >         شروط الفرصة </strong>
                        <br>
                        <span>
                         <?php
                         if (!empty( $result->shroot)){
                             echo  nl2br($result->shroot) ;
                         } else{
                             echo 'غير محدد' ;
                         }
                         ?>
                        </span>
                        <br>
                        <strong >          العائد علي المتطوع </strong>
                        <br>
                        <span>   <?php
                            if (!empty( $result->a3ed_motatw3)){
                                echo  nl2br($result->a3ed_motatw3) ;
                            } else{
                                echo 'غير محدد' ;
                            }
                            ?></span>


                    </blockquote>
                </div>
            </div>
        </div>
    <div class="col-xs-3 no-padding" >
        <div class="card">
            <div class="card-header" style="padding: 10px 15px; border-bottom: solid 1px #e2d8d8">
                <strong>  التفاصيل </strong>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">

                    <strong>  نوع العمل : </strong>

                    <span>
                         <?php
                         if (!empty( $result->mobdra_n)){
                             echo  $result->mobdra_n ;
                         } else{
                             echo 'غير محدد' ;
                         }
                         ?>

                    </span>
                    <br>
                    <strong >     المدينة :</strong>

                    <span>   <?php
                        if (!empty( $result->city_n)){
                            echo  $result->city_n ;
                        } else{
                            echo 'غير محدد' ;
                        }
                        ?></span>
                    <br>
                    <strong >       تاريخ البدء : </strong>
                    <label>
                            <?php
                            if (!empty( $result->start_date)){
                                echo  $result->start_date ;
                            } else{
                                echo 'غير محدد' ;
                            }
                            ?>
                        </label>
                    <br>
                    <strong >        تاريخ الإنتهاء : </strong>
                    <label>
                            <?php
                            if (!empty( $result->end_date)){
                                echo  nl2br($result->end_date) ;
                            } else{
                                echo 'غير محدد' ;
                            }
                            ?>
                        </label>
                    <br>
                    <strong >         بدء الانضمام : </strong>
                    <label>  <?php
                        if (!empty( $result->start_join_date)){
                            echo  $result->start_join_date ;
                        } else{
                            echo 'غير محدد' ;
                        }
                        ?></label>
                    <br>
                    <strong >          انتهاء الانضمام : </strong>
                    <label>
                         <?php
                         if (!empty( $result->end_join_date)){
                             echo  nl2br($result->end_join_date) ;
                         } else{
                             echo 'غير محدد' ;
                         }
                         ?>
                        </label>
                    <br>
                    <strong >            جنس المتطوعين : </strong>
                    <span>   <?php
                        $genders = array('1'=>'نساء فقط','2'=>'رجال فقط','3'=>'نساء ورجال');
                        if (!empty( $result->gender)){
                            echo   $genders[$result->gender];
                        } else{
                            echo 'غير محدد' ;
                        }
                        ?></span>
                    <br>
                    <strong >             الساعات التطوعيه : </strong>
                    <span>   <?php
                        if (!empty( $result->tataw3_hours)){
                            echo  $result->tataw3_hours ;
                        } else{
                            echo 'غير محدد' ;
                        }
                        ?></span>
                    <br>
                    <strong >            أيام العمل : </strong>

                    <span>   <?php
                        $days = array('1'=>' يوميا','2'=>' أسبوعيا','3'=>' شهريا');

                        if (!empty($result->aytam_amal)){
                            echo  $days[$result->aytam_amal];
                        } else{
                            echo 'غير محدد' ;
                        }
                        ?></span>


                </blockquote>
            </div>
        </div>
    </div>



    </div>
<?php
}