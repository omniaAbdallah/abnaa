<style>
  
    .news_article {
        height:400px; 
    display: inline-block;
    width: 100%;
    box-shadow: 1px 2px 0px 2px #999;
    border: 1px solid #c7c7c7;
}
.news_article_title {
    background-color: #fff;
    padding: 10px 5px;
    height: 100px;
    overflow: hidden;
    transition: all 0.5s ease;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
}
.news_article_title p.date {
    color: #96c73e;
    font-size: 14px;
    margin-bottom: 0;
}
.news_article_title a {
    color: #002542;
    font-size: 18px;
}
.list-unstyled {
    padding-right: 0;
    list-style: none;
}
element {
    display: list-item;
}
</style>
<div id="details">
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
   
    </div>







 

<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>tataw3/foras/Foras/load_details",
            data: {row_id: row_id},
            beforeSend: function (html) {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                swal({
                    title: 'تم الاشتراك بنجاح  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $('#details').html(d);

            }

        });
    }
</script>