<section class="main-banner">
    <div class="arrow-bottom text-center">
      <div style="padding: 0 15px;">
            <span>
               <img src="<?php echo base_url() . 'asisst/web_asset/img/downward1.png'  ?>" />
               
           </span>
       </div>
    </div>
</section>


<section class="twittat ptop-30 pbottom-30  gray-background">
    <div class="container-fluid">
<div class="panel panel-default">
  <div class="panel-heading">أخر الأخبار</div>
  <div class="panel-body">

  <div class="col-md-12 col-sm-6 col-x-12">
           
                    <?php
            if (isset($last_news) && !empty($last_news)){
                foreach ($last_news as $row){
                    if($row->news_type==1){
                        $news_type = "اخبار الجمعية";
                    } else if($row->news_type==2){
                        if(isset($row->newspaper_name) && $row->newspaper_name != null){
                            $news_type = $row->newspaper_name  ;
                        }
                    }
                    ?>
                    
                    
<div class="col-md-4">
            <div class="class-item wow fadeInUp animated" data-wow-duration="0.25s" style="visibility: visible; animation-duration: 0.25s;">
                <div class="thumb">
                  
                 <!--   <img src="https://abnaa-sa.org/uploads/images/0815f8a32c82e8f7c7f733395ec2fc83.png" alt=""></a>
               -->
                  <?php
                    if (isset($row->img) && $row->img){
                        foreach ($row->img as $image){
                          if($image->img_status==1){
                                ?>
                                <img style="height: 330px !important;    width: 100%;" src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>">
                    <?php

                           }
                        }
                    }else{
                        ?>
                        <img style="height: 330px !important;" src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>">
                        <?php
                    }
                    ?>
               
                </div>
                <div class="class-content">
                     
                    <h2>
              <a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>"><?= $row->title?></a>
        
                    </h2>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?= $row->date?> </p>
                    
                    

                      <a target="_blank" href="<?= base_url()."Web/news_details/".$row->id?>">
                      <button  style="float: left; "type="button" class="btn btn-sm btn-success"> المزيد</button>
                        </a>
                        

                    <div class="progress_bar">
                        <span class="pr_bar" style="width: 100%"></span>
                    </div>
                </div>
            </div>
        </div>               
                    
                    
           
     <?php
            }
        }
        ?>         
                           
                        
                           




                    </div></div></div>
    </div>
