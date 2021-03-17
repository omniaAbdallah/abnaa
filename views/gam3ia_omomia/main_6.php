<style>

    .list-group-flush .list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group-flush:last-child .list-group-item:last-child {

        border-bottom-width: 0;

    }

    .list-group-flush .list-group-item {
        border-right-width: 0;
        border-left-width: 0;
        border-radius: 0;
    }
    a {
    font-size: 19px;
    text-decoration: none !important;
    color: #f2f3f3;
}
.radio-content {
    display: block;
    width: auto;
    margin-left: 10px;
}
#pollsButtons {
    text-align: center;
    height: 33px;
    padding-bottom: 30px;
    /* width: 360px; */
}
#voteButton, #resultsButton {
    height: 33px;
    display: inline-block;
}
#voteButton input, #backButton input {
    font-family: "Droid Arabic Kufi";
    display: inline-blocl;
    background: #df2829;
    border: medium none;
    color: transparent;
    cursor: pointer;
    color: #FFF;
    padding: 5px 10px;
}
#resultsButton input, #voteButton input, #backButton input {
    font-family: "Droid Arabic Kufi";
    display: inline-blocl;
    background: #df2829;
    border: medium none;
    color: transparent;
    cursor: pointer;
    color: #FFF;
    padding: 5px 10px;
}
.bar {
    background: rgba(0, 0, 0, 0) url(https://img.youm7.com/images/general/pollMeterBg.gif?1) repeat-x scroll 0 0;
    border: 1px solid #ce2020;
    font-size: 0;
    height: 10px;
    line-height: 0;
    margin: 4px 0 0 70px;
}
.bar-percentage {
    display: inline;
    float: left;
    font-family: "Trebuchet MS";
    font-size: 14px;
    font-weight: 700;
    margin: -4px 5px 0;
    padding: 0;
}
.bar-main-container {
    text-align: right;
}
.bar-main-container {
    padding-right: 14px;
}
.bar-main-container div:first-child {
    width: 50px;
}
.bar-main-container div {
    display: inline-block;
    padding: 0px 5px;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="content" id="Main-content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="main test1">
                        <strong>أهلاً بك </strong> <?php if (isset($person_data->name) && !empty($person_data->name)) {
                echo $person_data->laqb_title ."/". $person_data->name;
            } ?>
                    </div>

                    <div class="main1 test2 col-md-12">
                        <div class="  col-md-1" style=" background: #232424;margin-right: -14px;height:

42px;">
                            <h2 style="margin-top: 6px;">عاجل</h2>
                        </div>
                        <div class="col-md-11">
                            <marquee style="margin-top: 9px;font-size: 16px;"> A scrolling text created

                                with HTML Marquee element.
                            </marquee>
                        </div>
                    </div>



                        <div class="col-md-12">
                            <div class="col-md-4">
                            <?php 
  $person_data = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'id', 'md_all_gam3ia_omomia_members');
  $odwia_data = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
                                ?>
                                    <div class="panel panel-default" style="height: 325px">
                                        <div class="panel-heading panel-title">بيانات الأساسية</div>
                                        <div class="panel-body">
                                        </div>

                                        <ul class="list-group list-group-flush" style="
    width: 64%;
">
                                            
                                            
                                            <li class="list-group-item"><strong> الأسم 
                                                    :</strong><?php if (isset($person_data->name) && !empty($person_data->name)) {
                echo $person_data->laqb_title ."/". $person_data->name;
            } ?></li>
                                            <li class="list-group-item"><strong>رقم الهوية
                                                    :</strong><?php if (isset($person_data->card_num) && !empty($person_data->card_num)) {
                echo $person_data->card_num;
            } ?></li>
                                            <li class="list-group-item"><strong> نوع العضوية
                                                    :</strong><?php if (isset($odwia_data->no3_odwia_title) && !empty($odwia_data->no3_odwia_title)) {
                echo $odwia_data->no3_odwia_title;
            } ?> </li>
                                            <li class="list-group-item"><strong>رقم العضوية
                                                    :</strong><?php if (isset($odwia_data->rkm_odwia_full) && !empty($odwia_data->rkm_odwia_full)) {
                echo $odwia_data->rkm_odwia_full;
            } ?> </li>
             <li class="list-group-item"><strong>رقم الجوال
                                                    :</strong><?php echo $person_data->jwal; ?>  </li>
                                                   

                                        </ul>

                                        
                                        <div class="" style="
    float: left;
    margin-top: -214px;
">
    
    <?php if (isset($person_data->mem_img) && !empty($person_data->mem_img)) { ?>
        <img  style="
    width: 122px;
    height: 100%;
"src="<?php echo base_url() ?>uploads/md/gam3ia_omomia_members/<?php echo $person_data->mem_img; ?> ">

    <?php } else { ?>

        <img style="
   width: 122px;
    height: 100%;
" src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png ">
    <?php } ?>
    </div>


                                    </div>
                               
                            </div>


                            <div class="col-md-4">
                                <div class="panel panel-success" style="height: 325px">
                                    <div class="panel-heading panel-title">الاعضاء</div>
                                    <div class="panel-body">
                                    <div class="col-xs-12 padding-4">
                     
                    </div>
            
        <div class="cicleat-sec col-xs-12 no-padding ">
                        <div class="col-md-12 col-sm-4 col-xs-4 padding-4">
                        <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name">  أعضاء الجمعية العمومية <strong
                                                class="badge"><?= $gam3ia_omomia ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow green-circle">
                                <h5><i class="fa fa-users"></i> <span class="name">  أعضاء  مجلس الإدارة <strong
                                                class="badge"><?= $mgles_edara ?></strong></span></h5>
                            </div>

                       

                    </div>


 </div>
                    

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-info" style="height: 325px">
                                    <div class="panel-heading panel-title">الفيديو</div>
                                    <div class="panel-body">
                                    
                    
                                    <iframe  height="250px" style="
    width: 100%;
" src="https://www.youtube.com/embed/Ez8TZzsIhng" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
</div>
<!-- غشقش -->
<div class="col-md-12">    
<div class="col-md-9">

<div class="panel panel-info">
    <div class="panel-heading panel-title"> إيصالات عضو الجمعية العمومية</div>
    <div class="panel-body">
    </div>
    <?php if(!empty($all_pills_today)){?>
<table id="example" class=" display table table-bordered  table-striped  responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr class="">
    <th style="text-align: center !important;">م</th>
    <th style="text-align: center !important;">رقم الإيصال</th>
    <th style="text-align: center !important;">التاريخ</th>
    <th style="text-align: center !important;">نوع الإيصال</th>
    <th style="text-align: center !important;">طريقة التوريد</th>
    <th style="text-align: center !important;">المبلغ </th>
    <th style="text-align: center !important;">الإسم </th>
     <th style="text-align: center !important;">الجوال </th>
    <th style="text-align: center !important;">البند </th>

</tr>
</thead>
<tbody>
<?php
    $x=0;
    foreach($all_pills_today as $row){
    $x++;
            if($row->person_type ==1){
                $name = $row->MemberDetails['k_name'];
            }elseif ($row->person_type ==2){
                $name = $row->MemberDetails['d_name'];
            }elseif ($row->person_type ==3){
                $name =$row->MemberDetails['name'];
            }elseif($row->person_type == 0){
            $name =$row->person_name;
        }
    
        ?>
    <tr>
    <td><?=$x?></td>
    <td><?=$row->pill_num?></td>
    <td><?=$row->pill_date?></td>
    <td><?=$row->pill_type_title?></td>
    <td><?php
    $pay_method_arr =array(1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
    if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
    <td><?=$row->value?></td>
    <td><?=$row->person_name?></td>
     <td><?=$row->person_mob?></td>
    <td><?=$row->band_title?></td>
    
</tr>
<?php   } ?>
</tbody>
</table>
<?php     }else{ echo '<div class="alert alert-danger">لا توجد بيانات</div>';}?>
    
</div>

</div>


<!-- yara16-5-2020 -->
<div class="col-md-3">
                                <div class="panel panel-info" style="height: 325px">
                                    <div class="panel-heading panel-title">استطلاع رأى</div>
                                    <div class="panel-body">
                                    <?php  if(isset($current_vote)&&!empty($current_vote)){?>
                                    <div class="form-group col-sm-12 col-xs-12  padding-4" >
                            <?php echo $current_vote->vote_title;?>
                            <br>
                          
                            <div class="form-group" id="vote" >
                            
                                                                    <div class="radio-content">
                                        <input type="radio" id="esnad1" name="esnad_to" 
                                        <?php if(isset($get_voteing)&&!empty($get_voteing)&&($get_voteing ==1)){
                                echo "checked";
                            }
                            else
                            {
                                echo "checked";
                            }
                        ?>
                                         class="f2a_types" value="1" >
                                        <label for="esnad1" class="radio-label"> <?php echo $current_vote->vote_option1;?></label>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" 
                                        <?php if(isset($get_voteing)&&!empty($get_voteing)&&($get_voteing ==2)){
                               echo "checked";
                            }
                        ?>
                                        id="esnad2" name="esnad_to"  class="f2a_types" value="2">
                                        <label for="esnad2" class="radio-label"> <?php echo $current_vote->vote_option2;?></label>
                                    </div>
                                                            </div>
                                                            <div class="form-group" id="result_vote" >
                                                            
           
                                                            </div>
                                                           
                                                            <div id="pollsButtons">
                    <?php if(isset($check_voteing)&&($check_voteing !=1)){?>
                    <div id="voteButton">
                  
                        <input type="button"  value="التصويت" onclick="load_tahwel(<?php echo $current_vote->id;?>);">
                    </div>
                    <?php }?>
                    <div id="resultsButton">
                        <input type="button" value="النتائج" onclick="checkall11(<?php echo $current_vote->id;?>);">
                    </div>
                     <div id="backButton" style="display: none;">
                        <input type="button" value="الرجوع" onclick="fnBack();">
                    </div> 
                </div>
                        </div>
                    
                                    <?php }?>
                                    </div>
                                </div>
                            </div>

<!-- yara16-5-2020 -->
                                      

<!-- yara -->
                       
                      
                        </div>
                        <div class="col-md-12">

                        <div class="col-md-6">

<div class="panel panel-success">
    <div class="panel-heading panel-title"> إحصائيات إيصالات عضو الجمعية العمومية </div>
    <div class="panel-body">
    <canvas id="barChart10" height="200"></canvas>
    </div>

    
</div>

</div>
<!-- news -->


<div class="col-md-6">
        <div class="actions">
        <div class="panel panel-warning">
    <div class="panel-heading panel-title">    الاخبار</div>
            <div id="actions_slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#actions_slider" data-slide-to="0" class="active"></li>
                    <li data-target="#actions_slider" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                <?php
                    if (isset($result) && $result!= null ){
                        $x= 0;
                        foreach ($result as $row){
                            $active='';
                            if($x==0){
                                $active='active';
                            }
                            $x++;
                         
                    ?>
                    
                    <div class="item <?php echo $active; ?>" style="height:400px">
                            <?php
                            if (isset($row->img) && $row->img){
                                foreach ($row->img as $image){


                                    if($image->type==1&&$image->suspend==1){
                                        ?>
                                        <img  width="100%" style="
    height: 400px;
" src="<?= base_url()."uploads/md/news/".$image->file ?>"
                                           >
                                        <?php
                                    }
                                    else  if($image->type==2&&$image->suspend==1){
                                        ?>
                                        <iframe width="100%" src="<?= $image->file;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <?php
                                    }
                                }
                            } else{
                                ?>
                                <img width="100%"  src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>" >
                                <?php
                            }
                            ?>
                            
                        
                        <div class="carousel-caption">

                        <a
                        
                        onclick="get_details(<?= $row->id ?>)"
  
                                               data-toggle="modal"
                                               data-target="#myModal_det"
                       ><?= $row->news_title?></a>
                
                        </div>
                        
                    
            
                </div>
                    
                   
                    
                    
                      <?php
            }
             }
            ?>
            </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#actions_slider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#actions_slider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            
        </div>
    </div>
    </div>
    </div>

<!-- yara -->

                        </div>
                  
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document" style="width: 90%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close"
                    data-dismiss="modal">&times;
            </button>
            <h4 class="modal-title"> التفاصيل :
                <span id="pop_rkm"></span>
            </h4>
        </div>

        <div class="modal-body">
            <div id="details"></div>
        </div>
        <div class="modal-footer" style=" display: inline-block;width: 100%;">
            <button type="button" class="btn btn-danger"
                    data-dismiss="modal">إغلاق
            </button>
        </div>
    </div>
</div>
</div>

<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/news_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);

            }

        });
    }
