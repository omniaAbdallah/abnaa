
<div class="panel panel-info">
    <div class="panel-heading panel-title">       الفرص التطوعية </div>
    <div class="panel-body">


<!--  -->
<?php
            if (isset($result) && !empty($result)){
                foreach ($result as $row){
                    
                   
                    
                    ?>
                    <div class="col-sm-4">
            <div class="panel panel-info">
    <div class="panel-heading"><h5>
    
    <?php

if (!empty( $row->forsa_name)){

    echo  $row->forsa_name ;

} else{

    echo 'غير محدد' ;

}

?>

    
    </h5></div>
    <div class="panel-body">
    


                <blockquote class="blockquote mb-0">



                    <strong>  نوع العمل : </strong>



                    <span>

                         <?php

                         if (!empty( $row->mobdra_n)){

                             echo  $row->mobdra_n ;

                         } else{

                             echo 'غير محدد' ;

                         }

                         ?>



                    </span>

                    <br>

                    <strong >     المدينة :</strong>



                    <span>   <?php

                        if (!empty( $row->city_n)){

                            echo  $row->city_n ;

                        } else{

                            echo 'غير محدد' ;

                        }

                        ?></span>

                    <br>

                    <strong >       تاريخ البدء : </strong>

                    <label>

                            <?php

                            if (!empty( $row->start_date)){

                                echo  $row->start_date ;

                            } else{

                                echo 'غير محدد' ;

                            }

                            ?>

                        </label>

                    <br>

                    <strong >        تاريخ الإنتهاء : </strong>

                    <label>

                            <?php

                            if (!empty( $row->end_date)){

                                echo  nl2br($row->end_date) ;

                            } else{

                                echo 'غير محدد' ;

                            }

                            ?>

                        </label>

                    <br>

                    <strong >         بدء الانضمام : </strong>

                    <label>  <?php

                        if (!empty( $row->start_join_date)){

                            echo  $row->start_join_date ;

                        } else{

                            echo 'غير محدد' ;

                        }

                        ?></label>

                    <br>

                    <strong >          انتهاء الانضمام : </strong>

                    <label>

                         <?php

                         if (!empty( $row->end_join_date)){

                             echo  nl2br($row->end_join_date) ;

                         } else{

                             echo 'غير محدد' ;

                         }

                         ?>

                        </label>

                    <br>
                    </blockquote>
     </div>
     <?php
            if (isset($last_record) && !empty($last_record) &&($last_record->foras_id_fk == $row->id)) {
               
               // $span="<span style=\"font-size: medium;\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن شكوي جديدة لان هنالك شكوي جاري </span>";
               
               if($last_record->accepted == 1)
               {
                $action="طلبك جاري ";
                $disabled = "disabled";
               }else  if($last_record->accepted == 4)
               {
               $action="انت مشترك ";
               $disabled = "disabled";
               }
            }elseif(isset($last_record) && !empty($last_record) &&($last_record->foras_id_fk != $row->id)){

                $action="اشترك";
                $disabled = "disabled";


            }else {
                $action="اشترك";
                $disabled = "";
               // $span = "";

            } ?>
    <div class="panel-footer"><button type="button" 
    <?=$disabled?>
    onclick="get_details(<?= $row->id ?>)"
    class="btn btn-warning"
                                               
                        > <?=$action?></button> </div>
  </div>
  </div>
  <?php
            }
        }
        ?>

        </div>
<!--  -->
</div>

    </div>