</section>
<!--
<section class="bottom_slider">
     <?php
    if (isset($nabza) && !empty($nabza)){
       ?>

    <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
        <div class="Know_charity">
            <h2 class="pbottom-20 ptop-10"><?= $nabza[0]->title?></h2>
            <h4 class="pbottom-20">  <?= $nabza[0]->sub_title?> </h4>

            <p class=" paragragh"> 
                <?= nl2br($nabza[0]->details) ?>
               </p>
            <div class="text-center" class="pbottom-20 ptop-30">
                <a target="_blank" href="<?= base_url()."Web/nabza_details/".$nabza[0]->id?>" class="btn btn-white-round">تأسيس الجمعية</a>
            </div>
        </div>
    </div>
        <?php
    }
    ?>
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
        <div class="actions">
            <h2>أبرز المبادرات</h2>
            <div id="actions_slider" class="carousel slide" data-ride="carousel">
    
                <ol class="carousel-indicators">
                    <li data-target="#actions_slider" data-slide-to="0" class="active"></li>
                    <li data-target="#actions_slider" data-slide-to="1"></li>
                </ol>


                <div class="carousel-inner" role="listbox">
                <?php
                    if (isset($mobdra_result) && $mobdra_result!= null ){
                        $x= 0;
                        foreach ($mobdra_result as $row){
                            $active='';
                            if($x==0){
                                $active='active';
                            }
                            $x++;
                         
                    ?>
                    
                    <div class="item <?php echo $active; ?>">
                            <?php
                            if (isset($row->img) && $row->img){
                                foreach ($row->img as $image){

                                    if($image->img_status==1){
                                        ?>
                                        <img src="<?= base_url()."uploads/images/public_relations/news/".$image->img ?>"
                                           >
                                        <?php
                                    }
                                }
                            } else{
                                ?>
                                <img src="<?= base_url()."asisst/web_asset/img/no_image.jpg"?>" >
                                <?php
                            }
                            ?>
                            
                        
                        <div class="carousel-caption">
                        <a target="_blank" href="<?= base_url()."Web/mobdra_details/".$row->id?>"><?= $row->title?></a>
                           
                        </div>
                        
                    
            
                </div>
                    
                   
                    
                    
                      <?php
            }
             }
            ?>
            </div>
      
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
</section>
-->
<section class="counters_of_donors">
    <div class="container-fluid">
        <div class="col-md-12 col-xs-12">
            <div class="padding-4 width_lg_md_20 text-center">
            <div class="counter_box text-center div_bgr1 popover-wrapper">
                <img src="<?= base_url() . 'asisst/web_asset/' ?>img/flaticons/grandmother.png">
                <div class="counter" data-count="<?php echo $all_armal['num'];?>">0</div>
                <h5>
                    أرملة</h5>
                <div class=" popover-content">
                    <h5>
                        <div class=" counter" data-count="<?php echo $all_armal_mkfol['num'];?>">0</div>
                        مكفول
                    </h5>
                    <h5>
                        <div class=" counter" data-count="<?php echo $all_armal['num']-$all_armal_mkfol['num'];?>">0</div>
                        غير مكفول
                    </h5>
                </div>
            </div>
            </div>
            <div class=" padding-4 width_lg_md_20 text-center">
                <div class="counter_box text-center div_bgr2 popover-wrapper">
                    <img src="<?= base_url() . 'asisst/web_asset/' ?>img/flaticons/baby-boy.png">
                    <div class=" counter" data-count="<?php echo $all_aytam['num'];?>">0</div>
                    <h5>يتيم</h5>
                    <div class=" popover-content ">
                        <h5>
                            <div class=" counter" data-count="<?php echo $all_aytam_shamla['num'] + $all_aytam_nos['num'];?>">0</div>
                            مكفول
                        </h5>
                        <h5>
                            <div class=" counter" data-count="<?php echo $all_aytam['num']-( $all_aytam_shamla['num'] + $all_aytam_nos['num']);  ?>">0</div>
                            غير مكفول
                        </h5>
                    </div>
                </div>
            </div>
            <div class="padding-4 width_lg_md_20 text-center">
            <div class="counter_box text-center div_bgr3 popover-wrapper">
                <img src="<?= base_url() . 'asisst/web_asset/' ?>img/flaticons/benefits.png">
                <div class=" counter" data-count="<?php echo $all_mostafed['num'];?>">0</div>
                <h5>مستفيد</h5>
                <div class=" popover-content ">
                    <h5>
                        <div class=" counter" data-count="<?php echo $all_mostafed_mkfol['num'];?>">0</div>
                        مكفول
                    </h5>
                    <h5>
                        <div class=" counter" data-count="<?php echo ($all_mostafed['num']-$all_mostafed_mkfol['num']);?>">0</div>
                        غير مكفول
                    </h5>
                </div>
            </div>
            </div>
        

            <div class="padding-4 width_lg_md_20 text-center">
                <div class="counter_box text-center div_bgr4">
                    <img src="<?= base_url() . 'asisst/web_asset/' ?>img/flaticons/investor.png">
                    <div class=" counter" data-count="<?php if((isset($count['kafel1_count']))&&(!empty($count['kafel1_count']))){ echo $count['kafel1_count'];}?>">0</div>
                    <h5>كفلاء</h5>

                </div>
            </div>
            <div class="padding-4 width_lg_md_20 text-center">
                <div class="counter_box text-center div_bgr5">
                    <img src="<?= base_url() . 'asisst/web_asset/' ?>img/flaticons/blood.png">
                    <div class=" counter" data-count="<?php if((isset($count['kafel2_count']))&&(!empty($count['kafel2_count']))){ echo $count['kafel2_count'];}?>">0</div>
                    <h5>كافلات</h5>

                </div>
            </div>
        </div>

    </div>