</script>
        <script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
 <script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
 <script type="text/javascript">
    $(document).ready(function () {
        function chartlist_family() {
            "use strict"; // Start of use strict
        
             
            //bar chart
            var ctx = document.getElementById("barChart10");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى إيصالات بالريال السعودى",
                            data: [<?php echo $orders[0];?>, <?php echo $orders[1];?>, <?php echo $orders[2];?>, <?php echo $orders[3];?>, <?php echo $orders[4];?>, <?php echo $orders[5];?>, <?php echo $orders[6];?>, <?php echo $orders[7];?>, <?php echo $orders[8];?>, <?php echo $orders[9];?>, <?php echo $orders[10];?>, <?php echo $orders[11];?>],
                            borderColor: "rgba(124, 177, 0, 0.76)",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: ["rgb(149, 206, 255)", "rgba(99, 142, 0, 0.76)", "rgb(67, 67, 72)", "rgb(247, 163, 92)", "rgb(128, 133, 233)", "rgb(241, 92, 128)", "rgb(228, 211, 84)", "rgb(43, 144, 143)", "rgb(244, 91, 91)", "rgb(145, 232, 225)", "rgb(124, 181, 236)", "rgb(67, 67, 72)"],
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            
    
          
            


          


        }

        chartlist_family();

    });
</script>

<script>
        function load_tahwel(quest) {
            $('#tawel_result').show();
            var answer = $('input[name=esnad_to]:checked').val();
            //  alert(type);
           
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>gam3ia_omomia/Gam3ia_omomia/add_vote',
                data: {quest:quest,answer: answer},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
              title: "تم  التصويت بنجاح!",
}
);
$('#voteButton').hide();
                    //$("#tawel_result").html(html);
                }
            });
        }
        function checkall11(quest)
        {
            $('#vote').hide();
            $('#resultsButton').hide();
            $('#result_vote').show();
            $('#backButton').show();
            
            
            $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_result",
            data: {quest: quest},
            beforeSend: function () {
                $('#result_vote').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#result_vote').html(d);

            }

        });
        }
        function fnBack()
        {
            $('#vote').show();
            $('#resultsButton').show();
            $('#result_vote').hide();
            
            $('#backButton').hide();
        }
    </script>