</section>





<!--
<section class="news_lastDonates ptop-40">
    <div class="container-fluid">
        <div class="col-sm-6 col-xs-12">
            <div class="panel panel-default panel-green">
                <div class="panel-heading green-panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b> أخر الأخبار</b></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="demo1">
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-1.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong>20</strong>  <br>يونيو 2018</div> </td>
                                            <td width="70%">مشروع وقف وقار عبارة عن فندق استثماري يعود ريعه السنوي لبرامج تحفيظ القرآن الكريم ويمكن للمتبرع أن يشرك معه من يحب وتصله بطاقة الإهداء</td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>

                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-2.jpg" width="70" height="70" class="" /></td>
                                            <td style="background: #a8cf45; color: white;"><div  class="text-center"><strong>21</strong> <br> يونيو 2018</div> </td>
                                            <td width="70%">مشروع مدرسة أمي تساهم بكفالة 30 مدرسة نسائية لمدة سنة كاملة،تكفل الجمعية أكثر من 4,000 طالبة لكتاب الله ويصلك تقرير سنوي عن المدرسة والجميل  </td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-3.jpg" width="70" height="70" class=""  /></td>
                                            <td><div class="text-center"><strong>22</strong> <br>يونيو 2018</div> </td>
                                            <td width="70%">دورات مكثفة لحفظ القرآن الكريم للبنين والبنات خلال فترة الإجازة الصيفية أهمية استغلال فترة الإجازة الصيفية للطلاب والطالبات وملئها بحفظ القرآن الكريم </td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-4.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong>23</strong> <br> يونيو 2018</div> </td>
                                            <td width="70%">دعم معهد قرآني لإعداد معلمات القرآن الكريم نظراً لأهمية إعداد معلمات القرآن الكريم وتهيئتهم بالمهارات والعلوم اللازمة للتدريس حيث مستهدف البرنامج دعم </td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-5.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong>24</strong> <br> يونيو 2018</div> </td>
                                            <td width="70%">دروات مكثفة لحفظ ومراجعة القرآن الكريم خلال شهر رمضان المبارك رمضان شهر القرآن وتحرص الجمعية في كل عام على إقامة دورات مكثفة لحفظ القرآن خلال شهر </td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-6.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong>25</strong> <br> يونيو 2018</div> </td>
                                            <td width="70%">فقط بـ 190 ريال تدعم 5 حلقات قرآنية يدرس بها 90 طالب يوم كامل يساهم المشروع في تغطية تكاليف حلقات تحفيظ القرآن الكريم.</td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-7.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong>26</strong> <br> يونيو 2018</div> </td>
                                            <td width="70%">دورات مكثفة لحفظ القرآن الكريم للبنين والبنات خلال فترة الإجازة الصيفية أهمية استغلال فترة الإجازة الصيفية للطلاب والطالبات وملئها بحفظ القرآن الكريم </td>
                                            <td width="50"><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-footer"> 
                    <a href="#"> مشاهدة كل</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="panel panel-default panel-orange">
                <div class="panel-heading orange-panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b> أخر التبرعات</b></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="demo1">
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-7.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 100 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر الأول</td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-6.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 4520 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر الثانى </td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-5.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 250 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر الثالث </td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-4.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 1000 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر الرابع</td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-3.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 300 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر الخامس</td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-2.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 300 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر السادس</td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="news-item">
                                    <table cellpadding="4" class="table table-bordered">
                                        <tr>
                                            <td width="75"><img src="<?= base_url() . 'asisst/web_asset/' ?>img/news/news-1.jpg" width="70" height="70" class="" /></td>
                                            <td><div class="text-center"><strong> 500 </strong> <br> ريال سعودى</div> </td>
                                            <td width="70%">عنوان الخبر السابع</td>
                                            <td><a href="#" class="btn read-more">المزيد</a></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-footer"> 
                    <a href="#"> مشاهدة كل</a>
                </div>
            </div>
        </div>
    </div>
</section>
-->


<section class="twittat ptop-30 pbottom-30  gray-background">
    <div class="container-fluid">
        <div class="col-md-8 col-sm-6 col-x-12">
            <h5>أخر المشروعات و البرامج </h5>
            <div id="owl-demo4" class="owl-carousel owl-theme">
                <?php
                if (isset($projects) && !empty($projects)){
                    $x = 1;
                $project_type = "غير محدد";
                foreach ($projects as $row){
                    $x++;
                    if ($x <7) {


                if ($row->project_type == 1){
                    $project_type = "برامج الجمعية" ;
                }else if ($row->project_type == 2){
                    $project_type ="برنامج طموح";
                }else if ($row->project_type == 3){
                    $project_type ="برنامج الروضة";
                }
                ?>
                <div class="item">
                    <div class="card">
                        <div class="card-header"  
                             style="background-image: url(<?= base_url()."uploads/images/".$row->img?>);height: 417px !important;">
                        </div>
                        <div class="card-content">
                            <div class="card-content-member text-center">
                                <h4 class="m-t-0"><a href="<?php echo base_url().'Web/single_project/'.$row->id?>" class="ft-20"><?= $row->project_name?></a>
                                </h4>
                            </div>

                            <!--<div class="card-content-languages">
                                <?php
                                if (isset($row->mostafed) && !empty($row->mostafed)){
                                    foreach ($row->mostafed as $m){
                                        ?>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4><?= $m->name?>:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>
                                                        <?= $m->number?>
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                }
                                ?>


                            </div>-->

                            <div class="card-content-summary">
                                <?php
                                $project_details= word_limiter($row->project_details,20);
                                ?>
                                <p><?= nl2br($project_details)?></p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="card-footer-stats">
                                <?php
                                if (isset($row->items) && !empty($row->items)){
                                    foreach ($row->items as $i){
                                        ?>
                                        <div>
                                            <p><?= $i->title?>:</p>
                                            <i class="fa fa-coffee"></i> <span> <?= $i->details?> </span>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>



                            </div>
                            <div class="card-footer-message">
                                <h4><i class="fa fa-comments"></i> نوع البرنامج : <?= $project_type?></h4>
                            </div>
                        </div>

                    </div>
                </div>
                    <?php
                }
                }
                }
                ?>

            </div>

        </div>
        <div class="col-md-4 col-sm-6 col-x-12">
            <h5>تغريدات من تويتر</h5>
<!--            https://twitter.com/abna_bu?lang=ar-->
            <div class="custom-twitter-timeline">
                <?php  $link_fram="";
                if((isset( $this->soeials))&&(!empty( $this->soeials))){
                    foreach ( $this->soeials as $link){
                        if((!empty($link->social_link))&&($link->social_link !=null)){
                          $link_fram=$link->social_link;
                          break;
                        }
                    }
                } ?>
                <a class="twitter-timeline" href="<?=$link_fram?>" height="540"
                   data-chrome=" nofooter "></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>

        </div>
    </div>

</section>





<?php if(!empty($main_video)){ ?>
<!-- Modal -->
<div class="modal modal-startup fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $main_video->video_link;?>" frameborder="0" allow="autoplay;" allowfullscreen></iframe>

      </div>
      <div class="modal-footer">
      <h5 >نسخة تجريبية</h5>
        <button type="button" class="btn btn-success" data-dismiss="modal">تخطي</button>
      </div>
    </div>
  </div> 
</div>
<?php  } ?>


<script type="text/javascript" src="<?= base_url() . 'asisst/web_asset/' ?>js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    var a = 0;
    $(window).scroll(function () {

        var oTop = $('.counters_of_donors').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {

            $('.counter').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({countNum: $this.text()}).animate({
                        countNum: countTo
                    },

                    {

                        duration: 8000,
                        easing: 'linear',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });

            });

            a = 1;
        }

    });
</script>
<script>
$(".arrow-bottom").click(function() {
    $('html,body').animate({
        scrollTop: $(".bottom_slider").offset().top},
        'slow');
});

</script>


